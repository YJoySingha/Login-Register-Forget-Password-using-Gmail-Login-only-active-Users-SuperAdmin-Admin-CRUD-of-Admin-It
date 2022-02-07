<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB; 
use Carbon\Carbon; 
use App\User;
use Mail; 
use Hash;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function showForgetPasswordForm()
    {
      try{
        return view('forgetPassword');
      }
      catch(Exception $e){
        return redirect()->back()->withErrors($e->getMessage());
      }
       
    }

    public function submitForgetPasswordForm(Request $request)
      {
        try{
          $request->validate([
              'email' => 'required|email|exists:users',
          ]);
  
          $token = Str::random(64);
  
          DB::table('password_resets')->insert([
              'email' => $request->email, 
              'token' => $token, 
              'created_at' => Carbon::now()
            ]);
  
          Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
              $message->to($request->email);
              $message->subject('Reset Password');
          });
  
          return back()->with('message', 'We have e-mailed your password reset link!');
        }
        catch(Exception $e){
            return redirect()->back()->withErrors(['msg' => $e->getMessage()]);
        }
      }

      public function showResetPasswordForm($token) { 
        return view('forgetPasswordLink', ['token' => $token]);
     }

     public function submitResetPasswordForm(Request $request)
     {
         try{
             
         $request->validate([
             'email' => 'required|email|exists:users',
             'password' => 'required|string|min:4|confirmed',
             'password_confirmation' => 'required'
         ]);
 
         $updatePassword = DB::table('password_resets')
                             ->where([
                               'email' => $request->email, 
                               'token' => $request->token
                             ])
                             ->first();
 
         if(!$updatePassword){
             return back()->withInput()->with('error', 'Invalid token!');
         }
 
         $user = User::where('email', $request->email)
                     ->update(['password' => Hash::make($request->password)]);

         DB::table('password_resets')->where(['email'=> $request->email])->delete();
 
         return redirect('/login')->with('message', 'Your password has been changed!');
        }
         catch(Exception $e){
          return redirect()->back()->withErrors(['msg' => $e->getMessage()]);
        }
     }

}

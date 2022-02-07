<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Items;
use Auth;
use Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Http;
use DB; 
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AuthController extends Controller
{


    public function index()
    {
        try{
            return view('index');
        }
        catch(Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
        
        
    }

    
    public function loginIndex()
    {
        try{
            return view('login');
        }
        catch(Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
        
    }

    public function postRegister(Request $request)
    {  

        $rules = [
			'name' => 'required|string|min:3|max:255',
			'phone' => 'required|digits:10',
			'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:3'
		];

		$validator = Validator::make($request->all(),$rules);

		if ($validator->fails()) {
			return redirect('index')->withInput()->withErrors($validator);
		}
		else{
            $data = $request->input();
			try{
				$newUser = new User;
                $newUser->name = $data['name'];
                $newUser->phone = $data['phone'];
				$newUser->email = $data['email'];
				$newUser->password = Hash::make($data['password']);
				$newUser->save();
				return redirect('index')->with('status',"Insert successfully");
			}
			catch(Exception $e){
                return redirect()->back()->withErrors($e->getMessage());
			}
		}
    }


    public function postLogin(Request $request)
    {
        $rules = [
			'email' => 'required|string|email',
            'password' => 'required|string',
		];

		$validator = Validator::make($request->all(),$rules);

		if ($validator->fails()) {
			return redirect('login')->withInput()->withErrors($validator);
		}

        else{

            if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) 
            {

                try{
                    if(Auth::user()->status == 'active')
                    {
                        return redirect()->intended('/admin/index');
                    }
                    else{
                        return redirect('login')->with('failed', 'Oppes! You account is not activated');
                    }
                }
                catch(Exception $e){
                    return redirect()->back()->withErrors($e->getMessage());
                }
               
            }

            return redirect('login')->with('failed', 'Oppes! You have entered invalid credentials');
			
		}

    }

    public function logout() {
        try{
            Auth::logout();
            return Redirect('index');
        }
        catch(Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
        
    }

    //admin panel 
    
    public function adminIndex()
    {
        try{
            return view('backend.index');
        }
        catch(Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    
    }

    public function adminAdd()
    {
        try{
            return view('backend.add-admin');
        }
        catch(Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    
    }

    public function profileAdmin()
    {
        try{
            return view('backend.profile-admin');
        }
        catch(Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
        
    }
    public function adminAddPost(Request $request)
    {
        $rules = [
			'name' => 'required|string|min:3|max:255',
			'phone' => 'required|digits:10',
			'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:3',
            'address' => 'required|string',
            'role' => 'required',
		];

		$validator = Validator::make($request->all(),$rules);

		if ($validator->fails()) {
			return redirect('/admin/add-admin')->withInput()->withErrors($validator);
		}
		else{
            $data = $request->input();
			try{
				$newAdmin = new User;
                $newAdmin->name = $data['name'];
                $newAdmin->phone = $data['phone'];
				$newAdmin->email = $data['email'];
				$newAdmin->password = Hash::make($data['password']);
                $newAdmin->address = $data['address'];
                $newAdmin->role = $data['role'];
				$newAdmin->save();
				return redirect('/admin/add-admin')->with('status',"Insert successfully");
			}
			catch(Exception $e){
                return redirect()->back()->withErrors($e->getMessage());
			}
		}
    }
 

    public function adminDetails()
    {
        try{
            $userData = User::get();

            return view('backend.admin-details', compact('userData'));
        }   
        catch(Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
        
    }

    public function changeStatusOfAdmin()
    {
        try{
            $id = $_POST['id'];

            $status = $_POST['status'];

            $updateStatus = User::where("id", $id)->update(["status" => $status]);
        }
        catch(Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
        
    }

    public function adminEdit($id)
    {
        try{
            $user = User::FindOrFail($id);

            return view('backend.edit-admin',compact('user'));
        }
        catch(Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
        
    }

    public function adminUpdate(Request $request,$id)
    {

        $rules = [
			'name' => 'required|string|min:3|max:255',
			'phone' => 'required|digits:10',
			'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:3',
            'address' => 'required|string',
            'role' => 'required',
		];

		$validator = Validator::make($request->all(),$rules);

		if ($validator->fails()) {
			return back()->withInput()->withErrors($validator);
		}
		else{
            $data = $request->input();
			try{
				$updateAdmin = User::find($id);
                $updateAdmin->name = $data['name'];
                $updateAdmin->phone = $data['phone'];
				$updateAdmin->email = $data['email'];
				$updateAdmin->password = Hash::make($data['password']);
                $updateAdmin->address = $data['address'];
                $updateAdmin->role = $data['role'];
				$updateAdmin->save();
				return redirect('/admin/admin-details')->with('status',"Insert successfully");
			}
			catch(Exception $e){
				return redirect()->back()->withErrors($e->getMessage());
			}
		}

        return view('backend.edit-admin',compact('user'));
    }

    //get json data from API URL using guzzle HTTP
        
    public function adminApiDetails()
    {
        try{
            $request = Http::get('https://jsonplaceholder.typicode.com/users');

            $jsonData = $request->json();

            return view('backend.api-details',compact('jsonData'));
        }
        catch(Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
        
    }



    //api function

    public function adminDetailsApi()
    {
        try{
            $userData = User::get();

            return response()->json(['status' => '200', 'message' => $userData]);
        }
        catch(Exception $e){
            return response()->json(['status' => '400', 'message' => $e->getMessage()]);
        }
        
    }

    public function adminAddPostApi(Request $request)
    {
        $rules = [
			'name' => 'required|string|min:3|max:255',
			'phone' => 'required|digits:10',
			'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:3',
            'address' => 'required|string',
            'role' => 'required',
		];

		$validator = Validator::make($request->all(),$rules);

		if ($validator->fails()) {
            return response()->json(['status' => '400', 'message' => $validator->getMessage()]);
		}
		else{
            $data = $request->input();
			try{
				$newAdmin = new User;
                $newAdmin->name = $data['name'];
                $newAdmin->phone = $data['phone'];
				$newAdmin->email = $data['email'];
				$newAdmin->password = Hash::make($data['password']);
                $newAdmin->address = $data['address'];
                $newAdmin->role = $data['role'];
				$newAdmin->save();
				return response()->json(["message" => "admin added successfully"], 200);

			}
			catch(Exception $e){
				return response()->json(['status' => '400', 'message' => $e->getMessage()]);
			}
		}
    }

    public function adminItemDetailsApi()
    {
        try{
            $itemsData = Items::get();

            return response($itemsData, 200);
        }
        catch(Exception $e){
            return response()->json(['status' => '400', 'message' => $e->getMessage()]);
        }
        

    }

    public function adminAddItemsApi(Request $request)
    {

        $rules = [
			'name' => 'required|string|min:3|max:255',
			'price' => 'required|numeric|gt:0',
			'description' => 'required|string',
            'stock' => 'required|numeric|gt:0',
            'status' => 'required'
		];

		$validator = Validator::make($request->all(),$rules);

		if ($validator->fails()) {
			//return response()->json($validator->errors(), 400);
            return response()->json(['status' => '400', 'message' => $validator->errors()]);
		}
		else{
            $data = $request->input();
			try{
				$newItem = new Items;
                $newItem->name = $data['name'];
				$newItem->description = $data['description'];
                $newItem->price = $data['price'];
                $newItem->stock = $data['stock'];
                $newItem->status = $data['status'];
				$newItem->save();
				return response()->json(["message" => "item added successfully"], 200);
			}
			catch(Exception $e){

                return response()->json(['status' => '400', 'message' => $e->getMessage()]);
			}
		}

    }






}
















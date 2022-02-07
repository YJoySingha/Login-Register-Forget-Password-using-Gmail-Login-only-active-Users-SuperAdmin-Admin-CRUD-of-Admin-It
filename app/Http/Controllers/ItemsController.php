<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Items;
use Auth;
use Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use DB; 

class ItemsController extends Controller
{
    //
    public function adminAddItems(Request $request)
    {
        try{
            return view('backend.add-items');
        }
        catch(Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
        
    }
    public function adminAddItemsPost(Request $request)
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
			return redirect('/admin/add-items')->withInput()->withErrors($validator);
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
				return redirect('/admin/add-items')->with('status',"Insert successfully");
			}
			catch(Exception $e){
				return redirect()->back()->withErrors($e->getMessage());
			}
		}

    }

    public function adminItemDetails()
    {
        try{
            $itemsData = Items::get();

            return view('backend.item-details', compact('itemsData'));

        }
        catch(Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
        

    }

    public function itemEdit($id)
    {
        try{
            $item = Items::FindOrFail($id);

            return view('backend.edit-item',compact('item'));
        }
        catch(Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
        
    }

    public function itemUpdate(Request $request,$id)
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
			return back()->withInput()->withErrors($validator);
		}
		else{
            $data = $request->input();
			try{

                $updateItem = Items::find($id);
                $updateItem->name = $data['name'];
				$updateItem->description = $data['description'];
                $updateItem->price = $data['price'];
                $updateItem->stock = $data['stock'];
                $updateItem->status = $data['status'];
				$updateItem->save();
				return redirect('/admin/item-details')->with('status',"Update successfully");
			}
			catch(Exception $e){
				return redirect()->back()->withErrors($e->getMessage());
			}
		}

    }




}

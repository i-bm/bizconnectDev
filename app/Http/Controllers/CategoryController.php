<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Alert;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('backend.category.index', compact('categories'));
    }


    public function category_create(Request $request){
        $validator = Validator::make($request->all(), [
            'title'=>'required|min:3',
        ]);
        
        if ($validator->fails()) {
            Alert::toast('Opps... Unable to save. try again, Check if all the fields have correct info', 'error');
            return redirect()->back();
        }
        else{
            
            $myString = $request->title;
            $categories = array_filter(explode(',', $myString));

         

            foreach ($categories as $key => $category){
                $data[$key]['name'] = trim($category, " ");
                $data[$key]['created_at'] = date('Y-m-d H:i:s');
                $data[$key]['updated_at'] = date('Y-m-d H:i:s');
            }

            Category::insert($data);
            Alert::success('Category Saved successfully', 'The Categories has been saved');
            return redirect()->route('category.index');
            

        }

       
    }

    public function category_update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'title'=>'required|min:3',
        ]);
        
        if ($validator->fails()) {
            Alert::toast('Opps... Unable to save. try again, Check if all the fields have correct info', 'error');
            return redirect()->back();
        }
        else{
            $category = Category::find($id);
            $category->name = $request->title;

            if($category->save()){
                Alert::success('Category Updated successfully', 'The Category has been updated');
                return redirect()->route('category.index');
            }
        }
    }



    public function category_delete(Request $request, $id){
        $category = Category::find($id);
        $category->delete();
        Alert::toast('Package has been removed','success');
        return redirect()->route('category.index');
    }
}
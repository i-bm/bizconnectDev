<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checklist;
use Illuminate\Support\Facades\Validator;
use Alert;
use Illuminate\Support\Str;

class ChecklistController extends Controller
{
    public function index(){
        $checklists = Checklist::all();
        return view('backend.checklist.index', compact('checklists'));
    }




    public function checklist_create(Request $request){
        $validator = Validator::make($request->all(), [
            'title'=>'required|min:3',
        ]);
        
        if ($validator->fails()) {
            Alert::toast('Opps... Unable to save. try again, Check if all the fields have correct info', 'error');
            return redirect()->back();
        }
        else{
            
            $myString = $request->title;
            $checklists = array_filter(explode(',', $myString));

         

            foreach ($checklists as $key => $checklist){
                $data[$key]['name'] = trim($checklist, " ");
                $data[$key]['created_at'] = date('Y-m-d H:i:s');
                $data[$key]['updated_at'] = date('Y-m-d H:i:s');
            }

            Checklist::insert($data);
            Alert::success('Checklist Saved successfully', 'The Checklist has been saved');
            return redirect()->route('checklist.index');
            

        }
    }




    public function checklist_update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'title'=>'required|min:3',
        ]);
        
        if ($validator->fails()) {
            Alert::toast('Opps... Unable to save. try again, Check if all the fields have correct info', 'error');
            return redirect()->back();
        }
        else{
            $checklist = Checklist::find($id);
            $checklist->name = $request->title;

            if($checklist->save()){
                Alert::success('Checklist Updated successfully', 'The Checklist has been updated');
                return redirect()->route('checklist.index');
            }
        }
    }




    public function checklist_delete(Request $request, $id){
        $checklist = Checklist::find($id);
        $checklist->delete();
        Alert::toast('Checklist has been removed','success');
        return redirect()->route('checklist.index');
    }
}
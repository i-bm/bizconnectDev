<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Theme;
use App\Models\Themeupload;
use Alert;
use Illuminate\Support\Facades\Hash;
class ThemeController extends Controller
{
    public function index(){
        $themes = Theme::with('themeupload')->get();

        return view('backend.theme.index', compact('themes'));
    }


    public function theme_create(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|unique:themes',
            'files' => 'required|max:1024',
        ]);

        if ($validator->fails()) {
            Alert::error('Sorry', 'Unable to Save Theme, Please ensure the marked fields are completed');
            return redirect()->back();
       }
       else{
   
        
        if($request->hasfile('files'))
         {
            $theme = new Theme();
            $theme->title = $request->title;
            $theme->save();
            
            foreach($request->file('files') as $key => $file)
            {
                
                $name = $file->getClientOriginalName();
                $path = $file->storeAs('public/files', $name);

                $data[$key]['name'] = $name;
                $data[$key]['path'] = $path;
                $data[$key]['theme_id'] = $theme->id;
 
            }
            Themeupload::insert($data);
            Alert::success('Theme Saved successfully', 'The Theme has been saved');
            return redirect()->route('themes.index');
         }
        

       }
    }


    public function theme_update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'title'=>'required|min:3',
            
        ]);
        
        if ($validator->fails()) {
            Alert::toast('Opps... Unable to save. try again, Check if all the fields have correct info', 'error');
            return redirect()->back();
        }
        else{
            $theme = Theme::find($id);
            $theme->title = $request->title;
            if($theme->save()){
                Alert::success('Theme Updated successfully', 'The Package has been updated');
                return redirect()->route('themes.index');
            }
        }
    }


    public function theme_delete(Request $request, $id){
        $theme = Theme::find($id);
        $theme->delete();
        Alert::toast('Theme has been removed','success');
        return redirect()->route('themes.index');
    }
    
}
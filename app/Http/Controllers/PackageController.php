<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use Illuminate\Support\Facades\Validator;
use Alert;
use Illuminate\Support\Str;

class PackageController extends Controller
{
    public function index(){
        $packages = Package::all();
        $controllerName = 'Packages';
        return view('backend.package.index', compact('packages','controllerName'));
    }

    public function package_create(Request $request){
        $validator = Validator::make($request->all(), [
            'title'=>'required|min:3',
            'details'=>'required',
            'currency'=>'required',
            'price'=>'required|numeric|between:0,999999.99',
            'duration'=>'required|numeric',
            
        ]);
        
        if ($validator->fails()) {
            Alert::toast('Opps... Unable to save. try again, Check if all the fields have correct info', 'error');
            return redirect()->back();
        }
        else{
            

            $myString = $request->details;
            $details = explode(',', $myString);
            
            $package = new Package();

            $package->title = ucwords($request->title);
            $package->details = $details;
            $package->currency = $request->currency;
            $package->price = $request->price;
            $package->duration = $request->duration;
            $package->discount = $request->discount;

            if($package->save()){
                Alert::success('Package created successfully', 'The Package has been created');
                return redirect()->route('packages.index');
            }

        }
    }


    public function package_update(Request $request, $id){

        $validator = Validator::make($request->all(), [
            'title'=>'required|min:3',
            'details'=>'required',
            'currency'=>'required',
            'price'=>'required|numeric|between:0,999999.99',
            'duration'=>'required|numeric',
            
        ]);
        
        if ($validator->fails()) {
            Alert::toast('Opps... Unable to save. try again, Check if all the fields have correct info', 'error');
            return redirect()->back();
        }

        else{

        $package = Package::find($id);

        $myString = $request->details;
        $details = explode(',', $myString);

        $package->title = ucwords($request->title);
        $package->details = $details;
        $package->currency = $request->currency;
        $package->price = $request->price;
        $package->duration = $request->duration;
        $package->discount = $request->discount;

        if($package->save()){
            Alert::success('Package Updated successfully', 'The Package has been updated');
            return redirect()->route('packages.index');
        }
        }
    }

    public function package_delete(Request $request, $id){
        $package = Package::find($id);
        $package->delete();
        Alert::toast('Package has been removed','success');
        return redirect()->route('packages.index');
    }

}
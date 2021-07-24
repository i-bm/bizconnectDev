<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;

class SubscriptionController extends Controller
{
    public function index(){
        $packages = Package::all();
        return view('backend.subscription.index', compact('packages'));
    }

    public function buy($id){
        $package = Package::findOrFail($id);
        return view('backend.subscription.buy.index', compact('package'));
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Iodev\Whois\Factory;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware(['auth','verified']);
        //testing

        //pull request
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $whois = Factory::get()->createWhois();

// Checking availability
// if ($whois->isDomainAvailable("365bizconnect.net")) {
//     print "Bingo! Domain is available! :)";
// }
// else{
//     echo "Domain Is taken";
// }
        return view('home');
    }
}
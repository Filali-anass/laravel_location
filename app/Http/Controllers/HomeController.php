<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Car;
use App\Reservation;
use Illuminate\Http\Request;

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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $cars= Car::with('depot')->get();
        //$reservations = Reservation::with('client')->with('car')->get();
        return view('home',compact('cars'));
    }
}

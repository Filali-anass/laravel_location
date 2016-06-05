<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Car;
use App\Depot;
use App\Client;
use Auth;
use DateTime;

class gestController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','gest']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $reservations = Reservation::with('client')->with('car')->get();

        return view('gest.res',compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cars=Car::all();
        $reservation =Reservation::with('car')->findOrFail($id);
        $depots = Depot::get();
        return view('gest.edit',compact('reservation','cars','depots'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $reservation =Reservation::with('car')->findOrFail($id);
        $car_id=Car::where('model',$request['car_model'])->first()->id;
        $request['car_id']=$car_id;
        $client_name= $reservation->client->name;
        $client_id = Client::where('name',$client_name)->first()->id;


        $request['client_id'] = $client_id;
        $reservation->update($request->all());
        //$name =Auth::user()->name;
      //  $id =Client::where('name',$name)->first()->id;
      //  $reservations = Reservation::where('client_id',$id)->with('client')->with('car')->get();
        return redirect(route('gest.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

    }
    public function cars(){
        
    }

   
}

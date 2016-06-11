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
use Illuminate\Support\Facades\Input;

class reservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $name =Auth::user()->name;
        $id =Client::where('name',$name)->first()->id;
        $reservations = Reservation::where('client_id',$id)->with('client')->with('car')->get();

        //$reservations= Reservation::->get();

        return view('res.index',compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cars = Car::with('depot')->get();
        $depots = Depot::get();
        return view('res.create',compact('cars','depots'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $db= $input['date_debut'];
        $d1 = new DateTime($db);
        $input['date_debut']=$d1;
        $df= $input['date_fin'];
        $d2 = new DateTime($df);
        $input['date_fin']=$d2;
        $interval = $d1->diff($d2);
        if( $interval->format('%R%a')<0){
            $cars = Car::with('depot')->get();
            $depots = Depot::get();
            return view('res.create',compact('cars','depots'));
        }
        $car_id = Car::where('model',$input['car_model'])->first()->id;
        $input['car_id'] = $car_id;
        $client_name= Auth::user()->name;
        $client_id = Client::where('name',$client_name)->first()->id;
        $input['client_id'] = $client_id;
        Reservation::create($input);

        return redirect(route('res.index'));
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
    {   $cars=Car::all();
        $reservation =Reservation::with('car')->findOrFail($id);
        $depots = Depot::get();
        return view('res.edit',compact('reservation','cars','depots'));
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
        $client_name= Auth::user()->name;
        $client_id = Client::where('name',$client_name)->first()->id;
        $request['client_id'] = $client_id;
        $reservation->update($request->all());
        $name =Auth::user()->name;
        $id =Client::where('name',$name)->first()->id;
        $reservations = Reservation::where('client_id',$id)->with('client')->with('car')->get();
        return redirect(route('res.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Reservation::find($id);
        $res->delete();
        return redirect(route('res.index'));
    }
   
}

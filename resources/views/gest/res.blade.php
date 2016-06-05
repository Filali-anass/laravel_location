@extends('layouts.app')

@section('script')
    <script src="http://localhost/location/resources/js/jquery.js" ></script>

@endsection

@section('style')
    <link rel="stylesheet" href="http://localhost/location/resources/style/fontawsome.css">

@endsection

@section('content')
    <div class="mycontent">
        <h1>Liste des réservations</h1>
        <br>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Client</th>
                <th>Date debut</th>
                <th>Date fin</th>
                <th>Lieu debut</th>
                <th>Lieu fin</th>
                <th>Model auto</th>
                <th>Prix/Jour</th>
                <th>Modifier</th>
                <th>Annuler</th>
                <th>Facturer</th>
            </tr>
            </thead>
            <tbody>
            @foreach($reservations as $reservation)
                <tr>
                    <th>{{$client_name= $reservation->client->name}}</th>
                    <th>{{$reservation->date_debut}}</th>
                    <th>{{$reservation->date_fin}}</th>
                    <th>{{$reservation->depot_debut}}</th>
                    <th>{{$reservation->depot_fin}}</th>
                    <th>{{$reservation->car->model}}</th>
                    <th>{{$reservation->car->price}}</th>
                    <th><a href="{{ route('gest.edit',$reservation) }}" ><i style="color:#1fdc64"  class="fa fa-pencil-square-o" aria-hidden="true"></i></a></th>
                    <th>
                        {!! Form::open(['method'=>'delete','url'=>route('gest.update',$reservation)]) !!}
                        <button style="background-color: Transparent "type="submit"><i style="color:#dc1c5c" class="fa fa-times" aria-hidden="true"></i></button>
                        {!! Form::close() !!}
                    </th>
                    <th>
                        <a style="color:#9ea608" href ="http://localhost/location/public/facture/{{$reservation->id}} ">
                            <i class="fa fa-money" aria-hidden="true"></i>
                        </a>
                    </th>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection()
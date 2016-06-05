@extends('layouts.app')
@section('resa')
    <button class="btn btn-round btn-primary" style="margin-top:10px;" onclick="window.print();">Imprimer</button>
    @endsection
@section('content')
    <div class="mycontent">
<h1><i class="fa fa-car"  aria-hidden="true"></i> LoCars</h1>
        <br>
        <br>
<div style="float:right">{{date('Y-m-d H:i:s')}}</div>
<h3>Client : {{$res->client->name}}</h3>
<h3>Adresse : {{$res->client->adresse}}</h3>
<br>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Date debut</th>
            <th>Lieu debut</th>
            <th>Date fin</th>
            <th>Lieu fin</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>{{$res->date_debut}}</th>
            <th>{{$res->depot_debut}}</th>
            <th>{{$res->date_fin}}</th>
            <th>{{$res->depot_fin}}</th>
        </tr>
    </tbody>
</table>
<br>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Model auto</th>
            <th>Gamme</th>
            <th>Kilométrage</th>
            <th>Prix/Jour</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>{{$res->car->model}}</th>
            <th>{{$res->car->type}}</th>
            <th>{{$res->car->km}} Km</th>
            <th>{{$res->car->price}} Dhs</th>
        </tr>
    </tbody>
</table>
        <br><br><br><br>
        <h3>Montant A Payer :</h3>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Total jours</th>
                <th>Total à payer</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th>{{substr(date_diff(new DateTime($res->date_debut), new DateTime($res->date_fin))->format('%R%a'),1)}}</th>
                <th>{{ date_diff(new DateTime($res->date_debut), new DateTime($res->date_fin))->format('%R%a')*$res->car->price }} Dhs</th>
            </tr>
            </tbody>
        </table>

    </div>
@endsection

@extends('layouts.app')


@section('resa')

    @if (!Auth::guest() && !Auth::user()->isAdmin() && !Auth::user()->isGestionnaire())
        <li><a href="http://localhost/location/public/voiture "> Les voitures </a></li>
        <li><a href="http://localhost/location/public/res/create"> Réserver une voiture </a></li>
        <li><a href="http://localhost/location/public/res "> Mes réservations </a></li>
    @endif
    @if (!Auth::guest() && !Auth::user()->isAdmin() && Auth::user()->isGestionnaire())
        <li><a href="http://localhost/location/public/gest "> Gérer les réservations </a></li>
        <li><a href="http://localhost/location/public/gestt "> Gérer les voitures </a></li>
    @endif
    @if (!Auth::guest() && Auth::user()->isAdmin() && !Auth::user()->isGestionnaire())
        <li><a href="http://localhost/location/public/admincl "> Gérer les clients </a></li>

    @endif

@endsection()


@section('content')
    <div class="row full inspiring" >

            <h1>Agences de location de voiture</h1>

    </div>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Nos Voitures</div>

                <div class="panel-body">
                    <div id="slider-wrap">
                        <ul id="slider">
                            @foreach($cars as $car)
                                <li>

                                        <p>{{$car->model}}</p>
                                    <p>{{$car->price}} Dhs/jour</p>
                                        <img src="http://localhost/location/resources/img/{{ $car->img }}" >

                                </li>

                            @endforeach
                        </ul>


                        <div class="btns" id="next"><i class="fa fa-arrow-right"></i></div>
                        <div class="btns" id="previous"><i class="fa fa-arrow-left"></i></div>
                        <!--<div id="counter"></div>-->

                        <div id="pagination">
                            <ul>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script src='http://localhost/location/resources/js/jquery.js'></script>
<script src="http://localhost/location/resources/js/slider.js"></script>
@endsection

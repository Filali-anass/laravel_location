@extends('layouts.app')

@section('script')
    <script src="http://localhost/location/resources/js/jquery-1.10.2.js"></script>
    <script src="http://localhost/location/resources/js/jquery-ui.js"></script>
    <script>
        $(function() {
            $x=$( "#datepicker1" ).datepicker({
                dateFormat: "yy-mm-dd"
            });
            $( "#datepicker2" ).datepicker({
                dateFormat: "yy-mm-dd"
            });
        });
    </script>
@endsection
@section('style')
    <link rel="stylesheet" href="http://localhost/location/resources/style/jquery-ui.css">

@endsection
@section('content')
    <div class="mycontent">
        <h1>Créer réservation</h1>
        {!! Form::open(['url'=>route('res.store')]) !!}
        <div class="form-group">
            {!! Form::label('dateDebut','Date debut') !!}
            {!!  Form::text('date_debut', '', ['id' => 'datepicker1','class'=>'form-control'] ) !!}
        </div>
        <div class="form-group">
            {!! Form::label('dateFin','Date Fin') !!}
            {!!  Form::text('date_fin', '', ['id' => 'datepicker2','class'=>'form-control'] ) !!}
        </div>
        <div class="form-group">
            {!! Form::label('lieuDebut','Lieu Début') !!}
            <select name="depot_debut" class="form-control" id="sel1">
                @foreach($depots as $depot)
                    <option>{{$depot->name}}</option>
                @endforeach

            </select>
        </div>
        <div class="form-group">
            {!! Form::label('lieuFin','Lieu Début') !!}
            <select name="depot_fin" class="form-control" id="sel1">
                @foreach($depots as $depot)
                    <option>{{$depot->name}}</option>
                @endforeach

            </select>
        </div>

        <div>
            @foreach($cars as $car)
                @if($car->dispo)
                    <div style="float:left">
                        <p >{{$car->model}}</p>
                        <img  height="50px" width="50px" src="http://localhost/location/resources/img/{{ $car->img }}" >
                    </div>
                @endif
            @endforeach
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="form-group">
            <label for="sel1">Choisir Automobile</label>

            <select name="car_model" class="form-control" id="sel1">
                @foreach($cars as $car)
                    @if($car->dispo)
                        <option>{{$car->model}}</option>
                    @endif
                @endforeach

            </select>
        </div>

        <button class="btn btn-primary">reserver</button>

        {!! Form::close() !!}
    </div>
@stop











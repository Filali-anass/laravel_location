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
        {!! Form::open(['method'=>'put','url'=>route('res.update',$reservation)]) !!}
        <div class="form-group">
            {!! Form::label('dateDebut','Date debut') !!}
            {!!  Form::text('date_debut', $reservation->date_debut, ['id' => 'datepicker1','class'=>'form-control'] ) !!}
        </div>
        <div class="form-group">
            {!! Form::label('dateFin','Date Fin') !!}
            {!!  Form::text('date_fin', $reservation->date_fin, ['id' => 'datepicker2','class'=>'form-control'] ) !!}
        </div>

        <div class="form-group">
            {!! Form::label('lieu_debut','Lieu Debut') !!}

            <select name="depot_debut" class="form-control" id="sel1">
                @foreach($depots as $depot)

                    @if($depot->name==$reservation->depot_debut)
                        <option selected>{{$depot->name}}</option>
                    @else
                        <option>{{$depot->name}}</option>
                    @endif

                @endforeach

            </select>
        </div>
        <div class="form-group">
            {!! Form::label('lieu_fin','Lieu Fin') !!}

            <select name="depot_fin" class="form-control" id="sel1">
                @foreach($depots as $depot)

                        @if($depot->name==$reservation->depot_fin)
                            <option selected>{{$depot->name}}</option>
                        @else
                            <option>{{$depot->name}}</option>
                        @endif

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
                        @if($car->model==$reservation->car->model)
                            <option selected>{{$car->model}}</option>
                        @else
                            <option>{{$car->model}}</option>
                        @endif
                    @endif
                @endforeach

            </select>
        </div>

        <button class="btn btn-primary">Modifier</button>

        {!! Form::close() !!}
    </div>
@stop











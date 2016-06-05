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
        <h1>Modifier voiture</h1>
        {!! Form::open(['method'=>'put','url'=>route('gestt.update',$car)]) !!}
        <div class="form-group">
            {!! Form::label('model','Model') !!}
            {!!  Form::text('model', $car->model, ['class'=>'form-control'] ) !!}
        </div>
        <div class="form-group">
            {!! Form::label('type','Gamme') !!}
            {!!  Form::text('type', $car->type, ['class'=>'form-control'] ) !!}
        </div>
        <div class="form-group">
            {!! Form::label('img','Photo') !!}
            {!!  Form::text('img', $car->img, ['class'=>'form-control'] ) !!}
        </div>
        <div class="form-group">
            {!! Form::label('km','Kilométrage') !!}
            {!!  Form::text('km', $car->km, ['class'=>'form-control'] ) !!}
        </div>
        <div class="form-group">
            {!! Form::label('price','Prix Journalier') !!}
            {!!  Form::text('price', $car->price, ['class'=>'form-control'] ) !!}
        </div>
        <div class="form-group">
            {!! Form::label('depot_id','Dépot courant') !!}
            {!!  Form::text('depot_id', $car->depot->id, ['class'=>'form-control'] ) !!}
        </div>


        <button class="btn btn-primary">Modifier</button>

        {!! Form::close() !!}
    </div>
@stop











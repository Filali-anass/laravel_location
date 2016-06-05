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
        <h1>Créer automobile</h1>
        {!! Form::open(['url'=>route('gestt.store')]) !!}
        <div class="form-group">
            {!! Form::label('model','Model') !!}
            {!!  Form::text('model', "", ['class'=>'form-control'] ) !!}
        </div>
        <div class="form-group">
            {!! Form::label('type','Gamme') !!}
            {!!  Form::text('type', "", ['class'=>'form-control'] ) !!}
        </div>
        <div class="form-group">
            {!! Form::label('img','Photo') !!}
            {!!  Form::text('img', "", ['class'=>'form-control'] ) !!}
        </div>
        <div class="form-group">
            {!! Form::label('km','Kilométrage') !!}
            {!!  Form::text('km', "", ['class'=>'form-control'] ) !!}
        </div>
        <div class="form-group">
            {!! Form::label('dispo','Prix Journalier') !!}
            {!!  Form::text('dispo', "", ['class'=>'form-control'] ) !!}
        </div>
        <div class="form-group">
            {!! Form::label('price','Prix Journalier') !!}
            {!!  Form::text('price', "", ['class'=>'form-control'] ) !!}
        </div>
        <div class="form-group">
            {!! Form::label('depot_id','Dépot courant') !!}
            {!!  Form::text('depot_id', "", ['class'=>'form-control'] ) !!}
        </div>


        <button class="btn btn-primary">Créer</button>

        {!! Form::close() !!}
    </div>
@stop











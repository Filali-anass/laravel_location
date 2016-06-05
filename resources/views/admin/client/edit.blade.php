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
        <h1>Modifier un client</h1>
            {!! Form::open(['method'=>'put','url'=>route('admincl.update',$client)]) !!}
        <div class="form-group">
            {!! Form::label('name','Nom') !!}
            {!!  Form::text('name', $client->name, ['class'=>'form-control'] ) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email','Email') !!}
            {!!  Form::text('email', $email, ['class'=>'form-control'] ) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password','Password') !!}
            {!! Form::text('password', "", ['class'=>'form-control'] ) !!}


        </div>
        <div class="form-group">
            {!! Form::label('adresse','Adresse') !!}
            {!!  Form::text('adresse', $client->adresse, ['class'=>'form-control'] ) !!}
        </div>

        <button class="btn btn-primary">Modifier</button>

        {!! Form::close() !!}
    </div>
@stop











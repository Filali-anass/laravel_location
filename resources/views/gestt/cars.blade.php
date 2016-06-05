@extends('layouts.app')

@section('script')
    <script src="http://localhost/location/resources/js/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
@endsection
@section('style')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

@endsection
@section('content')
    <div class="mycontent">
        <a href="{{ route('gestt.create') }}"class="btn btn-primary" style ="margin-bottom:5px"> Ajouter une automobile</a>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Photo</th>
                <th>Modèle</th>
                <th>Gamme</th>
                <th>Kilométrage</th>
                <th>Prix journalier</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cars as $car)
                <tr>
                    <th>{{ $car->img }} </th>
                    <th>{{$car->model}}</th>
                    <th>{{$car->type}}</th>
                    <th>{{$car->km}}</th>
                    <th>{{$car->price}}</th>
                    <th><a href="{{ route('gestt.edit',$car) }}" ><i style="color:#1fdc64"  class="fa fa-pencil-square-o" aria-hidden="true"></i></a></th>
                    <th>
                        {!! Form::open(['method'=>'delete','url'=>route('gestt.destroy',$car)]) !!}
                        <button style="background-color: Transparent "type="submit"><i style="color:#dc1c5c" class="fa fa-times" aria-hidden="true"></i></button>
                        {!! Form::close() !!}
                    </th>
                </tr>

        @endforeach
        </table>
    </div>
@stop











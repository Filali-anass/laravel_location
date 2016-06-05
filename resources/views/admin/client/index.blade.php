@extends('layouts.app')

@section('script')
    <script src="http://localhost/location/resources/js/jquery-1.10.2.js"></script>
    <script src="http://localhost/location/resources/js/jquery-ui.js"></script>

@endsection
@section('style')

@endsection
@section('content')
    <div class="mycontent">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Tél</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clients as $client)
                <tr>
                    <th>{{$client->name}}</th>
                    <th>{{$client->adresse}}</th>
                    <th>{{$client->tel}}</th>
                    <th><a href="{{ route('admincl.edit',$client) }}" ><i style="color:#1fdc64"  class="fa fa-pencil-square-o" aria-hidden="true"></i></a></th>
                    <th>
                        {!! Form::open(['method'=>'delete','url'=>route('admincl.update',$client)]) !!}
                        <button style="background-color: Transparent "type="submit"><i style="color:#dc1c5c" class="fa fa-times" aria-hidden="true"></i></button>
                        {!! Form::close() !!}
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop











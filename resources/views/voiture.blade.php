@extends('layouts.app')

@section('script')
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
@endsection
@section('style')

@endsection
@section('content')
    <div class="mycontent">
        <h1>Liste des voitures</h1>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Photo</th>
                <th>Modèle</th>
                <th>Gamme</th>
                <th>Kilométrage</th>
                <th>Prix journalier</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cars as $car)
                <tr>
                    <th><img  height="100px" width="100px" src="http://localhost/location/resources/img/{{ $car->img }}" > </th>
                    <th>{{$car->model}}</th>
                    <th>{{$car->type}}</th>
                    <th>{{$car->km}}</th>
                    <th>{{$car->price}}</th>

                </tr>

            @endforeach
        </table>
    </div>
@stop











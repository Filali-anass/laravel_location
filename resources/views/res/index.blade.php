@extends('layouts.app')

@section('script')
    <script src="http://localhost/location/resources/js/jquery.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>

@endsection

@section('style')

@endsection

@section('content')
    <div class="mycontent">
        <h1>Mes Réservations</h1>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Date debut</th>
            <th>Date fin</th>
            <th>Lieu debut</th>
            <th>Lieu fin</th>
            <th>Model auto</th>
            <th>Modifier</th>
            <th>Annuler</th>
        </tr>
        </thead>
        <tbody>
        @foreach($reservations as $reservation)
        <tr>
            <th>{{$reservation->date_debut}}</th>
            <th>{{$reservation->date_fin}}</th>
            <th>{{$reservation->depot_debut}}</th>
            <th>{{$reservation->depot_fin}}</th>
            <th>{{$reservation->car->model}}</th>
            <th><a href="{{ route('res.edit',$reservation) }}" ><i style="color:#1fdc64"  class="fa fa-pencil-square-o" aria-hidden="true"></i></a></th>
            <th>
                {!! Form::open(['method'=>'delete','url'=>route('res.update',$reservation)]) !!}
                <button style="background-color: Transparent "type="submit"><i style="color:#dc1c5c" class="fa fa-times" aria-hidden="true"></i></button>
                <!--<a href="{{ route('res.destroy',$reservation) }}" >
                    <i style="color:#dc1c5c" class="fa fa-times" aria-hidden="true"></i>
                </a>-->

                {!! Form::close() !!}
            </th>
        </tr>
    @endforeach
        </tbody>
    </table>
</div>


@endsection()
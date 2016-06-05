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
                <th>Email</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            </thead>
            <tbody>
            @foreach($getionnaires as $gest)
                <tr>
                    <th>{{$gest->name}}</th>
                    <th>{{$gest->email}}</th>
                    <th><a href="{{ route('admin.edit',$gest) }}" ><i style="color:#1fdc64"  class="fa fa-pencil-square-o" aria-hidden="true"></i></a></th>
                    <th>
                        {!! Form::open(['method'=>'delete','url'=>route('admin.update',$gest)]) !!}
                        <button style="background-color: Transparent "type="submit"><i style="color:#dc1c5c" class="fa fa-times" aria-hidden="true"></i></button>
                    <!--<a href="{{ route('admin.destroy',$gest) }}" >
                    <i style="color:#dc1c5c" class="fa fa-times" aria-hidden="true"></i>
                </a>-->

                        {!! Form::close() !!}
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop











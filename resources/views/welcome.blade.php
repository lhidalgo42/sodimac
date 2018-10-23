@extends('layouts.app')
@section('content')

    <div class="container">
        <table class="table table-hover table-bordered" id="taxis">
            <thead>
            <tr>
                <th>Solicitado por</th>
                <th>Salida</th>
                <th>LLegada</th>
                <th>Origen</th>
                <th>Destino</th>
                <th>Cupos Libres</th>
                @auth
                    <th>Solicitar</th>
                @endauth

            </tr>
            </thead>
            <?php \Carbon\Carbon::setLocale('es'); ?>
            <tbody>
                @foreach($taxis as $taxi)
                    <tr>
                        <td>{{\App\Models\User::find($taxi->user_id)->name}}</td>
                        <td>{{\Carbon\Carbon::parse($taxi->departure)->diffForHumans()}}</td>
                        <td>{{\Carbon\Carbon::parse($taxi->arrival)->diffForHumans()}}</td>
                        <td>{{\App\Models\Location::find($taxi->origin_id)->name}}</td>
                        <td>{{\App\Models\Location::find($taxi->destination_id)->name}}</td>
                        <td>{{$taxi->capacity -count($taxi->users)}} / {{$taxi->capacity}}</td>
                        <td>
                            @if(\Illuminate\Support\Facades\Auth::user()->id != $taxi->user_id && $taxi->capacity > count($taxi->users))
                                <a href="#" class="btn btn-primary" taxi="{{$taxi->id}}}}">Subirse a este Taxi</a>
                            @else
                                <a href="#" class="btn btn-primary" disabled="disabled">Subirse a este Taxi</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
            @auth
                <tfooter>
                    <tr>
                        <td colspan="7">
                            <a href="/taxi/create" class="btn btn-block btn-success">Crear Nuevo Taxi</a>
                        </td>
                    </tr>
                </tfooter>
            @endauth
        </table>
    </div>

@endsection
@section('css')
    <style>
        #taxis > tr > td {
            text-align: center;
        }
    </style>
@endsection
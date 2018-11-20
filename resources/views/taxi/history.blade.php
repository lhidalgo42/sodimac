@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container">
        <div class="row">
            <!-- Default box -->
            <div class="box">
                <div class="box-body">
                    <table class="table table-hover table-bordered" id="taxis">
                        <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Origen</th>
                            <th>Destino</th>
                            <td>Pasajeros</td>
                            <th>CO2</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($taxis as $taxi)

                            <tr>
                                <td>{{\Carbon\Carbon::parse($taxi->departure)->diffForHumans()}}</td>
                                <td>{{\App\Models\Location::find($taxi->origin_id)->name}}</td>
                                <td>{{\App\Models\Location::find($taxi->destination_id)->name}}</td>
                                <td></td>
                                <td>{{($taxi->distance*0.0001)}} Kg</td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
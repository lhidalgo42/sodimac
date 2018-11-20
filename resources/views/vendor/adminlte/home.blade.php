@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-12">

                <!-- Default box -->
                <div class="box">
                    <div class="box-body">
                        <table class="table table-hover table-bordered" id="taxis">
                            <thead>
                            <tr>
                                <th>Solicitado por</th>
                                <th>Salida</th>
                                <th>Tiempo de Viaje</th>
                                <th>Origen</th>
                                <th>Destino</th>
                                <th>Cupos</th>
                                @auth
                                    <th>Solicitar</th>
                                @endauth
                            </tr>
                            </thead>
                            <?php \Carbon\Carbon::setLocale('es'); ?>
                            <tbody>
                            @foreach($taxis as $taxi)
                                <?php
                                $pasajeros = 0;
                                foreach ($taxi->passengers as $passenger)
                                    $pasajeros +=$passenger->pivot->passengers;
                                ?>
                                <tr>
                                    <td>{{\App\Models\User::find($taxi->user_id)->name}}</td>
                                    <td>{{Carbon\Carbon::parse($taxi->departure)->diffForHumans()}}</td>
                                    <td>{{$taxi->travel_time}}</td>
                                    <td>{{\App\Models\Location::find($taxi->origin_id)->name}}</td>
                                    <td>{{\App\Models\Location::find($taxi->destination_id)->name}}</td>
                                    <td>{{$pasajeros}} / {{$taxi->capacity}}</td>
                                    <td>
                                        @if($taxi->capacity > $pasajeros && !$taxi->users->contains(\Illuminate\Support\Facades\Auth::user()->id))
                                            <a href="#" class="btn btn-primary subirse" taxi="{{$taxi->id}}}}">Subirse a
                                                este Taxi</a>
                                        @elseif($taxi->users->contains(\Illuminate\Support\Facades\Auth::user()->id))
                                            <a href="#" class="btn btn-danger bajarse" taxi="{{$taxi->id}}">Bajarse de
                                                este Taxi</a>
                                        @elseif($taxi->capacity <= $pasajeros && !$taxi->users->contains(\Illuminate\Support\Facades\Auth::user()->id))
                                            <a href="#" class="btn btn-warning">Taxi sin Cupo</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfooter>
                                <tr>
                                    <td colspan="7">
                                        <a href="/taxi/create" class="btn btn-success btn-block btn-lg">Crear Taxi</a>

                                    </td>
                                </tr>
                            </tfooter>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
        </div>
    </div>
@endsection
@section('css')
    <style>
        #taxis > tr > td {
            text-align: center;
        }
    </style>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.8/dist/sweetalert2.all.min.js"
            type="text/javascript"></script>
    <script>
        $(".subirse").click(function () {
            var taxi = $(this).attr('taxi');
            swal({
                title: 'Estas Seguro?',
                text: "Estas Seguro de que quieres subirte a este Taxi ?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Estoy Seguro'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "/taxi/assing/" + taxi,
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success:function (res) {
                            console.log(res);
                            if (res === "1"){
                                swal(
                                    'Confirmado',
                                    'Taxi Asignado Correctamente',
                                    'success'
                                );
                                setTimeout(function () {
                                    window.location.href = "/";
                                }, 2000);
                            }
                            else {
                                swal(
                                    'Taxi lleno',
                                    'Alguien tomo el cupo, Intenta nuevamente',
                                    'warning'
                                );
                                setTimeout(function () {
                                    window.location.href = "/";
                                }, 2000);
                            }
                        }
                    });

                }
            })
        })
        $(".bajarse").click(function () {
            var taxi = $(this).attr('taxi');
            swal({
                title: 'Estas Seguro?',
                text: "Estas Seguro de que quieres bajarte de este Taxi ?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Estoy Seguro'
            }).then((result) => {
                if (result.value) {
                    swal(
                        'Confirmado',
                        'Te has bajado Correctamente',
                        'success'
                    );
                    $.ajax({
                        url: "/taxi/deassing/" + taxi,
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    setTimeout(function () {
                        window.location.href = "/";
                    }, 0);
                }
            })
        })
    </script>
@endsection

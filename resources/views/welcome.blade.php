@extends('layouts.app')
@section('content')
    <div class="container-fluid spark-screen" >
        <div class="row">
            <div class="col-md-8 col-md-offset-2" style="background-color: white">

                <!-- Default box -->
                <div class="box">
                    <div class="box-body">
                        <table class="table table-condensed table-striped" id="taxis">
                            <thead>
                            <tr>
                                <th>Publicado por</th>
                                <th>Salida</th>
                                <th>Origen</th>
                                <th>Destino</th>
                                <th>Cupos Utilizados</th>
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
                                    $pasajeros += $passenger->pivot->passengers;
                                ?>
                                <tr>
                                    <td>{{\App\Models\User::find($taxi->user_id)->name}}</td>
                                    <td>{{Carbon\Carbon::parse($taxi->departure)->diffForHumans()}}</td>
                                    <td>{{\App\Models\Location::find($taxi->origin_id)->name}}</td>
                                    <td>{{\App\Models\Location::find($taxi->destination_id)->name}}</td>
                                    <td>{{$pasajeros}} / {{$taxi->capacity}}</td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <style>
        #taxis > tr > td {
            text-align: center;
        }

        body {
            background-color: #ecf0f5;

        }
    </style>
@endsection
@section('js')
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
                    swal(
                        'Confirmado',
                        'Taxi Asignado Correctamente',
                        'success'
                    );
                    $.ajax({
                        url: "/taxi/assing/" + taxi,
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    setTimeout(function () {
                        window.location.href = "/";
                    }, 4000);
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
                    }, 4000);
                }
            })
        })
    </script>
@endsection
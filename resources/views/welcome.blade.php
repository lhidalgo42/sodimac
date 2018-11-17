@extends('layouts.app')
@section('content')

    <div class="container">
        <table class="table table-hover table-bordered" id="taxis">
            <thead>
            <tr>
                <th>Solicitado por</th>
                <th>Salida</th>
                <th>LLegada Aproximada</th>
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
                <tr>
                    <td>{{\App\Models\User::find($taxi->user_id)->name}}</td>
                    <td>{{$taxi->departure}}</td>
                    <td>{{$taxi->arrival}}</td>
                    <td>{{\App\Models\Location::find($taxi->origin_id)->name}}</td>
                    <td>{{\App\Models\Location::find($taxi->destination_id)->name}}</td>
                    <td>{{count($taxi->users)}} / {{$taxi->capacity}}</td>
                    <td>
                        @if($taxi->capacity > count($taxi->users) && !$taxi->users->contains(\Illuminate\Support\Facades\Auth::user()->id))
                            <a href="#" class="btn btn-primary subirse" taxi="{{$taxi->id}}}}">Subirse a este Taxi</a>
                        @elseif($taxi->users->contains(\Illuminate\Support\Facades\Auth::user()->id))
                            <a href="#" class="btn btn-danger bajarse" taxi="{{$taxi->id}}">Bajarse de este Taxi</a>
                        @elseif($taxi->capacity <= count($taxi->users) && !$taxi->users->contains(\Illuminate\Support\Facades\Auth::user()->id))
                            <a href="#" class="btn btn-warning">Taxi sin Cupo</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>

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
                    },4000);
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
                    },4000);
                }
            })
        })
    </script>
@endsection
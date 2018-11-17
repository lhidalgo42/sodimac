@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container">
        <div class="row">
            <form action="/taxi/create" method="post">
                @csrf
                <div class="form-group">
                    <label for="origen">Seleccione Origen</label>
                    <select class="form-control" id="origen" name="origen">
                        <option value="">Seleccine Origen</option>
                        @foreach($locations as $location)
                            <option value="{{$location->id}}">{{$location->name}} [{{$location->address}}]</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="destino">Seleccione Destino</label>
                    <select class="form-control" id="destino" name="destino">
                        <option value="">Seleccine Destino</option>
                        @foreach($locations as $location)
                            <option value="{{$location->id}}">{{$location->name}} [{{$location->address}}]</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="salida">Seleccione Fecha de Salida</label>
                    <input id="salida" name="salida" class="form-control" value="{{\Carbon\Carbon::now()->format('Y-m-d H:i')}}" />
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        $('#salida').datetimepicker({
            uiLibrary: 'bootstrap4',
            locale:"es-es",
            format:"yyyy-mm-dd HH:MM:SS"
        });
    </script>
@endsection
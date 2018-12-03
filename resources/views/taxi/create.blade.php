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
                    <label for="origen">N° de Pasajeros</label>
                    <select class="form-control" id="pasajeros" name="pasajeros">
                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4 [Taxi Completo]</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="origen">Seleccione Origen</label>
                    <select class="form-control" id="origen" name="origen">
                        <option value="">Seleccione Origen</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="destino">Seleccione Destino</label>
                    <select class="form-control" id="destino" name="destino">
                        <option value="">Seleccione Destino</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="salida">Seleccione Fecha de Salida</label>
                    <div class="col-xs-12" style="background-color: white">
                        <div id="date"></div>
                        <input type="hidden" name="date" id="realdate" value="{{date('Y-m-d H:i:s')}}">
                    </div>
                </div>
                <div class="form-group" style="padding-top: 50px">
                    <button type="submit" class="btn btn-success btn-block">Publicar Viaje</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript" src="/js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="/js/moment-with-locales.js"></script>
    <script type="text/javascript" src="/js/bootstrap-datetimepicker.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.8/dist/sweetalert2.all.min.js"></script>

    <script>
        $(function () {
            $('#date').datetimepicker({
                inline: true,
                sideBySide: true,
                locale: 'es',
                format: "yyyy-mm-dd H:i:s",
                minDate: new Date()

            });
            $('#date').data("DateTimePicker").maxDate(moment().endOf('week'));
            $('#date').on('dp.change', function(e){ $("#realdate").val(e.date.format("YYYY-MM-DD HH:mm:ss")); });
            $.ajax({
                url:"/api/locations",
                type:"get",
                success:function (data) {
                    $.each(data, function(i, item) {
                        $('#origen').append('<option value="'+item.id+'">'+item.name+' ['+item.address+']</option>');
                    });
                }
            });
            $('#origen').change(function () {
                $("#destino").html("");
                $.ajax({
                    url:"/api/locations/"+$(this).val(),
                    type:"get",
                    success:function (data) {
                        $('#destino').append('<option value="">Seleccione Destino</option>');
                        $.each(data, function(i, item) {
                            $('#destino').append('<option value="'+item.id+'">'+item.name+' ['+item.address+']</option>');
                        });
                    }
                })
            })
        });
        @if (Session::has('error'))
        swal({
            title: '{{Session::get('error')}}',
            text: "Existe un problema",
            type: 'error'
        });
        @endif
    </script>
@endsection

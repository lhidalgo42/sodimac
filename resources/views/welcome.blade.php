@extends('layouts.app')
@section('content')

    <div class="container">
        <table class="table table-hover table-bordered" id="taxis">
            <thead>
            <tr>
                <td>Hora de Salida</td>
                <td>Hora de LLegada</td>
                <td>Destino</td>
                <td>Cupos</td>
                <td>opciones</td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>9:00</td>
                <td>9:50</td>
                <td>Renca</td>
                <td>3/4</td>
                <td>
                    <button class="btn btn-primary">Subirse al taxi</button>
                </td>
            </tr>
            <tr>
                <td>9:30</td>
                <td>10:10</td>
                <td>Renca</td>
                <td>3/4</td>
                <td>
                    <button class="btn btn-primary">Subirse al taxi</button>
                </td>
            </tr>
            <tr>
                <td>9:40</td>
                <td>10:20</td>
                <td>Renca</td>
                <td>3/4</td>
                <td>
                    <button class="btn btn-primary">Subirse al taxi</button>
                </td>
            </tr>
            <tr>
                <td>10:00</td>
                <td>10:50</td>
                <td>Renca</td>
                <td>3/4</td>
                <td>
                    <button class="btn btn-primary">Subirse al taxi</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

@endsection
@section('css')
    <style>
        #taxis > tr > td{
            text-align: center;
        }
    </style>
@endsection
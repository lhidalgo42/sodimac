@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <form action="/taxi/create" method="post">
                @csrf

            </form>
        </div>
    </div>
@endsection
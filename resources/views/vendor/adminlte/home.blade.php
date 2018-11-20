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
								<tr>
									<td>{{\App\Models\User::find($taxi->user_id)->name}}</td>
									<td>{{Carbon\Carbon::parse($taxi->departure)->diffForHumans()}}</td>
									<td>{{$taxi->travel_time}}</td>
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
					<!-- /.box-body -->
				</div>
				<!-- /.box -->

			</div>
		</div>
	</div>
@endsection

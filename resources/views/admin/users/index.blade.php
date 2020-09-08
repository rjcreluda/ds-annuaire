@extends('layouts.dashboard')

@section('title', 'Liste des Utilsateurs')

@section('content')
	<h1 class="h3 mb-4 text-gray-800">Liste des Utilisateurs ({{ $users_count }})</h1>
	<div class="card shadow py3">
		<div class="card-body">
			@if( $users->count() > 0)
				<table class="table table-hover">
					<tr>
						<th>#</th>
						<th>Nom</th>
						<th>Address Email</th>
						<th>Phone</th>
						<th>Date d'inscription</th>
						<th>Action</th>
					</tr>
					@foreach( $users as $user )
					<tr>
						<td>{{ $user->id }}</td>
						<td>{{ $user->name }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ $user->profile->phone }}</td>
						<td>{{ $user->created_at->format('D, d M Y h:i A') }}</td>
						<td>
							<a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-success btn-circle btn-sm mr-1">
			                    <i class="fas fa-pen"></i>
			                </a>
			                @if( $user->id != auth()->user()->id )
			                <a href="#" class="btn btn-danger btn-circle btn-sm ml-1" onclick="document.querySelector('#form_{{ $user->id }}').submit()">
			                    <i class="fas fa-trash"></i>
			                </a>
			                <form id="form_{{ $user->id }}" action="{{ route('users.destroy', ['user' => $user->id] ) }}" method="POST">
			                	@csrf
			                	@method('DELETE')
			                </form>
			                @endif
						</td>
					</tr>
					@endforeach
				</table>
				{{ $users->links() }}
			@else
				<h3>No users found</h3>
			@endif
		</div>
	</div>
@endsection
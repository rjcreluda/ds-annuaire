@extends('layouts.dashboard')

@section('title', 'Modifier un Utilsateur')

@section('content')
	<h1 class="h3 mb-4 text-gray-800">Modifier un Utilisateur</h1>
	<div class="row">
		<div class="col-md-9">
			<div class="card shadow py3">
				<div class="card-body">
					<form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
						@csrf
						@method('PUT')
						<div class="form-group">
							<label for="name">Nom</label>
		                	<input type="text" name="name" class="form-control form-control-user" id="name" placeholder="Nom complet" value="{{ $user->name }}">
		                </div>
						<div class="form-group">
							<label for="email">Addresse Email</label>
		                  <input type="email" name="email" class="form-control form-control-user" id="email" placeholder="example@email.com" value="{{ $user->email }}">
		                </div>
		                <div class="form-group">
							<label for="phone">Téléphone</label>
						<input type="tel" name="phone" class="form-control form-control-user" id="phone" placeholder="+261320000000" value="{{ $user->profile->phone }}">
		                </div>
		                <div class="form-group">
							<label for="facebook">Facebook URL</label>
		                  	<input type="url" name="facebook" class="form-control form-control-user" id="facebook" placeholder="http://facebook.com/username" value="{{ $user->profile->facebook }}">
		                </div>
		                <div class="form-group">
							<label for="password">Nouveau mot de passe</label>
		                	<input type="password" name="password" class="form-control form-control-user" id="password">
		                </div>
		                <div class="form-group">
							<label for="password_confirmation">Confirmation</label>
		                	<input type="password" name="password_confirmation" class="form-control form-control-user" id="password_confirmation">
		                </div>
		                @if( auth()->user()->is_admin )
			                <div class="form-group">
								<label for="is_admin">Type d'utilisateur</label>
			                	<select name="is_admin" id="is_admin" class="form-control">
			                		<option value="0">Abonnée</option>
			                		<option value="1"
			                		@if( $user->is_admin )
										selected
			                		@endif
			                		>Administrateur du site</option>
			                	</select>
			                </div>
		                @endif
		                <button type="submit" class="btn btn-primary">
		                  Enregistrer
		                </button>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
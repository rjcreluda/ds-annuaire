@extends('layouts.dashboard')

@section('title', 'Ajouter un Utilsateur')

@section('content')
	<h1 class="h3 mb-4 text-gray-800">Nouveau Utilisateur</h1>
	<div class="row">
		<div class="col-md-9">
			<div class="card shadow py3">
				<div class="card-body">
					<form action="{{ route('users.store') }}" method="POST">
						@csrf
						<div class="form-group">
							<label for="name">Nom</label>
		                	<input type="text" name="name" class="form-control form-control-user" id="name" placeholder="Nom complet">
		                </div>
						<div class="form-group">
							<label for="email">Addresse Email</label>
		                  <input type="email" name="email" class="form-control form-control-user" id="email" placeholder="example@email.com">
		                </div>
		                <div class="form-group">
							<label for="password">Mot de passe</label>
		                	<input type="password" name="password" class="form-control form-control-user" id="password">
		                </div>
		                <div class="form-group">
							<label for="password_confirmation">Confirmation</label>
		                	<input type="password" name="password_confirmation" class="form-control form-control-user" id="password_confirmation">
		                </div>
		                <div class="form-group">
							<label for="is_admin">Type d'utilisateur</label>
		                	<select name="is_admin" id="is_admin" class="form-control">
		                		<option value="0">Abonnée</option>
		                		<option value="1">Administrateur du site</option>
		                	</select>
		                </div>
		                <button type="submit" class="btn btn-primary">
		                  Enregistrer
		                </button>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
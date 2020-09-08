@extends('layouts.main')

@section('title', 'Connexion ou Inscription')

@section('content')

<div class="row">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        
        <div class="card-signin my-5">
            <div class="card-body">
                <h5 class="card-title text-center">Se connecter</h5>
                <p>Connectez-vous sur votre compte pour gerer votre business</p>
                @include('include.message')
                <form class="form-signin" method="POST" action="{{ route('login') }}">
                	@csrf
                    <div class="form-label-group">
                        <label for="inputEmail">Addresse Email</label>
                        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>

                    </div>
                    <br>

                    <div class="form-label-group">
                        <label for="inputPassword">Mot de passe</label>
                        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>

                    </div>
                    <br>

                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" name="remember" class="custom-control-input" id="rememberCheckBox">
                        <label class="custom-control-label" for="rememberCheckBox">Se souvenir de moi</label>
                    </div>
                    <button class="btn btn-lg btn-info btn-block text-uppercase" type="submit">Connexion</button>

                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-5 col-lg-7">
        <div class="card-signin my-5">
            <div class="card-body">
                <h5 class="card-title text-center">S'inscrire à l'annuaire</h5>
                <p>Veuillez vous inscrire pour ajouter votre entreprise dans l'annuaire des professionnels de Diego Suarez Madagascar.</p>
                <form class="form-signin" method="POST" action="{{ route('users.store') }}">
                	@csrf
                    <div class="form-label-group">
                        <label for="name">Nom</label>
                        <input type="text" name="name" id="name" class="form-control" required autofocus>
                    </div><br>
                    <div class="form-label-group">
                        <label for="email">Addresse Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <br>
                    <div class="form-label-group">
                        <label for="phone">Téléphone</label>
                        <input type="tel" name="phone" id="phone" class="form-control" required>
                    </div>
                    <br>
                    <div class="form-label-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" id="password" class="form-control" required>

                    </div><br>
                    <div class="form-label-group">
                        <label for="password_confirmation">Confirmation du mot de passe</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                    </div>
                    <br>
                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="agreeCheckBox">
                        <label class="custom-control-label" for="agreeCheckBox">	J'accepte <a href="#">les
                            Conditions
                            d'utilisation</a> </label>
                    </div><br>
                    <button class="btn btn-lg btn-block text-uppercase" type="submit" id="signUpBtn">Inscription</button>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
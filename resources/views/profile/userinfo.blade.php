<form action="{{ route('user.profile.update', ['user' => $user->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row mt-5">

        <div class="col-md-4">
            <div class="user_details_row">Details de l'utilisateur</div>
            <div class="user_details_explain">Informations de contact</div>
        </div>
        <div class="col-md-8">
            <p>
                <label for="name">Nom</label>
                <input type="text" id="name" class="form-control" value="{{ $user->name }}" name="name">
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-8">
            <p>
                <label for="phone">Téléphone</label>
                <input type="text" id="phone" class="form-control" value="{{ $user->profile->phone}}" name="phone">
            </p>
            <p>
                <label for="email">Adresse email</label>
                <input type="text" id="email" class="form-control" value="{{ $user->email }}" name="email">
            </p>
            <p>
                <label for="facebook">Facebook</label>
                <input type="text" id="facebook" class="form-control" value="{{ $user->profile->facebook }}" name="facebook">
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-8"><button class="bg-danger btn-small text-light" type="submit">Mettre à Jour le Profil</button></div>
    </div>
    <!-- end details row-->
</form>

<form action="{{ route('user.password.update') }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row mt-5">
        <div class="col-md-4">
            <div class="user_details_row">Changer mot de passe</div>
            <div class="user_details_explain">Après avoir modifié le mot de passe, vous devrez vous identifier à nouveau.</div>
        </div>
        <div class="col-md-8">
            <p>
                <label for="old_password">Ancien Mot de Passe</label>
                <input type="password" id="old_password" class="form-control" name="old_password" required="">
                @if( session('pass_error') )
                    {{ session('pass_error') }}
                @endif
            </p>
        </div>

    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <p>
                <label for="new_pass">Nouveau</label>
                <input type="password" id="password" class="form-control"  name="password" required="">
            </p>
        </div>
        <div class="col-md-4">
            <p>
                <label for="password_confirmation">Confirmation</label>
                <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" required>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-8"><button class="bg-danger text-light" type="submit">Reinitialiser le mot de passe</button></div>
    </div>
    <!-- end PAssword row-->
</form>
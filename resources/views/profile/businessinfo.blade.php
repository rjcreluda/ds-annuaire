<form action="{{ route('user.listing.update', ['listing' => $listing->id]) }}" method="POST" enctype="multipart/form-data" id="listing-form">
    @csrf
    @method('PUT')
<div class="row mt-5">
    <div class="col-md-4">
        <div class="user_details_row">Description du Business</div>
        <div class="user_details_explain">Ajoutez la description de votre business.</div>
    </div>
    <div class="col-md-4">
        <p>
            <label for="listing_name">Nom</label>
            <input type="text" id="listing_name" class="form-control" value="{{ $listing->name }}" name="listing_name">
        </p>

    </div>
    <div class="col-md-4">
        <p>
            <label for="listing_category">Catégorie</label><br>
            <select name="listing_category" class="form-control" id="listing_category">
                @foreach( $categories as $cat )
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </p>
    </div>
</div><!-- end description row-->
<div class="row ">
    <div class="col-md-4">

    </div>
    <div class="col-md-8">
        <p>
            <label for="listing_description">Description</label>
            <textarea class="form-control" name="listing_description" id="listing_description" cols="30" rows="10">{{ $listing->description }}</textarea>
        </p>

    </div>
</div><!-- end details row-->

<div class="row mt-3">
    <div class="col-md-4">
        <div class="user_details_row">Information de contact</div>
        <div class="user_details_explain">Informations de contact de votre business.</div>
    </div>
    <div class="col-md-4">
        <p>
            <label for="listing_email">Adresse Email</label>
            <input type="text" id="listing_email" class="form-control" value="{{ $listing->email }}" name="listing_email">
        </p>
        <p>
            <label for="listing_address">Adresse de localisation</label>
            <input type="text" id="listing_address" class="form-control" value="{{ $listing->address }}" name="listing_address">
        </p>
    </div>
    <div class="col-md-4">
        <p>
            <label for="listing_phone">Téléphone</label>
            <input type="text" id="listing_phone" class="form-control" value="{{ $listing->phone }}" name="listing_phone">
        </p>
        <p>
            <label for="listing_website">Site web</label>
            <input type="text" id="listing_website" class="form-control" value="{{ $listing->website }}" name="listing_website">
        </p>
    </div>
</div><!-- end details row-->

 </form><!-- end listing form -->

<div class="row mt-3">
    <div class="col-md-4">
        <div class="user_details_row">Photo Gallerie</div>
        <div class="user_details_explain">Photos descrivant votre business</div>
    </div>
    <div class="col-md-8">
        <p>Selectionner au moin une photo</p>
        <input class="btn" type="file" name="image_uploads[]" id="image_upload" form="listing-form" multiple>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-4"></div>
    <div class="col-md-8">
        
            <div class="row">
                @if( $listing->photos->count() > 0)
                    @foreach( $listing->photos as $image )
                        <div class="col-md-4">
                            <div class="listing-image">
                                <input type="checkbox" class="image-checkbox" name="image_delete[]" value="{{ $image->id }}" form="delete-image-form">
                                <figure>
                                    <img class="img-fluid" src="{{ $image->getUrl() }}">
                                </figure>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="text-delete">
                        Opération pour la séléction: <input type="submit" class="btn btn-danger btn-sm text-light" id="button-delete" form="delete-image-form" value="Supprimer">
                    </div>
                </div>
            </div>
    </div>
</div><!-- photos gallery row -->

<div class="row mt-5">
    <div class="col-md-4"></div>
    <div class="col-md-8 pb-4"><button form="listing-form" class="bg-danger text-light" type="submit">Enregistrer les modifications</button></div>
</div>


<!-- form for deleting photos -->
<form action="{{ route('listing.photo.delete') }}" method="POST" id="delete-image-form">
    @csrf
    @method('DELETE')
</form><!-- end gallery form -->

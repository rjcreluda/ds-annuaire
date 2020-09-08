@extends('layouts.dashboard')

@section('title', 'Liste des Catégories')

@section('content')
	@isset( $slug )
		<h1 class="h3 mb-4 text-gray-800">Liste des {{ $slug }} ({{ $listings->count() }})</h1>
	@else
		<h1 class="h3 mb-4 text-gray-800">Liste des Annuaires ({{ $listing_count }})</h1>
	@endisset
	<div class="row">
		<div class="col-md-9">
			<div class="card shadow py3">
				<div class="card-body">
					@if( $listings->count() > 0)
						<table class="table table-hover">
							<tr>
								<th>#</th>
								<th>Annuaire</th>
								<th>Catégorie</th>
								<th>Contact</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
							@foreach( $listings as $listing )
							<tr>
								<td>{{ $listing->id }}</td>
								<td>{{ $listing->name }}</td>
								<td>{{ $listing->category->name }}</td>
								<td>{{ $listing->phone }}</td>
								<td>
									@if( $listing->status )
										publié
									@else
										en attente
									@endif
								</td>
								<td>
									<a href="{{ route('listings.edit', ['listing' => $listing->id]) }}" title="Modifier" class="btn btn-success btn-circle btn-sm mr-1" data-id="{{ $listing->id }}" data-name="{{ $listing->name }}">
					                    <i class="fas fa-pen"></i>
					                </a>
					                @if( auth()->user()->is_admin )
					                <a href="#" class="btn btn-danger btn-circle btn-sm ml-1 deleteButton" data-form="form_{{ $listing->id }}">
					                    <i class="fas fa-trash"></i>
					                </a>
					                <form id="form_{{ $listing->id }}" action="{{ route('categories.destroy', ['listing' => $listing->id] ) }}" method="POST">
					                	@csrf
					                	@method('DELETE')
					                </form>
					                @endif
								</td>
							</tr>
							@endforeach
						</table>
						@if ( !isset( $slug ) )
							{{ $listings->links() }}
						@endif
					@else
						<h3>Il n'y a pas encore des Annuaires</h3>
					@endif
				</div>
			</div>
		</div><!-- col-md-8 -->
		<div class="col-md-3">
			<div class="card shadow py3">
				<div class="card-header">
					<span id="form-title">Catégories</span>
				</div>
				<div class="card-body">
					<ul class="list-group list-group-flush">
							<li class="list-group-item d-flex justify-content-between">
								<a class="text-decoration-none" href="{{ route('listings.index')}}">
									<i class="fa fa-chevron-right"></i>	 Tous les catégories
								</a>
								<span class="badge badge-info">{{ $listing_count }}</span>
                            </li>
                        @foreach( $categories as $category )
                            <li class="list-group-item d-flex justify-content-between">
								<a class="text-decoration-none" href="{{ route('categories.show', ['category' => $category->slug])}}">
									<i class="fa fa-chevron-right"></i> {{ $category->name }}
								</a>
								<span class="badge badge-info">{{ $category->listings->count() }}</span>
                            </li>
                        @endforeach
                    </ul>
				</div>
			</div>
		</div>
	</div>

	
	<div class="modal" id="editModal" tabindex="-1" role="dialog">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	       <div class="modal-header">
	        <h5 class="modal-title">Modifier la categorie</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	       </div>
	       <form action="" method="POST" id="edit_form">
				@csrf
				@method('PUT')
	            <div class="modal-body">
		        	<div class="form-group">
						<label for="name">Nom</label>
		            	<input type="text" name="name" class="form-control form-control-user" id="new_name" required>
		            </div>
		        </div>
		        <div class="modal-footer">
		        	<button type="submit" class="btn btn-primary">Enregister</button>
		        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
		        </div>
	        </form>
	    </div>
	  </div>
	</div>


	<!-- SUPPRESSION CONFIRNATION MODAL -->
	<div class="modal" id="deleteModal" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title">Confirmation de suppression</h5>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<div class="modal-body">
				Etes-vous sur de vouloir supprimer ce categorie?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" id="btnDelete">Supprimer</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
			</div>
		  </div>
		</div>
	</div>
@endsection

@section('script')
	<script type="text/javascript">
		$('.editButton').click( function (e){
			e.preventDefault();
			var id = $(this).attr('data-id');
			$('#editModal').modal('toggle');
			$('#new_name').val( $(this).attr('data-name') );
			$('#edit_form').attr("action", "{{route('categories.index')}}/" + id);
		} );
		$('.deleteButton').click( function(e) {
			e.preventDefault();
			var form = $(this).attr('data-form');
			$('#deleteModal').modal('toggle');
			$('#btnDelete').click( function(){
				$('#'+form).submit();
			} );
		});
	</script>
@endsection
@extends('layouts.dashboard')

@section('title', 'Liste des Catégories')

@section('content')
	<h1 class="h3 mb-4 text-gray-800">Liste des Catégories ({{ $categories->count() }})</h1>
	<div class="row">
		<div class="col-md-8">
			<div class="card shadow py3">
				<div class="card-body">
					@if( $categories->count() > 0)
						<table class="table table-hover">
							<tr>
								<th>#</th>
								<th>Categorie</th>
								<th>Slug</th>
								<th>Action</th>
							</tr>
							@foreach( $categories as $category )
							<tr>
								<td>{{ $category->id }}</td>
								<td>{{ $category->name }}</td>
								<td>{{ $category->slug }}</td>
								<td>
								<a href="{{ route('categories.edit', ['category' => $category->id]) }}" title="Modifier" class="btn btn-success btn-circle mr-1 editButton" data-id="{{ $category->id }}" data-name="{{ $category->name }}">
					                    <i class="fas fa-pen"></i>
					                </a>
					                @if( auth()->user()->is_admin )
					                <a href="#" class="btn btn-danger btn-circle ml-1 deleteButton" data-form="form_{{ $category->id }}">
					                    <i class="fas fa-trash"></i>
					                </a>
					                <form id="form_{{ $category->id }}" action="{{ route('categories.destroy', ['category' => $category->id] ) }}" method="POST">
					                	@csrf
					                	@method('DELETE')
					                </form>
					                @endif
								</td>
							</tr>
							@endforeach
						</table>
					@else
						<h3>No categories yet</h3>
					@endif
				</div>
			</div>
		</div><!-- col-md-8 -->
		<div class="col-md-4">
			<div class="card shadow py3">
				<div class="card-header">
					<span id="form-title">Ajouter une nouvelle categorie</span>
				</div>
				<div class="card-body">
					<form action="{{ route('categories.store') }}" method="POST" id="category_form">
						@csrf
						<div class="form-group">
							<label for="name">Nom</label>
		                	<input type="text" name="name" class="form-control form-control-user" id="name" required>
		                </div>
		                <div class="form-group">
		                	<button type="submit" class="btn btn-primary">
			                  Enregistrer
			                </button>
		                </div>
		            </form>
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
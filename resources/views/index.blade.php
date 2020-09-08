@extends('layouts.main')

@section('title', 'Accueil')

@section('content')

<section class="welcome-text pt-5">
	<div class="container">
		<div class="row">
			<div class="col-ld-12 text-center">

				<h1>Annuaire des professionnels à Diego Suarez</h1>

				<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto esse exercitationem natus nihil optio quasi, sunt.
					Aspernatur deserunt dolor id mollitia placeat, repudiandae temporibus? Dolor eos in ipsam modi rem.</p>

			</div>
		</div>
	</div>
</section><!-- .welcome-text -->

<section class="category-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1>Catégories</h1>
				<p class="lead mb-5">Explorez certains des meilleurs endroits par catégories</p>
			</div>
		</div>
		<div class="row">
			@foreach($categories as $category)
				<div class="col-lg-3 col-md-4 col-sm-6">
					<div class="category-item blue-bg text-center">
						<a href="{{ route('front.category.single', ['slug' => $category->slug]) }}">
							<h4>{{ $category->name }}</h4>
						</a>
					</div>
				</div><!-- end col -->
			@endforeach
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- .categories -->

<section class="news">
	<div class="row">
		<div class="col-md-12 text-center">
			<h1>Nouveautés</h1>
			<p class="lead">Decouvrez notre dernier annuaires </p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="news-wrapper slick-slider">
				@foreach( $listings as $listing )
			<a class="card" href="{{ route('front.listing.single', ['category_slug' => $listing->category->slug, 'id' => $listing->id]) }}">
					<img class="card-img-top" src="{{ $listing->photos[0]->getUrl() }}">
						<div class="card-body">
							<h5 class="Card-title">{{ $listing->name }}</h5>
							<p class="card-subtitle text-muted small">{{ $listing->category->name }}</p>
							<p class="card-text mt-1">
								{{ substr($listing->description, 0, 50) }}
							</p>
						</div>
						<ul class="list-group border-0 mb-3">
							<li class="list-group-item list-group-flush border-0 pt-0">
								<i class="icon-map-marker position-absolute"></i>
								<span class="ml-4">59 Rue Colbert</span>
							</li>
							<li class="list-group-item list-group-flush border-0 pt-0">
								<i class="icon-phone position-absolute"></i>
								<span class="ml-4">+261 32 00 000 00</span>
							</li>
						</ul>

					</a>
				@endforeach
			</div>
		</div>
	</div>
</section><!-- .news -->

@endsection
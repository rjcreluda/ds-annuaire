@extends('layouts.main')

@section('title', 'Accueil')

@section('content')


<!--=====================================
    BEGIN CONTENT
=======================================--> 
<div class="container py-5">
    <div class="row my-5">
        <div class="col-md-9 col-sm-12">
            <div class="row no-gutters mb-3">
                <h2>{{ $category }}</h2>
                <div class="col-md-12">
                    <div class="item-sorting-wrap">
                        <span class="title">Pages 1 sur 20 résultats</span>
                    </div>
                </div>
            </div>
            <!-- >Begin row -->
            <div class="row mb-4">
            	@foreach($listings as $listing)
	            	<!-- >col -->
	                <div class="col-md-4 col-12 mb-4">
	                	<a class="card" href="single-listing.html">
		                    <img class="card-img-top" src="{{ $listing->photos[0]->getUrl() }}">
		                    <div class="card-body">
		                        <h5 class="Card-title">{{$listing->name}}</h5>
		                        <p class="card-subtitle text-muted small">{{$listing->category->name}}</p>
		                        <p class="card-text mt-1">
		                            {{ substr($listing->description, 0, 50) }}
		                        </p>
		                    </div>
		                    <ul class="list-group border-0 mb-3">
		                        <li class="list-group-item list-group-flush border-0 pt-0">
		                            <i class="icon-map-marker position-absolute"></i>
		                            <span class="ml-4">{{ $listing->address }}</span>
		                        </li>
		                        <li class="list-group-item list-group-flush border-0 pt-0">
		                            <i class="icon-phone position-absolute"></i>
		                            <span class="ml-4">{{ $listing->phone }}</span>
		                        </li>
		                    </ul>
	                	</a>
	            	</div><!-- /end col -->
            	@endforeach
                
            </div><!-- /end row -->

            <!-- >Begin Pagination -->
            <div class="row">
                <div class="col-md-12 d-flex flex-row justify-content-center">
	                <nav aria-label="Page navigation">
	                	{{ $listings->links() }}
	            	</nav>
	            </div>
            </div><!-- /end pagination -->
        </div>
        <div class="col-md-3 col-sm-12">
            <div class="sidebar-widget-area">
                <div class="widget widget-box-padding widget-latest-article">
                    <h3 class="widget-title">Catégories</h3>
                    <ul class="block-list">
                        <li class="single-item"><a href="#"><i class="icon-chevron-right mr-1"></i> Summer Crop</a></li>
                        <li class="single-item"><a href="#"><i class="icon-chevron-right mr-1"></i> Nutritionertilizer</a></li>
                        <li class="single-item"><a href="#"><i class="icon-chevron-right mr-1"></i> Summer Crop </a></li>
                        <li class="single-item"><a href="#"><i class="icon-chevron-right mr-1"></i> Nutritionertilizer</a></li>
                        <li class="single-item"><a href="#"><i class="icon-chevron-right mr-1"></i> Summer Crop </a></li>
                        <li class="single-item"><a href="#"><i class="icon-chevron-right mr-1"></i> Nutritionertilizer</a></li>
                        <li class="single-item"><a href="#"><i class="icon-chevron-right mr-1"></i> Summer Crop </a></li>
                        <li class="single-item"><a href="#"><i class="icon-chevron-right mr-1"></i> Nutritionertilizer</a></li>
                    </ul>
                </div><!-- / widget category -->
                <div class="widget widget-contact-info">
                    <div class="bg-icon">
                        <i class="flaticon-phone-call"></i>
                    </div>
                    <h4 class="item-title">Plus d'information?</h4>
                    <p>Veuillez nous contactez</p>
                    <div class="contact-number">+261 32 XX XXX XX</div>
                    <div class="contact-number">contact@email.com</div>
                </div><!-- / widget contact -->
                <div class="widget widget-box-padding widget-poster">
                    <h4 class="item-title">Promotion</h4>
                    <div class="item-img">
                        <img src="images/sidebar-figure.jpg" alt="Poster" class="img-fluid">
                    </div>
                </div><!-- / widget prmotion -->
            </div>
        </div>
    </div>
</div>


<!--=====================================
    END CONTENT
=======================================-->

@endsection
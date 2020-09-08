@extends('layouts.main')

@section('title', 'Mon profile')

@section('content')

<div class="row no-gutters">
        <div class="col-md-2 user-menu-wrapper">
            <ul class="nav nav-pills" id="tab_menu" role="tablist">
                <li><a data-toggle="pill" href="#user_profile" role="tab" aria-controls="user_profile" aria-selected="true">Mon Profil</a></li>
                @if( ! Auth::user()->is_admin )
                    <li class="active"><a data-toggle="pill" href="#user_business" role="tab" aria-controls="user_business" aria-selected="false">Mon Business</a></li>
                @endif
                <li><a data-toggle="pill" href="#">Deconnexion</a></li>
            </ul>
        </div><!-- .user_menu_wrapper -->

        <div class="col-md-8 user-content-wrapper pl-5">
            <h2>Bienvenue  {{ $user->name }}</h2>
            @include('include.message')
            <div class="tab-content">
                <div id="user_profile" class="tab-pane fade show active" role="tabpanel">
                    @include('profile.userinfo')
                </div><!-- end #user_profile -->
                @if( ! Auth::user()->is_admin )
                    <div id="user_business" class="tab-pane fade" role="tabpanel">
                        @include('profile.businessinfo')
                    </div><!-- end #user_business -->
                @endif
            </div><!-- end tab-content -->

        </div><!-- user content wrapper -->

    </div><!-- main row -->

@endsection


@section('script')
    <script type="text/javascript">
        $(document).ready( function() {
            // Hidding text delete
            $('.text-delete').css('visibility', 'hidden');
            // Toggling checkbox on image click
            var checked_elements = 0;
            $('.listing-image').click( function() {
                var checkbox = $(this).children( '.image-checkbox' );
                
                if( checkbox.attr('checked') ){
                    checkbox.attr( 'checked', false );
                    checked_elements --;
                }
                else{
                    checkbox.attr( 'checked', true );
                    checked_elements++;
                }
                // Show hide delete button if selected elements > 0
                if( checked_elements > 0 ){
                    $('.text-delete').css('visibility', 'visible');
                }
                else{
                    $('.text-delete').css('visibility', 'hidden');
                }
            } );
        });
    </script>
@endsection
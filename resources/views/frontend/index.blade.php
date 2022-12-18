@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">

          <!-- ***** Banner Start ***** -->
          <div class="main-banner">
            <div class="row">
              <div class="col-lg-7">
                <div class="header-text">
                  <h6>Welcome To Cyborg</h6>
                  <h4><em>Browse</em> Our Popular Films Here</h4>
                  <div class="main-button">
                    <a href="#">Browse Now</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ***** Banner End ***** -->

          <!-- ***** Most Popular Start ***** -->
          <div class="most-popular">
            <div class="row">
              <div class="col-lg-12">
                <div class="heading-section">
                  <h4><em>Most Popular</em> Films</h4>
                </div>
                <div class="row" id="films-section"> 
                </div>
              </div>
            </div>
          </div>
          <!-- ***** Most Popular End ***** -->
 
        </div>
      </div>
    </div>
  </div>
  @endsection
  @section('script')
  <script>
    jQuery(document).ready(function($){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });   
        $.ajax({
            type: 'get',
            url: '{{ route("films.index") }}', 
            dataType: 'json',
            success: function (data) {
                var films = data.data;
                var film = "";
                for(var i=0; i<films.length; i++){

                    film_genre = "";
                    var str = films[i].description;
                    if(str.length > 10) str = str.substring(0,100);
                    var films_genre = films[i].genre;
                    for(var j=0; j<films_genre.length; j++){
                        film_genre += '<b>'+films_genre[j]+' </b>,';
                    }
                    film +='<div class="col-lg-4 col-sm-6">\
                        <div class="item">\
                        <img src="'+films[i].photo+'" alt="">\
                        <h4>'+films[i].name+'<br></h4>\
                        <ul><li><i class="fa fa-star"></i> '+films[i].rating+'</li></ul>\
                        <div class="description"><p>'+str+'</p></div>\
                        <div class="btn btn-outline-secondary">'+film_genre+'</div><br><br>\
                        <div class="view"><a class="btn btn-primary" href="films/'+films[i].slug+'"><i class="fa fa-eye"></i> View Film </a></div>\
                        </div>\
                    </div>';

                }
                $("#films-section").html(film); 
                console.log(data);
            }
        });
    });

  </script>
  @endsection
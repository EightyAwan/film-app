@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">
        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif                                          
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
                <div class="row"> 
                    <div class="col-lg-12 col-sm-12"> 
                        <div class="item"> 
                        <img src="{{ asset($film->photo) }}" alt=""> 
                        <h4>{{ $film->name }}<br></h4> 
                        <ul><li><i class="fa fa-star"></i> {{ $film->rating }} </li></ul>  
                        <div class="description"><p>{{ $film->description }}</p></div>  
                            @foreach($film->genre as $val)
                                <div class="btn btn-outline-secondary"> {{ $val }} </div> 
                            @endforeach 
                            <div class="release-date"><p>Release Date: {{ $film->release_date }}</p></div> 
                            <div class="ticket-price"><p>Ticket Price: {{ $film->ticket_price }} PKR</p></div> 
                        </div> 
                        
                    </div>
                    <hr>
                    <div class="col-lg-12 col-sm-12">
                    <h4>Recent comments</h4>
                    <br>  
                    <ul class="list-group">    
                        @foreach($film->comments as $comment)
                                <li class="list-group-item">
                                    <b>{{ $comment->name }}</b> | <span>{{ $comment->created_at->diffForHumans() }}</span> 
                                    <br>
                                    <p>{{ $comment->comment }}</p>
                                <li>
                        @endforeach   
                    </ul>
                    </div>

                </div>
              </div>
            </div>
            <div class="row">

                @if(Auth::user())
                    <div class="comment-section">
                        <div class="comment-add">
                        <form action="{{ route('comments.store') }}" method="post">
                            {{ @csrf_field() }}
                            <input type="hidden" name="film_id" value="{{ $film->id }}">
                            <div class="form-group">
                                <label for="email">Name:</label>
                                <input type="text" class="form-control" name="name" placeholder="Your Name" required>
                            </div>
                            <div class="form-group">
                                <label for="comment">Comment:</label>
                                <textarea class="form-control" name="comment" placeholder="Write Your Comment" required></textarea>
                            </div> 
                            <br>    
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        </div>
                    </div>
                @else
                    <div class="comment-guest-message">
                        <p>Please <a href="{{ route('login') }}">sign-in</a> yourself to add comment.</p>
                    </div>
                @endif

                </div> 

          </div>
          <!-- ***** Most Popular End ***** -->
          
        </div>
      </div>
    </div>

  </div>
  @endsection 
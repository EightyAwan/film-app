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
          <div class="most-popular">
           
            <div class="row"> 
                <h3>Create A New Film</h3>
                    <div class="comment-section">
                        <div class="comment-add">
                        <form action="{{ route('films.store') }}" method="post" enctype='multipart/form-data'>
                            {{ @csrf_field() }} 
                            <div class="form-group">
                                <label for="email">Name:</label>
                                <input type="text" class="form-control" name="name" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Photo:</label>
                                <input type="file" class="form-control" name="photo" placeholder="Photo" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Genre:</label>
                                <select class="form-control" name="genre[]" multiple>
                                    <option value="" disabled selected>Select Genre</option>
                                    <option value="Comedy">Comedy</option>
                                    <option value="Fighting">Fighting</option>
                                    <option value="Horror">Horror</option>
                                    <option value="Romantic">Romantic</option>
                                    <option value="Story Based">Story Based</option>
                                </select> 
                            </div>
                            <div class="form-group">
                                <label for="email">Ticket Price:</label>
                                <input type="number" class="form-control" name="ticket_price" placeholder="Ticket Price" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Rating:</label>
                                <select class="form-control" name="rating">
                                    <option value="" disabled selected>Select Rating</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email">Release Date:</label>
                                <input type="date" class="form-control" name="release_date" placeholder="Please Date" required>
                            </div>
                            <div class="form-group">
                                <label for="dcription">Description:</label>
                                <textarea class="form-control" name="description" placeholder="Description" required></textarea>
                            </div> 
                            <br>    
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
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
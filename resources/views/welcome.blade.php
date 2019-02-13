@extends('layouts.frontend.app')
@section('slider')
<section class="site-hero overlay" data-stellar-background-ratio="0.5" style="background-image: url({{asset('assets/frontend/images/big_image_1.jpg')}});">
      <div class="container">
        <div class="row align-items-center site-hero-inner justify-content-center">
          <div class="col-md-12 text-center">

            <div class="mb-5 element-animate">
              <h1>Welcome To<?php if(isset(Auth::user()->name)){ ;?>
                {{Auth::user()->name
              }}
              <?php } ?> Our Luxury Rooms</h1>
              <p>Discover our world's #1 Luxury Room For VIP.</p>
              {{-- <p><a href="booknow.html" class="btn btn-primary">Book Now</a></p> --}}
            </div>

          </div>
        </div>
      </div>
    </section>
@endsection
@section('rooms')
    <section class="site-section">
      <div class="container">
        <div class="row"><h2 class="heading">Chose Your Room</h2></div>
        <div class="row">
          @foreach ($rooms as $room)
            <div class="col-md-4 mb-4">
              <div class="media d-block room mb-0">
                <figure>
                  <img src="{{ Storage::url('rooms/'.$room->image)}}" alt="Generic placeholder image" class="img-fluid">
                  <div class="overlap-text">
                    <span>
                      Featured Room 
                      <span class="ion-ios-star"></span>
                      <span class="ion-ios-star"></span>
                      <span class="ion-ios-star"></span>
                    </span>
                  </div>

                  <div class="overlap-text" style="float: right;
margin-left: 238px;">
                    @if ($room->available == false)
                      <span>
                        UNAVAILABLE
                      </span>
                    @else
                    <span>
                      Available
                    </span>
                    @endif
                    
                  </div>

                </figure>
                <div class="media-body">
                  <h3 class="mt-0"><a href="#">{{ $room->title }}</a></h3>
                  <ul class="room-specs">
                    <li><span class="ion-ios-people-outline"></span> {{ $room->guest }} Guests</li>
                    <li><span class="ion-ios-crop"></span> {{ $room->area }} ft <sup>2</sup></li>
                  </ul>
                  {!! $room->body !!}
                  <p><a href="{{ route('customer.bookpage',$room->id) }}" class="btn btn-primary btn-sm">Book Now From ${{ $room->price }}</a></p>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>

@endsection
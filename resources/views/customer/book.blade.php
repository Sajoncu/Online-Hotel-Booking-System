@extends('layouts.frontend.app')
@section('slider')
{{--     <section class="site-hero site-hero-innerpage overlay" data-stellar-background-ratio="0.5" style="background-image: url({{asset('assets/frontend/images/big_image_1.jpg')}});">
 --}}      
<section class="site-hero site-hero-innerpage overlay" data-stellar-background-ratio="0.5" style="background-image: url({{ Storage::url('rooms/'.$room->image)}});">
 <div class="container">
        <div class="row align-items-center site-hero-inner justify-content-center">
          <div class="col-md-12 text-center">

            <div class="mb-5 element-animate">
              <h1>Reservation</h1>
              <p>Discover our world's, Luxury Room For VIP.</p>
            </div>

          </div>
        </div>
      </div>
    </section>
@endsection
@section('rooms')
{{-- <section class="site-hero site-hero-innerpage overlay" data-stellar-background-ratio="0.5" style="background-image: url(images/big_image_1.jpg);">
  <div class="container">
    <div class="row align-items-center site-hero-inner justify-content-center">
      <div class="col-md-12 text-center">

        <div class="mb-5 element-animate">
          <h1>Reservation</h1>
          <p>Discover our world's #1 Luxury Room For VIP.</p>
        </div>
      </div>
    </div>
  </div>
</section> --}}
<!-- END section -->

<section class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2 class="mb-5">Reservation Form</h2>
            <form action="{{ route('customer.booking') }}" method="post">
              @csrf
              <div class="row">
                  <div class="col-sm-6 form-group">
                      <input type="hidden" name="room_id" value="{{ $room->id }}"/>
                      <label for="">Arrival Date</label>
                      <div style="position: relative;">
                        <span class="fa fa-calendar icon" style="position: absolute; right: 10px; top: 10px;"></span>
                        <input type="date" class="form-control" id="arrival_date" name="arrival_date" />
                      </div>
                  </div>

                  <div class="col-sm-6 form-group">
                      
                      <label for="">Departure Date</label>
                      <div style="position: relative;">
                        <span class="fa fa-calendar icon" style="position: absolute; right: 10px; top: 10px;"></span>
                        <input type="date" class="form-control" id='departure_date' name="departure_date" />
                      </div>
                  </div>
                  
              </div>


              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="room">Room</label>
                  <select name="room_number" id="room_number" class="form-control">
                    <option value="{{ $room->room_number }}">{{ $room->room_number }} Room</option>
                  </select>
                </div>

                <div class="col-md-6 form-group">
                  <label for="room">Guests</label>
                  <select name="guest" id="guest" class="form-control">
                    <option value="{{$room->guest}}">{{$room->guest}} Guest</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                  <label for="email">Email</label>
                  <input type="email" id="email" class="form-control " name="email">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                  <label for="phone">Phone</label>
                  <input type="text" id="phone" class="form-control " name="phone">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                  <label for="message">Write a Note</label>
                  <textarea name="note" id="message" class="form-control " cols="30" rows="8"></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  @if ($room->available == false)
                    <button type="button" class="btn btn-primary" onclick="available();return false;">Unavailable</button>
                  @else
                  @guest
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Login And Reserve</button>
                  @else
                      <input type="submit" value="Reserve Now" class="btn btn-primary">
                  @endguest
                  @endif
                </div>
              </div>
            </form>

          </div>
          <div class="col-md-1"></div>
          <div class="col-md-5">
            <h3 class="mb-5">Featured Room</h3>
            <div class="media d-block room mb-0">
          <figure>
            <img src="{{asset('assets/frontend/images/img_1.jpg')}}" alt="Generic placeholder image" class="img-fluid">
            <div class="overlap-text">
              <span>
                Featured Room 
                <span class="ion-ios-star"></span>
                <span class="ion-ios-star"></span>
                <span class="ion-ios-star"></span>
              </span>
            </div>
          </figure>
          <div class="media-body">
            <h3 class="mt-0"><a href="#">Presidential Room</a></h3>
            <ul class="room-specs">
              <li><span class="ion-ios-people-outline"></span> 2 Guests</li>
              <li><span class="ion-ios-crop"></span> 22 ft <sup>2</sup></li>
            </ul>
            <p>Nulla vel metus scelerisque ante sollicitudin. Fusce condimentum nunc ac nisi vulputate fringilla. </p>
            <p><a href="#" class="btn btn-primary btn-sm">Book Now From $20</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- END section -->





<section class="section-cover" data-stellar-background-ratio="0.5" style="background-image: url({{asset('assets/frontend/images/img_5.jpg')}});">
  <div class="container">
    <div class="row justify-content-center align-items-center intro">
      <div class="col-md-9 text-center element-animate">
        <h2>Relax and Enjoy your Holiday</h2>
        <p class="lead mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto quidem tempore expedita facere facilis, dolores!</p>
        <div class="btn-play-wrap"><a href="https://vimeo.com/channels/staffpicks/93951774" class="btn-play popup-vimeo "><span class="ion-ios-play"></span></a></div>
      </div>
    </div>
  </div>
</section>
<!-- END section -->
@endsection
@push('js')
<script>
  function available(){
    alert('Room is not available :(');
  }
</script>
@endpush
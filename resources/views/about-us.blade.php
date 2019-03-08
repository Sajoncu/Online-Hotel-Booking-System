@extends('layouts.frontend.app')
@section('slider')
    <section class="site-hero site-hero-innerpage overlay" data-stellar-background-ratio="0.5" style="background-image: url({{asset('assets/frontend/images/big_image_1.jpg')}});">
      <div class="container">
        <div class="row align-items-center site-hero-inner justify-content-center">
          <div class="col-md-12 text-center">

            <div class="mb-5 element-animate">
              <h1>About Luxury Hotel</h1>
              <p>Discover our world's #1 Luxury Room For VIP.</p>
            </div>

          </div>
        </div>
      </div>
    </section>
    <!-- END section -->
@endsection
@section('rooms')
<section class="site-section">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-4">
        <div class="heading-wrap  element-animate">
          <h4 class="sub-heading">Stay with our luxury rooms</h4>
          <h2 class="heading">Our Story</h2>
          <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus illo similique natus, a recusandae? Dolorum, unde a quibusdam est? Corporis deleniti obcaecati quibusdam inventore fuga eveniet! Qui delectus tempore amet!</p>

          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus illo similique natus, a recusandae? Dolorum, unde a quibusdam est? Corporis deleniti obcaecati quibusdam inventore fuga eveniet! Qui delectus tempore amet!</p>

          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus illo similique natus, a recusandae? Dolorum, unde a quibusdam est? Corporis deleniti obcaecati quibusdam inventore fuga eveniet! Qui delectus tempore amet!</p>

        </div>
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-7">
        <img src="{{asset('assets/frontend/images/f_img_1.png')}}" alt="Image placeholder" class="img-md-fluid">
      </div>
    </div>
  </div>
</section>
<!-- END section -->





<section class="site-section bg-light">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-12 heading-wrap text-center">
        <h4 class="sub-heading">Our Kind Staff</h4>
          <h2 class="heading">Our Staff</h2>
      </div>
    </div>
    <div class="row ">
      <div class="col-md-4">
        <div class="post-entry">
          <img src="{{asset('assets/frontend/images/person_1.jpg')}}" alt="Image placeholder" class="img-fluid">
          <div class="body-text">
            <div class="category">Staff</div>
            <h3 class="mb-3"><a href="#">Michelle Aguilar</a></h3>
            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum deserunt illo quis similique dolore voluptatem culpa voluptas rerum, dolor totam.</p>
            <p><a href="#" class="btn btn-primary btn-outline-primary btn-sm">Read Bio</a></p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="post-entry">
          <img src="{{asset('assets/frontend/images/person_2.jpg')}}" alt="Image placeholder" class="img-fluid">
          <div class="body-text">
            <div class="category">Staff</div>
            <h3 class="mb-3"><a href="#">Chris Standworth</a></h3>
            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum deserunt illo quis similique dolore voluptatem culpa voluptas rerum, dolor totam.</p>
            <p><a href="#" class="btn btn-primary btn-outline-primary btn-sm">Read Bio</a></p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="post-entry">
          <img src="{{asset('assets/frontend/images/person_3.jpg')}}" alt="Image placeholder" class="img-fluid">
          <div class="body-text">
            <div class="category">Cook</div>
            <h3 class="mb-3"><a href="#">Rob McDonald</a></h3>
            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum deserunt illo quis similique dolore voluptatem culpa voluptas rerum, dolor totam.</p>
            <p><a href="#" class="btn btn-primary btn-outline-primary btn-sm">Read Bio</a></p>
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
@extends('layouts.backend.app')
@section('title', 'Post Details')

@push('css')

@endpush

@section('content')
        <div class="container-fluid">
            <a href="{{ route('admin.allbooking')}}" class="btn btn-danger waves-effect">Back</a>
            @if ($book->is_approve == false)
                <button type="button" onclick="bookingApprove({{ $book->id }})" class="btn btn-success pull-right">
                    <i class="material-icons">done</i>
                       <span>Approve</span>
                </button>
                <form method="post" id="aprove-form" action="{{ route('admin.booking.approve', $book->id) }}" style="display: none;">
                    @csrf
                    @method('PUT')
                </form>
            @else
                <button type="button" class="btn btn-success pull-right" disabled="">
                    <i class="material-icons">done</i>
                       <span>Approved</span>
                </button>
            @endif
            <br><br>
            <!-- Vertical Layout | With Floating Label -->
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header bg-blue">
                                <h2>
                                    {{ $book->title }}
                                    <small>Booked By <strong><a href="">{{$book->user->name}}</a></strong> on {{ $book->created_at->toFormattedDateString() }}</small>
                                </h2>
                            </div>
                            <div class="body">
                                <strong>Arrival Date:</strong> {!! $book->arrival_date !!} <br><br>
                                <strong>Departure Date:</strong> {!! $book->departure_date !!}
                                <?php
                                    $date1 = new DateTime($book->arrival_date);
                                    $date2 = new DateTime($book->departure_date);
                                    $interval = $date1->diff($date2);
                                    $extra = ($book->room->price+$book->room->price*0.3)*$interval->d;
                                    echo "<br><br>";
                                    echo "<strong>Per night cost: </strong>".$book->room->price."$";
                                    echo "<br><br>";
                                    echo "<strong>Vat:</strong> 30%";
                                    echo "<br><br>";
                                    echo "<strong>Total: </strong>".
                                    number_format((float)$extra, 2, '.', '')."$";  
                                ?>

                                <button class="btn btn-success  pull-right" onclick="checkout({{ $book->id }})">CHECK OUT</button>

                                <form method="post" id="checkout-form" action="{{ route('admin.booking.checkout') }}" style="display: none;">
                                    @csrf
                                    <input type="hidden" name="total_price" value="<?php echo $extra;?>">
                                    <input type="hidden" name="book_id" value="<?php echo $book->id;?>">
                                    <input type="hidden" name="room_id" value="<?php echo $book->room->id;?>">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header bg-cyan">
                                <h2>
                                    Total Guest
                                </h2>
                            </div>
                            <div class="body">
                                
                                    <span class="label bg-blue">{{ $book->guest }}</span>
                            </div>
                        </div>
                        <div class="card">
                            <div class="header bg-cyan">
                                <h2>
                                    Room Number
                                </h2>
                            </div>
                            <div class="body">
                                
                                    <span class="label bg-blue">{{ $book->room_number }}</span>
                                
                            </div>
                        </div>
                        <div class="card">
                            <div class="header bg-cyan">
                                <h2>
                                    Fitured Image
                                </h2>
                            </div>
                            <div class="body">
                                <img class="img-responsive thumbnail" src="{{ Storage::url('rooms/'.$book->room->image)}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Vertical Layout | With Floating Label -->

        </div>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.32.4/dist/sweetalert2.all.min.js"></script>

    <script>
        function bookingApprove(id){
            const swalWithBootstrapButtons = Swal.mixin({
              confirmButtonClass: 'btn btn-success',
              cancelButtonClass: 'btn btn-danger',
              buttonsStyling: false,
            })

            swalWithBootstrapButtons({
              title: 'Are you sure?',
              text: "You want to approve this booking!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Yes, Approve it!',
              cancelButtonText: 'No, cancel!',
              reverseButtons: true
            }).then((result) => {
              if (result.value) {
                  document.getElementById('aprove-form').submit();
              } else if (
                // Read more about handling dismissals
                result.dismiss === Swal.DismissReason.cancel
              ) {
                swalWithBootstrapButtons(
                  'Cancelled',
                  'Your imaginary file is safe :)',
                  'error'
                )
              }
            })

        }

        function checkout(id){
            const swalWithBootstrapButtons = Swal.mixin({
              confirmButtonClass: 'btn btn-success',
              cancelButtonClass: 'btn btn-danger',
              buttonsStyling: false,
            })

            swalWithBootstrapButtons({
              title: 'Are you sure?',
              text: "You want to checkout",
              type: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Yes, I want to :)',
              cancelButtonText: 'No, cancel!',
              reverseButtons: true
            }).then((result) => {
              if (result.value) {
                  document.getElementById('checkout-form').submit();
              } else if (
                // Read more about handling dismissals
                result.dismiss === Swal.DismissReason.cancel
              ) {
                swalWithBootstrapButtons(
                  'Cancelled',
                  'Your imaginary file is safe :)',
                  'error'
                )
              }
            })

        }
    </script>
@endpush
@extends('layouts.backend.app')
@section('title', 'Post Details')

@push('css')

@endpush

@section('content')
        <div class="container-fluid">
            <a href="{{ route('admin.room.index')}}" class="btn btn-danger waves-effect">Back</a>
            @if ($room->is_approved == false)
                <button type="button" onclick="postApprove({{$room->id}})" class="btn btn-success pull-right">
                    <i class="material-icons">done</i>
                       <span>Approve</span>
                </button>
                <form method="post" id="aprove-form" action="{{ route('admin.room.approve', $room->id) }}" style="display: none;">
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
                                    {{ $room->title }}
                                    <small>Posted By <strong><a href="">{{$room->user->name}}</a></strong> on {{ $room->created_at->toFormattedDateString() }}</small>
                                </h2>
                            </div>
                            <div class="body">
                                {!! $room->body !!}
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
                                
                                    <span class="label bg-blue">{{ $room->guest }}</span>
                            </div>
                        </div>
                        <div class="card">
                            <div class="header bg-cyan">
                                <h2>
                                    Room Number
                                </h2>
                            </div>
                            <div class="body">
                                
                                    <span class="label bg-blue">{{ $room->room_number }}</span>
                                
                            </div>
                        </div>
                        <div class="card">
                            <div class="header bg-cyan">
                                <h2>
                                    Fitured Image
                                </h2>
                            </div>
                            <div class="body">
                                <img class="img-responsive thumbnail" src="{{ Storage::url('rooms/'.$room->image)}}" alt="">
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
        function postApprove(id){
            const swalWithBootstrapButtons = Swal.mixin({
              confirmButtonClass: 'btn btn-success',
              cancelButtonClass: 'btn btn-danger',
              buttonsStyling: false,
            })

            swalWithBootstrapButtons({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Yes, delete it!',
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
    </script>
@endpush
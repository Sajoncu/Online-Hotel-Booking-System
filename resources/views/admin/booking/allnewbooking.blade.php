@extends('layouts.backend.app')
@section('title', 'Post')

@push('css')
    <link href="{{asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="block-header">
{{--         <a class="btn btn-primary waves-effect" href="{{route('admin.booking.create')}}">
            <i class="material-icons">add</i><span>Add New Room</span>
        </a> --}}
    </div>
            <!-- Exportable Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        All New Booking 
                        <span class="badge bg-blue">
                            {{$books->count()}}
                        </span>
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Customer Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Is_Approved</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Customer Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Is_Approved</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($books as $key=>$book)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $book->user->name }}</td>
                                        <td>{{ $book->user->email }}</td>
                                        <td>{{ $book->phone }}</td>
                                        <td>
                                            @if ($book->is_approved == true)
                                                <span class="badge bg-blue">Approved</span>
                                            @else
                                                <span class="badge bg-pink">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($book->status == true)
                                                <span class="badge bg-blue">Published</span>
                                            @else
                                                <span class="badge bg-pink">Pending</span>
                                            @endif
                                        </td>
                                        <td>{{ $book->created_at->toFormattedDateString() }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-info waves-effect" href="{{route('admin.booking.show', $book->id)}}">
                                                <i class="material-icons">visibility</i>
                                            </a>
{{--                                             <a class="btn btn-info waves-effect" href="{{route('admin.booking.approve', $book->id)}}">
                                                <i class="material-icons">done</i>
                                            </a> --}}
                                            @if ($book->is_approve == false)
                                                <button type="button" onclick="bookingApprove({{ $book->id }})" class="btn btn-success">
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
                                            <button class="btn btn-danger waves-effect" type="button" onclick="deleteRoom({{ $book->id }})">
                                                <i class="material-icons">delete</i>
                                            </button>

                                            <form method="post" id="delete-form-{{ $book->id }}" action="{{ route('admin.booking.destroy', $book->id) }}" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <!-- #END# Exportable Table -->
@endsection

@push('js')
<!-- Jquery DataTable Plugin Js -->
    <script src="{{asset('assets/backend/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/backend/js/pages/tables/jquery-datatable.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.32.2/dist/sweetalert2.all.min.js"></script>

    <script>
        function deleteRoom(id){
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
                document.getElementById('delete-form-'+id).submit();
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
    </script>
@endpush
@extends('layouts.backend.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>DASHBOARD</h2>
    </div>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Admin Profile Settings
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another action</a></li>
                            <li><a href="javascript:void(0);">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
{{--                     <li role="presentation" class="active">
                        <a href="#home_with_icon_title" data-toggle="tab">
                            <i class="material-icons">home</i> HOME
                        </a>
                    </li> --}}
                    <li role="presentation" class="active">
                        <a href="#profile_with_icon_title" data-toggle="tab">
                            <i class="material-icons">face</i> PROFILE
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#settings_with_icon_title" data-toggle="tab">
                            <i class="material-icons">lock</i> Password
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#messages_with_icon_title" data-toggle="tab">
                            <i class="material-icons">email</i> MESSAGES
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
{{--                     <div role="tabpanel" class="tab-pane fade in active" id="home_with_icon_title">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                    
                                    <div class="body">
                                        <img src="{{Storage::url('agent/'.Auth::user()->image)}}" class="img-responsive" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
 --}}
                    {{-- profile --}}
                    <div role="tabpanel" class="tab-pane fade in active" id="profile_with_icon_title">
                        <div class="row clearfix">
                            <div class="col col-lg-8">
                                <form class="form-horizontal" method="post" action="{{ route('admin.profile.update')}}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="email_address_2">Name :</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" id="email_address_2" class="form-control" name="name" value="{{Auth::user()->name}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="email_address_2">Email Address :</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" id="email_address_2" class="form-control" name="email" value="{{Auth::user()->email}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="phone">Phone:</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" id="phone" class="form-control" name="phone" value="{{Auth::user()->phone}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        

                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="skype">Skype:</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" id="skype" class="form-control" name="skype" value="{{Auth::user()->skype}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

{{--                                         <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="mobile">Mobile:</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" id="mobile" class="form-control" name="mobile" value="{{Auth::user()->mobile}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="email_address_2">Profile Picture :</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="file" name="image">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

{{--                                         <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="email_address_2">About :</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <textarea row="5" class="form-control" name="about">{{Auth::user()->about}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
 --}}
                                        <div class="row clearfix">
                                            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                                <button type="submit" class="btn btn-danger m-t-15 waves-effect">UPDATE</button>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                            <div class="col col-lg-4">
                                
                                <div class="card">
                                    
                                    <div class="body">
                                        <img src="{{Storage::url('admin/'.Auth::user()->image)}}" class="img-responsive" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!--password tab-->
                    <div role="tabpanel" class="tab-pane fade" id="settings_with_icon_title">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="header">
                                        <h2>Change Password</h2>
                                    </div>
                                    <div class="body">
                                <form class="form-horizontal" method="post" action="{{ route('admin.password.update')}}">
                                    @csrf
                                    @method('PUT')

                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="old_password">Old Password :</label>
                                    </div>

                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" name="old_password" id="old_password" class="form-control" placeholder="Enter your old password">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password">New Password :</label>
                                    </div>
                                    
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your new password">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="confirm_password">Confirm Password :</label>
                                    </div>
                                    
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" id="confirm_password" name="password_confirmation" class="form-control" placeholder="Enter your new password">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-danger m-t-15 waves-effect">UPDATE</button>
                                    </div>
                                </div>
                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- message pane --}}
                    <div role="tabpanel" class="tab-pane fade" id="messages_with_icon_title">
                        <b>Message Content</b>
                        <p>
                            Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation electram moderatius.
                            Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent aliquid
                            pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere gubergren
                            sadipscing mel.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection

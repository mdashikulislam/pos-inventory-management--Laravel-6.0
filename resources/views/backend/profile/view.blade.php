@extends('backend.layouts.app')
@section('maincontent')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage Profile</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-4 offset-md-4" >
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                         src="{{$profile->image ? url('uploads/user_images/'.$profile->image ) : '/uploads/no-image.png'}}">
                                </div>

                                <h3 class="profile-username text-center">{{$profile->name}}</h3>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td width="30%">User Type</td>
                                            <td>{{ucfirst($profile->usertype)}}</td>
                                        </tr>
                                        <tr>
                                            <td>Name</td>
                                            <td>{{$profile->name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>{{$profile->email}}</td>
                                        </tr>
                                        <tr>
                                            <td>Mobile</td>
                                            <td>{{$profile->mobile ? $profile->mobile: 'No Mobile number found'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Gender</td>
                                            <td>{{$profile->gender ? ucfirst($profile->gender) : 'No Gender found' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td>{{$profile->address ? $profile->address : 'No Address found' }}</td>
                                        </tr>

                                    </tbody>
                                </table>
                                <a href="{{route('profile.edit',['id'=> $profile->id])}}" class="btn btn-success btn-block mt-2"><i class="fas fa-edit"></i> <b>Edit Profile</b></a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </section>
                    <!-- right col -->
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection



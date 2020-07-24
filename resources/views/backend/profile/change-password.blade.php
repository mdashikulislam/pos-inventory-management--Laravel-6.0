@extends('backend.layouts.app')
@section('maincontent')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage Password</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Change Password</li>
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
                    <section class="col-lg-12">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card">
                            <div class="card-header">
                                <h3>
                                    <i class="fas fa-edit mr-1"></i>
                                    Change Password

                                </h3>

                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{route('password.update')}}" method="post" id="myForm">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-md-4 form-group">
                                            <label for="password">Current Password</label>
                                            <input type="password" name="current_password" id="current_password" class="form-control">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="password">New Password</label>
                                            <input type="password" name="password" id="password" class="form-control">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="password_confirmation">Confirm New Password</label>
                                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" >
                                        </div>
                                        <div class="form-group col-md-6" >
                                            <input type="submit" class="btn btn-primary" value="Submit">
                                        </div>
                                    </div>
                                </form>
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
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
@section('js')
    <script src="{{asset('backend/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('backend/plugins/jquery-validation/additional-methods.min.js')}}"></script>
    <script>
        $(function () {


            $('#myForm').validate({
                rules: {

                    current_password:{
                        required: true,
                        minlength: 8,
                        maxlength: 20,
                    },
                    password: {
                        required: true,
                        minlength: 8,
                        maxlength: 20,

                    },
                    password_confirmation:{
                        required:true,
                        minlength: 8,
                        maxlength: 20,
                        equalTo: '#password'
                    }
                },
                messages: {

                    current_password: {
                        required: "Please provide current password",
                        minlength: "Your password must be at least 8 characters long",
                        maxlength: "Your password must be upto 20 characters long"
                    },
                    password: {
                        required: "Please provide new password",
                        minlength: "Your password must be at least 8 characters long",
                        maxlength: "Your password must be upto 20 characters long",

                    },
                    password_confirmation:{
                        required: "Please provide confirm password",
                        minlength: "Your password must be at least 8 characters long",
                        maxlength: "Your password must be upto 20 characters long",
                        equalTo: "Confirm password dose not match"
                    }
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endsection

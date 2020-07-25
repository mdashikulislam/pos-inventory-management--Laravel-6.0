@extends('backend.layouts.app')
@section('maincontent')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage Suppliers</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Suppliers</li>
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
                                    <i class="fas fa-plus mr-1"></i>
                                    Add Suppliers
                                    <a href="{{route('customer.view')}}" class="btn btn-success float-right"> <i class="fas fa-list fa-fw mr-1"></i>Customer List</a>
                                </h3>

                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{route('customer.store')}}" method="post" id="myForm">
                                    @csrf
                                    <div class="form-row">

                                        <div class="col-md-6 form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" id="name" class="form-control" style="@if($errors->has('name')) border-color:red; @endif" value="{{old('name')}}">
                                            <p style="color: red;">{{$errors->has('name') ? $errors->first('name'):''}}</p>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email" class="form-control" style="@if($errors->has('email')) border-color:red; @endif" value="{{old('email')}}">
                                            <p style="color: red;">{{$errors->has('email') ? $errors->first('email'):''}}</p>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="mobile">Mobile No</label>
                                            <input type="number" name="mobile" id="mobile" class="form-control" style="@if($errors->has('email')) border-color:red; @endif" value="{{old('mobile')}}">
                                            <p style="color: red;">{{$errors->has('mobile') ? $errors->first('mobile'):''}}</p>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="address">Address</label>
                                            <input type="text" name="address" id="mobile" class="form-control" style="@if($errors->has('email')) border-color:red; @endif" value="{{old('address')}}">
                                            <p style="color: red;">{{$errors->has('address') ? $errors->first('address'):''}}</p>
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
                    name:{
                        required:true,
                        maxlength: 255
                    },
                    email: {
                        required: true,
                        email: true,
                        maxlength: 32

                    },
                    mobile:{
                        required: true,
                    },
                    address:{
                        required: true,
                    }
                },
                messages: {
                    name:{
                        required:'Please enter name',
                        maxlength:'Your name must be upto 255 characters long'
                    },
                    email: {
                        required: "Please enter a email address",
                        email: "Please enter a vaild email address",
                        maxlength:"Your email must be upto 32 characters long"
                    },
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
    </script><script>
        $(function () {
            $('#myForm').validate({
                rules: {
                    name:{
                        required:true,
                        maxlength: 255
                    },
                    email: {
                        required: true,
                        email: true,
                        maxlength: 32

                    },
                    mobile:{
                        required: true,
                    },
                    address:{
                        required: true,
                    }
                },
                messages: {
                    name:{
                        required:'Please enter name',
                        maxlength:'Your name must be upto 255 characters long'
                    },
                    email: {
                        required: "Please enter a email address",
                        email: "Please enter a vaild email address",
                        maxlength:"Your email must be upto 32 characters long"
                    },
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

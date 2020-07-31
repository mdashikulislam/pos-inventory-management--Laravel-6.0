@extends('backend.layouts.app')
@section('maincontent')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit Profile</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Edit Profile</li>
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
                                    Edit Profile

                                </h3>

                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{route('profile.update',['id'=>$profile->id])}}" method="post" id="myForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">

                                        <div class="col-md-4 form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" id="name" class="form-control" style="@if($errors->has('name')) border-color:red; @endif" value="{{$profile->name}}">
                                            <p style="color: red;">{{$errors->has('name') ? $errors->first('name'):''}}</p>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email" class="form-control" style="@if($errors->has('email')) border-color:red; @endif" value="{{$profile->email}}">
                                            <p style="color: red;">{{$errors->has('email') ? $errors->first('email'):''}}</p>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="mobile" >Mobile No</label>
                                            <input type="number" name="mobile" id="mobile" class="form-control" style="@if($errors->has('mobile')) border-color:red; @endif" value="{{$profile->mobile}}" placeholder="01521458894">
                                            <p style="color: red;">{{$errors->has('mobile') ? $errors->first('mobile'):''}}</p>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="usertype">Gender</label>
                                            <select name="gender" id="gender" class="form-control" style="@if($errors->has('gender')) border-color:red; @endif">
                                                <option value="">Select Gender</option>
                                                <option value="male" {{$profile->gender == 'male' ? "selected":''}}>Male</option>
                                                <option value="female" {{$profile->gender == 'female' ? "selected":''}}>Female</option>
                                            </select>

                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="address">Address</label>
                                            <input type="text" name="address" id="address" class="form-control" style="@if($errors->has('name')) border-color:red; @endif" value="{{$profile->address}}">

                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="image">Upload Image</label>
                                            <input name="image" type="file" class="form-control" id="image"  style="padding-top: 3px!important;">
                                        </div>

                                        <div class="col-md-2 form-group">
                                            <img id="showImage" src="{{(!empty($profile->image))? url('/uploads/user_images/'.$profile->image) : url('/uploads/no-image.png')}}" style="width: 150px; height: 160px;border: 1px solid #000;">
                                        </div>
                                        <div class="form-group col-md-6" style="margin-top: 50px;">
                                            <input type="submit" class="btn btn-primary" value="Update Profile">
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
    <script type="text/javascript">
        $(document).ready(function () {
            $('#image').change(function (e) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
    <script>

        $(function () {
            $('#myForm').validate({
                rules: {
                    usertype:{
                        required:true
                    },
                    name:{
                        required:true,
                        maxlength:255,

                    },
                    email: {
                        required: true,
                        email: true,
                        maxlength:255
                    },
                },
                messages: {
                    usertype:{
                        required: "Please select Role "
                    },
                    name:{
                        required:'Please enter name',
                        maxlength:'Your name must be upto 255 characters long'
                    },
                    email: {
                        required: "Please enter a email address",
                        email: "Please enter a vaild email address",
                        maxlength:"Your email must be upto 255 characters long"
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

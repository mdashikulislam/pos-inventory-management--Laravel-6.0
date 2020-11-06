@extends('backend.layouts.app')

@section('maincontent')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage Products</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Products</li>
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
                                    Add Products
                                    <a href="{{route('product.view')}}" class="btn btn-success float-right"> <i class="fas fa-list fa-fw mr-1"></i>Products List</a>
                                </h3>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{route('product.store')}}" method="post" id="myForm">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-md-6 form-group">
                                            <label for="supplier">Supplier Name</label>
                                            <select name="supplier" id="supplier" class="form-control" style="@if($errors->has('usertype')) border-color:red; @endif">
                                                <option value="">Select Supplier</option>
                                                @foreach($suppliers as $supplier)
                                                <option value="{{$supplier->id}}" >{{$supplier->name}}</option>
                                                @endforeach
                                            </select>
                                            <p style="color: red;">{{$errors->has('supplier') ? $errors->first('supplier'):''}}</p>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="unit">Unit Name</label>
                                            <select name="unit" id="unit" class="form-control" style="@if($errors->has('usertype')) border-color:red; @endif">
                                                <option value="">Select Unit</option>
                                                @foreach($units as $unit)
                                                    <option value="{{$unit->id}}" >{{$unit->name}}</option>
                                                @endforeach
                                            </select>
                                            <p style="color: red;">{{$errors->has('unit') ? $errors->first('unit'):''}}</p>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="category">Categories Name</label>
                                            <select name="category" id="category" class="form-control" style="@if($errors->has('usertype')) border-color:red; @endif">
                                                <option value="">Select Category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}" >{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                            <p style="color: red;">{{$errors->has('category') ? $errors->first('category'):''}}</p>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" id="name" class="form-control" style="@if($errors->has('name')) border-color:red; @endif" value="{{old('name')}}">
                                            <p style="color: red;">{{$errors->has('name') ? $errors->first('name'):''}}</p>
                                        </div>

                                        <div class="form-group col-md-6" >
                                            <input type="submit" class="btn btn-primary" value="Create">
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
                    supplier:{
                        required:true,
                    },
                    unit: {
                        required: true,

                    },
                    category:{
                        required: true,
                    },
                    name:{
                        required: true,
                    }
                },
                messages: {

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
    <script>
        $(document).ready(function (){
            $('#supplier').select2({
                theme: 'bootstrap4'
            });
            $('#category').select2({
                theme: 'bootstrap4'
            });
            $('#unit').select2({
                theme: 'bootstrap4'
            });
        });
    </script>

@endsection

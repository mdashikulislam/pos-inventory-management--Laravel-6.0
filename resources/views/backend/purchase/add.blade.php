@extends('backend.layouts.app')

@section('maincontent')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage Purchase</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Purchase</li>
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
                                    Add Purchase
                                    <a href="{{route('purchase.view')}}" class="btn btn-success float-right"> <i class="fas fa-list fa-fw mr-1"></i>Purchase List</a>
                                </h3>
                            </div><!-- /.card-header -->
                            <div class="card-body">

                                    <div class="form-row">
                                        <div class="col-md-4 form-group">
                                            <label for="date">Date</label>
                                            <input type="text" class="form-control datepicker" id="date" placeholder="YYYY-MM-DD" readonly>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="">Purchase No</label>
                                            <input type="text" class="form-control" name="purchase_no" id="purchase_no" placeholder="Purchase No">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="supplier">Supplier Name</label>
                                            <select name="supplier" id="supplier" class="form-control" style="@if($errors->has('usertype')) border-color:red; @endif">
                                                <option value="">Select Supplier</option>
                                                @foreach($suppliers as $supplier)
                                                    <option value="{{$supplier->id}}" >{{$supplier->name}}</option>
                                                @endforeach
                                            </select>
                                            <p style="color: red;">{{$errors->has('supplier') ? $errors->first('supplier'):''}}</p>
                                        </div>

                                        <div class="col-md-5 form-group">
                                            <label for="category">Categories Name</label>
                                            <select name="category" id="category" class="form-control" style="@if($errors->has('usertype')) border-color:red; @endif">
                                            </select>
                                            <p style="color: red;">{{$errors->has('category') ? $errors->first('category'):''}}</p>
                                        </div>
                                        <div class="col-md-5 form-group">
                                            <label for="category">Product Name</label>
                                            <select name="product" id="product" class="form-control" style="@if($errors->has('usertype')) border-color:red; @endif">
                                                <option value="">Select Product</option>
                                                @foreach($products as $product)
                                                    <option value="{{$product->id}}" >{{$product->name}}</option>
                                                @endforeach
                                            </select>
                                            <p style="color: red;">{{$errors->has('product') ? $errors->first('product'):''}}</p>
                                        </div>
                                        <div class="form-group col-md-2" style="margin-top: 30px;">
                                            <p style="width: 100%" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add More</p>
                                        </div>
                                    </div>

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
        $(function (){
            $(document).on('change','#supplier',function (){
                var supplierId = $(this).val();
                $.ajax({
                    url:"{{route('supplier.get')}}",
                    method:'GET',
                    data:{supplier_id:supplierId},
                    success:function (response){
                        var html = '<option>Please Select Categories</option>';
                        $.each(response,function (key, value){
                            html +='<option value="'+value.category_id+'">'+value.category_id+'</option>';
                        });
                        $('#category').html(html);
                    }
                });
            });
        });
    </script>
    <script>
        $('.datepicker').datepicker({
            uiLibrary:'bootstrap4',
            format:'yyyy-mm-dd'
        });
    </script>

@endsection

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
                                                <option value="">Please Select Categories</option>
                                            </select>
                                            <p style="color: red;">{{$errors->has('category') ? $errors->first('category'):''}}</p>
                                        </div>
                                        <div class="col-md-5 form-group">
                                            <label for="category">Product Name</label>
                                            <select name="product" id="product" class="form-control" style="@if($errors->has('usertype')) border-color:red; @endif">
                                                <option value="">Please Select Product</option>
                                            </select>
                                            <p style="color: red;">{{$errors->has('product') ? $errors->first('product'):''}}</p>
                                        </div>
                                        <div class="form-group col-md-2" style="margin-top: 30px;">
                                            <button style="width: 100%" class="btn btn-success addEventMore"><i class="fa fa-plus-circle"></i> Add More</button>
                                        </div>
                                    </div>

                            </div><!-- /.card-body -->
                            <div class="card-body">
                                <form action="{{route('purchase.store')}}" method="POST">
                                    @csrf
                                    <table class="table-sm table-bordered" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Category</th>
                                                <th>Product Name</th>
                                                <th width="7%">Qty</th>
                                                <th width="10%">Unit Price</th>
                                                <th>Description</th>
                                                <th width="15%">Total Price</th>
                                                <th width="5%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="addRow" class="addRow">

                                        </tbody>
                                        <tbody>
                                            <tr>
                                                <td colspan="5"></td>
                                                <td>
                                                    <input name="estimated_amount" id="estimated_amount" type="text" class="form-control form-control-sm text-right estimated_amount" value="0" readonly style="background: #00d75e;color: #fff;font-size: 18px;">
                                                </td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <div class="form-group">
                                        <button type="submit" class="btn  btn-primary" id="storeButton">Purchase Store</button>
                                    </div>
                                </form>
                            </div>
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
    <script src="{{asset('backend/plugins/sweetalert2/sweetalert2.all.js')}}"></script>
    <script src="{{asset('backend/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('backend/plugins/jquery-validation/additional-methods.min.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function (){
            $(document).on('click','.addEventMore',function (){
                var date = $('#date').val();
                var purchaseNo = $('#purchase_no').val();
                var supplierId = $('#supplier').val();
                var categoryId = $('#category').val();
                var categoryName = $('#category').find('option:selected').text();
                var productId = $('#product').val();
                var productName = $('#product').find('option:selected').text();

                if (productId ===''){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Product Name is required',
                    });
                }
                if (categoryId === ''){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Category Name is required',
                    });
                }
                if (supplierId === ''){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Supplier Name is required',
                    });
                }
                if (purchaseNo === ''){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Purchase No is required',
                    });
                }
                if (date === ''){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Date is required',
                    });
                }
                if (date !== '' && purchaseNo !=='' && supplierId !=='' && categoryId!== '' && productId !==''){
                    var source = $('#document-template').html();
                    var template = Handlebars.compile(source);
                    var data = {
                        date:date,
                        purchaseNo:purchaseNo,
                        supplierId:supplierId,
                        categoryId:categoryId,
                        categoryName:categoryName,
                        productId:productId,
                        productName:productName,
                    }
                    var html = template(data);
                    $('#addRow').append(html);
                }
            });
            $(document).on('click','.removeEventMore',function (event){
                $(this).closest('.delete_add_more_item').remove();
                totalAmountOfPrice();
            });

            $(document).on('keyup click','.unit_price,.buying_qty',function (){
                var unitPrice = $(this).closest('tr').find('input.unit_price').val();
                var buyQty = $(this).closest('tr').find('input.buying_qty').val();
                var totalPrice = parseFloat(unitPrice) * parseFloat(buyQty);
                $(this).closest('tr').find('input.buying_price').val(totalPrice);
                totalAmountOfPrice();
            });
            function totalAmountOfPrice(){
                var sum = 0;
                $('.buying_price').each(function (){
                    var value = $(this).val();
                    if (!isNaN(value) && value.length !==0){
                        sum +=parseFloat(value);
                    }
                });
                $('#estimated_amount').val(sum);
            }
        });
    </script>
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
                        $('#category').empty();
                        $('#product').empty();
                        var html = '<option value="">Please Select Categories</option>';
                        $('#product').html('<option value="">Please Select Product</option>');
                        $.each(response,function (key, value){
                            html +='<option value="'+value.category_id+'">'+value.categories.name+'</option>';
                        });
                        $('#category').html(html);
                    }
                });
            });
            $(document).on('change','#category',function (){
                var categoryId = $(this).val();
                $.ajax({
                    url:'{{route('category.get')}}',
                    method:'GET',
                    data: {category_id:categoryId},
                    success:function (response){
                        $('#product').empty();
                        var productName = '<option value="">Please Select Product</option>'
                        $.each(response,function (key, value){
                            productName += '<option value="'+value.id+'">'+value.name+'</option>'
                        });
                        $('#product').html(productName);
                    }
                });
            });
        });
    </script>
    <script id="document-template" type="text/x-handlebars-template">
        <tr class="delete_add_more_item" id="delete_add_more_item">
            <input type="hidden" name="date[]" value="@{{ date }}">
            <input type="hidden" name="purchase_no[]" value="@{{purchaseNo  }}">
            <input type="hidden" name="supplier_id[]" value="@{{supplierId}}">
            <td>
                <input type="hidden" name="category_id[]" value="@{{ categoryId }}">
                @{{ categoryName }}
            </td>
            <td>
                <input type="hidden" name="product_id[]" value="@{{ productId }}">
                @{{ productName }}
            </td>
            <td>
                <input type="number"  class="form-control form-control-sm text-right buying_qty"  name="buying_qty[]" value="1">
            </td>
            <td>
                <input type="number"  class="form-control form-control-sm text-right unit_price" name="unit_price[]" value="0">
            </td>

            <td>
                <input type="text" name="description[]" class="form-control-sm form-control">
            </td>
            <td>
                <input type="text" class="form-control text-right form-control-sm buying_price" name="buying_price[]" value="0" readonly style="background: #00d75e;color: #fff;font-size: 18px;">
            </td>
            <td>
                <a class="btn btn-danger removeEventMore" style="color: #fff">
                    <i class="fa fa-trash"></i>
                </a>

            </td>
        </tr>
    </script>
    <script>
        $('.datepicker').datepicker({
            uiLibrary:'bootstrap4',
            format:'yyyy-mm-dd'
        });
    </script>

@endsection

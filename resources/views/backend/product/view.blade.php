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
                                    <i class="fas fa-list mr-1"></i>
                                    Products List
                                    <a href="{{route('product.add')}}" class="btn btn-success float-right"> <i class="fas fa-plus-circle fa-fw"></i>Add Product</a>
                                </h3>

                            </div><!-- /.card-header -->
                            <div class="card-body">
                                {{--                                @include('message')--}}
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Supplier Name</th>
                                        <th>Category</th>
                                        <th>Name</th>
                                        <th>Unit</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>@if($loop->index + 1 <10){{'0'.($loop->index+1)}}@endif @if($loop->index + 1 > 9){{($loop->index+1)}}@endif</td>
                                            <td>{{$product->suppliers->name}}</td>
                                            <td>{{$product->categories->name}}</td>
                                            <td> {{$product->name}}</td>
                                            <td> {{$product->units->name}}</td>
                                            @php
                                                $purchase_count = \App\Purchase::where('product_id',$product->id)->count();
                                            @endphp
                                            <td>
                                                <a title="Edit" href="{{route('product.edit',['id'=>$product->id])}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                                @if($purchase_count < 1)
                                                <a title="Delete" href="{{route('product.delete',['id'=>$product->id])}}" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>
                                                    @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th>Supplier Name</th>
                                        <th>Category</th>
                                        <th>Name</th>
                                        <th>Unit</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
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
@section('css')
    <link rel="stylesheet" href="{{asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection
@section('js')
    <script src="{{asset('/backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend//plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
    </script>
    <script type="text/javascript">
        $(function () {
            $(document).on('click','#delete',function (e) {
                e.preventDefault();
                var link = $(this).attr('href');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You wan't to delete user",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        window.location.href = link;
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            })
        });
    </script>
@endsection

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
                                    Pending Purchase List

                                </h3>

                            </div><!-- /.card-header -->
                            <div class="card-body">
                                {{--                                @include('message')--}}
                                <table id="example1" class="display nowrap table table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Purchase No</th>
                                        <th>Date</th>
                                        <th>Supplier Name</th>
                                        <th>Category</th>
                                        <th>Product Name</th>
                                        <th>Description</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Buying Price</th>
                                        <th>Status</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($purchases as $purchase)
                                        <tr>
                                            <td>@if($loop->index + 1 <10){{'0'.($loop->index+1)}}@endif @if($loop->index + 1 > 9){{($loop->index+1)}}@endif</td>
                                            <td>{{$purchase->purchase_no}}</td>
                                            <td>{{$purchase->date}}</td>
                                            <td> {{$purchase->suppliers->name}}</td>
                                            <td> {{$purchase->categories->name}}</td>
                                            <td> {{$purchase->products->name}}</td>
                                            <td> {{$purchase->description ?$purchase->description: 'Empty' }}</td>
                                            <td> {{$purchase->buying_qty}} {{$purchase->products->units->name}}</td>
                                            <td> {{$purchase->unit_price}}</td>
                                            <td> {{$purchase->bying_price}}</td>
                                            <td> <span class="badge @if($purchase->status =='0')badge-danger @elseif($purchase->status =='1')badge-success @endif">@if($purchase->status =='0'){{__('Pending')}}@elseif($purchase->status == '1'){{__('Approved')}}@endif</span></td>

                                        </tr>
                                    @endforeach
                                    </tbody>

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
        $(document).ready(function (){
            $("#example1").removeAttr('width').DataTable({
                scrollX:true,
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

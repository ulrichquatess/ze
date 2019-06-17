@extends('layouts.master')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                @include('flash::message');
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All Order</h3>
                    </div>
                    <!-- /.box-header -->
                    <div style="margin-left: 890px">
                        <a href="{{ route('admin.orders.create')}}" class="btn btn-primary btn-group-xs active" role="button">Creat New Orders</a>

                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID </th>
                                <th>Person Name </th>
                                <th>Phone Number</th>
                                <th>Location</th>
                                <th>Delivered</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>

                                    <td>{{ $order->name }}</td>

                                    <td>{{ $order->phone }}</td>

                                    <td>{{  $order->location }}</td>

                                    @if($order->delivered != null)
                                        <td>Order Delivered</td>
                                    @else
                                        <td>Order Pending</td>
                                    @endif

                                    <td><a href="{{ route('admin.orders.edit', $order->id) }}"><div class="btn btn-xs btn-default"><i class="fa fa-pencil-square-o"></i> Edit</div></a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['admin.orders.destroy', $order->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID </th>
                                <th>Person Name </th>
                                <th>Phone Number</th>
                                <th>Location</th>
                                <th>Delivered</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

    <!--== BOTTOM FLOAT ICON ==-->


@stop

@section('scripts')

@stop
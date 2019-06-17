@extends('layouts.master')

@section('content')


    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-globe"></i> {{ $order->name }}
                    <small class="pull-right">{{ $order->created_at }}</small>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                Location
                <address>
                    <strong>{{ $order->location }}</strong><br>
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <b>Phone Number</b><br>
                <b>{{ $order->phone }}</b>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
                <p class="lead">Food Ordered:</p>

                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    @foreach ($order->listings as $listing)
                        <option value="1" {{ $listing->food == null ? 'selected' : '' }}>{{ $listing->food1 }}</option>
                        <option value="1" {{ $listing->food != null ? 'selected' : '' }}>{{ $listing->food2 }}</option>
                     @endforeach
                </p>
            </div>

        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-xs-12">
                <a  target="_blank" class="btn btn-default"><i class="fa fa-print"></i> View</a>

                <a type="button" href="{{ route('admin.orders.index') }}" class="btn btn-primary pull-right" style="margin-right: 5px;">
                    <i class="fa fa-remove"></i> Cancel
                </a>
            </div>
        </div>

    </section>

    <!-- /.content -->
    <div class="clearfix"></div>


@endsection
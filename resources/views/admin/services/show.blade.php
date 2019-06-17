@extends('layouts.master')

@section('content')


    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="service-header">
                    <i class="fa fa-globe"></i> {{ $service->name }}
                    <small class="pull-right">{{ $service->created_at }}</small>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                Title
                <address>
                    <strong>{{ $service->title }}</strong><br>
                </address>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-12">
                <p class="lead">Content:</p>
                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    {{ $service->body }}
                </p>

                <img src="{{ asset('images/services/' .$service->image)}}" alt="Service Image">
            </div>

        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-xs-12">
                <a  target="_blank" class="btn btn-default"><i class="fa fa-print"></i> View</a>

                <a type="button" href="{{ route('admin.services.index') }}" class="btn btn-primary pull-right" style="margin-right: 5px;">
                    <i class="fa fa-remove"></i> Cancel
                </a>
            </div>
        </div>

    </section>

    <!-- /.content -->
    <div class="clearfix"></div>


@endsection
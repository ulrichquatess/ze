@extends('layouts.master')

@section('content')


    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-globe"></i> {{ $page->name }}
                    <small class="pull-right">{{ $page->created_at }}</small>
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
                    <strong>{{ $page->title }}</strong><br>
                </address>
            </div>
            <!-- /.col -->
            @if($page->sub_title != null)
            <div class="col-sm-4 invoice-col">
                <b>Sub Title</b><br>
                <b>{{ $page->sub_title }}</b>
            </div>
            @endif
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-12">
                <p class="lead">Content:</p>
                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    {{ $page->body }}
                </p>
            </div>

        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-xs-12">
                <a  target="_blank" class="btn btn-default"><i class="fa fa-print"></i> View</a>

                <a type="button" href="{{ route('admin.pages.index') }}" class="btn btn-primary pull-right" style="margin-right: 5px;">
                    <i class="fa fa-remove"></i> Cancel
                </a>
            </div>
        </div>

    </section>

    <!-- /.content -->
    <div class="clearfix"></div>


@endsection
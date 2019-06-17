@extends('layouts.master')

@section('content')


    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-globe"></i> {{ $listing->name }}
                    <small class="pull-right">{{ $listing->created_at }}</small>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                Email
                <address>
                    <strong>{{ $listing->email }}</strong><br>
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                Location
                <address>
                    <strong>{{ $listing->location }}</strong><br>
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <b>Phone Number</b><br>
                <b>{{ $listing->phone }}</b>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Food 1</th>
                        <th>Food 2</th>
                        <th>Food 3</th>
                        <th>Food 4</th>
                        <th>Food 5</th>
                        <th>Food 6</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td> {{ $listing->food1 }}</td>
                        <td>{{ $listing->food2 }}</td>
                        <td>{{ $listing->food3 }}</td>
                        <td>{{ $listing->food4 }}</td>
                        <td>{{ $listing->food5 }}</td>
                        <td>{{ $listing->food6 }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
                <p class="lead">Restaurant Description:</p>

                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                   {{ $listing->description }}
                </p>
            </div>
            <!-- /.col --><br><br>
            <div class="col-xs-6">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th style="width:50%">Address:</th>
                            <td>{{ $listing->address }}</td>
                        </tr>
                        @if($listing->facebook != null)
                        <tr>
                            <th>Facebook: </th>
                            <td>{{ $listing->facebook }}</td>
                        </tr>
                        @endif

                        @if($listing->website != null)
                        <tr>
                            <th>Website:</th>
                            <td>{{ $listing->website }}</td>
                        </tr>
                        @endif

                    </table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-xs-12">
                <a  target="_blank" class="btn btn-default"><i class="fa fa-print"></i> View</a>

                <a type="button" href="{{ route('admin.listings.index') }}" class="btn btn-primary pull-right" style="margin-right: 5px;">
                    <i class="fa fa-remove"></i> Cancel
                </a>
            </div>
        </div>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <!-- The time line -->
                <ul class="timeline">
                    <!-- timeline time label -->
                    <li class="time-label">
                  <span class="bg-red">
                    10 Feb. 2014
                  </span>
                    </li>
                    <!-- /.timeline-label -->

                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <li>
                        <i class="fa fa-camera bg-purple"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                            <h3 class="timeline-header"><a href="#">{{ $listing->name }}</a> uploaded new photos</h3>

                            <div class="timeline-body">
                                <img src="{{asset('images/listing/'.$listing->featured_one)}}" alt="..." width="50px" height="50px" class="margin">
                                <img src="{{asset('images/listing/'.$listing->featured_two)}}" alt="..." width="50px" height="50px" class="margin">
                                <img src="{{asset('images/listing/'.$listing->featured_three)}}" alt="..." width="50px" height="50px" class="margin">
                                <img src="{{asset('images/listing/'.$listing->featured_four)}}" alt="..."  width="50px" height="50px" class="margin"> <!-- Image size is 150*100-->
                                <img src="{{asset('images/listing/'.$listing->featured_five)}}" alt="..."  width="50px" height="50px" class="margin">
                                <img src="{{asset('images/listing/'.$listing->featured_six)}}" alt="..." width="50px" height="50px" class="margin">
                            </div>
                        </div>
                    </li>
                    <!-- END timeline item -->

                </ul>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->


    </section>
    <!-- /.content -->
    <!-- /.content -->
    <div class="clearfix"></div>


@endsection
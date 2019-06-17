@extends('layouts.master')

@section('content')


    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-globe"></i> {{ $slide->name }}
                    <small class="pull-right">{{ $slide->created_at }}</small>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                Email
                <address>
                    <strong>{{ $slide->email }}</strong><br>
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                Location
                <address>
                    <strong>{{ $slide->location }}</strong><br>
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <b>Phone Number</b><br>
                <b>{{ $slide->phone }}</b>
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
                        <td> {{ $slide->food1 }}</td>
                        <td>{{ $slide->food2 }}</td>
                        <td>{{ $slide->food3 }}</td>
                        <td>{{ $slide->food4 }}</td>
                        <td>{{ $slide->food5 }}</td>
                        <td>{{ $slide->food6 }}</td>
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
                   {{ $slide->description }}
                </p>
            </div>
            <!-- /.col --><br><br>
            <div class="col-xs-6">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th style="width:50%">Address:</th>
                            <td>{{ $slide->address }}</td>
                        </tr>
                        @if($slide->facebook != null)
                        <tr>
                            <th>Facebook: </th>
                            <td>{{ $slide->facebook }}</td>
                        </tr>
                        @endif

                        @if($slide->website != null)
                        <tr>
                            <th>Website:</th>
                            <td>{{ $slide->website }}</td>
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

                <a type="button" href="{{ route('admin.slides.index') }}" class="btn btn-primary pull-right" style="margin-right: 5px;">
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

                            <h3 class="timeline-header"><a href="#">{{ $slide->name }}</a> uploaded new photos</h3>

                            <div class="timeline-body">
                                <img src="{{asset('images/slide/'.$slide->featured_one)}}" alt="..." width="50px" height="50px" class="margin">
                                <img src="{{asset('images/slide/'.$slide->featured_two)}}" alt="..." width="50px" height="50px" class="margin">
                                <img src="{{asset('images/slide/'.$slide->featured_three)}}" alt="..." width="50px" height="50px" class="margin">
                                <img src="{{asset('images/slide/'.$slide->featured_four)}}" alt="..."  width="50px" height="50px" class="margin"> <!-- Image size is 150*100-->
                                <img src="{{asset('images/slide/'.$slide->featured_five)}}" alt="..."  width="50px" height="50px" class="margin">
                                <img src="{{asset('images/slide/'.$slide->featured_six)}}" alt="..." width="50px" height="50px" class="margin">
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
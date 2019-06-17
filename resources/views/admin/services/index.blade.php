@extends('layouts.master')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                @include('flash::message');
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All service</h3>
                    </div>
                    <!-- /.box-header -->
                    <div style="margin-left: 890px">
                        <a href="{{ route('admin.services.create')}}" class="btn btn-primary btn-group-xs active" role="button">Creat New services</a>

                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bserviceed table-striped">
                            <thead>
                            <tr>
                                <th>ID </th>
                                <th>Title </th>
                                <th>Content</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($services as $service)
                                <tr>
                                    <td>{{ $service->id }}</td>

                                    <td>{{ $service->title }}</td>

                                    <td>{{  $service->body }}</td>


                                    <td><a href="{{ route('admin.services.edit', $service->id) }}"><div class="btn btn-xs btn-default"><i class="fa fa-pencil-square-o"></i> Edit</div></a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['admin.services.destroy', $service->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID </th>
                                <th>Title </th>
                                <th>Content</th>
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
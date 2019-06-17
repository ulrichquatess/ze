@extends('layouts.master')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                @include('flash::message');
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All Food slide</h3>
                    </div>
                    <!-- /.box-header -->
                    <div style="margin-left: 890px">
                        <a href="{{ route('admin.slides.create')}}" class="btn btn-primary btn-group-xs active" role="button">Creat New slides</a>

                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID </th>
                                <th>Restaurant Name </th>
                                <th>Email</th>
                                <th>Approved</th>
                                <th>User Created</th>
                                <th>Location</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($slides as $slide)
                                <tr>
                                    <td>{{ $slide->id }}</td>
                                    <td>{{ $slide->name }}</td>
                                    <td>{{ $slide->email }}</td>

                                    @if($slide->verified != null)
                                        <td>slide Approved</td>
                                    @else
                                        <td>slide Not Approved</td>
                                    @endif

                                    <td>
                                        {{ (!$slide->user)? "n/a":$slide->user->email }}
                                    </td>


                                    <td>{{  $slide->location }}</td>
                                    <td><a href="{{ route('admin.slides.edit', $slide->id) }}"><div class="btn btn-xs btn-default"><i class="fa fa-pencil-square-o"></i> Edit</div></a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['admin.slides.destroy', $slide->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID </th>
                                <th>Name </th>
                                <th>Email</th>
                                <th>Approved</th>
                                <th>User Created</th>
                                <th>Location</th>
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
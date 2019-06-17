@extends('layouts.master')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                @include('flash::message');
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All Users</h3>
                    </div>
                    <!-- /.box-header -->
                    <div style="margin-left: 890px">
                        <a href="{{ route('admin.users.create')}}" class="btn btn-primary btn-group-xs active" role="button">Creat New User</a>

                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID </th>
                                <th>Name </th>
                                <th>Email</th>
                                <th>Approved</th>
                                <th>Email Verified</th>
                                <th>Created_at</th>
                                <th>Restaurant</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>

                                @if($user->verified == 1)
                                <td>Account Approved</td>
                                @else
                                    <td>Pending</td>
                                @endif

                                @if($user->email_verified_at != null)
                                    <td>Email Verified</td>
                                @else
                                    <td>Email Not Verfied</td>
                                @endif

                                <td>{{  $user->created_at }}</td>
                                <td>{{ $user->listings->count() }}</td> <!-- Listing Here stand for the different number of restaurant this user has-->
                                <td><a href="{{ route('admin.users.edit', $user->id) }}"><div class="btn btn-xs btn-default"><i class="fa fa-pencil-square-o"></i> Edit</div></a>
                                    {!! Form::open(['method' => 'DELETE','route' => ['admin.users.destroy', $user->id],'style'=>'display:inline']) !!}
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
                                <th>Email Verified</th>
                                <th>Created_at</th>
                                <th>Restaurant</th>
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
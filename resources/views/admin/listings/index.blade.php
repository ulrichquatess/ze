@extends('layouts.master')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                @include('flash::message');
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All Food Listing</h3>
                    </div>
                    <!-- /.box-header -->
                    <div style="margin-left: 890px">
                        <a href="{{ route('admin.listings.create')}}" class="btn btn-primary btn-group-xs active" role="button">Creat New Listings</a>

                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID </th>
                                <th>Restaurant Name </th>
                                <th>Email</th>
                                <th>Verified</th>
                                <th>Approved</th>
                                <th>Publish</th>
                                <th>Slug</th>
                                <th>User Created</th>
                                <th>Location</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($listings as $listing)
                                <tr>
                                    <td>{{ $listing->id }}</td>
                                    <td>{{ $listing->name }}</td>
                                    <td>{{ $listing->email }}</td>

                                    @if($listing->verified != null)
                                        <td>Listing Verified</td>
                                    @else
                                        <td>Listing Not Verified</td>
                                    @endif

                                    @if($listing->approved != null)
                                        <td>Listing Approved</td>
                                    @else
                                        <td>Listing Not Approved</td>
                                    @endif

                                    @if($listing->published != null)
                                        <td>Listing Published</td>
                                    @else
                                        <td>Listing Not Published</td>
                                    @endif

                                    <td>
                                        {{ $listing->slug }}
                                    </td>

                                    <td>
                                        {{ (!$listing->user)? "0" : $listing->user->email }}
                                    </td>


                                    <td>{{  $listing->location }}</td>
                                    <td><a href="{{ route('admin.listings.edit', $listing->id) }}"><div class="btn btn-xs btn-default"><i class="fa fa-pencil-square-o"></i> Edit</div></a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['admin.listings.destroy', $listing->id],'style'=>'display:inline']) !!}
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
                                <th>Verified</th>
                                <th>Approved</th>
                                <th>Publish</th>
                                <th>Slug</th>
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
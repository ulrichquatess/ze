@extends('layouts.master')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                @include('flash::message');

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"> Add New Service </h3>
                    </div>

                {!! Form::open(['route' => 'admin.blogs.store', 'data-parsley-validate' => '', 'files' => true]) !!}
                <!-- Here it is if there is error in case on the signing a new user -->
                    <div class="row">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-12">
                            <label for="title">Blog Title</label>
                            <input type="text" name="title" value="" class="form-control validate" id="title" placeholder="Enter Title" required="">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="slug">Blog Slug</label>
                            <input type="text" name="slug" value="" class="form-control validate" id="slug" placeholder="Enter Slug" required="">
                        </div>

                        <div class="form-group col-md-12">
                            <input type="file" class="custom-file-input" name="featured_img" id="featured_img">
                            <label class="custom-file-label" for="featured_img">Upload Image</label>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="body">Description</label>
                            <textarea class="form-control" rows="5" name="body"></textarea>
                        </div>

                    </div>


                    <div>
                        <a href="{{ route('admin.blogs.index') }}"><div class="btn btn-lg btn-primary" style="margin-bottom: 30px; margin-left: 20px">Cancel</div></a>
                        <button style="margin-bottom: 30px; margin-left: 50px" type="submit" class="btn btn-lg btn-bitbucket">Create</button>
                    </div>
                    </form>

                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@stop

@section('scripts')

@stop
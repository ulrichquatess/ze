@extends('layouts.master')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                @include('flash::message');

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"> Edit service </h3>
                    </div>

                {!! Form::model($service, ['route' => ['admin.services.update', $service->id], 'method' => 'PATCH', 'files' =>true]) !!}
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
                            <label for="title">Title</label>
                            <input type="text" name="title" value="{{ $service->title }}" class="form-control validate" id="title" placeholder="Enter Title" required="">
                        </div>


                        <div class="form-group col-md-12">
                            <label for="sub_title">Sub Title</label>
                            <input id="sub_title" name="sub_title" value="{{ $service->sub_title }}" type="text" class="form-control validate" id="sub_title" placeholder="Enter Subtitle">
                        </div>

                        @if($service->featured_img == null)
                        <div class="form-group col-md-12">
                            <input type="file" class="custom-file-input" name="featured_img" id="featured_img">
                            <label class="custom-file-label" for="featured_img">Upload Image</label>
                        </div>
                        @else
                            <img src="" alt="service Image">
                            <input type="file" class="custom-file-input" name="featured_img" id="featured_img">
                            <label class="custom-file-label" for="featured_img">Upload Image</label>
                        @endif

                        <div class="form-group col-md-12">
                            <label for="body">Description</label>
                            <textarea class="form-control" rows="5"  name="body">{{ $service->body }}</textarea>
                        </div>


                    </div>


                    <div>
                        <a href="{{ route('admin.services.index') }}"><div class="btn btn-lg btn-primary" style="margin-bottom: 30px; margin-left: 20px">Cancel</div></a>
                        <button style="margin-bottom: 30px; margin-left: 50px" type="submit" class="btn btn-lg btn-success">Update</button>
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
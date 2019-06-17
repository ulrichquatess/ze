@extends('layouts.master')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                @include('flash::message');

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"> Add New Order </h3>
                    </div>

                {!! Form::open(['route' => 'admin.orders.store', 'data-parsley-validate' => '', 'files' => true]) !!}
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
                            <label for="name">Restaurant</label>
                            <input type="text" name="name" value="" class="form-control validate" id="name" placeholder="Name Of Person Name" required="">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="listings">Chose Food</label>
                            <select class="form-control select2" multiple="multiple" name="listings[]"  data-placeholder="Select a Food"
                                    style="width: 100%;">
                                @foreach($listings as $listing)
                                    <option value='{{ $listing->id }}'>{{ $listing->food1 }}</option>
                                    <option value='{{ $listing->id }}'>{{ $listing->food2 }}</option>
                                    <option value='{{ $listing->id }}'>{{ $listing->food3 }}</option>
                                    <option value='{{ $listing->id }}'>{{ $listing->food4 }}</option>
                                    <option value='{{ $listing->id }}'>{{ $listing->food5 }}</option>
                                    <option value='{{ $listing->id }}'>{{ $listing->food6 }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group col-md-6">
                            <label for="phone">Phone</label>
                            <input id="phone" name="phone" value="" type="text" class="form-control validate" id="phone" placeholder="Enter Phone Number">
                        </div>


                        <div class="form-group col-md-6">
                            <label for="location">Location</label>
                            <input id="location" name="location" type="text" class="form-control validate" placeholder="Enter Location / Bonanjo">
                        </div>


                        <div class="form-group col-md-12">
                            <label for="delivered">Verification</label>
                            <select class="form-control" name="delivered">
                                <option value="1" {{ $listing->delivered == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ $listing->delivered == 0 ? 'selected' : '' }}>No</option>
                            </select>
                        </div>

                    </div>


                    <div>
                        <a href="{{ route('admin.orders.index') }}"><div class="btn btn-lg btn-primary" style="margin-bottom: 30px; margin-left: 20px">Cancel</div></a>
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
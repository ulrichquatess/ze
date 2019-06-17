@extends('layouts.master')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                @include('flash::message');

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"> Add New Restaurant </h3>
                    </div>

                {!! Form::open(['route' => 'admin.slides.store', 'data-parsley-validate' => '', 'files' => true]) !!}
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
                            <input type="text" name="name" value="" class="form-control validate" id="name" placeholder="Name Of Restaurant Name" required="">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="email">Email</label>
                            <input id="email" name="email" value="" type="email" class="form-control validate" id="email" placeholder="Enter Restaurant Email Address">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="description">Description</label>
                            <textarea class="form-control" type="text" name="description"  id="description" placeholder="Enter Restaurant Description" rows="5"></textarea>
                        </div>


                        <div class="form-group col-md-6">
                            <label for="phone">Phone</label>
                            <input id="phone" name="phone" value="" type="text" class="form-control validate" id="phone" placeholder="Enter Phone Number">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="address">Address</label>
                            <input id="address" name="address" type="text" class="form-control validate" placeholder="Enter Address">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="website">Website</label>
                            <input id="website" name="website" value="{{ $slide->website }}" type="text" class="form-control" placeholder="Enter Website">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="facebook">Facebook</label>
                            <input id="facebook" name="facebook" value="{{ $slide->facebook }}" type="text" class="form-control " placeholder="Enter Facebook">
                        </div>

                        <div class="form-group col-md-4">
                                <input type="file" name="featured_one" class="custom-file-input" id="featured_one">
                                <label class="custom-file-label" for="featured_one">Upload Food Image</label>
                        </div>

                        <div class="form-group col-md-4">
                                <input type="file" class="custom-file-input" name="featured_two" id="featured_two">
                                <label class="custom-file-label" for="featured_two">Upload Food Image 2</label>
                        </div>

                        <div class="form-group col-md-4">
                                <input type="file" class="custom-file-input" name="featured_three" id="featured_three">
                                <label class="custom-file-label" for="featured_three">Upload Food Image 3</label>
                        </div>

                        <div class="form-group col-md-4">
                                <input type="file" class="custom-file-input" name="featured_four" id="featured_four">
                                <label class="custom-file-label" for="featured_four">Upload Food Image 4</label>
                        </div>

                        <div class="form-group col-md-4">
                                <input type="file" class="custom-file-input" name="featured_five" id="featured_five">
                                <label class="custom-file-label" for="featured_five">Upload Food Image 5</label>
                        </div>

                        <div class="form-group col-md-4">
                            <input type="file" class="custom-file-input" name="featured_six" id="featured_six">
                            <label class="custom-file-label" for="featured_six">Upload Food Image 6</label>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="food1">Enter Food1</label>
                            <input id="food1" name="food1" value="" type="text" class="form-control validate" id="food1" placeholder="Enter Food">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="food2">Enter Food2</label>
                            <input id="food2" name="food2" type="text" class="form-control validate" placeholder="Enter Food2">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="food3">Food 3</label>
                            <input id="food3" name="food3" value="{{ $slide->food3 }}" type="text" class="form-control" placeholder="Enter Food 3">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="food4">Food 4</label>
                            <input id="food4" name="food4" value="{{ $slide->food4 }}" type="text" class="form-control " placeholder="Enter Food 4">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="food5">Food 5</label>
                            <input id="food5" name="food5" value="{{ $slide->food5 }}" type="text" class="form-control" placeholder="Enter Food 5">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="food6">Food 6</label>
                            <input id="food6" name="food6" value="{{ $slide->food6 }}" type="text" class="form-control " placeholder="Enter Food 6">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="location">Location</label>
                            <input id="location" name="location" type="text" class="form-control validate" placeholder="Enter Location / Bonanjo">
                        </div>


                        <div class="form-group col-md-12">
                            <label for="verified">Verification</label>
                            <select class="form-control" name="verified">
                                <option value="0" {{ ($slide->verified == false) || Request::old('verified') == "0" ? 'selected' : '' }}>No</option>
                                <option value="1" {{ ($slide->verified == true) || Request::old('verified') == "1" ? 'selected' : '' }}>Yes</option>
                            </select>
                        </div>


                        <div class="form-group col-md-12">
                                <label for="user">User</label>
                                <select class="form-control" name="user">
                                    <option>Empty</option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}" {{ ($slide->user_id == $user->id) || Request::old('user') == $user->id ? 'selected' : '' }}>{{$user->email}}</option>
                                    @endforeach
                                </select>
                        </div>



                    </div>



                    <div>
                        <a href="{{ route('admin.slides.index') }}"><div class="btn btn-lg btn-primary" style="margin-bottom: 30px; margin-left: 20px">Cancel</div></a>
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
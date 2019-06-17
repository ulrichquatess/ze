@extends('layouts.master')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                @include('flash::message');

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Edit Restaurant </h3>
                    </div>

                {!! Form::model($listing, ['route' => ['admin.listings.update', $listing->id], 'method' => 'PATCH', 'files' =>true]) !!}

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
                            <input type="text" name="name" value="{{ $listing->name }}" class="form-control validate" id="name" placeholder="Name Of Restaurant Name" required="">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" value="{{ $listing->slug }}" class="form-control validate" id="slug" placeholder="Update Slug" required="">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="email">Email</label>
                            <input id="email" name="email" value="{{ $listing->email }}" type="email" class="form-control validate" id="email" placeholder="Enter Restaurant Email Address">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="description">Description</label>
                            <textarea class="form-control" type="text" name="description"  id="description" placeholder="Enter Restaurant Description" rows="5">{{ $listing->description }}</textarea>
                        </div>


                        <div class="form-group col-md-6">
                            <label for="phone">Phone</label>
                            <input id="phone" name="phone" value="{{ $listing->phone }}" type="text" class="form-control validate" id="phone" placeholder="Enter Phone Number">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="address">Address</label>
                            <input id="address" name="address" value="{{ $listing->address }}" type="text" class="form-control validate" placeholder="Enter Address">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="website">Website</label>
                            <input id="website" name="website" value="{{ $listing->website }}" type="text" class="form-control" placeholder="Enter Website">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="facebook">Facebook</label>
                            <input id="facebook" name="facebook" value="{{ $listing->facebook }}" type="text" class="form-control " placeholder="Enter Facebook">
                        </div>

                        @if( $listing->image == null )
                        <div class="form-group col-md-4">
                            <input type="file" name="featured_one" class="custom-file-input" id="featured_one">
                            <label class="custom-file-label" for="featured_one">Upload Food Image</label>
                        </div>
                        @else
                            <li>
                                <img src="{{asset('images/listing/'.$listing->featured_one)}}" alt="Listing Image">
                            </li>

                            <div class="form-group col-md-4">
                                <input type="file" name="featured_one" value="{{ $listing->featured_one }}" class="custom-file-input" id="featured_one">
                                <label class="custom-file-label" for="featured_one">Upload Food Image</label>
                            </div>
                        @endif

                        @if( $listing->image == null )
                            <div class="form-group col-md-4">
                                <input type="file" class="custom-file-input" value="{{ $listing->featured_two }}" name="featured_two" id="featured_two">
                                <label class="custom-file-label" for="featured_two">Upload Food Image 2</label>
                            </div>
                        @else

                            <li>
                                <img src="{{asset('images/listing/'.$listing->featured_two)}}" alt="Listing Image">
                            </li>

                            <div class="form-group col-md-4">
                                <input type="file" name="featured_two" value="{{ $listing->featured_two }}" class="custom-file-input" id="featured_two">
                                <label class="custom-file-label" for="featured_two">Upload Food Image</label>
                            </div>

                        @endif


                        @if( $listing->image == null )
                            <div class="form-group col-md-4">
                                <input type="file" class="custom-file-input" value="{{ $listing->featured_three }}" name="featured_three" id="featured_three">
                                <label class="custom-file-label" for="featured_three">Upload Food Image 3</label>
                            </div>
                        @else

                            <li>
                                <img src="{{asset('images/listing/'.$listing->featured_three)}}" alt="Listing Image">
                            </li>

                            <div class="form-group col-md-4">
                                <input type="file" name="featured_three" value="{{ $listing->featured_three }}" class="custom-file-input" id="featured_three">
                                <label class="custom-file-label" for="featured_three">Upload Food Image</label>
                            </div>

                        @endif


                        @if( $listing->image == null )
                            <div class="form-group col-md-4">
                                <input type="file" class="custom-file-input" value="{{ $listing->featured_four }}" name="featured_four" id="featured_four">
                                <label class="custom-file-label" for="featured_four">Upload Food Image 4</label>
                            </div>
                        @else
                            <li>
                                <img src="{{asset('images/listing/'.$listing->featured_four)}}" alt="Listing Image">
                            </li>

                            <div class="form-group col-md-4">
                                <input type="file" name="featured_four" value="{{ $listing->featured_four }}" class="custom-file-input" id="featured_four">
                                <label class="custom-file-label" for="featured_four">Upload Food Image</label>
                            </div>
                        @endif

                        @if( $listing->image == null )
                            <div class="form-group col-md-4">
                                <input type="file" class="custom-file-input" value="{{ $listing->featured_five }}" name="featured_five" id="featured_five">
                                <label class="custom-file-label" for="featured_five">Upload Food Image 5</label>
                            </div>
                        @else
                            <li>
                                <img src="{{asset('images/listing/'.$listing->featured_five)}}" alt="Listing Image">
                            </li>

                            <div class="form-group col-md-4">
                                <input type="file" name="featured_five" value="{{ $listing->featured_five }}" class="custom-file-input" id="featured_five">
                                <label class="custom-file-label" for="featured_five">Upload Food Image</label>
                            </div>
                        @endif

                        @if( $listing->image == null )

                            <div class="form-group col-md-4">
                                <input type="file" class="custom-file-input" value="{{ $listing->featured_six }}" name="featured_six" id="featured_six">
                                <label class="custom-file-label" for="featured_six">Upload Food Image 6</label>
                            </div>
                        @else
                            <li>
                                <img src="{{asset('images/listing/'.$listing->featured_six)}}" alt="Listing Image">
                            </li>

                            <div class="form-group col-md-4">
                                <input type="file" name="featured_six" value="{{ $listing->featured_six }}" class="custom-file-input" id="featured_six">
                                <label class="custom-file-label" for="featured_six">Upload Food Image</label>
                            </div>
                        @endif

                        <div class="form-group col-md-6">
                            <label for="food1">Enter Food1</label>
                            <input id="food1" name="food1" value="{{ $listing->food1 }}" type="text" class="form-control validate" id="food1" placeholder="Enter Food">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="food2">Enter Food2</label>
                            <input id="food2" name="food2" type="text" value="{{ $listing->food2 }}" class="form-control validate" placeholder="Enter Food2">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="food3">Food 3</label>
                            <input id="food3" name="food3" value="{{ $listing->food3 }}" type="text" class="form-control" placeholder="Enter Food 3">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="food4">Food 4</label>
                            <input id="food4" name="food4" value="{{ $listing->food4 }}" type="text" class="form-control " placeholder="Enter Food 4">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="food5">Food 5</label>
                            <input id="food5" name="food5" value="{{ $listing->food5 }}" type="text" class="form-control" placeholder="Enter Food 5">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="food6">Food 6</label>
                            <input id="food6" name="food6" value="{{ $listing->food6 }}" type="text" class="form-control " placeholder="Enter Food 6">
                        </div>


                        <div class="form-group col-md-12">
                            <label for="location">Location</label>
                            <input id="location" name="location" value="{{ $listing->location }}" type="text" class="form-control validate" placeholder="Enter Location / Bonanjo">
                        </div>


                        <div class="form-group col-md-12">
                            <label for="verified">Verification</label>
                            <select class="form-control" name="verified">
                                <option value="1" {{ $listing->verified == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ $listing->verified == 0 ? 'selected' : '' }}>No</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="approved">Approved</label>
                            <select class="form-control" name="approved">
                                <option value="1" {{ $listing->approved == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ $listing->approved == 0 ? 'selected' : '' }}>No</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="published">Published</label>
                            <select class="form-control" name="published">
                                <option value="1" {{ $listing->published == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ $listing->published == 0 ? 'selected' : '' }}>No</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="user">User</label>
                            <select class="form-control" name="user">
                                <option>Empty</option>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}" {{ ($listing->user_id == $user->id) || Request::old('user') == $user->id ? 'selected' : '' }}>{{$user->email}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>



                    <div>
                        <a href="{{ route('admin.listings.index') }}"><div class="btn btn-lg btn-primary" style="margin-bottom: 30px; margin-left: 20px">Cancel</div></a>
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
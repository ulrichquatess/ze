@extends('layouts.master')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                @include('flash::message');

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">{{ ($user->id)?'Edit User':'Add New User' }}</h3>
                    </div>

                  {!! Form::model($user, ['route' => ['admin.users.update', $user->id], 'method' => 'PATCH', 'files' =>true]) !!}
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

                            <input type="hidden" class="form-control" id="id" name="id" value="{{ $user->id }}">
                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-12">
                                <label for="name">Enter Name</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control validate" id="name" placeholder="Name Of Restaurant / Your Name" required="">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="email">Email</label>
                                <input id="email" name="email" value="{{ $user->email }}" type="email" class="form-control validate" id="email" placeholder="Enter Email Address">
                            </div>


                                <div class="form-group col-md-12">
                                    <label for="verified">Verification</label>
                                    <select class="form-control" name="verified">
                                        <option value="1" {{ $user->verified == 1 ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ $user->verified == 0 ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>


                            <div class="form-group col-md-6">
                                <label for="password">New Password</label>
                                <input id="password" name="password" type="password" class="form-control validate" placeholder="Enter Password">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password_confirmation">New Password (Confirmation)</label>
                                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control validate" placeholder="Password">
                            </div>
                        </div>

                            @if($user->image == null)
                            <img src="{{asset('smartrestaux/defaultImages/user.png')}}" style="width: 40px; height: 40px" alt="User Default Image">
                            <div class="custom-file" style="margin-left: 45px">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose logo file</label>
                            </div>
                            @else
                                <img src="" style="width: 40px; height: 40px" alt="User Default Image">
                                <div class="custom-file" style="margin-left: 45px">
                                    <input type="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose logo file</label>
                                </div>
                            @endif

                            <div class="form-group col-md-12">
                                <label for="phone_number">Phone Number</label>
                                <input type="text" class="form-control" value="{{ $user->phone_number }}" id="phone_number" name="phone_number" placeholder=" +237 1234 ">
                            </div>


                        <div>
                            <a href="{{ URL::to('admin/users') }}"><div class="btn btn-lg btn-primary" style="margin-bottom: 30px; margin-left: 20px">Cancel</div></a>
                            <button style="margin-bottom: 30px; margin-left: 50px" type="submit" class="btn btn-lg btn-bitbucket">{!! ($user->id)?'<i class="fa fa-check"></i> Save':'Create' !!}</button>
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
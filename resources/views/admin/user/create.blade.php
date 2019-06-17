@extends('layouts.master')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                @include('flash::message');

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"> Add New User </h3>
                    </div>

                    {!! Form::open(['route' => 'admin.users.store', 'data-parsley-validate' => '', 'files' => true]) !!}
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
                                <label for="name">Enter Name</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control validate" id="name" placeholder="Name Of Restaurant / Your Name" required="">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="email">Email</label>
                                <input id="email" name="email" value="{{ $user->email }}" type="email" class="form-control validate" id="email" placeholder="Enter Email Address">
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



                        <div>
                        <a href="{{ route('admin.users.index') }}"><div class="btn btn-lg btn-primary" style="margin-bottom: 30px; margin-left: 20px">Cancel</div></a>
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
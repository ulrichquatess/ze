@extends('layouts.master')

@section('content')


        <!-- Main content -->
        <section class="content">
            @include('flash::message');
            <div class="row">
                <div class="col-md-4">

                </div>
                <!-- /.col -->
                <div class="col-md-5">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-aqua-active">
                            <h3 class="widget-user-username">{{ $user->name }}</h3>
                            <h5 class="widget-user-desc">{{ $user->email }}</h5>
                        </div>
                        @if($user->image == null)
                        <div class="widget-user-image">
                            <img class="img-circle" src="{{asset('smartrestaux/defaultImages/user.png')}}" alt="User Avatar">
                        </div>
                        @else
                            <div class="widget-user-image">
                                <img class="img-circle" src="" alt="User Avatar">
                            </div>
                        @endif
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-6 border-right">
                                    <div class="description-block">
                                        @if($user->verified == 1)
                                        <h5 class="description-header">User Approved</h5>
                                        @else
                                        <span class="description-text">Account Pending</span>
                                         @endif
                                    </div>
                                    <!-- /.description-block -->
                                </div>

                                <!-- /.col -->
                                <div class="col-sm-6">
                                    <div class="description-block">
                                        @if($user->phone_number == null)
                                        <h5 class="description-header">Update Your Account to See Number </h5>
                                        @else
                                        <span class="description-text">{{ $user->phone_number }}</span>
                                        @endif
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                    <!-- /.widget-user -->
                </div>
                <!-- /.col -->

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

@stop

@section('scripts')

@stop
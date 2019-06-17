@extends('layouts.frontend.app')

@section('content')


    <!--TOP SEARCH SECTION-->
    <section class="bottomMenu dir-il-top-fix">
        @include('layouts.inc')
    </section>
    <!--DASHBOARD-->
    <section>
        <div class="tz">
            <!--LEFT SECTION-->
        @include('layouts.frontend.sidebar')
        <!--CENTER SECTION-->
            <div class="tz-2">
                <div class="tz-2-com tz-2-main">
                    <h4>Profile</h4>
                    <div class="db-list-com tz-db-table">
                        <div class="ds-boar-title">
                            <h2>Edit Profile</h2>
                        </div>
                        <div class="tz2-form-pay tz2-form-com">
                                <form class="col s12" action="{{ URL('change-password') }}" method="post">
                                    {!! csrf_field() !!}

                                <div class="row">
                                    <div class="input-field col s12 m6">
                                        <input type="password" name="password" id="password" class="validate">
                                        <label for="password">Enter Password</label>
                                    </div>
                                    <div class="input-field col s12 m6">
                                        <input type="password" name="password_confirmation" class="validate">
                                        <label for="password_confirmation">Confirm Password</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12 m12">
                                        <input type="text" name="phone_number" value="" class="validate">
                                        <label for="phone_number">Phone</label>
                                    </div>
                                </div>

                                <div class="row tz-file-upload">
                                    <div class="file-field input-field">
                                        <div class="tz-up-btn"> <span>File</span>
                                            <input name="featured_image" type="file"> </div>
                                        <div class="file-path-wrapper">
                                            <input name="featured_image" class="file-path validate" type="text"> </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="submit" value="SUBMIT" class="waves-effect waves-light full-btn"> </div>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
            <!--RIGHT SECTION-->
        </div>
        </div>
    </section>
    <!--END DASHBOARD-->


@endsection

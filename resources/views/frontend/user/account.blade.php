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
                    <h4>Manage My Profile</h4>
                    <div class="db-list-com tz-db-table">
                        <div class="ds-boar-title">
                            <h2>Profile</h2>
                            <p>All You need to Know your Profile</p>
                        </div>
                        <table class="responsive-table bordered">
                            <tbody>
                            <tr>
                                <td>User Name</td>
                                <td>:</td>
                                <td>{{ Auth::user()->name }}</td>
                            </tr>

                            <tr>
                                @if(Auth::user()->email)
                                <td>Eamil</td>
                                <td>:</td>
                                <td>{{ Auth::user()->email }}</td>
                                @endif
                            </tr>
                            <tr>
                                @if(Auth::user()->phone_number)
                                <td>Phone</td>
                                <td>:</td>
                                <td>{{ Auth::user()->phone_number }}</td>
                                @endif
                            </tr>
                            <tr>
                                <td>Date of birth</td>
                                <td>:</td>
                                <td>03 Jun 1990</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>:</td>
                                <td>8800 Orchard Lake Road, Suite 180 Farmington Hills, U.S.A.</td>
                            </tr>
                            <tr>
                                @if(Auth::user()->email_verified_at != null)
                                <td>Status</td>
                                <td>:</td>
                                <td><span class="db-done">Active</span> </td>
                                @else
                                    <td>Status</td>
                                    <td>:</td>
                                    <td><span class="db-done">Pending</span> </td>
                                @endif
                            </tr>
                            </tbody>
                        </table>
                        <div class="db-mak-pay-bot">
                            <p>Click on the link to edit your Profile Account</p> <a href="{{URL::to('change-password')}}" class="waves-effect waves-light btn-large">Edit my profile</a> </div>
                    </div>
                </div>
            </div>
            <!--RIGHT SECTION-->
        </div>
    </section>
    <!--END DASHBOARD-->


@endsection

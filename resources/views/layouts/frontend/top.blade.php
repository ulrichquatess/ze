<!--TOP SEARCH SECTION-->
<section id="myID" class="bottomMenu hom-top-menu">
    <div class="container top-search-main">
        <div class="row">
            <div class="ts-menu">
                <!--SECTION: LOGO-->
                <div class="ts-menu-1">
                    <a href="/"><img src="{{ asset('frontend/images/aff-logo.png') }}" alt=""> </a>
                </div>
                <!--SECTION: BROWSE CATEGORY(NOTE:IT'S HIDE ON MOBILE & TABLET VIEW)-->
                <div class="ts-menu-2"><a href="/" class="t-bb">All Pages <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                    <!--SECTION: BROWSE CATEGORY-->
                    <div class="cat-menu cat-menu-1">
                        <div class="dir-home-nav-bot">
                            <ul>
                                <li>A few reasons you’ll love Online Business Directory <span>Call us on: +01 6214 6548</span> </li>
                                <li><a href="{{ ('/blog') }}" class="waves-effect waves-light btn-large"><i class="fa fa-bullhorn"></i> Blogs</a>
                                </li>
                                <li><a href="{{ Url('submit-listing') }}" class="waves-effect waves-light btn-large"><i class="fa fa-bookmark"></i> Add your business</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--SECTION: SEARCH BOX-->
                <div class="ts-menu-3">
                    <div class="">
                        <form class="tourz-search-form tourz-top-search-form" action="{{ URL::to('search') }}" method="get">
                            <div class="input-field">
                                <input type="text" id="top-select-city" class="autocomplete" name="location" title="Location" value="{{ Request::get('location') }}">
                                <label for="top-select-city">Enter city</label>
                            </div>
                            <div class="input-field">
                                <input type="text" id="top-select-search" class="autocomplete" name="keyword" title="Keyword" value="{{ Request::get('keyword') }}">
                                <label for="top-select-search" class="search-hotel-type">Search your services like restaurant and more</label>
                            </div>
                            <div class="input-field">
                                <input type="submit" id="btn-search" value="search" class="waves-effect waves-light tourz-top-sear-btn"> </div>
                        </form>
                    </div>
                </div>
                <!--SECTION: REGISTER,SIGNIN AND ADD YOUR BUSINESS-->
                <div class="ts-menu-4">
                    <div class="v3-top-ri">
                        <ul>
                            <li><a href="{{ route('login') }}" class="v3-menu-sign"><i class="fa fa-sign-in"></i> Sign In</a> </li>
                            <li><a href="{{ Url::to('submit-listing') }}" class="v3-add-bus"><i class="fa fa-plus" aria-hidden="true"></i> Add Listing</a> </li>
                        </ul>
                    </div>
                </div>
                <!--MOBILE MENU ICON:IT'S ONLY SHOW ON MOBILE & TABLET VIEW-->
                <div class="ts-menu-5"><span><i class="fa fa-bars" aria-hidden="true"></i></span> </div>
                <!--MOBILE MENU CONTAINER:IT'S ONLY SHOW ON MOBILE & TABLET VIEW-->
                <div class="mob-right-nav" data-wow-duration="0.5s">
                    <div class="mob-right-nav-close"><i class="fa fa-times" aria-hidden="true"></i> </div>
                    <h5>Business</h5>
                    <ul class="mob-menu-icon">
                        <li><a href="{{ Url::to('submit-listing') }}">Add Business</a> </li>
                        <li><a href="{{ route('register') }}" data-toggle="modal" data-target="#register">Register</a> </li>
                        <li><a href="{{ route('login') }}" data-toggle="modal" data-target="#sign-in">Sign In</a> </li>
                    </ul>
                    <h5>All Menu</h5>
                    <ul>
                        <li><a href="/"><i class="fa fa-angle-right" aria-hidden="true"></i> Home</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
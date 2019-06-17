<div class="tz-l">
    <div class="tz-l-1">
        <ul>
            @if(Auth::user()->image != null)
                <li><img src="{{ asset('frontend/images/db-profile.jpg') }}" alt="" /> </li>
                <li><span>80%</span> profile compl</li>
                <li><span>18</span> Notifications</li>
            @else
                <li><img src="{{ asset('frontend/images/db-profile.jpg') }}" alt="" /> </li>
            @endif
        </ul>
    </div>
    <div class="tz-l-2">
        <ul>
            <li>
                <a href="{{ URL::to('home') }}" class="tz-lma{{ Request::is('home') ? 'active' : ''}}"><img src="{{ asset('frontend/images/icon/dbl1.png') }}" alt="" /> My Dashboard</a>
            </li>
            <li>
                <a href="{{ URL::to('my-listings') }}" class="tz-lma{{ Request::is('my-listings') ? 'active' : ''}}"><img src="{{ asset('frontend/images/icon/dbl2.png') }}" alt="" /> All Listing</a>
            </li>
            <li>
                <a href="{{ URL::to('submit-listing') }}"><img src="{{ asset('frontend/images/icon/dbl3.png') }}" alt="" /> Add New Listing</a>
            </li>


            <li>
                <a href="{{ URL::to('my-account') }}" class="{{ Request::is('my-account') ? 'active' : ''}}"><img src="{{ asset('frontend/images/icon/dbl6.png') }}" alt="" /> My Profile</a>
            </li>


            <li>
                <a href="#"  onclick="event.preventDefault(); document.querySelector('#admin-logout-form').submit();"><img src="{{ asset('frontend/images/icon/dbl12.png') }}" alt="" /> Log Out</a>
                <form id="admin-logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>
<div style="margin-top: 20px">
    @if (Session::has('flash_notification.message'))
        <div style="margin-top:10px;">
            @include('flash::message')
        </div>
    @endif
</div>
<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.frontend.head')
</head>

<body>
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
   @yield('content')
   @include('layouts.frontend.footer')
</body>

</html>
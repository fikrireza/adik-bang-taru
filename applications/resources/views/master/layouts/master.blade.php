<!DOCTYPE html>
<html lang="en">
<head>
  @yield('title')
  @include('master.includes.head')
</head>
<body>
  @include('master.includes.header')
  @include('master.includes.sidebar')

  <div id="content">
    @yield('breadcrumb')
    @yield('content')
  </div>

  @include('master.includes.footer')

  @include('master.includes.script')
  @yield('footscript')
</body>
</html>

@include('admin.head')
  <body>

  <section id="container">
      <!--header start-->
        @include('admin.header')
      <!--header end-->
      <!--sidebar start-->
        @include('admin.sidebar')
      <!--sidebar end-->

      <!--main content start-->
        @yield('content')
      <!--main content end-->

      <!-- Right Slidebar start -->
{{--        @include('admin.right_sidebar')--}}
      <!-- Right Slidebar end -->

      <!--footer start-->
     @include('admin.footer')
      <!--footer end-->
  </section>
@include('admin.jsFile')

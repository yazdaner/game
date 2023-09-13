<!DOCTYPE html>
<html lang="fa">

@include('Front::sections.head')

  <body>

    @include('Front::sections.navbar')

    @include('Front::sections.search')


    @yield('content')

    @include('Front::sections.footer')

    @include('Front::sections.js')

    @include('Common::layouts.feedbacks')
  </body>

</html>

@include('admin.header')
<div class="container-fluid page-body-wrapper">
    @include('admin.inc.navbar')
    @include('admin.inc.sidebar')
<div class="main-panel overflow-auto">
<div class="content-wrapper w-100">
@yield('content')
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
@include('admin.footer')
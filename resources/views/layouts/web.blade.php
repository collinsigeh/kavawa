<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="/css/style.css" />
    <title>{{ config('app.name' )}} @if (isset($page_title))
        {{ '| '.$page_title }}
    @endif</title>
  </head>
  <body style="background-color: #f5f5f5;">
    <!-- top navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="background-color: #01B8E2; border-bottom: 1px solid #96e7ff;">
      <div class="container-fluid">
        <a
          class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold"
          href="{{ route('home') }}"
          ><img src="/images/kavawa_logo_white.png" alt="Kavawa" style="width: 150px; padding: 6px 0;"></a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#topNavBar"
          aria-controls="topNavBar"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="topNavBar">
          <form class="d-flex ms-auto my-3 my-lg-0">
          </form>
          {{-- @include('inc.top_navbar_links') --}}
          @livewire('inc.top-navbar-links')
        </div>
      </div>
    </nav>
    <!-- top navigation bar -->

    <div style="padding-top: 65px; min-height: 450px;">
        @yield('content')
    </div>
    
    <footer>
        <div class="row">
            <div class="col-md-6 col-xl-3">
                <a href="#" class="footer-link ps-md-5">Register</a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a href="#" class="footer-link ps-md-5">Login</a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a href="#" class="footer-link ps-md-5">Privacy Policy</a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a href="#" class="footer-link ps-md-5">Terms of Service</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 text-md-end py-3">
                <img src="/images/nrpaslogo.png" alt="" width="120px" style="padding-right: 20px;">
            </div>
        </div>
        <div class="footer-web-credit">
          @include('inc.footer_credit')
        </div>
    </footer>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="/js/jquery-3.5.1.js"></script>
    <script src="/js/jquery.dataTables.min.js"></script>
    <script src="/js/dataTables.bootstrap5.min.js"></script>
    <script src="/js/script.js"></script>
  </body>
</html>

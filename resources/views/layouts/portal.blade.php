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
    <title>
        @if (isset($entity))
            {{ $entity->name }}
            @if (isset($page_title))
                {{ '| '.$page_title }}
            @endif
        @else
            Kavawa Portal
        @endif
    </title>
  </head>
  <body style="background-color: #f5f5f5;">
    <!-- top navigation bar -->
    <nav class="navbar navbar-expand-lg fixed-top" style="background-color: #424242; border-bottom: 1px solid #727272;">
      <div class="container-fluid">
        <a
          class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold"
          href="{{ route('portal.index') }}"
          style="color: #fff;"
          >@if (isset($entity))
              {{ $entity->name }}
          @else
              Kavawa Portal
          @endif
          </a
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
            <span style="color: #fff;">
                <i class="bi bi-list"></i>
            </span>
        </button>
        <div class="collapse navbar-collapse" id="topNavBar">
          <form class="d-flex ms-auto my-3 my-lg-0">
          </form>
          {{-- @include('inc.top_navbar_links') --}}
          @livewire('inc.portal-top-navbar-links')
        </div>
      </div>
    </nav>
    <!-- top navigation bar -->

    <div style="padding-top: 65px; min-height: 500px;">
        @yield('content')
    </div>
    
    <footer style="background-color: #424242; border-bottom: 1px solid #727272;">
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

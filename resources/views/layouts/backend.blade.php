<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="/css/style.css" />
    <title>
        {{ config('app.name' )}} 
        @if (isset($page_title))
            {{ '| '.$page_title }}
        @endif
    </title>
  </head>
  <body>
    <!-- top navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="background-color: #01B8E2; border-bottom: 1px solid #96e7ff;">
      <div class="container-fluid">
        @livewire('inc.backend-logo')
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#sidebar"
          aria-controls="offcanvasExample"
        >
          <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
        </button>
        <div class="collapse navbar-collapse" id="topNavBar">
          <form class="d-flex ms-auto my-3 my-lg-0">
          </form>
          @livewire('inc.top-navbar-links')
        </div>
      </div>
    </nav>
    <!-- top navigation bar -->
    <!-- offcanvas -->
    <div
      class="offcanvas offcanvas-start sidebar-nav bg-dark"
      tabindex="-1"
      id="sidebar"
    >
      <div class="offcanvas-body p-0">
        @livewire('inc.sidebar-links')
      </div>
    </div>
    <!-- offcanvas -->
    <main class="mt-5 pt-3">
      <div class="container-fluid">
        <div style="height: 25px;"></div>
        <div id="main-body">
            @yield('content')
        </div>
      </div>
      <div class="footer">
        <div class="footer-admin-credit">
          @include('inc.footer_credit')
        </div>
      </div>
    </main>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="/js/jquery-3.5.1.js"></script>
    <script src="/js/jquery.dataTables.min.js"></script>
    <script src="/js/dataTables.bootstrap5.min.js"></script>
    <script src="/js/script.js"></script>
  </body>
</html>
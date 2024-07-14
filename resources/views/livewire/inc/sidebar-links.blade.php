
<nav class="navbar-dark">
    <ul class="navbar-nav">
      <li style="margin-top: -20px">
        <div class="text-white my-4 px-3 py-4">
          <div style="font-size: 12px;">Hello,</div>
          <div style="font-size: 21px; font-weight: 700;">{{ ucwords(Auth::user()->name) }}</div>
        </div>
      </li>
      <li>
        <a href="{{ route('dashboard') }}" wire:navigate class="nav-link px-3 active">
          <span class="me-2"><i class="bi bi-house-door-fill"></i></span>
          <span>Dashboard</span>
        </a>
      </li>
      <li>
        <a href="#" wire:navigate class="nav-link px-3 active">
          <span class="me-2"><i class="bi bi-bookmarks"></i></span>
          <span>Tickets</span>
        </a>
      </li>
      <li>
        <a href="{{ route('entities.index') }}" wire:navigate class="nav-link px-3 active">
          <span class="me-2"><i class="bi bi-briefcase"></i></span>
          <span>Entities</span>
        </a>
      </li>
      @if (Auth::user()->is_admin)
        <li>
          <a href="#" wire:navigate class="nav-link px-3 active">
            <span class="me-2"><i class="bi bi-receipt"></i></span>
            <span>Orders</span>
          </a>
        </li>
        <li>
          <a href="#" wire:navigate class="nav-link px-3 active">
            <span class="me-2"><i class="bi bi-box-seam"></i></span>
            <span>Products</span>
          </a>
        </li>
        <li>
          <a href="#" wire:navigate class="nav-link px-3 active">
            <span class="me-2"><i class="bi bi-people"></i></span>
            <span>Users</span>
          </a>
        </li>
        <li>
          <a href="#" wire:navigate class="nav-link px-3 active">
            <span class="me-2"><i class="bi bi-gear"></i></span>
            <span>Settings</span>
          </a>
        </li>
      @else
        {{-- <li>
          <a href="#" wire:navigate class="nav-link px-3 active">
            <span class="me-2"><i class="bi bi-receipt"></i></span>
            <span>My orders</span>
          </a>
        </li> --}}
      @endif
      <li>
        <a href="#" wire:navigate class="nav-link px-3 active">
          <span class="me-2"><i class="bi bi-person-circle"></i></span>
          <span>Profile</span>
        </a>
      </li>
      <li>
        <a href="#" wire:navigate class="nav-link px-3 active d-block d-lg-none">
          <span class="me-2"><i class="bi bi-box-arrow-right"></i></span>
          <span>Logout</span>
        </a>
      </li>
      <li>
        <a href="#" wire:navigate class="nav-link px-3 active d-block d-lg-none">
          <span class="me-2"><i class="bi bi-question-square"></i></span>
          <span>Help</span>
        </a>
      </li>
    </ul>
  </nav>
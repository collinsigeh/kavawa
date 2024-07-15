<ul class="navbar-nav">
    @auth
      <li class="nav-item"><a class="nav-link custom-nav-link" href="#" wire:navigate>Dashboard</a></li>
      <li class="nav-item"><a class="nav-link custom-nav-link" href="#" wire:navigate>Logout</a></li>
    @else
      <li class="nav-item"><a class="nav-link custom-nav-link" href="#" wire:navigate>Sign in</a></li>
      <li class="nav-item"><a class="nav-link custom-nav-link" href="#" wire:navigate>Sign up</a></li>
    @endauth
    <li class="nav-item"><a class="nav-link custom-nav-link" href="#" wire:navigate>Help</a></li>
</ul>
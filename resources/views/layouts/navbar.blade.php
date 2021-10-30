<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
    <a class="navbar-brand" href="/">Real Web </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarColor03">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/comment">Comments</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/about">About</a>
        </li>
      </ul>
      <ul class="navbar-nav nav-right mx-1">
      @guest
        <li class="nav-item">
          <a class="nav-link" href="/login">Login</a>
      </li>  
      <li class="nav-item">
          <a class="nav-link" href="/register">Register</a>
      </li>  
      @endguest

      @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{ ucfirst(Auth::user()->name) }}</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="/dashboard">Dashboard</a>
            <div class="dropdown-divider"></div>
            {{-- <a class="dropdown-item" href="/logout">Logout</a> --}}
            @livewire('logout-page')
          </div>
        </li>  
      @endauth
        
      </ul>
    </div>
    </div>
  </nav>
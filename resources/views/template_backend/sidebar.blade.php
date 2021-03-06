<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <img src="{{ asset('public/img/logo.png') }}"width="60%" >
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
          <img src="{{ asset('public/img/logo.png') }}" width="90%">
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header"></li>

            <li class=active><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>


            <li class="menu-header">Starter</li>
            @if (Auth::user()->tipe == 1)
            
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-book-open"></i> <span>Post</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('post.index') }}">List Post</a></li> 
                <li><a class="nav-link" href="{{ route('post.tampil_hapus') }}">List Post Dihapus</a></li>
                <li><a class="nav-link" href="{{ route('bannernewrelease.index') }}">List Banner New Release</a></li>              
                <li><a class="nav-link" href="{{ route('bannerexplore.index') }}">List Banner Explore</a></li>   
              </ul>
            </li>
            
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-clipboard"></i> <span>Playlist</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('category.index') }}">List Playlist</a></li>            
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fab fa-youtube"></i> <span>Channels</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('channels.index') }}">List Edit Channels</a></li>            
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-sliders-h"></i> <span>Carousel</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('carousel.index') }}">List Carousel</a></li>            
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-bookmark"></i> <span>Tipe Konten</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('tag.index') }}">List Konten</a></li>            
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-exclamation-circle"></i><span>About</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('about.index') }}">Edit Halaman About</a></li>            
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-user"></i> <span>Users</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('user.index') }}">List User</a></li>            
              </ul>
            </li>
            @endif
            @if (Auth::user()->tipe == 0)
            
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-book-open"></i> <span>Post</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('post.index') }}">List Post</a></li> 
                <li><a class="nav-link" href="{{ route('post.tampil_hapus') }}">List Post Dihapus</a></li>
                <li><a class="nav-link" href="{{ route('bannernewrelease.index') }}">List Banner New Release</a></li>              
                <li><a class="nav-link" href="{{ route('bannerexplore.index') }}">List Banner Explore</a></li>   
              </ul>
            </li>
            @endif
    
       
        </aside>
      </div>
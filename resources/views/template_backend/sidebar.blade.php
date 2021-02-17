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
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-book-open"></i> <span>New Release</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('post.index') }}">List New Release</a></li> 
                <li><a class="nav-link" href="{{ route('post.tampil_hapus') }}">List New Release Dihapus</a></li>
                <li><a class="nav-link" href="{{ route('bannernewrelease.index') }}">List Banner New Release</a></li>              
              
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-clipboard"></i> <span>Kategori</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('category.index') }}">List Kategori</a></li>            
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
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-globe"></i> <span>Explore</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('explore.index') }}">List Explore</a></li> 
                <li><a class="nav-link" href="{{ route('explore.tampil_hapus') }}">List Explore Dihapus</a></li>              
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-bookmark"></i> <span>Tag</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('tag.index') }}">List Tag</a></li>            
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
    
       
        </aside>
      </div>
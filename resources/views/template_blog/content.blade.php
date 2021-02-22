
<!DOCTYPE html>
<html lang="en">
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE-edge">
<meta name="viewport" content="width=device-width, intial-scale=1.0">


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="{{ asset('public/fontawesome-free-5.12.1-web/css/all.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/Bootstrap/Bootstrap/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/css/home.css') }}">
<link rel="stylesheet" href="{{ asset('public/css/footer.css') }}">
<link rel="stylesheet" href="{{ asset('public/css/nav.css') }}">

<script type="text/javascript" src="{{ asset('public/js/JQuery3.3.1.js') }}"></script> 
<script type="text/javascript" src="{{ asset('public/js/lightslider.js')}}"></script>
<!-- font -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&display=swap" rel="stylesheet">

@yield('linkcss')
<link rel="stylesheet" href="{{ asset('public/css/lightslider.css')}}">


<title>@yield('title')</title>
</head>
<body>

 <!-- Navbar -->
 <nav  class="navbar fixed-top shadow-sm">
      <div class="menu-icon">
      <span class="fas fa-bars"></span></div>
      <div class="logo"> 
        <a href="{{ route('blog') }}"><img class="logo1" src="{{ asset('public/img/logo.png')}}"></a> 
      </div>
      @yield('nav')
      <div class="search-icon">
        <span class="fas fa-search"></span>
      </div>
      <div class="cancel-icon">
        <span class="fas fa-times"></span>
      </div>
      <form action="{{ route('blog.cari') }}" method="get">
              <input type="search" class="search-data" placeholder="Search" name="cari" required>
              <button type="submit" class="fas fa-search"></button>
            </form>
  </nav>  <!-- akhir Navbar -->
    
    
    @yield('isi')

    <footer class="footer-distributed">
 
 <div class="footer-left">

   <img src="{{ asset('public/img/logo.png')}}" href="{{ route('blog') }}">

       <p class="footer-links">
       <a href="{{ route('blog') }}">Home</a>
     ·
       <a href="{{ route('blog.explore') }}">Explore</a>
     ·
       <a href="{{ route('blog.newrelease') }}">New Release</a>
     ·
       <a href="{{ route('blog.about') }}">About</a>
       </p>
   
       <p class="footer-company-name">Kominfo-Jatim &copy; 2021</p>
 </div>
 
<div class="footer-center">
 
     <div>
           <i class="fa fa-map-marker"></i>
           <p><span>Jl. A. Yani 242 - 244, Surabaya. </span></p>
       </div>
       <div>
           <i class="fa fa-phone"></i>
           <p>(031) 8294608</p>
       </div>
       <div>
           <i class="fa fa-envelope"></i>
           <p> kominfo@jatimprov.go.id</p>
       </div>

</div>
<div class="footer-right">

   <p class="footer-company-about">
   <span>Follow Us</span>
   Please Follow us on our Social Media Profile in order to keep updated.
   </p>

   <div class="footer-icons">
 
           <a href="http://kominfo.jatimprov.go.id/"><i class="fas fa-globe"></i></a>
           <a href="https://www.instagram.com/kominfojatim/"><i class="fab fa-instagram"></i></a>
           <a href="https://www.youtube.com/channel/UCEe1ees-scoEkTQv3he9PJw"><i class="fab fa-youtube"></i></a>

   </div>

</div>

</footer>
<div class="footer2">
   <p><span><i class="fas fa-copyright"></i>Powered by</span>PKL Sistem Informasi Unair 2021</p>

</div>

<!-- Script Navbar -->
<script>
    const menuBtn = document.querySelector(".menu-icon span");
    const searchBtn = document.querySelector(".search-icon");
    const cancelBtn = document.querySelector(".cancel-icon");
    const items = document.querySelector(".nav-items");
    const form = document.querySelector("form");
    menuBtn.onclick = ()=>{
      items.classList.add("active");
      menuBtn.classList.add("hide");
      searchBtn.classList.add("hide");
      cancelBtn.classList.add("show");
    }
    cancelBtn.onclick = ()=>{
      items.classList.remove("active");
      menuBtn.classList.remove("hide");
      searchBtn.classList.remove("hide");
      cancelBtn.classList.remove("show");
      form.classList.remove("active");
      cancelBtn.style.color = "#ff3d00";
    }
    searchBtn.onclick = ()=>{
      form.classList.add("active");
      searchBtn.classList.add("hide");
      cancelBtn.classList.add("show");
    }
  </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    </body>
    </html>
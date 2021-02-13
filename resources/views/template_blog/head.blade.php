
<!DOCTYPE html>
<html lang="en">
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE-edge">
<meta name="viewport" content="width=device-width, intial-scale=1.0">


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="{{ asset('/fontawesome-free-5.12.1-web/css/all.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/Bootstrap/Bootstrap/css/all.min.css') }}">
<link rel="stylesheet" href="/css/home.css">
<link rel="stylesheet" href="/css/footer.css">
<link rel="stylesheet" href="/css/nav.css">

<script type="text/javascript" src="/js/JQuery3.3.1.js"></script> 
<script type="text/javascript" src="/js/lightslider.js"></script>
<!-- font -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&display=swap" rel="stylesheet">

@yield('linkcss')
<link rel="stylesheet" href="/css/lightslider.css">


<title>@yield('title')</title>
</head>
<body>

 <!-- Navbar -->
 <nav  class="navbar fixed-top shadow-sm">
      <div class="menu-icon">
      <span class="fas fa-bars"></span></div>
      <div class="logo">  
        <img class="logo1" src="img/logo.png" href="/">
      </div>
      @yield('nav')
      <div class="search-icon">
        <span class="fas fa-search"></span>
      </div>
      <div class="cancel-icon">
        <span class="fas fa-times"></span>
      </div>
      <form action="#">
              <input type="search" class="search-data" placeholder="Search" required>
              <button type="submit" class="fas fa-search"></button>
            </form>
  </nav>  <!-- akhir Navbar -->
    
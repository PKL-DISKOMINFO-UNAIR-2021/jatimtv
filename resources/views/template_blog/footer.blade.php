<footer class="footer-distributed">
 
 <div class="footer-left">

  <a href="{{ route('blog') }}"> <img src="img/logo.png" ></a>

       <p class="footer-links">
       <a href="/">Home</a>
     ·
       <a href="/explore">Explore</a>
     ·
       <a href="/newrelease">New Release</a>
     ·
       <a href="/about">About</a>
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
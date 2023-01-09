<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home</title>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  <link rel="stylesheet" type="text/css" href="public/css/style.css" />
</head>

<body>
  <!-- navbar -->
  <nav class="navbar navbar-expand-sm sticky-top navbar-dark bg-black">
    <div class="container">
      <a class="navbar-brand" href="">Pestana CR7</a>
      <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="book">Book</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login"><i class="fa-solid fa-right-to-bracket"></i>&nbspLog-in</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="signup"><i class="fa-solid fa-user-plus"></i>&nbspsign-up</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- container -->
  <div class="main-container">
    <main class="home">
      <h1>Welcome To Pestana CR7</h1>
      <a href=""><button class="btn btn-lg btn-dark">Book Now</button></a>
    </main>
    <h1 class="mt-xl-5">OUR SPECIALS</h1>
    <hr class="undreline">
    <div class="cards row mt-xl-5">
      <div class="cart col-md-auto align-items-center">
        <h5>Single Room</h5>
        <img src="https://images.wallpaperscraft.com/image/single/hotel_room_bed_furniture_design_interior_109666_1920x1080.jpg" alt="">
        <p>Lorem ipsum dolor sit amet, consectetur<br>adipiscing elit. Duis sed dapibus leo nec<br>ornare diam sed
          commodo.
        </p>
      </div>
      <div class="cart col-md-auto align-items-center">
        <h5>Double Room</h5>
        <img src="https://images.wallpaperscraft.com/image/single/hotel_room_bed_stylish_modern_39745_1280x720.jpg" alt="">
        <p>Lorem ipsum dolor sit amet, consectetur<br>adipiscing elit. Duis sed dapibus leo nec<br>ornare diam sed
          commodo.
        </p>
      </div>
      <div class="cart col-md-auto align-items-center">
        <h5>Triple Room</h5>
        <img src="https://www.regalhotel.com/uploads/rrh/accommodations/720x475/Family-Triple-Room-1.jpg" alt="">
        <p>Lorem ipsum dolor sit amet, consectetur<br>adipiscing elit. Duis sed dapibus leo nec<br>ornare diam sed
          commodo.
        </p>
      </div>
      <div class="cart col-sm-auto align-items-center">
        <h5>Quade Room</h5>
        <img src="https://lh5.googleusercontent.com/J1XpKNGlglaV2YCFLOVWDMd4rUxkM2SoanCbgOfs3OymPCbOT9azKGjisbonjM-K5ti7fnf-o68yRmJwZi083J6Yarx7M20YG7ft92_5h2J3Tew_XAQLG-FqCOofn2fhbjcYCdaU" alt="">
        <p>Lorem ipsum dolor sit amet, consectetur<br>adipiscing elit. Duis sed dapibus leo nec<br>ornare diam sed
          commodo.
        </p>
      </div>
    </div>
  </div>
  <!-- about section -->
  <div class="about-us">
    <img src="https://cdn.mos.cms.futurecdn.net/i2uTqLtBxdZYJs4FVn4LZV.jpg" alt="">
    <div class="about-info">
      <h3>OUR STORY</h3>
      <hr class="decoration">
      <p>Lorem ipsum dolor sit amet, consectetur<br>adipiscing elit. Duis sed dapibus leo
        nec<br>ornare diam. Sed
        commodo nibh
        ante<br>facilisis bibendum dolor feugiat at. sed<br>dapibus leo nec ornare diam commodo.
        <br>
        <br>
        <br>
        Lorem ipsum dolor sit amet, consectetur<br>adipiscing elit. Duis sed dapibus leo nec<br>ornare diam. Sed
        commodo nibh
        ante<br>facilisis bibendum dolor feugiat at. sed<br>
      </p>
    </div>
  </div>
  <!-- contact section-->
  <section class="info">
    <div class="contact">
      <h3>contact us</h3>
      <form>
        <div class="input-row">
          <div class="input-group">
            <label>Name</label>
            <input class="contact-input" type="text" placeholder="Enter Your Name" />
          </div>
          <div class="input-group">
            <label>Phone</label>
            <input class="contact-input" type="text" placeholder="+1 212 212 2022" />
          </div>
        </div>
        <div class="input-row">
          <div class="input-group">
            <label>Email</label>
            <input class="contact-input" type="text" placeholder="account@test.com" />
          </div>
          <div class="input-group">
            <label>Subject</label>
            <input class="contact-input" type="text" placeholder="your raeson" />
          </div>
        </div>
        <label>Message</label>
        <textarea rows="5" placeholder="Enter Your Message"></textarea>
        <button class="btn btn-dark" type="submit">SEND</button>
      </form>
    </div>
    <div class="map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3372.63122783313!2d-9.232586578741913!3d32.294891314102045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdac211719897669%3A0x6f59fa5bb517f58a!2sYoucode%20Safi!5e0!3m2!1sar!2sma!4v1666789865837!5m2!1sar!2sma" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </section>
  <!--  footer  -->
  <footer class="text-center text-white bg-black">
    <div class="footer-container">
      <div class="social-icons">
        <a href=""><i class="fa-brands fa-facebook social-icon"></i></a>
        <a href=""><i class="fa-brands fa-instagram social-icon"></i></a>
        <a href=""><i class="fa-regular fa-map social-icon"></i></a>
        <a href=""><i class="fa-brands fa-twitter social-icon"></i></a>
        <a href=""><i class="fa-solid fa-phone social-icon"></i></a>
      </div>
      <div class="text-center text-white p-3 ">
        <p>Copyright ©2022 All rights reserved | Pestana</p>
      </div>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
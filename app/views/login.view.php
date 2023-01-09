<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LOG-IN</title>
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
  <main>
    <div class="form">
      <form id="login_form" class="form_class" action="" method="post">
        <h4>LOG-IN</h4>
        <div class="form_div">
          <label>username:</label>
          <input class="field_class" name="login_txt" type="text" placeholder="Enter your username" autofocus />
          <label>Password:</label>
          <input id="pass" class="field_class" name="password" type="password" placeholder="Enter your password" />
          <button class="submit_class" type="submit">Enter</button>
        </div>
        <div class="info_div">
          <p>You dont have account ?<a href="">Register now</a></p>
        </div>
      </form>
    </div>
  </main>
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
      <div class="text-center text-white p-3">
        <p>Copyright ©2022 All rights reserved | Pestana</p>
      </div>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
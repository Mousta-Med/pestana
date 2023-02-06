<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="/pestana/public/css/style.css" />
    <title>Profile</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-black">
        <div class="container">
            <a class="navbar-brand" href="">Pestana CR7</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/pestana/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pestana/rooms">Rooms</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $_SESSION['name'] ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/pestana/reservation">Your reservation</a></li>
                            <li><a class="dropdown-item" href="/pestana/logout"><i class="fa-solid fa-right-from-bracket"></i>Log-out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- conatiner -->
    <main>
        <div class="profile">
            <?php
            if (!empty($_SESSION['alert'])) {
            ?>
                <div class="msg">
                    <div class="alert alert-<?= $_SESSION['alert']['type'] ?>" role="alert">
                        <?= $_SESSION['alert']['msg'] ?>
                    </div>
                </div>
            <?php
            }
            unset($_SESSION['alert']);
            ?>

        </div>
    </main>
    <!--  footer  -->
    <footer class=" text-center text-white bg-black">
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
    <script src="/pestana/public/js/script.js"></script>
</body>

</html>
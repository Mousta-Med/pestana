<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rooms</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="/pestana/public/css/style.css" />
</head>

<body onload="myfunc()">
    <!-- navbar -->
    <nav class="navbar navbar-expand-sm sticky-top navbar-dark bg-black">
        <div class="container">
            <a class="navbar-brand" href="">Pestana CR7</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="rooms">Rooms</a>
                    </li>
                    <?php if (!isset($_SESSION['email'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/pestana/login"><i class="fa-solid fa-right-to-bracket"></i>&nbspLog-in</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/pestana/signup"><i class="fa-solid fa-user-plus"></i>&nbspsign-up</a>
                        </li>
                    <?php } else { ?>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?= $_SESSION['name'] ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/pestana/reservation">Your reservation</a></li>
                                <li><a class="dropdown-item" href="/pestana/logout"><i class="fa-solid fa-right-from-bracket"></i>Log-out</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="bookcontainer">
        <div>
            <h1 class="mb-5">Search a Room</h1>
            <form class="search-room mb-5" action="" method="post">
                <label>Check-in Date:</label>
                <input type="date" id="checkin" name="checkin" required>
                <label>Check-out Date:</label>
                <input type="date" id="checkout" name="checkout" required>
                <label for="roomtype">Room Type:</label>
                <select id="roomtype" name="roomtype">
                    <option>single</option>
                    <option>double</option>
                    <option>suite</option>
                </select>
                <div class="" style="display: flex; align-items:center;">
                    <label for="suitetype" id="suite-label">Suite Type</label>
                    <select id="SuiteType" class="suitetype form-control" name="suitetype" required>
                        <option>standard</option>
                        <option>junior</option>
                        <option>presidential</option>
                        <option>penthouse</option>
                        <option>honeymoon</option>
                        <option>bridal</option>
                    </select>
                </div>
                <button class="btn btn-primary" type="submit">Search Now</button>
            </form>
            <div class="guests" class="d-none">
                <input id="nbpersonne" type="hidden" disabled>
            </div>
            <div class="rooms">
                <?php
                while ($rooms = mysqli_fetch_assoc($sql)) { ?>
                    <form action="book/<?= $rooms['romm_id'] ?>" method="post">
                        <div class="room mb-3">
                            <div class="inform p-3">
                                <p><?= ucwords($rooms['romm_type']) ?> Room</p>
                                <p><?= ucwords($rooms['suite_type']) ?></p>
                            </div>
                            <img src="/pestana/public/img/<?= $rooms['room_image'] ?>" alt="">
                            <div class="inform p-3">
                                <input class="d-none" type="number" name="roomid" value="<?= $rooms['romm_id'] ?>">
                                <button class="btn btn-primary">Book</button>
                                <p><?= $rooms['room_price'] ?>$ / Night</p>
                            </div>
                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
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
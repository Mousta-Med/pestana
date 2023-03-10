<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reservation</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="/pestana/public/css/style.css" />
    <style>
        input {
            width: 150px;
        }
    </style>
</head>

<body onload="myfunc()">
    <!-- navbar -->
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

    <main class="reservation">
        <div class="reservation-form">
            <form action="/pestana/addreservation/<?= $id ?>" method="post" class="d-flex flex-column align-items-center">
                <?php
                $rooms = mysqli_fetch_assoc($sql) ?>
                <div class="row">
                    <?php
                    if (isset($_SESSION['check_in'])) {
                    ?>
                        <div class="col">
                            <label>Check-in Date :</label>it

                            <input type="date" name="check_in" value="<?= $_SESSION['check_in'] ?>" readonly>
                        </div>
                        <div class="col">
                            <label>Check-out Date :</label>
                            <input type="date" name="check_out" value="<?= $_SESSION['check_out'] ?>" readonly>
                        </div>
                    <?php } else { ?>
                        <div class="col">
                            <label>Check-in Date :</label>
                            <input type="date" name="check_in" id="checkin" value="" required>
                        </div>
                        <div class="col">
                            <label>Check-out Date :</label>
                            <input type="date" name="check_out" id="checkout" value="" required>
                        </div>
                    <?php } ?>
                </div>
                <div class="row">
                    <div class="col">
                        <label>Room Type :</label>
                        <input type="txet" id="roomtype" value="<?= $rooms['romm_type'] ?>" name="roomtype" readonly>
                    </div>
                    <div id="suite-label" class="col">
                        <label>Suite Type</label>
                        <input type="text" id="SuiteType" value="<?= $rooms['suite_type'] ?>" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label>Room Price :</label>
                        <input type="number" value="<?= $rooms['room_price'] ?>" name="roomnum" min="1" max="6" readonly>
                    </div>
                    <div class="guests col">
                        <label>Number Of Guest:</label>
                        <input id="nbpersonne" type="number" name="guests" value="0" min="0" max="6" required>
                    </div>
                </div>
                <div class="guests-form">

                </div>
                <button class="btn btn-success my-3">Book Now</button>
            </form>
        </div>
    </main>
    <!--  footer  -->
    <footer class="text-center text-white bg-black ">
        <div class="footer-container">
            <div class="social-icons">
                <a href=""><i class="fa-brands fa-facebook social-icon"></i></a>
                <a href=""><i class="fa-brands fa-instagram social-icon"></i></a>
                <a href=""><i class="fa-regular fa-map social-icon"></i></a>
                <a href=""><i class="fa-brands fa-twitter social-icon"></i></a>
                <a href=""><i class="fa-solid fa-phone social-icon"></i></a>
            </div>
            <div class="text-center text-white p-3 ">
                <p>Copyright ??2022 All rights reserved | Pestana</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/pestana/public/js/script.js"></script>
</body>

</html>
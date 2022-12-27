<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Book</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="public/css/style.css" />
</head>

<body>
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
    <h1>Book a Room</h1>
    <div class="bookcontainer">
        <form class="reservation">
            <label for="checkin">Check-in Date:</label>
            <input type="date" id="checkin" name="checkin">
            <label for="checkout">Duration:</label>
            <input type="number" name="duration">
            <label for="roomtype">Room Type:</label>
            <select id="roomtype" name="roomtype">
                <option>single</option>
                <option>double</option>
                <option>suite</option>
            </select>
            <div id="SuiteType"></div>
            <div id="nbpersonne"></div>
            <div id="guestSection"></div>
            <input type="submit" value="Book Now">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="public/js/script.js"></script>
</body>

</html>
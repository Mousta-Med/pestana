<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="/pestana/public/css/style.css" />
    <title>Dashboard</title>
</head>

<body>
    <nav class="navbar navbar-expand-sm sticky-top navbar-dark bg-black">
        <div class="container">
            <a class="navbar-brand" href="">Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="dashboard/add"><button type="button" class="btn btn-primary me-3">Add Room</button></a>
                    </li>
                    <li class="nav-item">
                        <a href="admin/logout"><button class="btn btn-danger">Log Out</button></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="container-fluid mt-5">
                        <div class="row">
                            <div class="col-sm-4">
                                <?php
                                $stat1 = mysqli_fetch_array($sql2);
                                $stat2 = mysqli_fetch_array($sql3);
                                $stat3 = mysqli_fetch_array($sql4);
                                ?>
                                <div class="card bg-primary text-white">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Reservations</h5>
                                        <p class="card-text"><?= $stat1[0] ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card bg-success text-white">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Income</h5>
                                        <p class="card-text"><?= $stat3[0] ?>$</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card bg-danger text-white">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Rooms</h5>
                                        <p class="card-text"><?= $stat2[0] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Room Type</th>
                                    <th>Suite Type</th>
                                    <th>Room Price</th>
                                    <th>Room image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($rooms = mysqli_fetch_assoc($sql)) { ?>
                                    <tr>
                                        <td><?= $rooms['romm_id'] ?></td>
                                        <td><?= $rooms['romm_type'] ?></td>
                                        <td><?= $rooms['suite_type'] ?></td>
                                        <td><?= $rooms['room_price'] ?></td>
                                        <td><img src="/pestana/public/img/<?= $rooms['room_image'] ?>" width="50" height="50" style="border-radius:5px;"></td>
                                        <td>
                                            <a href="dashboard/update/<?= $rooms['romm_id'] ?>"><button type="button" class="btn btn-secondary mr-2">Edit</button></a>
                                            <a href="dashboard/delete/<?= $rooms['romm_id'] ?>"><button type=" button" class="btn btn-danger">Delete</button></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title">Reservations</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Reservation Owner</th>
                                    <th>Check in</th>
                                    <th>Check out</th>
                                    <th>Room Id</th>
                                    <th>Room Type</th>
                                    <th>Guests</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($reservations = mysqli_fetch_assoc($sql1)) { ?>
                                    <tr>
                                        <td><?= $reservations['reservation_id'] ?></td>
                                        <td><?= $reservations['reservation_owner'] ?></td>
                                        <td><?= $reservations['check_in'] ?></td>
                                        <td><?= $reservations['check_out'] ?></td>
                                        <td><?= $reservations['room_id'] ?></td>
                                        <td><?= $reservations['room_type'] ?></td>
                                        <td><?= $reservations['guests_number'] ?></td>

                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/pestana/public/js/script.js"></script>

</body>

</html>
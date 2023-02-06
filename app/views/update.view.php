<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>UPDATE</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="public/css/style.css" />
</head>

<body onload="myfunc()">
    <div class="container mt-5">
        <h1>Update a Room</h1>
        <a href="../../dashboard"><button class="btn btn-danger">Back</button></a>
        <br>
        <input type="hidden" id="checkin">
        <input type="hidden" id="checkout">
        <div class="guests"></div>
        <div id="nbpersonne"></div>
        <div id="image"></div>
        <br>
        <?php
        while ($rooms = mysqli_fetch_assoc($sql)) { ?>
            <form action="../updateroom/<?= $rooms['romm_id'] ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="room-number">Room Price:</label>
                    <input type="number" class="form-control" id="room-number" name="roomnum" value="<?= $rooms['room_price'] ?>">
                </div>
                <div class="form-group">
                    <label for="room-type">Room Type:</label>
                    <select class="form-control" id="roomtype" name="roomtype">
                        <option <?php if ($rooms['romm_type'] === "single") {
                                    echo "selected";
                                } ?>>single</option>
                        <option <?php if ($rooms['romm_type'] === "double") {
                                    echo "selected";
                                } ?>>double</option>
                        <option <?php if ($rooms['romm_type'] === "suite") {
                                    echo "selected";
                                } ?>>suite</option>
                    </select>
                    <div class="">
                        <label for="suitetype" id="suite-label">Suite Type</label>
                        <select id="SuiteType" class="suitetype form-control" name="suitetype" required>
                            <option <?php if ($rooms['suite_type'] === "standard") {
                                        echo "selected";
                                    } ?>>standard</option>
                            <option <?php if ($rooms['suite_type'] === "junior") {
                                        echo "selected";
                                    } ?>>junior</option>
                            <option <?php if ($rooms['suite_type'] === "presidential") {
                                        echo "selected";
                                    } ?>>presidential</option>
                            <option <?php if ($rooms['suite_type'] === "penthouse") {
                                        echo "selected";
                                    } ?>>penthouse</option>
                            <option <?php if ($rooms['suite_type'] === "honeymoon") {
                                        echo "selected";
                                    } ?>>honeymoon</option>
                            <option <?php if ($rooms['suite_type'] === "bridal") {
                                        echo "selected";
                                    } ?>>bridal</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="room-image">Room Image:</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Update Room</button>
            </form>
        <?php } ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/pestana/public/js/script.js"></script>
</body>

</html>
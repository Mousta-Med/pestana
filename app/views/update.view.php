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
        <br>
        <?php
        while ($rooms = mysqli_fetch_assoc($sql)) { ?>
            <form action="../updateroom/<?= $rooms['romm_id'] ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="room-number">Room Number:</label>
                    <input type="number" class="form-control" id="room-number" name="roomnum" value="<?= $rooms['room_number'] ?>">
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
                    <div id="SuiteType" class="d-none">
                        <label for="suitetype">Suite Type</label>
                        <select class="suitetype form-control" name="suitetype" required>
                            <option <?php if ($rooms['suite_type'] === "standard") {
                                        echo "selected";
                                    } ?>>Standard</option>
                            <option <?php if ($rooms['suite_type'] === "junior") {
                                        echo "selected";
                                    } ?>>Junior</option>
                            <option <?php if ($rooms['suite_type'] === "presidential") {
                                        echo "selected";
                                    } ?>>Presidential</option>
                            <option <?php if ($rooms['suite_type'] === "penthouse") {
                                        echo "selected";
                                    } ?>>Penthouse</option>
                            <option <?php if ($rooms['suite_type'] === "honeymoon") {
                                        echo "selected";
                                    } ?>>Honeymoon</option>
                            <option <?php if ($rooms['suite_type'] === "bridal") {
                                        echo "selected";
                                    } ?>>Bridal</option>
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
    <script src="../../public/js/script.js"></script>
</body>

</html>
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

<body>
    <div class="container mt-5">
        <h1>Update a Room</h1>
        <a href="../../dashboard"><button class="btn btn-danger">Back</button></a>
        <br>
        <br>
        <form>
            <?php
            while ($rooms = mysqli_fetch_assoc($sql)) { ?>
                <div class="form-group">
                    <label for="room-number">Room Number:</label>
                    <input type="number" class="form-control" id="room-number" value="<?= $rooms['room_number'] ?>">
                </div>
                <div class="form-group">
                    <label for="room-type">Room Type:</label>
                    <select class="form-control" id="roomtype" name="room-type">
                        <option><?= $rooms['romm_type'] ?></option>
                        <option>single</option>
                        <option>double</option>
                        <option>suite</option>
                    </select>
                    <div id="SuiteType"></div>
                </div>
                <div class="form-group">
                    <label for="room-image">Room Image:</label>
                    <input type="file" class="form-control" name="room-image">
                </div>
            <?php } ?>
            <button type="submit" class="btn btn-primary">Update Room</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="../../public/js/script.js"></script> -->
    <?php if (empty($rooms['suite_type'])) {
        echo "<script type=\"text/javascript\">
                document.querySelector('#suite').style.display='none'; 
                document.querySelector('#suite_select').setAttribute('name','another');
                </script>";
    }
    ?>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ADD</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="public/css/style.css" />
</head>

<body>
    <div class="container mt-5">
        <h1>Add a Room</h1>
        <a href="../dashboard"><button class="btn btn-danger">Back</button></a>
        <br>
        <br>
        <form method="post" action="addroom" enctype="multipart/form-data">
            <div class="form-group">
                <label>Room Number:</label>
                <input type="number" class="form-control" name="roomnum" placeholder="Enter room number" required>
            </div>
            <div class="form-group">
                <label>Room Type:</label>
                <select class="form-control" id="roomtype" name="roomtype">
                    <option>single</option>
                    <option>double</option>
                    <option>suite</option>
                </select>
                <div id="SuiteType"></div>
            </div>
            <div class="form-group">
                <label>Room Image:</label>
                <input type="file" class="form-control" name="image" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Room</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../public/js/script.js"></script>
</body>

</html>
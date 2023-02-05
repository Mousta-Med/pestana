<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LOG-IN</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="/pestana/public/css/style.css" />
</head>

<body>
    <main>
        <div class="form">
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
            <form id="login_form" class="form_class" action="admin/login" method="post">
                <h4>LOG-IN</h4>
                <div class="form_div">
                    <label>Username:</label>
                    <input class="field_class" name="username" type="text" placeholder="Enter your username" required />
                    <label>Password:</label>
                    <input id="pass" class="field_class" name="password" type="password" placeholder="Enter your password" required />
                    <button class="submit_class" type="submit">Enter</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>
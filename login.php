<?php include('connect.php'); ?>
<?php include(INCLUDE_PATH . '/logic/userSignup.php'); ?>
<?php
if (isset($_SESSION['user'])) {
    header("location: " . BASE_URL);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Przychodnia - Zaloguj</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php include(INCLUDE_PATH . "/layouts/navbar.php") ?>
    <div class="container center" style="padding-top: 10px">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <form class="form" action="login.php" method="post">
                    <h2 class="text-center">Zaloguj</h2>
                    <hr>
                    <?php include(INCLUDE_PATH . "/layouts/messages.php") ?>
                    <div class="form-group">
                        <label class="control-label">Nazwa użytkownika</label>
                        <input type="text" name="username" value="<?php echo isset($username) ? $username : '' ?>" class="form-control <?php echo isset($errors['username']) ? 'is-invalid' : '' ?>">
                        <?php if (isset($errors['username'])) : ?>
                            <span class="invalid-feedback"><?php echo $errors['username'] ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Hasło</label>
                        <input type="password" name="password" class="form-control <?php echo (isset($errors['password']) || (isset($errors['passwordConf']))) ? 'is-invalid' : '' ?>">
                        <?php if (isset($errors['password'])) : ?>
                            <span class="invalid-feedback"><?php echo $errors['password'] ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="login_btn" class="btn btn-primary btn-block">Zaloguj</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>
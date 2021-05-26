<?php include('connect.php'); ?>
<?php include(INCLUDE_PATH . "/logic/functions.php"); ?>
<?php
if (!isset($_SESSION['user'])) {
    header("location: " . BASE_URL . "login.php");
} else if (isAdmin($_SESSION['user'])) {
    header("location: " . BASE_URL . "admin/panel.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Przychodnia</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php include(INCLUDE_PATH . "/layouts/navbar.php") ?>
    <div class="container center" style="padding-top: 10px">
        <?php include(INCLUDE_PATH . "/layouts/messages.php") ?>
        <div class="row justify-content-md-center">
            <div class="col-md-4">
                <h1 class="text-center">Witaj, <?php echo $_SESSION['user']['name'] ?>!</h1>
                <hr>
                <ul class="list-group text-center">
                    <a href="<?php echo BASE_URL . 'profile.php' ?>" class="list-group-item">Twój profil</a>
                    <a href="<?php echo BASE_URL . 'appointments.php' ?>" class="list-group-item">Wizyty</a>
                </ul>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
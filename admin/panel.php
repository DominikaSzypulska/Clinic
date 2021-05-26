<?php include('../connect.php') ?>
<?php include(INCLUDE_PATH . "/logic/functions.php"); ?>
<?php
if (!isAdmin($_SESSION['user'])) {
    header("location: " . BASE_URL);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Panel administratora</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php include(INCLUDE_PATH . "/layouts/navbar.php") ?>
    <div class="container-center" style="padding-top: 10px">
        <?php include(INCLUDE_PATH . "/layouts/messages.php") ?>
        <div class="row justify-content-md-center">
            <div class="col-md-4">
                <h1 class="text-center">Panel administratora</h1>
                <hr>
                <ul class="list-group text-center">
                    <a href="<?php echo BASE_URL . 'admin/patients/patientsList.php' ?>" class="list-group-item">Zarządzaj pacjentami</a>
                    <a href="<?php echo BASE_URL . 'admin/doctors/doctorsList.php' ?>" class="list-group-item">Zarządzaj lekarzami</a>
                    <a href="<?php echo BASE_URL . 'admin/appointments/appointmentsList.php' ?>" class="list-group-item">Zarządzaj wizytami</a>
                </ul>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
<?php include('connect.php') ?>
<?php include(INCLUDE_PATH . '/logic/functions.php') ?>
<?php
if (!isset($_SESSION['user'])) {
    header("location: " . BASE_URL . "login.php");
}
?>
<?php $pastAppointments = getPastAppointments(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Przychodnia - Wizyty</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php include(INCLUDE_PATH . "/layouts/navbar.php") ?>
    <div class="container center" style="padding-top: 10px">
        <?php include(INCLUDE_PATH . "/layouts/messages.php") ?>
        <div class="row justify-content-md-center">
            <div class="col-md-8 col-md-offset-2">
                <a href="appointments.php" class="btn btn-primary" style="margin-top: 15px;">
                    Nadchodzące wizyty
                </a>
                <hr>
                <h1 class="text-center">Historia wizyt</h1>
                <br />
                <?php if (!empty($pastAppointments)) : ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Numer</th>
                                <th>Data</th>
                                <th>Lekarz</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pastAppointments as $key => $value) : ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $value['date']; ?></td>
                                    <td><?php echo $value['doctorname'] . ' ' . $value['doctorsurname'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <h2 class="text-center">Brak wcześniejszych wizyt</h2>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
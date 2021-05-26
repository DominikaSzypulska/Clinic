<?php include('../../connect.php') ?>
<?php include(ROOT_PATH . '/admin/appointments/appointmentLogic.php') ?>
<?php $appointments = getAllAppointments(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Przychodnia - Lista wizyt</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php include(INCLUDE_PATH . "/layouts/navbar.php") ?>
    <div class="container center" style="padding-top: 10px">
        <?php include(INCLUDE_PATH . "/layouts/messages.php") ?>
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <a href="appointmentForm.php" class="btn btn-success" style="margin-top: 15px;">
                    Dodaj nową wizytę
                </a>
                <hr>
                <h1 class="text-center">Wizyty</h1>
                <br />
                <?php if (!empty($appointments)) : ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Numer</th>
                                <th>Pacjent</th>
                                <th>Data</th>
                                <th>Lekarz</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($appointments as $key => $value) : ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $value['patientname'] . ' ' . $value['patientsurname'] ?></td>
                                    <td><?php echo $value['date']; ?></td>
                                    <td><?php echo $value['doctorname'] . ' ' . $value['doctorsurname'] ?></td>
                                    <td class="text-center">
                                        <a href="<?php echo BASE_URL ?>admin/appointments/appointmentForm.php?delete_appointment=<?php echo $value['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Jesteś pewny?')">
                                            Usuń
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <h2 class="text-center">Brak wizyt w bazie danych</h2>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
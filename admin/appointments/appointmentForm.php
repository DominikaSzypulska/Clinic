<?php include('../../connect.php'); ?>
<?php include(ROOT_PATH . '/admin/appointments/appointmentLogic.php'); ?>
<?php $patients = getAllPatients() ?>
<?php $doctors = getAllDoctors() ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Przychodnia - Dodaj wizytę</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php include(INCLUDE_PATH . "/layouts/navbar.php") ?>
    <div class="container center" style="padding-top: 10px">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <a href="appointmentsList.php" class="btn btn-primary" style="margin-top: 15px;">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    Wizyty
                </a>
                <br>

                <form class="form" action="appointmentForm.php" method="post">
                    <h2 class="text-center">Dodaj nową wizytę</h2>
                    <hr>
                    <div class="form-group">
                        <label class="control-label">Pacjent</label>
                        <select name="patient" class="form-control <?php echo isset($errors['patient']) ? 'jest niepoprawny' : '' ?>">
                            <option value="">Wybierz pacjenta</option>
                            <?php foreach ($patients as $patient) : ?>
                                <option value="<?php echo $patient['id'] ?>"><?php echo $patient['name'] . ' ' . $patient['surname'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php if (isset($errors['patient'])) : ?>
                            <span class="invalid-feedback"><?php echo $errors['patient'] ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Doctor</label>
                        <select name="doctor" class="form-control <?php echo isset($errors['doctor']) ? 'jest niepoprawny' : '' ?>">
                            <option value="">Wybierz lekarza</option>
                            <?php foreach ($doctors as $doctor) : ?>
                                <option value="<?php echo $doctor['id'] ?>"><?php echo $doctor['name'] . ' ' . $doctor['surname'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php if (isset($errors['doctor'])) : ?>
                            <span class="invalid-feedback"><?php echo $errors['doctor'] ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Data</label>
                        <input type="datetime-local" name="date" placeholder="yyyy-mm-dd hh:mm" class="form-control <?php echo isset($errors['date']) ? 'jest niepoprawny' : '' ?>">
                        <?php if (isset($errors['date'])) : ?>
                            <span class="invalid-feedback"><?php echo $errors['date'] ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="save_appointment" class="btn btn-success btn-block">Zapisz wizytę</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
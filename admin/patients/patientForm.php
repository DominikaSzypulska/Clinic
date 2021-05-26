<?php include('../../connect.php'); ?>
<?php include(ROOT_PATH . '/admin/patients/patientLogic.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Przychodnia - Dodaj pacjenta</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php include(INCLUDE_PATH . "/layouts/navbar.php") ?>
    <div class="container center" style="padding-top: 10px">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <a href="patientsList.php" class="btn btn-primary" style="margin-top: 15px;">
                    Pacjent
                </a>
                <br>
                <form class="form" action="patientForm.php" method="post">
                    <h2 class="text-center">Dodaj nowego pacjenta</h2>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="control-label">Imię</label>
                            <input type="text" name="name" value="<?php echo isset($name) ? $name : '' ?>" class="form-control <?php echo isset($errors['name']) ? 'jest niepoprawny' : '' ?>">
                            <?php if (isset($errors['name'])) : ?>
                                <span class="invalid-feedback"><?php echo $errors['name'] ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Nazwisko</label>
                            <input type="text" name="surname" value="<?php echo isset($surname) ? $surname : '' ?>" class="form-control <?php echo isset($errors['surname']) ? 'jest niepoprawny' : '' ?>">
                            <?php if (isset($errors['surname'])) : ?>
                                <span class="invalid-feedback"><?php echo $errors['surname'] ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Pesel</label>
                        <input type="text" name="pesel" value="<?php echo isset($pesel) ? $pesel : '' ?>" class="form-control <?php echo isset($errors['pesel']) ? 'jest niepoprawny' : '' ?>">
                        <?php if (isset($errors['pesel'])) : ?>
                            <span class="invalid-feedback"><?php echo $errors['pesel'] ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label class="control-label">Wiek</label>
                            <input type="number" name="age" value="<?php echo isset($age) ? $age : '' ?>" class="form-control <?php echo isset($errors['age']) ? 'jest niepoprawny' : '' ?>">
                            <?php if (isset($errors['age'])) : ?>
                                <span class="invalid-feedback"><?php echo $errors['age'] ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Miasto</label>
                            <input type="text" name="city" value="<?php echo isset($city) ? $city : '' ?>" class="form-control <?php echo isset($errors['city']) ? 'jest niepoprawny' : '' ?>">
                            <?php if (isset($errors['city'])) : ?>
                                <span class="invalid-feedback"><?php echo $errors['city'] ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Ulica</label>
                            <input type="text" name="street" value="<?php echo isset($street) ? $street : '' ?>" class="form-control <?php echo isset($errors['street']) ? 'jest niepoprawny' : '' ?>">
                            <?php if (isset($errors['street'])) : ?>
                                <span class="invalid-feedback"><?php echo $errors['street'] ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="save_patient" class="btn btn-success btn-block">Zapisz pacjenta</button>
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
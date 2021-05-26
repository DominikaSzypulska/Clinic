<?php include('../../connect.php'); ?>
<?php include(ROOT_PATH . '/admin/doctors/doctorLogic.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Przychodnia - Dodaj lekarza</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php include(INCLUDE_PATH . "/layouts/navbar.php") ?>
    <div class="container center" style="padding-top: 10px">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <a href="doctorsList.php" class="btn btn-primary" style="margin-top: 15px;">
                    Lekarze
                </a>
                <br>
                <form class="form" action="doctorForm.php" method="post">
                    <h2 class="text-center">Dodaj nowego lekarza</h2>
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
                        <label class="control-label">Specjalizacja</label>
                        <input type="text" name="specialty" value="<?php echo isset($specialty) ? $specialty : '' ?>" class="form-control <?php echo isset($errors['specialty']) ? 'jest niepoprawny' : '' ?>">
                        <?php if (isset($errors['specialty'])) : ?>
                            <span class="invalid-feedback"><?php echo $errors['specialty'] ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Numer telefonu</label>
                        <input type="text" name="phone" value="<?php echo isset($phone) ? $phone : '' ?>" class="form-control <?php echo isset($errors['phone']) ? 'jest niepoprawny' : '' ?>">
                        <?php if (isset($errors['phone'])) : ?>
                            <span class="invalid-feedback"><?php echo $errors['phone'] ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="save_doctor" class="btn btn-success btn-block">Zapisz lekarza</button>
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
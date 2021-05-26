<?php include('connect.php'); ?>
<?php include(INCLUDE_PATH . '/logic/userSignup.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Przychodnia - Zarejestruj</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php include(INCLUDE_PATH . "/layouts/navbar.php") ?>
    <div class="container center" style="padding-top: 10px">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <form class="form" action="signup.php" method="post">
                    <h2 class="text-center">Zarejestruj</h2>
                    <hr>
                    <div class="form-group">
                        <label class="control-label">Nazwa użytkownika</label>
                        <input type="text" name="username" value="<?php echo isset($username) ? $username : '' ?>" class="form-control <?php echo isset($errors['username']) ? 'jest niepoprawny' : '' ?>">
                        <?php if (isset($errors['username'])) : ?>
                            <span class="invalid-feedback"><?php echo $errors['username'] ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Hasło</label>
                        <input type="password" name="password" class="form-control <?php echo (isset($errors['password']) || (isset($errors['passwordConf']))) ? 'jest niepoprawny' : '' ?>">
                        <?php if (isset($errors['password'])) : ?>
                            <span class="invalid-feedback"><?php echo $errors['password'] ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Powtórz hasło</label>
                        <input type="password" name="passwordConf" class="form-control <?php echo isset($errors['passwordConf']) ? 'jest niepoprawny' : '' ?>">
                        <?php if (isset($errors['passwordConf'])) : ?>
                            <span class="invalid-feedback"><?php echo $errors['passwordConf'] ?></span>
                        <?php endif; ?>
                    </div>
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
                        <button type="submit" name="signup_btn" class="btn btn-primary btn-block">Zarejestruj</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
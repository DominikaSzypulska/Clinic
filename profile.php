<?php include('connect.php') ?>
<?php include(INCLUDE_PATH . "/logic/functions.php"); ?>
<?php
if (!isset($_SESSION['user'])) {
    header("location: " . BASE_URL . "login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Przychodnia - Profil pacjenta</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php include(INCLUDE_PATH . "/layouts/navbar.php") ?>
    <div class="container center" style="padding-top: 10px">
        <?php include(INCLUDE_PATH . "/layouts/messages.php") ?>
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <hr>
                <h1 class="text-center">Informacje o Twoim koncie</h1>
                <br />
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th style="width: 30%" scope="row">Imię</th>
                            <td class="text-right"><?php echo $_SESSION['user']['name'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Nazwisko</th>
                            <td class="text-right"><?php echo $_SESSION['user']['surname'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Pesel</th>
                            <td class="text-right"><?php echo $_SESSION['user']['pesel'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Wiek</th>
                            <td class="text-right"><?php echo $_SESSION['user']['age'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Miasto</th>
                            <td class="text-right"><?php echo $_SESSION['user']['city'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Ulica</th>
                            <td class="text-right"><?php echo $_SESSION['user']['street'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
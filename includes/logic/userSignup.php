<?php include(INCLUDE_PATH . "/logic/functions.php"); ?>
<?php
$errors = [];

if (isset($_POST['signup_btn'])) {
    $errors = validateUser($_POST);

    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $pesel = $_POST['pesel'];
    $age = $_POST['age'];
    $city = $_POST['city'];
    $street = $_POST['street'];

    if (count($errors) === 0) {
        $query = "INSERT INTO user (username, password, name, surname, pesel, age, city, street) VALUES (:username, :password, :name, :surname, :pesel, :age, :city, :street)";
        $stmt = $conn->prepare($query);
        $result = $stmt->execute(['username' => $username, 'password' => $password, 'name' => $name, 'surname' => $surname, 'pesel' => $pesel, 'age' => $age, 'city' => $city, 'street' => $street]);
        if ($result) {
            $user_id = $conn->lastInsertId();
            // $stmt->closeCursor();
            loginById($user_id);
        } else {
            $_SESSION['error_msg'] = "Błąd bazy danych: Nie można zarejestrować użytkownika";
        }
    }
}

if (isset($_POST['login_btn'])) {
    $errors = validateUser($_POST);

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($errors)) {
        $query = "SELECT * FROM user WHERE username=:username LIMIT 1";
        $user = getSingleRecord($query, ['username' => $username]);

        if (!empty($user)) {
            if (password_verify($password, $user['password'])) {
                loginById($user['id']);
            } else {
                $_SESSION['error_msg'] = "Błędne dane uwierzytelniające";
            }
        } else {
            $_SESSION['error_msg'] = "Błędne dane uwierzytelniające";
        }
    }
}

function validateUser($user)
{
    $errors = [];

    if (isset($user['passwordConf']) && ($user['password'] !== $user['passwordConf'])) {
        $errors['passwordConf'] = "Hasła nie są takie same";
    }

    if (isset($user['signup_btn'])) {
        $query = "SELECT * FROM user WHERE username = :username LIMIT 1";
        $oldUser = getSingleRecord($query, ['username' => $user['username']]);
        if (!empty($oldUser['username']) && $oldUser['username'] === $user['username']) {
            $errors['username'] = "Nazwa użytkownika już istnieje";
        }
    }

    if (isset($user['pesel']) && !validatePesel($user['pesel'])) {
        $errors['pesel'] = "Nieprawidłowy PESEL";
    }

    if (isset($user['age']) && !validateAge($user['age'])) {
        $errors['age'] = "Musisz mieć co najmniej 15 lat";
    }

    foreach ($user as $key => $value) {
        if (in_array($key, ['signup_btn', 'login_btn'])) {
            continue;
        }
        if (empty($value)) {
            $errors[$key] = "To pole jest wymagane";
        }
    }
    return $errors;
}

<?php include(INCLUDE_PATH . '/logic/functions.php') ?>
<?php

if (!isAdmin($_SESSION['user'])) {
    header("location: " . BASE_URL);
}

if (isset($_POST['save_patient'])) {
    $errors = validatePatient($_POST);

    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $pesel = $_POST["pesel"];
    $age = $_POST["age"];
    $city = $_POST["city"];
    $street = $_POST["street"];

    if (count($errors) === 0) {
        global $conn;
        $query = 'insert into user (name, surname, pesel, age, city, street) values (:name, :surname, :pesel, :age, :city, :street)';
        $stmt = $conn->prepare($query);
        $result = $stmt->execute(['name' => $name, 'surname' => $surname, 'pesel' => $pesel, 'age' => $age, 'city' => $city, 'street' => $street]);

        if ($result) {
            $_SESSION['success_msg'] = "Pacjent został dodany pomyślnie.";
            header("location: " . BASE_URL . "admin/patients/patientsList.php");
            exit(0);
        } else {
            $_SESSION['error_msg'] = "Coś poszło nie tak. Nie można zapisać pacjenta do bazy danych.";
        }
    }
}

function validatePatient($patient)
{
    $errors = [];

    if (!validatePesel($patient['pesel'])) {
        $errors['pesel'] = "Nieprawidłowy PESEL";
    }

    if (!validateAge($patient['age'])) {
        $errors['age'] = "Musisz mieć co najmniej 15 lat.";
    }

    foreach ($patient as $key => $value) {
        if (in_array($key, ['save_patient'])) {
            continue;
        }
        if (empty($value)) {
            $errors[$key] = "To pole jest wymagane";
        }
    }
    return $errors;
}

if (isset($_GET['delete_patient'])) {
    $patient_id = $_GET['delete_patient'];
    deletePatient($patient_id);
}

function deletePatient($patient_id)
{
    global $conn;
    $query = "DELETE FROM user WHERE id=:id";
    $stmt = $conn->prepare($query);
    $result = $stmt->execute(['id' => $patient_id]);

    if ($result) {
        $_SESSION['success_msg'] = "Pacjent został usunięty!";
        header("location: " . BASE_URL . "admin/patients/patientsList.php");
        exit(0);
    }
}

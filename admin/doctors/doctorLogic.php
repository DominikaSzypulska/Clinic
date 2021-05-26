<?php include(INCLUDE_PATH . '/logic/functions.php') ?>
<?php

if (!isAdmin($_SESSION['user'])) {
    header("location: " . BASE_URL);
}

if (isset($_POST['save_doctor'])) {
    $errors = validateDoctor($_POST);

    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $specialty = $_POST["specialty"];
    $phone = $_POST["phone"];

    if (count($errors) === 0) {
        global $conn;
        $query = 'insert into doctor (name, surname, specialty, phone) values (:name, :surname, :specialty, :phone)';
        $stmt = $conn->prepare($query);
        $result = $stmt->execute(['name' => $name, 'surname' => $surname, 'specialty' => $specialty, 'phone' => $phone]);

        if ($result) {
            $_SESSION['success_msg'] = "Lekarz został pomyślnie dodany";
            header("location: " . BASE_URL . "admin/doctors/doctorsList.php");
            exit(0);
        } else {
            $_SESSION['error_msg'] = "Coś poszło nie tak. Nie można zapisać lekarza do bazy danych.";
        }
    }
}

function validateDoctor($doctor)
{
    $errors = [];

    if (!validatePhone($doctor['phone'])) {
        $errors['phone'] = "Nieprawidłowy numer telefonu";
    }

    foreach ($doctor as $key => $value) {
        if (in_array($key, ['save_doctor'])) {
            continue;
        }
        if (empty($value)) {
            $errors[$key] = "To pole jest wymagane";
        }
    }
    return $errors;
}

if (isset($_GET['delete_doctor'])) {
    $doctor_id = $_GET['delete_doctor'];
    deleteDoctor($doctor_id);
}

function deleteDoctor($doctor_id)
{
    global $conn;
    $query = "DELETE FROM doctor WHERE id=:id";
    $stmt = $conn->prepare($query);
    $result = $stmt->execute(['id' => $doctor_id]);

    if ($result) {
        $_SESSION['success_msg'] = "Lekarz usunięty!";
        header("location: " . BASE_URL . "admin/doctors/doctorsList.php");
        exit(0);
    }
}

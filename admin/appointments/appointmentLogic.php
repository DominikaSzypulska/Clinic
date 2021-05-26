<?php include(INCLUDE_PATH . '/logic/functions.php') ?>
<?php

if (!isAdmin($_SESSION['user'])) {
    header("location: " . BASE_URL);
}

if (isset($_POST['save_appointment'])) {
    $errors = validateAppointment($_POST);

    $patient = $_POST["patient"];
    $doctor = $_POST["doctor"];
    $date = $_POST["date"];

    if (count($errors) === 0) {
        global $conn;
        $query = 'insert into appointment (patient, doctor, date) values (:patient, :doctor, :date)';
        $stmt = $conn->prepare($query);
        $result = $stmt->execute(['patient' => $patient, 'doctor' => $doctor, 'date' => $date]);

        if ($result) {
            $_SESSION['success_msg'] = "Wizyta została dodana pomyślnie.";
            header("location: " . BASE_URL . "admin/appointments/appointmentsList.php");
            exit(0);
        } else {
            $_SESSION['error_msg'] = "Coś poszło nie tak. Nie można zapisać spotkania w bazie danych.";
        }
    }
}

function validateAppointment($appointment)
{
    $errors = [];

    if (!validateDate($appointment['date'])) {
        $errors['date'] = "Wymagany format daty: YYYY-mm-dd hh:mm";
    }

    foreach ($appointment as $key => $value) {
        if (in_array($key, ['save_appointment'])) {
            continue;
        }
        if (empty($value)) {
            $errors[$key] = "To pole jest wymagane";
        }
    }
    return $errors;
}

if (isset($_GET['delete_appointment'])) {
    $appointment_id = $_GET['delete_appointment'];
    deleteAppointment($appointment_id);
}

function deleteAppointment($appointment_id)
{
    global $conn;
    $query = "DELETE FROM appointment WHERE id=:id";
    $stmt = $conn->prepare($query);
    $result = $stmt->execute(['id' => $appointment_id]);

    if ($result) {
        $_SESSION['success_msg'] = "Wizyta została usunięta!";
        header("location: " . BASE_URL . "admin/appointments/appointmentsList.php");
        exit(0);
    }
}

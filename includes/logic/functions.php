<?php

function isAdmin($user)
{
    if ($user['role'] == "admin") {
        return true;
    } else {
        return false;
    }
}

function loginById($user_id)
{
    $query = "SELECT u.id, u.role_id, u.username, u.name, u.surname, u.pesel, u.age, "
        . "u.city, u.street, r.name as role FROM user u LEFT JOIN role r "
        . "ON u.role_id=r.id WHERE u.id=:id LIMIT 1";
    $user = getSingleRecord($query, ['id' => $user_id]);

    if (!empty($user)) {
        $_SESSION['user'] = $user;
        $_SESSION['success_msg'] = "Zalogowano pomyślnie";

        if (isAdmin($user)) {
            header('location: ' . BASE_URL . 'admin/panel.php');
        } else {
            header('location: ' . BASE_URL . 'index.php');
        }
        exit();
    }
}

function validatePesel($pesel)
{
    return (is_numeric($pesel) && strlen($pesel) == 11);
}

function validateAge($age)
{
    return (is_numeric($age) && ($age >= 15));
}

function validatePhone($phone)
{
    return (is_numeric($phone) && strlen($phone) >= 9);
}

function validateDate($date)
{
    return (bool) strtotime($date);
}

function getAllPatients()
{
    $query = "SELECT id, name, surname, pesel, age, city, street FROM user WHERE role_id IS NULL";
    return $patients = getMultipleRecords($query, []);
}

function getAllDoctors()
{
    $query = "SELECT id, name, surname, specialty, phone FROM doctor";
    return $doctors = getMultipleRecords($query, []);
}

function getAllAppointments()
{
    $query = "SELECT p.name AS patientname, p.surname AS patientsurname, a.date AS date,"
        . "a.id AS id, d.name AS doctorname, d.surname AS doctorsurname FROM appointment a "
        . "LEFT JOIN user p ON a.patient=p.id LEFT JOIN doctor d ON a.doctor=d.id "
        . "ORDER BY a.date DESC";
    return $appointments = getMultipleRecords($query, []);
}

function getUpcomingAppointments()
{
    $patientId = $_SESSION['user']['id'];
    $query = "SELECT p.id AS patientid, p.name AS patientname, p.surname AS patientsurname, a.date AS date,"
        . "a.id AS id, d.name AS doctorname, d.surname AS doctorsurname FROM appointment a "
        . "LEFT JOIN user p ON a.patient=p.id LEFT JOIN doctor d ON a.doctor=d.id "
        . "WHERE p.id=:id AND a.date > CURRENT_DATE ORDER BY a.date ASC";
    return $appointments = getMultipleRecords($query, ['id' => $patientId]);
}

function getPastAppointments()
{
    $patientId = $_SESSION['user']['id'];
    $query = "SELECT p.id AS patientid, p.name AS patientname, p.surname AS patientsurname, a.date AS date,"
        . "a.id AS id, d.name AS doctorname, d.surname AS doctorsurname FROM appointment a "
        . "LEFT JOIN user p ON a.patient=p.id LEFT JOIN doctor d ON a.doctor=d.id "
        . "WHERE p.id=:id AND a.date < CURRENT_DATE ORDER BY a.date DESC";
    return $appointments = getMultipleRecords($query, ['id' => $patientId]);
}

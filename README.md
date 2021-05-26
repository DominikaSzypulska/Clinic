# Project Name
> Clinic

## Table of contents
* [General Information](#general-information)
* [Technologies](#technologies)
* [Features](#features)
* [Screenshots](#screenshots)
* [Code Examples](#code-examples)
* [Setup](#setup)
* [Status](#status)
* [Contact](#contact)

## General Information
Project **Clinic** is a small and simple system for managing a medical clinic created with PHP, Bootstrap and MySQL.
The project was created for the needs of the classes.

## Technologies
Project is created with:
- PhpStorm version: 2021.1.1.
- PHP version: 8.0.3

## Features
- The patient can create an account and log in
- After logging in, the patient can see upcoming visits and the history of visits
- Admin can add and remove patients, doctors and visits

**To Do:**
- After logging in, the patient may add or refuse an appointment
- The patient receives an e-mail after making an appointment

## Screenshots
Example screenshots showing the operation of the clinic.

Patient panel:
![Patient panel](/images/patientPanel.png)

Panel for adding a new patient:
![Add new patient](/images/addNewPatient.png)

Visits management panel:
![Visits management panel](/images/visitManagement.png)

## Code Examples
The code represents the appointment management logic:
```
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
```

## Setup
To run this project locally on your home computer, you need to install the free XAMPP application. 
You can download XAMPP [here](http://www.apachefriends.org/en/xampp-windows.html#641). 
After correct installation, launch the XAMPP control panel. 
Here you need to enable Apache and MySQL server by clicking "Start" in the Actions column. 
You should also have a database MySQL that can be created via *localhost/phpmyadmin*. 
Then put the project folder in *xampp/htdocs* and run in your browser by typing *localhost/clinic/login.php*.

## Status
Project is: *in progress*.

## Contact
Created by [Dominika Szypulska](https://github.com/DominikaSzypulska).
<br>e-mail: dominikaszypulska@onet.pl -feel free to contact me!

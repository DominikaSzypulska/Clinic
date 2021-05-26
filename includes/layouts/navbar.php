<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container center">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo BASE_URL ?>">Przychodnia</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <?php if (isset($_SESSION['user'])) : ?>
                    <?php if (isAdmin($_SESSION['user'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL . 'admin/patients/patientsList.php' ?>">Pacjenci</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL . 'admin/doctors/doctorsList.php' ?>">Lekarze</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL . 'admin/appointments/appointmentsList.php' ?>">Wizyty</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL . 'profile.php' ?>">Profil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL . 'appointments.php' ?>">Wizyty</a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if (isset($_SESSION['user'])) : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION['user']['username'] ?> <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <?php if (isAdmin($_SESSION['user'])) : ?>
                                <a class="dropdown-item" href="<?php echo BASE_URL . 'admin/panel.php' ?>">Panel administratora</a>
                                <div class="dropdown-divider"></div>
                            <?php endif; ?>
                            <a class="dropdown-item" href="<?php echo BASE_URL . 'logout.php' ?>" style="color: red;">Wyloguj</a>
                        </div>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL . 'signup.php' ?>">Zarejestruj</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL . 'login.php' ?>">Zaloguj</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<?php if (isset($_SESSION['success_msg'])) : ?>
    <div class="alert <?php echo 'alert-success'; ?> alert-dismissible" role="alert">
        <?php
        echo $_SESSION['success_msg'];
        unset($_SESSION['success_msg']);
        ?>
    </div>
<?php endif; ?>

<?php if (isset($_SESSION['error_msg'])) : ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <?php
        echo $_SESSION['error_msg'];
        unset($_SESSION['error_msg']);
        ?>
    </div>
<?php endif; ?>
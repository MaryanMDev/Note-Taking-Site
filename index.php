<?php include('partials/header.php'); ?>

<div class="page-container">

    <?php

    if (isset($_SESSION['delete'])) {
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
    }

    ?>
    <div class="introduction">
        <h1> Welcome to your notes </h1>
        <h3 class="link-text"> Lets start Adding to your <a href="<?php echo SITEURL ?>/add-entry.php"> todolist </a> <h3>
    </div>


</div>
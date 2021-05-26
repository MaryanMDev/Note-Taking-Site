<div class="page-container">

    <?php

    include('partials/header.php');

    $id = $_GET['id'];

    $sql = "SELECT * FROM posts WHERE id=$id";
    $res = mysqli_query($conn, $sql);

    $rows = mysqli_fetch_assoc($res);

    $title = $rows['title'];
    $content = $rows['content'];

    ?>



    <form action='#' methos="get">
        <input type="text" name="title" value="<?php echo $title ?>">
        <textarea class="content-box" type="textarea" name="content"><?php echo $content; ?></textarea>
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <input type="submit" name="submit">
    </form>


    <?php 
    
    if(isset($_GET['submit'])){
        
        $title = $_GET['title'];
        $content = $_GET['content'];
        $id = $_GET['id'];

        $sql = "UPDATE posts SET title = '$title' , content = '$content' WHERE id=$id";
        echo $sql;

        $res = mysqli_query($conn, $sql);

        $_SESSION['successful'] = '<div class="success"> Post successfully updated! </div>';

        header('location:' . SITEURL . 'add-entry.php');
        
    }
    
    ?>


</div>
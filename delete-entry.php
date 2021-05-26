<?php include('partials/header.php'); ?>

<?php

$id = $_GET['id'];


$sql = "DELETE FROM posts WHERE id = $id";

echo $sql;

$res = mysqli_query($conn , $sql);

if($res = true){
    $_SESSION['delete'] = '<div class="success"> Post successfully deleted! </div>';
    header('location:' . SITEURL . 'add-entry.php');
} else {
    $_SESSION['delete'] = 'could not delete post';
}

?>
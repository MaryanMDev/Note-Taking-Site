<?php include('partials/header.php'); ?>

<div class="page-container">

    <?php

    if(isset($_SESSION['empty'])){
        echo $_SESSION['empty'];
        unset($_SESSION['empty']);
    } 

    if(isset($_SESSION['delete'])){
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
    }

    if(isset($_SESSION['successful'])){
        echo $_SESSION['successful'];
        unset($_SESSION['successful']);
    }

    ?>


    <form action='#' methos="get">
        <input type="text" name="title" placeholder="Enter Title"> 
        <textarea class="content-box" type="textarea" name="content" placeholder="Enter Content"></textarea>
        <input type="submit" name="submit">
    </form>

    <div class="container">

        <?php

        $sql = 'SELECT title , content , id , publish_date  FROM posts';

        $res = mysqli_query($conn, $sql);


        $count = mysqli_num_rows($res);

        if ($count > 0) {
            while ($rows = mysqli_fetch_assoc($res)) {
                $title =  $rows['title'];
                $content = $rows['content'];
                $id =  $rows['id'];
                $published = $rows['publish_date'];
        ?>

                <div class="list-card">
                    <p> <?php echo $published; ?> </p>
                    <div class="content"><h2> <?php echo $title; ?> </h2> <p> <?php echo $content; ?></p></div>
                    <a class="delete" href="<?php echo SITEURL?>delete-entry.php?id=<?php echo $id ?>"> Delete </a>
                    <a class="update" href="<?php echo SITEURL?>update-post.php?id=<?php echo $id ?>"> Update </a>
                </div>

        <?php


            }
        }

        ?>

    </div>

    <div>
    </div>



</div>

<?php

$title = $_GET['title'];
$content = $_GET['content'];

if (isset($_GET['submit']) && $title != '' && $content != '') {
    $sql = "INSERT INTO posts(title,content) VALUES('$title','$content')";
    $res = mysqli_query($conn, $sql);
    $_SESSION['successful'] = '<div class="success"> New post added! </div>';
    header('location:'. SITEURL. 'add-entry.php');
} else if (isset($_GET['submit']) && $title == '' && trim($content) == ''){
    $_SESSION['empty'] = '<div class="warning"> fields must be filled in </div>';
    header('location:'. SITEURL . 'add-entry.php');
}

?>
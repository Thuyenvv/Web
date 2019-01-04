<?php
    require_once('../../../configs/db.php');
    $database = new Database();
    $db = $database->connect();
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql = "DELETE FROM book WHERE id= $id";
        $result = $db->query($sql);
        header("Location: /admin/list-book");
    }
?>
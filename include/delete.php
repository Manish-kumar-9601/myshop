<?php
require_once 'db.inc.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];
    $sql = "DELETE FROM clients WHERE id = :id
    ";
    $stmt=$connect->prepare($sql);
    $stmt->execute(['id'=>$id]);
    header("Location:../index.php");
}

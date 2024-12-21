<?php 
require 'config.php';
if (isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = $connection->prepare('DELETE FROM donate WHERE Id= :id');
    $sql->bindParam(':id',$id,PDO::FETCH_ASSOC);
    if ($sql->execute()){
        echo "Record with $id has deleted";
        header('location:donationmanagement.php');
    }
    else{
        echo "Failed to delete";
    }
}
?>
<?php 
include('conn.php');

$id = (int)$_REQUEST['id'];

$sql = "DELETE FROM Roba WHERE ID=$id";

if (mysqli_query($conn, $sql)) {
    die(header("Location: index.php"));
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
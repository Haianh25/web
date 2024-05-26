<?php
    include './ConnectDatabase/connectDatabase.php';

    $search = $_GET['search'];

    $sql = "SELECT * FROM PRODUCT WHERE name LIKE '%$search%'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $json = json_encode($products);

    header('Content-Type: application/json');
    echo $json;

?>
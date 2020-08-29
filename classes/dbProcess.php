<?php
require_once('../classes/config.php');

if (isset($_POST)) {
    // DB Attributes
    $sa_id = $_POST['sa_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $cell = $_POST['cell'];
    // SQL Query
    $sql = "INSERT INTO registration (sa_id,name,email,cell) VALUES(?,?,?,?)";
    $stmtInsert = $db->prepare($sql);
    $result = $stmtInsert->execute([$sa_id, $name, $email, $cell]);
    if ($result) {
        echo 'Successfull Registered!';
    } else {
        echo 'There was a problem..';
    }
} else {
    echo 'No Data';
}

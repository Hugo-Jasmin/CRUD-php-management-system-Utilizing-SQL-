<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "<script>alert('This path is restricted go back to index.php!');</script>";
    exit;
}
?>

<table border="1">
<!-- check connection
BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAKBREAK BREAK BREAK BREAK BREAK -->
        <?php
    $servername = "localhost";
    $username = "u855808231_root"; 
    $password = "Memeikaykenjay1"; 
    $dbname = "u855808231_huyo"; 
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("error with connection: " . mysqli_connect_error());
        }
        ?>
        
<!-- check connection
BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAKBREAK BREAK BREAK BREAK BREAK -->
        <tr>
            <td>id</td>
            <td>action</td>
            <td>name</td>
            <td>vendor</td>
            <td>category</td>
            <td>frequency</td>    
            <td>description</td>
            <td>cost</td>
            <td>date</td>
            <td>status</td>
            <td>Invoice Number</td>
            <td>comments</td>
            <td>date created</td>
        </tr>

        <?php

        $query = "SELECT * FROM overheadhistory";
        
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die('Error: ' . mysqli_error($conn));
        }
        

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>'.$row['historyid'].'</td>';
            echo '<td>'.$row['historyaction'].'</td>';
            echo '<td>'.$row['historyname'].'</td>';
            echo '<td>'.$row['historyvendor'].'</td>';
            echo '<td>'.$row['historycategory'].'</td>';  
            echo '<td>'.$row['historyfrequency'].'</td>';  
            echo '<td>'.$row['historydescription'].'</td>';  
            echo '<td>'.$row['historycost'].'</td>'; 
            echo '<td>'.$row['historydate'].'</td>'; 
            echo '<td>'.$row['historystatus'].'</td>';
            echo '<td>'.$row['historyinvoiceNo'].'</td>'; 
            echo '<td>'.$row['historycomments'].'</td>';
            echo '<td>'.$row['datecreated'].'</td>'; 
            echo '<tr>';
        } 

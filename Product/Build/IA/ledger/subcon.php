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
            <td>work</td>
            <td>pay</td>
            <td>left to pay</td>    
            <td>added pay</td>
            <td>subtracted pay</td>
            <td>changed on</td>
        </tr>

        <?php

        $query = "SELECT * FROM subconhistory";
        
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die('Error: ' . mysqli_error($conn)); 
        }
        

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>'.$row['historyid'].'</td>'; 
            echo '<td>'.$row['historyaction'].'</td>';
            echo '<td>'.$row['historyname'].'</td>';
            echo '<td>'.$row['historywork'].'</td>';
            echo '<td>'.$row['historypay'].'</td>';  
            echo '<td>'.$row['leftpay'].'</td>';  
            echo '<td>'.$row['addPay'].'</td>';  
            echo '<td>'.$row['subPay'].'</td>'; 
            echo '<td>'.$row['datechanged2'].'</td>';
            echo '<tr>';
        } 

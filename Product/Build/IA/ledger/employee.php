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
            <td>address</td>
            <td>employee type</td>
            <td>wage</td>
            <td>bonus</td>
            <td>payplan</td>
            <td>note</td>
            <td>job</td>
            <td>changed on</td>
        </tr>
        <?php

        $query = "SELECT historyemployeetype, historyaction, historyname, historyadress, historywage, historybonus, historypayplan, historynote, historyjob, historyid, datechanged  FROM employeehistory";
        
     
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die('Error: ' . mysqli_error($conn));
        }
        

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>'.$row['historyid'].'</td>';
            echo '<td>'.$row['historyaction'].'</td>';
            echo '<td>'.$row['historyname'].'</td>';
            echo '<td>'.$row['historyadress'].'</td>';
            echo '<td>'.$row['historyemployeetype'].'</td>';
            echo '<td>'.$row['historywage'].'</td>';     
            echo '<td>'.$row['historybonus'].'</td>';  
            echo '<td>'.$row['historypayplan'].'</td>';   
            echo '<td>'.$row['historynote'].'</td>';    
            echo '<td>'.$row['historyjob'].'</td>';
            echo '<td>'.$row['datechanged'].'</td>';
            echo '</tr>';
        }

        ?>
<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "<script>alert('This path is restricted go back to index.php!');</script>";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>calender</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-container {
            border: 2px solid #dee2e6;  
            overflow: hidden;
            padding: 0;
        }
        .container {
            border: 2px solid #dee2e6;
        }
    </style>
</head>
<body>
    <script>
      function employeehistorypopup() {
      window.open("/IA/ledger/employee.php", "HistoryPopup", "width=800,height=600");
      }
      function overheadhistorypopup() {
      window.open("/IA/ledger/overhead.php", "HistoryPopup", "width=800,height=600");
      }
      function subconhistorypopup() {
      window.open("/IA/ledger/subcon.php", "HistoryPopup", "width=800,height=600");
      }
      </script>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
      <a class="navbar-brand" href="/IA/employeeprojectview.php">Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/IA/management.php">management</a>
          </li>



          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              History View
          </a>
          <ul class="dropdown-menu">
              <li><a class="dropdown-item" onclick="employeehistorypopup();">employee history</a></li>
              <li><a class="dropdown-item" onclick="subconhistorypopup();">subcon history</a></li>
              <li><a class="dropdown-item" onclick="overheadhistorypopup();">overhead history</a></li>
          </ul>
          </li>


          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Add
          </a>
          <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/IA/employee/createkaryawan.php">employee</a></li>
              <li><a class="dropdown-item" href="/IA/subcon/createsubcon.php">subcon</a></li>
              <li><a class="dropdown-item" href="/IA/overhead/createoverhead.php">overhead</a></li>
          </ul>
          </li>
          <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true"> Anugerah Cipta Aestetika™ Architechtures</a>
          </li>
      </ul>
      </div>
  </div>
  </nav>
  <!--- BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAKBREAK BREAK BREAK BREAK BREAK -->
    <br>
    <br>
<?php

    $servername = "localhost";
    $username = "u855808231_root"; 
    $password = "Memeikaykenjay1"; 
    $dbname = "u855808231_huyo"; 
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("error with connection: " . mysqli_connect_error());
}
            
             $id=$_GET['id'];
             $data=mysqli_query($conn,"select * from karyawan where id='$id'");

             while($d=mysqli_fetch_array($data))
            
        {
        
    ?>


    <div class="container">
        <form method="POST">    
			<input type="hidden" name="id" value="<?php echo $d['id']; ?>"> 
            <label for="label">add present days:</label>
            <input type="date" id="presentdate" name="presentdate" required><br>
            <label for="label">add comment?:</label>
            <input type="text" id="comment" name="comment" required><br>
            <input type="submit" name="presentsubmit" value="Register">
        </form>
        <form method="post">
        <label for="label">add absent date:</label>
            <input type="date" id="absentdate" name="absentdate" required><br>
            <label for="label">add comment?:</label>
            <input type="text" id="commentabsent" name="commentabsent" required><br>
            <input type="submit" name="absentsubmit" value="Register">
        </form>
        <br>
        <?php
        }
        ?>
        
        <?php
    if (isset($_POST['presentsubmit'])) {
        $id = $_GET['id'];
        $present = $_POST['presentdate'];
        $comment = $_POST['comment'];
        $datecreated = date("Y-m-d H:i:s"); 
        
    
        $sql = "SELECT * FROM calander WHERE (presentdate='$present' OR absentdate ='$present') AND id='$id'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('There has already been a date set for this date, please delete old to input new!');</script>";
        } else {
            $presentsql = "INSERT INTO calander (id,presentdate,datecreated,comments) VALUES ('$id','$present','$datecreated','$comment')";
            if (mysqli_query($conn, $presentsql)) {
                $last_id = mysqli_insert_id($conn);
        
        }
    }
}
    if (isset($_POST['absentsubmit'])) {
        $id = $_GET['id'];
        $absent = $_POST['absentdate'];
        $commentabsent = $_POST['commentabsent'];
        $datecreated1 = date("Y-m-d H:i:s");
        
    
        $sqlabsent = "SELECT * FROM calander WHERE (presentdate='$absent' OR absentdate='$absent') AND id='$id'";
        $result1 = mysqli_query($conn, $sqlabsent);
        if (mysqli_num_rows($result1) > 0) {
            echo "<script>alert('There has already been a date set for this date, please delete old to input new!');</script>";
        } else {
            $absentsql = "INSERT INTO calander (id,absentdate,datecreated,comments) VALUES ('$id', '$absent','$datecreated1','$commentabsent')";
            if (mysqli_query($conn, $absentsql)) {
                $last_id = mysqli_insert_id($conn);
        
        }
    }
}
        
        $presentquery = "SELECT * FROM calander WHERE presentdate != '0000-00-00'AND id = '$id'";
        $presentresult = mysqli_query($conn, $presentquery);
        $presentrowresult = mysqli_num_rows($presentresult); 

        $absentquery = "SELECT * FROM calander WHERE absentdate != '0000-00-00' AND id = '$id'";
        $absentresult = mysqli_query($conn, $absentquery);
        $absentrowresult = mysqli_num_rows($absentresult); 

        $balancequery = "SELECT * FROM karyawan WHERE id = '$id'";
        $balanceresult = mysqli_query($conn, $balancequery);
    
        if ($row = mysqli_fetch_assoc($balanceresult)) {
        $currentbonus = $row['bonus'];
    
        if (isset($_POST['addbonus'])) {
        $addbonus = $_POST['bonusset']; 
        $newbalance = $currentbonus + $addbonus;
        $datechanged = date("Y-m-d H:i:s");

        $selectquery = "SELECT * FROM karyawan WHERE id = '$id'";
        $getquery = mysqli_query($conn, $selectquery);
        
        if ($row = mysqli_fetch_assoc($getquery)) {
            
            $action = "edit";
            $placeholdername = $row['Nama'];
            $placeholderaddress = $row['alamat'];
            $placeholderwage = $row['gaji'];
            $placeholderbonus = $row['bonus'];
            $placeholderpayplan = $row['payplan'];
            $placeholderjob = $row['job'];
            $placeholdernote = $row['note'];
            $placeholderemployeetype = $row['employeetype'];
        
            $insertquery = "INSERT INTO employeehistory (historyaction, historyname, historyadress, historywage, historybonus, historypayplan, historynote, historyjob, historyid, datechanged, historyemployeetype) VALUES ('$action','$placeholdername','$placeholderaddress','$placeholderwage','$placeholderbonus','$placeholderpayplan','$placeholdernote','$placeholderjob','$id','$datechanged','$placeholderemployeetype')";
            if (mysqli_query($conn, $insertquery)) {
                echo "Data inserted successfully.";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
                
        }
        
        }
        else if (isset($_POST['subbonus'])) {
        $subbonus = $_POST['bonusset']; 
        $newbalance = $currentbonus - $subbonus;
        $datechanged = date("Y-m-d H:i:s");

        $selectquery = "SELECT * FROM karyawan WHERE id = '$id'";
        $getquery = mysqli_query($conn, $selectquery);
        
        if ($row = mysqli_fetch_assoc($getquery)) {
            
            $action = "edit";
            $placeholdername = $row['Nama'];
            $placeholderaddress = $row['alamat'];
            $placeholderwage = $row['gaji'];
            $placeholderbonus = $row['bonus'];
            $placeholderpayplan = $row['payplan'];
            $placeholderjob = $row['job'];
            $placeholdernote = $row['note'];
            $placeholderemployeetype = $row['employeetype'];
        
            $insertquery = "INSERT INTO employeehistory (historyaction, historyname, historyadress, historywage, historybonus, historypayplan, historynote, historyjob, historyid, datechanged, historyemployeetype) VALUES ('$action','$placeholdername','$placeholderaddress','$placeholderwage','$placeholderbonus','$placeholderpayplan','$placeholdernote','$placeholderjob','$id','$datechanged','$placeholderemployeetype')";
            if (mysqli_query($conn, $insertquery)) {
                echo "Data inserted successfully.";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        
        
        }
        
        }
        else{
            $newbalance = $currentbonus;
        }
    
        $name = $row['Nama'];
        $address = $row['alamat'];
        $wage = $row['gaji'];
        $payplan = $row['payplan'];
        $job = $row['job'];
        $note = $row['note'];
        $employeetype = $row['employeetype'];
    
        $updatequery = "UPDATE karyawan SET Nama = '$name', alamat = '$address', gaji = '$wage', bonus ='$newbalance', payplan = '$payplan', job = '$job', note = '$note', employeetype = '$employeetype' WHERE id = '$id'";
        if (mysqli_query($conn, $updatequery)) {
        } else {
            echo "error: " . mysqli_error($conn);
        }
    } else {
        echo "no ID found: $id";
    }
        $bonusresult = "SELECT bonus FROM karyawan WHERE id = '$id'"; 
        $bonusqeury = mysqli_query($conn, $bonusresult);
        $bonusrow = mysqli_fetch_assoc($bonusqeury);
        $totalbonus = $bonusrow['bonus']; 
        $formattedtotalbonus = number_format($totalbonus, 0, '.', ',');
        echo "Current bonus: " . $formattedtotalbonus;
        ?>
        
        <div class="container">
        <form method="POST">
            <?php
            echo "Present days: " . $presentrowresult; echo str_repeat('&nbsp;', 30); echo "absent days: " . $absentrowresult;
            ?>
            <br>
            <br>
            <input type="submit" name="subbonus" value="subtract">
            <input type="number" placeholder="Set bonus" name="bonusset">
            <input type="submit" name="addbonus" value="add">
        </form>
        </div>
        <br>   
        
        

        <?php
        $id = $_GET['id'];

//BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK        


?>
<div class="table-container">
        <div class="table-responsive">
          <table class="table align-middle">
<tr>
                <th>dates present</th>
                <th>comments</th>
                <th>post made on</th>
              </tr>
</div>
</div>
</div>
<?php

$readresult = "SELECT * FROM calander WHERE presentdate != '0000-00-00' AND id = '$id'"; 

      $showresult = mysqli_query($conn, $readresult);
while ($row = mysqli_fetch_assoc($showresult)) {
    echo '<tr>';
    echo '<td>'.$row['presentdate'].'</td>';
    echo '<td>'.$row['comments'].'</td>';
    echo '<td>'.$row['datecreated'].'</td>';
    echo "";    
    echo '</tr>';

}
?>
<div class="table-container">
        <div class="table-responsive">
          <table class="table align-middle">
<tr>
                <th>dates absent</th>
                <th>comments</th>
                <th>post made on</th>
              </tr>
</div>
</div>
</div>
<?php

$readresultabsent = "SELECT * FROM calander WHERE absentdate != '0000-00-00' AND id = '$id'"; 

      $showresultabsent = mysqli_query($conn, $readresultabsent);
while ($row = mysqli_fetch_assoc($showresultabsent)) {
    echo '<tr>';
    echo '<td>'.$row['absentdate'].'</td>';
    echo '<td>'.$row['comments'].'</td>';
    echo '<td>'.$row['datecreated'].'</td>';
    echo "";    
    echo '</tr>';

}

            mysqli_close($conn);
            ?>
</body> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html> 
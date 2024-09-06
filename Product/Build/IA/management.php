<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "<script>alert('This path is restricted go back to index.php!');</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>estimator</title>
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
    <a>estimations</a>
    <div>
    <form method="post">
        <div class="form-check">
        <input class="form-check-input" type="checkbox" name="employeewages" value="employeewages" id="employeewages" checked>
        <label class="form-check-label" for="employeewages">
            Include employee wages?
        </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="employeebonus" value="employeebonus" id="employeebonus" checked>
            <label class="form-check-label" for="employeebonus">
            include employee bonuses?
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="subconnewPay" value="subconnewPay" id="subconnewPay" checked>
            <label class="form-check-label" for="subconnewPay">
            include subcon payment?
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="overheadcosts" value="overheadcosts" id="overheadcosts" checked>
            <label class="form-check-label" for="overheadcosts">
            include overhead costs?
            </label>
        </div>
        <p>Note: Tabulation will be affected/based on frequency. Daily, weekly, and monthly payments will be tabulated once per day, once per 7 days, and once per 30 days until the duration set.</p>
        <input type="number" placeholder="How many days to calculate" name="duration" required>
        <br><label for="label">how many days in a month:</label>
            <input type="number" id="daysinamonth" name="daysinamonth" min="1">
    </div>

<table border="1">
        <tr>
            <td>select</td>
            <td>Name</td>
            <td>frequency</td>
            <td>id</td>
        </tr>

        <h2>Current employees</h2>


        <?php
    
    $servername = "localhost";
    $username = "u855808231_root"; 
    $password = "Memeikaykenjay1"; 
    $dbname = "u855808231_huyo"; 
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("error with connection: " . mysqli_connect_error());
        }



        $employeequery = "SELECT Nama, payplan, id  FROM karyawan"; 
        $result = mysqli_query($conn, $employeequery);
        if (!$result) {
            die('Error: ' . mysqli_error($conn));
        }
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>';
            echo '<div class="form-check">';
            echo '<input class="form-check-input" type="checkbox" name="employeecheckbox[]" value="'.$row['id'].'" checked>';  
            echo '</div>';
            echo '</td>';
            echo '<td>'.$row['Nama'].'</td>';   
            echo '<td>'.$row['payplan'].'</td>';   
            echo '<td>'.$row['id'].'</td>';   
            echo '</tr>';
        } 
        ?>
        </table>

        <table border="1">
        <tr>
            <td>select</td>
            <td>name</td>
            <td>id</td>
        </tr>

        <h2>Current subcontractors</h2>
        <?php
        $subconquery = "SELECT name, id FROM subcon"; 
        $resultsubcon = mysqli_query($conn, $subconquery);
        if (!$resultsubcon) {
            die('Error: ' . mysqli_error($conn)); 
        }
        

        while ($row = mysqli_fetch_assoc($resultsubcon)) {
            echo '<tr>';
            echo '<td>';
            echo '<div class="form-check">';
            echo '<input class="form-check-input" type="checkbox" name="subconcheckbox[]" value="'.$row['id'].'" checked>';
            echo '</div>';
            echo '</td>';
            echo '<td>'.$row['name'].'</td>';    
            echo '<td>'.$row['id'].'</td>';    
            echo '</tr>';
        }   
        ?>
        </table>

        <table border="1">
        <tr>
            <td>select</td>
            <td>name</td>
            <td>frequency</td>
            <td>id</td>
        </tr>

        <h2>Current overhead</h2>
        <?php
        $overheadquery = "SELECT name, frequency, id FROM overhead"; 
        $resultoverhead = mysqli_query($conn, $overheadquery);
        if (!$result) {
            die('Error: ' . mysqli_error($conn)); 
        }
        

        while ($row = mysqli_fetch_assoc($resultoverhead)) {
            echo '<tr>';
            echo '<td>';
            echo '<div class="form-check">';
            echo '<input class="form-check-input" type="checkbox" name="overheadcheckbox[]" value="'.$row['id'].'" checked>';
            echo '</div>';
            echo '</td>';
            echo '<td>'.$row['name'].'</td>';
            echo '<td>'.$row['frequency'].'</td>';       
            echo '<td>'.$row['id'].'</td>';    
            echo '</tr>';
        }   
        ?>
        </table>
        <br>
        <button type="submit" name="mathsubmit">Calculate!</button>
    </form>

<!--- BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAKBREAK BREAK BREAK BREAK BREAK -->


    <div class="math">
    <?php
    if (isset($_POST['mathsubmit'])) {
        $duration = (int)$_POST['duration'];
        $daysInAMonth = (int)($_POST['daysinamonth'] ?? 30);

        $totalwagedaily = 0;
        $totalwageweekly = 0;
        $totalwagemonthly = 0;
        $totalbonus = 0;
        $totalpay = 0;
        $totalcostdaily = 0;
        $totalcostweekly = 0;
        $totalcostmonthly = 0;

        function convertDaysToMonthsWeeks($duration, $daysInAMonth) {
            if ($daysInAMonth == 0) {
                $daysInAMonth = 30; // Default value so that if the user dsnt put in this just defaults
            }
            $months = intval($duration / $daysInAMonth);
            $weeks = intval($duration / 7);
        
            return [
                'months' => $months,
                'weeks' => $weeks,
                'days' => $duration
            ];
        }
        $result = convertDaysToMonthsWeeks($duration, $daysInAMonth);

        echo nl2br("\n");
        if (isset($_POST['employeewages'])) {
            $selectemployeeids = $_POST['employeecheckbox'] ?? [];
            $formattedids = implode(',', array_map('intval', $selectemployeeids));

            $sumdailyquery = "SELECT SUM(gaji) AS totalwagedaily FROM karyawan WHERE id IN ($formattedids) AND payplan = 'daily'";
            $resultdaily = mysqli_query($conn, $sumdailyquery);
            if ($resultdaily) {
                $rowdaily = mysqli_fetch_assoc($resultdaily);
                $totalwagedaily = $rowdaily['totalwagedaily'] * $duration;
                $formattedtotalwagedaily = number_format($totalwagedaily, 0, '.', ',');
                echo "Total daily wage: " . $formattedtotalwagedaily  . "<br>";
            }

            $sumweeklyquery = "SELECT SUM(gaji) AS totalwageweekly FROM karyawan WHERE id IN ($formattedids) AND payplan = 'weekly'";
            $resultweekly = mysqli_query($conn, $sumweeklyquery);
            if ($resultweekly) {
                $rowweekly = mysqli_fetch_assoc($resultweekly);
                $totalwageweekly = $rowweekly['totalwageweekly'] * $result['weeks'];
                $formattedtotalwageweekly = number_format($totalwageweekly, 0, '.', ',');
                echo "Total weekly wage: " . $formattedtotalwageweekly . "<br>";
            }

            $summonthlyquery = "SELECT SUM(gaji) AS totalwagemonthly FROM karyawan WHERE id IN ($formattedids) AND payplan = 'monthly'";
            $resultmonthly = mysqli_query($conn, $summonthlyquery);
            if ($resultmonthly) {
                $rowmonthly = mysqli_fetch_assoc($resultmonthly);
                $totalwagemonthly = $rowmonthly['totalwagemonthly'] * $result['months'];
                $formattedtotalwagemonthly = number_format($totalwagemonthly, 0, '.', ',');
                echo "Total monthly wage: " . $formattedtotalwagemonthly . "<br>";
            }
        }
        else{
            $totalwagemonthly = 0;
            $totalwagedaily = 0;
            $totalwageweekly = 0;
        }

        echo nl2br("\n");
        if (isset($_POST['employeebonus'])) {
            $selectemployeeids = $_POST['employeecheckbox'] ?? [];
            $formattedids = implode(',', array_map('intval', $selectemployeeids));
            $sumqueryfilter = "SELECT SUM(bonus) AS totalbonus FROM karyawan WHERE id IN ($formattedids)";
            $sumresult = mysqli_query($conn, $sumqueryfilter);
    
            if ($sumresult) {
                $row = mysqli_fetch_assoc($sumresult);
                $totalbonus = $row['totalbonus']; 
                $formattedTotalbonus = number_format($totalbonus, 0, '.', ',');
                echo "Total bonus: " . $formattedTotalbonus;
            }
        } else{
            $totalbonus = 0;
        }
        echo nl2br("\n");
        if (isset($_POST['subconnewPay'])) {
            $selectedsubconids = $_POST['subconcheckbox'] ?? [];
            $formattedids = implode(',', array_map('intval', $selectedsubconids));
            $sumqueryfilter = "SELECT SUM(newPay) AS totalpay FROM subcon WHERE id IN ($formattedids)";
            $sumresult = mysqli_query($conn, $sumqueryfilter);
    
            if ($sumresult) {
                $row = mysqli_fetch_assoc($sumresult);
                $totalpay = $row['totalpay']; 
                $formattedTotalpay = number_format($totalpay, 0, '.', ',');
                echo "Total subcon pay: " . $formattedTotalpay;
            }
        } else {
            $totalpay = 0;
        }
        echo nl2br("\n");
        if (isset($_POST['overheadcosts'])) {
            $selectedoverheadIDs = $_POST['overheadcheckbox'] ?? [];
            $formattedids = implode(',', array_map('intval', $selectedoverheadIDs));
            $sumdailyquery = "SELECT SUM(cost) AS totalcostdaily FROM overhead WHERE id IN ($formattedids) AND frequency = 'daily'";
            $resultdaily = mysqli_query($conn, $sumdailyquery);
            if ($resultdaily) {
                $rowdaily = mysqli_fetch_assoc($resultdaily);
                $totalcostdaily = $rowdaily['totalcostdaily'] * $duration;
                $formattedtotalcostdaily = number_format($totalcostdaily, 0, '.', ',');
                echo "Total daily overhead cost: " . $formattedtotalcostdaily . "<br>";
            }

            $sumweeklyquery = "SELECT SUM(cost) AS totalcostweekly FROM overhead WHERE id IN ($formattedids) AND frequency = 'weekly'";
            $resultweekly = mysqli_query($conn, $sumweeklyquery);
            if ($resultweekly) {
                $rowweekly = mysqli_fetch_assoc($resultweekly);
                $totalcostweekly = $rowweekly['totalcostweekly'] * $result['weeks'];
                $formattedtotalcostweekly = number_format($totalcostweekly, 0, '.', ',');
                echo "Total weekly overhead cost: " . $formattedtotalcostweekly . "<br>";
            }

            $summonthlyquery = "SELECT SUM(cost) AS totalcostmonthly FROM overhead WHERE id IN ($formattedids) AND frequency = 'monthly'";
            $resultmonthly = mysqli_query($conn, $summonthlyquery);
            if ($resultmonthly) {
                $rowmonthly = mysqli_fetch_assoc($resultmonthly);
                $totalcostmonthly = $rowmonthly['totalcostmonthly'] * $result['months'];
                $formattedtotalcostmonthly = number_format($totalcostmonthly, 0, '.', ',');
                echo "Total monthly overhead cost: " . $formattedtotalcostmonthly . "<br>";
            }
        } else{
            $totalcostmonthly = 0;
            $totalcostdaily = 0;
            $totalcostweekly = 0;
        }
        $subtotal = $totalwagedaily + $totalwageweekly + $totalwagemonthly + $totalbonus + $totalpay + $totalcostmonthly + $totalcostdaily + $totalcostweekly +$totalcostmonthly;
        $formattedsubtotal = number_format($subtotal, 0, '.', ',');
        echo "estimated price is: ".$formattedsubtotal;
    }

    ?>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
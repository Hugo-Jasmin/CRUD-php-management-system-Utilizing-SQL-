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
    <title>employee database</title>
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

<div class="row justify-content-center">
<div class="col-9">
  
  <span class="me-2">databases:</span>
  <div class="btn-group">
    <a href="employeeprojectview.php" class="btn btn-primary active" aria-current="page">Employee</a>
    <a href="subconprojectview.php" class="btn btn-primary active" aria-current="page">subcontractor</a>
    <a href="overheadprojectview.php" class="btn btn-primary active" aria-current="page">overhead</a>
      </div>
    </div>
  </div>

<div class="container-fluid mt-3">
  <div class="row">
    <div class="col-md-5 order-md-2">

        <?php
        ///just put this here so i like can call it down the ladder, 
    $servername = "localhost";
    $username = "u855808231_root"; 
    $password = "Memeikaykenjay1"; 
    $dbname = "u855808231_huyo"; 
              $conn = mysqli_connect($servername, $username, $password, $dbname);
              if (!$conn) {
                  die("error with connection: " . mysqli_connect_error());
              }

      ?>
      
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Filters</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Operations</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0"> 
    
<!--- BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAKBREAK BREAK BREAK BREAK BREAK -->
    <br>
<a>To search from the database, fill in general search, to filter fields and find better results you can adjust search parameters, to clear empty out general search and enter.</a>
    <div>
    <form method="post">
      <br>
      <input type="text" placeholder="Search data" name="search">
      <button type="submit" name="generalsubmit">General Search</button>
    </form>
    </div>
    <br>
<!--- BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAKBREAK BREAK BREAK BREAK BREAK -->
    <div class="card">
  <h7 class="card-header">filter searches</h7>
  <div class="card-body">
    <p class="card-text">
    <form method="post">

    <div class="row justify-content-start">
    <div class="col-4">
    <br>
      <input type="text" placeholder="id lower limit" name="startidsearch">
      <br>
      <input type="text" placeholder="id upper limit" name="endidsearch">
      <br>
      <input type="text" placeholder="Search name" name="namesearch">
      <br>
      <input type="text" placeholder="Search address" name="addresssearch">
      <br>
      <br>
      <select name="typesearch">
      <option value="">employee type</option>
      <option value="office">office</option>
      <option value="workshop">workshop</option>
      </select>
        </div>
    <div class="col-4">
    <br>
      <input type="number" placeholder="wage lower limit" name="startwagesearch">
      <br>
      <input type="number" placeholder="wage upper limit" name="endwagesearch">
      <br>
      <input type="number" placeholder="bonus lower limit" name="startbonussearch">
      <br>
      <input type="number" placeholder="bonus upper limit" name="endbonussearch">
      <br>
      <br>
      <select name="payplansearch">
      <option value="">payplan</option>
      <option value="daily">daily</option>
      <option value="weekly">weekly</option>
      <option value="monthly">monthly</option>
      </select>
    </div>
    <div class="col-4">
      <br>
      <input type="text" placeholder="Search job" name="jobsearch">
      <br>
      <input type="text" placeholder="Search note" name="notesearch">
      <br>
    </div>
  </div>
  <br>
  <br>
  <button type="submit" name="submit">search</button>
    </form>
  </p>
  <?php
  if (isset($_POST['generalsubmit'])) {
    $search = $_POST['search'];
    $searchquery = "SELECT * FROM karyawan WHERE id = '$search' OR Nama LIKE '%$search%' OR alamat LIKE '%$search%' OR employeetype LIKE '%$search%' OR gaji LIKE '%$search%' OR job LIKE '%$search%' OR bonus LIKE '%$search%' OR payplan LIKE '%$search%' OR note LIKE '%$search%'";
    $result1 = mysqli_query($conn, $searchquery);
  }
  elseif (isset($_POST['submit'])) {
    $typesearch = $_POST['typesearch'];
    $namesearch = $_POST['namesearch'];
    $payplansearch = $_POST['payplansearch'];
    $jobsearch = $_POST['jobsearch'];
    $notesearch = $_POST['notesearch'];
    $addresssearch = $_POST['addresssearch'];

    $selectidquery = "SELECT * FROM karyawan";
    $startidsearch = $_POST['startidsearch'] ?? null;
    $endidsearch = $_POST['endidsearch'] ?? null;

    $selectwagequery = "SELECT * FROM karyawan";
    $startwagesearch = $_POST['startwagesearch'] ?? null;
    $endwagesearch = $_POST['endwagesearch'] ?? null;

    $selectbonusquery = "SELECT * FROM karyawan";
    $startbonussearch = $_POST['startbonussearch'] ?? null;
    $endbonussearch = $_POST['endbonussearch'] ?? null;

    $minimumandmaximum = "SELECT MIN(id) AS minid, MAX(id) AS maxid FROM karyawan";
    $minandmaxwage = "SELECT MIN(gaji) AS minwage, MAX(gaji) AS maxwage FROM karyawan";
    $minandmaxbonus = "SELECT MIN(bonus) AS minbonus, MAX(bonus) AS maxbonus FROM karyawan";

    $idresult = mysqli_query($conn, $minimumandmaximum);
    $defaultrow = mysqli_fetch_assoc($idresult);

    $wageresult = mysqli_query($conn, $minandmaxwage);
    $defaultwagerow = mysqli_fetch_assoc($wageresult);

    $bonusresult = mysqli_query($conn, $minandmaxbonus);
    $defaultbonusrow = mysqli_fetch_assoc($bonusresult);
    if (empty($startidsearch)) {
        $startidsearch = $defaultrow['minid'];
    }
    if (empty($endidsearch)) {
      $endidsearch = $defaultrow['maxid'];
    }
    if (empty($startwagesearch)) {
      $startwagesearch = $defaultwagerow['minwage'];
    }
    if (empty($endwagesearch)) {
    $endwagesearch = $defaultwagerow['maxwage'];
    }
    if (empty($startbonussearch)) {
      $startbonussearch = $defaultbonusrow['minbonus'];
    }
    if (empty($endbonussearch)) {
    $endbonussearch = $defaultbonusrow['maxbonus'];
    }
    $filterquery = "SELECT * FROM karyawan WHERE employeetype LIKE '%$typesearch%' AND Nama LIKE '%$namesearch%' AND id BETWEEN $startidsearch AND $endidsearch AND alamat LIKE '%$addresssearch%' AND gaji BETWEEN $startwagesearch AND $endwagesearch AND bonus BETWEEN '$startbonussearch' AND '$endbonussearch' AND payplan LIKE '%$payplansearch%' AND note LIKE '%$notesearch%' AND job LIKE '%$jobsearch%'";
    $queryresults = mysqli_query($conn, $filterquery);
    
  }
  ?>
  </div>



  </div>
<!--- BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAKBREAK BREAK BREAK BREAK BREAK -->
  </div>
  <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
<!--- BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAKBREAK BREAK BREAK BREAK BREAK -->
<?php
  if (isset($_POST['generalsubmit'])) {
    $search = $_POST['search'];
    $sumquerygeneral = "SELECT SUM(gaji) AS totalwage FROM karyawan WHERE id = '$search' OR Nama LIKE '%$search%' OR alamat LIKE '%$search%' OR employeetype LIKE '%$search%' OR gaji LIKE '%$search%' OR job LIKE '%$search%' OR bonus LIKE '%$search%' OR payplan LIKE '%$search%' OR note LIKE '%$search%'";
    $sumQuerybonus = "SELECT SUM(bonus) AS totalbonus FROM karyawan WHERE id = '$search' OR Nama LIKE '%$search%' OR alamat LIKE '%$search%' OR employeetype LIKE '%$search%' OR gaji LIKE '%$search%' OR job LIKE '%$search%' OR bonus LIKE '%$search%' OR payplan LIKE '%$search%' OR note LIKE '%$search%'";
    $sumresult = mysqli_query($conn, $sumquerygeneral);
    $sumbonus = mysqli_query($conn, $sumQuerybonus);

    if ($sumresult) {
      ?>
        <br>
        <?php
        $row = mysqli_fetch_assoc($sumresult);
        $totalwage = $row['totalwage'];
        $formattedtotalwage = number_format($totalwage, 0, '.', ',');
        $brow = mysqli_fetch_assoc($sumbonus);
        $totalbonus = $brow['totalbonus'];
        $formattedtotalbonus = number_format($totalbonus, 0, '.', ',');
        echo "Total Wage: " . $formattedtotalwage;
        $totalwagebonus1 = $totalwage + $totalbonus;
        $formattedtotalwagebonus = number_format($totalwagebonus1, 0, '.', ',');
        ?>
        <br>
        <?php
          echo "Total Wage + Bonus: " . $formattedtotalwagebonus;
        }
 ##unrelated   
    $searchquery = "SELECT * FROM karyawan WHERE id = '$search' OR Nama LIKE '%$search%' OR alamat LIKE '%$search%' OR employeetype LIKE '%$search%' OR gaji LIKE '%$search%' OR job LIKE '%$search%' OR bonus LIKE '%$search%' OR payplan LIKE '%$search%' OR note LIKE '%$search%'";
    $result1 = mysqli_query($conn, $searchquery);
  }
  elseif (isset($_POST['submit'])) {
    $typesearch = $_POST['typesearch'];
    $namesearch = $_POST['namesearch'];
    $payplansearch = $_POST['payplansearch'];
    $jobsearch = $_POST['jobsearch'];
    $notesearch = $_POST['notesearch'];
    $addresssearch = $_POST['addresssearch'];

    $selectidquery = "SELECT * FROM karyawan";
    $startidsearch = $_POST['startidsearch'] ?? null;
    $endidsearch = $_POST['endidsearch'] ?? null;

    $selectwagequery = "SELECT * FROM karyawan";
    $startwagesearch = $_POST['startwagesearch'] ?? null;
    $endwagesearch = $_POST['endwagesearch'] ?? null;

    $selectbonusquery = "SELECT * FROM karyawan";
    $startbonussearch = $_POST['startbonussearch'] ?? null;
    $endbonussearch = $_POST['endbonussearch'] ?? null;

    $minimumandmaximum = "SELECT MIN(id) AS minid, MAX(id) AS maxid FROM karyawan";
    $minandmaxwage = "SELECT MIN(gaji) AS minwage, MAX(gaji) AS maxwage FROM karyawan";
    $minandmaxbonus = "SELECT MIN(bonus) AS minbonus, MAX(bonus) AS maxbonus FROM karyawan";

    $idresult = mysqli_query($conn, $minimumandmaximum);
    $defaultrow = mysqli_fetch_assoc($idresult);

    $wageresult = mysqli_query($conn, $minandmaxwage);
    $defaultwagerow = mysqli_fetch_assoc($wageresult);

    $bonusresult = mysqli_query($conn, $minandmaxbonus);
    $defaultbonusrow = mysqli_fetch_assoc($bonusresult);
    if (empty($startidsearch)) {
        $startidsearch = $defaultrow['minid'];
    }
    if (empty($endidsearch)) {
      $endidsearch = $defaultrow['maxid'];
    }
    if (empty($startwagesearch)) {
      $startwagesearch = $defaultwagerow['minwage'];
    }
    if (empty($endwagesearch)) {
    $endwagesearch = $defaultwagerow['maxwage'];
    }
    if (empty($startbonussearch)) {
      $startbonussearch = $defaultbonusrow['minbonus'];
    }
    if (empty($endbonussearch)) {
    $endbonussearch = $defaultbonusrow['maxbonus'];
    }
    #### TAB THIS to make pretty
    $sumqueryfilter = "SELECT SUM(gaji) AS totalwage FROM karyawan WHERE employeetype LIKE '%$typesearch%' AND Nama LIKE '%$namesearch%' AND id BETWEEN $startidsearch AND $endidsearch AND alamat LIKE '%$addresssearch%' AND gaji BETWEEN $startwagesearch AND $endwagesearch AND bonus BETWEEN '$startbonussearch' AND '$endbonussearch' AND payplan LIKE '%$payplansearch%' AND note LIKE '%$notesearch%' AND job LIKE '%$jobsearch%'";
    $sumbonusfilter = "SELECT SUM(bonus) AS totalbonus FROM karyawan WHERE employeetype LIKE '%$typesearch%' AND Nama LIKE '%$namesearch%' AND id BETWEEN $startidsearch AND $endidsearch AND alamat LIKE '%$addresssearch%' AND gaji BETWEEN $startwagesearch AND $endwagesearch AND bonus BETWEEN '$startbonussearch' AND '$endbonussearch' AND payplan LIKE '%$payplansearch%' AND note LIKE '%$notesearch%' AND job LIKE '%$jobsearch%'";
    $sumresult = mysqli_query($conn, $sumqueryfilter);
    $sumbonus = mysqli_query($conn, $sumbonusfilter);
    if ($sumresult) {
      ?>
        <br>
        <?php
      $row = mysqli_fetch_assoc($sumresult);
      $totalwage = $row['totalwage']; 
      $formattedtotalwage = number_format($totalwage, 0, '.', ',');
      $brow = mysqli_fetch_assoc($sumbonus);
      $totalbonus = $brow['totalbonus']; 
      $formattedtotalbonus = number_format($totalbonus, 0, '.', ',');
      echo "Total Wage: " . $formattedtotalwage;
      $totalwagebonus1 = $totalwage + $totalbonus;
      $formattedtotalwagebonus = number_format($totalwagebonus1, 0, '.', ',');
      ?>
      <br>
      <?php
        echo "Total Wage + Bonus: " . $formattedtotalwagebonus;
    }


  }
  else{
    $sumqueryfilter = "SELECT SUM(gaji) AS totalwage FROM karyawan";
    $sumbonusfilter = "SELECT SUM(bonus) AS totalbonus FROM karyawan";
    $sumresult = mysqli_query($conn, $sumqueryfilter);
    $sumbonus = mysqli_query($conn, $sumbonusfilter);
    if ($sumresult) {
      $row = mysqli_fetch_assoc($sumresult);
      $totalwage = $row['totalwage'];
      $formattedtotalwage = number_format($totalwage, 0, '.', ',');
      $brow = mysqli_fetch_assoc($sumbonus);
      $totalbonus = $brow['totalbonus'];
      $formattedtotalbonus = number_format($totalbonus, 0, '.', ',');
      echo "Total Wage: " . $formattedtotalwage;
      $totalwagebonus1 = $totalwage + $totalbonus;
      $formattedtotalwagebonus = number_format($totalwagebonus1, 0, '.', ',');
      ?>
      <br>
      <?php
        echo "Total Wage + Bonus: " . $formattedtotalwagebonus;
  }
}
  
  ?>
<!--- BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAKBREAK BREAK BREAK BREAK BREAK -->
  </div>
  <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">...</div>
  <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">...</div>
</div>
    </div>


    <div class="col-md-7 order-md-1">
<!-- Table Container for the 'karyawan' table -->
<div class="table-container">
        <div class="table-responsive">
          <table class="table align-middle">
              <tr>
                <th>id</th>
                <th>Name</th>
                <th>Address</th>
                <th>employee type</th>
                <th>Wage</th>
                <th>Bonus</th>
                <th>payplan</th>
                <th>job</th>
                <th>note</th>
                <th>Date Late</th>
                <th>Option</th>
              </tr>
              <?php
              
    if (isset($_POST['generalsubmit'])) {
      if ($result1) { 
      if(mysqli_num_rows($result1)>0){
        
        while ($row = mysqli_fetch_assoc($result1)) {
          echo '<tr>';
          echo '<td>'.$row['id'].'</td>';
          echo '<td>'.$row['Nama'].'</td>';
          echo '<td>'.$row['alamat'].'</td>';
          echo '<td>'.$row['employeetype'].'</td>';
          echo '<td>'.$row['gaji'].'</td>';
          echo '<td>'.$row['bonus'].'</td>';
          echo '<td>'.$row['payplan'].'</td>';
          echo '<td>'.$row['job'].'</td>';
          echo '<td>'.$row['note'].'</td>';
          echo "<td> <a href='calander.php?id=" . $row['id'] . "'>punctuality</a></td>";
          echo "<td> <a href='employee/edit.php?id=" . $row['id'] . "'>EDIT</a> <a href='employee/delete.php?id=" . $row['id'] . "'>DELETE</a></td>";    
          echo '</tr>';
        } 
      } else {
        echo '<tr>';
        echo '<td>no data found</td>';
        echo '</tr>';
        }
      }
    }
    elseif (isset($_POST['submit'])) {
      if ($queryresults) { 
      if(mysqli_num_rows($queryresults)>0){
 
        while ($row = mysqli_fetch_assoc($queryresults)) {
          echo '<tr>';
          echo '<td>'.$row['id'].'</td>';
          echo '<td>'.$row['Nama'].'</td>';
          echo '<td>'.$row['alamat'].'</td>';
          echo '<td>'.$row['employeetype'].'</td>';
          echo '<td>'.$row['gaji'].'</td>';
          echo '<td>'.$row['bonus'].'</td>';
          echo '<td>'.$row['payplan'].'</td>';
          echo '<td>'.$row['job'].'</td>';
          echo '<td>'.$row['note'].'</td>';
          echo "<td> <a href='calander.php?id=" . $row['id'] . "'>punctuality</a></td>";
          echo "<td> <a href='employee/edit.php?id=" . $row['id'] . "'>EDIT</a> <a href='employee/delete.php?id=" . $row['id'] . "'>DELETE</a></td>";    
          echo '</tr>';
        } 
      } else {
        echo '<tr>';
        echo '<td>no data found</td>';
        echo '</tr>';
        }
      }
    }

    else{

      $query = "SELECT * FROM karyawan"; 
      
      $result = mysqli_query($conn, $query);

      if (!$result) {
          die('Error: ' . mysqli_error($conn)); 
      }

      while ($row = mysqli_fetch_assoc($result)) {
          echo '<tr>';
          echo '<td>'.$row['id'].'</td>';
          echo '<td>'.$row['Nama'].'</td>';
          echo '<td>'.$row['alamat'].'</td>';
          echo '<td>'.$row['employeetype'].'</td>';
          echo '<td>'.$row['gaji'].'</td>';
          echo '<td>'.$row['bonus'].'</td>';
          echo '<td>'.$row['payplan'].'</td>';
          echo '<td>'.$row['job'].'</td>';
          echo '<td>'.$row['note'].'</td>';
          echo "<td> <a href='calander.php?id=" . $row['id'] . "'>punctuality</a></td>";
          echo "<td> <a href='employee/edit.php?id=" . $row['id'] . "'>EDIT</a> <a href='employee/delete.php?id=" . $row['id'] . "'>DELETE</a></td>";    
          echo '</tr>';

      }
    }
    ?>
    

    </table>
        </div>
      </div>




</div>
<!--bootstrap stuff-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>


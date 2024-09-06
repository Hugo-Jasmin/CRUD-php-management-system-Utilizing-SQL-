

<!DOCTYPE html>
<html lang="en">
<head>
    <title>login page</title>
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

    <center>
        <br><br><br>
    <div class="container">
<form method="post">
<br><br>
            <label for="label">username?:</label>
            <input type="text" id="username" name="username" required><br>
            <br>
            <label for="label">Password?:</label>
            <input type="password" id="password" name="password" required><br>
            <br>
        <input type="submit" name="submit" value="Login">
        <br>
        <br>
    </form>
    </center>
    </div>
    <?php

if (isset($_POST['submit'])) {
    session_start();
    $servername = "localhost";
    $username = "u855808231_root"; 
    $password = "Memeikaykenjay1"; 
    $dbname = "u855808231_huyo"; 

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("failed connection try again" . mysqli_connect_error());
    }

    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];

    // Simple SQL to check login (Warning: Vulnerable to SQL Injection)
    $sql = "SELECT * FROM logintable WHERE username = '$inputUsername' AND password = '$inputPassword'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)>0){
        $_SESSION['loggedin'] = true;
        header('Location: /IA/employeeprojectview.php');
        exit();
    } else {
        echo "Invalid username or password";
    }

    $conn->close();
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
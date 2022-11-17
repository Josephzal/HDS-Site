<!-- Attempt to log employee in to access employee sensitive information -->
<?php
    session_start();
    include_once 'dbh.inc.php';
    include_once 'head.php';
    $count = '';
    if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = mysqli_query($conn, "SELECT job_title FROM employees WHERE first_name = '$username' AND last_name = '$password'");
        
        $count = mysqli_num_rows($query);
        
    }

?>

<title>Employee Login</title>

</head>
<body class="container-fluid">

<div class="center container justify-content-center align-items-center">
  
    <div class="row">
        <div class="col-md-6 offset-md-3 col-xl-4 offset-xl-4 my-auto">
            <div class="card shadow">
                
                <div class="card-body">
                    <h5 class="card-title text-center">Login</h5>
                    <form method="post">
                        <div class="mb-3">
                            <label class="form-label" for="username">Username</label>
                            <input class="form-control" type="text" id="username" name="username" required="required" autofocus >
                        </div>
 
                        <div class="mb-3">
                            <label class="form-label" for="password">Password</label>
                            <input class="form-control" type="password" id="password" name="password" required="required">
                        </div>
                        <div class="d-grid col-12">
                        <button class="btn btn-primary" type="submit" name="login">Login</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--   Attempt to set employee login with job title to ensure order of least privilege   -->
<?php
    if($count == "0") {
        echo '<h5 class="loginError" >Incorrect Login</h5>';
    }
    else if ($count == "1") {
        $res = $query->fetch_assoc();
        $_SESSION ['job'] = $res['job_title'];
        echo '<script>
                window.location.href="http://localhost/capstone/inventory.php";
            </script>';
        
    };
?>

</body>
</html>


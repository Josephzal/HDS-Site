<?php
    include_once 'dbh.inc.php';
    include_once 'crud.php';
    include_once 'head.php';
?>

<title>Generated Report</title>

<body class="container-fluid">

<header>
    <?php
        include_once 'emp_navbar.php';
    ?>
</header>

<!--   Attempt to generate employee report by id   -->
<?php

    $crud = new crud();

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = $crud->getEmpReport($id);
    } else{
        echo "<h1 class='text-danger'>Please check details and try again!</h1>";
    };

?>

<h1 class="mt-5">Report for <?php echo $result['LastName'] . ' ' .$result['FirstName']; ?></h1>

<div class="container d-flex justify-content-center align-items-center mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">

                <div class="card-body">

                    <h5 class="card-title"> <?php echo $result['LastName'] . ' ' .$result['FirstName']; ?></h5>
                   
                    <h6 class="card-subtitle mb-2 text-muted"> <?php echo $result['phone']; ?> </h6>
                    <p class="card-text">
                        Email Address: <?php echo $result['email']; ?>
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>


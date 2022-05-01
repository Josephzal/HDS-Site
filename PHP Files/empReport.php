<?php

    include_once 'dbh.inc.php';
    include_once 'crud.php';
    include_once 'head.php';
    
?>
<title>Employee Report</title>

<?php

    $crud = new crud();
    $results = $crud->getEmployees();

?> 

<body class="container-fluid">

<header>
    <?php
        include_once 'emp_navbar.php';
    ?>
</header>

<div class="container justify-content-center align-items-center">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header mt-5 mb-5">
                    <h1>Employee Report</h1>
                </div>
                <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Employee ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Location</th>
                    <th scope="col">Salary</th>

                    </tr>
                </thead>
                <tbody>
                    
                    <?php if ($results->num_rows > 0): ?>
                    
                    <?php while($row = $results->fetch_assoc()): ?>
                        <tr>
                        <td><?php echo $row['employee_id'] ?></td>
                        <td><?php echo $row['first_name'] ?></td>
                        <td><?php echo $row['last_name'] ?></td>
                        <td><?php echo $row['email_address'] ?></td>
                        <td><?php echo $row['job_title'] ?></td>
                        <?php
                        $city = $row['location_id'];
                        $sql = "SELECT city FROM locations where location_id = $city;";
                        $cityRes = mysqli_query($conn, $sql);
                        $cityRow = mysqli_fetch_array($cityRes);
                        ?>
                        <td><?php echo $cityRow[0] ?></td>
                        <td>$<?php echo $row['base_salary'] ?></td>
                    </tr>
                    <?php endwhile; ?>
                    <?php else: ?>
                    <tr>
                    <td colspan="3" rowspan="1" headers="">No Data Found</td>
                    </tr>
                    <?php endif; ?>
                    <?php mysqli_free_result($results); ?>
                </tbody>
                </table>
            </div>
        </div>        
    </div>
</div>
   
</body>
</html>
<?php

    include_once 'dbh.inc.php';
    include_once 'crud.php';
    include_once 'head.php';
    
?>
<title>Customer Statement</title>

<?php

    $crud = new crud();
    $results = $crud->getCustomersNonZero();
    
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
                    <h1>Customer Statement</h1>
                </div>
                <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Customer ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Due</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php if ($results->num_rows > 0): ?>
                    
                    <?php while($row = $results->fetch_assoc()): ?>
                        <tr>
                        <td><?php echo $row['customer_id'] ?></td>
                        <td><?php echo $row['first_name'] ?></td>
                        <td><?php echo $row['last_name'] ?></td>
                        <td><?php echo $row['Due'] ?></td>
                        <td>
                            <a href="statementGenerated.php?id=<?php echo $row['customer_id'] ?>" target="_blank" class="btn btn-primary">Statement</a>
                        </td>

                    </tr>
                    <?php endwhile; ?>
                    <?php else: ?>
                    <tr>
                    <td colspan="3" rowspan="1" headers="">No Customers With Outstanding Balance</td>
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
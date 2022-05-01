<?php
    include_once 'dbh.inc.php';
    include_once 'crud.php';
    include_once 'head.php';
?>

<title>Sales Summary Report</title>

<body class="container-fluid">

<header>
    <?php
        include_once 'emp_navbar.php';
    ?>
</header>

<?php

    $crud = new crud();

    $startDate =  $_REQUEST['startDate'];
    $endDate = $_REQUEST['endDate'];
    $sql=mysqli_query($conn, "SELECT *, SUM(unit_price + additional_costs) as Total
    FROM orders o
        JOIN order_line_items ol
        ON ol.order_id = o.order_id
        WHERE order_date 
        BETWEEN '$startDate' AND '$endDate' 
        GROUP BY ol.order_id
        ORDER BY order_date");
 
    $count = mysqli_num_rows($sql);
    $grandTotal = 0;

?>



<div class="container justify-content-center align-items-center">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                <h1 class="mt-5">Sales Summary Report</h1>
                <p class="aCenter mb-5"><?php echo $startDate; ?> - <?php echo $endDate; ?></p>
                </div>
                    
                <?php if ($count > 0): ?>
                <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Sale ID</th>
                    <th scope="col">Sale Date</th>
                    <th scope="col">Sale Total</th>
                </tr>
                </thead>
                <tbody>
                
                    
                <?php while($row = mysqli_fetch_array($sql)): ?>
                    <tr>
                    <td><?php echo $row['order_id'] ?></td>
                    <td><?php echo $row['order_date'] ?></td>
                    <td><?php echo $row['Total'] ?></td>
                    <?php $grandTotal += $row['Total']; ?>
                    </tr>
                <?php endwhile; ?>
                </tbody>
                </table>
           
                <h2 class="salesTotal" class="mt-5 mb-5">Total = $ <?php echo $grandTotal; ?></h2>

                
                <?php else: ?>
                    <h2 class="salesTotal">No Data Found</h2>
                <?php endif; ?>
                    
                

                


            </div>
        </div>        
    </div>


</div>

</body>
</html>





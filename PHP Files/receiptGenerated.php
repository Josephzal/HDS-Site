<?php
    include_once 'dbh.inc.php';
    include_once 'crud.php';
    include_once 'head.php';
?>

<title>Generated Sales Receipt</title>

<body class="container-fluid">

<header>
    <?php
       include_once 'emp_navbar.php';
    ?>
</header>

<?php

    $crud = new crud();
// Attempt to order to generate receipt
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = $crud->getOrder($id);
        $res = $result->fetch_assoc();
    } else{
        echo "<h1 class='text-danger'>Please check details and try again!</h1>";
    };

?>

<div class="container justify-content-center align-items-center">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                <h1 class="mt-5" style="text-align: start;"><strong>HDS</strong>  
                    <span style="float:right;">Sales Receipt</span></h1>
                </div>
                <hr>
                <p class="" style="text-align: start;"><strong>Home Design Solutions</strong> 
                    <span style="float:right;">Date: <script>
                    date = new Date().toLocaleDateString();
                    document.write(date);
                    </script></span>
                </p>
                <p class="aRight">Invoice Number: <?php echo $res['order_id']; ?></p>
                <hr>
                <div class="aLeft">
                <p><strong>Sold To:</strong></p>
                <p><?php echo $res['first_name'];?> <?php echo $res['last_name']; ?> </p>
                <p><?php echo $res['phone'];?> </p>
                <p><?php echo $res['email_address'];?> </p>
                </div>


                <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Customer ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>  
                   
                <tr>
                    <td><?php echo $res['customer_id']; ?></td>
                    <td><?php echo $res['first_name']; ?></td>
                    <td><?php echo $res['last_name'] ?></td>
                    <td><?php echo $res['phone'] ?></td>
                    <td><?php echo $res['email_address'] ?></td>
                </tr>
              
                </tbody>
                </table>
                <div class="aRight">
                    <p><strong>Total Due: $<?php echo $res['total'];?></strong></p>
                </div>
                
                <hr>
                <h4>Terms: Balance due in 30 days.</h4>
                <hr>
                <div class="aCenter">
                    <p>Home Design Solutions</p>
                    <p>101 Sedalia Dr.</p>
                    <p>Phoenix, AZ 85001</p>
                    <p>Phone: 602-KITCHEN</p>
                    <p>Fax: 602-555-1212</p>
                </div>
        
            </div>
        </div>        
    </div>

</div>

</body>
</html>





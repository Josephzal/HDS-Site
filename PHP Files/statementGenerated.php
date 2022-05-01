<?php
    include_once 'dbh.inc.php';
    include_once 'crud.php';
    include_once 'head.php';
?>

<title>Generated Customer Statement</title>

<body class="container-fluid">

<header>
    <?php
        include_once 'emp_navbar.php';
    ?>
</header>

<?php

    $crud = new crud();

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = $crud->getCustNonZeroStatement($id);
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
                    <span style="float:right;">Statement</span></h1>
                </div>
                <hr>
                <p class="" style="text-align: start;"><strong>Home Design Solutions
                    <span style="float:right;">Date: <script>
                    date = new Date().toLocaleDateString();
                    document.write(date);
                    </script></span>
                </p>
                <p class="aRight">Account Number: <?php echo $res['customer_id']; ?></strong> </p>
                <hr>
                <div class="aLeft">
                    <p><strong>Bill To:</strong></p>
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
                <p class="" style="text-align: start;"><strong>Reminder: Please include the statement number on your check.
                    <span style="float:right;">Total Balance Due: $<?php echo $res['Due'];?></span></strong>
                </p>
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
                <br>
                <hr class="dashed">
                <p class="aCenter">***PLEASE FOLD, TEAR HERE AND RETURN THIS PORTION WITH YOUR PAYMENT***</p>
                <br>

                <div class="aRight">
                    <p><strong>Account Number: <?php echo $res['customer_id']; ?></strong></p>
                    <p><strong>Amount Due By:
                    <script>
                        dueDate = new Date();
                        dueDate.setDate(dueDate.getDate() + 30);
                        document.write(dueDate.toLocaleDateString());
                        </script></strong></p>
                </div>

                <div class="aLeft">
                    <p style="text-align:left;"><strong>Customer:</strong></p>
                    <p style="text-align:left;"><?php echo $res['first_name'];?> <?php echo $res['last_name']; ?> </p>
                    <p style="text-align:left;"><?php echo $res['phone'];?> </p>
                    <p style="text-align:left;"><?php echo $res['email_address'];?> </p>
                </div>

                <div class="aRight">
                    <p style="text-align:right;">Home Design Solutions</p>
                    <p style="text-align:right;">101 Sedalia Dr.</p>
                    <p style="text-align:right;">Phoenix, AZ 85001</p>
                </div>
        
            </div>
        </div>        
    </div>

</div>

</body>
</html>





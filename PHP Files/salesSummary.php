<?php

    include_once 'head.php';
    
?>
<title>Sales Summary</title>

<?php


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
            <div class="aCenter col-md-12">
                <div class="page-header mt-5 mb-5">
                    <h1 class="mb-5">Sales Summary</h1>
                </div>
                <form action="salesSummaryGenerated.php" target="_blank" method="post">
                    <p>Select dates to generate sales report.</p>
                    <p class="mb-5">
                        <input type="date" name="startDate">
                        <input type="date" name="endDate">
                    </p>
                    <p>
                        <button class="btn btn-primary" type="submit" name="search" value="Generate">Generate</button>
                    </p>

                </form>
            </div>
        </div>        
    </div>
</div>
   
</body>
</html>
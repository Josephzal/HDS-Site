<?php

include_once 'dbh.inc.php';

class crud {
    
    private $db;
    public $owed;


    function _construct($conn) {
        $this->db = $conn;
    }

    public function getInventory() {
        require 'dbh.inc.php';
        try{
       
            
            $sql = "SELECT p.product_id, p.prod_desc, p.prod_serial, p.prod_model, m.manufacturer_name, c.category_name, p.cost, p.list_price, IFNULL(a.qty_on_hand, 0) as qty_on_hand,
                IFNULL(a.qty_on_order, 0) as qty_on_order
                FROM products p
                    JOIN product_categories c
                    ON c.category_id = p.category_id
                    JOIN manufacturers m
                    ON m.manufacturer_id = p.manufacturer_id
                    LEFT JOIN product_availabilities a
                    ON a.product_id = p.product_id
                GROUP BY p.product_id
                ORDER BY p.product_id ASC;";

            $result = mysqli_query($conn, $sql);
            return $result;
        } catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getProduct($id) {
        require 'dbh.inc.php';
        try {
            $sql = "SELECT * FROM products WHERE product_id = $id";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getOrders() {
        require 'dbh.inc.php';
        try {          
            $sql = "SELECT o.order_id, employee_id, customer_id, order_date, SUM(COALESCE(unit_price, 0) + COALESCE(additional_costs, 0)) as total
                FROM orders o
                    JOIN order_line_items ol
                    ON ol.order_id = o.order_id
                GROUP BY o.order_id;";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }
            
    }

    public function getOrder($id) {
        require 'dbh.inc.php';
        try {             
            $sql = "SELECT o.order_id, employee_id, c.first_name, c.last_name, c.email_address, c.phone, c.customer_id, order_date, SUM(COALESCE(unit_price, 0) + COALESCE(additional_costs, 0)) as total
            FROM orders o
                JOIN order_line_items ol
                ON ol.order_id = o.order_id
                JOIN customers c
                ON o.customer_id = c.customer_id
            WHERE o.order_id = $id;";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }
            
    }

    public function getEmployees() {
        require 'dbh.inc.php';
        try{
            $sql = "SELECT * FROM employees ORDER BY employee_id ASC;";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getEmployee($id) {
        require 'dbh.inc.php';
        try{
            $sql = "SELECT job_title FROM employees WHERE employee_id = $id;";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getCustomers() {
        require 'dbh.inc.php';
        try{
            $sql = "SELECT * FROM customers ORDER BY customer_id ASC;";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

   
    public function getCustomersNonZero() {
        require 'dbh.inc.php';
        try{
            $sql = "SELECT
            total_table.customer_id,
            total_table.first_name,
            total_table.last_name,
            COALESCE(Total, 0) AS Total,
            COALESCE(Paid, 0) AS Paid,
            COALESCE(Total, 0) - COALESCE(Paid, 0) AS Due
            FROM (
                SELECT c.customer_id, c.first_name, c.last_name, SUM(ol.unit_price) + SUM(ol.additional_costs) AS Total
                    FROM customers AS c
                    INNER JOIN orders AS o ON c.customer_id = o.customer_id
                        AND o.order_status != 'Cancelled'
                    INNER JOIN order_line_items AS ol ON o.order_id = ol.order_id
                    GROUP BY c.customer_id
                ) AS total_table
            LEFT JOIN (
                    SELECT c.customer_id, SUM(p.amount) AS Paid
                        FROM customers AS c
                        INNER JOIN payments AS p ON c.customer_id = p.customer_id
                        GROUP BY c.customer_id
                ) AS paid_table
                ON total_table.customer_id = paid_table.customer_id
            HAVING Due > 0
            ORDER BY total_table.customer_id ASC";

            $result = mysqli_query($conn, $sql);            
            return $result;
        } catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getCustNonZeroStatement($id) {
        require 'dbh.inc.php';
        try{
            $sql = "SELECT
            total_table.customer_id,
            total_table.first_name,
            total_table.last_name,
            total_table.phone,
            total_table.email_address,
            COALESCE(Total, 0) - COALESCE(Paid, 0) AS Due
            FROM (
                SELECT c.customer_id, c.phone, c.email_address, c.first_name, c.last_name, SUM(ol.unit_price) + SUM(ol.additional_costs) AS Total
                    FROM customers AS c
                    INNER JOIN orders AS o ON c.customer_id = o.customer_id
                        AND o.order_status != 'Cancelled'
                    INNER JOIN order_line_items AS ol ON o.order_id = ol.order_id
                    WHERE c.customer_id = $id
                ) AS total_table
            LEFT JOIN (
                    SELECT c.customer_id, SUM(p.amount) AS Paid
                        FROM customers AS c
                        INNER JOIN payments AS p ON c.customer_id = p.customer_id
                        GROUP BY c.customer_id
                ) AS paid_table
                ON total_table.customer_id = paid_table.customer_id
            HAVING Due > 0
            ORDER BY total_table.customer_id ASC";

            $result = mysqli_query($conn, $sql);
            return $result;
        } catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    public function getCustReport($id) {
        $mysqli = new mysqli("localhost", "root", "Sqlpassword", "hdsdb");
     
        $stmt = $mysqli->prepare("SELECT * FROM customers WHERE customer_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result;
    }

    public function getCustProdReport($id) {
        require 'dbh.inc.php';
        $sql = "SELECT c.customer_id, ol.product_id, quantity, ol.order_id, prod_desc
            FROM customers c
            JOIN orders o 
            ON o.customer_id = c.customer_id
            JOIN order_line_items ol
            ON ol.order_id = o.order_id
            JOIN products p
            ON p.product_id = ol.product_id
            WHERE c.customer_id = $id AND ol.product_id IS NOT NULL AND o.order_status != 'Cancelled'";
        
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    public function getCustomerStatement() {

    }

    public function deleteProduct($id) {
        require 'dbh.inc.php';
        $sql = "DELETE FROM customer WHERE CustomerID = $id";
        if (mysqli_query($conn, $sql)) {
            mysqli_close($conn);
            header('Location: inventory.php'); 
            exit;
        } else {
            echo "Error deleting record";
        }

    }

}

?>
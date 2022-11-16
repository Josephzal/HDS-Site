<html>
    <body>
        <table>
            <tr>
                <th>Emp ID</th>
                <th>First Name</th>
                <th>Last Name</th>
            </tr>
            <?php
//             Generate employee report if employee exists
            $conn = mysqli_connect("localhost", "admin", "admin", "capstonetest");
            $sql = "SELECT * FROM customer";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                while($row = $result-> fetch_assoc()) {
                    echo "<tr><td>" . $row["EmpID"] . "</td><td>"
                        . $row["LastName"] . "</td><td>" 
                        . $row["FirstName"] . "</td><td>";
                }
            } else {
                echo "No Results";
            }
            $conn->close();
            ?>
        </table>
    </body>
</html>

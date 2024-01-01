
<?php
//Include database connection
require("../config/db.php");
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Result</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style_admin.css">
    <style>
    table {
        border-collapse: collapse;
        width: 80%;
    }

    th, td {
        text-align: left;
        padding: 8px;
        border: 1px solid #ddd;
    }

    th {
        background-color: #4CAF50;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }
    </style>
</head>
<body>

<!-- Header -->
<div style="display:flex;justify-content:center;">
 <div style="display:flex;justify-content:center;flex-direction:column">
 <img src="../assets/img/IFSU%20Logo.jpg" style="width:70px;height:70px;">
 <div style="text-align:center;">
 <p><b>Republic of the Kenya</b></p>
       <p> EGERTON UNIVERSITY</p>
        <p>Njoro, Nakuru</p>
 </div>
</div>

</div>
<?php
$sql = "SELECT id,org
        FROM organization
        ORDER BY id ASC";

// Then, execute the statement and get the result
$result = mysqli_query($db, $sql);

// First, output the table headers
echo "<div style='display:flex;justify-content:center;'>
     <table>
        <tr>
            <th>Organization Id</th>
            <th>Organization Name</th>
        </tr>";

// Then, fetch the results and output them
if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["org"] . "</td>
               
              </tr>";
    }

    echo "</table>";
    echo "</div>";
} else {
    echo "No entry found";
}
?>


<!-- Footer -->
<nav class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">

    <div class="container">
        <div class="navbar-text pull-left">
        Copyright 2022 @JOEWERU
        </div>
    </div>

</nav>
<!-- End Footer -->

<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script>
window.print()
setTimeout(function(){
    window.close()
},750)
</script>

</body>
</html>
<?php
//Close database connection
    $db->close();

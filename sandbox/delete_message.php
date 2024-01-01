<?php

//Include authentication
require("process/auth.php");

//Include database connection
require("../config/db.php");

//Include class Voters
require("classes/Voters.php");

?>

<?php

if(isset($_GET['message_data'])){

$delete_id = $_GET['message_data'];

$delete_pro = "delete from messages where id='$delete_id'";

$run_delete = mysqli_query($db,$delete_pro);

if($run_delete){

echo "<script>alert('One message Has been deleted')</script>";

echo "<script>window.open(' messages_data.php,'_self')</script>";

}

}

?>


<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//Include authentication
require("process/auth.php");

//Include database connection
require("../config/db.php");

//Include class Voters
require("classes/Voters.php");


?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>messages</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style_admin.css">
</head>
<body>
<!-- Header -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Voting System</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="admin_page.php"><span class="glyphicon glyphicon-home"></span></a></li>
                <li><a href="add_org.php"><span class="glyphicon glyphicon-plus-sign"></span>Add Election</a></li>
                <li><a href="add_pos.php"><span class="glyphicon glyphicon-plus-sign"></span>Add Position</a></li>
                <li><a href="add_nominees.php"><span class="glyphicon glyphicon-plus-sign"></span>Add Nominees</a></li>
                <li class="active"><a href="add_voters.php"><span class="glyphicon glyphicon-plus-sign"></span>Add Voters</a></li>
                <li><a href="vote_result.php"><span class="glyphicon glyphicon-plus-sign"></span>Vote Result</a></li>
                <li><a href="messages_data.php"><span class="glyphicon glyphicon-inbox"></span>Mesaages</a></li>
                 <!-- start helpcenter drop dropdown -->
               <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon "></span>Help center <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="help_center.php#one">System Overview</a></li>
                        <li><a href="help_center.php#two">How to Add Election</a></li>
                        <li><a href="help_center.php#three">How to Add Position</a></li>
                        <li><a href="help_center.php#four">How to Add Nominees</a></li>
                        <li><a href="help_center.php#five">How to Add Voters</a></li>
                        <li><a href="help_center.php#six">How to view voters result</a></li>
                        <li><a href="help_center.php#seven">How to Logout</a></li>
                    </ul>
                </li>
               <!-- end of help center -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="process/logout.php">Logout</a></li>
                    </ul>

                </li>
            </ul>
        </div><!-- /.navbar-collapse -->

    </div><!-- /.container-fluid -->
</nav>
<!-- End Header -->




<div class="container">
    <div class="row">

 <!-- start of view messages -->
 <div class="col-md-4">
           <div class="message_nav">
             <h4>Messages</h4>
             <ul class="message_links">
              <li class="message_link"><a href="#">Unread</a></li>
              <li class="message_link"><a href="#">Read</a></li>
              <li class="message_link" style="margin-right:3rem;" ><a href="#">Replied</a></li>
            </ul>
                
           </div><hr>
        <!-- ===messages to be shown here -->
        <div>
        <div class="unread">
        <?php 
    
    $message = "SELECT * FROM messages WHERE status='new'";
    $run_message = mysqli_query($db, $message);
    
    if(mysqli_num_rows($run_message)){
        echo "<div style='display:flex;justify-content:left;'>
            <table style='width:100%;'>
                <tr>
                    <th>Name</th>
                    <th>Messages</th>
                    <th>Actions</th>
                </tr>";
        $count = 0;
        while ($row = mysqli_fetch_array($run_message)) {
            $count++;
            $background = ($count % 2 == 0) ? '#f2f2f2' : '#fff'; // Alternate background color
            $pro_id=$row["id"];
            echo "<tr style='background-color:$background;'>
                    <td style='padding:5px;width:30%'>" . $row["name"] . "</td>
                    <td style='padding:5px; width:50%;'>" . $row["message"] . "</td>
                    <td>
                    <a href='messages_data.php?message_data=$pro_id' id='myButton'><span class='glyphicon glyphicon-send'></span></a>
                    <a href='delete_message.php?message_data=$pro_id ?>'> <span class='glyphicon glyphicon-remove'></span></a>
                    </td>
                 
                    </tr>";
        }
        echo "</table>";
        echo "</div>";
    }
    else {
        echo "<p>No message</p>";
    }
?>

     </div>


        <div class="read">
        <?php 
   

    $message = "SELECT * FROM messages WHERE status='read'";
    $run_message = mysqli_query($db, $message);
    
    if(mysqli_num_rows($run_message)){
        echo "<div style='display:flex;justify-content:left;'>
        <table style='width:100%;'>
            <tr>
                <th>Name</th>
                <th>Messages</th>
                <th>Actions</th>
            </tr>";
        $count = 0;
        while ($row = mysqli_fetch_array($run_message)) {
            $count++;
            $background = ($count % 2 == 0) ? '#f2f2f2' : '#fff'; // Alternate background color
            $pro_id=$row["id"];
            echo "<tr style='background-color:$background;'>
                    <td style='padding:5px;width:30%;'>" . $row["name"] . "</td>
                    <td style='padding:5px; width:50%;'>" . $row["message"] . "</td>
                    <td>
                    <a href='messages_data.php?message_data=$pro_id ?>'><span class='glyphicon glyphicon-send'></span></a>
                    <a href='delete_message.php?message_data=$pro_id ?>'> <span class='glyphicon glyphicon-remove'></span></a>
                    </td>
                    </tr>";
        }
        echo "</table>";
        echo "</div>";
    }
    else {
        echo "<p>No message</p>";
    }
?>
        </div>       

        <div class="send">
        <?php 
   

   $message = "SELECT * FROM messages WHERE status='replied'";
   $run_message = mysqli_query($db, $message);
   
   if(mysqli_num_rows($run_message)){
       echo "<div style='display:flex;justify-content:left;'>
       <table style='width:100%;'>
           <tr>
               <th>Name</th>
               <th>Messages</th>
               <th>Actions</th>
           </tr>";
       $count = 0;
       while ($row = mysqli_fetch_array($run_message)) {
           $count++;
           $background = ($count % 2 == 0) ? '#f2f2f2' : '#fff'; // Alternate background color
           $pro_id=$row["id"];
           echo "<tr style='background-color:$background;'>
                   <td style='padding:5px;width:30%'>" . $row["name"] . "</td>
                   <td style='padding:5px; width:50%;'>" . $row["message"] . "</td>
                   <td>
                  <a href='messages_data.php?message_data=$pro_id ?>'><span class='glyphicon glyphicon-send'></span></a>
                  <a href='delete_message.php?message_data=$pro_id ?>'> <span class='glyphicon glyphicon-remove'></span></a>
                   </td>
                   </tr>";
       }
       echo "</table>";
       echo "</div>";
   }
   else {
       echo "<p>No message</p>";
   }
?>
        </div> 
        </div>

     
        </div>
<!-- end of view messages -->
        <?php
    if(isset($_GET['message_data'])){
        $pro_id =$_GET ['message_data'];
        $sql="select * from messages where id='$pro_id'" ;
        $run_sql=mysqli_query($db,$sql);
        $row=mysqli_fetch_array($run_sql);
        $name=$row["name"];
        $email=$row["email"];
        $client_message=$row["message"];
        $admin_reply=$row["admin_reply"];
        $status="read";
        $status_sql = "UPDATE messages SET status = '$status' WHERE id = $pro_id";
        $run_status = mysqli_query($db, $status_sql);
       echo'
       <div class="col-md-8">
       <h4>Replying to:'.$name.'</h4><hr>
       <div class="message_box">
       <div class="chat">
           <!-- chats for client -->
       <div class="client_chats">
         
         '.$client_message.';
         
      </div>
       ';
       if (!empty($admin_reply)) {
        echo "<div class=\"admin_chats\">
            $admin_reply;
        </div>";
          }
      else{
      echo '';
      }

       echo " </div>";
      
      

   
    }
    ?>
    <form class="message_form" method="post" action="javascript:void(0);" id="admin_reply_form">
    <input type="text" name="admin_message" class="message_input" placeholder="Type message">
    <button type="submit" name="submit" id="admin_reply_btn"><span class="glyphicon glyphicon-send"></span></button>
   </form>'
   <?php
if(isset($_POST["admin_message"])){
    $admin_reply = mysqli_real_escape_string($db,$_POST["admin_message"]);
    $id = mysqli_real_escape_string($db,$_POST["pro_id"]);
    $status = "replied";
    $admin_reply_sql = "UPDATE messages SET admin_reply='$admin_reply', status='replied' WHERE id='$id'";
   
    if(mysqli_query($db,$admin_reply_sql)){

        $sql="select * from messages where id='$pro_id'" ;
        $run_sql=mysqli_query($db,$sql);
        $row=mysqli_fetch_array($run_sql);
        $name=$row["name"];
        $email=$row["email"];
        $admin_reply=$row["admin_reply"];


        // Create an instance; passing `true` enables exceptions

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'joeweru2000@gmail.com';                     //SMTP username
            $mail->Password   = 'axgaydaavrlwnutg';                               //SMTP password
            $mail->SMTPSecure = 'ssl';            //Enable implicit ssl encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('joeweru2000@gmail.com');
            $mail->addAddress($email);     //Add a recipient
           
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Admin reply';
            $mail->Body    = '<div><H3>Hello ' . $name . ' <H3>
                                <p>'.$admin_reply.'</P
                              <div>';
           
            $mail->send();
            echo '<script>
            alert("Response message has been sent to the client");
            </script>';

             // redirect to success page
             header("Location: messages_data.php?message_data=$id");
             exit();

        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    } else {
        printf("Error: %s\n", mysqli_error($db));
        exit();
    }
}
?>

     
   
            </div>
        </div>
        <!-- ends here -->
    </div>
</div>



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

    // Get references to the divs and links
const readDiv = document.querySelector(".read");
const unreadDiv = document.querySelector(".unread");
const sendDiv = document.querySelector(".send");
const messageLinks = document.querySelectorAll(".message_link");

// Hide all the divs except for the read div, which is the default
readDiv.classList.add("display_hidden");
sendDiv.classList.add("display_hidden");

// Add click event listeners to the links
messageLinks.forEach(function(link) {
  link.addEventListener("click", function() {
    // Hide all the divs
    readDiv.classList.add("display_hidden");
    unreadDiv.classList.add("display_hidden");
    sendDiv.classList.add("display_hidden");

    // Show the corresponding div
    if (link.textContent === "Read") {
      readDiv.classList.remove("display_hidden");
    } else if (link.textContent === "Unread") {
      unreadDiv.classList.remove("display_hidden");
    } else if (link.textContent === "Replied") {
      sendDiv.classList.remove("display_hidden");
    }

    // Remove the active class from all the links
    messageLinks.forEach(function(l) {
      l.classList.remove("active");
    });

    // Add the active class to the clicked link
    link.classList.add("active");
  });
});

</script>
<script>
$(document).ready(function(){
    $('#admin_reply_btn').click(function(){
        var admin_message = $('input[name="admin_message"]').val();
        var pro_id = '<?php echo $pro_id; ?>';
        
        $.ajax({
            url: 'messages_data.php',
            type: 'post',
            data: {admin_message: admin_message, pro_id: pro_id},
            success: function(response){
                $('#admin_reply_form')[0].reset(); // Reset the form
                $('#message_box').append(response); // Append the new message to the chat box
                location.reload();
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText); // Log the error message to the console
            }
        });
    });
});
</script>


</body>
</html>

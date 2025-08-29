<?php  
  
  //Email information
  $admin_email = "info@vymtechnology.com";
  $name = $_REQUEST['name'];
  $email = $_REQUEST['email'];
  $subject = $_REQUEST['subject'];
  $comment = $_REQUEST['message'];
  


  
  //send email
  mail($admin_email, "$subject", $comment, "From:" . $email);
  
  
  ?>
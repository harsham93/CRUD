<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!doctype html>
<?php
 $error = ""; $successMessage="";
if($_POST){

 if(!$_POST['emailId']){
     $error .= "An email address is required";
 }
  if(!$_POST['subjectfield']){
     $error .= "The subject field is required";
 }
  if(!$_POST['contentfield']){
     $error .= "The content field is required";
 }
 if ($_POST['emailId'] && filter_var($_POST['emailId'], FILTER_VALIDATE_EMAIL)=== false) {
 
  echo("The email address is invalid");
}

//if ($error != ""){
//     
//    $error = '<div class="alert alert-danger" role="alert"><strong>There were error(s) in your form</strong>' . $error . '</div>';
//}   else{
//    $emailTO = "harsha.mirani@gmail.com";
//    $subject = $_POST['subjectfield'];
//    $content = $_POST['contentfield'];
//    $headers = "From: ".$_POST['emailId'];
//    if(mail($emailTO, $subject, $content, $headers)  ) {
//        $successMessage = '<div class="alert alert-success" role="alert"><strong>Your messasge was sent, we\'ll get back to you ASAP!</strong></div>';
//    } else{
//      
//     $error = '<div class="alert alert-danger" role="alert"><strong>Your message couldn\'t be sent- please try again later</strong>' . $error . '</div>';
//    }
//    
//}
};

?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!--    <script type="text/javascript" src="./lib/jquery-3.3.1.min.js"></script>-->
    
    <script src="scripts/main.js"></script>
<!--     <script  src="../../Jquery/prettify.js"></script>-->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  
  <body>
      <div class="container">
          
    <h1>Get in touch!</h1>
    
 <form action="insert.php" method="post" id="insert">
     <div id="error"> <?php echo $error.$successMessage;  ?></div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" aria-describedby="email" name="emailId" placeholder="Enter your email address" name="email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="subject">Subject</label>
    <input type="subject" class="form-control" name="subjectfield" id="subject" name="subject" >
  </div>
     <div>
 
         <div class ="form-group">
    <label class="form-check-label" for="exampleCheck1">What would you like to ask us?</label>
    <textarea class="form-control" id="content" name="contentfield" rows="3" name="text"></textarea>
   <br>
     </div>
  <button type="submit" class="btn btn-primary" id="button" name="button">Submit</button>
</form>
    
       </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

<script type="text/javascript">
     $("form").submit(function(e){
      
        
     var error = "";
     
     if($("#email").val()==""){
        error +=  "<p>The email field is required</p>"; 
     }
     
     if($("#subject").val()==""){
        error +=  "<p>The subject field is required</p>"; 
     }
     
      if($("#content").val()==""){
        error +=  "<p>The content field is required</p>"; 
     }
     
     if(error !=""){
     $("#error").html('<div class="alert alert-danger" role="alert"><strong>There were error(s) in your form</strong>' + error + '</div>');
      return false;
 } 
     else{
         return true;
     }
    });
    
 </script>   

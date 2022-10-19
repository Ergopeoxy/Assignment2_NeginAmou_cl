<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Confirm</title>
  <link type="text/css" href="/css/style.css" rel="stylesheet"/>
  <link type="text/css" href="/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- <link href="./css/style.css" rel="stylesheet"> -->
</head>
<body style="height: 100%" height=100% >
<?php
if(isset($_POST['Register'])){
   // print_r($_POST);
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email =  $_POST['email'];
    $phone =  $_POST['phone'];
    $os = $_POST['os'];
    $mlist = trim($_POST['publication']);

   // echo "before include";
    include_once './database/forms/registration.php';
   // `fname`, `lname`, `email`, `phone`, `book_auto_key`, `os_auto_key`
   $result = addUser([$fname, $lname, $email, $phone, $mlist, $os]);
    
}
?>


<div class="align-middle" style="height: 100%; align-items: center;">
    <div class="justify-content-center" style="width:900px; margin:0 auto;">
    
          <div class="alert alert-success" role="alert" <?php if($result == 0){ echo "hidden"; }?>>
            Hi <?php echo $fname; ?>  Thank you for completing the survey. You have been added to the <?php echo $mlist; ?> .
            <hr>
            The following information has been saved in our database:
              <br/>
              Name: <?php echo $fname . " ". $lname; ?>
              <br/>
              Email: <?php echo $email; ?>
              <br/>
              Phone: <?php echo $phone; ?>
              <br/>
              OS: <?php echo $os; ?>

              <a href="./showDatabaseContent.php">See the list of subscription</a>

          </div>
    </div>
</div>



</body>
</html>




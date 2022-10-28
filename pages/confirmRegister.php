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
 include_once '../database/registration.php';
if(isset($_POST['Register'])){
    //print_r($_POST);
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email =  $_POST['email'];
    $password = $_POST['pass'];
    $phone =  $_POST['phone'];

 

   // echo "before include";
   // include_once '../database/registration.php';
   // `fname`, `lname`, `email`, `phone`, `book_auto_key`, `os_auto_key`
   $result = addUser([$fname, $lname, $email, $phone,$password ]);
    
}


if(isset($_POST['RegisterTradeMark'])){
  //print_r($_POST);
 
  $tname = $_POST['tname'];
  $toname = $_POST['toname'];
  $ttype =  $_POST['ttype'];
  $tdesc = $_POST['tdesc'];
  $bnumber =  $_POST['bnumber'];
  $tdesc = $_POST['tdesc'];
  $bnumber =  $_POST['bnumber'];

  $baddress = $_POST['baddress'];
  $pcode =  $_POST['pcode'];
  $formFile = $_POST['formFile'];
  $account = $_POST['account'];


  //include_once '../database/registration.php';


          $result2 = addTrademark([
          $tname ,
          $toname,
          $ttype ,
          $tdesc  ,
          $bnumber ,
          $tdesc,
          $bnumber ,
          $baddress,
          $pcode ,
          $formFile,
          $account
        ]);
  
}


if(isset($_POST['signin'])){
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  $data = [$email, $pass];
  $result3 = authenticate($data);
  if($result3==1){
    echo '<div  class="alert alert-success" role="alert" >successfully logged in.</div>';

  }else{
    echo '<div class="alert alert-success" role="alert" >there was a problem logging you in.</div>';

  }
}

?>


<div class="align-middle" style="height: 100%; align-items: center;">
    <div class="justify-content-center" style="width:900px; margin:0 auto;">
    
          <div class="alert alert-success" role="alert" <?php if( !isset($_POST['Register']) || $result == 0 ){ echo "hidden"; } ?> >
            Hi <?php echo $fname; ?>  Thank you for choosing our service .
            <hr>
            The following information has been saved in our database:
              <br/>
              Name: <?php echo $fname . " ". $lname; ?>
              <br/>
              Email: <?php echo $email; ?>
              <br/>
              Phone: <?php echo $phone; ?>
              <br/>
             

              Please go to <a href="./trademarkRegistration.php?user=<?php echo $email; ?>">this</a>  page to register your trademark

          </div>
    </div>
</div>


<div class="align-middle" style="height: 100%; align-items: center;">
    <div class="justify-content-center" style="width:900px; margin:0 auto;">
    
          <div class="alert alert-success" role="alert" <?php if(!isset($_POST['RegisterTradeMark']) || $result2 == 0  ){ echo "hidden"; }?>>
           
           Your trademark was successfully registered.
           View <a href="./showDatabaseContent.php?>">this</a>  page for other trademarks  

          </div>
    </div>
</div>


<div class="align-middle" style="height: 100%; align-items: center;">
    <div class="justify-content-center" style="width:900px; margin:0 auto;">
    
          <div class="alert alert-success" role="alert" <?php if(!isset($_POST['signin']) || $result3 == 0  ){ echo "hidden"; }?>>
           
       Please go to <a href="./trademarkRegistration.php?user=<?php echo $email; ?>">this</a>  page to register your trademark
          </div>
    </div>
</div>

</body>
</html>




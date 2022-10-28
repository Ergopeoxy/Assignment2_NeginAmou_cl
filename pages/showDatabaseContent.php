<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of trademarks</title>
    <link type="text/css"  href="/css/style.css" rel="stylesheet">
    <link type="text/css" href="/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>
<div class="input-group rounded" style="width: 50%;  margin: auto;  padding: 10px; ">
  <input list="tmarks" type="search" style="border: 3px solid red;" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
  <span class="input-group-text border-0" id="search-addon">
    <?php
     include_once '../database/registration.php';
     $html = getTrademarkList();
     echo $html;
    ?>
  </span>
</div>
<table class="table table-striped table-dark table-bordered table-hover">

  <thead class="thead-dark">
 
    <tr>
      <th scope="col">Account</th>
      <th scope="col">Trade Name</th>
      <th scope="col">Trade Name owner</th>
      <th scope="col">type</th>
      <th scope="col">Description</th>
      <th scope="col">Address</th>
      <th scope="col">Postalcode</th>
    
    </tr>
  </thead>
  <tbody>
   <?php
   
   $html = getTrademarks();
   echo $html;


   ?>
  </tbody>
</table>


</body>
</html>
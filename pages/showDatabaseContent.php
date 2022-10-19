<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of subscribers</title>
    <link type="text/css"  href="/css/style.css" rel="stylesheet">
    <link type="text/css" href="/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>
<table class="table table-striped table-dark table-bordered table-hover">
  <thead class="thead-dark">
  
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Last Name</th>
      <th scope="col">First Name</th>
      <th scope="col">E-mail Address</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Book</th>
      <th scope="col">Operating System</th>
    </tr>
  </thead>
  <tbody>
   <?php
    include_once './database/forms/registration.php';
   $html = getsubList();
   echo $html;


   ?>
  </tbody>
</table>


</body>
</html>
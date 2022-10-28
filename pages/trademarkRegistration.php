<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css"> 
    <link rel="stylesheet" href="../css/style.css">
    <style>
        html, body {
            min-height: 100%;
            height: 100%;;
            min-width: 100%;
            width: 100%;
            background-color: 		#202020;
        } 
        input[type="text"], textarea {

background-color : #FFFFFF;



}

.form input{
  background-color: #FFFFFF;
}

input {
    background-color: #FFFFFF;
}
        
        </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <title>Register trademark</title>
</head>
   







<body>
<?php
                include '../componenets/navbar.php'
    ?>
    <div class="container-fluid">
        <div class="row">
     
                
        <main role="main" class="d-flex justify-content-center" id="main">
     
        <!-- <div class="d-flex justify-content-center"> -->

            <!-- <div class="input-group">
                    <div class="form-outline">
                        <input type="search" id="form1" class="form-control" width="100%" />
                       
                    </div>
                    <button type="button" class="btn btn-primary">
                        search
                    </button>
            </div> -->
      
       


            <br/> <br/> <br/> <br/>
                <form action="confirmRegister.php?user=<?php echo  $_GET['user'];?>" method="post" style="width: 75%; ">
                    <br>
                            <label for="account">Acount</label>
                            <input  class="form-control" name="account" id="account" require value="<?php echo  $_GET['user'];?>" readonly >
                            <label for="tname">Trademark name</label>
                            <input  class="form-control" name="tname" id="tname" require >

                            <label for="toname">Name of owner of trademark(Can be an entity like a corporation)</label>
                            <input  class="form-control" name="toname" id="toname" require >

                            <label for="ttype">  What type of product(s)/service(s) will utilize the mark?</label>
                            <input  class="form-control" name="ttype" id="ttype" require >

                            <label for="tdesc"> Describe the services or products that will have the mark?</label>
                            <textarea class="form-control" name="tdesc" id="tdesc" rows="3" require></textarea>
                            
                        
                            <label for="bnumber">Business registration number</label>
                            <input  class="form-control" name="bnumber" id="bnumber" require >

                            <label for="baddress">Business address </label>
                            <input  class="form-control" name="baddress" id="baddress" require >

                            <label for="pcode">Postal code</label>
                            <input  class="form-control" name="pcode" id="pcode" require >

                           
                            

                            <label for="formFile" class="form-label">Logo</label>
                            <input class="form-control" type="file" id="formFile" name="formFile">
                            <button type="submit" name="RegisterTradeMark" id="RegisterTradeMark" class="btn btn-primary">Save</button>
                        </form>                        
                 
                    </main>
            </div>
     </div>
</body>

</html>
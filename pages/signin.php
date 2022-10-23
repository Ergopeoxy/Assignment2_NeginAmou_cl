
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
   
    <style>
        html, body {
     min-height: 100%;
     height: 100%;
}
    </style>
 </head>
 <body style="min-height: 100%; height:100%; margin: 0; padding:0" >
 <div class=" h-100 d-flex align-items-center justify-content-center bg-secondary text-center rounded p-4">
     <div class="align-middle" style="height: 50%; width:50%; align-items: center;">
     <div class="justify-content-center" style="width:900px; margin:0 auto;">
        <h6 class="mb-0"> Sign in to your account</h6>
            <div class="">
            
                <hr>
                <?php 
                
                ?> 
                <form action="trademarkRegistration.php" method="post" >
            

                    <label for="email">Email</label>
                    <input  type="email" class="form-control" name="email" id="email" require >

                    <label for="pass">Password</label>
                    <input  type="password" class="form-control" name="pass" id="pass" require  >
                    
                    
                    <hr>
                    <button type="button" onclick="history.back()" name="cancel" id="cancel" class="btn btn-primary">Cancel</button>
                    <button type="submit" name="Register" id="Register" class="btn btn-primary">Login</button>
                   
                </form>
                <br>
               
            </div>

            </div>
            </div>

</div>
 </body>
 </html>                       


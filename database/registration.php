<?php


include_once __DIR__."/startConnection.php";


function addUser($data){
   

  // echo "in add user "; 
  
   $con =  startConnection();
    //->localConnection();
    //echo "in add user ";
    //startConnection();
    // $result = addUser([$fname, $lname, $email, $phone,$password ]);
    $fname = $data[0];
    $lname = $data[1];
    $email= $data[2];
    $phone = $data[3];
    $password = $data[4];
    //add encypt password later
    $sql = "INSERT INTO `users`(`FirstName`, `LastName`, `Email`, `Phone`, `Password`) VALUES 
   ('$fname','$lname','$email','$phone','$password') ON DUPLICATE KEY UPDATE user_auto_key = user_auto_key;"; 
  
   // echo $sql;
    $result = runInsert($con , $sql);
    return $result;
}
function addTrademark($data){
   

    //echo "in add TRADEMARK "; 
    //print_r($data);
     $con =  startConnection();
 
      
  $tname = $data[0];
  $toname = $data[1];
  $ttype =  $data[2];
  $tdesc = $data[3];
  $bnumber =  $data[4];
  $tdesc = $data[5];
  $bnumber =  $data[6];
  $baddress = $data[7];
  $pcode =  $data[8];
  $formFile = isset($data[9]);
  $account = $data[10];
      //add encypt password later
      $sql = "INSERT INTO `trademarks`(`user_auto_key`, `tname`, `toname`, `ttype`, `tdesc`, `bnumber`, `baddress`, `pcode`, `formFile`) VALUES 
     ( 
        (SELECT user_auto_key from users where Email = '$account'),
        '$tname' ,
          '$toname',
          '$ttype' ,
          '$tdesc'  ,
          '$bnumber' ,
          
       
          '$baddress',
          '$pcode' ,
          '$formFile') "; 
    
      //echo $sql;
      $result = runInsert($con , $sql);
     
 
    if(is_resource($con)){
        closeConnection($con);
    }
      //if resource closeConnection
      return $result;
  }
  

function authenticate($data){

    $con =  startConnection();
    //echo "in get auth ";
    $account = $data[0];
    $password = $data[1];   
    $sql = "Select 1 as result from users where Email = '$account' and Password = '$password'"; 
    //echo $sql;
    $result = runSelect($con, $sql);
    if($result!=null){
        $row = $result->fetch_assoc();
        if($row["result"]==1){
            return 1;

        }else{
            return 0;
        }
    }else{
        return 0;
    }
}


function getTrademarks(){
    $con =  startConnection();
    //->localConnection();
    //echo "in get trademark ";


    $sql = "SELECT *, (select email from users where users.user_auto_key = tm.user_auto_key ) as Account from trademarks as tm"; 
    $result =  runSelect($con , $sql);
    $html = "";
    if($result!=null){
       // echo "result was not null";
        // echo "reslt wasnt null";
         while($row = $result->fetch_assoc()){
          //`tname`, `toname`, `ttype`, `tdesc`, `bnumber`, `baddress`, `pcode`, `formFile`
             $html .= '<tr>
             <td>'.$row['Account'].'</td>
             <td>'.$row['tname'].'</td>
             <td>'.$row['toname'].'</td>
             <td>'.$row['ttype'].'</td>
             <td>'.$row['tdesc'].'</td>
             <td>'.$row['bnumber'].'</td>
             <td>'.$row['baddress'].'</td>
             <td>'.$row['pcode'].'</td>
           </tr>';

         }
         
     }
   
 
     $con = null;
     return $html;
}


function getTrademarkList(){

    
   
    $con =  startConnection();
    //->localConnection();
    
    //startConnection();
    $sql = "SELECT * from trademarks "; 
    $result = runSelect($con , $sql);
    $html = '<datalist id="tmarks" name="tmarks">';


    


    if($result!=null){
       // echo "reslt wasnt null";
        while($row = $result->fetch_assoc()){
           
            $html .= 
            '<option value="'.$row['tname'].'"></option>';
        }
        
    }
  
    $html.="</datalist>";
    $con = null;
    return $html;
}

?>
<?php




    function startConnection(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ass2_cl"; 
    
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        mysqli_report(MYSQLI_REPORT_ALL & ~MYSQLI_REPORT_INDEX);
        mysqli_options($conn, MYSQLI_OPT_LOCAL_INFILE, true);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // Display connection
        // echo "Connected successfully";
        return $conn;
    }
    
    function closeConnection($conn){
        // Close connection
        mysqli_close($conn); 
        // Display connection
        // echo "Connection closed successfully";
    }
    
    
    /*
    ****************************************************************************************************
    ***************************************** Database Interaction *************************************
    */
    
    function runSelect($conn, $sql){
    
            
            $result = $conn->query($sql);
    
            if ($result->num_rows > 0) {
                return $result;
            } else {
                echo "No results";
                closeConnection($conn);
            }
    }
    
    function runInsert($conn, $sql){
        //echo "In insert";
        try {
            mysqli_query($conn, $sql) ;
           // echo "New record created successfully";
            return 1;
        }catch (Exception $e) {
            
        
            echo "<div class='alert alert-danger' role='alert'>
            There was a problem adding you to the list
          </div>";
            echo "Error: "  .$e->getMessage(); ;
            closeConnection($conn);
            return 0;
       
        }
    }
    
    function runUpdate($conn, $sql){
        $result ='';
        if ($conn->query($sql) === TRUE) {
            $result = "Record updated successfully";
                echo $result;
        } else {
                $result = "Error updating record" ;
                echo $result. $conn->error;
               closeConnection($conn);
        }
        
        return $result;		
    }
    

?>
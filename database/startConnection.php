<?php
//source https://cloud.google.com/sql/docs/mysql/connect-app-engine-standard?hl=en&cloudshell=true#php
//namespace Google\Cloud\Samples\CloudSQL\MySQL;

use PDO;
use PDOException;
use RuntimeException;
use TypeError;

class DatabaseUnix
{
    public  function initUnixDatabaseConnection(): PDO
    {

        $devMode = false;
        if($devMode){
           
           $con = $this->localConnection();
           return $con;
        }else {
       // echo "in connect function";
        try {
            // Note: Saving credentials in environment variables is convenient, but not
            // secure - consider a more secure solution such as
            // Cloud Secret Manager (https://cloud.google.com/secret-manager) to help
            // keep secrets safe.
            $username = getenv('DB_USER'); // e.g. 'your_db_user'
            $password = getenv('DB_PASS'); // e.g. 'your_db_password'
            $dbName = getenv('DB_NAME'); // e.g. 'your_db_name'
            //assignment1negin:northamerica-northeast2:mydb
            $instanceUnixSocket = getenv('INSTANCE_UNIX_SOCKET'); // e.g.
            // Connect using UNIX sockets
            $dsn = sprintf(
                'mysql:dbname=%s;unix_socket=%s',
                $dbName,
                $instanceUnixSocket
            );

         
            //echo $dsn;
            // set the PDO error mode to exception

            
            // Connect to the database.
            $conn = new PDO(
                $dsn,
                $username,
                $password,
                # ...
            );
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;
        } catch (TypeError $e) {
            echo "error: ".$e->getMessage();
            throw new RuntimeException(
                sprintf(
                    'Invalid or missing configuration! Make sure you have set ' .
                        '$username, $password, $dbName, ' .
                        'and $instanceUnixSocket (for UNIX socket mode). ' .
                        'The PHP error was %s',
                    $e->getMessage()
                ),
                (int) $e->getCode(),
                $e
            );
        } catch (PDOException $e) {
            echo "error: ".$e->getMessage();
            throw new RuntimeException(
                sprintf(
                    'Could not connect to the Cloud SQL Database. Check that ' .
                        'your username and password are correct, that the Cloud SQL ' .
                        'proxy is running, and that the database exists and is ready ' .
                        'for use. For more assistance, refer to %s. The PDO error was %s',
                    'https://cloud.google.com/sql/docs/mysql/connect-external-app',
                    $e->getMessage()
                ),
                (int) $e->getCode(),
                $e
            );
        }

        return $conn;
    }
    }

    public function selectStm($con, $sql){
       try{
        $stmt = $con->query($sql);
       
        return $stmt;
       }catch (PDOException $e){
        echo "<div class='alert alert-danger' role='alert'>
        There was a problem adding you to the list
      </div>";
        echo $e->getMessage();
        return null;
       }
     

       
    }

    public  function insertStm($con, $sql, $data){
        
    try {
        $statement = $con->prepare($sql);

        $statement->execute($data);
       return 1;
    } catch(PDOException $e) {
        echo "<div class='alert alert-danger' role='alert'>
        There was a problem adding you to the list
      </div>";
        echo $e->getMessage();
        return 0;
    }

    }

    public  function localConnection(){
        // $host = 'localhost';
        // $dbname = 'cl_ass1';
        // $username = 'root';
        // $password = '';
        // try {
        //     $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        //     echo "Connected to $dbname at $host successfully.";
        //     return $conn;
        // } catch (PDOException $pe) {
        //     die("Could not connect to the database $dbname :" . $pe->getMessage());
        // }

        $host = '127.0.0.1';
$db   = 'cl_ass1';
$user = 'root';
$pass = '';
$port = "3306";
$charset = 'utf8mb4';

$options = [
    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::ATTR_EMULATE_PREPARES   => false,
];
$dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
try {
     $pdo = new \PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
    }
}
?>
<?php
//Correct Code:
// class Database{
//     private $host = "localhost";            // The host is specified
//     private $username = "root";             //  The username is specified
//     private $password = "12345678";        // sets the password to connect to the mysql
//     private $dbname = "crud_php";          // declares the db name
//     public $conn;

//     public function __construct() {
//         $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
//         if ($this->conn->connect_error) {
//             die("Connection failed: " . $this->conn->connect_error);
//         }
//     }
// }


//Trial:
class db{
    const HOST = "localhost";            // The host is specified
    const USERNAME = "root";             //  The username is specified
    const PASSWORD = "12345678";        // sets the password to connect to the mysql
    const DBNAME = "crud_php";          // declares the db name
    public $conn;


    public function __construct() {
                $this->conn = new mysqli(self::HOST, self::USERNAME, self::PASSWORD, self::DBNAME);
                if ($this->conn->connect_error) {
                    die("Connection failed: " . $this->conn->connect_error);
                }
            }

}


?>



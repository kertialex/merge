<?php

class DBController
{
    private $conn = null;

    private $host = "Localhost";

    private $user = "root";

    private $password = "";
    
    private $dataase = "oscar";

    function __construct()
    {
       $conn = $this->connectDB();
       if(!empty($conn))
       {
            $this->conn = $conn;
       }
    }

    function connectDB()
    {
       $conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
       return $conn;
    }
    function executeSelectQuery($query,$params = [])
    {
        $result = mysqli_query($this->conn,$query);
        while($row=mysqli_fetch_assoc($result))
        {
            $resultset[] = $row;
        }
        if(!empty($resultset))
        return $resultset;
    }
    function closeDB()
    {
        mysqli_close($this->conn);
        $this->conn=null;
    }
}
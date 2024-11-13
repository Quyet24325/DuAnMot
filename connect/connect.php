<?php 

class connect{
    public function connect(){
        $serverName = 'localhost';
        $userName= 'root';
        $password = '';
        $db ='duanmot';
        try {
            $conn = new PDO("mysql:host=$serverName;dbname=$db",username:$userName,password:$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (\Throwable $th) {
           echo "Kết nối thất bại". $th->getMessage();
           return null;
        }
    }
}
?>
<?php
require_once '../connect/connect.php';

class user extends connect
{
    public function regester($name,$email,$pass){
        $hash_password = password_hash($pass,PASSWORD_DEFAULT);
        $sql="insert into user (name,email,pass,role_id) value (?,?,?,2)";
        $stmt=$this->connect()->prepare($sql);
        return $stmt->execute([$name,$email,$hash_password]);
    }

    public function login($email,$pass){
        $sql="select * from user where email = ?";
        $stmt=$this->connect()->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        if ($user && password_verify($pass,$user['pass'])) {
            return $user;
        }
        return false;
    }
    
    public function update($name,$email,$phone,$address,$gender){
        $sql="update user set name=?,email=?,phone=?,address=?,gender=? where user_id=?";
        $stmt=$this->connect()->prepare($sql);
        return $stmt->execute([$name,$email,$phone,$address,$gender,$_SESSION['user']['user_id']]);
    }
    public function getUsserId($user_id){
        $sql='select * from user where user_id = ?';
        $stmt=$this->connect()->prepare($sql);
        $stmt->execute([$user_id]);
        return $stmt->fetch();
    }
    public function listUsser()
    {
        $sql = "select 
            user.user_id,
            user.name,
            user.avata,
            user.address,
            user.email,
            user.phone,
            user.role_id,
            user.gender,
            role.role_type 
            from user 
            inner join role on user.role_id = role.role_id
            ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getUserId($user_id){
        $sql = "select 
            user.user_id,
            user.name,
            user.avata,
            user.address,
            user.email,
            user.phone,
            user.role_id,
            user.gender,
            role.role_type 
            from user 
            inner join role on user.role_id = role.role_id
            where user.user_id = ?
            ";
            $stmt=$this->connect()->prepare($sql);
            $stmt->execute([$user_id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getRole(){
        $sql = "select * from role";
        $stmt=$this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function addRole($role_id,$user_id){
        $sql = 'update user set role_id = ? where user.user_id = ?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$role_id,$user_id]);
    }
}

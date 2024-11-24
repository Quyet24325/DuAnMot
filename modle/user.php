<?php
require_once '../connect/connect.php';

class user extends connect
{
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

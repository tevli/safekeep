<?php
require_once 'datab.php';
require_once 'DB.php';
class reg extends datab {
    public $name; 
    public $email;
    public $password;
    public $pic= 1;
    public function regs($name,$email,$password,$pic){
    if($name=='Admin'){ return false;}
    $checker= new emailCheck();
        $checker=$checker->isUsed($email); 
        //var_dump($checker);
        foreach($checker as $checker){
            $checks[]= $checker;
        }
        if(!empty($checks)){return false;}
        $query = "INSERT INTO user_details(name,email,password,pic) VALUES(?,?,?,?)";
        $stmt = $this->connect()->prepare($query);
        $stmt->bindParam(1,$name,PDO::PARAM_STR);
        $stmt->bindParam(2,$email,PDO::PARAM_STR);
        $stmt->bindParam(3,$password,PDO::PARAM_STR);
        $stmt->bindParam(4,$pic,PDO::PARAM_STR);
       // $stmt->bindParam()
        $stmt->execute();
        return true;
        
        
    }
}
class emailCheck extends datab {
    public  function isUsed($email){
        $query = "SELECT * FROM `user_details` WHERE  email=$email";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $res = $stmt->fetchAll();
        return $res;
    }
  //  public static function isUsed($email){
   //     return self::conn($email);
   // }
}

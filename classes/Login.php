<?php
require_once 'datab.php';

class Login extends datab {
    public $name;
    public $password;
    public function __construct($email,$password)
    {
       $this->name = $email;
        $this->password = $password;
        //echo $this->name;
    }
    public function auth(){
        $query = "SELECT name,password FROM user_details WHERE name = ? AND password= ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$this->name,$this->password]); echo $this->name;
        $res = $stmt->fetchAll();
       if ($res==false) {
        echo $this->name;
           return false; 
       }
       else{
           session_start();
           $_SESSION['username']= $this->name;
          // return true;
           if($this->name=='Admin'){
                header('location:admin/dashboard.php');
           }
           else{
               header('location: user/dashboard.php');
           }
       }
        
        
    }
    public static function asUser(){
        session_start();
        if (!isset($_SESSION['username'])) {
            header('location:../login.php');
        }
    }
    public static function asAdmin(){
        session_start();
        if((!isset($_SESSION['username']))||($_SESSION['username']!='Admin')){
                header('location: ../login.php');
        }
    }
    public static function logout(){
        session_start();
        session_destroy();
        echo "<h2>You have been logged out<a href='index.html' class='btn btn-info'>Go to Home</a></h2>";
    }
}

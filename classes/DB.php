<?php
require_once 'datab.php';
    class DB extends datab 
    {

        public function getUsers(){
            //get all registered users minus the admin
            $query = "SELECT * FROM user_details WHERE NOT name='Admin'";
            $stmt = $this->connect()->query($query);
            $res = $stmt->fetchAll(); //var_dump($res);
            return $res;
          //  while ($row = $stmt->fetch()) {
          //      
          //  }
        }
        
        public function getUser($id){
            //Will get specific user
            $query = "SELECT * FROM user_details WHERE id=$id";
            $stmt = $this->connect()->query($query);
            $res = $stmt;
            return $res;

        }
        
        public function Insert(){
            // Will take care of uploading info that does not contain files

                $query = "INSERT INTO user_details(name,email,password,pic) VALUES(?,?,?,?)";
                $stmt = $this->connect()->prepare($query);
               // $stmt->bindParam('ssss',$name,$email,$password,$pic);
                $stmt->bindParam(1,$name,PDO::PARAM_STR);
                $stmt->bindParam(2,$email,PDO::PARAM_STR);
                $stmt->bindParam(3,$password,PDO::PARAM_STR);
                $stmt->bindParam(4,$pic,PDO::PARAM_STR);
               // $stmt->bindParam()
                $stmt->execute();
                return true;

        }

        public function Delete($table,$column,$value){
            //will take care of deleting stuff
            $query = "DELETE FROM `$table` WHERE `$column`=$value";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute();
            $res= $stmt;
            if($res==false){
                echo "<div class='alert alert-danger'>Problems Deleting this File</div><br>";
                     }
              else{
                 echo "<div class='alert alert-success dismiss'>File successfully Deleted!</div><br>";
                 
                 
                 }
              
        }

        public function update($table,$column,$value,$id){
            // will take care updating info
           // $query = "UPDATE `$table` SET `$column`=$value WHERE `user_id`=$id";
           $query ="UPDATE `$table` SET `$column`='$value' WHERE `user_id`=$id";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute();
            $res=$stmt;
            if($res==false){
                echo "<div class='alert alert-danger'>Problems Editing this File</div><br>
                <a href='checkbox.php?id=$id'><b>Go Back</b></a>";
                     }
              else{
                 echo "<br><br><br><div class='alert alert-success dismiss'>File successfully Edited!</div><br>
                 <a href='checkbox.php?id=$id' class='center'><b>Go Back</b></a>";
                // echo $query;
                 
                 }

        }


        public  function getP(){
                $query = "SELECT * FROM portfolio";
                $stmt = $this->connect()->prepare($query);
                $stmt->execute();
                $res = $stmt->fetchAll();
                if($res) return $res;
                else{
                    return false;
                }
        }
        public  function getBox($table,$id){        
            $query = "SELECT * FROM $table WHERE user_id=$id";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute();
            $res = $stmt->fetchAll();
            if($res) return $res;
            else{
                return false;
            }
    }

    public function checkBox($deposit,$date,$nok,$content,$id){
        // Will take care of uploading info that does not contain files
            $box_code ='BXSC/'.rand(1000,9999).'/XS'.rand(1000,9999);
            $sec_code ='BXSC/'.str_shuffle('XXYT').'/'.rand(10,99). str_shuffle('XC'); 
            $query = "INSERT INTO deposits(depositor,deposit_date,nok,content,user_id,box_code,sec_code) VALUES(?,?,?,?,?,?,?)";
            $stmt = $this->connect()->prepare($query);
           // $stmt->bindParam('ssss',$name,$email,$password,$pic);
            $stmt->bindParam(1,$deposit,PDO::PARAM_STR);
            $stmt->bindParam(2,$date,PDO::PARAM_STR);
            $stmt->bindParam(3,$nok,PDO::PARAM_STR);
            $stmt->bindParam(4,$content,PDO::PARAM_STR);
            $stmt->bindParam(5,$id,PDO::PARAM_STR);
            $stmt->bindParam(6,$box_code,PDO::PARAM_STR);
            $stmt->bindParam(7,$sec_code,PDO::PARAM_STR);
           // $stmt->bindParam()
            $stmt->execute();
            return true;

        }
        public function useBox($sec_code,$box_code){
            $query = "SELECT * FROM deposits WHERE box_code='$box_code' AND sec_code='$sec_code'";
            $stmt = $this->connect()->query($query);
            $res = $stmt->fetchAll();
            //echo $query;
           // var_dump($res);
            return $res;assert(is_file($res));
        }
    }
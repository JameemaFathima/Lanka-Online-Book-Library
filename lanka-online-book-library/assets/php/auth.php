<?php
    require_once 'config.php';

    class Auth extends Database{

        //Register New User
        public function register($name,$userid,$email,$phone,$password){
            $sql = "INSERT INTO users (username,userid,email,phone,password) VALUES(:name,:userid,:email,:phone,:pass)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['name'=>$name, 'userid'=>$userid, 'email'=>$email, 'phone'=>$phone, 'pass'=>$password]);
            return true;
        }

        //Check if user already registered
        public function user_exist($email){
            $sql = "SELECT email FROM users WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email'=>$email]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result;
        }

        //Login Existing User
        public function login($email){
            $sql = "SELECT email, password FROM users WHERE email = :email AND deleted != 0";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email'=>$email]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
        }

        //Current User In Session
        public function currentUser($email){
            $sql = "SELECT * FROM users WHERE email = :email AND deleted != 0";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email'=>$email]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
        }
        public function user_details(){
            $sql = "SELECT * FROM users";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result=$stmt->get_result();
        }
    }
?>
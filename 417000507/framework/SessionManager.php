<?php

    class SessionManager{
        public static function create():void{
            if (session_status() == PHP_SESSION_NONE){
                session_start();
            }
        }

        public static function destroy():void{
            if (session_status() == PHP_SESSION_ACTIVE){
                session_destroy();
            }
        }

        public static function add($name, $value):void{
            if (session_status() == PHP_SESSION_ACTIVE){
                $_SESSION[$name] = $value;
            }
        }

        public static function remove($name):void{
            if (session_status() == PHP_SESSION_ACTIVE){
                unset($_SESSION[$name]);
            }
        }

        public static function accessible($user, $page):bool{
            if (session_status() == PHP_SESSION_ACTIVE){
                if (isset($_SESSION["user"])){
                    if ($_SESSION["user"] == $user && $page !== "login.php" && $page !== "signup.php") {
                        return true;
                    }
                } else {
                    if($page !== "courses.php" && $page !== "profile.php"){
                        return true;
                    }
                }
            }
            return false;
        }
    }
?>
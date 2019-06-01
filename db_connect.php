<?php
Class database{
    public static function connection(){
            $host= "127.0.0.1";
            $user="root";
            $password = "";
            $dbName = "form";
            mysqli_connect($host, $user, $password, $dbName);

          if(mysqli_connect_error()){
    
                echo 'There was an error connecting to the database';
            
                
                } else {
    
                 echo 'Database connection successful';
                }
        }

}




?>


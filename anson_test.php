<?php
//--
//--pre-defined variables
//--
    $servername = "localhost";
    $username = "root";
    $password = "1234567890";
    $dbname = "phdhouse";
//--
//--mysql open
//--
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        
        die("Connection failed: " . $conn->connect_error);
    }
    else{
        
    }
//--
//--http(s) response
//--
    $var = $_GET['command'];

    if($var === "signin"){
        
        $input_username = $_POST[ "username" ];
        $input_password = $_POST[ "password" ];
        
        $sql = "SELECT Users.* FROM Users WHERE Users.User_Name = '" . $input_username . "';";
        
        $result = $conn->query($sql);
        
        if ($result->num_rows == 0) {           //check username, =0 found
            
            echo "无效的用户名";
        }
        else if( $result->num_rows == 1 ){      //check username, =1 found
            
            $row = $result->fetch_assoc();
            
            if( $row["Password"] == $input_password ){
                
                echo "密码正确";                      //check password, right
            }
            else{
                
                echo "密码错误";                      //check password, wrong
            }
        }
        else if( $result->num_rows > 1 ){       //check username, >1 found
            
            echo "无效的用户名";
        }
        else{
            
            echo "无效的用户名";
        }   
    }
    else if($var === "signup"){
        
        $input_username = $_POST[ "username" ];
        $input_password = $_POST[ "password" ];
        
        $sql = "INSERT INTO `phdhouse`.`Users` (`User_Name`,`Password`,`Level`) VALUES ('" . $input_username . "','" . $input_password . "',0);";
        
        if ($conn->query($sql) === TRUE) {
            
        }
        else{
            
        }
    }
    else{
        
    }
//--
//--mysql close
//--
    $conn->close();
?>
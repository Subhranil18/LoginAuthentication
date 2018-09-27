<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authentication</title>
    <link rel="stylesheet" href="PhpPageStyling.css">
</head>
<body>
    <?php

        $serverName = "DESKTOP-SDLD55M"; //serverName\instanceName
        $connectionInfo = array( "Database"=>"subhranil", "UID"=>"sa", "PWD"=>"22288818");  
        $conn = sqlsrv_connect( $serverName, $connectionInfo);

            $userName=$_POST["txt1"];
            $password=$_POST["txt2"];

            $sequel="select * from UsersData";
            $query=sqlsrv_query($conn,$sequel);

            if($userName!="" && $password!=""){
                   while($row=sqlsrv_fetch_Array($query,SQLSRV_FETCH_ASSOC)){    
                   $res=$row['username'];
                   $resPass=$row['password'];
                             if($userName==$res && $password==$resPass){
                                         $flag=1;
                                         break;
                              }
                              else{
                                       $flag=0;
                                       continue;
           
                             }
                     }
                    if($flag==1){
                               echo "<h2>Hi,$userName</h2>";
                               echo "<h2>Welcome To Your Profile</h2>";
                     }
                     else{
                           echo "<h1>Either Username or Password Incorrect</h1>";
                           echo "<a href='LoginPage.html'><h1>Go Back To Login Page</h1></a>";
                          
                       }

                }
                else{
                        
                        echo "<h1>Username or Password Cannot be Empty</h1>";
                        echo "<a href='LoginPage.html'><h1>Go Back To Login Page</h1></a>";

                    }

    ?>
</body>
</html>

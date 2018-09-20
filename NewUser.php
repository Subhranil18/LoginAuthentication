<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="PhpPageStyling.css">
</head>
<body>

    <?php
            
    $serverName = "DESKTOP-SDLD55M"; //serverName\instanceName
    $connectionInfo = array( "Database"=>"subhranil", "UID"=>"sa", "PWD"=>"22288818");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    
    $user=$_POST["field1"];
    $pass=$_POST["field2"];
    $rePass=$_POST["field3"];

    $sequel="select * from usersdata";
    $query=sqlsrv_query($conn,$sequel);

    if($user!="" && $pass!="" && $rePass!=""){
           if($pass==$rePass){
                 while($row=sqlsrv_fetch_Array($query,SQLSRV_FETCH_ASSOC)){    
                                $res=$row['username'];
                                if($user==$res){
                                                $flag=1;
                                                break;
                                                }
                                  else{
                                                $flag=0;
                                                continue;
           
                                       }
                                }
                                if($flag==1){
                                    echo "<h1>Email or Phone Already Registered!</h1>";
                                    echo "<a href='CreateAccount.html'><h1>Try Again!</h1></a>";
                                     
                                 }
                                 else{
                                     $sql="insert into usersdata
                                     values('$user','$pass')";
                                     $stmt=sqlsrv_query($conn,$sql);
                                     echo "<h1>You Account Successfully Created</h1>";
                                     echo "<a href='LoginPage.html'><h1>Go Back To Login Page</h1></a>";
                                  }
                              }
                 else{
                          echo "<h1>Passwords are Different!</h1>";
                          echo "<a href='CreateAccount.html'><h1>Try Again!</h1></a>";
                      }

                }
                else{
                          echo "<h1>Username or Password Cannot be Empty</h1>";
                          echo "<a href='CreateAccount.html'><h1>Try Again!</h1></a>";
                    }

        ?>
</body>
</html>
 <?php  
require_once "vendor/autoload.php";
              
                session_start();
     

                //Connection to DB
                $mongoClient = new MongoDB\Client();
                $db = $mongoClient->UsersInfo;
                $collection = $db->Customers;
             
                $username = filter_input(INPUT_GET, 'log_user', FILTER_SANITIZE_STRING);
                $pw = filter_input(INPUT_GET, 'log_pw', FILTER_SANITIZE_STRING);

                $query = array('Username' => $username, 'Password' => $pw);

                $count = $collection -> findOne($query);
                $cursor = $collection->findOne($query);


                if(!count($count)) {
                    echo "<script> alert('Incorrect Username/Password');window.location='login.php'</script>";
                    echo $username , " " , $pw;
                }
                else{
                    $msg = "You're Logged in!";
                    $_SESSION['user'] = $username;
                    foreach ( $cursor as $id => $value )
                    {
                        $_SESSION[$id] = $value;
                    }



                   echo '<script type="text/javascript">window.location = "home.php"</script>';
                }


                $_SESSION["username"] = $username;
                ?>

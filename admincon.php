 <?php
                      require_once "vendor/autoload.php";
 
                session_start();
            


                // Connection to DB
                $mongoClient = new MongoDB\Client();
                $db = $mongoClient->UsersInfo;
                $collection = $db->admin;


                $username = filter_input(INPUT_GET, 'log_admin_user', FILTER_SANITIZE_STRING);
                $pw = filter_input(INPUT_GET, 'log_admin_pw', FILTER_SANITIZE_STRING);


                $query = array('Username' => $username, 'Password' => $pw);

                $count = $collection -> findOne($query);
                if(!count($count)) {
                   echo "<script> alert('Incorrect Username/Password');window.location='admin_login.php'</script>";

                }
                else{
                    $_SESSION['admin_user'] = $username;
                    echo '<script type="text/javascript">window.location = "admin-page.php"</script>';
                }
                ?>
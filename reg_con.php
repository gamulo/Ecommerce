<?php
 require_once "vendor/autoload.php";

                // Starting Connection
                $mongoClient = new MongoDB\Client();
                $db = $mongoClient->UsersInfo;
                $collection = $db->Customers;
                //fetch data
                $username = filter_input(INPUT_GET, 'username', FILTER_SANITIZE_STRING);
                $pw = filter_input(INPUT_GET, 'password', FILTER_SANITIZE_STRING);
                $email = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_EMAIL);
                $firstname = filter_input(INPUT_GET, 'firstname', FILTER_SANITIZE_STRING);
                $lastname = filter_input(INPUT_GET, 'lastname', FILTER_SANITIZE_STRING);
                $address = filter_input(INPUT_GET, 'address', FILTER_SANITIZE_STRING);
                //Save query
                $query = array('email' => $email);

               
                $count = $collection -> findOne($query);

                if(!count($count)) {
                    //ADD CUSTOMER INFO
                    $user_reg_info = [
                        "Username" => $username,
                        "Password" => $pw,
                        "email" => $email,
                        "Firstname" => $firstname,
                        'Lastname' => $lastname,
                        "Address" => $address,
                    ];

                    $returnVal = $collection->insertOne($user_reg_info);

                   echo "<script> alert('Your Account has been successfully created! Please Sign In');window.location='login.php'</script>";
                
                }


                else {
                    //IF EMAIL ALREADY EXIST PROMPT
                    echo "<script> alert('Email already exist!');window.location='register.php'</script>";
                  
                };

            
                ?>
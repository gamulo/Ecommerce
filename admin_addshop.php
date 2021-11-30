<?php
            
 require_once "vendor/autoload.php";

                //Add Image 

                
                $error = 1;

                // Setting Directory
                $target_dir = "images/"; //FOLDER WHERE THE UPLOAD IMAGE STORE

        
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $product_name_img_id = "images/" . basename(basename($_FILES["fileToUpload"]["name"]));

                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "<script> alert('Shop Added Successfully');window.location='admin-page.php'</script>";
                    $error = 1;
                }
                else {
                      echo "<script> alert('Failed to Add Shop');window.location='admin-page.php'</script>";
                    $error = 0;
                };
                // Adding Product MongoDB ---------------------------------------------

                if ($error = 1) {


                    $mongoClient = new MongoDB\Client();
                    $db = $mongoClient->ShopsDetails;
                    $collection = $db->Shops;

                    $shop_name = filter_input(INPUT_POST, 'shop_name', FILTER_SANITIZE_STRING);
                    $product_url = $product_name_img_id;

                    $shop_reg_info = [
                        "Shop" => $shop_name,
                        "image_url" => $product_url,
                    ];

                    $returnVal = $collection->insertOne($shop_reg_info);

                  
                }
                else {
                     echo "<script> alert('Failed to Add Shop');window.location='admin-page.php'</script>";
                }
            
                ?>




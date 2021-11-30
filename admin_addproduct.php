 <?php
 require_once "vendor/autoload.php";

                //ADD IMAGE

                $error = 1; //CHECK IF THE IMAGE IS UPLOADED

                $target_dir = "images/";

                $target_file = $target_dir . basename($_FILES["file"]["name"]);


                $product_name_img_id = "images/" . basename(basename($_FILES["file"]["name"]));

                if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                     echo "<script> alert('Product Added Successfully');window.location='admin-page.php'</script>";
                    $error = 1;
                }
                else {
                   echo "<script> alert('Failed to Add Product');window.location='admin-page.php'</script>";
                    $error = 0;
                };

                //

                // Adding Product MongoDB ---------------------------------------------
                if ($error = 1) {

                    $mongoClient = new MongoDB\Client();
                    $db = $mongoClient->ShopsDetails;
                    $collection = $db->Products;


                    $shop_name = filter_input(INPUT_POST, 'shop_name', FILTER_SANITIZE_STRING);
                    $product_name = filter_input(INPUT_POST, 'prod_name', FILTER_SANITIZE_STRING);
                    $product_img = $product_name_img_id;
                    $product_price = filter_input(INPUT_POST, 'prod_price', FILTER_SANITIZE_NUMBER_INT);

                    $prod_reg_info = [
                        "Shop" => $shop_name,
                        "ProductName" => $product_name,
                        "Price" => $product_price,
                        "prodimage" => $product_img,
                    ];



                    $returnVal = $collection->insertOne($prod_reg_info);

                }
                else { //PRODUCT FAILED TO UPLOAD
                      echo "<script> alert('Failed to Add Product');window.location='admin-page.php'</script>";
                }
                ?>


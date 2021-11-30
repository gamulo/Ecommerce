<?php
Session_start();
if(isset($_SESSION['user']) || $POST['order details'] != null)  {
    

                 
                    require_once "vendor/autoload.php";
                    $dbdata = $_POST['order_details'];

                
                    $mongoClient = new MongoDB\Client();
                    $db = $mongoClient->Orders;
                    $collection = $db->Order_Info;


                    $decoded_array = json_decode($dbdata, true);

                  
                    $order_summary = [
                        "Firstname" => $decoded_array['Firstname'],
                        "Lastname" => $decoded_array['Lastname'],
                        "Address" => $decoded_array['Address'],
                        "Order_Items" => $decoded_array['Order Details']
                    ];


                  
                    $returnVal = $collection->insertOne($order_summary);
                    echo "<script> alert('Order Created!');window.location='home.php'</script>";
                

                    ?>

                    <script lang="javascript">


                        sessionStorage.clear();
                  </script>

<?php
}
?>
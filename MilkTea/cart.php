<?php
require "database.php";
// require "Model/Coffee.php";
// require "Model/Juice_Tea.php";
// require "Model/Milktea.php";
// require "Model/Smoothie.php";
// require "indexUser.php";

    session_start();

    $sql1 = "SELECT * from milkteas";
    $result1 = $db->query($sql1)->fetch_all() ;

    $sql = "SELECT * from cart";
    $result = $db->query($sql)->fetch_all(MYSQLI_ASSOC);

    $sql = "INSERT INTO cart () VALUES(null,'".$name."','".$price."','".$type."','image/".$image."')";
      $db->query($sql);

    $id = $_GET['id'];
    $milk= array();
    for($i = 0; $i < count($result); $i++) {

        if(isset($_SESSION['order'])){
            $milk = json_decode($_SESSION['order'],true);
            for($i = 0; $i < count($result); $i++) {
                if ( $result[$i]['id'] == $id) {
                  array_push($milk, new Coffee($result[$i]['id'], $result[$i]['name'], $result[$i]['price'],$result[$i]['image'],$result[$i]['quantity']));
                }
            }
        }
    
        if ( $result[$i]['id'] == $id) {
            array_push($milk, new Juice_Tea($result[$i]['id'], $result[$i]['name'], $result[$i]['price'],$result[$i]['image'],$result[$i]['quantity']));
        }
  
        if ( $result[$i]['id'] == $id) {
            array_push($milk, new MilkTea($result[$i]['id'], $result[$i]['name'], $result[$i]['price'],$result[$i]['image'],$result[$i]['quantity']));
        }

        if ( $result[$i]['id'] == $id) {
            array_push($milk, new Smoothie($result[$i]['id'], $result[$i]['name'], $result[$i]['price'],$result[$i]['image'],$result[$i]['quantity']));
        }
    }
        function sum($result){
            $sum=0;
            for($i = 0; $i < count($result); $i++) {
                $sum += (($result[$i]['price'])*($result[$i]['quantity']));
            }
            return $sum;
        }


    $_SESSION['cart'] = json_encode($milk);

   
    // if(isset($_POST["dele"])){
    //     echo "hahaha";
    //     $id = $_POST["dele"];
    //     echo $id;
    //     $sql = "DELETE from `milkteas` where id= ".$id;
    //     $db->query($sql);
    //     }

       
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<title></title>
<style type="text/css">
           
        .line{
                display: flex;
                width: 500px;
                justify-content: space-between;
                position: relative;
                margin: auto;
                align-items: center;
                text-align: center;
            }
            .btn{
                align-items: center;
                text-align: center;
                border-radius: 4px;
                background: red;
            }
            .ipt{
                height: 25px;
                weight: 100px;
            }
            .btn1{
                width: 100px;
                height: 30px;
                align-items: center;
                text-align: center;
                border-radius: 4px;
                background: red;
            }
            table,tr,th,td {
                border: black;
            }

            #tbl tr {
                height: 50px;
            }

            #tbl tr th {
                background: sandybrown;
                flex: 0 0 25%;
                font-size: 15px;
                color: lime;
                text-transform: capitalize;
                font-weight: 400;
                font-weight: bold;
            }

            #tbl tr td {
                text-align: center;
                padding-left: 10px;
            }

            #tbl {
                margin-right: 60px;
                flex-grow: 2;
                align-items: center;
                text-align: center;
                margin-top: 0px;
                margin-bottom: 0px;
            }

            .pay{
                width: 600px;
                position: relative;
                margin: auto;
                border-style: solid;
                border-width: 1px;
                border-radius: 5px;
                font-size: 20px;
                margin-top: 50px;
            }

            .pay h1{
                color: darkblue;
                font-weight: bold;
                font-size: 20px;
                text-align: center;
            }

            .pay p{
                color: black;
                font-size: 18px;
                text-align: left;
                margin-left: 100px;
            }

            .pay button{
                float: right;
                border-style: solid;
                border-width: 1px;
                border-color: black;
                background-color: white;
                color: white;
                font-weight: bold;
                font-size: 18px;
                margin-top: 20px;
            }

           
            .cart {
            position: relative;
            border: none;
            height: 30px;
            background: white;
            color: black;
            font-size: 15px;
        }

        .delete {
                border-width: 1px;
                background-color: red;
            }
        .delete:hover{
            border-color: black;
            color:whitesmoke;
        }  
        
        h1{
            text-align: center; 
            color: red;
            border-style: double;
            width: 75%;
            margin-left: 150px;
            background-color: black;
            border-radius: 10px;
            margin-top: 20px;
        }

        </style>
</head>
<body>
    <h1>MY SHOPING CART</h1>
    <table style="margin-top: 50px;width: 97%;margin-left: 15px;" id="tbl" class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Delete</th>
        </tr>
   
<?php
    $cart = json_decode($_SESSION['cart'],true);
    $cart = array();
   
    for($i = 0; $i < count($cart); $i++){
        ?>
        <tr>
            <form action="" method="POST">
        <th scope="row"><?php echo $i+1?></th>
          <td>
          <img width="100"src=<?php echo "image/".$cart[$i]['image']?>>
          </td>
          <td>
            <p><?php echo $milk[$i]['name'] ?></p>
          </td>
          <td>
            <p><?php echo $milk[$i]['price'] ?></p>
          </td>
          <td>
            <p><?php echo $milk[$i]['quantity'] ?></p>
            </td>
            <td>
            <p><?php echo (($milk[$i]['price'])*($milk[$i]['quantity'])) ?></p>
            </td>
          <td>
       
          <button name="dele" value="?id=<?php echo $new[$i]->id ?>"> Delete</button>
          </td>
           </form>
         </tr>
    <?php
        }
        ?>
   
   </table>
   <!-- </div>
    <div class="pay">
    <h1>CỘNG GIỎ HÀNG</h1>
    <p>Tạm tính: <?php echo sum($new);?></p>
    <p>Phí giao hàng: <?php echo (sum($new)*0.01);?></p>
    <p>Tổng: <?php echo (sum($new)+(sum($new)*0.01));?></p>
    <form action = "" method="post">
    <button style="text-align: center;" name="order">Thanh toán</button>
    </form>
    </div> -->

   <!-- <a style="text-decoration: none"href="index.php">Home</a>
    <a style="text-decoration: none"href="indexUser.php">UserHome</a> -->
</body>
</html>
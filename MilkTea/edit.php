<?php
	require 'database.php';

	if (isset($_POST['edit'])) {
      $id=$_POST['edit'];
      $image=$_POST['image'];
      $namePr=$_POST['namePr'];
      $price = $_POST['price'];
      $type = $_POST['type'];
       
      $sql1 = 'UPDATE products SET pro_name = "'.$namerp.'", pro_price='.$pricerp.' WHERE id='.$id;

      $db->query($sql1);
      header('location: indexAdmin.php');
      }
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">

		.container {
		  padding: 16px;
		  background-color: white;
		  width: 500px;
		  justify-content: center;
		  border-style: ridge;
		  align-items: center;
		}

		body{
		  margin-top: 50px;
		  align-items: center;
		  justify-content: center;
		  display: flex;
		}
	</style>
</head>
<body>
	<?php
        $sql = "SELECT * FROM milkteas ORDER BY id";

		$result = $db->query($sql)->fetch_all();
	?>
	<?php
		for($i = 0; $i < count($result); $i++){
	?>

	<form>
		<h2 style="text-align: center;" class="modal-title">Edit</h2>
		<div>
     		<label>Product Name</label>
      		<input type="text" name="namePr" value="<?php echo $result[$i][1]?>" class="name">
      	</div>
      	<div>
     		<label>Product Type</label>
      		<input type="text" name="typePr" value="<?php echo $result[$i][3]?>" class="type">
      	</div>
      	<div>
     		<label>Product Price</label>
      		<input type="text" name="pricePr" value="<?php echo $result[$i][2]?>" class="price">
      	</div>
      	<button name="edit" type="submit">Edit</button>
	</form>
	<?php
		}
	?>
</div>
</body>
</html>
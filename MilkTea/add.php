<?php
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="milktea.css">
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
	<form action="indexAdmin.php" method="post">
		<div class="container" style="background-color: brown">
			<h2 style="text-align: center">ADD PRODUCT</h2>
			<hr>
			<input type="file" name="img">
	      	<label><b style="margin-top: 30px">Name Product</b></label>
	        <input type="text" placeholder="Enter Product Name" name="namePr">

	        <label><b>Type Product</b></label>
	        <input type="text" placeholder="Enter Product Type" name="type">
	        <hr> 
	        <label><b>Price Product</b></label>
	        <input type="text" placeholder="Enter Product Price" name="price">
	        <hr>             
	        <form action="" method="post">
	        	<button style="margin-top: 10px" type="submit" name="add">ADD</button>
	        </form>
	    </div>
	</form>

</body>
</html>
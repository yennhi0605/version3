<?php
	require 'database.php';

	if (isset($_GET["detail"])) {
	    $id = $_GET['detail'];

		$sql = "SELECT * FROM milkteas WHERE id =" .$id. ";";
		$result = $db->query($sql)->fetch_all();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Detail</title>
	<link rel="stylesheet" type="text/css" href="milktea.css">
	<style type="text/css">
		 h1{
            text-align: center; 
            color: red;
            width: 100%;
            background-color: black;
            border-radius: 10px;
        }

        h2{
        	font-size: 40px;
        }

        h3{
        	font-size: 20px;
        	margin-left: 30px;
        }

		.flex2{
			justify-content: center;
			margin-left: 70px;
			align-items: center;
		}

		.content{
			justify-content: center;
			margin-left: 200px;
			align-items: center;
		}

		.detail-container{
		  padding: 16px;
		  background-color: white;
		  width: 500px;
		  justify-content: center;
		  border-style: round;
		  align-items: center;
		  margin-left: 400px;
		  background: black;
		  border-radius: 10px;
		  margin-top: 30px;
		  height: 700px;
		}

		button{
			margin-left: 20px;
			background: red;
			border-radius: 10px;
			border-color: black;
		}


	</style>
</head>
<body>
	<div class="header">
    <p>Liên hệ: Nguyễn Yến Nhi</p>
    <p>Địa chỉ: 101B Lê Hữu Trác, Sơn Trà Đà Nẵng</p>
    <p style="margin-right: 400px">Phone: 0354236247</p>
    <form action="index.php">
      <button name="logout" type="submit" style="background-color: red">Log out</button>
    </form>
  </div>

  <div class="slideshow-container" style="margin-top: 20px">
    <div class="mySlides fade">
      <img src="image/slide1.jpg" style="width:100%; height: 300px">
    </div>

    <div class="mySlides fade">
      <img src="image/slide2.jpg" style="width:100%; height: 300px">
    </div>

    <div class="mySlides fade">
      <img src="image/slide3.jpg" style="width:100%; height: 300px">
    </div>
  </div>
   
    <div class="menu">
      <div class="menu a">
        <a href="indexUser.php">TRANG CHỦ</a>
        <a href="Gioi Thieu">GIỚI THIỆU</a>
        <a href="Tin Tuc">TIN TỨC</a>
        <a href="Huong Dan">HƯỚNG DẪN ĐẶT HÀNG</a>
        <a href="Lien He">LIÊN HỆ</a>
      </div>
    </div>
	<div class="detail-container">
		<h1>DETAIL PRODUCT</h1>		
	        <?php
				for($i = 0; $i < count($result); $i++){
			?>			
		        <div class="flex2">
		            <img name="image" style="width: 350px; height: 340px;" src="<?php echo $result[$i][4];  ?>" >
		        </div>
	            <div class="content">
	                <h2 style="color: white" name="name"><?php echo $result[$i][1];?></h2>
	                <h3 style="color: sandybrown" name="type"><?php echo $result[$i][3];?></h3>
	                <h3 style="color: white" name="price"><?php echo $result[$i][2];?></h3>
	                <button class="btn btn-warning">Add to cart</button>
	            </div>
		
		    <?php
				}
			?>
	</div>

	<hr>
      <div class="footer">
        <div class="footer-lienhe">
          <h1 style="color: sandybrown">THÔNG TIN LIÊN HỆ</h1>
          <hr>
          <p>Địa Chỉ: 101B Lê Hữu Trác, Sơn Trà, Đà Nẵng</p>
          <p>Phone: 035 4236 247</p>
          <p>Facebook: Nguyễn Yến Nhi</p>
          <p>Email: nhi.nguyen@gmail.com</p>
        </div>
        <div class="footer-giaohang">
          <h1 style="color: sandybrown">CHÍNH SÁCH</h1>
          <hr>
          <p>Chính Sách Giao Hàng</p>
          <p>Chính Sách Vận CHuyển</p>
          <p>Chính Sách Thanh Toán</p>
          <p>Khách Hàng Thân Thiết</p>
        </div>
        <div class="footer-menu">
          <h1 style="color: sandybrown">MENU</h1>
          <hr>
          <p>Coffee</p>
          <p>Milk Tea</p>
          <p>Smoothie</p>
          <p>Juice/Tea</p>
        </div>
      </div>  

	<script type="text/javascript">
    
      var slideIndex = 0;
      showSlides();

      function showSlides() {

        var i;
        var slides = document.getElementsByClassName("mySlides");

          for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
          }

            slideIndex++;

          if (slideIndex > slides.length) {
            slideIndex = 1
          } 

          for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
          }

            slides[slideIndex-1].style.display = "block";         
            setTimeout(showSlides, 2000); 
      }
    </script>    
</body>
</html>

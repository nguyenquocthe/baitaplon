<!DOCTYPE html>
<html>
<head>
	<title>index</title>
     <link rel="stylesheet"  href="index.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<?php 
    session_start();
    if(isset($_SESSION['dangnhap'])){
    ?>
    <?php
    	include "models/home.php" ;   		
    ?>
    <?php
       }else{
       	echo "kkk";
       }
    ?>
     <div>
                  <?php
                include("block/menu.php");
                ?>
            </div>
    <div class="container" style="margin-top: 10px;" >
        <div id="indexx"> 
           
            <div >
                <?php
                include("models/chayanh.php")
                ?>
            </div>
    		<div style="width: 140px ; background-color: blue; color: red;border-radius: 0px 20px 20px 0px;border-left: 10px solid red ">
    			<h3 style="padding-left: 5px;">Trang Chủ</h3>
    		</div>
    		<h1 style=" color: blue">Các Quấn Sách Mới Nhất Của Thư Viện</h1>

    	<div  class="left">
    		

    		<?php
    		include "block/sachmoinhat.php";
    		?>
    	
    	</div>
    	<div class="right">
    		<?php
    		include "block/caacsachmoitieptheo.php";
    		?>
    	</div>
        <div class="clear">
        </div>
        <div>
            
        </div>
        <div class="thongbao">
            <h1> <i class="fa fa-bell-slash" style="font-size:36px ;color:white"></i>Thông báo mới </h1>
        </div>
        <div >
            <?php
            include ('block/thongbao.php');
            ?>
            
        </div>
       </div>
    </div>
     <div class="container">   
            <?php   
            include('block/footer.php');
            ?>
    </div>
</body>
</html>
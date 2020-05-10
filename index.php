<?php
   
   session_start();
   include('config/db.php');
   $status="";
   if (isset($_POST['code']) && $_POST['code']!=""){
   $code = $_POST['code'];
   $result = mysqli_query($con,"SELECT * FROM `products` WHERE `code`='$code'");
   $row = mysqli_fetch_assoc($result);
   $name = $row['name'];
   $code = $row['code'];
   $price = $row['price'];
   $image = $row['image'];
   
   $cartArray = array(
   	$code=>array(
   	'name'=>$name,
   	'code'=>$code,
   	'price'=>$price,
   	'quantity'=>1,
   	'image'=>$image)
   );
   
   if(empty($_SESSION["shopping_cart"])) {
   	$_SESSION["shopping_cart"] = $cartArray;
   	$status = "<div class='box'>Product is added to your cart!</div>";
   }else{
   	$array_keys = array_keys($_SESSION["shopping_cart"]);
   	if(in_array($code,$array_keys)) {
   		$status = "<div class='box' style='color:red;'>
   		Product is already added to your cart!</div>";	
   	} else {
   	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
   	$status = "<div class='box'>Product is added to your cart!</div>";
   	}
   
   	}
   }
   ?>
<html>
   <head>
	  <title>Shopping Cart in php: Real Programmer</title>
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
   </head>
   <body>
	   <?php include('nav.php'); ?>
      <div style="width:700px; margin:50 auto;">
		 <h2>Shopping Cart using PHP and MySQL</h2>
		 <br>
		 <div style="clear:both;"></div>
		 <?php if(!empty($status)){
			 echo '<div class="alert alert-success" role="alert">'.$status.'</div>';
		 } ?>
		 
         <?php
            if(!empty($_SESSION["shopping_cart"])) {
            $cart_count = count(array_keys($_SESSION["shopping_cart"]));
            ?>
         <div class="cart_div">
            <a href="cart.php"><img src="cart-icon.png" /> Cart<span><?php echo $cart_count; ?></span></a>
         </div>
         <?php
            }
            
            $result = mysqli_query($con,"SELECT * FROM `products`");
            while($row = mysqli_fetch_assoc($result)){
            		echo "<div class='product_wrapper'>
            			  <form method='post' action=''>
            			  <input type='hidden' name='code' value=".$row['code']." />
            			  <div class='image'><img src='".$row['image']."' /></div>
            			  <div class='name'>".$row['name']."</div>
            		   	  <div class='price'>$".$row['price']."</div>
            			  <button type='submit' class='buy'>Add Cart</button>
            			  </form>
            		   	  </div>";
                    }
            mysqli_close($con);
            ?>
      </div>
   </body>
</html>
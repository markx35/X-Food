<!doctype html>
<html>
<h5 style="font-size:60px;text-align: center;">X_FOOD</h5>
	<head>
		<meta charset="utf-8">
		<!-- 5/25/18 JG DEL1L: <link rel="stylesheet" href="/jokes.css"> -->
		<link rel="stylesheet" href="jokes.css"> <!-- <!--5/25/18 JG NEW1L: otherwise it will not display layout -->
		<title><?=$title?></title>
	</head>
	<body>
	<nav>
	<div class="blue-bg"></div>
<div class="white-bg shadow"></div>
<div class="content">
		<ul>
		<!--5/25/18 JG NEW8L: replacement adapter -->
	  <li><a href="index.php">Home</a></li>
	  <!--5/25/22 yxie new joke web -->
	  <li><a href="index.php?joke/joke">Menu</a></li>
      <li><a href="index.php?joke/list">Order Histroy</a></li>
      <li><a href="index.php?joke/edit">Add Order</a></li>
	    <?php if ($loggedIn): ?>    
	    <li><a href="index.php?logout">Log out</a></li>
		<?php else: ?>
		<li><a href="index.php?login">Log in</a></li>
		<?php endif; ?>
              
         <!--5/25/18 JG DEL8L: DEL b/c of .htaccess is ignored by Apache 
      <li><a href="/">Home</a></li>
      <li><a href="/joke/list">jokes List</a></li>
      <li><a href="/joke/edit">Add a new joke</a></li>
    	<//     ?php if ($loggedIn): ?>
	    <li><a href="/logout">Log out</a></li>
		<//  ?php else: ?>
		<li><a href="/login">Log in</a></li>
		<//  ?php endif; ?>
		-->
		</ul>
	</nav>
	<main>
	<?=$output?>
	</main>

	<footer>
	&copy; Yantao Xie 2022 CS320
	</footer>
	</body>
</html>
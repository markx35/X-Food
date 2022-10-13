<?php if (empty($joke['id']) || $userId == $joke['authorId']): 
//print ('endjoke.html.php: 3 joke id = ' . $joke['id']. '<br>');  // JG test
//print ('endjoke.html.php: 4 $userId= ' . $userId. '== authorId ='.$joke['authorId']. '<br>');  // JG test
$db = mysqli_connect("localhost", "ijdb_sample", "mypassword", "xfood");
?>
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
</head>
<!-- yxie MOD use the form to place the order-->
<form name='form1' action="" method="post">
	<input type="hidden" name="joke[id]" value="<?=$joke['id'] ?? ''?>">
    <label for="joketext">Type your Order here:</label>
    <textarea style=width:1000px;
  resize: none;id="joketext" name="joke[joketext]" rows="4" cols="40"><?=$joke['joketext'] ?? ''?> </textarea>
    <input type="submit" name="submit" value="Order">
</form>
<body class="home">
    <!-- Popular block starts -->
    <section class="popular">
        <div class="container">
            <div class="row">
                <?php
                //yxie New 10L fetch records from database to display popular first 3 dishes from table
                $query_res = mysqli_query($db, "select * from dishes");
                while ($r = mysqli_fetch_array($query_res)) {
                    echo '  <div class="col-xs-12 col-sm-6 col-md-4 food-item">
					<div class="food-item-wrap">
					<div class="figure-wrap bg-image" data-image-src="dishes/' . $r['img'] . '">
					</div>
					<div class="content">
					<h5><a href="index.php?joke/edit">' . $r['title'] . '</a></h5>
					<div class="product-name">' . $r['slogan'] . '</div>
					<div class="price-btn-block"> <span class="price">$' . $r['price'] . '</span>
                    </div>
					</div>									
					</div>
					</div>';
                }
                ?>
            </div>
        </div>
    </section>
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>
<!-- 05-12-22 yxie create a post form to output the joke and submit to save---->
<?php else: ?>
<p>You may only edit jokes that you posted.</p>
<?php endif; ?>
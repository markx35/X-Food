<!DOCTYPE html>
<html lang="en">
<?php
$db = mysqli_connect("localhost", "ijdb_sample", "mypassword", "xfood");
?>
<head><!-- yxie New 14 L Bootstrap core CSS -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- yxie New The above 3 meta tags *must* come first in the head-->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body class="home">
    <!-- Popular block starts -->
    <section class="popular">
        <div class="container">
            <div class="title text-xs-center m-b-30">
                <h2>Skip the Line Place your order here</h2>
            </div>
            <div class="row">
                <?php
                // yxie New 18L fetch records from database to display all dishes from table
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
                     <a href="index.php?joke/edit" class="btn theme-btn-dash pull-right">Order Now</a> </div>
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

</html>
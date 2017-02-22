<?php
session_start();
require 'connect.php';

$meSql = "SELECT * FROM products where type = '0'";
$meQuery = mysqli_query($meConnect,$meSql);

$aaSql = "SELECT * FROM products where type = '1'";
$aaQuery = mysqli_query($meConnect,$aaSql);

$action = isset($_GET['a']) ? $_GET['a'] : "";
$itemCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
if(isset($_SESSION['qty'])){
    $meQty = 0;
    foreach($_SESSION['qty'] as $meItem){
        $meQty = $meQty + $meItem;
    }
}else{
    $meQty=0;
}

?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Salad mood</title>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Kanit:300,400,500&amp;subset=thai" rel="stylesheet">
</head>

<body>

  <header >
  <section class="head-content">

    <a class="logo" href="index.php">
      <img src="img/logo.svg" height="50px">
      <!-- </svg> -->
    </a>

  <div class="header-navigation responsive-header">
    <div class="center-menu-content">
      <div class="close-about-section">
        <svg class="svg-close" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100" height="100" viewBox="0 0 1024 1024">
          <g id="icomoon-ignore">
          </g>
          <path d="M626.784 512.032l195.072 195.072c12.672 12.672 12.672 33.248 0 45.92l-68.832 68.832c-12.672 12.672-33.216 12.672-45.92 0l-195.104-195.072-195.104 195.072c-12.672 12.672-33.216 12.672-45.888 0l-68.864-68.832c-12.672-12.672-12.672-33.216 0-45.92l195.104-195.072-195.104-195.104c-12.672-12.672-12.672-33.248 0-45.92l68.896-68.832c12.672-12.672 33.216-12.672 45.888 0l195.072 195.104 195.104-195.104c12.672-12.672 33.216-12.672 45.92 0l68.832 68.864c12.672 12.672 12.672 33.216 0 45.92l-195.072 195.072z"></path>
        </svg>
      </div>
      <nav>
        <ul>
          <li><a href="#">หน้าแรก</a></li>
          <li><a href="default.asp" class="active">สั่งอาหาร</a></li>
          <li><a href="#">ติดต่อเรา</a></li>
          <li><a href="cart.php"><i class="fa fa-shopping-basket"></i>  ((<?php echo $meQty; ?>))</a></li>
        </ul>
      </nav>
    </div>
  <!-- </div>header-navigation responsive-header -->
  </section>
  </header>
  <!-- menu bar -->

  <div class="line"></div>

  <div style="width:100%; max-width:1024px; height:350px; background:#000; margin:30px auto 0 auto;">

    <img src="img/slide.jpg" width="100%" height="350px">
  </div>

  <div class="menu-tab"><!-- Tab -->
  <ul class="tablist" role="tablist">
    <li class="tab" role="tab"><a href="#panel1">เมนูอาหาร</a></li>
    <li class="tab" role="tab"><a href="#panel2">เครื่องดื่ม</a></li>

    <li class="tab-menu">
      <div class="line"></div>
      <div class="line"></div>
      <div class="line"></div>
    </li>
  </ul>

  <div class="tabpanel" id="panel1" role="tabpanel">
    <?php
          while ($meResult = mysqli_fetch_assoc($meQuery))
              {
                  ?>
    <div class="container">
      <img src="img/<?php echo $meResult['image']; ?>" class="image">
      <div class="middle">
        <h2><?php echo $meResult['name']; ?></h2>
        <?php echo number_format($meResult['price'],2); ?> บาท
        <a class="button" href="updatecart.php?itemId=<?php echo $meResult['id']; ?>">Add to cart</a>
      </div>
    </div>
    <?php
                       }
                       ?>
  </div>

  <div class="tabpanel" id="panel2" role="tabpanel">

    <?php
          while ($meResult = mysqli_fetch_assoc($aaQuery))
              {
                  ?>
    <div class="container">
      <img src="img/<?php echo $meResult['image']; ?>" class="image">
      <div class="middle">
        <h2><?php echo $meResult['name']; ?></h2>
        <?php echo number_format($meResult['price'],2); ?> บาท
        <a class="button" href="updatecart.php?itemId=<?php echo $meResult['id']; ?>">Add to cart</a>
      </div>
    </div>
    <?php
                       }
                       ?>

  </div>


  </div><!-- END Tab -->



  <footer>
    <div class="line" style="margin: 0 auto; "></div>
    <div class="contact">
      <div class="boxleft" style="text-align:left;">
        <div class="boxlogo"><img src="img/logo.svg" height="50px"></div>
        <div class="boxdetail">
        ร้านสลัดมู๊ด<br>
        ถนนบางแสน สาย4 ใต้ ตำบลแสนสุข<br>
        อำเภอเมือง จังหวัดชลบุรี<br>
        โทร 094 546 9380
        </div>

      </div>
      <div class="boxright" style="text-align:right;">
        ติดตามเราได้ที่<br>
        <a href="www.fb.com/saladmood"><i class="fa fa-facebook-square"></i>&nbsp&nbsp
        <a href="#"><i class="fa fa-instagram"></i>&nbsp&nbsp
        <a href="#"><i class="fa fa-youtube-play"></i>
      </div>

    </div>
  </footer>

  <script src="js/index.js"></script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='https://use.fontawesome.com/7fcc5972f1.js'></script>
</body>

</html>


<?php
mysqli_close($meConnect);
?>

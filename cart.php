<?php
session_start();
require 'connect.php';

$action = isset($_GET['a']) ? $_GET['a'] : "";
$itemCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
if (isset($_SESSION['qty']))
{
    $meQty = 0;
    foreach ($_SESSION['qty'] as $meItem)
    {
        $meQty = $meQty + $meItem;
    }
} else
{
    $meQty = 0;
}
if (isset($_SESSION['cart']) and $itemCount > 0)
{
    $itemIds = "";
    foreach ($_SESSION['cart'] as $itemId)
    {
        $itemIds = $itemIds . $itemId . ",";
    }
		$inputItems = rtrim($itemIds, ",");
    $meSql = "SELECT * FROM products WHERE id in ({$inputItems})";
    $meQuery = mysqli_query($meConnect,$meSql);
    $meCount = mysqli_num_rows($meQuery);


} else
{

    $meCount = 0;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Salad Mood - Cart</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
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
          <li><a href="index.php">สั่งอาหาร</a></li>
          <li><a href="#">ติดต่อเรา</a></li>
          <li><a href="default.asp" class="active"><i class="fa fa-shopping-basket"></i>  ((<?php echo $meQty; ?>))</a></li>
        </ul>
      </nav>
    </div>
  <!-- </div>header-navigation responsive-header -->
  </section>
  </header>
  <!-- menu bar -->


  <div class="line"></div>



  <div class="wrap cf">
    <div class="heading cf">
      <h1>My Cart</h1>
      <a href="index.php" class="continue">Continue Shopping</a>
    </div>
    <?php

                if ($meCount == 0)
                {
                    echo "<div class=\"cart-pay\">ไม่มีสินค้าอยู่ในตะกร้า</div>";
                } else
                {
                    ?>
    <form action="updatecart.php" method="post" name="fromupdate">

    <div class="cart">


      <ul class="cartWrap">

				<?php
                            $total_price = 0;
                            $num = 0;
                            while ($meResult = mysqli_fetch_assoc($meQuery))
                            {
                                $key = array_search($meResult['id'], $_SESSION['cart']);
                                $total_price = $total_price + ($meResult['price'] * $_SESSION['qty'][$key]);
                                ?>

        <li class="items even">
         <div class="infoWrap">
          <div class="cartSection">
          <img src="img/<?php echo $meResult['image']; ?>" alt="" class="itemImg" />

					<h3><?php echo $meResult['name']; ?></h3>
						<p class="itemNumber"><?php echo $meResult['detail']; ?></p>
            <br>

            <p style="font-size: 16px; color:#9bca42; margin-top: 5px;">จำนวน <input type="number" name="qty[<?php echo $num; ?>]" value="<?php echo $_SESSION['qty'][$key]; ?>" class="form-control" style="width: 60px;text-align: center;">
                                                ชิ้น<input type="hidden" name="arr_key_<?php echo $num; ?>" value="<?php echo $key; ?>"></a>



          </div>
          <div class="prodTotal cartSection">
            <p><?php echo number_format(($meResult['price']*$_SESSION['qty'][$key]),2); ?></p>
          </div>
                <div class="cartSection removeWrap">
             <a href="removecart.php?itemId=<?php echo $meResult['id']; ?>" role="button"
               class="deletebtn">x</a>
          </div>
        </div>
        </li>

				<?php
			                                $num++;
			                            }
			                            ?>

      </ul>
    </div>

    <div class="subtotal cf">
      <ul>
          <li class="totalRow final"><span class="value" style="color:red; font-size:30px; margin-right:80px; float:right;">
            Total:&nbsp<?php echo number_format($total_price,2);?>&nbspบาท</span></li>
            <li class="totalRow">
            <button type="submit" class="btn continue" style="height: 54px; font-size: 16px; margin-top:30px;">คำนวณราคาใหม่</button>
            <a href="order.php" class="btn continue" style="margin-top:30px;">สั่งซื้อ</a>
          </li>
      </ul>

    </div>
  </form>

  <?php
        }
        ?>
  </div>




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

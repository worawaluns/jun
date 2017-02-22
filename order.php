<?php
session_start();
require 'connect.php';

$action = isset($_GET['a']) ? $_GET['a'] : "";
$itemCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
$_SESSION['formid'] = sha1('' . microtime());
if (isset($_SESSION['qty'])) {
	$meQty = 0;
	foreach ($_SESSION['qty'] as $meItem) {
		$meQty = $meQty + $meItem;
	}
} else {
	$meQty = 0;
}
if (isset($_SESSION['cart']) and $itemCount > 0) {
	$itemIds = "";
	foreach ($_SESSION['cart'] as $itemId) {
		$itemIds = $itemIds . $itemId . ",";
	}
	$inputItems = rtrim($itemIds, ",");
	$meSql = "SELECT * FROM products WHERE id in ({$inputItems})";
	$meQuery = mysqli_query($meConnect,$meSql);
	$meCount = mysqli_num_rows($meQuery);
} else {
	$meCount = 0;
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

  <script type="text/javascript">
      function updateSubmit(){
          if(document.formupdate.order_fullname.value == ""){
              alert('โปรดใส่ชื่อนามสกุล');
              document.formupdate.order_fullname.focus();
              return false;
          }
              if(document.formupdate.order_address.value == ""){
              alert('โปรดใส่ที่อยู่');
              document.formupdate.order_address.focus();
              return false;
          }
              if(document.formupdate.order_phone.value == ""){
              alert('โปรดใส่หมายเลขโทรศัพท์');
              document.formupdate.order_phone.focus();
              return false;
          }
          document.formupdate.submit();
          return false;
      }
  </script>

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

  <div class="result">

    <div class="top">
      รายการสั่งซื้อ
    </div>
    <form action="updateorder.php" method="post" name="formupdate" role="form" id="formupdate" onsubmit="JavaScript:return updateSubmit();">

    <div class="under">

      <div class="detail">
        กรุณาระบุข้อมูลการจัดส่ง
        <div class="boxdelivey" style="margin-top: 20px;">
          <div class="boxname">ชื่อผู้จัดส่ง</div>
          <input type="text" class="boxinput" name="order_fullname" placeholder="ชื่อ-นามสกุล" id="order_fullname">
        </div>

        <div class="boxdelivey">
          <div class="boxname">ที่อยู่</div>
          <input type="text" class="boxinput" name="order_address" placeholder="ที่่อยู่" id="order_address">
        </div>

        <div class="boxdelivey">
          <div class="boxname">เบอร์โทรศัพท์</div>
          <input type="text" class="boxinput" name="order_phone" placeholder="เบอร์โทรศัพท์" id="order_phone">
        </div>

        <div class="boxdelivey">
          <div class="boxname">ข้อมูลเพิ่มเติม</div>
          <textarea type="text" class="boxinput" name="order_more" placeholder="ข้อมูลเพิ่มเติม" id="order_more"></textarea>
        </div>
      </div>
      <?php
                 {
          ?>
      <div class="order">
        รายละเอียดสินค้า

        <?php
                    $total_price = 0;
                    $num = 0;
                    while ($meResult = mysqli_fetch_assoc($meQuery))
                    {
                        $key = array_search($meResult['id'], $_SESSION['cart']);
                        $total_price = $total_price + ($meResult['price'] * $_SESSION['qty'][$key]);
                        ?>

        <div class="cart" style="padding: 20px 0 5px 0; background-color:#fafafa;">
          <ul class="cartWrap">

            <li class="items even" style="padding:0; margin:0;">
             <div class="infoWrap" style="padding:0; margin:0;">
              <div class="cartSection" style="padding-left: 20px;">
                <img src="img/<?php echo $meResult['image'];?>" alt="" class="itemImg2" style="width: 75px;"/>
              </div>
              <div class="prodTotal cartSection">
                <h5><?php echo $meResult['name'];?> (<?php echo $_SESSION['qty'][$key]; ?> ชิ้น)
                  <input type="hidden" name="qty[]" value="<?php echo $_SESSION['qty'][$key]; ?>" />
                  <input type="hidden" name="product_id[]" value="<?php echo $meResult['id']; ?>" />
                  <input  type="hidden" name="product_price[]" value="<?php echo $meResult['price']; ?>" />
                </h5>

                <p><?php echo number_format(($meResult['price'] * $_SESSION['qty'][$key]), 2); ?></p>
              </div>
            </div>


                </li>

              </ul>
            </div>

            <?php
                                           $num++;
                                           }
                                       ?>

            <div class="subtotal cf" style="width:80%; margin-top: 50px;">
              <ul>
                  <li class="totalRow final"><span class="value" style="color:red; font-size:30px; margin-right:92px; float:right;">
                    Total:&nbsp<?php echo number_format($total_price, 2); ?>&nbspบาท</span></li>
                  <li class="totalRow">


                    <a href="cart.php" class="btn continue" style="margin-top:10px; width:65px; height:15px; font-size:14px; padding-top: 10px; float:left; margin-left:70px;">ย้อนกลับ</a>
                    <button type="submit" class="btn continue" style="width: 132px; height: 40px; font-size: 14px; margin-top:10px; float:right;">สั่งซื้อ</button>
                  </li>

              </ul>

            </div>


  </form>

  <?php
  }
?>
      </div><!-- order -->

    </div><!-- under -->
  </div><!-- result -->




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


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
          if(document.formupdate.name.value == ""){
              alert('โปรดใส่ชื่อนามสกุล');
              document.formupdate.name.focus();
              return false;
          }
              if(document.formupdate.address.value == ""){
              alert('โปรดใส่ที่อยู่');
              document.formupdate.address.focus();
              return false;
          }
              if(document.formupdate.phone.value == ""){
              alert('โปรดใส่หมายเลขโทรศัพท์');
              document.formupdate.phone.focus();
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
          <input type="text" class="boxinput" name="name" placeholder="ชื่อ-นามสกุล">
        </div>

        <div class="boxdelivey">
          <div class="boxname">ที่อยู่</div>
          <input type="text" class="boxinput" name="address" placeholder="ที่่อยู่">
        </div>

        <div class="boxdelivey">
          <div class="boxname">เบอร์โทรศัพท์</div>
          <input type="text" class="boxinput" name="phone" placeholder="เบอร์โทรศัพท์">
        </div>

        <div class="boxdelivey">
          <div class="boxname">ข้อมูลเพิ่มเติม</div>
          <textarea type="text" class="boxinput" name="more" placeholder="ข้อมูลเพิ่มเติม"></textarea>
        </div>
      </div>

      <div class="order">
        รายละเอียดสินค้า

        <div class="cart" style="padding: 20px 0 5px 0; background-color:#fafafa;">
          <ul class="cartWrap">

            <li class="items even" style="padding:0; margin:0;">
             <div class="infoWrap" style="padding:0; margin:0;">
              <div class="cartSection" style="padding-left: 20px;">
                <img src="img/20.jpg" alt="" class="itemImg2" style="width: 75px;"/>
              </div>
              <div class="prodTotal cartSection">
                <h5>NAME (AMOuNT)</h5>

                <p>PRICE</p>
              </div>
            </div>


                </li>

              </ul>
            </div>

            <div class="subtotal cf" style="width:80%; margin-top: 50px;">
              <ul>
                  <li class="totalRow final"><span class="value" style="color:red; font-size:30px; margin-right:92px; float:right;">
                    Total:&nbsp.....&nbspบาท</span></li>
                  <li class="totalRow">


                    <a href="cart.php" class="btn continue" style="margin-top:10px; width:65px; height:15px; font-size:14px; padding-top: 10px; float:left; margin-left:70px;">ย้อนกลับ</a>
                    <button type="submit" class="btn continue" style="width: 130px; height: 40px; font-size: 14px; margin-top:10px; float:right;">สั่งซื้อ</button>
                  </li>

              </ul>

            </div>


  </form>
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

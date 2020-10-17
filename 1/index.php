<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>โปรแกรมคำนวณค่าน้ำประปา</title>
  </head>
  <body>
    <?php
      error_reporting(0);
      $sizewater = $_POST['sizewater'];
      $wateruse = $_POST['wateruse'];
      $waterprice = array(10.2, 16.0, 19.0, 21.2, 21.6);
      $unitprice = array(10, 10, 10, 20);

      if($wateruse >= 1 && $wateruse <= 10) {
        $unit = $wateruse;
        $waterpay = $waterprice[0] * $unit;
        $line = 1;
      }
      elseif($wateruse >= 11 && $wateruse <= 20) {
        $unit = $wateruse - 10;
        $waterpay = $waterprice[1] * $unit + 102;
        $line = 2;
      }
      elseif($wateruse >= 21 && $wateruse <= 30) {
        $unit = $wateruse - 20;
        $waterpay = $waterprice[2] * $unit + 262;
        $line = 3;
      }
      elseif($wateruse >= 31 && $wateruse <= 50) {
        $unit = $wateruse - 30;
        $waterpay = $waterprice[3] * $unit + 452;
        $line = 4;
      }
      elseif($wateruse > 50) {
        $unit = $wateruse - 50;
        $waterpay = $waterprice[4] * $unit + 876;
        $line = 5;
      }

      if($sizewater == "1/2") {
        $serviceprice = 30;
      }
      elseif($sizewater == "3/4") {
        $serviceprice = 50;
      }
      elseif($sizewater == "1") {
        $serviceprice = 60;
      }
      elseif($sizewater == "1 1/2") {
        $serviceprice = 90;
      }
      elseif($sizewater == "2") {
        $serviceprice = 350;
      }

      $tax = ($waterpay + $serviceprice) * (7 / 100);
      $netpay = $waterpay + $serviceprice + $tax;
    ?>

    <table border="0" width="80%" align="center">
      <tr>
        <td><img src="banner-water-cal-desktop.jpg" alt="" width="100%"></td>
      </tr>
      <tr>
        <td>
          <h3>โปรแกรมคำนวณค่าน้ำประปา การประปาส่วนภูมิภาค</h3>
          <form class="" action="" method="post">
          <table border="0" align="center" width="500px" cellpadding="3">
            <tr>
              <td><strong>ขนาดมาตรวัดน้ำ :</strong><br>&nbsp;</td>
              <td>
                <select class="" name="sizewater">
                  <option value="1/2" <?php if($sizewater == "1/2") echo "selected"; ?>>1/2</option>
                  <option value="3/4" <?php if($sizewater == "3/4") echo "selected"; ?>>3/4</option>
                  <option value="1" <?php if($sizewater == "1") echo "selected"; ?>>1</option>
                  <option value="1 1/2" <?php if($sizewater == "1 1/2") echo "selected"; ?>>1 1/2</option>
                  <option value="2" <?php if($sizewater == "2") echo "selected"; ?>>2</option>
                </select><br>
                <font size="2">นิ้ว</font>
              </td>
            </tr>
            <tr>
              <td><strong>ปริมาณการใช้น้ำ :</strong><br>&nbsp;</td>
              <td><input type="text" name="wateruse" value="<?php echo $wateruse;?>" required><br>
                <font size="2">ลูกบาศก์เมตร</font>
              </td>
            </tr>
            <tr>
              <td></td>
              <td><input type="text" name="chk" value="1" hidden><input type="submit" name="" value="คำนวณ"></td>
            </tr>
          </table>
          </form>

          <br><br>
          <?php
            if(isset($_POST['chk'])) {
          ?>
          <font size="2" style="margin-left: 5%;">อัตราค่าน้ำประปา</font><br><br>
          <table border="1" width="90%" cellspacing="0" align="center" cellpadding="3">
            <tr>
              <th>ราค่าต่อหน่วย<br>(บาท)</th>
              <th>คูณ</th>
              <th>หน่วยน้ำที่ใช้<br>(ลบ.ม)</th>
              <th>เป็นเงินทั้งสิ้น<br>(บาท)</th>
            </tr>
            <?php
              for($i=0;$i<$line;$i++) {
                echo "<tr>";
                if($i<$line-1) {
                  echo "<td>".number_format($waterprice[$i], 2)."</td/>";
                  echo "<td align='center'>x</td/>";
                  echo "<td align='center'>".$unitprice[$i]."</td/>";
                  echo "<td align='right'>".number_format($waterprice[$i] * $unitprice[$i], 2)." บาท</td/>";
                }
                else {
                  echo "<td>".number_format($waterprice[$i], 2)."</td/>";
                  echo "<td align='center'>x</td/>";
                  echo "<td align='center'>".$unit."</td/>";
                  echo "<td align='right'>".number_format($waterprice[$i] * $unit, 2)." บาท</td/>";
                }
              }
            ?>
            <tr>
              <td colspan="3">รวมค่าน้ำ</td>
              <td align='right'><?php echo number_format($waterpay, 2) ?> บาท</td>
            </tr>
            <tr>
              <td colspan="3">ค่าบริการทั่วไป</td>
              <td align='right'><?php echo number_format($serviceprice, 2) ?> บาท</td>
            </tr>
            <tr>
              <td colspan="3">ค่าภาษีมูลค่าเพิ่ม (7%)</td>
              <td align='right'><?php echo number_format($tax, 2) ?> บาท</td>
            </tr>
            <tr>
              <td colspan="3">รวมเป็นเงินทั้งสิ้น</td>
              <td align='right'><?php echo number_format($netpay, 2) ?> บาท</td>
            </tr>
          </table>
          <br><br>
          <?php
            }
          ?>

        </td>
      </tr>
    </table>
  </body>
</html>

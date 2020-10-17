<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ผลคำนวนค่าใช้บริการแท็กซี่</title>
  </head>
  <body>
    <?php
      $money = $_POST['money'];
      $firstcost = 35;
      $cost = $_POST['cost'];
      $distance = $_POST['distance'];

      $total = $firstcost + ($cost * $distance);
      $change = $money - $total;

      $t100 = 0;
      $t50 = 0;
      $t20 = 0;
      $t10 = 0;
      $t5 = 0;
      $t2 = 0;
      $t1 = 0;
      if($change > 0) {
        $tmp = $change;
        while($tmp > 0) {
          if($tmp >= 100) {
            $t100++;
            $tmp -= 100;
          }
          elseif($tmp >= 50) {
            $t50++;
            $tmp -= 50;
          }
          elseif($tmp >= 20) {
            $t20++;
            $tmp -= 20;
          }
          elseif($tmp >= 10) {
            $t10++;
            $tmp -= 10;
          }
          elseif($tmp >= 5) {
            $t5++;
            $tmp -= 5;
          }
          elseif($tmp >= 2) {
            $t2++;
            $tmp -= 2;
          }
          else {
            $t1++;
            $tmp -= 1;
          }
        }
      }
    ?>

    <div style="width: 600px; margin-left: 30%; margin-top: 25px">
    <fieldset>
      <legend><strong>ผลคำนวนค่าใช้บริการแท็กซี่่</strong></legend>
      <table border="0" width="95%" cellpadding="3" align="center">
        <tr>
          <td align="right"><strong>จำนวนเงินของคุณ : </strong></td>
          <td><input type="text" name="money" value="<?php echo $money; ?>" readonly></td>
        </tr>
        <tr>
          <td align="right"><strong>ค่าบริการเริ่มแรก : </strong></td>
          <td><input type="text" name="cost" value="<?php echo $firstcost; ?>" readonly></td>
        </tr>
        <tr>
          <td align="right"><strong>ค่าบริการ(ต่อ กิโลเมตร) : </strong></td>
          <td><input type="text" name="cost" value="<?php echo $cost; ?>" readonly></td>
        </tr>
        <tr>
          <td align="right"><strong>ระยะทางทั้งหมด : </strong></td>
          <td><input type="text" name="distance" value="<?php echo $distance; ?>" readonly></td>
        </tr>
      <tr>
        <td colspan="2"><hr></td>
      </tr>
        <tr>
          <td align="right"><strong>ค่าใช้บริการทั้งหมด : </strong></td>
          <td><input type="text" name="" value="<?php echo $total; ?>" readonly></td>
        </tr>
        <?php
          if($change >= 0) {
            echo "<tr bgcolor='green'>";
            echo "<td align='right'>";
            echo "<strong>คุณได้รับเงินทอน : </strong>";
          }
          else {
            $change = abs($change);
            echo "<tr bgcolor='red'>";
            echo "<td align='right'>";
            echo "<strong>เงินคุณไม่พอ กรุณาเพิ่มเงินอีก : </strong>";
          }
          echo "</td>";
          echo "<td><input type='text' value='$change' readonly></td>";
          echo "</tr>";
          if($change > 0) {
            if($t100 > 0) {
              echo "<tr><td align='right'><strong>คุณได้รับธนบัตร 100 บาท จำนวน : </strong></td>";
              echo "<td><input type='text' value='$t100' readonly><strong> ใบ</strong></td></tr>";
            }
            if($t50 > 0) {
              echo "<tr><td align='right'><strong>คุณได้รับธนบัตร 50 บาท จำนวน : </strong></td>";
              echo "<td><input type='text' value='$t50' readonly><strong> ใบ</strong></td></tr>";
            }
            if($t20 > 0) {
              echo "<tr><td align='right'><strong>คุณได้รับธนบัตร 20 บาท จำนวน : </strong></td>";
              echo "<td><input type='text' value='$t20' readonly><strong> ใบ</strong></td></tr>";
            }
            if($t10 > 0) {
              echo "<tr><td align='right'><strong>คุณได้รับเหรียญ 10 บาท จำนวน : </strong></td>";
              echo "<td><input type='text' value='$t10' readonly><strong> เหรียญ</strong></td></tr>";
            }
            if($t5 > 0) {
              echo "<tr><td align='right'><strong>คุณได้รับเหรียญ 5 บาท จำนวน : </strong></td>";
              echo "<td><input type='text' value='$t5' readonly><strong> เหรียญ</strong></td></tr>";
            }
            if($t2 > 0) {
              echo "<tr><td align='right'><strong>คุณได้รับเหรียญ 2 บาท จำนวน : </strong></td>";
              echo "<td><input type='text' value='$t2' readonly><strong> เหรียญ</strong></td></tr>";
            }
            if($t1 > 0) {
              echo "<tr><td align='right'><strong>คุณได้รับเหรียญ 1 บาท จำนวน : </strong></td>";
              echo "<td><input type='text' value='$t1' readonly><strong> เหรียญ</strong></td></tr>";
            }
          }
        ?>
      </table>

    </fieldset>
  </body>
</html>

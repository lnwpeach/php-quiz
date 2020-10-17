<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ฟอร์มคำนวนค่าใช้บริการแท็กซี่</title>
  </head>
  <body>
    <div style="width: 600px; margin-left: 30%; margin-top: 25px">
    <fieldset>
      <legend><strong>ฟอร์มคำนวนค่าใช้บริการแท็กซี่</strong></legend>
      <form class="" action="taxi_output.php" method="post">


      <table border="0" width="500" cellpadding="3" align="center">
        <tr>
          <td align="right"><strong>จำนวนเงินของคุณ : </strong></td>
          <td><input type="text" name="money" value="" required></td>
        </tr>
        <tr>
          <td align="right"><strong>ค่าบริการเริ่มแรก : </strong></td>
          <td><input type="text" name="cost" value="35" readonly></td>
        </tr>
        <tr>
          <td align="right"><strong>ค่าบริการ(ต่อ กิโลเมตร) : </strong></td>
          <td><input type="text" name="cost" value="" required></td>
        </tr>
        <tr>
          <td align="right"><strong>ระยะทางทั้งหมด : </strong></td>
          <td><input type="text" name="distance" value="" required></td>
        </tr>
      </table>
      <hr>
      <center><input type="submit" name="" value="คำนวน"> &nbsp;&nbsp;&nbsp;<input type="reset" name="" value="กรอกใหม่"></center>
      </form>
    </fieldset>
  </body>
</html>

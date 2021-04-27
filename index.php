<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
$conn=mysqli_connect("localhost","root","","test");
if(!$conn)
  {
    die("Cannot connect to database!");
    exit();
  }
else
  {    
    mysqli_set_charset($conn,"utf8");    
  }
$result = mysqli_query($conn,"select ten_cong_ty from thongtin");
$i=mysqli_num_rows($result);
if($i>0)
{  
  while($row=mysqli_fetch_array($result))
  {    
  }
}
?>
<form method="post">
	<input type="submit" name="submit" value="Send">
<?php
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
if(isset($_POST['submit']))
{
        //Server settings      
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.hostinger.vn';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'info@sieuthimaynonglam.com';                     //SMTP username
        $mail->Password   = 'A1WHghpM8ay';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;
		//TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        //Recipients
        
        $mail->setFrom('info@sieuthimaynonglam.com', 'Siêu thị máy nông lâm');
        $mail->addAddress('bfs@gagfa.vca');     //Add a recipient


        //Attachments
        #$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        #$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        $subject="Các sản phẩm chính hãng của Husqvana đang đợi bạn";
        $body='
<div style="background-color: lightgrey;font-size: 20px;width: 100%" class="container-fluid">
    <table width="90%" border="0" align="center">
      <tbody>
        <tr>
            <td colspan="4" align="center"><a href="sieuthimaynonglam.com"><img class="img-responsive" src="https://sieuthimaynonglam.com/wp-content/uploads/2021/04/test.jpg" width="100%"></a></td>

        </tr>
        <tr>
            <td colspan="4">Chúng tôi chuyên cung cấp các dụng cụ làm vườn chính hãng đến từ HUSQVARNA,DINYI,BEAK MA,GARDENA,... Rất đa dạng và đầy đủ sản phẩm. Đến với chúng tôi bạn có thể yên tâm về chất lượng sản phẩm và hài lòng về thái độ phục vụ.</td>
        </tr> 
        <tr>
            <td colspan="4" align="center"><h2><a href="sieuthimaynonglam.com">SIÊU THỊ MÁY NÔNG LÂM</a></h2></td>          
            
        </tr>      
        <tr>
            <td colspan="4" align="center"><h3>NÓI KHÔNG VỚI SẢN PHẨM KÉM CHẤT LƯỢNG</h3></td>
        </tr>        
        <tr>
            <td colspan="4" align="center"><h3>GIÁ TRỊ CỐT LÕI</h3></td>
        </tr>
        <tr> 
            <td colspan="2">➡️ Tận tâm<br>➡️ Uy tín<br>➡️ Đa dạng</td> 
            <td colspan="2">➡️ Chất lượng<br>➡️ Cạnh tranh<br>➡️ Nhanh chóng,hiệu quả</td>    
        </tr>
        <tr><td><br></td></tr>
        <tr>
            <td colspan="4">Đến với <strong>SIÊU THỊ MÁY NÔNG LÂM</strong>, là đến với sự <strong>YÊN TÂM</strong> trong cách nghĩ, <strong>TIẾT KIỆM</strong> trong chi phí….</td>
        </tr>
        <tr>
            <td colspan="4" align="center"><a href="sieuthimaynonglam.com"><button type="button" class="btn btn-primary btn-lg">Xem Website</button></a></td>
        </tr>
        <tr><td><br></td></tr>
        <tr>
            <td colspan="4"><h3>SIÊU THỊ MÁY NÔNG LÂM</h3></td>
        </tr>
        <tr>
            <td colspan="4">📞 Hotline: 0902698990</td>
                    
        </tr>
        <tr>
            <td colspan="4">📧 : info@sieuthimaynonglam.com</td>                     
        </tr>
        <tr>
              <td colspan="4">🌍 <a href="sieuthimaynonglam.com">sieuthimaynonglam.com</a></td>
        </tr>
        <tr>
            <td colspan="4" >🏢 : 19/4B Tân Chánh Hiệp 25, P.Tân Chánh Hiệp, Quận 12,TP. Hồ Chí Minh</td>
        </tr>
        <tr><td colspan="4"><h3>THỜI GIAN LÀM VIỆC</h3></td></tr>
        <tr>
          <td colspan="4">📆 Thứ 2 – Thứ 6:  8h00AM – 17h00PM</td>   
        </tr>
        <tr> 
            <td colspan="4">📆 Thứ 7 :  8h00AM – 14h00PM</td>   
        </tr>
      </tbody>
    </table>

</div>
		';
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $body;
        #$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';  
        $send = $mail-> send();
        if(!$send)
        {
            echo '<script>
                    alert("Message cannot send :");
                </script>';
        }
        else
        {            
            echo "Message could not be sent. Mailer Error: ";
        }
            
}
?>
<div style="background-color: lightgrey;font-size: 20px;width: 100%" class="container-fluid">
    <br>
    <a href="sieuthimaynonglam.com"><img class="img-responsive" src="https://sieuthimaynonglam.com/wp-content/uploads/2021/04/test.jpg" width="100%"></a>
    <table width="90%" border="0" align="center">
      <tbody>          
        <tr>
            <td colspan="4" align="center"></td>

        </tr>
        <tr>
            <td colspan="4" align="center"><h2><a href="sieuthimaynonglam.com">SIÊU THỊ MÁY NÔNG LÂM</a></h2></td>
        </tr> 
        <tr>
            <td colspan="4">Chúng tôi chuyên cung cấp các dụng cụ làm vườn chính hãng đến từ HUSQVARNA,DINYI,BEAK MA,GARDENA,... Rất đa dạng và đầy đủ sản phẩm. Đến với chúng tôi bạn có thể yên tâm về chất lượng sản phẩm và hài lòng về thái độ phục vụ.</td>
        </tr>       
        <tr>
            <td colspan="4" align="center"><h3>NÓI KHÔNG VỚI SẢN PHẨM KÉM CHẤT LƯỢNG</h3></td>
        </tr>        
        <tr>
            <td colspan="4" align="center"><h3>GIÁ TRỊ CỐT LÕI</h3></td>
        </tr>
        <tr> 
            <td colspan="2" width="50%">➡️ Tận tâm<br>➡️ Uy tín<br>➡️ Đa dạng</td> 
            <td colspan="2" width="50%">➡️ Chất lượng<br>➡️ Cạnh tranh<br>➡️ Nhanh chóng,hiệu quả</td>
        </tr>
        <tr><td><br></td></tr>
        <tr>
            <td colspan="4">Đến với <strong>SIÊU THỊ MÁY NÔNG LÂM</strong>, là đến với sự <strong>YÊN TÂM</strong> trong cách nghĩ, <strong>TIẾT KIỆM</strong> trong chi phí….</td>
        </tr>
        <tr>
            <td colspan="4" align="center"><a href="sieuthimaynonglam.com"><button type="button" style="
              border: none;
              color: white;
              padding: 15px 32px;
              text-align: center;
              text-decoration: none;
              display: inline-block;
              font-size: 16px;
              margin: 4px 2px;
              cursor: pointer;
              background-color: #008CBA;
            ">Xem Website</button></a></td>
        </tr>
        <tr><td><br></td></tr>
        <tr>
            <td colspan="4"><h3>SIÊU THỊ MÁY NÔNG LÂM</h3></td>
        </tr>
        <tr>
            <td colspan="4">📞 : <a href="tel:0902698990">0902698990</a></td>
                    
        </tr>
        <tr>
            <td colspan="4">📧 : <a href="mailto:info@sieuthimaynonglam.com">info@sieuthimaynonglam.com</a></td>                     
        </tr>
        <tr>
              <td colspan="4">🌍 <a href="sieuthimaynonglam.com">sieuthimaynonglam.com</a></td>
        </tr>
        <tr>
            <td colspan="4" >🏢 : 19/4B Tân Chánh Hiệp 25, P.Tân Chánh Hiệp, Quận 12,TP. Hồ Chí Minh</td>
        </tr>
        <tr><td colspan="4"><h3>THỜI GIAN LÀM VIỆC</h3></td></tr>
        <tr>
          <td colspan="4">📆 Thứ 2 – Thứ 6:  8h00AM – 17h00PM</td>   
        </tr>
        <tr> 
            <td colspan="4">📆 Thứ 7 :  8h00AM – 14h00PM</td>   
        </tr>
      </tbody>
    </table>

</div>

</form>
</body>
</html>


<?php
header("Content-type: text/html; charset=utf-8");
require($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');

// отправка на почту
$post = get_post_slug('orderform'); setup_postdata($post);
$to  = get("order_form_e_mail");
$subject = "Заказ с сайта 911help.card";
$message = "
<html>
    <head>
        <title>Заказ с сайта 911help.card</title>
    </head>
    <body>
    	<h2>На сайте 911help.card создан заказ на покупку карты</h2>
    	<p>Количество: ".$_POST['quantity']."<br>
    	Доставка: ".$_POST['delivery']."<br>
    	Форма оплаты: ".$_POST['payment']."</p>
    	<h3>Заказчик</h3>
        <p>".$_POST['username']. " " .$_POST['surname']."<br>
        e-mail: ".$_POST['email']."<br>
        Тел.: ".$_POST['phone']."<br><br>
        Адрес<br> г. ".$_POST['city']. " ул.: " .$_POST['street']. ", дом: " .$_POST['house']. ", кв.: " .$_POST['flat']."</p>
    </body>
</html>";
$headers  = "Content-type: text/html; charset=utf-8 \r\n";
$headers .= "From: 911help.card <911help@card.ua>\r\n";
mail($to, $subject, $message, $headers);

echo "Заказ отправлен.";
?>



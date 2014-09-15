<?php
$url = $_SERVER["SERVER_NAME"];
$params = array();
$params["myMonexyMerchantCurrency"] = "UAH";
$params["myMonexyMerchantFailUrl"] = "http://".$url."/?pay=fail";
$params["myMonexyMerchantID"] = 104277569;
$params["myMonexyMerchantOrderDesc"] = "Карта 911help";
$params["myMonexyMerchantOrderId"] = rand(0, 9999);
$params["myMonexyMerchantResultUrl"] = "http://".$url."/?pay=result";
$params["myMonexyMerchantShopName"] = "911help.cards";
$params["myMonexyMerchantSuccessUrl"] = "http://".$url."/?pay=success";
$params["myMonexyMerchantSum"] = $_GET['sum'];
$params["myMonexyMerchantExpTime"] = "168";

ksort($params);
$req_str = ''; // первоначальное значение строки данных для подписи
foreach($params AS $pkey => $pval) $req_str.=($pkey.'='.$pval);
$params["myMonexyMerchantHash"] = md5($req_str); 

?>

<!-- ================  Monexy ================== -->
<form id="payment" name="monexy" method="POST" action="https://www.monexy.ua/merchant/merchant.php">
    <input type="hidden" name="myMonexyMerchantCurrency" value="<?php echo $params["myMonexyMerchantCurrency"] ?>">
    <input type="hidden" name="myMonexyMerchantFailUrl" value="<?php echo $params["myMonexyMerchantFailUrl"] ?>">
    <input type="hidden" name="myMonexyMerchantID" value="<?php echo $params["myMonexyMerchantID"] ?>">
    <input type="hidden" name="myMonexyMerchantOrderDesc" value="<?php echo $params["myMonexyMerchantOrderDesc"] ?>">
    <input type="hidden" name="myMonexyMerchantOrderId" value="<?php echo $params["myMonexyMerchantOrderId"] ?>">
    <input type="hidden" name="myMonexyMerchantResultUrl" value="<?php echo $params["myMonexyMerchantResultUrl"] ?>">
    <input type="hidden" name="myMonexyMerchantShopName" value="<?php echo $params["myMonexyMerchantShopName"] ?>">
    <input type="hidden" name="myMonexyMerchantSuccessUrl" value="<?php echo $params["myMonexyMerchantSuccessUrl"] ?>">
    <input type="hidden" name="myMonexyMerchantSum" value="<?php echo $params["myMonexyMerchantSum"] ?>">
    <input type="hidden" name="myMonexyMerchantExpTime" value="<?php echo $params["myMonexyMerchantExpTime"] ?>">
    <input type="hidden" name="myMonexyMerchantHash" value="<?php echo $params["myMonexyMerchantHash"] ?>">
    <!-- <input type="submit" class="buy-card-online" value="Купить онлайн" /> -->
</form> 
<!-- ================  /Monexy ================== --> 

<script type="text/javascript">
window.onload = function() {
    document.forms["monexy"].submit();
}
</script>
<?php
include("moncash/credentials.php");
//MonCash SDK
ini_set('display_errors', 1);
require_once 'moncash/vendor/autoload.php';
use DGCGroup\MonCashPHPSDK\Credentials;
use DGCGroup\MonCashPHPSDK\Configuration;
use DGCGroup\MonCashPHPSDK\PaymentMaker;
use DGCGroup\MonCashPHPSDK\Order;
use DGCGroup\MonCashPHPSDK\TransactionCaller;
use DGCGroup\MonCashPHPSDK\TransactionDetails;
use DGCGroup\MonCashPHPSDK\TransactionPayment;
$configArrayTest = Configuration::getSandboxConfigs(); // That's for when you're using Sandbox
$configArrayPro = Configuration::getProdConfigs(); // That's for when you're in production mode
/*******************/
$orderId=time(); // Enter the transaction Id
$amount=1; // Amount
/*******************/
if($productionMode == 1) { $configArray=$configArrayPro; } else { $configArray=$configArrayTest; }	
$credential = new Credentials($moncashclient, $moncashsecret, $configArray);
$theOrder = new Order($orderId, $amount);
$paymentObj = PaymentMaker::makePaymentRequest($theOrder, $credential, $configArray);
?>
<!DOCTYPE html>
<html>
<head>
<title>MonCash Payment Test</title>
</head>
<body>
<div class="container" style="margin-top:50px; text-align:center;">
<div class="row">
<div class="panel-body" style="float:left; width:350px; margin-left:calc(50% - 175px)">
<div class="form-group">
<label>Pay <?php echo $amount; ?> Gourde with MonCash</label>
<span style="float:left; width:100%; clear:both; margin-top:10px; margin-bottom:20px;">
<a href='<?php echo $paymentObj->getRedirect();?>' class="f1-s-4 cl8 hov-cl10 trans-03">
<span style="float:left; margin-top:2px; margin-right:10px;">Pay with Moncash :</span> <img style="width:100px; float:left;" src='moncash/button.png' >
</a>
</span>
</div>                     
</div>
</div>
</div>
</body>
</html>


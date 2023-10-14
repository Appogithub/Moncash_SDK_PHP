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
if($productionMode == 1) { $configArray=$configArrayPro; } else { $configArray=$configArrayTest; }	
$credential = new Credentials($moncashclient, $moncashsecret, $configArray);

$transactionId=intval($_GET['transcationid']);
/*
$urlLink=$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
$urlLinkExplode=explode('=', $urlLink);
$transactionId=end($urlLinkExplode);
*/

$transactionDetails = TransactionCaller::getTransactionDetailsByTransactionIdRequest($transactionId, $credential, $configArray );
if($transactionDetails->getPayment()->getMessage() == 'successful')
{
//Payment successful
$itemId = $transactionDetails->getPayment()->getReference();
//Update database to pay with item ID


}
?>
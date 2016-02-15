<?php
require_once("./common.php");
require_once("./token2.php");
error_reporting(1);
ob_start();
$go=$_GET['go'];
$t=trim(token2());
//echo $go.'?token='.$t."\n";
//header("Location: ".$go.'?token='.trim(token2(2)),TRUE,307);exit;
header("Location: ".$go.'?'.trim(token2(2)),TRUE,307);
die($go.'?'.trim(token2(2)));
exit;
?>

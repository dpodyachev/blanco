<?php
require_once("./common.php");
require_once("./token2.php");
error_reporting(1);
ob_start();

$filename   = basename($_GET['filename']);
$ch_id      = intval($_GET['ch_id']);
$start_time = intval($_GET['start']);
$duration   = intval($_GET['duration']);
$real_id      = $_GET['real_id'];
$token      = $_GET['token'];
$queue = array();//echo $real_id;exit;

//echo "filename=$filename ch_id=$ch_id start=$start_time token=$token <br>";echo 1243;
//$current_tasks = Mysql::getInstance()->select('ch_id, storage_name')->from('tv_archive')->get()->all();
//http://739759477.r.worldcdn.net/12170/m3u8/1448460000_12170.m3u8?03a416cb2a72ec0348326c16ac0162febe13a5f37f05727bee3b471e38eadfbb3f3eba086bb4aa908dd3e47c9dc9540d5fdb
//echo "select descr from epg where ch_id=$ch_id and real_id='$real_id'\n";
      $raw = Mysql::getInstance()->query("select descr from epg where ch_id=$ch_id and real_id='$real_id'")->all();
        foreach ($raw as $rt){
//print_r($rt);

//echo $rt['descr']."?".trim(token2($ch_id))."\n";exit;
//if (strlen($rt['descr']==0)) {header('HTTP/1.0 404 Not Found');}
//header("Location: ".$rt['descr'].'?4876aa96d9db316853eb861d967737f6d7bef5e29eb556b14edee923d3acdb345276fb044b6eb8061075b34f45950bf8d4ff80d69f'),TRUE,307);
//print ($rt['descr'].trim(token2($ch_id))."\n");exit;
header("Location: ".$rt['descr'].'?'.trim(token2($ch_id)),TRUE,307);exit;
//header("Location: ".$rt['descr'],TRUE,307);
//            echo ($rt['descr'].'<br>');
        }

exit;
$DB->query("select * from table1 where col1 = %d and col2 = '%s' LIMIT 1", 5, 'a');
// get rows
$rows = $DB->getRowList();
// display rows
foreach($rows as $row) {
echo $row->col1 . ' : ' . $row->col2 . '<br />';
}
exit;
?>

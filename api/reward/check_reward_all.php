<?php
  include_once "../base.php";

  if(empty($_SESSION['acc'])){
    go("./index.php");
  }else{
    $acc=$_SESSION['acc'];
    $user_id=$_SESSION['id']; // 定義：user
  }
  
  if(empty($_POST['year'])){
    $year=date('Y');
  }else{
    $year=$_POST['year'];}; // 定義：年份

  if(empty($_POST['period'])){
    $periodA=ceil(date('m')/2)-1;
  }elseif($_POST['period']==ceil(date('m')/2)){
    $_SESSION['err']['check_reward']['periodAS']="該期發票尚未開獎";
    $periodA=$_POST['period'];
  }elseif($_POST['period']==(ceil(date('m')/2)-3)){
    $_SESSION['err']['check_reward']['periodAS']="該期發票已過兌獎期限";
    $periodA=$_POST['period'];
  }else{$periodA=$_POST['period'];}; // 定義：期別

  $periodCH=['','1月~2月','3月~4月','5月~6月','7月~8月','9月~10月','11月~12月']; // 定義：月份中文
if(preg_match("/[0-9]{8}/",$_POST['num'])){
  $sql=
  "SELECT `invoice`.`id`,`invoice`.`num`,`invoice`.`year`,`invoice`.`period`,`invoice`.`user_id`,
  `award`.`year`,`award`.`period`,`award`.`num`,`award`.`type`,
  `prize`.`type`,`prize`.`name`,`prize`.`amount`,`prize`.`amountC`
  FROM `invoice`,`award`,`prize` 
  WHERE `user_id`='{$user_id}' &&
  `invoice`.`num`=`award`.`num` && 
  `invoice`.`year`=`award`.`year` && `invoice`.`year`='{$year}' &&
  `award`.`period`=`invoice`.`period` && `invoice`.`period`='{$periodA}' &&
  `award`.`type`=`prize`.`type`";

  $res=querySQLall($sql);
  print_r($res);
  /* 將運算完的值傳回畫面*/
  $_SESSION['year']=$year; // 回傳：年份
  $_SESSION['periodA']=$periodA; // 回傳：期別
  $_SESSION['periodCH']=$periodCH; // 回傳：
  // $_SESSION['pLine']=$pLine; // 回傳：每頁行數
  // $_SESSION['page']=$page; // 回傳：畫面中 該頁頁數
  // $_SESSION['invs']=$invs; // 回傳：發票陣列[頁數][列]
  // $_SESSION['col']=$col; // 回傳：每張發票的key 陣列
  // $_SESSION['columnN']=$columnN; // 回傳：column 中文描述
  // $_SESSION['t_inv']=$t_inv; // 回傳： 發票 總筆數
  // $_SESSION['t_col']=$t_col; // 回傳： 欄位 個數
  // $_SESSION['pNum']=$pNum; // 回傳：總頁數
  // $_SESSION['pNext']=$pNext; // 回傳：下頁頁數
  // $_SESSION['pPre']=$pPre; // 回傳：上頁頁數
}else{
  $_SESSION['err']['check_reward']['num']="發票號碼應為8位數字";
}
  go("../index.php?do=check_reward");
  // print_r();
?>
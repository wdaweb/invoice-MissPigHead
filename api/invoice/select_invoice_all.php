<?php
  include_once "./../../base.php";
  $user_id=$_SESSION['id'];
  if(empty($_POST['year'])){$year=date('Y');}else{$year=$_POST['year'];}; // 定義：年份
  if(empty($_POST['period'])){$period=ceil(date('m')/2);}else{$period=$_POST['period'];}; // 定義：期別
  $periodCH=['','1月~2月','3月~4月','5月~6月','7月~8月','9月~10月','11月~12月']; // 定義：月份中文
  // if($period==0){
  //   $period=6;
  //   $year=$year-1;
  // } // 例外條件

  $sql="SELECT `invoice`.`id`,`invoice`.`code`,`invoice`.`num`,RIGHT(`date`,5),`invoice`.`amount`,`contype`.`desCH`,`store`.`name`,`invoice`.`user_id` FROM `invoice`,`contype`,`store` WHERE `invoice`.`type`=`contype`.`type` && `contype`.`type`=`store`.`type` && `user_id`='{$user_id}' && `year`='{$year}' && `period`='{$period}' order by `date`"; // Mysql搜尋語法
  $rows=querySQLall($sql); // 資料庫抓出的發票陣列


  $t_inv=count($rows); // 定義：發票 總筆數
  $t_col=count(array_keys($rows[0])); // 定義：欄位 個數
  $pLine=15; // 定義：每頁行數
  $pNum=ceil($t_inv/$pLine); //定義： 總頁數
  $invs=array_chunk($rows,$pLine); // 定義：每頁的發票陣列 依照每頁行數分割成不同陣列

  if(!empty($_GET['page'])){$page=$_GET['page'];}else{$page=1;} // 定義：畫面中 該頁頁數
  if($page==$pNum){$pLine=$t_inv-($pNum-1)*$pLine;} // 定義：最後一頁行數
  if(!empty($_GET['pNext'])){$pNext=$page+1;}else{$pNext=2;} if($pNext>$pNum){$pNext=$pNum;}// 定義：下頁頁數
  if(!empty($_GET['pPre'])){$pPre=$page-1;}else{$pPre=1;} if($pPre<1){$pPre=1;} // 定義：上頁頁數

  // print_r($year);
  // echo "<hr>";
  // print_r($sql);
  // echo "<hr>";
  // print_r($rows);
  // echo "<hr>";
  // // print_r($rows);
  // echo "<hr>";
  // // print_r($invs[1][8]);
  // echo "</hr>";

  $col=(array_keys($invs[0][0])); // 定義：每張發票的key 陣列
  $columnN=['id','字軌','號碼','日期','金額','消費類型','消費商家','user_id']; // column 中文描述

/* 將運算完的值傳回畫面*/
  $_SESSION['year']=$year; // 回傳：年份
  $_SESSION['period']=$period; // 回傳：期別
  $_SESSION['periodCH']=$periodCH; // 回傳：
  $_SESSION['pLine']=$pLine; // 回傳：每頁行數
  $_SESSION['page']=$page; // 回傳：畫面中 該頁頁數
  $_SESSION['invs']=$invs; // 回傳：發票陣列[頁數][列]
  $_SESSION['col']=$col; // 回傳：每張發票的key 陣列
  $_SESSION['columnN']=$columnN; // 回傳：column 中文描述
  $_SESSION['t_inv']=$t_inv; // 回傳： 發票 總筆數
  $_SESSION['t_col']=$t_col; // 回傳： 欄位 個數
  $_SESSION['pNum']=$pNum; // 回傳：總頁數
  $_SESSION['pNext']=$pNext; // 回傳：下頁頁數
  $_SESSION['pPre']=$pPre; // 回傳：上頁頁數

  go("./../../index.php?do=invoice_list");
  
?>



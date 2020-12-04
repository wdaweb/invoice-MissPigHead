<?php
  include_once "./base.php";

  if(empty($_SESSION['acc'])){
    go("./index.php");
  }else{
    $acc=$_SESSION['acc'];
    $user_id=$_SESSION['id']; // 定義：user
  }
  
  $year=date('Y'); // 定義：年份
  $period=ceil(date('m')/2)-1; // 定義：期別
  if($period==0){
    $period=6;
    $year=$year-1;
  }
  $pLine=15; // 定義：每頁行數
  if(!empty($_POST['page'])){ // 定義：目前頁數
    $page=($_POST['page']-1)*$pLine+1; 
  }else{$page=1;} // 定義：該頁SQL起始行

  $sql="SELECT `invoice`.`id`,`code`,`num`,RIGHT(`date`,5),`amount`,`contype`.`desCH`,`store`.`name`,`user_id` FROM `invoice`,`contype`,`store` WHERE `invoice`.`type`=`contype`.`type` && `contype`.`type`=`store`.`type` && `user_id`='{$user_id}' && `year`='{$year}' && `period`='{$period}' order by `date` limit {$page},{$pLine}"; // Mysql搜尋語法
  $invs=selectSQL($sql); // 資料庫抓出的發票陣列
  $inv=[];
  foreach($invs as $v){
    $inv[]=$v;
    } // 將發票陣列 拆成單張發票
  $col=(array_keys($inv[0])); // 發票的column
  $columnN=['id','字軌','號碼','日期','金額','消費類型','消費商家','user_id']; // column 中文
  $t_inv=count($inv); // 發票 總筆數
  $t_col=count(array_keys($inv[0])); // 欄位 個數
  $pNum=ceil($t_inv/$pLine); // 總頁數

  $_SESSION['year']=$year;
  $_SESSION['period']=$period;
  $_SESSION['pLine']=$pLine;
  $_SESSION['inv']=$inv;
  $_SESSION['col']=$col;
  $_SESSION['columnN']=$columnN;
  $_SESSION['t_inv']=$t_inv;
  $_SESSION['t_col']=$t_col;
  $_SESSION['pNum']=$pNum;

  go("./index.php?do=invoice_list");
?>



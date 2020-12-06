<?php
  include_once "../base.php";
  unset($_SESSION['err']); // 錯誤訊息挑不出來？？

  // unset($_SESSION['col']);
  unset($_SESSION['year']);
  unset($_SESSION['periodA']);
  unset($_SESSION['periodCH']);
  // unset($_SESSION['page']);
  // unset($_SESSION['invs']);
  // unset($_SESSION['pNum']);
  // unset($_SESSION['pLine']);
  // unset($_SESSION['t_inv']);
  // unset($_SESSION['t_col']);
  // unset($_SESSION['columnN']);
  // unset($_SESSION['pNext']);
  // unset($_SESSION['pPre']);

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
    $_SESSION['err']['check_reward']['periodA']="該期發票尚未開獎";
    $periodA=$_POST['period'];
  }elseif($_POST['period']==(ceil(date('m')/2)-3)){
    $_SESSION['err']['check_reward']['periodA']="該期發票已過兌獎期限";
    $periodA=$_POST['period'];
  }else{$periodA=$_POST['period'];}; // 定義：期別

  $periodCH=['','1月~2月','3月~4月','5月~6月','7月~8月','9月~10月','11月~12月']; // 定義：月份中文

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

  go("../index.php?do=check_reward");

?>
<?php
  include_once "./../../base.php";
  // unset($_SESSION['year']);             
  // unset($_SESSION['periodA']);        
  // unset($_SESSION['rows_1K']);      
  // unset($_SESSION['rows_1M']);        
  // unset($_SESSION['rows_6A']);      
  // unset($_SESSION['rows_1']);      
  // unset($_SESSION['rows_p']);        
  // unset($_SESSION['pNextA']);     
  // unset($_SESSION['pPreA']);        
  // unset($_SESSION['periodCHA']);    
  // unset($_SESSION['t_6A']);                              
  // $_SESSION['err']=[];     
  // unset($_SESSION['col']);
  // unset($_SESSION['year']);
  // unset($_SESSION['page']);
  // unset($_SESSION['invs']);
  // unset($_SESSION['pNum']);
  // unset($_SESSION['pLine']);
  // unset($_SESSION['t_inv']);
  // unset($_SESSION['t_col']);
  // unset($_SESSION['period']);
  // unset($_SESSION['periodCH']);
  // unset($_SESSION['columnN']);
  // unset($_SESSION['pNext']);
  // unset($_SESSION['pPre']);

  // if(empty($_SESSION['acc'])){
  //   go("./index.php");
  // }else{
  //   $acc=$_SESSION['acc'];
  //   $user_id=$_SESSION['id']; // 定義：user
  // }
  
  if(empty($_POST['year'])){$year=date('Y');}else{$year=$_POST['year'];}; // 定義：年份
  if(empty($_POST['periodA'])){$periodA=ceil(date('m')/2)-1;}else{$periodA=$_POST['periodA'];}; // 定義：開獎期別
  $periodCHA=['','1月~2月','3月~4月','5月~6月','7月~8月','9月~10月','11月~12月']; // 定義：開獎期別中文
  if(!empty($_GET['pNextA'])){
    if($pNextA==7){$pNextA=0;$year=$year+1;}else{$pNextA=$_GET['pNextA'];}
  }else{
    $pNextA=$periodA+1;} 
  // 定義：下期 期別 年度
  if(!empty($_GET['pPreA'])){
    if($pPreA==0){$pPreA=6;$year=$year-1;}else{$pPreA=$_GET['pPreA'];}
  }else{$pPreA=$periodA-1;} 
   // 定義：上期 期別 年度

if((((($periodA*2+1)>date('m'))||((($periodA*2+1)==date('m')) && (date('d')<25)))&& $year==date('Y'))||$year>date('Y')){
  $_SESSION['err']['award_list']['notyet']="該期獎號尚未開獎";
}


  $sql_1K="SELECT `award`.`year`,`award`.`period`,`award`.`num`,`award`.`type`,`prize`.`type`,`prize`.`name`,`prize`.`amountC` FROM `award`,`prize` WHERE `award`.`year`='{$year}' && `award`.`period`='{$periodA}' && `award`.`type`='1K' && `award`.`type`=`prize`.`type`"; // Mysql搜尋語法
  $sql_1M="SELECT `award`.`year`,`award`.`period`,`award`.`num`,`award`.`type`,`prize`.`type`,`prize`.`name`,`prize`.`amountC` FROM `award`,`prize` WHERE `award`.`year`='{$year}' && `award`.`period`='{$periodA}' && `award`.`type`='1M' && `award`.`type`=`prize`.`type`"; // Mysql搜尋語法
  $sql_1="SELECT `award`.`year`,`award`.`period`,`award`.`num`,`award`.`type`,`prize`.`type`,`prize`.`name`,`prize`.`amountC` FROM `award`,`prize` WHERE `award`.`year`='{$year}' && `award`.`period`='{$periodA}' && `award`.`type`='1' && `award`.`type`=`prize`.`type`"; // Mysql搜尋語法
  $sql_6A="SELECT `award`.`year`,`award`.`period`,`award`.`num`,`award`.`type`,`prize`.`type`,`prize`.`name`,`prize`.`amountC` FROM `award`,`prize` WHERE `award`.`year`='{$year}' && `award`.`period`='{$periodA}' && `award`.`type`='6A' && `award`.`type`=`prize`.`type`"; // Mysql搜尋語法
  $sql_p="SELECT * FROM `prize`"; // Mysql搜尋語法
  $rows_1K=querySQLall($sql_1K); // 特別獎 獎號陣列
  $rows_1M=querySQLall($sql_1M); // 特獎 獎號陣列
  $rows_1=querySQLall($sql_1);   // 頭獎 獎號陣列
  $rows_6A=querySQLall($sql_6A); // 增開六獎 獎號陣列
  $t_6A=count($rows_6A);         // 增開六獎 獎號個數
  $rows_p=querySQLall($sql_p);   // 獎金說明陣列

  if(empty($rows_1K)){$rows_1K[0]=['year'=>'','period'=>'','num'=>'','type'=>'','name'=>'','amountC'=>''];}
  if(empty($rows_1M)){$rows_1M[0]=['year'=>'','period'=>'','num'=>'','type'=>'','name'=>'','amountC'=>''];}
  if(empty($rows_1)){$rows_1[0]=$rows_1[1]=$rows_1[2]=['year'=>'','period'=>'','num'=>'','type'=>'','name'=>'','amountC'=>''];}
  if(empty($rows_6A)){$rows_6A[0]=$rows_6A[1]=$rows_6A[2]=['year'=>'','period'=>'','num'=>'','type'=>'','name'=>'','amountC'=>''];}


  echo "<pre>";
  // echo "<hr>";
  // print_r($rows_1K);
  // echo "<hr>";
  // print_r($rows_1M);
  // echo "<hr>";
  // print_r($rows_1);
  // echo "<hr>";
  // print_r($rows_6A);
  // echo "<hr>";
  // print_r($t_6A);
  echo "<hr>";
  
  //   $t_inv=count($rows); // 定義：發票 總筆數
  //   $t_col=count(array_keys($rows[0])); // 定義：欄位 個數
  //   $pLine=10; // 定義：每頁行數
  //   $pNum=ceil($t_inv/$pLine); //定義： 總頁數
  //   $invs=array_chunk($rows,$pLine); // 定義：每頁的發票陣列 依照每頁行數分割成不同陣列
  
  //   if(!empty($_GET['page'])){$page=$_GET['page'];}else{$page=1;} // 定義：畫面中 該頁頁數
  //   if($page==$pNum){$pLine=$t_inv-($pNum-1)*$pLine;} // 定義：最後一頁行數
  
  //   // print_r($year);
  //   echo "<hr>";
  //   // print_r($sql);
  //   echo "<hr>";
  //   // print_r($invs);
  //   echo "<hr>";
//   // print_r($rows);
//   echo "<hr>";
//   // print_r($invs[1][8]);
//   echo "</pre>";

//   $col=(array_keys($invs[0][0])); // 定義：每張發票的key 陣列
//   $columnN=['id','字軌','號碼','日期','金額','消費類型','消費商家','user_id']; // column 中文描述

/* 將運算完的值傳回畫面*/
  $_SESSION['year']=$year; // 回傳：年份
  $_SESSION['periodA']=$periodA; // 回傳：開獎期別
  $_SESSION['periodCHA']=$periodCHA; // 回傳：開獎期別中文
  $_SESSION['pNextA']=$pNextA; // 回傳：下期 期別 年度
  $_SESSION['pPreA']=$pPreA; // 回傳：上期 期別 年度
  $_SESSION['rows_1K']=$rows_1K; // 回傳：特別獎資訊
  $_SESSION['rows_1M']=$rows_1M; // 回傳：特獎資訊
  $_SESSION['rows_1']=$rows_1; // 回傳：頭獎資訊
  $_SESSION['rows_6A']=$rows_6A; // 回傳：增開六獎資訊
  $_SESSION['t_6A']=$t_6A; // 回傳：增開六獎 個數
  $_SESSION['rows_p']=$rows_p; // 回傳：獎金說明
//   $_SESSION['invs']=$invs; // 回傳：發票陣列[頁數][列]
//   $_SESSION['col']=$col; // 回傳：每張發票的key 陣列
//   $_SESSION['columnN']=$columnN; // 回傳：column 中文描述
//   $_SESSION['t_inv']=$t_inv; // 回傳： 發票 總筆數
//   $_SESSION['t_col']=$t_col; // 回傳： 欄位 個數
//   $_SESSION['pNum']=$pNum; // 回傳：總頁數

  go("./../../index.php?do=award_list");

  print_r($_SESSION);
  echo "<hr>";

  echo "</pre>";

?>



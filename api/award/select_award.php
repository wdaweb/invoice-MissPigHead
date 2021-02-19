<?php
  include_once "./../../base.php";
  $_SESSION['rows_1K']=[];
  $_SESSION['rows_1M']=[];
  $_SESSION['rows_1']=[];
  $_SESSION['rows_6A']=[];
  $_SESSION['t_6A']='';
  $_SESSION['rows_p']=[];


  if(empty($_POST['year'])){$year=date('Y');}else{$year=$_POST['year'];}; // 定義：年份
  if(empty($_POST['periodA'])){$periodA=ceil(date('m')/2)-1;}else{$periodA=$_POST['periodA'];}; // 定義：開獎期別
  $periodCHA=['','1月~2月','3月~4月','5月~6月','7月~8月','9月~10月','11月~12月']; // 定義：開獎期別中文
  if(!empty($_GET['pNextA'])){if($pNextA==7){$pNextA=0;$year=$year+1;}else{$pNextA=$_GET['pNextA'];}
  }else{$pNextA=$periodA+1;}  // 定義：下期 期別 年度
  if(!empty($_GET['pPreA'])){if($pPreA==0){$pPreA=6;$year=$year-1;}else{$pPreA=$_GET['pPreA'];}
  }else{$pPreA=$periodA-1;}   // 定義：上期 期別 年度

  if((((($periodA*2+1)>date('m'))||((($periodA*2+1)==date('m')) && (date('d')<25)))&& $year==date('Y'))||$year>date('Y')){
    $_SESSION['err']['award_list']['notyet']="該期獎號尚未開獎";
  }else{
    if((($_POST['periodA']<=(ceil(date('m')/2)-3))&& ($year==date('Y')))||($year<date('Y'))){
      $_SESSION['err']['award_list']['expired']="該期發票已過兌獎期限";}

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
}

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

  go("./../../index.php?do=award_list");

?>



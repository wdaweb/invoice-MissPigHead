<?php
  include_once "./../../base.php";
  $user_id=$_SESSION['id'];
  $_SESSION['err']=[];

  if(!isset($_POST['year'])){
    $year=date('Y');
  }else{
    $year=$_POST['year'];}; // 定義：年份

  if(empty($_POST['periodA'])){
    $periodA=ceil(date('m')/2)-1;
  }elseif((($_POST['periodA']==ceil(date('m')/2))&& ($year==date('Y'))) || ($year>date('Y'))){
    $_SESSION['err']['check_reward']['periodAS']="該期發票尚未開獎";
    $periodA=$_POST['periodA'];
  }elseif((($_POST['periodA']<=(ceil(date('m')/2)-3))&& ($year==date('Y')))||($year<date('Y'))){
    $_SESSION['err']['check_reward']['periodAS']="該期發票已過兌獎期限";
    $periodA=$_POST['periodA'];
  }else{$periodA=$_POST['periodA'];}; // 定義：期別

  $periodCH=['','1月~2月','3月~4月','5月~6月','7月~8月','9月~10月','11月~12月']; // 定義：月份中文
  $sql=
  "SELECT `invoice`.`id`,`invoice`.`num`,`invoice`.`year`,`invoice`.`period`,`invoice`.`user_id`,
  `award`.`a_id`,`award`.`year`,`award`.`period`,`award`.`num`,`award`.`type`,
  `prize`.`type`,`prize`.`name`,`prize`.`amount`,`prize`.`amountC`
  FROM `invoice`,`award`,`prize` 
  WHERE `user_id`='{$user_id}' &&
  `invoice`.`num`=`award`.`num` && 
  `invoice`.`year`=`award`.`year` && `invoice`.`year`='{$year}' &&
  `award`.`period`=`invoice`.`period` && `invoice`.`period`='{$periodA}' &&
  `award`.`type`=`prize`.`type`"; // 特別獎, 特獎, 頭獎 (8碼)
  $res=querySQLall($sql);

  $sql2=
  "SELECT `invoice`.`id`,`invoice`.`num`,`invoice`.`year`,`invoice`.`period`,`invoice`.`user_id`,
  `award`.`a_id`,`award`.`year`,`award`.`period`,`award`.`num`,`award`.`type`,
  `prize`.`name`,`prize`.`amount`,`prize`.`amountC`
  FROM `invoice`,`award`,`prize` 
  WHERE `user_id`='{$user_id}' &&
  LEFT(`invoice`.`num`,7)=`award`.`num` && 
  `invoice`.`year`=`award`.`year` && `invoice`.`year`='{$year}' &&
  `award`.`period`=`invoice`.`period` && `invoice`.`period`='{$periodA}'
  && `award`.`type`=`prize`.`type`"; // 二獎 (7碼)
  $res2=querySQLall($sql2);

$sql3=
"SELECT `invoice`.`id`,`invoice`.`num`,`invoice`.`year`,`invoice`.`period`,`invoice`.`user_id`,
`award`.`a_id`,`award`.`year`,`award`.`period`,`award`.`num`,`award`.`type`,
`prize`.`name`,`prize`.`amount`,`prize`.`amountC`
FROM `invoice`,`award`,`prize` 
WHERE `user_id`='{$user_id}' &&
LEFT(`invoice`.`num`,6)=`award`.`num` && 
`invoice`.`year`=`award`.`year` && `invoice`.`year`='{$year}' &&
`award`.`period`=`invoice`.`period` && `invoice`.`period`='{$periodA}'
&& `award`.`type`=`prize`.`type`"; // /三獎 (6碼)
  $res3=querySQLall($sql3);

$sql4=
"SELECT `invoice`.`id`,`invoice`.`num`,`invoice`.`year`,`invoice`.`period`,`invoice`.`user_id`,
`award`.`a_id`,`award`.`year`,`award`.`period`,`award`.`num`,`award`.`type`,
`prize`.`name`,`prize`.`amount`,`prize`.`amountC`
FROM `invoice`,`award`,`prize` 
WHERE `user_id`='{$user_id}' &&
LEFT(`invoice`.`num`,5)=`award`.`num` && 
`invoice`.`year`=`award`.`year` && `invoice`.`year`='{$year}' &&
`award`.`period`=`invoice`.`period` && `invoice`.`period`='{$periodA}'
&& `award`.`type`=`prize`.`type`"; // 四獎 (5碼)
  $res4=querySQLall($sql4);

$sql5=
"SELECT `invoice`.`id`,`invoice`.`num`,`invoice`.`year`,`invoice`.`period`,`invoice`.`user_id`,
`award`.`a_id`,`award`.`year`,`award`.`period`,`award`.`num`,`award`.`type`,
`prize`.`name`,`prize`.`amount`,`prize`.`amountC`
FROM `invoice`,`award`,`prize` 
WHERE `user_id`='{$user_id}' &&
LEFT(`invoice`.`num`,4)=`award`.`num` && 
`invoice`.`year`=`award`.`year` && `invoice`.`year`='{$year}' &&
`award`.`period`=`invoice`.`period` && `invoice`.`period`='{$periodA}'
&& `award`.`type`=`prize`.`type`"; // 五獎 (4碼)
  $res5=querySQLall($sql5);

$sql6=
"SELECT `invoice`.`id`,`invoice`.`num`,`invoice`.`year`,`invoice`.`period`,`invoice`.`user_id`,
`award`.`a_id`,`award`.`year`,`award`.`period`,`award`.`num`,`award`.`type`,
`prize`.`name`,`prize`.`amount`,`prize`.`amountC`
FROM `invoice`,`award`,`prize` 
WHERE `user_id`='{$user_id}' &&
LEFT(`invoice`.`num`,4)=`award`.`num` && 
`invoice`.`year`=`award`.`year` && `invoice`.`year`='{$year}' &&
`award`.`period`=`invoice`.`period` && `invoice`.`period`='{$periodA}'
&& `award`.`type`=`prize`.`type`"; // 六獎與增開六獎 (3碼)
  $res6=querySQLall($sql6);

  $resAll=array_merge($res,$res2,$res3,$res4,$res5,$res6);

  echo "<pre>";
  print_r($resAll);
  $t_res=count($resAll);
  echo "</pre>";
  if($t_res>0){
    foreach($resAll as $re){
    $sql1="select * from `record` where `inv_id`='{$re['id']}'";
    if(empty(querySQLall($sql1))){
    $sql2="INSERT INTO `record`(`user_id`, `inv_id`, `award_id`) VALUES ('{$re['user_id']}','{$re['id']}','{$re['a_id']}')";
    execSQLall($sql2);              // 定義：把 每筆中獎發票 存入發票清單
    $_SESSION['rewardA'][]=$re;      // 回傳：中獎發票陣列
    go("./../../index.php?do=reward_record");
    }                               // 定義：把 每筆中獎發票 存入$_SESSION['reward']陣列
    for($i=0;$i<$t_res;$i++){      
      $a_rew+=$re[$i]['amount'];    // 定義：該期總中獎金額
    }}
  }elseif(($t_res==0)&&!empty($_POST['year'])&&!empty($_POST['periodA'])){
    $_SESSION['err']['check_reward']['no']="*很抱歉，您在{$_POST['year']}年{$periodCH[$_POST['periodA']]}未中獎";
                                    // 定義：未中獎回覆確認
  } 



  echo "<hr>1";
  // print_r($res);
  echo "<hr>2";
  /* 將運算完的值傳回畫面*/
  $_SESSION['year']=$year; // 回傳：年份
  $_SESSION['periodA']=$periodA; // 回傳：期別
  $_SESSION['periodCH']=$periodCH; // 回傳：月份中文
  $_SESSION['t_res']=$t_res; // 回傳：中獎發票張數
  // $_SESSION['resAll']=$resAll; // 回傳：該期總中獎金額
  // $_SESSION['invs']=$invs; // 回傳：發票陣列[頁數][列]
  // $_SESSION['col']=$col; // 回傳：每張發票的key 陣列
  // $_SESSION['columnN']=$columnN; // 回傳：column 中文描述
  // $_SESSION['t_inv']=$t_inv; // 回傳： 發票 總筆數
  // $_SESSION['t_col']=$t_col; // 回傳： 欄位 個數
  // $_SESSION['pNum']=$pNum; // 回傳：總頁數
  // $_SESSION['pNext']=$pNext; // 回傳：下頁頁數
  // $_SESSION['pPre']=$pPre; // 回傳：上頁頁數

  go("./../../index.php?do=check_reward");
  echo "<pre>";
  print_r($_SESSION);
  echo "</pre>";
?>
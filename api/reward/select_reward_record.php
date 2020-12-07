<?php
  include_once "./../../base.php";
  $user_id=$_SESSION['id'];
  $_SESSION['err']=[];

  $sql="select `invoice`.`code`,`invoice`.`num`,`invoice`.`year`,`invoice`.`period`,`invoice`.`date`,`invoice`.`amount`, `prize`.`name`,`prize`.`amount`,`prize`.`amountC` from `invoice`,`prize`,`award`,`record`
  where `record`.`inv_id`=`invoice`.`id` && `record`.`award_id`=`award`.`a_id` && `record`.`user_id`='{$user_id}'
  && `prize`.`type`=`award`.`type`";

  $rAll=querySQLall($sql);
  $tAll=count($rAll);
  if($tAll==0){
    $_SESSION['err']['reward_record']['no']="您目前無中獎紀錄，請先執行紀錄發票和對獎，可能會有新發現哦！";
  }else{
    $_SESSION['rAll']=$rAll;
    $_SESSION['tAll']=$tAll;
    $_SESSION['tN']=count($rAll[0]);
    $_SESSION['titleR']=['發票','號碼','年度','期別','消費日期','消費金額','獎項名稱','獎金數字','獎金'];
  }
  go("./../../index.php?do=reward_record");
?>
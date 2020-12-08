<?php
  include_once "./../../base.php";
  $user_id=$_SESSION['id'];
  $_SESSION['err']=[];
  $_SESSION['rAll']=[]; // 中獎發票
  $_SESSION['tAll']=[]; // 中獎張數
  $_SESSION['tN']=[];
  $_SESSION['titleR']=[];

  $_SESSION['year']=date('Y');
  $_SESSION['eriod=']=ceil(date('m')/2)-1;

  $sql="select `invoice`.`code`,`invoice`.`num`,`invoice`.`year`,`invoice`.`period`,`invoice`.`date`,`invoice`.`amount`, `prize`.`name`,`prize`.`amount`,`prize`.`amountC` from `invoice`,`prize`,`award`,`record`
  where `record`.`inv_id`=`invoice`.`id` && `record`.`award_id`=`award`.`a_id` && `record`.`user_id`='{$user_id}'
  && `prize`.`type`=`award`.`type`";

  $rAll=$pdo->query($sql)->fetchAll();
  $tAll=count($rAll);
  if($tAll==0){
    $_SESSION['err']['reward_record']['no']="您目前無中獎紀錄，請先執行紀錄發票和對獎，可能會有新發現哦！";
  }else{
    foreach($rAll as $r){$tAmount+=$r['amount'];};
    $_SESSION['rAll']=$rAll; // 中獎發票
    $_SESSION['tAll']=$tAll; // 中獎張數
    $_SESSION['tN']=count($rAll[0]);
    $_SESSION['tAmount']=$tAmount;
    $_SESSION['titleR']=['發票號碼','號碼','年度','期別','消費日期','消費金額','獎項名稱','獎金數字','獎金'];
  }

// echo "<pre>";
// print_r($tAmount);
// print_r($rAll);
// echo "</pre>";

  go("./../../index.php?do=reward_record");
?>
<?php
    // include_once "./base.php";
    // if(!empty($_POST['period'])){
    //   $_POST['period']=(ceil(date('m')/2)-1);
    // }
?>
<div class="container text-center mx-0">
  <ul class="list-group row list-group-horizontal">
  <?php
    include_once "./base.php";

    $sql="SELECT 
      `invoice`.`id`,
      `code`,
      `num`,
      RIGHT(`date`,5),
      `amount`,
      `desCH`,
      `store`.`name` 
      FROM `invoice`,`contype`,`store` 
      WHERE `invoice`.`type`=`contype`.`type` && `contype`.`type`=`store`.`type` && `user_id`='1' && `year`='2020' && `period`='3'";
    $rows=selectSQL($sql);
    $inv=[];
    foreach($rows as $v){
      $inv[]=$v;
    }
    $key=(array_keys($inv[0]));
    $columnN=['id','字軌','號碼','日期','金額','消費類型','消費商家']; // 最後要放操作！
    
    $t_inv=count($inv);
    $t_key=count(array_keys($inv[0]));
    for($i=0;$i<$t_key;$i++){
      if($i!=0){
        echo "<li class='list-group-item bg-info invoice-list-".$key[$i]."'>".$columnN[$i]."</li>";
      }else {
        echo "<li class='d-none'>".$columnN[$i]."</li>";
      }
    }
  ?>
</ul>
  <?php
    for($i=0;$i<$t_inv;$i++){
      echo "<ul class='list-group row list-group-horizontal'>
      ";
      for($j=0;$j<$t_key;$j++){
        if($j!=0){
          echo "<li class='list-group-item invoice-list-".$key[$j]."'>".$inv[$i][$key[$j]]."</li>";
        }else {
          echo "<li class='d-none'>".$inv[$i][$key[$j]]."</li>";
          # code...
        }
      }
      echo "</ul>";
    }
  ?>
</div>
<?php
    // include_once "./base.php";
    // if(!empty($_POST['period'])){
    //   $_POST['period']=(ceil(date('m')/2)-1);
    // }
?>
<table class="table">
  <thead>
    <tr>
    <?php
    include_once "./base.php";

    $sql="SELECT 
    `invoice`.`id`,
    `code`,
    `num`,
    `date`,
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
        echo "<th class='bg-info invoice-list-".$key[$i]."'>".$columnN[$i]."</th>";
      }
    }
    ?>
    </tr>
  </thead>
  <tbody>
  <?php
    for($i=0;$i<$t_inv;$i++){
      echo "<tr>";
      for($j=0;$j<$t_key;$j++){
        if($j!=0){
          echo "<td class='invoice-list-".$key[$j]."'>".$inv[$i][$key[$j]]."</td>";
        }
      }
      echo "</tr>";
    }
    ?>
  </tbody>
</table>
<?php
  include_once "./base.php";
  print_r($_POST);


  if(empty($_SESSION['acc'])){
    go("./index.php");
  }else{
    $acc=$_SESSION['acc'];
    $user_id=$_SESSION['id'];
  }
?>
<div class="container text-center">
  <ul class="list-group row mx-lg-3 list-group-horizontal font-weight-bolder">
    <?php
      $sql="SELECT 
        `invoice`.`id`,
        `code`,
        `num`,
        RIGHT(`date`,5),
        `amount`,
        `contype`.`desCH`,
        `store`.`name`,
        `user_id`
        FROM `invoice`,`contype`,`store` 
        WHERE `invoice`.`type`=`contype`.`type` && `contype`.`type`=`store`.`type` && `user_id`='{$user_id}' && `year`='2020' && `period`='3'
        order by `date`
        limit 1,20";
      $rows=selectSQL($sql);
      $inv=[];
      foreach($rows as $v){
        $inv[]=$v;
      }
      $key=(array_keys($inv[0]));
      $columnN=['id','字軌','號碼','日期','金額','消費類型','消費商家','user_id']; // 最後要放操作！
      $t_inv=count($inv);
      $t_key=count(array_keys($inv[0]));
      for($i=0;$i<$t_key;$i++){
        if($i==1){
          echo "<li class='list-group-item bg-info col-1 p-0'><span class='invoice-list-".$i."-th'>編輯</span></li>";          
        }elseif($i==2){
          echo "<li class='list-group-item bg-info col-5 col-sm-3 col-md-3 px-1 invoice-list-".$i."'>發票號碼</li>";
        }elseif($i==3){
          echo "<li class='list-group-item bg-info col-3 col-sm-2 px-1 invoice-list-".$i."'>".$columnN[$i]."</li>";
        }elseif($i==4){
          echo "<li class='list-group-item bg-info col-3 col-sm-2 col-md-1 px-1 invoice-list-".$i."'>".$columnN[$i]."</li>";
        }elseif($i==5){
          echo "<li class='list-group-item bg-info col-sm-4 col-md-3 px-1 d-none d-sm-block invoice-list-".$i."'>".$columnN[$i]."</li>";
        }elseif($i==6){
          echo "<li class='list-group-item bg-info col-md-2 px-1 d-none d-md-block invoice-list-".$i."'>".$columnN[$i]."</li>";
        }else{
          echo "<li class='d-none'>".$columnN[$i]."</li>";
        }
      }
    ?>
</ul>
<form action="./api/select_invoice_single.php" method="post">

  <?php
    for($i=0;$i<$t_inv;$i++){
      echo "<ul class='list-group row mx-lg-3 list-group-horizontal'>
      ";
      for($j=0;$j<$t_key;$j++){
        if($j==1){
          echo "<li class='list-group-item col-1 px-0 invoice-list-".$j."'><input type='hidden' name='id' value='".$inv[$i][$key[($j-1)]]."'><button type='submit' class='btn btn-outline-info p-1'></li>";          
        }elseif($j==2){
          echo "<li class='list-group-item col-5 col-sm-3 col-md-3 px-1 invoice-list-".$j."'>".$inv[$i][$key[($j-1)]]."-".$inv[$i][$key[$j]]."</li>";
        }elseif($j==3){
          echo "<li class='list-group-item col-3 col-sm-2 px-1 invoice-list-".$j."'>".$inv[$i][$key[$j]]."</li>";
        }elseif($j==4){
          echo "<li class='list-group-item col-3 col-sm-2 col-md-1 pr-2 pl-0 text-right invoice-list-".$j."'>".$inv[$i][$key[$j]]."</li>";
        }elseif($j==5){
          echo "<li class='list-group-item col-sm-4 col-md-3 px-1 d-none d-sm-block invoice-list-".$j."'>".$inv[$i][$key[$j]]."</li>";
        }elseif($j==6){
          echo "<li class='list-group-item col-md-2 px-1 d-none d-md-block invoice-list-".$j."'>".$inv[$i][$key[$j]]."</li>";
        }else{
          echo "<li class='d-none'>".$inv[$i][$key[$j]]."</li>";
        }
      }
      echo "</ul>";
    }
  ?>
</form>
</div>

</form>
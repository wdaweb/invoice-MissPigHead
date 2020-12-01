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

    $rows=actSQL('select','invoice','','');
    foreach($rows as $v){
      $inv[]=$v;
    }
    

    $key=(array_keys($inv[0]));
    $columnN=['id','字軌','號碼','日期','年度','期別','金額','消費類型','消費商家','備註','操作']; // 最後一個帳號改成操作！
    $thColumn=array_combine($key,$columnN);
    
    $t_inv=count($inv);
    $t_key=count(array_keys($inv[0]));

    for($i=1;$i<$t_key-1;$i++){
      echo "<th tr class='bg-info'>".$thColumn[$key[$i]]."</th>";
    }
    ?>
    </tr>
  </thead>
  <tbody>
  <?php
    $t_inv=count($inv);
    for($a=0;$a<$t_inv;$a++){
      echo "<tr>";
      for($i=1;$i<$t_key-1;$i++){
        echo "<td>".$inv[$a][$key[$i]]."</td>";
      }
    }
    ?>
  </tbody>
</table>
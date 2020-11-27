<table>
  <thead>
    <tr>
    <?php
    include_once "./base.php";

    
    $rows=actSQL('select','invoice','','');
    foreach($rows as $v){
      $inv[]=$v;
    }
    

    $key=(array_keys($inv[0]));
    $columnN=['id','字軌','號碼','日期','年度','期別','金額','消費類型','消費商家','備註','帳號'];
    $thColumn=array_combine($key,$columnN);
    print_r($thColumn);
    

    $t_inv=count($inv);
    $t_key=count(array_keys($inv[0]));



    for($i=1;$i<$t_key-1;$i++){
      echo "<th class='".$i."th'>".$thColumn[$key[$i]]."</th>";
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
        echo "<th class='".$i."th'>".$inv[$a][$key[$i]]."</th>";
      }
    }
    ?>
  </tbody>
</table>
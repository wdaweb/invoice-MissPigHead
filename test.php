<table>
  <thead>
    <tr>
<?php
include_once("./base.php");



$rows=actSQL('select','invoice','','');
foreach($rows as $v){
  $inv[]=$v;
}


$key=(array_keys($inv[0]));
$columnN=['id','字軌','號碼','日期','年度','期別','金額','消費類型','消費商家','備註','帳號'];
$thColumnN=array_combine($key,$columnN);
print_r($thColumnN);

echo "<hr>";
$t_inv=count($inv);
$t_key=count(array_keys($inv[0]));

for($i=1;$i<$t_key-1;$i++){
  echo "<th>".$thColumnN[$key[$i]]."</th>";
}
?>
    </tr>
  </thead>
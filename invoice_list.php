
<?php
include_once "base.php";

$sql="select * from `invoices`";

$rows=$pdo->query($sql)->fetchAll();

foreach($rows as $row){
echo $row['inv_code'].$row['inv_number']."<br>";
}

?>
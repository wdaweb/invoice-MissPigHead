<?php
include_once "./../../base.php";

$sql="insert into `invoice`(`code`, `num`, `date`, `year`, `period`, `amount`, `type`, `store`, `user_id`) values('{$_POST['code']}','{$_POST['num']}','{$_POST['date']}','{$_POST['year']}','{$_POST['period']}','{$_POST['amount']}','{$_POST['type']}','{$_POST['store']}','{$_POST['user_id']}')";

go("./../../index.php");

?>
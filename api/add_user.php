<?php
include_once "../base.php";
actSQL('insert','user',$_POST,'');
go("../index.php");
?>
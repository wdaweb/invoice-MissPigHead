<?php
include_once "../base.php";

actSQL('insert','invoice',$_POST,'');
go("../index.php");

?>
<?php
include_once "../base.php";

$_POST=actSQL('select','invoice','','');
go("../index.php?do=list_invoice");

?>
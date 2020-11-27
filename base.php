<?php
$pdo=new PDO("mysql:host=localhost;dbname=invoicesys;charset=utf8",'root','');
date_default_timezone_set("Asia/Taipei");
session_start();

function actSQL($action,$tableName,$columnValue,$whereDes){
  global $pdo;
  if(!empty($whereDes)){
    foreach($whereDes as $c => $v){
      $where[]="`$c`='$v'";
    }
    $whereDes="where ".implode("&&", $where);
  }else{
    $whereDes='';
  }
  if(!empty($columnValue)){
    foreach($columnValue as $c => $v){
      $set[]="`$c`='$v'";
      $columns[]=$c;
      $values[]=$v;
    }
    $setDes="set ".implode(",", $set);
  }else{
    $setDes='';
  }
  switch ($action){
    case 'select':
      $sql="select * from `".$tableName."` ".$whereDes;
      print_r($sql);
      return $pdo->query($sql)->fetchAll();
    break;
    case 'insert':
      $sql="insert into `".$tableName."`(`".implode("`,`",$columns)."`) values('".implode("','",$values)."')";  
      print_r($sql);
      // return 
      $pdo->exec($sql);
    break;
    case 'delete':
      $sql="delete from `".$tableName."` ".$whereDes;
      print_r($sql);
      // return 
      $pdo->exec($sql);
    break;
    case 'update':
      $sql="update `".$tableName." ".$setDes." ".$whereDes;
      print_r($sql);
      return $pdo->exec($sql);
    break;
  }
}

function go($url){
  header("location:".$url);
}
?>
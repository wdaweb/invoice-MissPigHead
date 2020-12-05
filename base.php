<?php
$pdo=new PDO("mysql:host=localhost;dbname=invoicesys;charset=utf8",'root','');
date_default_timezone_set("Asia/Taipei");
session_start();

function querySQLall($sql){
  global $pdo;
  return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
} // 寫好sql語法，“抓回”全部值

function actSQL($action,$tableName,$columnValue,$whereDes){
  global $pdo;
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
      // print_r($sql);
      return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    break;
    case 'insert':
      $sql="insert into `".$tableName."`(`".implode("`,`",$columns)."`) values('".implode("','",$values)."')";  
      print_r($sql);
      // return 
      $pdo->exec($sql);
    break;
    case 'delete':
      $sql="delete from `".$tableName."` ".$whereDes;
      // print_r($sql);
      // return 
      $pdo->exec($sql);
    break;
    case 'update':
      $sql="update `".$tableName." ".$setDes." ".$whereDes;
      print_r($sql);
      return $pdo->exec($sql);
    break;
  }
} // 常用CRUD

function whereD1($table1,$column1,$value1,$table2,$column2,$value2){
  if(!empty($table1)){
    $Des1="`".$table1."`.`".$column1."`='".$value1."'";  
  }else{
    $Des1="`".$column1."`='".$value1."'";  
  }
  if(!empty($table2)){
    $Des2="&& `".$table2."`.`".$column2."`='".$value2."'";
    
  }elseif(empty($table2) && !empty($column2)){
    $Des2="`".$column2."`='".$value2."'";  
  }else{$Des2='';}
    $Des=$Des1.$Des2;
  return $Des;
} // where 表.欄=值 => 指定欄位值

function whereD2($table1,$column1,$table2,$column2){
  $Des2="`".$table1."`.`".$column1."`=`".$table2."`.`".$column2."`";
  return $Des2;
} // where  表.欄=表.欄 => 關聯表單

function orderBy($table1,$column1,$ascDesc1,$table2,$column2,$ascDesc2){
  if(!empty($table1)){
    $Des1="order by `".$table1."`.`".$column1."` ".$ascDesc1;
  }else{
    $Des1="order by `".$column1."` ".$ascDesc1;
  }
  if(!empty($table2)){
    $Des2=",`".$table1."`.`".$column1."` ".$ascDesc1;
  }elseif(empty($table2)&&!empty($column2)){
    $Des2=", `".$column2."` ".$ascDesc2;
  }else{$Des2='';}
  $Des=$Des1.$Des2;
  return $Des;
} // order by 表.欄 => 最多排兩種欄位 

function limitN($num){
  $Des="limit ".$num;
  return $Des;
} // limit 最前面幾個

function whereDes($whereD1,$whereD2,$orderBy,$limitN){
  if(!empty($whereD1)){
    $Des="where ".$whereD1." ".$whereD2." ".$orderBy." ".$limitN;
  }else{
    if(!empty($whereD2)){
      $Des="where ".$whereD2." ".$orderBy." ".$limitN;
    }else{
      $Des=$orderBy." ".$limitN;
    }
  }
  return $Des;
} // 結合where, order by, limit 條件敘述

function go($url){header("location:{$url}");} // 到指定程式或頁面

function checkLen($columnName,$maxLen,$minLen){
  $Len=strlen($columnName);
  if($Len<$minLen || $Len>$maxLen){
    $msg="請輸入".$minLen."~".$maxLen."字元";
    $_SESSION['err'][$columnName]['length']=$msg;
  }
} // 檢查欄位輸入字串長度

function checkEmpty($columnName){
  if(empty($_POST[$columnName])){
    $msg="本欄位不可為空白";
    $_SESSION['err'][$columnName]['empty']=$msg;
  }
} // 檢查user是否未輸入

function errFeedBack($page,$taget){ // 記得寫$_SESSION['err']時一定要寫三維
    if(!empty($_SESSION['err'])){
      foreach($_SESSION['err'] as $k=>$v){
        $_SESSION['err'][$k]=$v;
      }
    }
    if(isset($_SESSION['err'][$page][$taget])){
    echo "*".$_SESSION['err'][$page][$taget];
    }
  }
 // 輸出檢查後的error message

 class InvDB{
  private $dsn="mysql:host=localhost;dbname=invoicesys;charset=utf8";
  private $pdo;
  private $table;

  public function __construct($table){
    $this->table=$table; 
    $this->pdo=new PDO($this->dsn,'root','');
  }

/** select one or multi lines                                                  **/
/** whereDes must be array!!                                                   **/
/** where descripton must be array && whereDes[0]                              **/
/** use =[['col1'=>'val1','col2'=>'val2',...],'order by XX','limit 1,20',...]; **/
  public function selectInv($whereDes){
    $sql="select * from `$this->table`";
      if(is_array($whereDes[0])){
        foreach($whereDes[0] as $k=>$v){
          $where[]=sprintf("`%s`='%s'",$k,$v);
        }
        $sql=$sql." where ".implode(" && ",$where);
        if(count($whereDes)>1){
          $i=(count($whereDes));
          for($i>0;$i=0;$i--){
            $sql=$sql." ".($whereDes[($i-1)]);
          }
        }
    }else{
      $i=(count($whereDes));
      for($i>0;$i=0;$i--){
        $sql=$sql." ".($whereDes[($i-1)]);
      }
    }
    return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  }  
  public function deleteInv($whereDes){
    $sql="delete form $this->table";
    if(is_array($whereDes)){
      foreach($whereDes as $k=>$v){
        $tmp[]=sprintf("`%s`='%s'",$k,$v);
      }
      $sql=$sql." where ".implode(" && ",$tmp);
    }elseif(!empty($whereDes)){
      $sql=$sql."where ".$whereDes;
    }
    return $this->pdo->exec($sql);
  } /** delete >> 將where/orderBy/limit 條件 以陣列方式加入 **/

  public function addInv($colVal,$whereDes){
    foreach($colVal as $k=>$v){
      $col[]=$k;
      $val[]=$v;
    }
    $sql="insert into `$this->table`(`".implode("`,`",$col)."`) values('".implode("','",$val)."')";
    if(is_array($whereDes)){
      foreach($whereDes as $k=>$v){
        $tmp[]=sprintf("`%s`='%s'",$k,$v);
      }
      $sql=$sql." where ".implode(" && ",$tmp);
    }elseif(!empty($whereDes)){
      $sql=$sql."where ".$whereDes;
    }
    return $this->pdo->exec($sql);
  } /** insert >> 將column/value where/orderBy/limit 條件 以陣列方式加入 **/

  public function updateInv($colVal,$whereDes){
    foreach($colVal as $k=>$v){
      $set[]=sprintf("`%s`='%s'",$k,$v);
    }
    $sql="update `$this->table` set ".implode(",",$set);
    if(is_array($whereDes)){
      foreach($whereDes as $k=>$v){
        $tmp[]=sprintf("`%s`='%s'",$k,$v);
      }
      $sql=$sql." where ".implode(" && ",$tmp);
    }elseif(!empty($whereDes)){
      $sql=$sql."where ".$whereDes;
    }
    return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
  } /** update >> 將column/value where/orderBy/limit 以陣列方式加入 **/
}

?>
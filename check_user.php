<?php
include_once("base.php");
$_SESSION['err'][]='';

$whereDes=whereDes(whereD1('','acc',$_POST['acc'],'','',''),'','','');
print_r($whereDes);

$rows=actSQL('select','user','',$whereDes); // 資料庫叫出X筆資料
foreach($rows as $row){} // 將該筆資料，轉成陣列

// print_r($rows); echo "<br>";
// print_r($_POST['acc']); echo "<br>";
// print_r($row['acc']); echo "<br>";
// print_r($_POST['pw']); echo "<br>";
// print_r($row['pw']); echo "<br>";

if(empty($row['acc'])){
  $_SESSION['err']['acc']['notExist']="此帳號不存在";
  // echo "ACC";
  go("./index.php?do=login");
}elseif(!empty($row['acc']) && $row['acc']!==$_POST['acc']){
  $_SESSION['err']['acc']['notExist']="此帳號不存在";
  go("./index.php?do=login");
  // echo "AGG";
}elseif($_POST['pw']!==$row['pw']){
  $_SESSION['err']['pw']['wrong']="密碼錯誤";
  // echo "PW";
  go("./index.php?do=login");
}elseif($_POST['pw']===$row['pw']){
  $_SESSION['id']=$row['id'];
  $_SESSION['acc']=$row['acc'];
  go("./index.php?do=welcome");
}

?>
<!-- <form class="container" action="check_user.php" method="post">
  <div class="row justify-content-center">
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="input-group-prepend">
        <span class="input-group-text">帳號</span>
      </div>
      <input type="text" class="form-control" name="account" placeholder="請輸入4~10字元英文或數字">
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="input-group-prepend">
        <span class="input-group-text">密碼</span>
      </div>
      <input type="password" class="form-control" name="password" placeholder="請輸入8~16字元英文或數字">
    </div>
    <div class="col-sm-10 my-2 d-flex justify-content-center">
      <button type="submit" class="btn btn-info mx-2">登入</button>
      <button type="reset" class="btn btn-warning mx-2">重填</button>
    </div>
    <div class="col-sm-10 col-md-8 col-lg-6 mx-md-5 mt-5 pt-5 d-flex justify-content-center align-items-center">
      <span class="font-italic">還沒有帳號嗎？去申請～</span><a class="btn btn-outline-dark py-0 px-2 font-weight-bold mx-1" href="./index.php?do=signup">GO</a>
    </div>
  </div>
</form> -->
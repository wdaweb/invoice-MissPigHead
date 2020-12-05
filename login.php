<?php
include_once("base.php");
if(!empty($_SESSION['acc'])){
  go("./index.php?do=welcome");
}
?>
<form class="container" action="./api/check_user.php" method="post">
  <div class="row justify-content-center">
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="input-group-prepend">
        <span class="input-group-text">帳號</span>
      </div>
      <input type="text" class="form-control" name="acc" placeholder="請輸入4~10字元英文或數字" required>
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="input-group-prepend">
        <span class="input-group-text">密碼</span>
      </div>
      <input type="password" class="form-control" name="pw" placeholder="請輸入8~16字元英文或數字" required>
    </div>
    <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-3">
      <div><span class="errmsg"><?php if(!empty($_SESSION['err'])){errFeedBack('login','acc');}?></span></div>
      <div><span class="errmsg"><?php if(!empty($_SESSION['err'])){errFeedBack('login','pw');}?></span></div>
    </div>
    <div class="col-sm-10 my-2 d-flex justify-content-center">
      <button type="submit" class="btn btn-info mx-2">登入</button>
      <button type="reset" class="btn btn-warning mx-2">重填</button>
    </div>
    <div class="col-sm-10 col-md-8 col-lg-6 mx-md-5 mt-5 pt-5 d-flex justify-content-center align-items-center">
      <span class="font-italic">還沒有帳號嗎？去申請～</span><a class="btn btn-outline-dark py-0 px-2 font-weight-bold mx-1" href="./index.php?do=signup">GO</a>
    </div>
  </div>
</form>
<?php
unset($_SESSION['err']);
?>
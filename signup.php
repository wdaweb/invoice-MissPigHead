<?php
include_once("base.php");
if(!empty($_SESSION['acc'])){
  go("./index.php?do=welcome");
}
?>
<form class="container" action="./api/insert_user.php" method="post">
  <div class="row justify-content-center">
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="input-group-prepend">
        <span class="input-group-text">帳號</span>
      </div>
      <input type="text" class="form-control" name="acc" placeholder="請輸入6~10字元英文或數字" required>
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="input-group-prepend">
        <span class="input-group-text">密碼</span>
      </div>
      <input type="password" class="form-control" name="pw" placeholder="請輸入8~16字元英文或數字" required>
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="input-group-prepend">
        <span class="input-group-text">確認密碼</span>
      </div>
      <input type="password" class="form-control" name="pw2" placeholder="請重新輸入密碼" required>
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="input-group-prepend">
        <span class="input-group-text">生日</span>
      </div>
      <input type="date" class="form-control" name="birth" required>
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="input-group-prepend">
        <span class="input-group-text">手機</span>
      </div>
      <input type="number" class="form-control" name="tel" pattern="[0-9]{10}" required>
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="input-group-prepend">
        <span class="input-group-text">Email</span>
      </div>
      <input type="email" class="form-control" name="email" required>
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="col-12"><span class="errmsg"><?php if(!empty($_SESSION['err'])){errFeedBack('signup','accused');}?></span></div>
      <div class="col-12"><span class="errmsg"><?php if(!empty($_SESSION['err'])){errFeedBack('signup','acc');}?></span></div>
      <div class="col-12"><span class="errmsg"><?php if(!empty($_SESSION['err'])){errFeedBack('signup','pw');}?></span></div>
      <div class="col-12"><span class="errmsg"><?php if(!empty($_SESSION['err'])){errFeedBack('signup','pw2');}?></span></div>
      <div class="col-12"><span class="errmsg"><?php if(!empty($_SESSION['err'])){errFeedBack('signup','birth');}?></span></div>
      <div class="col-12"><span class="errmsg"><?php if(!empty($_SESSION['err'])){errFeedBack('signup','tel');}?></span></div>
      <div class="col-12"><span class="errmsg"><?php if(!empty($_SESSION['err'])){errFeedBack('signup','email');}?></span></div>
    </div>
    <div class="col-6 my-2 d-flex justify-content-center">
      <button type="submit" class="btn btn-info mx-2">註冊</button>
      <button type="reset" class="btn btn-warning mx-2">重填</button>
    </div>
  </div>
</form>  
<?php
  unset($_SESSION['err']);                         
?> 

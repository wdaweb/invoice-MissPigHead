<?php
include_once("base.php");

$user=$_SESSION['user'];
?>
<form class="container" action="./api/user/update_user.php" method="post">
  <div class="row justify-content-center">
  <div class="col-12 col-sm-10 col-md-8 col-lg-6 mx-md-5 mt-3 text-center h5 font-weight-bold">個人資料</div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="input-group-prepend">
        <span class="input-group-text">帳號</span>
      </div>
      <input type="text" class="form-control" name="acc" value="<?=$user['acc'];?>" disabled>
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="input-group-prepend">
        <span class="input-group-text">密碼</span>
      </div>
      <input type="password" class="form-control" name="pw" value="<?=$user['pw'];?>">
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="input-group-prepend">
        <span class="input-group-text">生日</span>
      </div>
      <input type="date" class="form-control" name="birth" value="<?=$user['birth'];?>">
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="input-group-prepend">
        <span class="input-group-text">手機</span>
      </div>
      <input type="number" class="form-control" name="tel" value="<?=$user['tel'];?>">
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="input-group-prepend">
        <span class="input-group-text">Email</span>
      </div>
      <input type="email" class="form-control" name="email" value="<?=$user['email'];?>">
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="col-12"><span class="errmsg"><?php if(!empty($_SESSION['err'])){errFeedBack('edit_user','acc');}?></span></div>
      <div class="col-12"><span class="errmsg"><?php if(!empty($_SESSION['err'])){errFeedBack('edit_user','pw');}?></span></div>
      <div class="col-12"><span class="errmsg"><?php if(!empty($_SESSION['err'])){errFeedBack('edit_user','tel');}?></span></div>
      <div class="col-12"><span class="errmsg"><?php if(!empty($_SESSION['err'])){errFeedBack('edit_user','email');}?></span></div>
    </div>
    <div class="col-6 my-2 d-flex justify-content-center">
      <button type="submit" class="btn btn-info mx-2">送出</button>
      <button type="reset" class="btn btn-warning mx-2">重填</button>
    </div>
  </div>
</form>  
<?php
  unset($_SESSION['err']);                         
?> 


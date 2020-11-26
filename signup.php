<form id="register" class="container" action="register.php" method="post">
  <div class="row justify-content-center">
    <div class="input-group col-sm-10 col-md-8 col-lg-6 mx-md-5 my-2">
      <div class="input-group-prepend">
        <span class="input-group-text">帳號</span>
      </div>
      <input type="text" class="form-control" name="account" placeholder="請輸入4~10字元英文或數字">
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 mx-md-5 my-2">
      <div class="input-group-prepend">
        <span class="input-group-text">密碼</span>
      </div>
      <input type="password" class="form-control" name="password" placeholder="請輸入8~16字元英文或數字">
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 mx-md-5 my-2">
      <div class="input-group-prepend">
        <span class="input-group-text">生日</span>
      </div>
      <input type="date" class="form-control" name="birthday">
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 mx-md-5 my-2">
      <div class="input-group-prepend">
        <span class="input-group-text">手機</span>
      </div>
      <input type="number" class="form-control" name="tel">
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 mx-md-5 my-2">
      <div class="input-group-prepend">
        <span class="input-group-text">Email</span>
      </div>
      <input type="email" class="form-control" name="email">
    </div>
    <div class="col-6 my-2 d-flex justify-content-center">
      <button type="submit" class="btn btn-info mx-2">註冊</button>
      <button type="reset" class="btn btn-warning mx-2">重填</button>
    </div>
  </div>
</form>  
  
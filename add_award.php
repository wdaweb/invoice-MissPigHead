<!-- 資料格式驗證：待老師教JavaScipt後補充 -->
<!-- 本頁面鎖定管理員 -->
<form class="container" action="./api/add_invoice.php" method="post">
  <div class="row justify-content-center">
    <div class="col-sm-10 col-md-8 col-lg-6 mx-md-5 px-0 mt-2 text-center h5 font-weight-bold">開獎期別</div>
    <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2 row">
      <div class="input-group col-md-7 mx-0 px-0">
        <div class="input-group-prepend">
          <span class="input-group-text">年度</span>
        </div>
        <input type="text" class="form-control" name="year" placeholder="請輸入西元年">
      </div>
      <div class="input-group col-md-5 mx-0 px-0">
        <div class="input-group-prepend">
          <span class="input-group-text">月份</span>
        </div>
        <select type="number" class="form-control" name="period">
          <option value="">- 請選擇 -</option>
          <option value="1">01 ~ 02 月</option>
          <option value="2">03 ~ 04 月</option>
          <option value="3">05 ~ 06 月</option>
          <option value="4">07 ~ 08 月</option>
          <option value="5">09 ~ 10 月</option>
          <option value="6">11 ~ 12 月</option>
        </select>
      </div>
    </div>
<!-- 獎號輸入 -->
    <div class="col-sm-10 col-md-8 col-lg-6 mx-md-5 mt-3 text-center h5 font-weight-bold">獎號資訊</div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="input-group-prepend">
        <span class="input-group-text">特別獎</span>
      </div>
      <input type="text" class="form-control" name="1K">
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="input-group-prepend">
        <span class="input-group-text">特獎</span>
      </div>
      <input type="text" class="form-control" name="1M">
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="input-group-prepend">
        <span class="input-group-text">頭獎</span>
        <span class="input-group-text bg-light">第一組</span>
      </div>
      <input type="text" class="form-control" name="1[]">
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="input-group-prepend">
        <span class="input-group-text">頭獎</span>
        <span class="input-group-text bg-light">第二組</span>
      </div>
      <input type="text" class="form-control" name="1[]">
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="input-group-prepend">
        <span class="input-group-text">頭獎</span>
        <span class="input-group-text bg-light">第三組</span>
      </div>
      <input type="text" class="form-control" name="1[]">
    </div>
<!-- 增開獎項 -->
    <div class="col-sm-10 col-md-8 col-lg-6 mx-md-5 mt-3 text-center h5 font-weight-bold">增開獎號</div>
    <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2 row">
      <div class="input-group col-md-5 mx-0 px-0">
        <div class="input-group-prepend">
          <span class="input-group-text">獎項</span>
        </div>
        <select type="number" class="form-control" name="sp_prize[]">
          <option value="">- 請選擇 -</option>
          <option value="1M">特獎</option>
          <option value="1">頭獎</option>
          <option value="6A">六獎</option>
        </select>
      </div>
      <div class="input-group col-md-7 mx-0 px-0">
        <div class="input-group-prepend">
          <span class="input-group-text">號碼</span>
        </div>
        <input type="text" class="form-control" name="sp_num[]">
      </div>
    </div>
    <div class="col-10 my-2 d-flex justify-content-center">
      <button type="submit" class="btn btn-info mx-2">送出</button>
      <button type="reset" class="btn btn-warning mx-2">重填</button>
    </div>        
    </div>                                        
  </div>
</form>  
<!-- 資料格式驗證：待老師教JavaScipt後補充 -->
<div class="container" action="./api/insert_invoice.php" method="post">
  <div class="row justify-content-center">
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="input-group col-md-5 mx-0 px-0">
        <div class="input-group-prepend">
          <span class="input-group-text">發票字軌</span>
        </div>
        <input type="text" class="form-control" name="code" placeholder="請輸入英文" required>
      </div>
      <div class="input-group col-md-7 mx-0 px-0">
        <div class="input-group-prepend">
          <span class="input-group-text">號碼</span>
        </div>
        <input type="text" class="form-control" name="num" placeholder="請輸入8位數字" required>
      </div>
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="input-group-prepend">
        <span class="input-group-text">發票日期</span>
      </div>
      <input type="date" class="form-control" name="date" required>
    </div>
    <!-- <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="input-group-prepend">
        <span class="input-group-text">發票年度</span>
      </div>
      <input type="number" class="form-control" name="year" placeholder="請重新輸入密碼" required>
    </div> -->
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="input-group-prepend">
        <span class="input-group-text">對獎月份</span>
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
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="input-group-prepend">
        <span class="input-group-text">發票金額</span>
      </div>
      <input type="text" class="form-control" name="amount">
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="input-group-prepend">
        <span class="input-group-text">消費類型</span>
      </div>
      <select type="number" class="form-control" name="type">
        <option value="">- 請選擇 -</option>
        <option value="1">餐飲、食物</option>
        <option value="2">衣物、鞋、包、錶</option>
        <option value="3">藥妝、保養</option>
        <option value="4">日用品、清潔用品、雜貨</option>
        <option value="5">交通、通訊</option>
        <option value="6">家電、家具</option>
        <option value="7">交際、娛樂</option>
        <option value="8">進修課程</option>
        <option value="9">其他</option>
      </select>
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="input-group-prepend">
        <span class="input-group-text">消費商家</span>
      </div>
      <input type="text" class="form-control" name="store">
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="input-group-prepend">
        <span class="input-group-text">其他備註</span>
      </div>
      <input type="text" class="form-control" name="other">
    </div>
    <!-- acc 帳號 隱藏欄位 <input type="number" class="form-control" name="acc"> -->
    <div class="col-6 my-2 d-flex justify-content-center">
      <button type="submit" class="btn btn-info mx-2">送出</button>
      <button type="reset" class="btn btn-warning mx-2">重填</button>
    </div>
  </div>
</form>  
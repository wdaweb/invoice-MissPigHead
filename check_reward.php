<?php
  include_once "./base.php";
  $year=$_SESSION['year'];
  $periodA=$_SESSION['periodA'];
  $periodCH=$_SESSION['periodCH'];
  // $pLine=$_SESSION['pLine'];
  // $page=$_SESSION['page'];
  // $invs=$_SESSION['invs'];
  // $col=$_SESSION['col'];
  // $columnN=$_SESSION['columnN'];
  // $t_inv=$_SESSION['t_inv'];
  // $t_col=$_SESSION['t_col'];
  // $pNum=$_SESSION['pNum'];
  // $pNext=$_SESSION['pNext']; // 下頁頁數
  // $pPre=$_SESSION['pPre']; // 上頁頁數
?>

<div class="container text-center" id="checkAward">
  <!-- 批次對獎，鎖帳戶 -->
  <div class="row justify-content-center mx-1 mx-sm-3 my-1 my-sm-2">
    <h4>對獎期別</h4>
  </div>
  <form class="row justify-content-center mx-1 mx-sm-3 my-1 my-sm-2" action="./api/check_reward_all.php" method="post" >
    <div class="input-group col-4 col-md-3 px-0">
      <div class="input-group-prepend">
        <span class="input-group-text px-1 px-sm-2 px-md-3 text-07">年度</span>
      </div>
      <input type="number" class="form-control px-1 px-sm-2 px-md-3 text-07" name="year" value="<?=$year;?>">
    </div>
    <div class="input-group col-6 col-md-4 px-0">
      <div class="input-group-prepend">
        <span class="input-group-text px-1 px-sm-2 px-md-3 text-07">月份</span>
      </div>
      <select type="number" class="form-control px-1 px-sm-2 px-md-3 text-07" name="period">
        <option value="<?=$periodA;?>"><?=$periodCH[$periodA];?></option>
          <option value="1">01 ~ 02 月</option>
          <option value="2">03 ~ 04 月</option>
          <option value="3">05 ~ 06 月</option>
          <option value="4">07 ~ 08 月</option>
          <option value="5">09 ~ 10 月</option>
          <option value="6">11 ~ 12 月</option>
      </select>
    </div>
    <div class="input-group col-2 px-0">
      <button type="submit" class="btn btn-info px-1 px-sm-2 px-md-3">選擇</button>
    </div>
  </form>
  <div class="row justify-content-center mx-1 mx-sm-3 my-1 my-sm-2">
    <div class="col-12 col-md-9 px-1 justify-content-start">
      <div class="text-left"><span class="errmsg"><?php if(!empty($_SESSION['err'])){errFeedBack('check_reward','periodA');}?></span></div>
      <!-- <div><span class="errmsg"><?php if(!empty($_SESSION['err'])){errFeedBack('signup','acc');}?></span></div>
      <div><span class="errmsg"><?php if(!empty($_SESSION['err'])){errFeedBack('signup','pw');}?></span></div>
      <div><span class="errmsg"><?php if(!empty($_SESSION['err'])){errFeedBack('signup','pw2');}?></span></div>
      <div><span class="errmsg"><?php if(!empty($_SESSION['err'])){errFeedBack('signup','tel');}?></span></div>
      <div><span class="errmsg"><?php if(!empty($_SESSION['err'])){errFeedBack('signup','email');}?></span></div> -->
    </div>
  </div>

  <!-- 輸入單張發票號碼兌獎，這可以不鎖帳戶 -->
  <div>
  <form class="container" action="./api/insert_invoice.php" method="post">
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
    <div class="col-6 my-2 d-flex justify-content-center">
      <button type="submit" class="btn btn-info mx-2">對獎</button>
      <button type="reset" class="btn btn-warning mx-2">重填</button>
    </div>
  </div>
</form>  

  </div> 
</div>
<?php
?>
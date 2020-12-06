<?php
  include_once "./base.php";
  // $year=$_SESSION['year'];          // 回傳：年份
  // $periodA=$_SESSION['periodA'];    // 回傳：開獎期別
  // $periodCHA=$_SESSION['periodCHA'];// 回傳：開獎期別中文
  // $pNextA=$_SESSION['pNextA'];      // 回傳：下期 期別 年度
  // $pPreA=$_SESSION['pPreA'];        // 回傳：上期 期別 年度
  // $rows_1K=$_SESSION['rows_1K'];    // 回傳：特別獎資訊
  // $rows_1M=$_SESSION['rows_1M'];    // 回傳：特獎資訊
  // $rows_1=$_SESSION['rows_1'];      // 回傳：頭獎資訊
  // $rows_6A=$_SESSION['rows_6A'];    // 回傳：增開六獎資訊
  // $rows_p=$_SESSION['rows_p'];      // 回傳：獎金說明資訊
  // $t_6A=$_SESSION['t_6A'];          // 回傳：增開六獎 個數
?>
<form class="container" action="./api/insert_award.php" method="post">
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
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="col-12"><span class="errmsg"><?php if(!empty($_SESSION['err'])){errFeedBack('add_award','notyet');}?></span></div>
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
      <div class="col-12"><span class="errmsg"><?php if(!empty($_SESSION['err'])){errFeedBack('add_award','1K');}?></span></div>
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="input-group-prepend">
        <span class="input-group-text">特獎</span>
      </div>
      <input type="text" class="form-control" name="1M">
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="col-12"><span class="errmsg"><?php if(!empty($_SESSION['err'])){errFeedBack('add_award','1M');}?></span></div>
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="input-group-prepend">
        <span class="input-group-text">頭獎</span>
        <span class="input-group-text bg-light">第一組</span>
      </div>
      <input type="text" class="form-control" name="1[]">
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="col-12"><span class="errmsg"><?php if(!empty($_SESSION['err'])){errFeedBack('add_award','0');}?></span></div>
    </div>

    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="input-group-prepend">
        <span class="input-group-text">頭獎</span>
        <span class="input-group-text bg-light">第二組</span>
      </div>
      <input type="text" class="form-control" name="1[]">
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="col-12"><span class="errmsg"><?php if(!empty($_SESSION['err'])){errFeedBack('add_award','1');}?></span></div>
    </div>

    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="input-group-prepend">
        <span class="input-group-text">頭獎</span>
        <span class="input-group-text bg-light">第三組</span>
      </div>
      <input type="text" class="form-control" name="1[]">
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="col-12"><span class="errmsg"><?php if(!empty($_SESSION['err'])){errFeedBack('add_award','2');}?></span></div>
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
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="col-12"><span class="errmsg"><?php if(!empty($_SESSION['err'])){errFeedBack('add_award','sp1M');}?></span></div>
      <div class="col-12"><span class="errmsg"><?php if(!empty($_SESSION['err'])){errFeedBack('add_award','sp1');}?></span></div>
      <div class="col-12"><span class="errmsg"><?php if(!empty($_SESSION['err'])){errFeedBack('add_award','sp6A');}?></span></div>
      <div class="col-12"><span class="errmsg"><?php if(!empty($_SESSION['err'])){errFeedBack('add_award','sp');}?></span></div>
    </div>
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
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="col-12"><span class="errmsg"><?php if(!empty($_SESSION['err'])){errFeedBack('add_award','sp1M');}?></span></div>
      <div class="col-12"><span class="errmsg"><?php if(!empty($_SESSION['err'])){errFeedBack('add_award','sp1');}?></span></div>
      <div class="col-12"><span class="errmsg"><?php if(!empty($_SESSION['err'])){errFeedBack('add_award','sp6A');}?></span></div>
      <div class="col-12"><span class="errmsg"><?php if(!empty($_SESSION['err'])){errFeedBack('add_award','sp');}?></span></div>
    </div>

    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="col-12"><span class="errmsg"><?php if(!empty($_SESSION['err'])){errFeedBack('add_award','sp1M');}?></span></div>
      <div class="col-12"><span class="errmsg"><?php if(!empty($_SESSION['err'])){errFeedBack('add_award','sp1');}?></span></div>
      <div class="col-12"><span class="errmsg"><?php if(!empty($_SESSION['err'])){errFeedBack('add_award','sp6A');}?></span></div>
      <div class="col-12"><span class="errmsg"><?php if(!empty($_SESSION['err'])){errFeedBack('add_award','sp');}?></span></div>
    </div>
    <div class="col-10 my-2 d-flex justify-content-center">
      <button type="submit" class="btn btn-info mx-2">送出</button>
      <button type="reset" class="btn btn-warning mx-2">重填</button>
    </div>        
    </div>                                        
  </div>
</form>  
<?php
  unset($_SESSION['err']);                         
?> 
<?php
  include_once "./base.php";
?>
<form class="container" action="./api/award/insert_award.php" method="post">
  <div class="row justify-content-center">
    <div class="col-sm-10 col-md-8 col-lg-6 mx-md-5 px-0 mt-2 text-center h5 font-weight-bold">開獎期別</div>
    <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2 row">
      <div class="input-group col-md-7 mx-0 px-0">
        <div class="input-group-prepend">
          <span class="input-group-text">年度</span>
        </div>
        <input type="text" class="form-control" name="year" placeholder="請輸入西元年" required>
      </div>
      <div class="input-group col-md-5 mx-0 px-0">
        <div class="input-group-prepend">
          <span class="input-group-text">月份</span>
        </div>
        <select type="number" class="form-control" name="period" required>
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
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0">
      <?php if(!empty($_SESSION['err'])){?><div class="col-12"><span class="errmsg"><?=errFeedBack('add_award','notyet');?></span></div><?php } ?>
    </div>
  <!-- 獎號輸入 -->
    <div class="col-sm-10 col-md-8 col-lg-6 mx-md-5 mt-3 text-center h5 font-weight-bold">獎號資訊</div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2"> <!-- 特別獎 -->
      <div class="input-group-prepend">
        <span class="input-group-text">特別獎</span>
      </div>
      <input type="text" class="form-control" name="1K">
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0"><!-- 特別獎：輸入後回覆訊息 -->
      <?php if(!empty($_SESSION['err'])){?><div class="col-12"><span class="errmsg"><?=errFeedBack('add_award','1K');?></span></div><?php }?>
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2"><!-- 特獎 -->
      <div class="input-group-prepend">
        <span class="input-group-text">特獎</span>
      </div>
      <input type="text" class="form-control" name="1M">
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0"><!-- 特獎：輸入後回覆訊息 -->
      <?php if(!empty($_SESSION['err'])){?><div class="col-12"><span class="errmsg"><?=errFeedBack('add_award','1M');?></span></div><?php }?>
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2"><!-- 頭獎 -->
      <div class="input-group-prepend">
        <span class="input-group-text">頭獎</span>
        <span class="input-group-text bg-light">第一組</span>
      </div>
      <input type="text" class="form-control" name="1[]">
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0"><!-- 頭獎：輸入後回覆訊息 -->
      <?php if(!empty($_SESSION['err'])){?><div class="col-12"><span class="errmsg"><?=errFeedBack('add_award','0');?></span></div><?php }?>
    </div> 
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2"><!-- 頭獎 -->
      <div class="input-group-prepend">
        <span class="input-group-text">頭獎</span>
        <span class="input-group-text bg-light">第二組</span>
      </div>
      <input type="text" class="form-control" name="1[]">
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0"><!-- 頭獎：輸入後回覆訊息 -->
      <?php if(!empty($_SESSION['err'])){?><div class="col-12"><span class="errmsg"><?=errFeedBack('add_award','1');?></span></div><?php }?>
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2"><!-- 頭獎 -->
      <div class="input-group-prepend">
        <span class="input-group-text">頭獎</span>
        <span class="input-group-text bg-light">第三組</span>
      </div>
      <input type="text" class="form-control" name="1[]">
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0"><!-- 頭獎：輸入後回覆訊息 -->
      <?php if(!empty($_SESSION['err'])){?><div class="col-12"><span class="errmsg"><?=errFeedBack('add_award','1');?></span></div><?php }?>
    </div>
    
    <!-- 增開獎項 -->
    <div class="col-sm-10 col-md-8 col-lg-6 mx-md-5 mt-3 text-center h5 font-weight-bold">增開獎號</div>
    <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2 row"><!-- 增開獎 -->
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
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0"><!-- 增開獎：輸入後回覆訊息 -->
      <?php if(!empty($_SESSION['err']['add_award']['sp1M'][0])){?><div class="col-12"><span class="errmsg"><?php echo $_SESSION['err']['add_award']['sp1M'][0];?></span></div><?php }?>
      <?php if(!empty($_SESSION['err']['add_award']['sp1'][0])){?><div class="col-12"><span class="errmsg"><?php echo $_SESSION['err']['add_award']['sp1'][0];?></span></div><?php }?>
      <?php if(!empty($_SESSION['err']['add_award']['sp6A'][0])){?><div class="col-12"><span class="errmsg"><?php echo $_SESSION['err']['add_award']['sp6A'][0];?></span></div><?php }?>
      <?php if(!empty($_SESSION['err']['add_award']['sp'][0])){?><div class="col-12"><span class="errmsg"><?php echo $_SESSION['err']['add_award']['sp'][0];?></span></div><?php }?>
    </div>
    <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2 row"><!-- 增開獎 -->
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
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0"><!-- 增開獎：輸入後回覆訊息 -->
      <?php if(!empty($_SESSION['err']['add_award']['sp1M'][1])){?><div class="col-12"><span class="errmsg"><?php echo $_SESSION['err']['add_award']['sp1M'][1];?></span></div><?php }?>
      <?php if(!empty($_SESSION['err']['add_award']['sp1'][1])){?><div class="col-12"><span class="errmsg"><?php echo $_SESSION['err']['add_award']['sp1'][1];?></span></div><?php }?>
      <?php if(!empty($_SESSION['err']['add_award']['sp6A'][1])){?><div class="col-12"><span class="errmsg"><?php echo $_SESSION['err']['add_award']['sp6A'][1];?></span></div><?php }?>
      <?php if(!empty($_SESSION['err']['add_award']['sp'][1])){?><div class="col-12"><span class="errmsg"><?php echo $_SESSION['err']['add_award']['sp'][1];?></span></div><?php }?>
    </div>
    <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2 row"><!-- 增開獎 -->
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
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0"><!-- 增開獎：輸入後回覆訊息 -->
      <?php if(!empty($_SESSION['err']['add_award']['sp1M'][2])){?><div class="col-12"><span class="errmsg"><?php echo $_SESSION['err']['add_award']['sp1M'][2];?></span></div><?php }?>
      <?php if(!empty($_SESSION['err']['add_award']['sp1'][2])){?><div class="col-12"><span class="errmsg"><?php echo $_SESSION['err']['add_award']['sp1'][2];?></span></div><?php }?>
      <?php if(!empty($_SESSION['err']['add_award']['sp6A'][2])){?><div class="col-12"><span class="errmsg"><?php echo $_SESSION['err']['add_award']['sp6A'][2];?></span></div><?php }?>
      <?php if(!empty($_SESSION['err']['add_award']['sp'][2])){?><div class="col-12"><span class="errmsg"><?php echo $_SESSION['err']['add_award']['sp'][2];?></span></div><?php }?>
    </div>
    <div class="col-10 my-2 d-flex justify-content-center"><!-- 送出 -->
      <button type="submit" class="btn btn-info mx-2">送出</button>
      <button type="reset" class="btn btn-warning mx-2">重填</button>
    </div> 
  </div>
</form>  
<?php
  unset($_SESSION['err']); ?>
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

  </div>
  <!-- 輸入單張發票號碼兌獎，這可以不鎖帳戶 -->
<?php
if(!empty($_SESSION['acc'])){
?>
<form class="container" action="./api/check_reward_all.php" method="post">
<!-- 輸入單張發票號碼兌獎，這可以不鎖帳戶 -->
  <div class="row justify-content-center">
    <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2 h5 font-weight-bold text-center">批次發票對獎</div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="input-group col-md-5 mx-0 px-0">
        <div class="input-group-prepend">
          <span class="input-group-text">年度</span>
        </div>
        <input type="text" class="form-control" name="year" value="<?=$year;?>">
      </div>
      <div class="input-group col-md-7 mx-0 px-0">
        <div class="input-group-prepend">
          <span class="input-group-text px-1 px-sm-2 px-md-3 text-07">月份</span>
        </div>
        <select type="number" class="form-control px-1 px-sm-2 px-md-3 text-07" name="periodA">
          <option value="<?=$periodA;?>"><?=$periodCH[$periodA];?></option>
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
      <?php if(!empty($_SESSION['err'])){?><div><span class="errmsg"><?php errFeedBack('check_reward','periodAS');?></span></div><?php }?>
    </div>
    <div class="col-6 my-2 d-flex justify-content-center">
      <button type="submit" class="btn btn-info mx-2">送出</button>
      <button type="reset" class="btn btn-warning mx-2">重填</button>
    </div>
  </div>
</form>
<?php }?>

<!-- 輸入單張發票號碼兌獎，這可以不鎖帳戶 -->
<form class="container" action="./api/check_reward_single.php" method="post">
  <div class="row justify-content-center mt-4">
    <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2 h5 font-weight-bold text-center">手動單張對獎</div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">發票號碼</span>
        </div>
        <input type="text" class="form-control" name="num" placeholder="請輸入8位數字" required>
      </div>
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="input-group-prepend">
        <span class="input-group-text">發票年度</span>
      </div>
      <input type="number" class="form-control" name="year" value="<?=$year;?>">
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <div class="input-group-prepend">
        <span class="input-group-text">對獎月份</span>
      </div>
      <select type="number" class="form-control" name="periodA">
        <option value="<?=$periodA;?>"><?=$periodCH[$periodA];?></option>
        <option value="1">01 ~ 02 月</option>
        <option value="2">03 ~ 04 月</option>
        <option value="3">05 ~ 06 月</option>
        <option value="4">07 ~ 08 月</option>
        <option value="5">09 ~ 10 月</option>
        <option value="6">11 ~ 12 月</option>
      </select>
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <?php if(!empty($_SESSION['err'])){?><div><span class="errmsg"><?=errFeedBack('check_award','periodAS');?></span></div><?php }?>
      <?php if(!empty($_SESSION['err'])){?><div><span class="errmsg"><?=errFeedBack('check_award','num');?></span></div><?php }?>
    </div>
    <div class="col-6 my-2 d-flex justify-content-center">
      <button type="submit" class="btn btn-info mx-2">送出</button>
      <button type="reset" class="btn btn-warning mx-2">重填</button>
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2">
      <?php if(!empty($_SESSION['reward'])){?><div><span class="reward-C">恭喜您在<?=$_SESSION['reward']['year'];?>年
      <?=$periodCH[$_SESSION['reward']['period']];?>中獎！<br>獎項為<?=$_SESSION['reward']['name'];?>號碼為<span class="text-danger font-weight-bolder"><?=$_SESSION['reward']['num'];?></span>
      <br>獎金為<?=$_SESSION['reward']['amountC'];?></span>
    </div><?php }?>
    </div>

  </div>
</form>  

<?php
unset($_SESSION['err']);
unset($_SESSION['reward']);
?>
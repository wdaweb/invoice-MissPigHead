<?php
  include_once "./base.php";  
?>
<div class="container" id="awardList">
  <div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-8 col-lg-6 mx-md-5 px-0 mt-2 text-center h5 font-weight-bold">開獎期別</div>
    <form class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2 row justify-content-center" action="./api/award/select_award.php" method="post">
      <div class="input-group col-5 mx-0 px-0">
        <div class="input-group-prepend">
          <span class="input-group-text px-1 px-sm-2 px-md-3 text-xxs-08">年度</span>
        </div>
        <input type="text" class="form-control px-1 px-sm-3" name="year" value="<?=$_SESSION['year']?>">
      </div>
      <div class="input-group col-7 mx-0 px-0">
        <div class="input-group-prepend">
          <span class="input-group-text px-1 px-sm-2 px-md-3 text-xxs-08">月份</span>
        </div>
        <select type="number" class="form-control px-1 px-sm-3" name="periodA">
          <option value="<?=$_SESSION['periodA']?>"><?=$_SESSION['periodCHA'][$_SESSION['periodA']]?></option>
          <option value="1">01 ~ 02 月</option>
          <option value="2">03 ~ 04 月</option>
          <option value="3">05 ~ 06 月</option>
          <option value="4">07 ~ 08 月</option>
          <option value="5">09 ~ 10 月</option>
          <option value="6">11 ~ 12 月</option>
        </select>
      </div>
      <div class="col-12">
        <?php if(!empty($_SESSION['err'])){?><div><span class="errmsg"><?=errFeedBack('award_list','notyet');?></span></div><?php }?>
        <?php if(!empty($_SESSION['err'])){?><div><span class="errmsg"><?=errFeedBack('award_list','expired');?></span></div><?php }?>
      </div>
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-2 row d-flex  justify-content-center">
        <button type="submit" class="btn btn-info mx-2 text-xxs-08">送出</button>
      </div>
    </form>
    <?php if(empty($_SESSION['err']['award_list']['notyet'])){?>
    <!-- 列出開獎獎號 -->
    <div class="col-12 col-sm-10 col-md-8 col-lg-6 mx-md-5 mt-3 text-center h5 font-weight-bold">開獎獎號</div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-1">  <!-- 特別獎 -->
      <div class="input-group-prepend">
        <span class="input-group-text px-1 px-sm-2 px-md-3 text-xxs-08">特別獎</span>
      </div>
      <input type="text" class="form-control px-1 px-sm-3 award-n" value="<?=$_SESSION['rows_1K'][0]['num'];?>">
      <div class="input-group-prepend">
        <span class="input-group-text px-1 px-sm-2 px-md-3 border-left-0 text-xxs-08">獎金</span>
      </div>
      <input type="text" class="form-control px-1 px-sm-2 px-md-3 " value="<?=$_SESSION['rows_1K'][0]['amountC'];?>">
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-1">  <!-- 特獎 -->
      <div class="input-group-prepend">
        <span class="input-group-text px-1 px-sm-2 px-md-3 text-xxs-08">特獎</span>
      </div>
      <input type="text" class="form-control px-1 px-sm-3 award-n" value="<?=$_SESSION['rows_1M'][0]['num'];?>">
      <div class="input-group-prepend">
        <span class="input-group-text px-1 px-sm-2 px-md-3 border-left-0 text-xxs-08">獎金</span>
      </div>
      <input type="text" class="form-control px-1 px-sm-2 px-md-3 " value="<?=$_SESSION['rows_1M'][0]['amountC'];?>">
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 mt-1">  <!-- 頭獎-1 -->
      <div class="input-group-prepend">
        <span class="input-group-text px-1 px-sm-2 px-md-3 text-xxs-08">頭獎</span>
        <span class="input-group-text bg-light px-1 px-sm-2 px-md-3 text-xxs-08">第一組</span>
      </div>
      <input type="text" class="form-control award-n" value="<?=$_SESSION['rows_1'][0]['num'];?>">
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-0">  <!-- 頭獎-2 -->
      <div class="input-group-prepend">
        <span class="input-group-text px-1 px-sm-2 px-md-3 border-top-0 text-xxs-08">頭獎</span>
        <span class="input-group-text bg-light px-1 px-sm-2 px-md-3 border-top-0 text-xxs-08">第二組</span>
      </div>
      <input type="text" class="form-control border-top-0 award-n" value="<?=$_SESSION['rows_1'][1]['num'];?>">
    </div>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-0">  <!-- 頭獎-3 -->
      <div class="input-group-prepend">
        <span class="input-group-text px-1 px-sm-2 px-md-3 border-top-0 text-xxs-08">頭獎</span>
        <span class="input-group-text bg-light px-1 px-sm-2 px-md-3 border-top-0 text-xxs-08">第三組</span>
      </div>
      <input type="text" class="form-control border-top-0 award-n" value="<?=$_SESSION['rows_1'][2]['num'];?>">
    </div>
    <?php
    for($i=0;$i<6;$i++){
    ?>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 my-0">  <!-- 頭~六獎對獎說明 -->

      <div class="input-group-prepend">
        <span class="input-group-text px-1 px-sm-2 px-md-3 border-top-0 text-xxs-08"><?=$_SESSION['rows_p'][$i]['name'];?></span>
        <span class="input-group-text bg-light px-1 px-sm-2 px-md-3 border-top-0">對中頭獎<span class="font-weight-bolder"><?=(8-$i);?></span>碼</span>
      </div>
      <div class="input-group-prepend">
        <span class="input-group-text px-1 px-sm-2 px-md-3 border-top-0 text-xxs-08">獎金</span>
      </div>
      <input type="text" class="form-control border-top-0" value="<?=$_SESSION['rows_p'][$i]['amountC'];?>">
    </div>
  <?php }?>
  <?php for($i=0;$i<$_SESSION['t_6A'];$i++){ if($i==0){?>
    <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0 mt-2">  <!-- 增開六獎 -->
    <div class="input-group-prepend">
        <span class="input-group-text px-1 px-sm-2 px-md-3 text-xxs-08">增開六獎</span>
        <span class="input-group-text bg-light px-1 px-sm-2 px-md-3 text-xxs-08">第<?=($i+1);?>組</span>
      </div>
      <input type="text" class="form-control award-n" value="<?=$_SESSION['rows_6A'][$i]['num'];?>">
    </div>
    <?php }else{?>
      <div class="input-group col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-md-5 px-0">  <!-- 增開六獎 -->
      <div class="input-group-prepend">
        <span class="input-group-text px-1 px-sm-2 px-md-3 border-top-0 text-xxs-08">增開六獎</span>
        <span class="input-group-text bg-light px-1 px-sm-2 px-md-3 border-top-0 text-xxs-08">第<?=($i+1);?>組</span>
      </div>
      <input type="text" class="form-control award-n border-top-0" value="<?=$_SESSION['rows_6A'][$i]['num'];?>">
    </div>
  <?php }}}
    unset($_SESSION['err']);                         
  ?> 
  </div>     
</div>
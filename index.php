<?php
  include_once('header.php');
  include_once('base.php');
  ?>
<body>
<section id="menu">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-lg-4 px-xl-5">
    <a class="navbar-brand" href="./index.php">統一發票-紀錄與對獎</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item mx-1">
          <a class="nav-link" href="./index.php">回首頁 <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown mx-1">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">發票管理及消費紀錄</a>
          <div class="dropdown-menu bg-secondary">
            <a class="dropdown-item text-white" href="./index.php?do=add_invoice">輸入發票資料</a>
            <!-- 參考寫到iframe的方式  <a href="results/leather1.html" target="imain"> -->
            <div class="dropdown-divider"></div>
            <a class="dropdown-item text-white" href="./api/list_invoice.php">發票列表及操作</a>
            <div class="dropdown-divider"></div>
            <!-- <a class="dropdown-item text-white" href="./index.php?do=">查詢特定發票</a>
            <div class="dropdown-divider"></div> -->
            <a class="dropdown-item text-white" href="./index.php?do=summary_invoice">統計消費紀錄</a>
          </div>
        </li>
        <li class="nav-item dropdown mx-1">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">開獎號碼及對獎</a>
          <div class="dropdown-menu bg-secondary">
            <a class="dropdown-item text-white" href="./index.php?do=check_award">查詢開獎獎號</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item text-white" href="./api/check_reward_all.php">發票對獎</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item text-white" href="./index.php?do=add_award">輸入開獎獎號</a>
          </div>
        </li>
        <li class="nav-item dropdown mx-1">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">使用者資料管理</a>
          <div class="dropdown-menu bg-secondary">
            <a class="dropdown-item text-white" href="./index.php?do=edit_user">編輯個人資料</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item text-white" href="./index.php?do=reward_record">查詢得獎記錄</a>
          </div>
        </li>
        <?php if(!empty($_SESSION['acc'])){ ?>
          <li class="nav-item mx-1">
            <a class="nav-link" href="./logout_user.php" role="button">登入/登出</a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </nav>
</section>

<section id="main">
  <div class="container mt-1 mt-md-4 mainframe">
    <?php
      if(isset($_GET['do'])){
        $file=$_GET['do'].".php";
        include $file;
      }else{
        include "login.php";
      }
    ?>
  </div>
</section>

<script src="./js/jquery-3.5.1.min.js"></script>
<script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>
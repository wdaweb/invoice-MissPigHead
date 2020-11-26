# 統一發票消費紀錄及對獎
 
## 功能：
```
1. 使用者登入：
   - 一般使用者：僅可查閱及管理個人帳戶內發票
   - 管理員：可管理所有發票
    
2. 發票記錄：
   使用者可輸入/修改/刪除發票資訊，包含：
   - 發票字軌(必填)
   - 發票號碼(必填)
   - 消費日期(必填)
   - 對獎年度  (<<- 12月/1月，發票期別調整時 需同時調整年度)
   - 對獎期別  (<<- 12月/1月，發票期別調整時 需同時調整年度)
   - 消費金額
   - 消費類型
   - 消費店家
   - 其他備註
     (上述資料將存儲於資料庫)    
  
3. 發票《查詢》及《統計》
   使用者登入後可依照以下內容進行查詢：
   - 消費日期，單日或區間
   - 消費金額，特定金額或區間
   - 對獎期別
   - 消費類型
   - 消費店家
    
4. 獎號管理：
   管理員可輸入各期開獎獎號，包含：
   - 特別獎：獎號1組
   - 特獎：獎號1組
   - 頭獎：獎號3組
   - 增開六獎：獎號組數隨政府政策動態調整，目前1組
     (上述資料將存儲於資料庫)    
     
5. 發票對獎：
   使用者可針對單張發票，或特定期別所有發票，進行對獎。

6. 發票獎項統計：
   可顯示帳戶下中獎發票明細，如獎項、張數、獎金等。

7. 提醒：
   針對開獎日及對獎截止日期進行倒數，提醒使用者兌換獎項以免逾期。
```

## 資料庫：
```
1. 使用者 - users
   - u_id
   - u_acc (<<-4~10字元，英文或數字，帳號不可重複)
   - u_pw (<<-8~16字元，英文或數字)
   - u_birth
   - u_tel 
   - u_email
   
2. 發票 - invoice
   - i_id
   - i_code
   - i_num
   - i_date
   - i_year (<<- 12月/1月，發票期別調整時 需同時調整年度)
   - i_period  (<<- 12月/1月，發票期別調整時 需同時調整年度)
   - i_amount
   - i_type
   - i_store
   - i_other
   - i_acc  (<<- 關聯使用者)

3. 獎號 - awards
   - a_id 
   - a_year
   - a_period
   - a_num
   - a_type  (<<- 關聯獎金)

4. 獎金 - prize
   - p_id 
   - p_type
   - p_amount
   
5. 中獎紀錄表- reward
   - r_id 
   - r_acc  (<<- 關聯使用者)
   - r_num  (<<- 關聯獎號)
   - r_year  (<<- 關聯獎號)
   - r_period  (<<- 關聯獎號)

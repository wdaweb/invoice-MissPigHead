<?php
// 產生1000000筆假發票
// 每次寫入100筆，將connection 從100萬次，降低為1萬次，避免timeout

$dsn = "mysql:host=localhost;dbname=invoicesys;charset=utf8";
$pdo = new PDO($dsn,'root','');

$ABC=['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];

for($i=0;$i<2500;$i++){
    for($j=0;$j<400;$j++){
        $inv_code=$ABC[rand(0,25)].$ABC[rand(0,25)];
        $inv_number=rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
        $start_date_timestamp=strtotime('03/01/2019'); // m/d/Y, set start date here
        $end_date_timestamp=strtotime('11/15/2020'); // m/d/Y, set end date here
        $payment_date=date('Y-m-d',rand($start_date_timestamp,$end_date_timestamp));
        $payment_year=date('y',strtotime($payment_date));
        $payment_period=ceil(date('m',strtotime($payment_date))/2);
        $payment_amount=rand(1,1000)*pow(10,rand(0,3)); 
        $value[$j]="'$inv_code','$inv_number','$payment_date','$payment_period','$payment_amount','$inv_code$inv_number.$payment_period.$payment_year'";
        // 增加檢查碼 = 發票號加期別(應該要再加入年份) 
        // 在table 設定check_code 為unique
    }
    $sql="insert into `invoices`(`inv_code`,`inv_number`,`payment_date`,`payment_period`,`payment_amount`,`check_code`) values
    ($value[0]),($value[1]),($value[2]),($value[3]),($value[4]),($value[5]),($value[6]),($value[7]),($value[8]),($value[9]),
    ($value[10]),($value[11]),($value[12]),($value[13]),($value[14]),($value[15]),($value[16]),($value[17]),($value[18]),($value[19]),
    ($value[20]),($value[21]),($value[22]),($value[23]),($value[24]),($value[25]),($value[26]),($value[27]),($value[28]),($value[29]),
    ($value[30]),($value[31]),($value[32]),($value[33]),($value[34]),($value[35]),($value[36]),($value[37]),($value[38]),($value[39]),
    ($value[40]),($value[41]),($value[42]),($value[43]),($value[44]),($value[45]),($value[46]),($value[47]),($value[48]),($value[49]),
    ($value[50]),($value[51]),($value[52]),($value[53]),($value[54]),($value[55]),($value[56]),($value[57]),($value[58]),($value[59]),
    ($value[60]),($value[61]),($value[62]),($value[63]),($value[64]),($value[65]),($value[66]),($value[67]),($value[68]),($value[69]),
    ($value[70]),($value[71]),($value[72]),($value[73]),($value[74]),($value[75]),($value[76]),($value[77]),($value[78]),($value[79]),
    ($value[80]),($value[81]),($value[82]),($value[83]),($value[84]),($value[85]),($value[86]),($value[87]),($value[88]),($value[89]),
    ($value[90]),($value[91]),($value[92]),($value[93]),($value[94]),($value[95]),($value[96]),($value[97]),($value[98]),($value[99]),
    ($value[100]),($value[101]),($value[102]),($value[103]),($value[104]),($value[105]),($value[106]),($value[107]),($value[108]),($value[109]),
    ($value[110]),($value[111]),($value[112]),($value[113]),($value[114]),($value[115]),($value[116]),($value[117]),($value[118]),($value[119]),
    ($value[120]),($value[121]),($value[122]),($value[123]),($value[124]),($value[125]),($value[126]),($value[127]),($value[128]),($value[129]),
    ($value[130]),($value[131]),($value[132]),($value[133]),($value[134]),($value[135]),($value[136]),($value[137]),($value[138]),($value[139]),
    ($value[140]),($value[141]),($value[142]),($value[143]),($value[144]),($value[145]),($value[146]),($value[147]),($value[148]),($value[149]),
    ($value[150]),($value[151]),($value[152]),($value[153]),($value[154]),($value[155]),($value[156]),($value[157]),($value[158]),($value[159]),
    ($value[160]),($value[161]),($value[162]),($value[163]),($value[164]),($value[165]),($value[166]),($value[167]),($value[168]),($value[169]),
    ($value[170]),($value[171]),($value[172]),($value[173]),($value[174]),($value[175]),($value[176]),($value[177]),($value[178]),($value[179]),
    ($value[180]),($value[181]),($value[182]),($value[183]),($value[184]),($value[185]),($value[186]),($value[187]),($value[188]),($value[189]),
    ($value[190]),($value[191]),($value[192]),($value[193]),($value[194]),($value[195]),($value[196]),($value[197]),($value[198]),($value[199]),
    ($value[200]),($value[201]),($value[202]),($value[203]),($value[204]),($value[205]),($value[206]),($value[207]),($value[208]),($value[209]),
    ($value[210]),($value[211]),($value[212]),($value[213]),($value[214]),($value[215]),($value[216]),($value[217]),($value[218]),($value[219]),
    ($value[220]),($value[221]),($value[222]),($value[223]),($value[224]),($value[225]),($value[226]),($value[227]),($value[228]),($value[229]),
    ($value[230]),($value[231]),($value[232]),($value[233]),($value[234]),($value[235]),($value[236]),($value[237]),($value[238]),($value[239]),
    ($value[240]),($value[241]),($value[242]),($value[243]),($value[244]),($value[245]),($value[246]),($value[247]),($value[248]),($value[249]),
    ($value[250]),($value[251]),($value[252]),($value[253]),($value[254]),($value[255]),($value[256]),($value[257]),($value[258]),($value[259]),
    ($value[260]),($value[261]),($value[262]),($value[263]),($value[264]),($value[265]),($value[266]),($value[267]),($value[268]),($value[269]),
    ($value[270]),($value[271]),($value[272]),($value[273]),($value[274]),($value[275]),($value[276]),($value[277]),($value[278]),($value[279]),
    ($value[280]),($value[281]),($value[282]),($value[283]),($value[284]),($value[285]),($value[286]),($value[287]),($value[288]),($value[289]),
    ($value[290]),($value[291]),($value[292]),($value[293]),($value[294]),($value[295]),($value[296]),($value[297]),($value[298]),($value[299]),
    ($value[300]),($value[301]),($value[302]),($value[303]),($value[304]),($value[305]),($value[306]),($value[307]),($value[308]),($value[309]),
    ($value[310]),($value[311]),($value[312]),($value[313]),($value[314]),($value[315]),($value[316]),($value[317]),($value[318]),($value[319]),
    ($value[320]),($value[321]),($value[322]),($value[323]),($value[324]),($value[325]),($value[326]),($value[327]),($value[328]),($value[329]),
    ($value[330]),($value[331]),($value[332]),($value[333]),($value[334]),($value[335]),($value[336]),($value[337]),($value[338]),($value[339]),
    ($value[340]),($value[341]),($value[342]),($value[343]),($value[344]),($value[345]),($value[346]),($value[347]),($value[348]),($value[349]),
    ($value[350]),($value[351]),($value[352]),($value[353]),($value[354]),($value[355]),($value[356]),($value[357]),($value[358]),($value[359]),
    ($value[360]),($value[361]),($value[362]),($value[363]),($value[364]),($value[365]),($value[366]),($value[367]),($value[368]),($value[369]),
    ($value[370]),($value[371]),($value[372]),($value[373]),($value[374]),($value[375]),($value[376]),($value[377]),($value[378]),($value[379]),
    ($value[380]),($value[381]),($value[382]),($value[383]),($value[384]),($value[385]),($value[386]),($value[387]),($value[388]),($value[389]),
    ($value[390]),($value[391]),($value[392]),($value[393]),($value[394]),($value[395]),($value[396]),($value[397]),($value[398]),($value[399])";

    $pdo->exec($sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>線上月曆</title>
<link rel="stylesheet" href="./css/style.css">

</head>
<body class="main">
  <!-- <h1>萬年曆</h1> -->
  <?php
  /*請在這裹撰寫你的萬年曆程式碼*/  
?>
     <?php
$ps = [
    "./images/Luffy.png",
    "./images/Zoro.png",
    "./images/Nami.png",
    "./images/Usopp.png",
    "./images/Sanji.png",
    "./images/Chopper.png",
    "./images/Robin.png",
    "./images/Franky.png",
    "./images/Brook.png",
    "./images/Jinbe.png",
    "./images/Vivi.png",
    "./images/Ace.png",
];

  $name = [
    "蒙其·D·魯夫",
    "羅羅亞·索隆",
    "娜美",
    "騙人布",
    "賓什莫克·香吉士",
    "多尼多尼·喬巴",
    "妮可·羅賓",
    "佛朗基",
    "布魯克",
    "吉貝爾",
    "納菲魯塔利·薇薇",
    "艾斯"
];
    $money = [
        "懸賞金：15億貝里",
"懸賞金：3億2000萬貝里",
"懸賞金：6千600萬貝里",
"懸賞金：2億貝里",
"懸賞金：3億3000萬貝里",
"懸賞金：100貝里",
"懸賞金：1億3000萬貝里",
"懸賞金：9400萬貝里",
"懸賞金：8300萬貝里",
"懸賞金：4億3800萬貝里",
"懸賞金：無",
"懸賞金：5億貝里",
    ];

    $age = [
        "年齡：19歲",
"年齡：21歲",
"年齡：20歲",
"年齡：19歲",
"年齡：21歲",
"年齡：17歲",
"年齡：30歲",
"年齡：36歲",
"年齡：90歲",
"年齡：46歲",
"年齡：18歲",
"年齡：20歲(享年)",
    ];
    $address = [
        "出身地：東海佛夏村",
"出身地：東海西摩志基村",
"居住地：東海可可亞西村",
"出身地：東海西羅布村",
"出身地：北海",
"出身地：偉大的航道櫻花王國",
"出身地：西海歐哈拉",
"出身地：南海",
"出身地：西海",
"出身地：龍宮王國·魚人街",
"出身地：偉大的航道阿拉巴斯坦王國",
"出身地：東海佛夏村",
    ];
    $height = [
        "身高：174公分",
"身高：181公分",
"身高：170公分",
"身高：176公分",
"身高：180公分",
"身高：90公分(人獸型)",
"身高：188公分",
"身高：240公分",
"身高：277公分",
"身高：?公分",
"身高：169公分",
"身高：185公分",
    ];

$bth = [
"生日：5月5日",
"生日：11月11日",
"生日：7月3日",
"生日：4月1日",
"生日：3月2日",
"生日：12月24日",
"生日：2月6日",
"生日：3月9日",
"生日：4月3日",
"生日：4月2日",
"生日：2月2日",
"生日：1月1日",
];

    //這邊是顯示當前我在的月份(控制線上月曆下面的那一行)
    if(isset($_GET['month'])){ //如果GET回傳的位置是有變數的，則回傳GET位置的變數
        $month=$_GET['month'];
        $year=$_GET['year'];
    }else{
        $month=date("m"); //如果GET回傳的位置是沒變數的，則為這個月的月份
        $year=date("Y");
    }
    
    $lastmonth=$month-1;
    $lastyear=$year;
    
    $nextmonth=$month+1;
    $nextyear=$year;
    
    //這邊沒有設定好的話
    // 會有0月-1月-2月13月14月之類的跑出來
    if($month==1){
        $lastmonth=12;
        $lastyear=$year-1;
        
        $nextmonth=$month+1;
        $nextyear=$year;
        
    }else if($month==12){
        
        $lastmonth=$month-1;
        $lastyear=$year;
        
        $nextmonth=1;
        $nextyear=$year+1;
    }
    
    
    $firstDay=date("$year-$month-01");
    $firstWeekWhiteDays=date("w",strtotime($firstDay));
    $monthDays=date("t",strtotime($firstDay));
    $firstWeekDays=7-$firstWeekWhiteDays;
    $weeks=ceil(($firstWeekWhiteDays+$monthDays)/7);
    $lastWeekDays=($firstWeekWhiteDays+$monthDays)%7;
    $lastWeekWhiteDays=7-$lastWeekDays;
    $allCells=$weeks*7;
    //陣列中加入首列資料
    $headers=['日曜日','月曜日','火藥日','水曜日','木曜日','金曜日','土曜日'];
    
    //陣列中加入月前空白;
    for($i=0;$i<$firstWeekWhiteDays;$i++){
        $td[]="";
    }
    for($i=0;$i<$monthDays;$i++){ //決定當月有幾周
        $td[]=($i+1);
    }
    for($i=0;$i<$lastWeekWhiteDays;$i++){
        $td[]="";
    }
    
    ?>

<div class="header">
    <h1>カレンダー</h1>
    <h3><?=$year;?>年<?=$month;?>月</h3>
    <div class="header_a">
        <a href="index.php?year=<?=$year-1;?>&month=<?=$month;?>">上一年</a>
        <a href="index.php?year=<?=$lastyear;?>&month=<?=$lastmonth;?>">上個月</a>
        <a href="./index.php">現在所在月份</a>   
        <a href="index.php?year=<?=$nextyear;?>&month=<?=$nextmonth;?>">下個月</a>
        <a href="index.php?year=<?=$year+1;?>&month=<?=$month;?>">下一年</a>
    </div>   
</div>   


<div class="content">

    <div class="aside">
        <!-- <div class="picture">
        </div> -->
        <img src="<?= $ps[$month - 1];?>" alt="" srcset="" width="290px" height="337px">
        <div class="asideli">
        <?= $name[$month - 1];?> <br>
        <?= $money[$month - 1];?><br>
        <?= $age[$month - 1];?><br>
        <?= $address[$month - 1];?><br>
        <?= $height[$month - 1];?><br>
        <?= $bth[$month - 1];?><br>
        </div>
    </div>

<div class="calendar" >
    <!-- <tr class="weeek">
        <th>星期日</th>
        <th>星期一</th>
        <th>星期二</th>
        <th>星期三</th>
        <th>星期四</th>
        <th>星期五</th>
        <th>星期六</th>
    </tr> -->
<?php
// 月曆星期
foreach($headers as $header){
    echo "<div class='cell week'>";
    echo $header;
    echo "</div>";
}
?>
</tr>
<tr>
    <?php


// 月曆body的地方
for($i=0;$i<$allCells;$i++){
    $w=$i%7;
    if(is_numeric($td[$i])){
        $date=date("$year-$month-").$td[$i];
    }
    
    if($w==0 || $w==6){
        echo "<div class='dayoff cell'>";
    }else{
        echo "<div class='cell'>";
    }
    echo $td[$i];
    echo "</div>";
}
?>
</tr>
</div>
</div>


</body>
<html>

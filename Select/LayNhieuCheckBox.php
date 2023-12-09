<?php
$arrFull =[2,5,6];
if($_SERVER['REQUEST_METHOD']==='POST'){
    
    $seletedCheck = $_POST ;

    echo"<pre>";
    print_r($seletedCheck);
    echo"</pre>";




}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <button id="btn_remore">Bỏ chọn</button>
    <form action="" method="POST">
    <?php $dem=0; for($i=0;$i<7;$i++){$dem++; ?>
        <div>
            <input class="ban" type="checkbox" name="ban_<?= $dem ?>" <?= in_array($dem,$arrFull) ? 'disabled checked allow="false"' : '' ?> value='<?= $dem ?>'>
           
            <label for="ban1"><?=$dem?></label>
        </div>
    <?php }?>
    
    <button type="submit">Gửi</button>
    </form>
</body>


<?php foreach($arr as $i){ ?>
    <input type="checkbox" name="tra_loi_<?= $i['ID'] ?>" value="<?= $i['ID']?>">
    <?php } ?>

    <!-- $_POST=[
        ['tra_loi_1']=>1,
        ['tra_loi_2']=>2
        ]

    $dapAnDung=[];
    foreach($_POST as $n){
        array_push($dapAnDung,$n);
    }

    // $dapAnDung =[1,2]; => update
    
    foreach($dapAnDung as $ID_correct){
        $sql="update tra_loi set dapAnDung =1 where id =".$ID_correct;
    }
    
    $dapAnDung=[]; -->

<script src="ban.js"></script>
</html>


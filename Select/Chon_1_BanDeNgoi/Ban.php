<?php
if($_SERVER['REQUEST_METHOD']==='POST'){
    $seletedCheck = $_POST ;
    var_dump($seletedCheck);

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

    <div>
        <input class="ban" type="checkbox" name="ban_1" value='1' id="ban1">
        <label for="ban1">1</label>
    </div>
    <div>
        <input class="ban" type="checkbox" name="ban_2" value='2' id="ban2" checked disabled  allow="false">
        <input type="hidden" name="ban_2" value="2">
        <label for="ban2">2</label>
    </div>
    <div>
        <input class="ban" type="checkbox" name="ban_3" value='3' id="ban3">
        <label for="ban3">3</label>
    </div>
    <div>
        <input class="ban" type="checkbox" name="ban_4" value='4' id="ban4">
        <label for="ban4">4</label>
    </div>
    <button type="submit">Gửi</button>
    </form>
</body>

<script src="ban.js"></script>
</html>
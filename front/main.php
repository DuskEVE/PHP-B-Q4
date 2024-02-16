<?php
$typeId = (isset($_GET['type'])? $_GET['type']:0);
$nav = "";

if($typeId == 0) $nav = "全部商品";
else{
    $type = $Type->search(['id'=>$typeId]);
    if($type['main_id'] == 0) $nav = $type['name'];
    else{
        $main = $Type->search(['id'=>$type['main_id']]);
        $nav = "{$main['name']} > {$type['name']}";
    }
}
?>

<h2><?=$nav;?></h2>
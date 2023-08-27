<?php
$title=$_POST['title'];
$summary=$_POST['summary'];
$pics=$_POST['pics'];
$url=$_POST['url'];
$site=$_POST['site'];
header('Location: http://connect.qq.com/widget/shareqq/index.html?url='.$url.'&desc=&title='.$title.'&summary='.$summary.'&pics='.$pics.'&flash=&site='.$site.'&style=201&width=32&height=32');
?>

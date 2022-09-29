<!-- 调用方式为 域名/?msg=*qq=* -->
<?php
//如需要添加文字请取消注释下一行，并在根目录添加‘font.ttf’字体文件
//$msg = $_REQUEST['msg'];
$qq=$_GET["qq"];
if($qq==''){
header("Content-type: text/html; charset=utf-8");
echo 'QQ参数为空';//初步判断
}else{
header("Content-type:image/png");
$image = imagecreatetruecolor(639,733);
$white = imagecolorallocate($image, 255, 255, 255);
$black = imagecolorallocate($image, 0, 0, 0);
$qqimage1 =  imagecreatefromstring(file_get_contents('https://q4.qlogo.cn/g?b=qq&nk='.$qq.'&s=640')); 

$qianimg = imagecreatefrompng('index.png');
    //合成
imagecopyresized($image,$qqimage1,255,30,0,0,515,515,950,950);
imagecopyresized($image,$qianimg,0,0,0,0, 1145,1146,1085,1076);
//如需要添加文字请取消注释以下两行，并在根目录添加‘font.ttf’字体文件
// imagettftext($image, 50, 0, 130, 530, $black, 'font.ttf', $msg);
// imagettftext($image, 50, 0, 131, 531, $black, 'font.ttf', $msg);
imagepng($image);
imagedestroy($qqimage1);
imagedestroy($qianimg);
imagedestroy($image);//释放资源
}
?>

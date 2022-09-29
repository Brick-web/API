<!-- 调用方式为 域名/?qq= -->
<?php
$qq=$_GET["qq"];
if($qq==''){
header("Content-type: text/html; charset=utf-8");
echo 'QQ参数为空';//初步判断
}else{
header("Content-type:image/png");
$image = imagecreatetruecolor(760,638);
$white = imagecolorallocate($image, 255, 255, 255);
//imagefill($image, 0, 0, $white);//填充白色
$qqimg =  imagecreatefromstring(file_get_contents('https://q4.qlogo.cn/g?b=qq&nk='.$qq.'&s=640')); 

$img = imagecreatefrompng('index.png'); 
imagecopyresized($image,$qqimg,133,35,0,0, 550,550,630,630);
imagecopyresized($image,$img,0,0,0,0,760,638,760,638);//合成

//获取当前时间
// $time = date("Y-m-d H:i:s");
//获取用户ip
// $ip = $_SERVER["REMOTE_ADDR"];

ob_clean();
//以当前时间命名存储生成的图片，这里我是用来判断违规数据的
// imagejpeg($image,'image/'.$time.'-'.$qq.'.jpg');

//在浏览器显示生成的图片，生成格式后缀为bin
imagejpeg($image);
//可添加跳转，让用户可以从浏览器直接保存图片


imagedestroy($image);
imagedestroy($qqimg);
imagedestroy($img);
}
?>

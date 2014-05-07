<?php
defined('C5_EXECUTE') or die("Access Denied.");

if( strlen(INFORM_ADMIN_EMAIL)>1 && strstr(INFORM_ADMIN_EMAIL,'@') ){
    $to = INFORM_ADMIN_EMAIL;
}else{
    $adminUserInfo=UserInfo::getByID(USER_SUPER_ID);
    $to = $adminUserInfo->getUserEmail();
}

function gF($s){
	$s = substr((htmlspecialchars($_GET[$s])), 0, 350);
	if (strlen($s) > 1) {
		return $s;
	}
}

$t = array( (gf("txt")), (gf("err")), (gf("url")));

//$headers  = "Content-type: text/html; charset=utf-8 \r\n";
//$headers .= "From: Bukvus 1.1.0 <noreply@".($_SERVER["HTTP_HOST"]).">\r\n";

$title = "Найдена ошибка";
$mess = $t[0];
if ($t[1]) {
	$mess .= "<hr>Комментарий: ".$t[1];
}
$mess .= "<hr>".$t[2];

//mail($to, $title, $mess, $headers);

$mh = Loader::helper('mail');
$mh->setSubject($title);
$mh->setBodyHTML($mess);
$mh->to($to);
$mh->from('noreply@komanda-center.ru');
$mh->sendMail();
//echo $to;
if ($t[0]) {	
	$t[1] = "ok";
	$t[2] = "Спасибо, данные об ошибке отправлены";
} else {
    $t[1] = "error";
    $t[2] = "Ошибка отправки";
}
?>{
"result":  "<?=$t[1]?>",
"message": "<?=$t[2]?>"
}
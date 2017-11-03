<? 

session_start();
include "moduls/db.php";
include "moduls/define.php";

if (!isset($_GET['cat']) and !isset($_GET['id']) and !isset($_GET['date'])and !isset($_GET['uid'])and !isset($_GET['search']) and !isset($_GET['favorite'])) {
if ( $_SERVER['REQUEST_URI'] == '/' ) $page = 'home';
else {
	$page = substr($_SERVER['REQUEST_URI'], 1);
	if ( !preg_match('/^[A-z0-9]{3,15}$/', $page) ) not_found();
}


if ( file_exists($page.'.php') ) include $page.'.php';
	
}




function top($title,$what_is = false){
	include "moduls/header.php";
}

function bottom (){
	include "moduls/footer.php";
}
function valid_user(){
	if(!$_SESSION['id']){
		echo '<script type="text/javascript">go("login");</script>';
	}
}
function valid_new(){
	if(isset($_SESSION['id'])){
		echo '<script type="text/javascript">go("profile");</script>';
	}
}

function email_valid($email) {
	if ( !filter_var( $email, FILTER_VALIDATE_EMAIL))
		message('Помилка','E-mail вказаний невірно','error');
}
function password_valid($password) {
	if ( !preg_match('/^[A-z0-9]{8,30}$/', $password ))
		message('Помилка','Пароль вказаний невірно і може складатися з 8 - 30 символів A-z0-9','error');
}

function telephone_valid($tel){
	if((mb_strlen($tel) != 13) or(substr($tel, 0,1) != "+"))
		message('Помика','Номер телефона має бути в форматі "+380xxxxxxxxx"','error');
	return substr($tel,1);
}


function not_found() {
	exit('Сторінка 404');
}

function message($title, $text, $status) {
	exit (json_encode(array(
		'title' => $title,
		'text' => $text,
		'status' => $status,
	)));
}

function go($url) {
	exit('{"go":"'.$url.'"}');
}

function r2f ($num){
	return number_format((float)$num, 2,'.','');
}


function real_date($date){
	$nmonth = array(
		1 => 'січ.',
	    2 => 'лют.',
		3 => 'берез.',
		4 => 'квіт.',
		5 => 'трав.',
		6 => 'черв.',
		7 => 'лип.',
		8 => 'серп.',
		9 => 'верес.',
		10 => 'жовт.',
		11 => 'листоп.',
		12 => 'груд.'
	);
	$data_and_time = explode(" ", $date);
	$date_exp = explode("-", $data_and_time[0]);
	$time_exp = explode(":", $data_and_time[1]);

	if($data_and_time[0] == date("Y-m-d")) 
 		$dates = "Сьогодні в ".$time_exp[0].":".$time_exp[1];
 	elseif($data_and_time[0] == date("Y-m-d",strtotime("-1 day")) )
 		$dates = "Вчора в ".$time_exp[0].":".$time_exp[1];
 	elseif($date_exp[0] != date("Y")){
 		foreach ($nmonth as $key => $value) {
  			if($key == intval($date_exp[1])) 
  				$nmonth_name = $value;
 		}
 		$dates = $date_exp[1]." ".$nmonth_name." ".$date_exp[0]." р.";
 	}else{
 		foreach ($nmonth as $key => $value) {
  			if($key == intval($date_exp[1])) 
  				$nmonth_name = $value;
 	}
		$dates =  $date_exp[1]." ".$nmonth_name." в ".$time_exp[0].":".$time_exp[1];
 	}

	return $dates;
}

?>
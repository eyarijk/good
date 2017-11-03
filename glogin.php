<? 


if(isset($_POST['fistname'])){
email_valid($_POST['email']);
password_valid($_POST['password']);
if($_POST['password'] != $_POST['repassword']) message('Помилка','Паролі не збігаються!','error');

if (mysqli_num_rows(mysqli_query($db, "SELECT `id` FROM `users` WHERE `email` = '$_POST[email]'")))
		message('Помилка','Ця електронна адреса вже зареєстрована!','error');


$password = md5($_POST['password']);

$tel= telephone_valid($_POST['telephone']);
mysqli_query($db, "INSERT INTO `users` VALUES(NULL, '$_POST[email]', '$password','$_POST[fistname]','$tel','',0,0,0,0,15,0,'$_SERVER[REMOTE_ADDR]',' ',0,'')");
$about_id = mysqli_fetch_assoc(mysqli_query($db,"SELECT `id` FROM `users` WHERE `email` = '$_POST[email]' "));
mkdir('img/shop/'.$about_id['id'].'/');
message('Успіх','Ваш профіль створенний! Здійсніть вхід.','success');

}

else if(isset($_POST['emaill'])){
	email_valid($_POST['emaill']);
	password_valid($_POST['password']);
	$password = md5($_POST['password']);

	$query = mysqli_query($db, "SELECT * FROM `users` WHERE `email` = '$_POST[emaill]' AND `password` = '$password'");
	

	if (!mysqli_num_rows($query))
		message('Помилка','Неправильна електронна адреса чи пароль!','error');

	$queries = mysqli_fetch_assoc($query);

	if($queries['protect'] == 1){
		if($queries['ip'] != $_SERVER['REMOTE_ADDR'])
			message('Помилка','Доступ з цього IP заборонено!','error');
	}

	foreach ($queries as $key => $val){
		$_SESSION[$key] = $val;
	}

	
	go("profile");
	
}



?>
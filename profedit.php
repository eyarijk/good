<? 

if ($_POST['city']){

	$query = "UPDATE `users` set ";

	if($_POST['email_action'] == 1){
		$_SESSION['email_action'] = 1;
	}else
		$_SESSION['email_action'] = 0;
	$query .= "`email_action` ='$_SESSION[email_action]' " ;
		
	if($_POST['protect'] == 1){
		$_SESSION['protect'] = 1;
		$query .= " , `ip` ='$_SERVER[REMOTE_ADDR]' ";
	}else
		$_SESSION['protect'] = 0;
	$query .= ", `protect` ='$_SESSION[protect]' ";


	if ($_POST['newpassword'] !="") {
	password_valid($_POST['newpassword']);
	$password = md5($_POST['newpassword']);
	if($password == $_SESSION['password']) message('Помилка!','Неможливо змінити пароль на старий!','error');
	$_SESSION['password'] = $password;
	$query .= ", `password` ='$password' ";
	
	}
	if ($_POST['new_email'] !="") {
	email_valid($_POST['new_email']);
	if($_POST['new_email'] == $_SESSION['email']) message('Помилка!','Неможливо змінити E-Mail на старий!','error');
	$_SESSION['email'] = $_POST['new_email'];
	$query .= ", `email` ='$_POST[new_email]' ";
	}

	if($_POST['city'] != "Вибрати нове місто"){
	$city = $_POST['city'];
	$query .= ", `city` = '$city' ";
	$_SESSION['city'] = $city;
	}
	
	
	if($_POST['telephone'] != ""){
	$_POST['telephone'] = htmlspecialchars($_POST['telephone']);
	$tel = telephone_valid($_POST['telephone']);
	$query .= ", `telephone` = '$tel' ";
	$_SESSION['telephone'] = $tel;
	}
	
	
	$query .=  "  WHERE `id`= $_SESSION[id]";
	mysqli_query($db, $query);

	message('Успіх!','Налаштування збережені!','success');


}

#Покупка послуг
else if ($_POST['nums']){ 
		$_POST['nums'] = (integer)$_POST['nums'];
		if($_POST['nums'] == 0)
			message('Помика!','Кількість оголошень має бути цілим числом!','error');
		$total = $_POST['nums'] * 2;
		if($_SESSION['balance'] < $total)
			message('Помика','На Вашому балансі недостатньо грошей для оплати замовлення!','error');
		$_SESSION['balance'] = $_SESSION['balance'] - $total;
		$_SESSION['limits'] = $_SESSION['limits'] + $_POST['nums'];
		mysqli_query($db, "UPDATE `users` set `balance` ='$_SESSION[balance]', `limits` ='$_SESSION[limits]' WHERE `id`= '$_SESSION[id]'");
		message('Успіх!','Ви купили '.$_POST['nums'].' шт.!','success');
}
#Завантаження аватарки 
else if($_FILES['file']){
	if(($_FILES['file']['type'] === 'image/png') or ($_FILES['file']['type'] ==='image/jpeg') or ($_FILES['file']['type'] === 'image/gif')){
		if ($_FILES['file']['size'] > 3*MB)
			message('Помилка!','Максимальний розмір фото 3 Мб!','error');

		$uploaddir = './img/user/';
		$upload = $_SESSION['id'].'_'.basename($_FILES['file']['name']);
		$uploadfile = $uploaddir.$upload;
		copy($_FILES['file']['tmp_name'], $uploadfile);
		mysqli_query($db, "UPDATE `users` set `img` ='$upload' WHERE `id`= '$_SESSION[id]'");
		if($_SESSION['img'] !== " ")
			unlink('./img/user/'.$_SESSION['img'].'');
		$_SESSION['img'] = $upload;
		go("profile");
	}else 
		message('Помилка!','Підтримуються файли розширення: *jpeg, *png, *gif !','error');
}
#Додати до закладок
elseif(isset($_POST['favor'])){
		if($_SESSION['id']){
		$query = mysqli_fetch_assoc(mysqli_query($db, "SELECT `favorite` FROM `users` WHERE `id` = '$_SESSION[id]'"));
		$arr = explode(';', $_SESSION['favorite']);
		foreach ($arr as $value) {
			if($value == $_POST['favor']){
				$favorite_on = true;
				break;
			}else{
				$favorite_on = false;
			}
		}
		if($favorite_on){
			$delete_favorite = str_replace("$_POST[favor];", "", $_SESSION['favorite']);
			$_SESSION['favorite'] = $delete_favorite;
			mysqli_query($db, "UPDATE `users` set `favorite` ='$_SESSION[favorite]'  WHERE `id`= '$_SESSION[id]'");
		}else{
			if($query['favorite'] == ''){
				$_POST['favor'] = $_POST['favor'].';';
				mysqli_query($db, "UPDATE `users` set `favorite` ='$_POST[favor]'  WHERE `id`= '$_SESSION[id]'");
				$_SESSION['favorite'] = $_POST['favor'];
			}else{
				$_POST['favor'] = $query['favorite'].$_POST['favor'].';';
				mysqli_query($db, "UPDATE `users` set `favorite` ='$_POST[favor]'  WHERE `id`= '$_SESSION[id]'");
				$_SESSION['favorite'] = $_POST['favor'];
			}
		}
	}else{
		echo "1";
	}
}

?>
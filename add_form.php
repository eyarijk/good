<? 
if($_SESSION['limits'] == 0)
	message('Помилка!','У Вас залишилоь 0 оголошень, перейдіть в профіль щоб купити ще!','error');
if((mb_strlen($_POST['name']) > 70))
	message('Помилка!','Назва немає перевищувати 70 символів','error');
if((mb_strlen($_POST['chars']) > 2500))
	message('Помилка!','Опис немає перевищувати 2500 символів','error');
if((mb_strlen($_POST['tegs']) > 120))
	message('Помилка!','Теги немають перевищувати 120 символів','error');
if(!is_numeric($_POST['price']))
	message('Помилка!','Неправильно вказана ціна!','error');
if(!is_numeric($_POST['status']))
	message('Помилка!','Неправильно вибраний статус!','error');
if($_POST['categories'] == 'Виберіть категорію')
	message('Помилка!','Виберіть категорію!','error');

$count_files = count($_FILES['file-1']['type']);

for ($i=0; $i < $count_files ; $i++) { 
	if(($_FILES['file-1']['type'][$i] === 'image/png') or ($_FILES['file-1']['type'][$i] ==='image/jpeg') or ($_FILES['file-1']['type'][$i] === 'image/gif')){
	$uploaddir = './img/shop/'.$_SESSION['id'].'/';
	$times = time();
	$type = explode("/", $_FILES['file-1']['type'][$i]);
	$upload = trim($_SESSION['id'].'_'.$times.$i.'.'.$type[1]);
	$uploadfile = $uploaddir.$upload;
	$total_files .= $upload.";";
	copy($_FILES['file-1']['tmp_name'][$i], $uploadfile);
}else 
message('Помилка!','Підтримуються файли розширення: *jpeg, *png, *gif !','error');
}

if(!isset($_POST['tegs']))
	$_POST['tegs'] = " ";

$_POST['name'] = htmlspecialchars($_POST['name']);
$_POST['tegs'] = trim($_POST['tegs']);
$_POST['tegs'] = htmlspecialchars($_POST['tegs']);
$_POST['chars'] = htmlspecialchars($_POST['chars']);
$_SESSION['mail'] = 'null';

 
mysqli_query($db, "INSERT INTO `goods` VALUES(NULL, '$_SESSION[id]', '$_POST[categories]','$_POST[name]','$_POST[price]','$_POST[currency]','$_POST[chars]','$total_files','$_POST[short]','$_SESSION[mail]','$_POST[status]','$_POST[export]',NOW(),0,NOW(),1,'$_POST[tegs]','$_SESSION[city]')");
$_SESSION['limits']--;
mysqli_query($db,'UPDATE `users` set `limits` ='.$_SESSION['limits'].' WHERE `id`= '.$_SESSION['id'].'');

#Оновлення головної сторінки
$rows = mysqli_query($db, "SELECT * FROM `categories`");

while ($row = mysqli_fetch_assoc($rows)) {
		$ro = mysqli_query($db, "SELECT * FROM `goods` WHERE `cid` = $row[id] AND `action` = 1");
		$coun= 0;
		while (mysqli_fetch_assoc($ro)) {
				$coun++;
		}
		if(isset($count))
			$coun = $count;
 		$total .= $coun.";";
}
$fname= fopen("moduls/count_cat.txt", "w+");
fwrite($fname, $total);
fclose($fname);
#end

message('Чудово!','Оголошення додано!','success');
  ?>
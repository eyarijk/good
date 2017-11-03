<? 
include "index.php";


$query = mysqli_fetch_assoc(mysqli_query($db,'SELECT * FROM `users` WHERE `id` = '.$_GET['id'].' '));



top($query['name']);
 ?>

	<div class="main">
		<div class="adds">
			<img src="img/728x90.png">
		</div>	
		<div class="name"><?=$query['name']?><button id="add" class="add" onclick="go('add');">Додати оголошення</button></div>
		<a class="link_shop" href="/">Головна</a> 
		<br>
		<img src="img/shop/<?=$query['img']?>">
		<h4>Головна інформація</h4>
		<hr>
		<p><?=$query['city']?></p>
		<hr>
		<h3>Опис</h3>
		<p><?=$query['chars']?></p>
		<hr>
		<p>Переглянути всі оголошення: <a class="link_shop" href="/categories.php?uid=<?=$query['id']?>"><?=$query['name']?></a> </p>
		<p>Телефон: <?=$about_id['telephone']?></p>
		<? if($about_id['email_action'] == 1) 
		echo '<p>E-Mail: '.$about_id['email'].'</p>';?>
		<hr>
		<p>Ключеві слова</p>
		<span><?=$query['tegs']?></span>
		<hr style="margin-bottom: 50px;">
	</div>






<? bottom();?>
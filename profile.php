<? top("Профіль",1);
valid_user();
$nums_active = mysqli_num_rows(mysqli_query($db,"SELECT `id` FROM `goods` WHERE `uid` = '$_SESSION[id]' AND `action` = 1"));
$favorite_count = count(explode(';', $_SESSION['favorite']))-1;

?>

<section class="main wrapper">
		<article>
			<div class="article_image profile_image ">
				<?
					if($_SESSION['img'] == " ")
						echo '<img src="/img/user/no_image.png" width="270" height="280" >';
					else
						echo '<img src="/img/user/'.$_SESSION['img'].'" class="image" width="270" height="280" >
					';
					 ?>
					<div class="settings">
						<form method="post" action="/profedit">
							<p>
							<input type="file" name="file" id="file-1" class="inputfile inputfile-1"  style="visibility: hidden;" >
							<label for="file-1">
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
								<path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path>
							</svg>
							<span>Вибрати аватарку...</span></label>
							</p>
							<p><input type="submit" name="go_avatar" value="Завантажити" class="input-button" style="
							margin-top: 10px; width: 150px;"></p>
							<hr>
							<p class="sms">Максимальний розмір фото 3 Мб.  Формат фото 270x280 </p>
						</form>
					</div>
				<div class="information setting" style="margin-left: 0;">
					<p><img src="img/profile.png" class="icon"> <?=$_SESSION['name']?></p>
					<p><img src="img/money.png" class="icon"> Ваш баланс: <?=r2f($_SESSION['balance'])?> грн.(<span id="buy" class="get">+</span>)</p>
					<input type="hidden" id="id_user" value="<?=$_SESSION['id']?>">
					<p><img src="img/category.png" class="icon"> Активні оголошення: <a href="#" style="font-size:22px;" class="link_shop infor"><?=$nums_active?></a></p>
					<p><img src="img/number.png" class="icon"> Доступні оголошення: <?=$_SESSION['limits']?> (<span id="buy" class=" buy">+</span>) </p>
					<p><img src="img/favorite_on.png" class="icon"> Уподобання: <a href="categories.php?favorite=1&page=1" style="font-size:22px;" class="link_shop infor"><?=$favorite_count?></a> </p>
					<p><img src="img/telephone.png" class="icon"> +<?=$_SESSION['telephone']?></p>
					<p><img src="img/email.png" class="icon"> <?=$_SESSION['email']?></p>
					<?if($_SESSION['city'] != ""){?><p><img src="img/here.png" class="icon"> <?=$_SESSION['city']?></p>
					<?}?>
				</div>
			</div>
			<div class="post">
				<h1 class="title" style="margin-bottom: 10px;">
					<a href="#">Привіт, <?=$_SESSION['name']?>!</a> 
				</h1>
				<a class="read_more" href="/add">Додати оголошення <i class="read_more_arrow"></i> </a>
				<div class="setting">
					<p>Налаштування</p>
					<form method="post" action="/profedit">
						<p><img src="img/telephone.png" class="icon"> <input class="profile_inp" type="text" name="telephone" placeholder="Новий моб. телефон" ></p>
						<p><img src="img/email.png" class="icon"> <input class="profile_inp" type="text" name="new_email" placeholder="Нова електронна адреса" ></p>
						<p><img src="img/here.png" class="icon"> 
							<select class="city" name="city" class="profile_inp">
			  					<option selected>Вибрати нове місто</option>
			  					<option >Вінницька область</option>
			  					<option >Волинська область </option>
			  					<option >Дніпропетровська область </option>
			  					<option >Донецька область </option>
			  					<option >Житомирська область</option>
			  					<option >Закарпатська область </option>
			  					<option >Запорізька область</option>
			  					<option >Івано-Франківська область </option>
			  					<option >Київська область </option>
			  					<option >Кіровоградська область </option>
			  					<option >Львівська область </option>
			  					<option >Миколаївська область </option>
			  					<option >Одеська область</option>
			  					<option >Полтавська область </option>
			  					<option >Рівненська область </option>
			  					<option >Сумська область </option>
			  					<option >Тернопільська область </option>
			  					<option >Харківська область </option>
			  					<option >Херсонська область </option>
			  					<option >Хмельницька область </option>
			  					<option >Черкаська область </option>
			  					<option >Чернівецька область </option>
			  					<option >Чернігівська область </option>
							</select></p>
						<p><img src="img/password.png" class="icon"> <input class="profile_inp" type="password" name="newpassword" placeholder="Новий пароль" ></p>
						<input type="hidden" name="email_action" value="0">
						<p><input type="checkbox" class="checkbox" id="checkbox1" value="1" name="email_action" <? if($_SESSION['email_action'] == 1) echo "checked";?>/>
						<label for="checkbox1">Показувати E-Mail в оголошеннях.</label></p>
						<input type="hidden" name="protect" value="0" >
						<p><input type="checkbox" class="checkbox" id="checkbox" value="1" name="protect" <? if($_SESSION['protect'] == 1) echo "checked";?>/>
						<label for="checkbox">Захист по IP</label></p>
						<input type="submit" name="save" value="Зберегти" class="input-button" style="
							margin-top: 10px; margin-left: 35px; width: 150px;">  
					</form>
				</div>
			</div>
		</article>
	</section>
<script src="js/buy.js"></script>

<? bottom(); ?>




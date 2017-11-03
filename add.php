<? top("Додати оголошення");
valid_user();

$fname = fopen("moduls/cat_name.txt", "r+");
			$cat_name = stream_get_contents($fname);
			$cat_names = explode(";", $cat_name);
			fclose($fname);
$fid = fopen("moduls/cat_id.txt", "r+");
			$cat_id = stream_get_contents($fid);
			$cat_ids = explode(";", $cat_id);
			fclose($fid);


?>

<section class="main wrapper">
		<div class="add">
			<h1 class="titles ">Подати оголошення</h1>
			<hr>
			<form action="add_form" enctype="multipart/form-data" method="post">
				<p> <input type="text" class="input-login add_inp add_in"  name="name" required><span class="add_in">Заголовок</span></p>
				<p> <input type="text" class="input-login add_inp add_in"  name="price" required><span class="add_in">Ціна</span></p>
				<p> <select class="city input-login add_inp add_in" style="height: 27px;width: 360px;" name="currency" class="profile_inp">
		  					<option selected>Вибрати валюту</option>
		  					<option value="ГРН">ГРН</option>
		  					<option value="USD">USD </option>
		  					<option value="EUR">EUR </option>
						</select><span class="add_in">Валюта</span></p>
				<p> <select class="city input-login add_inp add_in" style="height: 27px;width: 360px;" name="status" class="profile_inp">
		  					<option selected>Вибрати стан</option>
		  					<option value="1">Новий</option>
		  					<option value="0">Б/у </option>
						</select><span class="add_in">Стан</span></p>
				<p> <select class="city input-login add_inp add_in" style="height: 27px;width: 360px;" name="short" class="profile_inp">
		  					<option value="1">Так</option>
		  					<option value="0" selected>Ні </option>
						</select><span class="add_in">Торг</span></p>
				<p> <select class="city input-login add_inp add_in" style="height: 27px;width: 360px;" name="export" class="profile_inp">
		  					<option value="1">Так</option>
		  					<option value="0" selected>Ні </option>
						</select><span class="add_in">Експорт</span></p>
				<p> <select class="city input-login add_inp add_in" style="height: 27px;width: 360px;" name="categories" class="profile_inp">
		  					<option selected>Виберіть категорію</option>
		  					<? 
								for ($i = 0; $i < (count($cat_names)-1);$i++) {
	 								echo '<option  value="'.$cat_ids[$i].'" >'.$cat_names[$i].'</option>';
								}
								?>
					</select>
					<span class="add_in">Категорія</span></p>
				<p> <textarea class="input-login add_inp add_in text"  name="chars" required></textarea><span class="add_in">Опис</span></p>
				<p> <input type="text" class="input-login add_inp add_in" value="<?=$_SESSION['telephone']?>" name=""><span class="add_in">Телефон</span></p>
				<p> <input type="text" class="input-login add_inp add_in"  name="tegs"><span class="add_in">Теги</span></p>
				<p><center>
				<input type="file" name="file-1[]" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} файла вибрано" style="visibility: hidden; position: absolute;" multiple="">
				<label for="file-1">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
						<path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path>
					</svg>
				<span>Вибрати фото...</span></label></center>
				</p>
				<p class="sms">Не більше 10 файлів. Максимальний розмір фото 5 Мб.</p>
				<p style="border-top: 1px solid #ccc;margin-top: 15px;">
					<input type="submit" class="add_in add_btn"  name="" value="Додати оголошення">
					<input type="submit" class="add_in add_btn" style="background-color: #0098D0;border: 1px solid #0098D0;" name="" value="Попередній перегляд"></p>
			</form>
		</div>
</section>


<? bottom(); ?>

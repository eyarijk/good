<?
top("Реєстрація");
valid_new();

 ?>

 <section class="main wrapper">
		<article>
			

<center>
<h1 class="title" style="margin-bottom:25px;font-size: 35px;"><a href="#">Реєстрація</a></h1>
<div>
 <form method="post" action="/glogin">
	<p><input type="text" name="email" placeholder="Електронна адреса" required class="input-login"></p>
	<p><input class="input-login" type="password" name="password" placeholder="Пароль" required ></p>
	<p><input class="input-login" type="password" name="repassword" placeholder="Повторіть пароль" required ></p>
	<p><input class="input-login" type="text" name="fistname" placeholder="Ім'я" required ></p>
	<p><input class="input-login" type="text" name="telephone" placeholder="Телефон" required ></p>
	<p style="margin-top: 10px;margin-bottom: 10px;">Вже зареєстровані? <a href="/login" style="text-decoration: none; color:#4CDA64; margin-left: 10px; font-size: 16px;">Вхід</a></p>
	<input type="submit" name="login" value="Реєстрація" class="input-button" style=" width: 150px;">  
 </form>	
 </div>
</center>



		</article>
	</section><!-- Main End -->


	<?bottom();?>
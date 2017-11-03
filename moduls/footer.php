<footer>
		<div class="wrapper">
		<p class="rights">© 2017 localhost  -  All Rights Reserved  -  Find more free Templates at <a href="/" target="_blink">localhost</a> </p>
			<img class="logo_footer" src="img/logo_footer.png" alt="Blogin" title="">
			<ul class="social_profiles">
				<li class="f"><a href="http://facebook.com/pixelhint" target="_blink"></a></li>
				<li class="t"><a href="http://twitter.com/pixelhint" target="_blink"></a></li>
				<li class="be"><a href="http://behance.net/pixelhint" target="_blink"></a></li>
				<li class="d"><a href="http://dribbble.com/pixelhint" target="_blink"></a></li>
			</ul>
		</div>
	</footer><!-- Footer End -->
<script>(function (e, t, n) {
		var r = e.querySelectorAll("html")[0];
		r.className = r.className.replace(/(^|\s)no-js(\s|$)/, "$1js$2")
	})(document, window, 0);</script>
	<script>
		;(function (document, window, index){
			'use strict';
			var inputs = document.querySelectorAll('.inputfile');
			Array.prototype.forEach.call(inputs, function (input) {
				var label = input.nextElementSibling,
						labelVal = label.innerHTML;

				input.addEventListener('change', function (e) {
					var fileName = '';
					if (this.files && this.files.length > 1)
						fileName = ( this.getAttribute('data-multiple-caption') || '' ).replace('{count}', this.files.length);
					else
						fileName = e.target.value.split('\\').pop();

					if (fileName)
						label.querySelector('span').innerHTML = fileName;
					else
						label.innerHTML = labelVal;
				});

				// Firefox bug fix
				input.addEventListener('focus', function () {
					input.classList.add('has-focus');
				});
				input.addEventListener('blur', function () {
					input.classList.remove('has-focus');
				});
			});
		}(document, window, 0));
	</script>
<a href="#" class="scrollup">Вгору</a>
<script src="js/other_js.js"></script>
</body>
</html>
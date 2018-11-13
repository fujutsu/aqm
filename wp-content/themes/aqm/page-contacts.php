<?php
/*
 * Template Name: Контакты
 */
?>

<?php  get_header(); ?>

	<!--<div class="contact_wraper clearfix">-->
	<div class="contact">
		<h2>Свяжитесь с нами</h2>
		<form method="post" id="formContacts">
			<input type="hidden" name="DATA[TITLE]" value="Заявка для связи">
			<label for="name">Имя:</label>
			<input type="text" name="DATA[NAME]" id="name" placeholder="Ваше имя" required>
			<label for="email">Email:</label>
			<input type="email" name="DATA[EMAIL_WORK]" id="email" placeholder="Email" required>
			<label for="text">Текст:</label>
			<textarea name="DATA[COMMENTS]" id="text" placeholder="Ваше сообщение" required maxlength="800"></textarea>
			<div id="confirmForm3" style="color:#46B005; font-weight:600; font-size:23px; margin-top:10px; text-align:center; display:none;">Спасибо за заявку!</div>
			<button type="submit" class="button">Отправить</button>
		</form>
	</div>

	<div class="address">
		<div class="street address_element">
			<p><a href="https://www.google.com.ua/maps/place/%D0%B2%D1%83%D0%BB%D0%B8%D1%86%D1%8F+%D0%86%D0%BB%D1%8C%D1%84%D0%B0+%D1%82%D0%B0+%D0%9F%D0%B5%D1%82%D1%80%D0%BE%D0%B2%D0%B0,+20,+%D0%9E%D0%B4%D0%B5%D1%81%D0%B0,+%D0%9E%D0%B4%D0%B5%D1%81%D1%8C%D0%BA%D0%B0+%D0%BE%D0%B1%D0%BB%D0%B0%D1%81%D1%82%D1%8C/@46.391496,30.7106098,17z/data=!3m1!4b1!4m5!3m4!1s0x40c6335431ee20b5:0xfcf9a1c80308b494!8m2!3d46.391496!4d30.7127985"><b>Одесса</b><br>ул. Ильфа и Петрова 20 </a></p>
		</div>
		
		<div class="timetable address_element">
			<p><b>График работы</b><br><?php the_field( 'contacts_schedule', 'option' ); ?></p>
		</div>
		
		<div class="email address_element">
			<p><b>Email</b><br><a href="mailto:<?php the_field( 'contacts_email', 'option' ); ?>"><?php the_field( 'contacts_email', 'option' ); ?></a>
			</p>
		</div>
		
		<div class="phone address_element">
			<p><b>Телефон</b><br><a href="tel:<?php the_field( 'contacts_phone', 'option' ); ?>"><?php the_field( 'contacts_phone', 'option' ); ?></a></p>
		</div>
	</div>
	<!--</div>-->

<?php  get_footer(); ?>

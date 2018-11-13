<?php
/*
 * Template Name: Услуги
 */
?>

<?php get_header(); ?>

<!-- services begin -->
        <div class="services_wrapper clearfix">
            <div class="laying">
                <div class="video_wrapper">
                    <video src="<?php echo get_template_directory_uri(); ?>/video/shutterstock.mov" loop autoplay></video></div>
                <h1 class="animated">Укладка натурального рулонного газона за 3 часа в Одессе</h1>
            </div>

            <div class="services_content_wrapper clearfix">
                <div class="importance">
                    <h2 class="animated"><?php single_cat_title(); ?></h2>
                    
                    <!-- single_article begins -->
					<?php query_posts('category__in=' . $cat . '&showposts=999'); ?>
					<?php if( have_posts() ): ?>
					
						<?php while ( have_posts() ) : the_post(); ?>
						
						<div class="utility clearfix animated">
							<h3><?php the_title(); ?></h3>
							<div class="slider">
							
								<?php if( has_post_thumbnail() ): ?>
									<div class="slide">
										<?php the_post_thumbnail( array(400, 225) ); ?>
									</div>
								<?php endif; ?>
							   
								<?php if (class_exists('MultiPostThumbnails') and MultiPostThumbnails::has_post_thumbnail('post', '2-image') ): ?>
									<div class="slide">
										<?php MultiPostThumbnails::the_post_thumbnail('post', '2-image', null, array(400, 225)); ?>
									</div>
								<?php endif; ?>
								
								<?php if (class_exists('MultiPostThumbnails') and MultiPostThumbnails::has_post_thumbnail('post', '3-image') ): ?>
									<div class="slide">
										<?php MultiPostThumbnails::the_post_thumbnail('post', '3-image', null, array(400, 225)); ?>
									</div>
								<?php endif; ?>
								
							</div>
							<p><?php the_content(); ?></p>
						</div>
						
						<?php endwhile; ?>
					
					<?php else: ?>
						<h2 class="animated">Записи отсутствуют</h2>
					<?php endif; ?>
					
					<?php wp_reset_query(); ?>
                    <!-- single_article ends -->
                     
                </div>
				
				<?php query_posts('category__in=' . $cat . '&showposts=999'); ?>
				
					<?php if( have_posts() ): ?>
					
						<div class="videos">
							<h2 class="animated">Заголовок видео</h2>
							
							<?php while ( have_posts() ) : the_post(); ?>
							
								<?php if( get_post_meta( get_the_ID(), 'Ссылка на видео')[0] ): ?>
									<div class="video animated">
										<iframe width="100%" height="100%" src="<?php echo get_post_meta( get_the_ID(), 'Ссылка на видео')[0]; ?>" frameborder="0" allowfullscreen></iframe>
									</div>
								<?php endif; ?>
							
							<?php endwhile; ?>
							
						</div>
						
					<?php endif; ?>
					
				<?php wp_reset_query(); ?>
				
            </div>

            <div class="request">
                <div class="services_content_wrapper">
                    <h2>Оставьте заявку и получите что-то такое</h2>
                    <form method="post" id="formUslugi" >
                        <div>
							<input type="hidden" name="DATA[TITLE]" value="Заявка">
							<input type="text" name="DATA[NAME]" id="formName2" placeholder="Ваше имя" required >
                            <input type="text" name="DATA[PHONE_WORK]" id="formPhone2" title="Допустимы только цифры" placeholder="Телефон" required pattern="[0-9]{5,14}">
                            <input type="email" name="DATA[EMAIL_WORK]" id="formMail2" placeholder="Email" required >
							<div id="confirmForm2" style="color:#46B005; font-weight:600; font-size:23px; margin-bottom: 5px; display: none;">Спасибо за заявку!</div>
						</div>
                        <input type="submit" value="Оставить заявку" class="button">
                    </form>
                </div>
            </div>

            <div class="map">
                <div class="google_map"></div>
                <div class="services_content_wrapper">
                    <h2>Заголовок в 2 строки<br>Напишет кто-то его скоро</h2>

                    <div class="address_services">
                        <div class="street address_element">
                            <p><a href="https://www.google.com.ua/maps/place/%D0%B2%D1%83%D0%BB%D0%B8%D1%86%D1%8F+%D0%86%D0%BB%D1%8C%D1%84%D0%B0+%D1%82%D0%B0+%D0%9F%D0%B5%D1%82%D1%80%D0%BE%D0%B2%D0%B0,+20,+%D0%9E%D0%B4%D0%B5%D1%81%D0%B0,+%D0%9E%D0%B4%D0%B5%D1%81%D1%8C%D0%BA%D0%B0+%D0%BE%D0%B1%D0%BB%D0%B0%D1%81%D1%82%D1%8C/@46.391496,30.7106098,17z/data=!3m1!4b1!4m5!3m4!1s0x40c6335431ee20b5:0xfcf9a1c80308b494!8m2!3d46.391496!4d30.7127985"><b>Одесса</b><br>ул. Ильфа и Петрова 20</a></p>
                        </div>

                        <div class="timetable address_element">
                            <p><b>График работы</b><br>c 9:00 до 19:00</p>
                        </div>

                        <div class="email address_element">
                            <p><b>email</b><br><a href="mailto:customer.service@aqm.in.ua?subject=Вопрос">customer.service@aqm.in.ua</a>
							</p>
                        </div>

                        <div class="phone address_element">
                            <p><b>Телефон</b><br><a href="tel:+380671443924">+38 (067) 144-39-24</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- services end -->

<?php get_footer(); ?>

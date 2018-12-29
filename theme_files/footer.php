			<!-- footer -->
			<footer class="row section">
				<div id="footer-top">
					<div class="container">
						<div class="col-md-4 col-sm-12">
							<div class="footer-left">
								<a href="<?php echo home_url(); ?>">
									<img src="<?php echo  wp_get_attachment_url( '391'); ?>" alt="logo" />
								</a>
								<p>The betting software company was founded with the target of innovating the betting industry, providing the end-customer with an easy, safe and fun gaming experience. At the same time to provide bookmakers with an innovative, safe and extensively customizable management system. To date, we have 10 years experience in the gambling industry, creating a suite of services created by bookmakers for bookmakers.</p>
							</div>
						</div>


						<div class="foot-contact col-md-3 col-md-offset-1 col-sm-12">
							<h4>Contact us</h4>
							<ul class="contact-list">
								<!-- <li><i class="fa fa-flag" aria-hidden="true"></i><span>276 Upper Parliament Street, Liverpool L8, Great Britain</span></li> -->
								<!-- email scrambler -->
								<li>
									<i class="fa fa-envelope" aria-hidden="true"></i>
									<script type="text/javascript">document.write('<'+'a'+' '+'h'+'r'+'e'+'f'+'='+"'"+'m'+'a'+'i'+'l'+'t'+'&'+'#'+'1'+'1'+'1'+';'+'&'+'#'+'5'+'8'+';'+
									'i'+'n'+'%'+'6'+'6'+'&'+'#'+'1'+'1'+'1'+';'+'&'+'#'+'6'+'4'+';'+'a'+'&'+'#'+'1'+'1'+'4'+';'+'&'+'#'+
									'1'+'0'+'9'+';'+'a'+'%'+'6'+'E'+'a'+'g'+'e'+'m'+'e'+'n'+'t'+'&'+'#'+'4'+'6'+';'+'n'+'&'+'#'+'1'+'0'+
									'1'+';'+'%'+'7'+'4'+"'"+'>'+'&'+'#'+'1'+'0'+'5'+';'+'n'+'f'+'o'+'&'+'#'+'6'+'4'+';'+'a'+'&'+'#'+'1'+
									'1'+'4'+';'+'&'+'#'+'1'+'0'+'9'+';'+'a'+'n'+'a'+'&'+'#'+'1'+'0'+'3'+';'+'e'+'&'+'#'+'1'+'0'+'9'+';'+
									'e'+'n'+'t'+'&'+'#'+'4'+'6'+';'+'n'+'e'+'&'+'#'+'1'+'1'+'6'+';'+'<'+'/'+'a'+'>');</script>
									<noscript>[Turn on JavaScript to see the email address]</noscript>
								</li>
								<li class="phone">
									<i class="fa fa-phone" aria-hidden="true"></i>
									<a href="tel:+35699345762">+356 9934 5762</a>
								</li>
								<li class="skype">
									<i class="fa fa-skype" aria-hidden="true"></i>
									<a href="skype:bookmakerfuture?chat">Skype</a>
								</li>
								<li>
									<i class="fa fa-linkedin-square" aria-hidden="true"></i>LinkedIn
								</li>
							</ul>
						</div>


						<div class="col-md-4 col-sm-12 form">
							<?php echo do_shortcode( '[contact-form-7 id="257" title="Contact form 1"]' ); ?>
						</div>

					</div>
				</div>

				<div id="footer-menu">
					<div class="container">
						<div class="col-md-12">
							<nav class="nav">
								<?php wp_nav_menu( array( 'theme_location' => 'extra-menu' ) ); ?>
							</nav>
							<a href="#top" class="foot-up"><span>up <i class="fa fa-caret-up" aria-hidden="true"></i></span></a>
						</div>
					</div>
				</div>

				<div id="copyrights">
					<div class="container">
						<div class="col-md-6 col-xs-12">
							© Copyright 2008 - <?php echo date("Y"); ?>. AR Management LTD. All rights reserved.  <a hidden href="bettingsoftware.html">betting software</a>
						</div>
					</div>
				</div>

			</footer>
			<!-- /footer -->
		</div>
		<!-- /wrapper -->
		<script>
		// google analytics
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		ga('send', 'pageview');
		</script>
		
		<?php wp_footer(); ?>
	</body>
</html>
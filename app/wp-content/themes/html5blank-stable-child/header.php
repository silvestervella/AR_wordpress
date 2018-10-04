<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
		<link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>
	</head>
	<body <?php body_class(); ?>>

		<!-- wrapper -->
		<div id="wrapper" class="">

			<!-- header -->
			<header id="header">
				<div class="container">
					<div id="logo">
						<!-- logo -->
						<a href="<?php echo home_url(); ?>">
							<img src="<?php armanage_get_logo_url() ?>" alt="logo" />
						</a>
					</div>

					<!-- Main navigation outer -->
					<section id="main-nav-outer" class="">
						<nav class="nav">
							<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
						</nav>
						<div class="skype-link">
							<a href="skype:bookmakerfuture?chat"><i class="fa fa-skype"></i>Chat</a>
						</div>
					</section>
					<!-- /Main navigation -->

				<!-- /container -->
				</div>
			<!-- /header -->	
			</header>

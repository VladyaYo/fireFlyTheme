<?php
	/**
	 * The header for our theme
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package ywd
	 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
  <header class="header header--primary">
    <div class="container">
      <a href="/" class="logo">
        <svg width="100%" height="100%" viewBox="0 0 205230 38119" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><path d="M204436,214.121l214.05,146.554l146.554,-214.263l-214.262,-146.412l-146.342,214.121Zm-3047.81,1119.86l441.696,302.229l302.3,-441.77l-441.771,-302.225l-302.224,441.766Zm-2685.26,1307.36l441.767,302.304l302.3,-441.771l-441.767,-302.371l-302.3,441.838Zm4839.83,1115.53l304.688,208.625l208.696,-304.909l-304.688,-208.475l-208.696,304.759Zm-2965.2,125.796l214.121,146.558l146.554,-214.121l-214.191,-146.558l-146.484,214.121Zm-3058.3,1348.23l810.4,554.4l554.471,-810.546l-810.4,-554.471l-554.471,810.617Zm3911.89,833.842l555.05,379.558l379.558,-554.904l-554.762,-379.559l-379.846,554.905Zm2632.74,158.345l692.275,473.6l473.596,-692.275l-692.421,-473.67l-473.45,692.345l0,0Zm-6227.79,637.371l810.546,554.4l554.47,-810.475l-810.475,-554.4l-554.541,810.475Zm-1622.47,303.171l810.692,554.471l554.4,-810.475l-810.475,-554.471l-554.617,810.475l0,0Zm3572.92,1031.1l810.404,554.542l554.541,-810.546l-810.62,-554.542l-554.325,810.546Zm2594.26,361.763l810.475,554.471l554.396,-810.475l-810.4,-554.471l-554.471,810.475l0,0Zm-27677.5,-150.1l11218.3,16413.5c330.654,524.884 496.746,1083.48 496.746,1676.72l0,11467l5919.54,0l0,-11467c0,-444.879 96.934,-870.371 290.942,-1276.62c64.817,-135.558 140.121,-268.879 226.563,-400.1l3341.44,-4848.29l-1092.59,-747.396l554.613,-810.546l1095.27,749.275l6.291,-8.825l735.317,502.896l554.542,-810.475l-732.713,-501.158l771.413,-1119.21l-971.425,-664.642l588.471,-860.316l-1259.48,-885.2l-483,705.875l-810.4,-554.471l490.017,-716.287l-335.217,-235.534l-509.041,744.284l-791.013,-541.013l-520.329,760.558l-733.508,-501.879l-253.325,362.7l737.558,504.704l-554.4,810.475l-787.542,-538.916l-786.533,1149.52l787.692,538.916l-554.4,810.475l-787.979,-538.846l-1233.87,1803.39l-6568.13,-9665.88c-555.7,-818 -1480.61,-1307.73 -2469.47,-1307.73l-5580.38,0l-0.008,0Zm18444,7415.58l554.471,-810.617l810.621,554.542l-554.471,810.617l-810.621,-554.542Zm1347.58,107.929l554.4,-810.546l810.617,554.396l-554.471,810.621l-810.546,-554.471Zm-682.437,997.542l554.471,-810.621l810.62,554.471l-554.687,810.621l-810.404,-554.471l0,0Zm1052.81,553.6l399.233,-583.55l583.55,399.162l-399.158,583.696l-583.625,-399.308Zm-1711.37,408.854l554.396,-810.475l810.767,554.471l-554.542,810.475l-810.621,-554.471l0,0Zm-1657.55,330.442l554.546,-810.546l810.546,554.542l-554.4,810.475l-810.692,-554.471l0,0Zm4266.33,41.375l554.617,-810.617l810.475,554.471l-554.471,810.617l-810.621,-554.471l0,0Zm-1633.68,295.358l554.542,-810.55l810.475,554.471l-554.471,810.55l-810.546,-554.471Zm-3291.02,625.796l554.541,-810.621l810.475,554.542l-554.616,810.55l-810.4,-554.471Zm2608.58,371.742l554.541,-810.617l810.55,554.471l-554.4,810.616l-810.691,-554.47Zm975.333,667.104l554.613,-810.475l810.475,554.396l-554.471,810.62l-810.617,-554.541l0,0Zm-658.492,962.454l554.542,-810.475l810.475,554.471l-554.471,810.546l-810.546,-554.542Zm-2057.07,-151.837l336.3,-491.68l491.463,336.225l-336.229,491.684l-491.534,-336.229Zm-108791,-12550.8l-35.158,29622.5l14374.3,0l-15.266,-9.621l6928.33,0c2435.33,0 4409.71,-1974.25 4409.71,-4409.58l0,-1519.31l-19700.3,-52.591l-34.791,-5855.25l16770.7,0l0,-5928.96l-16770.7,0l17.071,-5903.67l19718,-4.413l0,-1134.19c0,-2647.93 -2146.56,-4794.42 -4794.42,-4794.42l-6509.92,0l16.783,-10.563l-14374.3,0l-0.013,0.021Zm-82909.2,25711.9c0,2154.44 1746.53,3901.04 3901.04,3901.04l2027.49,0l9.404,-23671.3l13458.5,-2.458c3186.41,0 5769.58,-2583.19 5769.58,-5769.58l0,-159l-25172,-4.629l5.929,25706l0.008,-0.038Zm150521,-25701.4l64.021,29626.8l24604.5,-24.304l0,-242.912c0,-3140.41 -2545.72,-5685.96 -5685.96,-5685.96l-13054,0l0,-23673.5l-5928.46,0l-0.021,-0.033Zm-33561.2,18.879l3.184,25889.5c0,2040.15 1653.79,3694.01 3693.94,3694.01l2234.66,0l11.937,-23647.9l13297,-25.896c3274.3,0 5928.46,-2654.37 5928.46,-5928.63l-25169.2,18.809l0.029,0.037Zm-65047.1,-18.808c-2228.01,0 -4034.21,1806.13 -4034.21,4034.07l0,1894.53l17765.8,0c887.367,0 1636.72,340.567 2245.37,1020.04c471.571,526.329 718.966,1218.75 718.966,1925.56l0,1988.28c0,887.225 -343.679,1631.08 -1030.89,2231.7c-536.384,468.609 -1235.6,711.809 -1947.77,711.809l-17732.9,-28.575l-18.587,15825l5928.83,0l0,-9867.42l8996.83,0l4788.83,9867.42l6571.54,0l-5120.88,-10551.7c1630.57,-690.825 2950.74,-1768.73 3959.35,-3233.94c1009.04,-1464.41 1513.38,-3115.95 1513.38,-4954.29l0,-1990.09c0,-1630.79 -401.113,-3116.39 -1202.26,-4457.08c-801.575,-1340.13 -1872.83,-2411.38 -3212.96,-3213.18c-1340.78,-801.288 -2826.32,-1202.11 -4456.79,-1202.11l-13731.6,0l-0.05,-0.008Zm-18354.5,29602.4l5928.54,0l0,-29602.4l-5928.54,0l0,29602.4Zm163930,-28641.7l810.621,554.47l554.541,-810.475l-810.621,-554.616l-554.541,810.621Zm2609.01,371.67l810.546,554.542l554.546,-810.546l-810.621,-554.471l-554.471,810.475l0,0Zm-5874.83,217.159l810.475,554.541l554.471,-810.616l-810.404,-554.4l-554.542,810.475Zm-2083.98,-36.242l305.046,208.55l208.554,-304.758l-305.05,-208.625l-208.55,304.833Zm3057.72,705.367l810.545,554.4l554.471,-810.475l-810.475,-554.617l-554.541,810.692Zm2609.01,371.6l810.404,554.546l554.467,-810.55l-810.4,-554.467l-554.471,810.471l0,0Zm-3255.93,598.671l810.475,554.541l554.471,-810.616l-810.546,-554.471l-554.4,810.546Zm2574.15,348.091l810.546,554.396l554.541,-810.475l-810.546,-554.471l-554.541,810.55Zm4265.63,92.229l810.762,554.4l554.396,-810.55l-810.617,-554.47l-554.541,810.62Zm-5876.17,219.038l810.617,554.471l554.616,-810.617l-810.762,-554.471l-554.471,810.617l0,0Zm4242.63,76.246l810.4,554.541l554.546,-810.545l-810.475,-554.471l-554.471,810.475Zm-5876.17,219.112l810.405,554.471l554.47,-810.621l-810.404,-554.396l-554.471,810.546Zm-2741.83,800.129l810.475,554.471l554.688,-810.621l-810.621,-554.466l-554.542,810.616l0,0Zm6325.79,238.788l810.475,554.4l554.546,-810.475l-810.621,-554.542l-554.4,810.617l0,0Zm-1633.61,295.358l810.475,554.471l554.546,-810.621l-810.621,-554.471l-554.4,810.621l0,0Zm-1331.09,-519.171l20.038,14.105l38.483,-56.205l-20.183,-13.816l-38.338,55.916l0,0Zm3939.89,890.913l810.616,554.4l554.471,-810.475l-810.621,-554.471l-554.466,810.546Zm2746.02,-354.383l304.687,208.55l208.692,-304.905l-304.904,-208.55l-208.475,304.905Zm-7185.75,194.375l-16.275,23.795l19.533,13.459l34.287,-50.059l-19.75,-13.383l-17.795,26.188Zm-3513.02,1117.4l810.404,554.396l554.612,-810.546l-810.545,-554.471l-554.471,810.621l0,0Zm8269.46,672.233l810.621,554.471l554.471,-810.546l-810.621,-554.542l-554.471,810.617Zm705.588,2646.13l810.545,554.471l554.542,-810.546l-810.4,-554.546l-554.687,810.621Zm-73625.4,1711.3l0,5928.96l8395.63,0c3274.38,0 5928.96,-2654.44 5928.96,-5928.96l-14324.6,0l0,0Zm-116963,0l0,5928.96l8504.21,0c3214.55,0 5820.38,-2605.9 5820.38,-5820.46l0,-108.504l-14324.6,0l0,0.004Zm186860,872.9l810.546,554.4l554.471,-810.546l-810.475,-554.471l-554.542,810.617Z" style="fill:url(#_Linear1);fill-rule:nonzero;"/><defs><linearGradient id="_Linear1" x1="0" y1="0" x2="1" y2="0" gradientUnits="userSpaceOnUse" gradientTransform="matrix(120226,-120226,120226,120226,41795.6,77598.7)"><stop offset="0" style="stop-color:#3d8bbe;stop-opacity:1"/><stop offset="0.79" style="stop-color:#2fac66;stop-opacity:1"/><stop offset="0.95" style="stop-color:#dedc00;stop-opacity:1"/><stop offset="1" style="stop-color:#dedc00;stop-opacity:1"/></linearGradient></defs></svg>
      </a>
      <nav class="header-navbar">
				<?php wp_nav_menu(array(
					'container' => false,
					'theme_location' => 'header_menu',
					'items_wrap' => '<ul class="%2$s">%3$s</ul>',
					'menu_class' => 'header-menu'
				)); ?>
        <?php
					$header = get_field('header', 'option');
        ?>
        <?php if(!empty($header['btn_text'])) : ?>
        <a class="btn btn--small" href="<?php echo $header['btn_link']?>">
					<?php echo $header['btn_text']?>
        </a>
        <?php endif; ?>
      </nav>
      <div class="burger">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </header>
  <div class="overlay"></div>
  <main class="main">

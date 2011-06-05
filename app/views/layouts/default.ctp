<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Glidelog</title>
		<link rel="stylesheet" type="text/css" href="/css/reset.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="/css/text.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="/css/grid.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="/css/layout.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="/css/nav.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="/css/jquery-ui-smoothness/jquery-ui-1.8.13.custom.css" media="screen" />
		<!--[if IE 6]><link rel="stylesheet" type="text/css" href="/css/ie6.css" media="screen" /><![endif]-->
		<!--[if IE 7]><link rel="stylesheet" type="text/css" href="/css/ie.css" media="screen" /><![endif]-->
		
		<script type="text/javascript" language="javascript" src="/js/libs/jquery-1.5.1.min.js"></script>
		<script type="text/javascript" language="javascript" src="/js/libs/jquery-ui-1.8.13.custom.min.js"></script>
		<script type="text/javascript" language="javascript" src="/js/libs/jquery.hoverfade.min.js"></script>
	</head>
	<body>
		<div class="container_12">
			<div class="grid_12">
				<h1 id="branding">
					<a href="../">Flights</a>
				</h1>
			</div>
			<div class="clear"></div>
			
			<style>
			
			ul.main img {
			padding-right:1px;
			position:relative;
			top:4px;
			left:-4px;
			}
			
			</style>
			
			<div class="grid_12">
				<ul class="nav main">
					<li>
						<a href="/"><?= $html->image('icon/basicset/home_16.png'); ?>Dashboard</a>
					</li>
					<li>
						<a href="/flights/"><?= $html->image('icon/basicset/globe_16.png'); ?> Flights</a>
						<ul>
							<li>
								<a href="/flights/"><?= $html->image('icon/basicset/document_16.png'); ?> all flights</a>
							</li>
							<li>
								<a href="/flights/statistics/"><?= $html->image('icon/basicset/statistics_16.png'); ?> statistics</a>
							</li>
							<li>
								<a href="/flights/add/"><?= $html->image('icon/basicset/plus_16.png'); ?>  add flight</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#"><?= $html->image('icon/basicset/gear_16.png'); ?> Manage</a>
						<ul>
							<li>
								<a href="/gliders/">Gliders</a>
							</li>
							<li>
								<a href="/locations/">Locations</a>
							</li>
							<li>
								<a href="/flighttypes/">Flight types</a>
							</li>
							<li>
								<a href="/startmethods/">Start methods</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="clear"></div>
			<?= $content_for_layout ?>
			<div class="clear"></div>
	</body>
</html>

<script type="text/javascript">

$("").hoverFade();

</script>
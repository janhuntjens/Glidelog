<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Fluid 960 Grid System | 12-column Grid</title>
		<link rel="stylesheet" type="text/css" href="/css/reset.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="/css/text.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="/css/grid.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="/css/layout.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="/css/nav.css" media="screen" />
		<!--[if IE 6]><link rel="stylesheet" type="text/css" href="/css/ie6.css" media="screen" /><![endif]-->
		<!--[if IE 7]><link rel="stylesheet" type="text/css" href="/css/ie.css" media="screen" /><![endif]-->
	</head>
	<body>
		<div class="container_12">
			<div class="grid_12">
				<h1 id="branding">
					<a href="../">Flights</a>
				</h1>
			</div>
			<div class="clear"></div>
			<div class="grid_12">
				<ul class="nav main">
					<li>
						<a href="../12/">Dashboard</a>
					</li>
					<li>
						<a href="../12/">Flights</a>
						<ul>
							<li>
								<a href="../12/fluid/jquery/">all flights</a>
							</li>
							<li>
								<a href="../12/fluid/mootools/">statistics</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="../12/fixed/">Manage</a>
						<ul>
							<li>
								<a href="../12/fixed/mootools/">Gliders</a>
							</li>
							<li>
								<a href="../12/fixed/jquery/">Locations</a>
							</li>
							<li>
								<a href="../12/fixed/none/">Flight types</a>
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
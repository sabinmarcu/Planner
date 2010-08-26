<?php
	session_start();
?>
<!DOCTYPE html>
<head>
	<title>	Planificator v1.0	</title>
	<link rel="stylesheet" href="/css/style.css" type="text/css" media="screen" title="no title" charset="utf-8">
	<link rel="stylesheet" href="/css/date_input.css" type="text/css" media="screen" title="no title" charset="utf-8">
	
	<script src="/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="/js/jquery.ui.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="/js/jquery.date_input.js" type="text/javascript" charset="utf-8"></script>
	<script src="/js/functions.js" type="text/javascript" charset="utf-8"></script>
	
</head>
<body>
	<header>	Planifex v1.0	</header>
	<section id='admin' style="<?php if ($_SESSION[id]) echo "display: block"; ?>">	<a href='javascript:form("admin")'>Profilul meu</a> | <a href='javascript:form("logout")'>Deautentifica-ma</a> <br> <a href='javascript:form("date")'>Alege o luna</a>	</section>
	<article>
		<?php if (!isset($_SESSION[id])) : ?><a href='javascript:form("login")' class='abloc'>Autentifica-te !</a> <?php else : include 'php/table.php'; endif; ?>
	</article>	
	<section id='luna' style="<?php if ($_SESSION[id]) echo "display: block"; ?>">	Luna Curenta	</section>
	<aside></aside>
</body>
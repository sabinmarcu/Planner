<?php
	session_start();
?>
<!DOCTYPE html>
<head>
	<title>	Planiflex v1.0	</title>
	<link rel="stylesheet" href="/css/style.css" type="text/css" media="screen" title="no title" charset="utf-8">
	<link rel="stylesheet" href="/css/date_input.css" type="text/css" media="screen" title="no title" charset="utf-8">
	
	<script src="/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="/js/jquery.ui.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="/js/jquery.date_input.js" type="text/javascript" charset="utf-8"></script>
	<script src="/js/functions.js" type="text/javascript" charset="utf-8"></script>
	
</head>
<body>
	<div class='header'>	Planiflex v1.0	</div>
	<div class='section' id='admin' style="<?php if ($_SESSION[id]) echo "display: block"; ?>">	<a href='javascript:form("admin")'>Profilul meu</a> | <a href='javascript:form("logout")'>Deautentifica-ma</a> <br> <a href='javascript:form("date")'>Alege o luna</a>	</div>
	<div class='article'>
		<?php if (!isset($_SESSION[id])) : ?><a href='javascript:form("login")' class='abloc'>Autentifica-te !</a> <?php else : include 'php/table.php'; endif; ?>
	</div>	
	<div class='section' id='luna' style="<?php if ($_SESSION[id]) echo "display: block"; ?>">	Luna Curenta	</div>
	<div class='aside'>
		<p>Acest program functioneaza pe baza unui tipar si a unei zi de pornire. Spre exemplu, in timpul saptamanii aveti program normal si in weekend aveti liber. In programul acesta se traduce prin : </p>
		<ul>
			<li>Tipar : <span>Lucru > Lucru > Lucru > Lucru > Lucru > Liber > Liber</span></li>
			<li>Zi de inceput : <span>Orice zi de luni</span></li>
		</ul>
		<p>Pornind de la aceste date, programul poate calcula o luna din anul 2500 daca doriti.</p>
		<p>De asenenea, cu tabelul in fata, daca doriti ca doar o zi sa fie tratata special, atunci doar dati click pe ea si introduceti particularitatea. Daca nu o mai doriti, apasati click dreapta pe casuta respectiva si va aparea programul corect conform tiparului.</p>
	</div>
</body>
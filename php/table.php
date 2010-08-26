<?php
	session_start();
?>
<table cellspacing='0' cellpadding='0'>
	<tr class='info'>
		<th>	Luni	</th>
		<th>	Marti	</th>
		<th>	Miercuri	</th>
		<th>	Joi	</th>
		<th>	Vineri	</th>
		<th>	Sambata 	</th>
		<th>	Duminica	</th>
	</tr>	
<?php
	include 'functions.php';
	if (!secure($_POST[date]))	$date = time();
	else $date = secure($_POST[date]);
	$date = mktime(0, 0, 0, date("m", $date), 1, date("Y", $date));
	$diff = floor(($date - strtotime($_SESSION[inceput])) /(60*60*24));
	$exc = (date("w", $date));
	if ($exc == 0)	$exc = 7;	$exc--;
	$lastm = date("t", mktime(0, 0, 0, date("m", $date) - 1, 1, date("Y", $date)));
	$lastm = $lastm - $exc + 1;
	$tipar = explode(">", secure($_SESSION[tipar]));
	$day = ($diff - $exc) - intval(($diff - $exc) / count($tipar)) * count($tipar);
	$pass = 0;	$inv = $exc;
	$days = explode(",", str_replace(" ", "", secure($_SESSION[zilelibere])));
	while ($pass++ < ceil((date("t", $date) + $inv) / 7))	{
		?>	<tr class='zile' id='<?php echo $pass; ?>'>	<?php
		for ($i = 1; $i <= 7; $i++)	{	if ($exc > 0 || ($pass == ceil((date("t", $date) + $inv) / 7) && $i + ($pass - 1) * 7 - $inv > date("t", $date) )) {
			?>	<td class='inv'> <?php  echo $lastm + $i - 1; $exc--; } else { 
			?>  <td id = '<?php echo $i + ($pass - 1) * 7 - $inv; ?>'> <?php if ($pass == 1) echo $i - $inv; else echo $i + ($pass - 1) * 7 - $inv; }?> </td> <?php
			}	if ($pass == 1) $exc = $inv;
		?>	</tr><tr class='plan' id='<?php echo $pass; ?>'>	<?php
		for ($i = 1; $i <= 7; $i++)	{if ($exc > 0 || ($pass == ceil((date("t", $date) + $inv) / 7) && $i + ($pass - 1) * 7 - $inv > date("t", $date))) {
			?>	<td class='inv'> <?php $exc--;	 } else { 
			?>  <td id = '<?php echo date("Y", $date), "-", date("m", $date), "-", $i + ($pass - 1) * 7 - $inv; ?>'> <?php } if ($day >= count($tipar) )	$day = 0; if (in_array(mktime(0, 0, 0, date("m", $date), ($i + ($pass - 1) * 7 - $inv), date("Y", $date)), $days)) { echo "Co"; $day++; } else echo $tipar[$day++]; ?> </td> <?php
		}
		$exc = 0;
	}
?>
</table>
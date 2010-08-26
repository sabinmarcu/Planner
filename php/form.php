<?php
	include 'functions.php';
	switch(secure($_POST[form]))	{
		case 'login'	:
		?>
			<form method = 'post' action = 'login' name = 'loginform' id = 'loginform'>
				<label for='username'>Username</label>
				<input type='text' name='username' placeholder="Numele de utilizator" id='username' />
				<label for='password'>Parola</label>
				<input type='password' name='password' placeholder="Parola" id='password' />
				<input type='submit' value='Autentifica-te !' class='button' />
				<a href='javascript:form("register")' class='button'>Inregistreaza-te !</a>
			</form>
		<?php
		break;
		case 'register'	:
		?>
			<form method = 'post' action = 'register' name = 'registerform' id = 'registerform'>
				<label for='name'>Nume</label>
				<input type='text' name='name' placeholder="Numele tau" id='name' />
				<label for='username'>Username</label>
				<input type='text' name='username' placeholder="Numele de utilizator" id='username' />
				<label for='password'>Parola</label>
				<input type='password' name='password' placeholder="Parola" id='password' />
				<label for='repassword'>Parola (din nou, pentru verificare)</label>
				<input type='password' name='repassword' placeholder="Parola din nou" id='repassword' />
				<label for='tipar'>Tipar</label>
				<input type='text' name='tipar' placeholder="Z > N > - > -" id='tipar' />
				<label for='data'>Data de inceput</label>
				<input type='text' name='data' placeholder="Data de la care sa pornesc" id='data' />
				<input type='submit' value='Inregistreaza-te !' class='button' />
			</form>
		<?php
		break;
		case 'logout'	:
		?>
			<form method = 'post' action = 'logout' name = 'logoutform' id = 'logoutform'>
				<input type='submit' value='Deautentifica-ma !' class='button' />
			</form>
		<?php
		break;
		case 'admin'	:
		?>
			<form method = 'post' action = 'admin' name = 'adminform' id = 'adminform'>
				<label for='name'>Nume</label>
				<input type='text' name='name' placeholder="Numele tau" id='name' />
				<label for='password'>Parola</label>
				<input type='password' name='password' placeholder="Parola" id='password' />
				<label for='repassword'>Parola (din nou, pentru verificare)</label>
				<input type='password' name='repassword' placeholder="Parola din nou" id='repassword' />
				<label for='tipar'>Tipar</label>
				<input type='text' name='tipar' placeholder="Z > N > - > -" id='tipar' />
				<label for='data'>Data de inceput</label>
				<input type='text' name='data' placeholder="Data de la care sa pornesc" id='data' />
				<input type='submit' value='Actualizeaza datele !' class='button' />
				<a href='javascript:table("")' class='button'>Afiseaza tabelul !</a>
			</form>
		<?php
		break;
		case 'date'	:
		?>
			<form method = 'post' action = 'table' name = 'tableform' id = 'tableform'>
				<label for='date'>Luna pe care doriti sa o vizualizati <br> Alegeti orice zi a lunii. </label>
				<input type='text' placeholder='Luna pe care o doriti' id='date' name='date'/>
				<input type='submit' value='Vizualizeaza !' />
			</form>
		<?php
		break;
	}
?>
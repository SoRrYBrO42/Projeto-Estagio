<?php 
	require 'ligacao.php';
	if (isset($_POST['registo'])) {
		$hashed_password=password_hash($_POST['password'], PASSWORD_DEFAULT);
		$querry=$con->prepare("INSERT INTO admins (`username`, `password`) VALUES (?,?);");
		$querry->bind_param("ss",$_POST['username'],$hashed_password);
		$querry->execute();
		if ($querry->affected_rows===0) {
			?>
				<script type="text/javascript">
					alert("Ocurreu algo não esperado.");
				</script>
			<?php
		}else{
			?>
				<script type="text/javascript">
					alert($_POST['nome']" inserido com sucesso.");
				</script>
			<?php	
		}
		$querry->close();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div>
		<h3>Registo</h3>
		<form method="POST">
			<label>Username:</label>
				<input name="username"><br>
			<label>Password:</label>
				<input type="Password" name="password"><br>
			<input type="submit" name="registo">
		</form>
	</div>
</body>
</html>
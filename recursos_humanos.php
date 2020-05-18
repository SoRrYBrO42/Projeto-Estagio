<?php 
	require ('ligacao.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Recursos humanos</title>
	</head>
	<body>
		<?php require ('nav.php'); ?>
		<div>
			<form method="POST">
				<img id="foto_place" src="fotos/
					<?php 
						if (isset($_GET['id_treinador'])){
							echo $linha['foto'];
						}elseif (isset($_POST['insert']) or isset($_POST['update'])){
							if (!isset($_POST['foto'])){
								if($_POST['sexo']=='Masculino'){
									echo("Male_user.png");
								}else{
									echo("Female_user.png");
								}
							}else{
								echo $_POST['foto'];
							}
						}else{
							echo"Male_user.png";
						} 
					?>" alt="Foto do treinador" height="200" width="200"><br>
				<label>Escolher a foto</label><br>
	    			<input type="file" name="foto" accept="image/png, image/jpeg"><br>

				<label>Cargo:</label>
					<select>
						<?php 
							$querry = $con->prepare("SELECT * FROM cargos");
							$querry->execute();
							$resultado=$querry->get_result();
							if($resultado->num_rows === 0){ 
								echo "";
							}else{
								while ($linha=$resultado->fetch_assoc()) {
									?>
										<option id="<?php echo($linha['id_cargo']); ?>">
											<?php echo($linha['cargo']); ?>
										</option>
									<?php
								}
							};
						?>
					</select><br>
				<label>Salario:</label>
					<input name="salario">€<br>
				<label>Nome:</label>
					<input name="nome"><br>
				<label>CC:</label>
					<input name="cc"><br>
				<label>NIF:</label>
					<input name="nif"><br>
				<label>Localidade:</label>
					<input name="localidade"><br>
				<label>Freguesia:</label>
					<input name="freguesia"><br>
				<label>Concelho:</label>
					<input name="concelho"><br>
				<label>CP:</label>
					<input name="CP"><br>
				<label>Email:</label>
					<input name="email"><br>
				<label>Telemovel:</label>
					<input name="telemovel"><br>
				<label>Sexo:</label>
					<select>
						<option value="Masculino">Masculino</option>
						<option value="Feminino">Feminino</option>
					</select><br>
				<label>Data de nascimento:</label>
					<input type="date" name="dt_nasc"><br>
				<label>Registo criminal:</label>
					<input type="file" name="registo_criminal"><br>
				<label>Certificado academico:</label>
					<input type="file" name="certificado_academico"><br>
				<label>Certificado sbv/dae:</label>
					<input type="file" name="certificado_sbv_dae"><br>
				<input type="submit" name="insert" value="Inserir">
			</form>
		</div>
	</body>
</html>
<script type="text/javascript">

</script>
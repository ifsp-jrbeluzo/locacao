<?php

	include("menu.php");

    include("conexao.php");

	$cod_cliente = $_POST["cod_cliente"];
	$cod_veiculo = $_POST["cod_veiculo"];
	$data_inicio = $_POST["data_inicio"];
	$data_fim = $_POST["data_fim"];
	
	

	$consulta = "SELECT valor_diaria FROM veiculo WHERE id_veiculo='$cod_veiculo'";
	$resultado = mysqli_query($conexao,$consulta) or die ("Erro");
	
	$linha = mysqli_fetch_assoc($resultado);
	$valor_diaria = $linha["valor_diaria"];

    $insercao = 
		"INSERT INTO movimentacao 
				VALUES (NULL,'$cod_cliente','$cod_veiculo','$data_inicio','$data_fim','$valor_diaria')";
	
	// mysqli_error($conexao)
    mysqli_query($conexao,$insercao) 
		or die("Erro. Não foi possível inserir o carro no sistema. - ".mysqli_error($conexao));

	echo "Veículo cadastrado com sucesso.";

?>
<?php
  if (isset($_POST['id'])) {
  	include('../../db/InterfaceCRUD.class.php');
    include('../../db/PdoConexao.class.php');
    include('../../db/Leitor.class.php');
    include('../../db/LeitorCRUD.class.php');
    //criando objeto chamado Leitor
  	$leitor = new Leitor($_POST['nome'], $_POST['nascimento'], $_POST['cpf'], $_POST['sexo'], $_POST['fone'], $_POST['rua'], $_POST['numero'], $_POST['bairro'], $_POST['cidade'], $_POST['email']);
    //adicionando o id do usuario
    $leitor->setId($_POST['id']);
  	//criando objeto da classe crud
  	$leitorCRUD = new LeitorCRUD();
  	if ($leitorCRUD->atualizar($leitor)){
  		//echo 'Atualizado';
  		header('Location: ../../leitor/frmbusca.php?mess=updateok');
  	}else{
  		//echo 'Erro';
  		header('Location: ../../leitor/frmbusca.php?mess=updateerro');
  	}
  }
?>
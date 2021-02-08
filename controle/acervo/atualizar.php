<?php
  if (isset($_POST['id'])) {
  	include('../../db/PdoConexao.class.php');
  	include('../../db/InterfaceCRUD.class.php');
  	include('../../db/Acervo.class.php');
  	include('../../db/AcervoCRUD.class.php');
    //criando objeto chamado acervo
  	$acervo = new Acervo($_POST['isbn'], $_POST['autor'], $_POST['titulo'], $_POST['ano_plublicacao'], $_POST['editora'], $_POST['npaginas'], $_POST['exemplar']);
    //adicionando o id do usuario
    $acervo->setId($_POST['id']);
  	//criando objeto da classe crud
  	$acervoCRUD = new AcervoCRUD();
  	if ($acervoCRUD->atualizar($acervo)){
  		//echo 'Atualizado';
  		header('Location: ../../acervo/frmbusca.php?mess=updateok');
  	}else{
  		//echo 'Erro';
  		header('Location: ../../acervo/frmbusca.php?mess=updateerro');
  	}
  }
?>
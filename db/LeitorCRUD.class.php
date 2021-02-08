<?php

	class LeitorCRUD implements InterfaceCRUD{
		private $instanciaConexaoPdoAtiva;
		private $tabela;

		public function __construct(){
			$this->instanciaConexaoPdoAtiva = PdoConexao::getInstancia();
			$this->tabela = 'tbleitor';
		}
		public function salvar($objeto){
			$id = null;
			$nome = $objeto->getNome();
			$nascimento = $objeto->getnascimento();
			$cpf = $objeto->getCpf();
			$sexo = $objeto->getSexo();
			$fone = $objeto->getFone();
			$rua = $objeto->getRua();
			$numero = $objeto->getNumero();
			$bairro = $objeto->getBairro();
			$cidade = $objeto->getCidade();
			$email = $objeto->getEmail();
			 
			$sql = "insert into {$this->tabela} (id_leitor, nome, nascimento, cpf, sexo, fone, rua, numero, bairro, cidade, email) values (:id, :nome, :nascimento, :cpf, :sexo, :fone, :rua, :numero, :bairro, :cidade, :email)";
			try{
				$operacao = $this->instanciaConexaoPdoAtiva->prepare($sql);
				$operacao->bindValue(":id",$id,PDO::PARAM_INT);
				$operacao->bindValue(":nome",$nome,PDO::PARAM_STR);
				$operacao->bindValue(":nascimento",$nascimento,PDO::PARAM_STR);
				$operacao->bindValue(":cpf",$cpf,PDO::PARAM_STR);
				$operacao->bindValue(":sexo",$sexo,PDO::PARAM_STR);
				$operacao->bindValue(":fone",$fone,PDO::PARAM_STR);
				$operacao->bindValue(":rua",$rua,PDO::PARAM_STR);
				$operacao->bindValue(":numero",$numero,PDO::PARAM_STR);
				$operacao->bindValue(":bairro",$bairro,PDO::PARAM_STR);
				$operacao->bindValue(":cidade",$cidade,PDO::PARAM_STR);
				$operacao->bindValue(":email",$email,PDO::PARAM_STR);
				//testando se o insert vai dar certo
				if ($operacao->execute()) {
					if ($operacao->rowCount() > 0) {
						return true;
					}else{
						return false;
					}
				}else{
					return false;
				}

			}catch (PDOException $excecao){
				echo $excecao->getMessage();
			}
		}
		public function atualizar($objeto){
			//UPDATE `tabela` SET `nome` = 'nome1', `email` = 'nome@teste.com.br', `senha` = '3211' WHERE `tabela`.`id_acervo` = :id;
			$id = $objeto->getId();
			$nome = $objeto->getNome();
			$nascimento = $objeto->getNascimento();
			$cpf = $objeto->getCpf();
			$sexo = $objeto->getSexo();
			$fone = $objeto->getFone();
			$rua = $objeto->getRua();
			$numero = $objeto->getNumero();
			$bairro = $objeto->getBairro();
			$cidade = $objeto->getCidade();
			$email = $objeto->getEmail();

			$sql = "update {$this->tabela} set nome=:nome, nascimento=:nascimento, cpf=:cpf, sexo=:sexo, fone=:fone, rua=:rua, numero=:numero, bairro=:bairro, cidade=:cidade, email=:email where id_leitor=:id";
			try{
				$operacao = $this->instanciaConexaoPdoAtiva->prepare($sql);
				$operacao->bindValue(":id",$id,PDO::PARAM_INT);
				$operacao->bindValue(":nome",$nome,PDO::PARAM_STR);
				$operacao->bindValue(":nascimento",$nascimento,PDO::PARAM_STR);
				$operacao->bindValue(":cpf",$cpf,PDO::PARAM_STR);
				$operacao->bindValue(":sexo",$sexo,PDO::PARAM_STR);
				$operacao->bindValue(":fone",$fone,PDO::PARAM_STR);
				$operacao->bindValue(":rua",$rua,PDO::PARAM_STR);
				$operacao->bindValue(":numero",$numero,PDO::PARAM_STR);
				$operacao->bindValue(":bairro",$bairro,PDO::PARAM_STR);
				$operacao->bindValue(":cidade",$cidade,PDO::PARAM_STR);
				$operacao->bindValue(":email",$email,PDO::PARAM_STR);

				//testando se o atualizar vai dar certo
				if ($operacao->execute()) {
					return true;
				}else{
					return false;
				}

			}catch (PDOException $excecao){
				echo $excecao->getMessage();
			}
		}
		public function ler($id){
			$sql = "select * from {$this->tabela} where id_leitor=:id";
			try{
				$operacao = $this-> instanciaConexaoPdoAtiva->prepare($sql);
				$operacao->bindValue(":id",$id,PDO::PARAM_INT);
				$operacao->execute();
				$linha = $operacao-> fetch(PDO::FETCH_OBJ);
				$nome = $linha-> nome;
				$nascimento = $linha-> nascimento;
				$cpf = $linha-> cpf;
				$sexo = $linha-> sexo;
				$fone = $linha-> fone;
				$rua = $linha-> rua;
				$numero = $linha-> numero;
				$bairro = $linha-> bairro;
				$cidade = $linha-> cidade;
				$email = $linha-> email;
				
				//objeto da classe usuario
				$leitor = new Leitor($nome, $nascimento, $cpf, $sexo, $fone, $rua, $numero, $bairro, $cidade, $email);
				$leitor->setId($id);
				return $leitor;
				
			}catch (PDOException $excecao){
				echo $excecao->getMessage();
			}
		}
		public function apagar($id){
			$sql = "delete from {$this->tabela} where id_leitor=:id";
			try{
				$operacao = $this->instanciaConexaoPdoAtiva->prepare($sql);
				$operacao->bindValue(":id",$id,PDO::PARAM_INT);
				//testando se o delete vai dar certo
				if ($operacao->execute()) {
					if ($operacao->rowCount() > 0) {
						return true;
					}else{
						return false;
					}
				}else{
					return false;
				}
			}catch (PDOException $excecao){
				echo $excecao->getMessage();
			}
		}
		//função consultar
		public function consultar($sql){
			try{
				$operacao = $this->instanciaConexaoPdoAtiva->prepare($sql);
				$operacao->execute();
				$linhas = $operacao->fetchAll();
				return $linhas;
			}catch(PDOException $excecao){
				echo $excecao->getMessage();
			}
		}
	}	
?>
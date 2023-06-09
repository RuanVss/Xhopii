<?php

class BancoDeDados{

    private $host;
    private $login;
    private $senha;
    private $dataBase;

    public function __construct($Host, $Login, $Senha, $DataBase){
        $this->host = $Host;
        $this->login = $Login;
        $this->senha = $Senha;
        $this->dataBase = $DataBase;
    }

    //Métodos
    public function conectarBD(){

        $conexao = mysqli_connect($this->host,$this->login,$this->senha,$this->dataBase);
        return($conexao);
    }
    
    public function inserirCliente($cliente){
        
        $conexao = conectarBD();
        $consulta = "INSERT INTO cliente (cpf, nome, sobrenome, dataNascimento, telefone, email, senha) 
                     VALUES ('{$cliente->get_Cpf()}',
                             '{$cliente->get_Nome()}',
                             '{$cliente->get_Sobrenome()}',
                             '{$cliente->get_DataNasc()}',
                             '{$cliente->get_Telefone()}',
                             '{$cliente->get_Email()}',
                             '{$cliente->get_Senha()}')";
        mysqli_query($conexao,$consulta);
    }
    
    public function inserirProduto($produto){
        
        $conexao = $this->conectarBD();
        $consulta = "INSERT INTO produto (nome, fabricante, descricao, valor) 
                     VALUES ('{$produto->get_Nome()}',
                             '{$produto->get_Fabricante()}',
                             '{$produto->get_Descricao()}',
                             '{$produto->get_Valor()}')";
        mysqli_query($conexao,$consulta);
    }
    
    public function inserirFuncionario($funcionario){
        
        $conexao = conectarBD();
        $consulta = "INSERT INTO funcionario (cpf, nome, sobrenome, dataNascimento, telefone, email, salario) 
                     VALUES ('{$funcionario->get_Cpf()}',
                             '{$funcionario->get_Nome()}',
                             '{$funcionario->get_Sobrenome()}',
                             '{$funcionario->get_DataNasc()}',
                             '{$funcionario->get_Telefone()}',
                             '{$funcionario->get_Email()}',
                             '{$funcionario->get_Salario()}')";
        mysqli_query($conexao,$consulta);
    }
    
    public function retornarClientes(){
    
        $conexao = conectarBD();
        $consulta = "SELECT * FROM cliente";
        $listaClientes = mysqli_query($conexao,$consulta);
        return $listaClientes;
    }
    
    public function retornarProdutos(){
        $conexao = conectarBD();
        $consulta = "SELECT * FROM produto";
        $listaProdutos = mysqli_query($conexao,$consulta);
        return $listaProdutos;
    }

    public function retornarFuncionarios(){
    
        $conexao = $conexao = $this->conectarBD();
        $consulta = "SELECT * FROM funcionario";
        $listaFuncionarios = mysqli_query($conexao,$consulta);
        return $listaFuncionarios;
    }
}

?>

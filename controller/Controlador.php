<?php

class Controlador{

    private $bancoDeDados;

    function __construct(){
        $this->bancoDeDados = new BancoDeDados("localhost","root","","xhopii");
    }

     public function cadastrarProduto($nome,$fabricante,$descricao,$valor){

        $produto = new Produto($nome,$fabricante,$descricao,$valor);
        $this->bancoDeDados->inserirProduto($produto);

    }
    public function visualizarProdutos(){
        $this->bancoDeDados->conectarBD();
        $listaProdutos = retornarProdutos();
        while($produto = mysqli_fetch_assoc($listaProdutos)){
            return "<section class=\"conteudo-bloco\">";
                   "<h2>" . $produto["nome"] . "</h2>";
                   "<p>Fabricante: " . $produto["fabricante"] . "</p>";
                   "<p>Descrição: " . $produto["descricao"] . "</p>";
                   "<p>Valor: " . $produto["valor"] . "</p>";
                   "</section>";
        }
        
    }
    public function cadastrarFuncionario($cpf, $nome, $sobrenome, $dataNascimento, $telefone, $email, $salario)
    {
        $funcionario = new Funcionario($cpf, $nome, $sobrenome, $dataNascimento, $telefone, $email, $salario);
        $this->bancoDeDados->inserirFuncionario($funcionario);
    }
    
    public function visualizarFuncionarios() {
  
        $listaFuncionarios = $this->bancoDeDados->retornarFuncionarios();
        while ($funcionario = mysqli_fetch_assoc($listaFuncionarios)) {
            "<section class=\"conteudo-bloco\">";
            "<h2>" . $funcionario["nome"] . " " . $funcionario["sobrenome"] . "</h2>";
            "<p>CPF: " . $funcionario["cpf"] . "</p>";
            "<p>Data de Nascimento: " . $funcionario["dataNascimento"] . "</p>";
            "<p>Telefone: " . $funcionario["telefone"] . "</p>";
            "<p>Email: " . $funcionario["email"] . "</p>";
            "<p>Salário: " . $funcionario["salario"] . "</p>";
            "</section>";
        }
       
    }
    public function cadastrarCliente($cpf, $nome, $sobrenome, $dataNascimento, $telefone, $email, $senha) {
        $cliente = new Cliente($cpf, $nome, $sobrenome, $dataNascimento, $telefone, $email, $senha);
        $this->bancoDeDados->inserirCliente($cliente);
    }
    
    public function visualizarClientes() {
        $this->bancoDeDados->conectarBD();
        $listaClientes = retornarClientes();
        
        while ($cliente = mysqli_fetch_assoc($listaClientes)) {
              "<section class=\"conteudo-bloco\">";
              "<h2>" . $cliente["nome"] . " " . $cliente["sobrenome"] . "</h2>";
              "<p>CPF: " . $cliente["cpf"] . "</p>";
              "<p>Data de Nascimento: " . $cliente["dataNascimento"] . "</p>";
              "<p>Telefone: " . $cliente["telefone"] . "</p>";
              "<p>Email: " . $cliente["email"] . "</p>";
              "<p>Senha: " . $cliente["senha"] . "</p>";
              "</section>";
        }
       
    }
    

}

?>
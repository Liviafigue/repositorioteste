<?php
class Usuario {

	public $nome;
    private $senha;

	function __construct ($nome, $senha) {
       $this->nome = $nome;

       $this->senha = $senha; 
    }

       
    public function setNome ($nome) {

       $this->nome = $nome;
}

    public function getNome () {

     return $this->nome;
}

    public function getSenha () {

    return $this->senha; 
}
   public function setSenha ($senha) {

    return $this->senha = $senha; 
   }

}

?>
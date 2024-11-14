<?php

class Usuario
{
    private $mysql;

    public function __construct(mysqli $mysql){
        $this->mysql = $mysql;
    } 
    public function adicionar(string $nome, string $apelido,string $email,string $cpf, string $senha,bool $admin):void
    {
        $insereUsuario = $this->mysql->prepare('INSERT INTO usuarios(nome, apelido, email, cpf, senha,admin) VALUES(?,?,?,?,?,?)');
        $insereUsuario->bind_param('sssssi', $nome, $apelido, $email, $cpf, $senha, $admin);
        $insereUsuario->execute();
    } 
    public function editar(string $id, string $nome, string $apelido,string $email,string $cpf, string $senha,bool $admin){
        $editarUsuario = $this->mysql->prepare('UPDATE usuarios SET nome=?, apelido=?, email=?, cpf=?, senha=?,admin=? WHERE id=?');
        $editarUsuario->bind_param('sssssis', $nome, $apelido, $email, $cpf, $senha, $admin, $id);
        $editarUsuario->execute();
    } 
    public function remover(string $id):void
    {
        $removerUsuario = $this->mysql->prepare('DELETE FROM usuarios WHERE id = ?'); 
        $removerUsuario->bind_param('s',$id);
        $removerUsuario->execute();
    } 
    public function exibirTodos(): array
    {

        $resultado = $this->mysql->query('SELECT * FROM usuarios');
        $usuarios = $resultado->fetch_all(MYSQLI_ASSOC);
        return $usuarios;
    }

    public function encontrarPorId(string $id): array
    {
        $selecionaUsuario = $this->mysql->prepare("SELECT * FROM usarios WHERE id = ?");
        $selecionaUsuario->bind_param('s', $id);
        $selecionaUsuario->execute();
        $usuario = $selecionaUsuario->get_result()->fetch_assoc();
        return $usuario;
    }
}
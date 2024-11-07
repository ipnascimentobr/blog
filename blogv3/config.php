<?php

$mysql = new mysqli('localhost', 'editorblog', '123','blog');

if ($mysql == FALSE){
    echo "Erro na conexão";
}
<?php

namespace app\models;
use DOMDocument;

class DemoXml
{
public function generateXml()
{
    $dom = new domDocument("1.0", "utf-8"); // Создаём XML-документ версии 1.0 с кодировкой utf-8
    $root = $dom->createElement("guestbook"); // Создаём корневой элемент
    $dom->appendChild($root);
    $fnames = array("Terje", "Jan", "Torleif","anton","stale","hari","Hege"); // Логины пользователей
    $lnames = array("Beck", "Refsnes", "Rasmussen","chek","refsnes","prawin","Refsnes"); // Пароли пользователей
    for ($i = 0; $i < count($fnames); $i++) {

        $guest = $dom->createElement("guest"); // Создаём узел "user"

        $fname = $dom->createElement("fname", $fnames[$i]); // Создаём узел "login" с текстом внутри
        $lname = $dom->createElement("lname", $lnames[$i]); // Создаём узел "password" с текстом внутри
        $guest->appendChild($fname); // Добавляем в узел "user" узел "login"
        $guest->appendChild($lname);// Добавляем в узел "user" узел "password"
        $root->appendChild($guest); // Добавляем в корневой узел "users" узел "user"
    }
    $dom->save("users.xml"); // Сохраняем полученный XML-документ в файл
}
}
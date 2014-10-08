<?php

$class_name = "Book";

function __autoload($class_name)
{
	include ucfirst($class_name) . ".php";
}

class Model
{
	public function getBookList()
	{
		$soledad = array(
			"title" => "100 anos de soledad", 
			"author" => "Gabriel Garcia", 
			"description" => "Libro clasisco Macondiano", 
			"price" => "$20.000"
		);

		$anillos = array(
			"title" => "Hobit", 
			"author" =>"J. R. R. Tolkien", 
			"description" => "Mundos", 
			"price" => "$50.000"
		);

		$my_book_soledad = new Book($soledad["title"], $soledad["author"], $soledad["description"], $soledad["price"]);
		$my_book_hobit = new Book($anillos["title"], $anillos["author"], $anillos["description"], $anillos["price"]);

		$list_books = array(
			"100 anos de soledad" => $my_book_soledad,
			"Hobit" => $my_book_hobit
		);

		return $list_books;
	}

	public function getBook($title)
	{
		$all_books = $this->getBookList();

		return $all_books[$title];
	}
}

?>
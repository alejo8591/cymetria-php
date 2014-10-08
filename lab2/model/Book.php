<?php

class Book
{
	public $title;
	public $author;
	public $description;
	public $price;

	public function __construct($title, $author, $description, $price)
	{
		$this->title = $title;
		$this->author = $author;
		$this->description = $description;
		$this->price = $price;
	}

}
?>
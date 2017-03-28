<?php

use App\Book;
use App\Author;
use App\Language;
use App\Type;
use App\User;
use App\BookRatings;
use App\TakenBooks;
use Carbon\Carbon;

function get_author_name($id) {
	$author_name = Author::where('id', $id)->value('author_name');

	return $author_name;
}

function get_author_surname($id) {
	$author_surname = Author::where('id', $id)->value('author_surname');

	return $author_surname;
}

function get_language($id) {
	$language = language::where('id', $id)->value('language');

	return $language;
}

function get_type($id) {
	$type = Type::where('id', $id)->value('type');

	return $type;
}

function get_books_by_authors($id) {
	$books = Book::where('author', $id)->count();

	return $books;
}

function get_books_by_genre($id) {
	$books = Book::where('genre', $id)->count();

	return $books;
}

function get_books_by_types($id) {
	$books = Book::where('type', $id)->count();

	return $books;
}

function get_user_name($id) {
	$user_name = User::where('id', $id)->value('name');

	return $user_name;
}

function get_book($id) {
	$book = Book::where('id', $id)->value('title');

	return $book;
}
function get_average_rating($id) {
    $ratings = BookRatings::where('book_id', $id)
        ->avg('book_rating');

    $ratings = round($ratings, 1);
    return $ratings;
}
function is_late($id) {
	$is_late = TakenBooks::where('book_id', $id)->where('end_day', '<', Carbon::now())->value('id');

	return $is_late;
}
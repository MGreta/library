<?php

use App\Book;
use App\Author;
use App\Language;
use App\Type;
use App\User;
use App\BookRatings;
use App\TakenBooks;
use Carbon\Carbon;
use App\Option;
use App\Genres;

function get_author_name($id) {
	$author_name = Author::where('id', $id)->value('author_name');

	return $author_name;
}

function get_author_surname($id) {
	$author_surname = Author::where('id', $id)->value('author_surname');

	return $author_surname;
}

function get_language($id) {
	$language = Language::where('id', $id)->value('language');

	return $language;
}

function get_all_languages($id) {
	$languages = Language::where('id', '!=', $id)->get();

	return $languages;
}

function get_type($id) {
	$type = Type::where('id', $id)->value('type');

	return $type;
}

function get_all_types($id) {
	$types = Type::where('id', '!=', $id)->get();

	return $types;
}

function get_books_by_authors($id) {
	$books = Book::where('author', $id)->count();

	return $books;
}

function get_books_by_genre($id) {
	$books = Book::where('genre', $id)->count();

	return $books;
}

function get_genre($id) {
	$genre = Genres::where('id', $id)->value('genre');

	return $genre;
}

function get_all_genres($id) {
	$genres = Genres::where('id', '!=', $id)->get();

	return $genres;
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
function days_late($id) {
	$late_date = new Carbon(TakenBooks::where('id', $id)->where('end_day', '<', Carbon::now())->value('end_day'));
	$now = Carbon::now();
	$time_late = ($late_date->diff($now)->days);

	return $time_late;
}
function days_left($id) {
	$end_date = new Carbon(TakenBooks::where('id', $id)->where('end_day', '>', Carbon::now())->value('end_day'));
	$now = Carbon::now();
	$time_left = ($now->diff($end_date)->days);

	return $time_left;
}
function get_price() {
	$price = Option::where('name', 'debt_price')->value('value');

	return $price;
}
function get_debt($id) {
	$price = Option::where('name', 'debt_price')->value('value');
	$late_date = new Carbon(TakenBooks::where('id', $id)->where('end_day', '<', Carbon::now())->value('end_day'));
	$now = Carbon::now();
	$time_late = ($late_date->diff($now)->days);
	$debt = $time_late*$price;


	return $debt;
}
function is_read($id) {
	$is_read = TakenBooks::where('id', $id)->value('read');

	return $is_read;
}
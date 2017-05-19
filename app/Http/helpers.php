<?php

use App\Book;
use App\Author;
use App\Language;
use App\Type;
use App\User;
use App\BookRatings;
use App\TakenBooks;
use App\Comments;
use Carbon\Carbon;
use App\Option;
use App\Genres;
use App\Book_reservations;
use App\PublishingHouse;
use App\City;
use App\Role;

function get_author_name($id) {
	$author_name = Author::where('id', $id)->value('author_name');

	return $author_name;
}

/*function get_author_surname($id) {
	$author_surname = Author::where('id', $id)->value('author_surname');

	return $author_surname;
}*/

function get_language($id) {
	$language = Language::where('id', $id)->value('language');

	return $language;
}

/*function get_all_languages($id) {
	$languages = Language::where('id', '!=', $id)->get();

	return $languages;
}*/

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

function get_user_surname($id) {
	$user_surname = User::where('id', $id)->value('last_name');

	return $user_surname;
}

/*function get_user_role($id) {
	$role = Role::where
}*/

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
function count_ratings($id) {
	$ratings = BookRatings::where('book_id', $id)->count();
	return $ratings;
}
function count_comments($id) {
	$comments = Comments::where('book_id', $id)->count();
	return $comments;
}
function count_book_taken_times($id) {
	$times = TakenBooks::where('book_id', $id)->count();
	return $times;
}
function count_author_taken_times($id) {
	$times = TakenBooks::where('id', $id)->count();

	$books = DB::table('books')->join('taken_books', 'books.id', '=', 'taken_books.book_id')->where('books.author', $id)->count();

	return $books;
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
function is_price() {
	$price = Option::where('name', 'debt_price')->value('value');

	return $price;
}
function get_days_to_have_book() {
	$days = Option::where('name', 'days_to_have_book')->value('value');

	return $days;
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
function count_free_books($id) {
	$all = Book::where('id', $id)->value('quantity');
	$reserved = Book_reservations::where('book_id', $id)->count();
	$taken = TakenBooks::where('book_id', $id)->count();

	$free = $all - $reserved - $taken;
	return $free; 
}

function count_continued_books() {
	$books = TakenBooks::where('returned', '0')->where('times_continued', '>', '0')->count();

	return $books;
}

function count_user_continued_books() {
	$user_id = Auth::user()->id;
	$books = TakenBooks::where('user_id', $user_id)->where('returned', '0')->where('times_continued', '>', '0')->count();

	return $books;
}

function count_occupied_books() {
	$books = TakenBooks::where('returned', '0')->orderBy('end_day')->count();

	return $books;
}

function count_user_occupied_books() {
	$user_id = Auth::user()->id;
	$books = TakenBooks::where('user_id', $user_id)->where('returned', '0')->orderBy('end_day')->count();

	return $books;
}

function count_reserved_books() {
	$reservations = Book_reservations::where('is_ready', '0')->count();
    $reservations_is_ready = Book_reservations::where('is_ready', '1')->count();

    $books = $reservations + $reservations_is_ready;

    return $books;
}

function count_user_reserved_books() {
	$user_id = Auth::user()->id;
	$reservations = Book_reservations::where('user_id', $user_id)->where('is_ready', '0')->count();
    $reservations_is_ready = Book_reservations::where('user_id', $user_id)->where('is_ready', '1')->count();

    $books = $reservations + $reservations_is_ready;

    return $books;
}

function count_late_books() {
	$books = TakenBooks::where('returned', '0')->where('end_day', '<', Carbon::now())->orderBy('end_day')->count();

	return $books;
}

function count_user_late_books() {
	$user_id = Auth::user()->id;
	$books = TakenBooks::where('user_id', $user_id)->where('returned', '0')->where('end_day', '<', Carbon::now())->orderBy('end_day')->count();

	return $books;
}

function count_returned_books() {
	$books = TakenBooks::where('returned', '1')->orderBy('end_day')->count();

	return $books;
}

function count_user_returned_books() {
	$user_id = Auth::user()->id;
	$books = TakenBooks::where('user_id', $user_id)->where('returned', '1')->orderBy('end_day')->count();

	return $books;
}

function get_publishing_house($publishing_house_id) {
	$publishing_house = PublishingHouse::where('id', $publishing_house_id)->value('publishing_house');

	return $publishing_house;
}

function get_city($city_id) {
	$city = City::where('id', $city_id)->value('city');

	return $city;
}

function is_canceled_reservation($id) {
	$book = Book_reservations::where('id', $id)->value('is_active');

	return $book;
}
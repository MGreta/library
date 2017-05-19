<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/', 'WelcomeController@index');
/*Route::get('home', 'WelcomeController@index');*/
// Route::get('login', 'UserController@login');

Route::get('login', 'AuthController@getLogin');
Route::post('/', 'AuthController@postLogin');
Auth::routes();

/*Route::get('/home', 'HomeController@index');*/
/*Route::get('login', 'AuthController@getLogin');*/
/*Route::get('/', 'UserController@profile');*/
Route::get('profile', 'UserController@profile');
/*Route::post('profile/{id}/edit', 'UserController@edit');*/
Route::post('profile/edit', 'UserController@update');
/*Route::post('profile', 'UserController@update');*/

/**
* Admin routes
*/
Route::group(['middleware' => ['auth', 'role:admin']], function () {
	Route::get('admin', 'AdminController@index');

	//Users
		Route::get('add-user', 'AdminController@addUser');
		Route::post('add-user', 'AdminController@storeUser');
		
		Route::get('user/{id}/edit-user', 'AdminController@editUser');
		Route::get('all-users', 'AdminController@allUsers');
		Route::post('all-users/{id}/delete', 'UserController@destroy');

		Route::get('users', 'AdminController@users');

		Route::get('user/{id}/edit', 'AdminController@editUser');
		Route::post('user/{id}/edit', 'AdminController@userEdit');

		Route::get('about-user/{id}', 'AdminController@aboutUser');

		Route::get('/users-search', 'AdminController@usersSearch');


	//Order Users
		Route::get('users/byFirstName', 'AdminController@orderByFirstName');
		Route::get('users/byLastName', 'AdminController@orderByLastName');
		Route::get('users/byEmail', 'AdminController@orderByEmail');
		Route::get('users/byClass', 'AdminController@orderByClass');
		Route::get('users/byRole', 'AdminController@orderByRole');

	
	//Books
		Route::get('book/{id}/edit', 'BookController@editBook');
		
		Route::get('add-book', 'BookController@addBook');
		Route::post('add-book', 'BookController@storeBook');

		/*Route::get('book/{id}/edit', 'BookController@edit');*/
		Route::post('book/{id}/edit', 'BookController@bookEdit');

		Route::post('book/{id}/delete', 'BookController@destroy');

	
	//Language
		/*Route::get('admin/language', 'LanguageController@allLanguages');*/
		Route::post('language', 'LanguageController@store');
		
		Route::get('language/{id}/edit', 'LanguageController@editLanguage');
		Route::post('language/{id}/edit', 'LanguageController@LanguageEdit');
		Route::post('language/{id}/delete', 'LanguageController@destroy');


	//Type
		Route::post('type', 'TypeController@store');
		
		Route::get('type/{id}/edit', 'TypeController@editType');
		Route::post('type/{id}/edit', 'TypeController@TypeEdit');

		Route::post('type/{id}/delete', 'TypeController@destroy');


	//City
		Route::post('city', 'CityController@store');
		
		/*Route::get('city/{id}/edit', 'CityController@editType');*/
		Route::post('city/{id}/edit', 'CityController@cityEdit');

		Route::post('city/{id}/delete', 'CityController@destroy');


	//Publishing House
		Route::post('publishing-house', 'PublishingHouseController@store');
		
		Route::get('publishing-house/{id}/edit', 'PublishingHouseController@editType');
		Route::post('publishing-house/{id}/edit', 'PublishingHouseController@TypeEdit');

		Route::get('publishing-house/{id}/delete', 'PublishingHouseController@destroy');


	//Authors
		Route::post('authors', 'AuthorController@store');
		Route::post('authors/{id}/delete', 'AuthorController@destroy');

		Route::get('author/{id}/edit', 'AuthorController@AuthorEdit');
		Route::post('author/{id}/edit', 'AuthorController@AuthorEdit');

	
	//Reservations
		Route::get('reservations', 'Book_reservationsController@index');
		Route::get('/reservations/{id}/taken', 'Book_reservationsController@postToTakenBooks');
		Route::post('/reservations/{id}/taken', 'Book_reservationsController@postToTakenBooks');

		Route::get('/reservations/{id}/ready', 'Book_reservationsController@bookIsReady');
		Route::post('/reservations/{id}/ready', 'Book_reservationsController@bookIsReady');

		Route::get('/reservations/{id}/not-ready', 'Book_reservationsController@bookNotReady');
		Route::post('/reservations/{id}/not-ready', 'Book_reservationsController@bookNotReady');

		Route::get('/reservations/{id}/remove', 'Book_reservationsController@removeReservation');


	//Genre
		Route::post('genres', 'GenresController@store');
		Route::post('genres/{id}/delete', 'GenresController@destroy');
		Route::get('genres', 'GenresController@destroy');
		
		Route::get('genres/{id}/edit', 'GenresController@GenreEdit');
		Route::post('genres/{id}/edit', 'GenresController@GenreEdit');

	//Register book to take
		Route::get('register-book', 'TakenBooksController@registerBookIndex');
		Route::post('register-book', 'TakenBooksController@registerBook');

	//Shopping cart
		Route::get('/admin-shopping-cart', 'AdminController@shoppingCart');

		Route::post('/admin-shopping-cart/order', 'AdminController@store');
		Route::get('/admin-shopping-cart/{id}/delete', 'AdminController@getRemoveItem');

	//Continued books
		Route::get('/continued-books', 'TakenBooksController@continuedBooks');

		Route::get('/occupied-books/{id}/{taken_id}/continueBook', 'TakenBooksController@continueBook');
	
	//Occupied books
		Route::get('/occupied-books', 'TakenBooksController@index');

		Route::get('/occupied-books/{id}/returned', 'TakenBooksController@returned');
		Route::post('/occupied-books/{id}/returned', 'TakenBooksController@returned');


	//Late books
		Route::get('/late-books', 'TakenBooksController@late');

		Route::get('/late-books/{id}/returned', 'TakenBooksController@returned');
		Route::post('/late-books/{id}/returned', 'TakenBooksController@returned');


	//Options
		Route::get('/options', 'OptionController@index');
		Route::post('/options/debt-price', 'OptionController@debtPrice');
		Route::post('/options/days-to-have-book', 'OptionController@daysToHaveBook');

		
	//Returned books
		Route::get('/returned-books', 'TakenBooksController@returnedBooks');

		Route::get('/returned-books/{id}/not-returned', 'TakenBooksController@notReturned');
		Route::post('/returned-books/{id}/not-returned', 'TakenBooksController@notReturned');
});

/**
* All users routes
*/

	Route::get('books', 'BookController@index');
	Route::get('book/{id}', 'BookController@book');

	Route::get('authors', 'AuthorController@index');
	Route::get('/author/{id}/books', 'BookController@booksByAuthor');

	Route::get('language', 'LanguageController@allLanguages');
	Route::get('/language/{id}/books', 'BookController@booksByLanguage');

	

//Order Books
	Route::get('books/byTitle', 'BookController@orderByTitle');
	Route::get('books/byAuthor', 'BookController@orderByAuthor');
	Route::get('books/byISBN', 'BookController@orderByISBN');
	Route::get('books/byDate', 'BookController@orderByDate');
	Route::get('books/bySize', 'BookController@orderBySize');
	Route::get('books/byLanguage', 'BookController@orderByLanguage');
	Route::get('books/byType', 'BookController@orderByType');
	Route::get('books/byUDK', 'BookController@orderByUDK');
	Route::get('books/byQuantity', 'BookController@orderByQuantity');
	Route::get('books/byQuantity', 'BookController@orderByGenre');


//Type
	Route::get('type', 'TypeController@index');
	Route::get('type/order', 'TypeController@order');
	Route::get('type/{id}/books', 'BookController@booksByType');


//City
	Route::get('city', 'CityController@index');
	Route::get('city/order', 'CityController@order');


//Publishing house
	Route::get('publishing-house', 'PublishingHouseController@index');
	Route::get('publishing-house/order', 'PublishingHouseController@order');


//Genre
	Route::get('genres', 'GenresController@index');
	Route::get('genres/order', 'GenresController@order');
	Route::get('genres/{id}/books', 'BookController@booksByGenre');


//Language
	Route::get('language/order', 'LanguageController@order');


//Order Authors
	Route::get('authors/byName', 'AuthorController@orderByName');
	Route::get('authors/buSurname', 'AuthorController@orderBySurname');


//Shopping cart
	Route::get('/book/{id}/add-to-cart', 'BookController@getAddToCart');
	Route::get('/shopping-cart', 'BookController@shoppingCart');

	/*Route::get('/shopping-cart/order', 'Book_reservationsController@add');*/
	Route::post('/shopping-cart/order', 'Book_reservationsController@store');
	Route::get('/shopping-cart/{id}/delete', 'Book_reservationsController@getRemoveItem');


//Comments
	Route::post('/book/{id}/addComment', 'CommentsController@addComment');
	Route::post('/book/{id}/editComment', 'CommentsController@editComment');
	Route::post('/book/{id}/deleteComment', 'CommentsController@deleteComment');


//Ratings
	Route::post('/book/{id}/rate', 'BookRatingsController@rate');


//Search
	Route::get('/search', 'BookController@showSearch');
	Route::get('/search/search', 'BookController@search');

	Route::get('/detail-search', 'BookController@showDetailSearch');
	Route::get('/detail-search/search', 'BookController@detailSearch');

Route::group(['middleware' => ['auth', 'role:user']], function () {

	//Books
		Route::get('/user-books', 'UserController@books');
		Route::get('/user-late-books', 'UserController@lateBooks');
		Route::get('/user-returned-books', 'UserController@returnedBooks');
		Route::get('/user-reserved-books', 'UserController@reservedBooks');
		Route::get('/user-reserved-books/{id}/cancel', 'UserController@removeReservation');

		Route::get('/user-books/{id}/read', 'UserController@readBook');
		Route::get('/user-books/{id}/not-read', 'UserController@notReadBook');

		Route::get('/user-books/{id}/{taken_id}/continueBook', 'UserController@continueBook');
});


Route::post('add-url', 'WelcomeController@addUrl');
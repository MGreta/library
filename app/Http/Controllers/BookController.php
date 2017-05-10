<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Book;
use App\Language;
use App\Type;
use App\Author;
use App\Genres;
use Session;
use App\Cart;
use App\Comments;
use DB;
use App\BookRatings;
use Validator;
use App\PublishingHouse;
use App\City;
use App\TakenBooks;
use Illuminate\Support\MessageBag;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::join('languages', 'books.language', '=', 'languages.id')->select('books.*', 'languages.language')->get();
        $languages = Language::get();
        $types = Type::all();
        $authors = Author::all();
        $publishing_houses = PublishingHouse::all();
        $cities = City::all();
        $genres = Genres::all();

       return view('book.index', compact('books', 'languages', 'types', 'authors', 'publishing_houses', 'cities', 'genres'));
    }

    public function booksByAuthor($id)
    {
        $books = Book::where('author', $id)->get();
        return view ('book.index', compact('books'));
    }

    public function booksByLanguage($id)
    {
        $books = Book::where('language', $id)->get();
        return view ('book.index', compact('books'));
    }

    public function book($id)
    {
        $book = Book::find($id);
        $comments = Comments::where('book_id', $id)->get();
        $ratings = BookRatings::where('book_id', $id)->get();

        $languages = Language::get();
        $types = Type::all();
        $authors = Author::all();
        $publishing_houses = PublishingHouse::all();
        $cities = City::all();
        $genres = Genres::all();
        return view('book.book', compact('book', 'comments', 'ratings', 'languages', 'types', 'authors', 'publishing_houses', 'cities', 'genres'));
    }

//Order by
    public function orderByTitle()
    {
        $books = DB::table('books')->join('languages', 'books.language', '=', 'languages.id')->select('books.*', 'languages.language')->orderBy('title')->get();
        return view('book.index', compact('books'));
    }

    public function orderByAuthor()
    {
        $books = DB::table('books')->join('authors', 'books.author', '=', 'authors.id')->select('books.*', 'authors.author_name', 'authors.author_surname')->orderBy('authors.author_name')
                                    ->join('languages', 'books.language', '=', 'languages.id')->select('books.*', 'languages.language')
                                    ->get();

        return view('book.index', compact('books'));
    }

    public function orderByISBN()
    {
        $books = DB::table('books')->join('languages', 'books.language', '=', 'languages.id')->select('books.*', 'languages.language')->orderBy('isbn')->get();
        return view('book.index', compact('books'));
    }

    public function orderByDate()
    {
        $books = DB::table('books')->join('languages', 'books.language', '=', 'languages.id')->select('books.*', 'languages.language')->orderBy('date')->get();
        return view('book.index', compact('books'));
    }

    public function orderBySize()
    {
        $books = DB::table('books')->join('languages', 'books.language', '=', 'languages.id')->select('books.*', 'languages.language')->orderBy('size')->get();
        return view('book.index', compact('books'));
    }

    public function orderByLanguage()
    {
        $books = DB::table('books')->join('languages', 'books.language', '=', 'languages.id')->select('books.*', 'languages.language')->orderBy('languages.language')->get();

        return view('book.index', compact('books'));
    }

    public function orderByType()
    {

        $books = DB::table('books')->join('types', 'books.type', '=', 'types.id')->select('books.*', 'types.type')->orderBy('types.type')
                                ->join('languages', 'books.language', '=', 'languages.id')->select('books.*', 'languages.language')
                                ->get();

        return view('book.index', compact('books'));
    }

    public function orderByGenre()
    {

        $books = DB::table('books')->join('genres', 'books.genre', '=', 'genres.id')->select('books.*', 'genres.genre')->orderBy('genres.genre')
                                ->join('languages', 'books.language', '=', 'languages.id')->select('books.*', 'languages.language')
                                ->get();

        return view('book.index', compact('books'));
    }

    public function orderByUDK()
    {
        $books = DB::table('books')->join('languages', 'books.language', '=', 'languages.id')->select('books.*', 'languages.language')->orderBy('udk')->get();
        return view('book.index', compact('books'));
    }

    public function orderByQuantity()
    {
        $books = DB::table('books')->join('languages', 'books.language', '=', 'languages.id')->select('books.*', 'languages.language')->orderBy('quantity')->get();
        return view('book.index', compact('books'));
    }
//Order by
    public function bookEdit($id, Request $request)
    {

        $validator =  Validator::make($request->all(), [
            'title' => 'required|max:255',
            'isbn' => 'required|max:255',
            'date' => 'max:255',
            'size' => 'max:255',
            'quantity' => 'max:255',
            'about' => 'max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors(['error' => 'Klaida. Neleistinas veiksmas.'])->with('wrong_id', $id);
        }

        if ($book = Book::find($id)) {
            $book = Book::find($id);
            $book->title = $request->input('title');
            $book->author = $request->input('author');
            $book->isbn = $request->input('isbn');
            $book->date = $request->input('date');
            $book->size = $request->input('size');
            $book->language = $request->input('language');
            $book->type = $request->input('type');
            $book->quantity = $request->input('quantity');
            $book->publishing_house = $request->input('publishing_house');
            $book->city = $request->input('city');
            $book->genre = $request->input('genre');
            $book->about = $request->input('about');
            $response = $book->save();
            if ($response) {
                return redirect()->back()->with(['message' => 'Knyga atnaujintas.']);
            }
            return redirect('/books');
        }
    }

    public function addBook()
    {
        $languages = Language::all();
        $types = Type::all();
        $authors = Author::all();
        $publishing_houses = PublishingHouse::all();
        $cities = City::all();
        $genres = Genres::all();

        $first_levels = DB::table('udk_first_level')->get();
        $first_level_results = [];
        if ($first_levels) {
            foreach ($first_levels as $first_level) {
                $first_level_results[] = [
                    'id' => $first_level->id,
                    'title' => $first_level->title,
                    'code' => $first_level->code,
                ];
            }
        }

        $second_levels = DB::table('udk_second_level')->get();
        $second_level_results = [];
        if ($second_levels) {
            foreach ($second_levels as $second_level) {
                $second_level_results[] = [
                    'id' => $second_level->id,
                    'first_level_id' => $second_level->id_first_level,
                    'title' => $second_level->title,
                    'code' => $second_level->code,
                ];
            }
        }

        $third_levels = DB::table('udk_third_level')->get();
        $third_level_results = [];
        if ($third_levels) {
            foreach ($third_levels as $third_level) {
                $third_level_results[] = [
                    'first_level_id' => $third_level->id_first_level,
                    'second_level_id' => $third_level->id_second_level,
                    'title' => $third_level->title,
                    'code' => $third_level->code,
                ];
            }
        }
        return view('book.create', compact('languages', 'types', 'authors', 'publishing_houses', 'cities', 'genres', 'first_level_results', 'second_level_results', 'third_level_results'));
    }
    public function storeBook(Request $request)
    {

        //Check input validations

        //author
        if ($request->input('author') == 'other') {
            $validator_auth =  Validator::make($request->all(), [
                'author_name' => 'required|max:255',
                'author_surname' => 'required|max:255'
            ]);
            $author_name = $request->input('author_name');
            $author_surname = $request->input('author_surname');

            if ($validator_auth->fails()) {
                return redirect()->back()->withErrors($validator_auth)->withInput();
            }
        }
        //Language
        if ($request->input('language') == 'other') {
            $validator_language =  Validator::make($request->all(), [
                'add_language' => 'required|max:255|unique:languages,language'
            ]);
            $language_input = $request->input('add_language');

            if ($validator_language->fails()) {
                return redirect()->back()->withErrors($validator_language)->withInput();
            }
        }
        //Type
        if ($request->input('type') == 'other') {
            $validator_type =  Validator::make($request->all(), [
                'add_type' => 'required|max:255|unique:types,type'
            ]);
            $type_input = $request->input('add_type');

            if ($validator_type->fails()) {
                return redirect()->back()->withErrors($validator_type)->withInput();
            }
        }
        //Publishing house
        if ($request->input('publishing_house') == 'other') {
            $validator_publishing_house =  Validator::make($request->all(), [
                'add_publishing_house' => 'required|max:255|unique:publishing_houses,publishing_house'
            ]);
            $publishing_house_input = $request->input('add_publishing_house');

            if ($validator_publishing_house->fails()) {
                return redirect()->back()->withErrors($validator_publishing_house)->withInput();
            }
        }
        //City
        if ($request->input('city') == 'other') {
            $validator_city =  Validator::make($request->all(), [
                'add_city' => 'required|max:255|unique:cities,city'
            ]);
            $city_input = $request->input('add_city');

            if ($validator_city->fails()) {
                return redirect()->back()->withErrors($validator_city)->withInput();
            }
        }
        //Genre
        if ($request->input('genre') == 'other') {
            $validator_genre =  Validator::make($request->all(), [
                'add_genre' => 'required|max:255|unique:genres,genre'
            ]);
            $genre_input = $request->input('add_genre');

            if ($validator_genre->fails()) {
                return redirect()->back()->withErrors($validator_genre)->withInput();
            }
        }




        //author
        if ($request->input('author') == 'other') {
            $author = Author::create([
                'author_name' => $request->input('author_name'),
                'author_surname' => $request->input('author_surname')
            ]);
            if ($author) {
                $author_id = DB::table('authors')->where('author_name', $author_name)->where('author_surname', $author_surname)->value('id');
            }
        } else {
            $author_id = $request->input('author');
        }

        //Language
        if ($request->input('language') == 'other') {
            $language = Language::create([
                'language' => $request->input('add_language')
            ]);
            if ($language) {
                $language_id = DB::table('languages')->where('language', $language_input)->value('id');
            }
        } else {
            $language_id = $request->input('language');
        }

        //Type
        if ($request->input('type') == 'other') {
            $type = Type::create([
                'type' => $request->input('add_type')
            ]);
            if ($type) {
                $type_id = DB::table('types')->where('type', $type_input)->value('id');
            }
        } else {
            $type_id = $request->input('type');
        }

        //Publishing house
        if ($request->input('publishing_house') == 'other') {
            $publishing_house = PublishingHouse::create([
                'publishing_house' => $request->input('add_publishing_house')
            ]);
            if ($publishing_house) {
                $publishing_house_id = DB::table('publishing_houses')->where('publishing_house', $publishing_house_input)->value('id');
            }
        } else {
            $publishing_house_id = $request->input('publishing_house');
        }

        //City
        if ($request->input('city') == 'other') {
            $city = City::create([
                'city' => $request->input('add_city')
            ]);
            if ($city) {
                $city_id = DB::table('cities')->where('city', $city_input)->value('id');
            }
        } else {
            $city_id = $request->input('city');
        }

        //Genre
        if ($request->input('genre') == 'other') {
            $genre = Genres::create([
                'genre' => $request->input('add_genre')
            ]);
            if ($genre) {
                $genre_id = DB::table('genres')->where('genre', $genre_input)->value('id');
            }
        } else {
            $genre_id = $request->input('genre');
        }

        //udk
        $first_levels = DB::table('udk_first_level')->get();
        $input = [];
        foreach ($first_levels as $first_level) {
            if ($request->input($first_level->id) !== 'not-selected') {
                $input[] = [
                    'udk' => $request->input($first_level->id),
                    'first_level_id' => $first_level->id,
                ];
            }
        }

        $udk = "";
        foreach($input as $each)
        {
            $udk = $udk . $each['udk'];
        }
        $genre_code = DB::table('genres')->where('id', $genre_id)->value('code');
        $udk = $udk . $genre_code;




        $validator =  Validator::make($request->all(), [
            'title' => 'required|max:255',
            'isbn' => 'required|max:255',
            'date' => 'max:255',
            'size' => 'max:255',
            'quantity' => 'max:255',
            'about' => 'max:255'
        ]);

        if ($validator->fails()) {

            return redirect('book');
            /*return redirect()->back()->withErrors($validator)->withInput();*/
        }

        $book = Book::create([
            'title' => $request->input('title'),
            'author' => $author_id,
            'isbn' => $request->input('isbn'),
            'date' => $request->input('date'),
            'size' => $request->input('size'),
            'language' => $language_id,
            'type' => $type_id,
            'udk' => $udk,
            'quantity' => $request->input('quantity'),
            'publishing_house' => $publishing_house_id,
            'city' => $city_id,
            'genre' => $genre_id,
            'about' => $request->input('about'),
        ]);
        if ($book) {
            return redirect('add-book')->with('status', 'Book created successfully.');
        }

        return redirect()->back()->with('errors', new MessageBag(['Something went wrong while adding new book. Please try again.']));
    }

    public function editBook()
    {
        return view('book.edit');
    }

    public function getAddToCart(Request $request, $id)
    {
        $book = Book::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($book, $book->id);
        $request->session()->put('cart', $cart);
        return redirect('/books');
    }

    public function shoppingCart()
    {
        if (!Session::has('cart')) {
            return view('user.shopping_cart', ['books' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);


        $books = $cart->items;
        foreach ($books as $book) {
            if (count_free_books($book['item']['id']) == '0') {

                $book_id = $book['item']['id'];
                $will_be_free = TakenBooks::where('book_id', $book_id)->orderBy('end_day')->first();




                return view('user.shopping_cart')->with('books', $books)->with('will_be_free', $will_be_free)->with('successMsg','Book will be free from ');

                /*return redirect('/shopping-cart')->with('books', $books)->with('status', 'Book will be free from...');*/
            }
        }

        return view('user.shopping_cart', ['books' => $cart->items]);
    }

    public function destroy($id)
    {
        DB::table('books')->where('id', $id)->delete();
        return redirect()->back();
    }

    public function showSearch()
    {
        $books = collect([]);
        return view('search.index', compact('books'));
    }

    public function search(Request $request)
    {
        $languages = Language::get();
        $searchValues = preg_split('/\s+/', $request->search, -1, PREG_SPLIT_NO_EMPTY);

        $books = Book::join('languages', 'books.language', '=', 'languages.id')->select('books.*', 'languages.language')
                    ->join('authors', 'books.author', '=', 'authors.id')->select('books.*', 'authors.author_name', 'authors.author_surname')
                    ->join('types', 'books.type', '=', 'types.id')->select('books.*', 'types.type')
                    ->join('genres', 'books.genre', '=', 'genres.id')->select('books.*', 'genres.genre')
                    ->where(function($q) use ($searchValues) {
                        foreach ($searchValues as $value) {
                            $q->orwhere('title', 'LIKE', "%{$value}%")
                                ->orWhere('author', 'LIKE', "%{$value}%")
                                ->orWhere('isbn', 'LIKE', "%{$value}%")
                                ->orWhere('date', 'LIKE', "%{$value}%")
                                ->orWhere('size', 'LIKE', "%{$value}%")
                                ->orWhere('languages.language', 'LIKE', "%{$value}%")
                                ->orWhere('types.type', 'LIKE', "%{$value}%")
                                ->orWhere('udk', 'LIKE', "%{$value}%")
                                ->orWhere('quantity', 'LIKE', "%{$value}%")
                                ->orWhere('publishing_house', 'LIKE', "%{$value}%")
                                ->orWhere('city', 'LIKE', "%{$value}%")
                                ->orWhere('genres.genre', 'LIKE', "%{$value}%");
                        }
                    })->get();

        return view('search.index', compact('books', 'languages'));
        
    }

    public function showDetailSearch()
    {
        $languages = Language::all();
        $types = Type::all();
        $authors = Author::all();
        $publishing_houses = PublishingHouse::all();
        $cities = City::all();
        $genres = Genres::all();

        $first_levels = DB::table('udk_first_level')->get();
        $first_level_results = [];
        if ($first_levels) {
            foreach ($first_levels as $first_level) {
                $first_level_results[] = [
                    'id' => $first_level->id,
                    'title' => $first_level->title,
                    'code' => $first_level->code,
                ];
            }
        }

        $second_levels = DB::table('udk_second_level')->get();
        $second_level_results = [];
        if ($second_levels) {
            foreach ($second_levels as $second_level) {
                $second_level_results[] = [
                    'id' => $second_level->id,
                    'first_level_id' => $second_level->id_first_level,
                    'title' => $second_level->title,
                    'code' => $second_level->code,
                ];
            }
        }

        $third_levels = DB::table('udk_third_level')->get();
        $third_level_results = [];
        if ($third_levels) {
            foreach ($third_levels as $third_level) {
                $third_level_results[] = [
                    'first_level_id' => $third_level->id_first_level,
                    'second_level_id' => $third_level->id_second_level,
                    'title' => $third_level->title,
                    'code' => $third_level->code,
                ];
            }
        }
        $books = collect([]);
        return view('search.detail_search', compact('languages', 'types', 'authors', 'publishing_houses', 'cities', 'genres', 'first_level_results', 'second_level_results', 'third_level_results', 'books'));
    }

    public function detailSearch(Request $request)
    {

        $types = Type::all();
        $authors = Author::all();
        $publishing_houses = PublishingHouse::all();
        $cities = City::all();

        $languages = Language::get();
        $searchValues = preg_split('/\s+/', $request->search, -1, PREG_SPLIT_NO_EMPTY);

        $title = $request->input('title');
        $author_id = $request->input('author');
            if($author_id == '0')
            {
                $author_id = '';
            }
        $isbn = $request->input('isbn');
        $date = $request->input('date');
        $size = $request->input('size');
        $language_id = $request->input('language');
            if($language_id == '0')
            {
                $language_id = '';
            }
        $type_id = $request->input('type');
            if($type_id == '0')
            {
                $type_id = '';
            }
        $udk = $request->input('udk');
        $publishing_house_id = $request->input('publishing_house');
            if($publishing_house_id == '0')
            {
                $publishing_house_id = '';
            }
        $city_id = $request->input('city');
            if($city_id == '0')
            {
                $city_id = '';
            }

        echo $title;
        echo $author_id;
        echo $isbn;
        echo $date;
        echo $language_id;
        echo $type_id;
        echo $udk;
        echo $publishing_house_id;
        echo $city_id;

        $filters = [
            'title' => $title,
            'author' => $author_id,
            'isbn' => $isbn,
            'date' => $date,
            'size' => $size,
            'books.language' => $language_id,
            'books.type' => $type_id,
            'udk' => $udk,
            'publishing_house' => $publishing_house_id,
            'city' => $city_id,
        ];

        $books = Book::join('languages', 'books.language', '=', 'languages.id')->select('books.*', 'languages.language')
                    ->join('authors', 'books.author', '=', 'authors.id')->select('books.*', 'authors.author_name', 'authors.author_surname')
                    ->join('types', 'books.type', '=', 'types.id')->select('books.*', 'types.type')
                    ->join('genres', 'books.genre', '=', 'genres.id')->select('books.*', 'genres.genre')
                    ->where(function($q) use ($searchValues) {
                        foreach ($searchValues as $value) {
                            $q->orwhere('title', 'LIKE', "%{$value}%");
                                $q->orWhere('author', 'LIKE', "%{$value}%");
                                $q->orWhere('isbn', 'LIKE', "%{$value}%");
                                $q->orWhere('date', 'LIKE', "%{$value}%");
                                $q->orWhere('size', 'LIKE', "%{$value}%");
                                $q->orWhere('languages.language', 'LIKE', "%{$value}%");
                                $q->orWhere('types.type', 'LIKE', "%{$value}%");
                                $q->orWhere('udk', 'LIKE', "%{$value}%");
                                $q->orWhere('quantity', 'LIKE', "%{$value}%");
                                $q->orWhere('publishing_house', 'LIKE', "%{$value}%");
                                $q->orWhere('city', 'LIKE', "%{$value}%");
                                $q->orWhere('genres.genre', 'LIKE', "%{$value}%");
                        }
                    })
                    ->orWhere(function($query) use ($filters) {
                        foreach ( $filters as $column => $key ) {
                            $value = $key;
                            if ( (! is_null($key)) ) {
                                $query->where($column, 'LIKE', "%{$value}%");
                            }
                        }
                    })->get();



        return view('search.detail_search', compact('books', 'languages', 'types', 'authors', 'publishing_houses', 'cities'));
        
    }
}

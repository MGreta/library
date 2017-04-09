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

class BookController extends Controller
{
    public function index()
    {
        $books = Book::join('languages', 'books.language', '=', 'languages.id')->select('books.*', 'languages.language')->get();
       return view('book.index', compact('books'));
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
        return view('book.book', compact('book', 'comments', 'ratings'));
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

    public function bookEdit($id, Request $request)
    {

        $validator =  Validator::make($request->all(), [
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'isbn' => 'required|max:255',
            'date' => 'max:255',
            'size' => 'max:255',
            'language' => 'max:255',
            'type' => 'max:255',
            'udk' => 'max:255',
            'quantity' => 'max:255',
            'publishing_house' => 'max:255',
            'city' => 'max:255',
            'genre' => 'genre',
            'about' => 'max:255'
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
            $book->udk = $request->input('udk');
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
        return view('book.create', compact('languages', 'types', 'authors', 'publishing_houses', 'cities', 'genres'));
    }
    public function storeBook(Request $request)
    {

        if ($request->input('author') == 'other') {
            $validator =  Validator::make($request->all(), [
                'author_name' => 'required|max:255',
                'author_surname' => 'required|max:255'
            ]);
            $author_name = $request->input('author_name');
            $author_surname = $request->input('author_surname');

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $author = Author::create([
                'author_name' => $request->input('author_name'),
                'author_surname' => $request->input('author_surname')
            ]);
            if ($author) {
                $author_id = DB::table('authors')->where('author_name', $author_name)->where('author_surname', $author_surname)->value('id');
            }

            //if there is written author
            $validator =  Validator::make($request->all(), [
                'title' => 'required|max:255',
                'isbn' => 'required|max:255',
                'date' => 'max:255',
                'size' => 'max:255',
                'language' => 'max:255',
                'type' => 'max:255',
                'udk' => 'max:255',
                'quantity' => 'max:255',
                'publishing_house' => 'max:255',
                'city' => 'max:255',
                'genre' => 'max:255',
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
                'language' => $request->input('language'),
                'type' => $request->input('type'),
                'udk' => $request->input('udk'),
                'quantity' => $request->input('quantity'),
                'publishing_house' => $request->input('publishing_house'),
                'city' => $request->input('city'),
                'genre' => $request->input('genre'),
                'about' => $request->input('about'),
            ]);
            if ($book) {
                return redirect('add-book')->with('status', 'Language created successfully.');
            }

            return redirect()->back()->with('errors', new MessageBag(['Something went wrong while adding new language. Please try again.']));
        }

        //if there is selected author
        $validator =  Validator::make($request->all(), [
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'isbn' => 'required|max:255',
            'date' => 'max:255',
            'size' => 'max:255',
            'language' => 'max:255',
            'type' => 'max:255',
            'udk' => 'max:255',
            'quantity' => 'max:255',
            'publishing_house' => 'max:255',
            'city' => 'max:255',
            'genre' => 'max:255',
            'about' => 'max:255'
        ]);

        if ($validator->fails()) {

            return redirect('book');
            /*return redirect()->back()->withErrors($validator)->withInput();*/
        }

        $book = Book::create([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'isbn' => $request->input('isbn'),
            'date' => $request->input('date'),
            'size' => $request->input('size'),
            'language' => $request->input('language'),
            'type' => $request->input('type'),
            'udk' => $request->input('udk'),
            'quantity' => $request->input('quantity'),
            'publishing_house' => $request->input('publishing_house'),
            'city' => $request->input('city'),
            'genre' => $request->input('genre'),
            'about' => $request->input('about'),
        ]);
        if ($book) {

            return redirect('add-book')->with('status', 'Language created successfully.');
        }

        return redirect()->back()->with('errors', new MessageBag(['Something went wrong while adding new language. Please try again.']));
    }

    public function editBook()
    {
        return view('book.edit');
    }



    /*public function getAddToCart(Request $request, $id)
    {
        $book = Book::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($book, $book->id);

        $request->session()->put('cart', $cart);
        //dd($request->session()->get('cart'));
        return redirect('/books');
    }
*/
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
        return view('user.shopping_cart', ['books' => $cart->items]);
    }
}

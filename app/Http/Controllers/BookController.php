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

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
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

    /*public function allBooks()
    {
        $books = Book::all();
        return view('admin.books', compact('books'));
    }*/
    //Order by
    public function orderByTitle()
    {
        $books = DB::table('books')->orderBy('title')->get();
        return view('book.index', compact('books'));
    }

    public function orderByAuthor()
    {
        /*$books = DB::table('books')->orderBy('author')->get();
        return view('admin.books', compact('books'));*/

        /*$books = Book::with('author')->orderBy('author_name')->get();
        return view('admin.books', compact('books'));*/

        $books = DB::table('books')->join('authors', 'books.author', '=', 'authors.id')->select('books.*', 'authors.author_name', 'authors.author_surname')->orderBy('authors.author_name')->get();

        return view('book.index', compact('books'));
    }

    public function orderByISBN()
    {
        $books = DB::table('books')->orderBy('isbn')->get();
        return view('book.index', compact('books'));
    }

    public function orderByDate()
    {
        $books = DB::table('books')->orderBy('date')->get();
        return view('book.index', compact('books'));
    }

    public function orderBySize()
    {
        $books = DB::table('books')->orderBy('size')->get();
        return view('book.index', compact('books'));
    }

    public function orderByLanguage()
    {
        /*$books = DB::table('books')->orderBy('language')->get();
        return view('admin.books', compact('books'));*/

        /*$books = Book::with('language')->orderBy('language')->get();
        return view('admin.books', compact('books'));*/

        $books = DB::table('books')->join('language', 'books.language', '=', 'language.id')->select('books.*', 'language.language')->orderBy('language.language')->get();

        return view('book.index', compact('books'));
    }

    public function orderByType()
    {
        /*$books = DB::table('books')->orderBy('type')->get();
        return view('admin.books', compact('books'));*/

        $books = DB::table('books')->join('type', 'books.type', '=', 'type.id')->select('books.*', 'type.type')->orderBy('type.type')->get();

        return view('book.index', compact('books'));
    }

    public function orderByUDK()
    {
        $books = DB::table('books')->orderBy('udk')->get();
        return view('book.index', compact('books'));
    }

    public function orderByQuantity()
    {
        $books = DB::table('books')->orderBy('quantity')->get();
        return view('book.index', compact('books'));
    }
    //Order by
	public function edit($id)
    {
        /*$book = Book::where('id' => $id)->first();*/
        $book = Book::find($id);
        $languages = Language::where('id', '!=', $book->language)->get();
        $language = Language::where('id', $book->language)->get()->first();
        $types = Type::where('id', '!=', $book->type)->get();
        $type = Type::where('id', $book->type)->get()->first();
        $genres = Genres::where('id', '!=', $book->genre)->get();
        $genre = Genres::where('id', $book->genre)->get()->first();


        return view('book.edit', compact('book', 'languages', 'types', 'language', 'type', 'genres', 'genre'));
    }

    public function bookEdit($id, Request $request)
    {
        /*return $this->update($request, $id);*/
        $this->validate($request, [
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
            //'objective' => 'integer|required|in:' . implode(',', array_keys(objectives())),
        ]);
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
            return redirect()->back()
                    ->with(['message' => 'Knyga atnaujintas.']);
        }
        return redirect()->back()
                ->withErrors(['error' => 'Klaida. Neleistinas veiksmas.']);
    }






    public function addBook()
    {
        $languages = Language::all();
        $types = Type::all();
        return view('book.create', compact('languages', 'types'));
    }
    public function storeBook(Request $request)
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

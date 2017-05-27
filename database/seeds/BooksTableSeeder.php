<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
            [
                'id' => '1',
                'language' => 'Lietuvių',
            ],[
                'id' => '2',
                'language' => 'Anglų',
            ],[
                'id' => '3',
                'language' => 'Rusų',
            ],
        ]);

        DB::table('types')->insert([
            [
                'id' => '1',
                'type' => 'Knyga',
            ],[
                'id' => '2',
                'type' => 'Žurnalas',
            ],
        ]);

        DB::table('cities')->insert([
            [
                'id' => '1',
                'city' => 'Vilnius',
            ],[
                'id' => '2',
                'city' => 'Kaunas',
            ],[
                'id' => '3',
                'city' => 'Kaišiadorys',
            ],
        ]);

        DB::table('genres')->insert([
            [
                'id' => '1',
                'genre' => 'Fantastiniai romanai',
                'code' => '-312.9',
            ],[
                'id' => '2',
                'genre' => 'Psichologiniai romanai',
                'code' => '-311.1',
            ],[
                'id' => '3',
                'genre' => 'Socialiniai romanai',
                'code' => '-311.2',
            ],[
                'id' => '4',
                'genre' => 'Nuotykiniai romanai',
                'code' => '-311.3',
            ],[
                'id' => '5',
                'genre' => 'Humoristiniai romanai',
                'code' => '-311.5',
            ],[
                'id' => '6',
                'genre' => 'Istoriniai romanai',
                'code' => '-311.6',
            ],[
                'id' => '7',
                'genre' => 'Didaktiniai romanai',
                'code' => '-312.1',
            ],[
                'id' => '8',
                'genre' => 'Krikščionių literatūra',
                'code' => '-312.2',
            ],[
                'id' => '9',
                'genre' => 'Detektyviniai romanai',
                'code' => '-312.4',
            ],[
                'id' => '10',
                'genre' => 'Autobiografiniai, biografiniai romanai',
                'code' => '-312.6',
            ],[
                'id' => '11',
                'genre' => 'Satyriniai romanai',
                'code' => '-313.1',
            ],[
                'id' => '12',
                'genre' => 'Romanai',
                'code' => '-31',
            ],[
                'id' => '13',
                'genre' => 'Humoristinė poezeija, satyrinė poezija',
                'code' => '-17',
            ],[
                'id' => '14',
                'genre' => 'Epinės poemos',
                'code' => '-13',
            ],[
                'id' => '15',
                'genre' => 'Komiksai, pieštiniai pasakojimai',
                'code' => '-93-91',
            ],[
                'id' => '16',
                'genre' => 'Apysaka',
                'code' => '-93-31',
            ],
        ]);

        DB::table('publishing_houses')->insert([
            [
                'id' => '1',
                'publishing_house' => 'Alma littera',
            ],[
                'id' => '2',
                'publishing_house' => 'Nieko rimto',
            ],[
                'id' => '3',
                'publishing_house' => 'Obuolys',
            ],[
                'id' => '4',
                'publishing_house' => 'Obuoliukas',
            ],[
                'id' => '5',
                'publishing_house' => 'Šviesa',
            ],[
                'id' => '6',
                'publishing_house' => 'Baltos lankos',
            ],[
                'id' => '7',
                'publishing_house' => 'Tyto alba',
            ],[
                'id' => '8',
                'publishing_house' => 'Gimtasis žodis',
            ],[
                'id' => '9',
                'publishing_house' => 'Vaga',
            ],[
                'id' => '10',
                'publishing_house' => 'Briedis',
            ],[
                'id' => '11',
                'publishing_house' => 'Žaltvykslė',
            ],[
                'id' => '12',
                'publishing_house' => 'Džiugas',
            ],[
                'id' => '13',
                'publishing_house' => 'Naujoji Rosma',
            ],[
                'id' => '14',
                'publishing_house' => 'Mintis',
            ],[
                'id' => '15',
                'publishing_house' => 'Lietuvos rašytojų sąjungos l-kla',
            ],[
                'id' => '16',
                'publishing_house' => 'Laisvos valandos',
            ],[
                'id' => '17',
                'publishing_house' => 'A. Jakšto sp.',
            ],[
                'id' => '18',
                'publishing_house' => 'Sakalo',
            ],[
                'id' => '19',
                'publishing_house' => 'Jotema',
            ],[
                'id' => '20',
                'publishing_house' => 'Moteris',
            ],[
                'id' => '21',
                'publishing_house' => 'Alna Litera',
            ],[
                'id' => '22',
                'publishing_house' => 'Margi raštai',
            ],
        ]);

        DB::table('authors')->insert([
            [
                'id' => '1',
                'author_name' => 'Antoine de Saint-Exupéry',
                'country' => 'Prancūzija',
                'birth_date' => '1900',
                'death_date' => '1944',
            ],[
                'id' => '2',
                'author_name' => 'J.K. Rowling',
                'country' => 'Anglija',
                'birth_date' => '1965',
                'death_date' => NULL
            ],[
                'id' => '3',
                'author_name' => 'John Ronald Reuel Tolkien',
                'country' => 'Anglija',
                'birth_date' => '1892',
                'death_date' => '1973'
            ],[
                'id' => '4',
                'author_name' => 'Lewis Carroll',
                'country' => 'Anglija',
                'birth_date' => '1832',
                'death_date' => '1898'
            ],[
                'id' => '5',
                'author_name' => 'Petras Katilius',
                'country' => 'Lietuva',
                'birth_date' => '1903',
                'death_date' => '1995'
            ],[
                'id' => '6',
                'author_name' => 'Antana Škėma',
                'country' => 'Lietuva',
                'birth_date' => '1910',
                'death_date' => '1961'
            ],[
                'id' => '7',
                'author_name' => 'Beata Nicholson',
                'country' => 'Lietuva',
                'birth_date' => '1979',
                'death_date' => NULL
            ],[
                'id' => '8',
                'author_name' => 'Stephen King',
                'country' => 'JAV',
                'birth_date' => '1947',
                'death_date' => NULL
            ],[
                'id' => '9',
                'author_name' => 'George R.R. Martin',
                'country' => 'JAV',
                'birth_date' => '1948',
                'death_date' => NULL
            ],[
                'id' => '10',
                'author_name' => 'Erich Maria Remarque',
                'country' => 'Vokietija',
                'birth_date' => '1898',
                'death_date' => '1970'
            ],[
                'id' => '11',
                'author_name' => 'Andrius Tapinas',
                'country' => 'Lietuva',
                'birth_date' => '1977',
                'death_date' => NULL
            ],[
                'id' => '12',
                'author_name' => 'George Orwell',
                'country' => 'Anglija',
                'birth_date' => '1903',
                'death_date' => '1950'
            ],[
                'id' => '13',
                'author_name' => 'Mario Puzo',
                'country' => 'JAV',
                'birth_date' => '1920',
                'death_date' => '1999'
            ],[
                'id' => '14',
                'author_name' => 'Astrid Lindgren',
                'country' => 'Švedija',
                'birth_date' => '1907',
                'death_date' => '2002'
            ],[
                'id' => '15',
                'author_name' => 'Patrick Rothfuss',
                'country' => 'JAV',
                'birth_date' => '1973',
                'death_date' => NULL
            ],[
                'id' => '16',
                'author_name' => 'Jodi Picoult',
                'country' => 'JAV',
                'birth_date' => '1966',
                'death_date' => NULL
            ]
        ]);

        DB::table('books')->insert([
            [
                'id' => '1',
                'title' => 'Mažasis princas',
                'isbn' => '9986-29-036-8',
                'date' => '2001',
                'size' => '95',
                'language' => '1',
                'type' => '1',
                'quantity' => '2',
                'about' => 'about book',
                'publishing_house' => '12',
                'city' => '1',
                'genre' => '1',
            ],[
                'id' => '2',
                'title' => 'Haris Poteris ir Išminties Akmuo',
                'isbn' => '9986-02-919-8',
                'date' => '2000',
                'size' => '245',
                'language' => '1',
                'type' => '1',
                'quantity' => '2',
                'about' => 'about book',
                'publishing_house' => '1',
                'city' => '1',
                'genre' => '1',
            ],[
                'id' => '3',
                'title' => 'Hobitas',
                'isbn' => '978-609-01-0732-4',
                'date' => '2012',
                'size' => '268',
                'language' => '1',
                'type' => '1',
                'quantity' => '2',
                'about' => 'about book',
                'publishing_house' => '1',
                'city' => '1',
                'genre' => '1',
            ],[
                'id' => '4',
                'title' => 'Alisa stebuklų šalyje',
                'isbn' => '9955-06-061-1',
                'date' => '2002',
                'size' => '92',
                'language' => '1',
                'type' => '1',
                'quantity' => '2',
                'about' => 'about book',
                'publishing_house' => '13',
                'city' => '1',
                'genre' => '1',
            ],[
                'id' => '5',
                'title' => 'Analizinė geometrija : vadovėlis aukšt. m-klų matematikos specialybėms',
                'isbn' => NULL,
                'date' => '1973',
                'size' => '564',
                'language' => '1',
                'type' => '1',
                'quantity' => '2',
                'about' => 'about book',
                'publishing_house' => '14',
                'city' => '1',
                'genre' => '1',
            ],[
                'id' => '6',
                'title' => 'Balta drobulė',
                'isbn' => '9986-513-45-6',
                'date' => '1990',
                'size' => '181',
                'language' => '1',
                'type' => '1',
                'quantity' => '2',
                'about' => 'about book',
                'publishing_house' => '15',
                'city' => '1',
                'genre' => '1',
            ],[
                'id' => '7',
                'title' => 'Žiedų valdovas',
                'isbn' => '9986-02-038-7',
                'date' => '2002',
                'size' => '325',
                'language' => '1',
                'type' => '1',
                'quantity' => '2',
                'about' => 'about book',
                'publishing_house' => '1',
                'city' => '1',
                'genre' => '1',
            ],[
                'id' => '8',
                'title' => 'Beatos virtuvė',
                'isbn' => '978-609-410-013-0',
                'date' => '2009',
                'size' => '318',
                'language' => '1',
                'type' => '1',
                'quantity' => '2',
                'about' => 'about book',
                'publishing_house' => '16',
                'city' => '1',
                'genre' => '1',
            ],[
                'id' => '9',
                'title' => 'Švytėjimas',
                'isbn' => '9986-06-000-1',
                'date' => '1993',
                'size' => '511',
                'language' => '1',
                'type' => '1',
                'quantity' => '2',
                'about' => 'about book',
                'publishing_house' => '11',
                'city' => '1',
                'genre' => '1',
            ],[
                'id' => '10',
                'title' => 'Tamsusis Bokštas Kn.1',
                'isbn' => '9986-97-057-1',
                'date' => '2000',
                'size' => '266',
                'language' => '1',
                'type' => '1',
                'quantity' => '2',
                'about' => 'about book',
                'publishing_house' => '17',
                'city' => '3',
                'genre' => '1',
            ],[
                'id' => '11',
                'title' => 'Sostų žaidimas',
                'isbn' => '978-609-01-0537-5',
                'date' => '2012',
                'size' => '615',
                'language' => '1',
                'type' => '1',
                'quantity' => '2',
                'about' => 'about book',
                'publishing_house' => '1',
                'city' => '1',
                'genre' => '1',
            ],[
                'id' => '12',
                'title' => 'Vakarų fronte nieko naujo',
                'isbn' => '5-430-00215-1',
                'date' => '1929',
                'size' => '256',
                'language' => '1',
                'type' => '1',
                'quantity' => '2',
                'about' => 'about book',
                'publishing_house' => '18',
                'city' => '2',
                'genre' => '1',
            ],[
                'id' => '13',
                'title' => 'Vilko valanda',
                'isbn' => '978-609-01-0890-1',
                'date' => '2013',
                'size' => '532',
                'language' => '1',
                'type' => '1',
                'quantity' => '2',
                'about' => 'about book',
                'publishing_house' => '1',
                'city' => '1',
                'genre' => '1',
            ],[
                'id' => '14',
                'title' => '1984-ieji',
                'isbn' => '978-9955-13-119-9',
                'date' => '2007',
                'size' => '262',
                'language' => '1',
                'type' => '1',
                'quantity' => '2',
                'about' => 'about book',
                'publishing_house' => '19',
                'city' => '2',
                'genre' => '1',
            ],[
                'id' => '15',
                'title' => 'Haris Poteris ir Azkabano kalinys',
                'isbn' => '9955-08-087-6',
                'date' => '2001',
                'size' => '334',
                'language' => '1',
                'type' => '1',
                'quantity' => '2',
                'about' => 'about book',
                'publishing_house' => '1',
                'city' => '1',
                'genre' => '1',
            ],[
                'id' => '16',
                'title' => 'Panelė',
                'isbn' => '1392-5024',
                'date' => '1994',
                'size' => '20',
                'language' => '1',
                'type' => '2',
                'quantity' => '2',
                'about' => 'about book',
                'publishing_house' => '20',
                'city' => '1',
                'genre' => '1',
            ],[
                'id' => '17',
                'title' => 'Krikštatėvis',
                'isbn' => '5-89942-284',
                'date' => '1993',
                'size' => '397',
                'language' => '1',
                'type' => '1',
                'quantity' => '2',
                'about' => 'about book',
                'publishing_house' => '21',
                'city' => '1',
                'genre' => '1',
            ],[
                'id' => '18',
                'title' => 'Pepė Ilgakojinė',
                'isbn' => '978-9955-428-91-6',
                'date' => '2007',
                'size' => '293',
                'language' => '1',
                'type' => '1',
                'quantity' => '2',
                'about' => 'about book',
                'publishing_house' => '22',
                'city' => '1',
                'genre' => '1',
            ],[
                'id' => '19',
                'title' => 'Vėjo vardas',
                'isbn' => '978-9986-16-828-7',
                'date' => '2011',
                'size' => '630',
                'language' => '1',
                'type' => '1',
                'quantity' => '2',
                'about' => 'about book',
                'publishing_house' => '7',
                'city' => '1',
                'genre' => '1',
            ],[
                'id' => '20',
                'title' => 'Mano sesers globėjas',
                'isbn' => '9955-24-282-5',
                'date' => '2006',
                'size' => '405',
                'language' => '1',
                'type' => '1',
                'quantity' => '2',
                'about' => 'about book',
                'publishing_house' => '1',
                'city' => '1',
                'genre' => '1',
            ]
        ]);

        DB::table('book_authors')->insert([
            [
                'book_id' => 1,
                'author_id' => 1
            ],[
                'book_id' => 2,
                'author_id' => 2
            ],[
                'book_id' => 3,
                'author_id' => 3
            ],[
                'book_id' => 4,
                'author_id' => 4
            ],[
                'book_id' => 5,
                'author_id' => 5
            ],[
                'book_id' => 6,
                'author_id' => 6
            ],[
                'book_id' => 7,
                'author_id' => 3
            ],[
                'book_id' => 8,
                'author_id' => 7
            ],[
                'book_id' => 9,
                'author_id' => 8
            ],[
                'book_id' => 10,
                'author_id' => 8
            ],[
                'book_id' => 11,
                'author_id' => 9
            ],[
                'book_id' => 12,
                'author_id' => 10
            ],[
                'book_id' => 13,
                'author_id' => 11
            ],[
                'book_id' => 14,
                'author_id' => 12
            ],[
                'book_id' => 15,
                'author_id' => 2
            ],[
                'book_id' => 17,
                'author_id' => 13
            ],[
                'book_id' => 18,
                'author_id' => 14
            ],[
                'book_id' => 19,
                'author_id' => 15
            ],[
                'book_id' => 20,
                'author_id' => 16
            ]
        ]);

    }
}
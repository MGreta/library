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
                'language' => 'Lietuvių'
            ],[
                'id' => '2',
                'language' => 'Anglų'
            ],[
                'id' => '3',
                'language' => 'Rusų'
            ]
        ]);

        DB::table('types')->insert([
            [
                'id' => '1',
                'type' => 'Knyga'
            ],[
                'id' => '2',
                'type' => 'Žurnalas'
            ]
        ]);

        DB::table('cities')->insert([
            [
                'id' => '1',
                'city' => 'Vilnius'
            ],[
                'id' => '2',
                'city' => 'Kaunas'
            ],[
                'id' => '3',
                'city' => 'Kaišiadorys'
            ]
        ]);

        DB::table('genres')->insert([
            [
                'id' => '1',
                'city' => 'Fantastiniai romanai',
                'code' => '-312.9'
            ],[
                'id' => '2',
                'city' => 'Psichologiniai romanai',
                'code' => '-311.1'
            ],[
                'id' => '3',
                'city' => 'Socialiniai romanai',
                'code' => '-311.2'
            ],[
                'id' => '4',
                'city' => 'Nuotykiniai romanai',
                'code' => '-311.3'
            ],[
                'id' => '5',
                'city' => 'Humoristiniai romanai',
                'code' => '-311.5'
            ],[
                'id' => '6',
                'city' => 'Istoriniai romanai',
                'code' => '-311.6'
            ],[
                'id' => '7',
                'city' => 'Didaktiniai romanai',
                'code' => '-312.1'
            ],[
                'id' => '8',
                'city' => 'Krikščionių literatūra',
                'code' => '-312.2'
            ],[
                'id' => '9',
                'city' => 'Detektyviniai romanai',
                'code' => '-312.4'
            ],[
                'id' => '10',
                'city' => 'Autobiografiniai, biografiniai romanai',
                'code' => '-312.6'
            ],[
                'id' => '11',
                'city' => 'Satyriniai romanai',
                'code' => '-313.1'
            ],[
                'id' => '12',
                'city' => 'Romanai',
                'code' => '-31'
            ],[
                'id' => '13',
                'city' => 'Humoristinė poezeija, satyrinė poezija',
                'code' => '-17'
            ],[
                'id' => '14',
                'city' => 'Epinės poemos',
                'code' => '-13'
            ],[
                'id' => '15',
                'city' => 'Komiksai, pieštiniai pasakojimai',
                'code' => '-93-91'
            ],[
                'id' => '16',
                'city' => 'Apysaka',
                'code' => '-93-31'
            ]
        ]);

        DB::table('publishing_houses')->insert([
            [
                'id' => '1',
                'city' => 'Alma littera'
            ],[
                'id' => '2',
                'city' => 'Nieko rimto'
            ],[
                'id' => '3',
                'city' => 'Obuolys'
            ],[
                'id' => '4',
                'city' => 'Obuoliukas'
            ],[
                'id' => '5',
                'city' => 'Šviesa'
            ],[
                'id' => '6',
                'city' => 'Baltos lankos'
            ],[
                'id' => '7',
                'city' => 'Tyto alba'
            ],[
                'id' => '8',
                'city' => 'Gimtasis žodis'
            ],[
                'id' => '9',
                'city' => 'Vaga'
            ],[
                'id' => '10',
                'city' => 'Briedis'
            ],[
                'id' => '11',
                'city' => 'Žaltvykslė'
            ],[
                'id' => '12',
                'city' => 'Džiugas'
            ],[
                'id' => '13',
                'city' => 'Naujoji Rosma'
            ],[
                'id' => '14',
                'city' => 'Mintis'
            ],[
                'id' => '15',
                'city' => 'Lietuvos rašytojų sąjungos l-kla'
            ],[
                'id' => '16',
                'city' => 'Laisvos valandos'
            ],[
                'id' => '17',
                'city' => 'A. Jakšto sp.'
            ],[
                'id' => '18',
                'city' => 'Sakalo'
            ],[
                'id' => '19',
                'city' => 'Jotema'
            ],[
                'id' => '20',
                'city' => 'Moteris'
            ],[
                'id' => '21',
                'city' => 'Alna Litera'
            ],[
                'id' => '22',
                'city' => 'Margi raštai'
            ]
        ]);

        DB::table('books')->insert([
            [
                'id' => 1,
                'title' => 'Mažasis princas',
                'isbn' => '9986-29-036-8',
                'date' => 2001,
                'size' => 95,
                'language' => 1,
                'type' => 1,
                'quantity' => 2,
                'about' => 'about book',
                'publishing_house' => 12,
                'city' => 1,
                'genre' => 1,
            ],[
                'id' => 2,
                'title' => 'Haris Poteris ir Išminties Akmuo',
                'isbn' => '9986-02-919-8',
                'date' => 2000,
                'size' => 245,
                'language' => 1,
                'type' => 1,
                'quantity' => 2,
                'about' => 'about book',
                'publishing_house' => 1,
                'city' => 1,
                'genre' => 1,
            ],[
                'id' => 3,
                'title' => 'Hobitas',
                'isbn' => '978-609-01-0732-4',
                'date' => 2012,
                'size' => 268,
                'language' => 1,
                'type' => 1,
                'quantity' => 2,
                'about' => 'about book',
                'publishing_house' => 1,
                'city' => 1,
                'genre' => 1,
            ],[
                'id' => 4,
                'title' => 'Alisa stebuklų šalyje',
                'isbn' => '9955-06-061-1',
                'date' => 2002,
                'size' => 92,
                'language' => 1,
                'type' => 1,
                'quantity' => 2,
                'about' => 'about book',
                'publishing_house' => 13,
                'city' => 1,
                'genre' => 1,
            ],[
                'id' => 5,
                'title' => 'Analizinė geometrija : vadovėlis aukšt. m-klų matematikos specialybėms',
                'isbn' => '',
                'date' => 1973,
                'size' => 564,
                'language' => 1,
                'type' => 1,
                'quantity' => 2,
                'about' => 'about book',
                'publishing_house' => 14,
                'city' => 1,
                'genre' => 1,
            ],[
                'id' => 6,
                'title' => 'Balta drobulė',
                'isbn' => '',
                'date' => 1990,
                'size' => 181,
                'language' => 1,
                'type' => 1,
                'quantity' => 2,
                'about' => 'about book',
                'publishing_house' => 15,
                'city' => 1,
                'genre' => 1,
            ],[
                'id' => 7,
                'title' => 'Žiedų valdovas',
                'isbn' => '',
                'date' => 2002,
                'size' => ,
                'language' => 1,
                'type' => 1,
                'quantity' => 2,
                'about' => 'about book',
                'publishing_house' => 1,
                'city' => 1,
                'genre' => 1,
            ],[
                'id' => 8,
                'title' => 'Beatos virtuvė',
                'isbn' => '978-609-410-013-0',
                'date' => 2009,
                'size' => 318,
                'language' => 1,
                'type' => 1,
                'quantity' => 2,
                'about' => 'about book',
                'publishing_house' => 16,
                'city' => 1,
                'genre' => 1,
            ],[
                'id' => 9,
                'title' => 'Švytėjimas virtuvė',
                'isbn' => '9986-06-000-1',
                'date' => 1993,
                'size' => 511,
                'language' => 1,
                'type' => 1,
                'quantity' => 2,
                'about' => 'about book',
                'publishing_house' => 11,
                'city' => 1,
                'genre' => 1,
            ],[
                'id' => 10,
                'title' => 'Tamsusis Bokštas Kn.1',
                'isbn' => '9986-97-057-1',
                'date' => 2000,
                'size' => 266,
                'language' => 1,
                'type' => 1,
                'quantity' => 2,
                'about' => 'about book',
                'publishing_house' => 17,
                'city' => 3,
                'genre' => 1,
            ],[
                'id' => 11,
                'title' => 'Sostų žaidimas',
                'isbn' => '978-609-01-0537-5',
                'date' => 2012,
                'size' => 615,
                'language' => 1,
                'type' => 1,
                'quantity' => 2,
                'about' => 'about book',
                'publishing_house' => 1,
                'city' => 1,
                'genre' => 1,
            ],[
                'id' => 12,
                'title' => 'Vakarų fronte nieko naujo',
                'isbn' => '',
                'date' => 1929,
                'size' => 256,
                'language' => 1,
                'type' => 1,
                'quantity' => 2,
                'about' => 'about book',
                'publishing_house' => 18,
                'city' => 2,
                'genre' => 1,
            ],[
                'id' => 13,
                'title' => 'Vilko valanda',
                'isbn' => '978-609-01-0890-1',
                'date' => 2013,
                'size' => 532,
                'language' => 1,
                'type' => 1,
                'quantity' => 2,
                'about' => 'about book',
                'publishing_house' => 1,
                'city' => 1,
                'genre' => 1,
            ],[
                'id' => 14,
                'title' => '1984-ieji',
                'isbn' => '978-9955-13-119-9',
                'date' => 2007,
                'size' => 262,
                'language' => 1,
                'type' => 1,
                'quantity' => 2,
                'about' => 'about book',
                'publishing_house' => 19,
                'city' => 2,
                'genre' => 1,
            ],[
                'id' => 15,
                'title' => 'Haris Poteris ir Azkabano kalinys',
                'isbn' => '9955-08-087-6',
                'date' => 2001,
                'size' => 334,
                'language' => 1,
                'type' => 1,
                'quantity' => 2,
                'about' => 'about book',
                'publishing_house' => 1,
                'city' => 1,
                'genre' => 1,
            ],[
                'id' => 16,
                'title' => 'Panelė',
                'isbn' => '1392-5024',
                'date' => 1994,
                'size' => 20,
                'language' => 1,
                'type' => 2,
                'quantity' => 2,
                'about' => 'about book',
                'publishing_house' => 20,
                'city' => 1,
                'genre' => 1,
            ],[
                'id' => 17,
                'title' => 'Krikštatėvis',
                'isbn' => '1392-5024',
                'date' => 1994,
                'size' => 20,
                'language' => 1,
                'type' => 2,
                'quantity' => 2,
                'about' => 'about book',
                'publishing_house' => 20,
                'city' => 1,
                'genre' => 1,
            ]
            ]);

    }
}
<?php

use Illuminate\Database\Seeder;

class UDKthirdLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('udk_third_level')->insert([
            [
            	'id_first_level' => '1',
            	'id_second_level' => '9',
                'title' => 'Universaliosios bibliografijos. Bendrosios bibliografijos',
                'code' => '011'
            ],[
                'id_first_level' => '1',
            	'id_second_level' => '9',
                'title' => 'Atskirų autorių kūrinių bibliografijos. Personalinės bibliografijos',
                'code' => '012'
            ],[
                'id_first_level' => '1',
            	'id_second_level' => '9',
                'title' => 'Kolektyvinės bibliografijos',
                'code' => '013'
            ],[
                'id_first_level' => '1',
            	'id_second_level' => '9',
                'title' => 'Specialiosios bibliografijos',
                'code' => '014'
            ],[
                'id_first_level' => '1',
            	'id_second_level' => '9',
                'title' => 'Atskirų šalių ir kitų vietovių bibliografijos',
                'code' => '015'
            ],[
                'id_first_level' => '1',
            	'id_second_level' => '9',
                'title' => 'Teminės bibliografijos',
                'code' => '016'
            ],[
                'id_first_level' => '1',
            	'id_second_level' => '9',
                'title' => 'Sisteminiai ir dalykiniai katalogai',
                'code' => '017'
            ],[
                'id_first_level' => '1',
            	'id_second_level' => '9',
                'title' => 'Abėcėliniai katalogai',
                'code' => '018'
            ],[
                'id_first_level' => '1',
            	'id_second_level' => '10',
                'title' => 'Bibliotekų funkcijos, paskirtis, vaidmuo, kūrimas ir naikinimas. Bibliotekų raida',
                'code' => '021'
            ],[
                'id_first_level' => '1',
            	'id_second_level' => '10',
                'title' => 'Bibliotekų pastatai, patalpos ir įrengimai',
                'code' => '022'
            ],[
                'id_first_level' => '1',
            	'id_second_level' => '10',
                'title' => 'Bibliotekų administravimas. Bibliotekų darbuotojai',
                'code' => '023'
            ],[
                'id_first_level' => '1',
            	'id_second_level' => '10',
                'title' => 'Bibliotekų ryšiai su visuomene. Bibliotekų veiklos reguliavimas',
                'code' => '024'
            ],[
                'id_first_level' => '1',
            	'id_second_level' => '10',
                'title' => 'Bibliotekų padaliniai ir jų funkcijos',
                'code' => '025'
            ],[
                'id_first_level' => '1',
            	'id_second_level' => '10',
                'title' => 'Specialiosios bibliotekos',
                'code' => '026'
            ],[
                'id_first_level' => '1',
            	'id_second_level' => '10',
                'title' => 'Universalios bibliotekos',
                'code' => '027'
            ],[
                'id_first_level' => '1',
            	'id_second_level' => '10',
                'title' => 'Skaitymas',
                'code' => '028'
            ],[
                'id_first_level' => '1',
            	'id_second_level' => '14',
                'title' => 'Organizacijų veikla ir dokumentai',
                'code' => '06'
            ],[
                'id_first_level' => '1',
            	'id_second_level' => '14',
                'title' => 'Organizacijos ir kiti susivienijimai',
                'code' => '061'
            ],[
                'id_first_level' => '1',
            	'id_second_level' => '14',
                'title' => 'Muziejai. Salonai. Galerijos',
                'code' => '069'
            ],[
                'id_first_level' => '2',
            	'id_second_level' => '18',
                'title' => 'Priežastingumas',
                'code' => '122'
            ],[
                'id_first_level' => '2',
            	'id_second_level' => '18',
                'title' => 'Laisvė ir būtinumas',
                'code' => '123'
            ],[
                'id_first_level' => '2',
            	'id_second_level' => '18',
                'title' => 'Teleologija',
                'code' => '124'
            ],[
                'id_first_level' => '2',
            	'id_second_level' => '18',
                'title' => 'Baigtinumas ir begalybė',
                'code' => '125'
            ],[
                'id_first_level' => '2',
            	'id_second_level' => '18',
                'title' => 'Dvasia. Gyvenimo ir mirties esmė',
                'code' => '128'
            ],[
                'id_first_level' => '2',
            	'id_second_level' => '18',
                'title' => 'Individualiosios sielos kilmė ir ribos',
                'code' => '129'
            ],[
                'id_first_level' => '2',
            	'id_second_level' => '19',
                'title' => 'Bendroji koncepcija ir dėsniai',
                'code' => '130'
            ],[
                'id_first_level' => '2',
            	'id_second_level' => '19',
                'title' => 'Antgamtiniai reiškiniai. Okultizmas',
                'code' => '133'
            ],[
                'id_first_level' => '2',
            	'id_second_level' => '20',
                'title' => 'Sistemų tipologija',
                'code' => '140'
            ],[
                'id_first_level' => '2',
            	'id_second_level' => '20',
                'title' => 'Filosofiniai požiūriai',
                'code' => '141'
            ],[
                'id_first_level' => '2',
            	'id_second_level' => '21',
                'title' => 'Psichologijos teorija. Psichologijos dėsniai. Metafizinė psichologija. Racionalioji psichologija',
                'code' => '159.9.01'
            ],[
                'id_first_level' => '2',
            	'id_second_level' => '21',
                'title' => 'Eksperimentinė psichologija. Psichologinis tyrimas',
                'code' => '159.9.07'
            ],[
                'id_first_level' => '2',
            	'id_second_level' => '21',
                'title' => 'Psichofiziologija (fiziologinė psichologija). Psichohigiena',
                'code' => '159.91'
            ],[
                'id_first_level' => '2',
            	'id_second_level' => '21',
                'title' => 'Žmogaus psichikos formavimas',
                'code' => '159.92'
            ],[
                'id_first_level' => '2',
            	'id_second_level' => '21',
                'title' => 'Pojūčiai. Jutimai. Sensorinis suvokimas',
                'code' => '159.93'
            ],[
                'id_first_level' => '2',
            	'id_second_level' => '21',
                'title' => 'Efektorinės funkcijos',
                'code' => '159.94'
            ],[
                'id_first_level' => '2',
            	'id_second_level' => '21',
                'title' => 'Aukštesnieji psichikos procesai',
                'code' => '159.95'
            ],[
                'id_first_level' => '2',
            	'id_second_level' => '21',
                'title' => 'Ypatingos psichikos būsenos ir procesai',
                'code' => '159.96'
            ],[
                'id_first_level' => '2',
            	'id_second_level' => '21',
                'title' => 'Sutrikimų psichologija',
                'code' => '159.97'
            ],[
                'id_first_level' => '2',
            	'id_second_level' => '23',
                'title' => 'Individualioji moralė. Pareiga sau',
                'code' => '171'
            ],[
                'id_first_level' => '2',
            	'id_second_level' => '23',
                'title' => 'Socialinė etika',
                'code' => '172'
            ],[
                'id_first_level' => '2',
            	'id_second_level' => '23',
                'title' => 'Šeimos etika',
                'code' => '173'
            ],[
                'id_first_level' => '2',
            	'id_second_level' => '23',
                'title' => 'Profesinė etika',
                'code' => '174'
            ],[
                'id_first_level' => '2',
            	'id_second_level' => '23',
                'title' => 'Laisvalaikio ir pramogų etika',
                'code' => '175'
            ],[
                'id_first_level' => '2',
            	'id_second_level' => '23',
                'title' => 'Seksualinė etika. Seksualinis moralumas',
                'code' => '176'
            ],[
                'id_first_level' => '2',
            	'id_second_level' => '23',
                'title' => 'Moralė ir visuomenė',
                'code' => '177'
            ],[
                'id_first_level' => '2',
            	'id_second_level' => '23',
                'title' => 'Moralė ir nuosaikumas.',
                'code' => '178'
            ],[
                'id_first_level' => '2',
            	'id_second_level' => '23',
                'title' => 'Įvairūs etikos klausimai',
                'code' => '179'
            ],[
                'id_first_level' => '3',
            	'id_second_level' => '25',
                'title' => 'Kinijos religijos',
                'code' => '221'
            ],[
                'id_first_level' => '3',
            	'id_second_level' => '25',
                'title' => 'Korėjos religijos',
                'code' => '223'
            ],[
                'id_first_level' => '3',
            	'id_second_level' => '25',
                'title' => 'Japonijos religijos',
                'code' => '225'
            ],[
                'id_first_level' => '3',
            	'id_second_level' => '26',
                'title' => 'Vedizmas',
                'code' => '231'
            ],[
                'id_first_level' => '3',
            	'id_second_level' => '26',
                'title' => 'Brahmanizmas',
                'code' => '232'
            ],[
                'id_first_level' => '3',
            	'id_second_level' => '26',
                'title' => 'Induistų sektos',
                'code' => '233'
            ],[
                'id_first_level' => '3',
            	'id_second_level' => '26',
                'title' => 'Džainizmas',
                'code' => '234'
            ],[
                'id_first_level' => '3',
            	'id_second_level' => '26',
                'title' => 'Sikizmas',
                'code' => '235'
            ],[
                'id_first_level' => '3',
            	'id_second_level' => '26',
                'title' => 'Kitos Rytų religijos',
                'code' => '239'
            ],[
                'id_first_level' => '3',
            	'id_second_level' => '27',
                'title' => 'Hinajanos budizmas. Teravados budizmas. Pali mokykla',
                'code' => '241'
            ],[
                'id_first_level' => '3',
            	'id_second_level' => '27',
                'title' => 'Mahajana.',
                'code' => '242'
            ],[
                'id_first_level' => '3',
            	'id_second_level' => '27',
                'title' => 'Lamaizmas',
                'code' => '243'
            ],[
                'id_first_level' => '3',
            	'id_second_level' => '27',
                'title' => 'Japonų budizmas',
                'code' => '244'
            ],[
                'id_first_level' => '3',
            	'id_second_level' => '28',
                'title' => 'Senovės Egipto religijos',
                'code' => '251'
            ],[
                'id_first_level' => '3',
            	'id_second_level' => '28',
                'title' => 'Mesopotamijos religijos',
                'code' => '252'
            ],[
                'id_first_level' => '3',
            	'id_second_level' => '28',
                'title' => 'Kitos Vakarų Azijos religijos',
                'code' => '253'
            ],[
                'id_first_level' => '3',
            	'id_second_level' => '28',
                'title' => 'Irano religijos',
                'code' => '254'
            ],[
                'id_first_level' => '3',
            	'id_second_level' => '28',
                'title' => 'Klasikinė antika',
                'code' => '255'
            ],[
                'id_first_level' => '3',
            	'id_second_level' => '28',
                'title' => 'Centrinės Azijos religijos',
                'code' => '256'
            ],[
                'id_first_level' => '3',
            	'id_second_level' => '28',
                'title' => 'Europos religijos',
                'code' => '257'
            ],[
                'id_first_level' => '3',
            	'id_second_level' => '28',
                'title' => 'Pietų ir Centrinės Amerikos religijos',
                'code' => '258'
            ],[
                'id_first_level' => '3',
            	'id_second_level' => '28',
                'title' => 'Kitos religijos',
                'code' => '259'
            ],[
                'id_first_level' => '3',
            	'id_second_level' => '29',
                'title' => 'Aškenaziai',
                'code' => '262'
            ],[
                'id_first_level' => '3',
            	'id_second_level' => '29',
                'title' => 'Sefardai',
                'code' => '264'
            ],[
                'id_first_level' => '3',
            	'id_second_level' => '29',
                'title' => 'Ortodoksinis judaizmas',
                'code' => '265'
            ],[
                'id_first_level' => '3',
            	'id_second_level' => '29',
                'title' => 'Progresyvusis Judaizmas',
                'code' => '266'
            ],[
                'id_first_level' => '3',
            	'id_second_level' => '29',
                'title' => 'Judaizmo kilmės šiuolaikiniai judėjimai',
                'code' => '267'
            ],[
                'id_first_level' => '3',
            	'id_second_level' => '30',
                'title' => 'Krikščionybės teologija. Krikščionių bažnyčios ir vienuolijos',
                'code' => '27'
            ],[
                'id_first_level' => '3',
            	'id_second_level' => '30',
                'title' => 'Rytų Bažnyčia',
                'code' => '271'
            ],[
                'id_first_level' => '3',
            	'id_second_level' => '30',
                'title' => 'Romos Katalikų Bažnyčia',
                'code' => '272'
            ],[
                'id_first_level' => '3',
            	'id_second_level' => '30',
                'title' => 'Ne Romos katalikų episkopalinės bažnyčios',
                'code' => '273'
            ],[
                'id_first_level' => '3',
            	'id_second_level' => '30',
                'title' => 'Protestantizmas. Protestantai. Disidentai. Puritonai.',
                'code' => '274'
            ],[
                'id_first_level' => '3',
            	'id_second_level' => '30',
                'title' => 'Reformuotos bažnyčios',
                'code' => '275'
            ],[
                'id_first_level' => '3',
            	'id_second_level' => '30',
                'title' => 'Anabaptistai',
                'code' => '276'
            ],[
                'id_first_level' => '3',
            	'id_second_level' => '30',
                'title' => 'Laisvosios bažnyčios. Nonkonformistai',
                'code' => '277'
            ],[
                'id_first_level' => '3',
            	'id_second_level' => '30',
                'title' => 'Kitos protestantų bažnyčios',
                'code' => '278'
            ],[
                'id_first_level' => '3',
            	'id_second_level' => '30',
                'title' => 'Kiti krikščionių judėjimai ir bažnyčios',
                'code' => '279'
            ],[
                'id_first_level' => '3',
            	'id_second_level' => '31',
                'title' => 'Sunizmas. Sunitai',
                'code' => '282'
            ],[
                'id_first_level' => '3',
            	'id_second_level' => '31',
                'title' => 'Šiizmas. Šiitai',
                'code' => '284'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '33',
                'title' => 'Socialinių mokslų metodai',
                'code' => '303'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '33',
                'title' => 'Socialiniai klausimai. Socialinis gyvenimas. Kultūrinis gyvenimas. Gyvenimo būdas',
                'code' => '304'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '33',
                'title' => 'Lyčių studijos',
                'code' => '305'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '33',
                'title' => 'Sociografija. Visuomenė (kiekybinė ir kokybinė analizė)',
                'code' => '308'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '36',
                'title' => 'Sociologijos objektas',
                'code' => '316.1'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '36',
                'title' => 'Sociologijos kryptys ir mokyklos',
                'code' => '316.2'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '36',
                'title' => 'Socialinė struktūra. Visuomenė kaip socialinė sistema',
                'code' => '316.3'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '36',
                'title' => 'Socialiniai procesai. Socialinė dinamika',
                'code' => '316.4'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '36',
                'title' => 'Socialinė psichologija',
                'code' => '316.6'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '36',
                'title' => 'Kultūros sociologija. Socialinio gyvenimo kultūriniai aspektai',
                'code' => '316.7'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '37',
                'title' => 'Viešoji nuomonė. Politinis viešumas. Viešieji ryšiai. Propaganda',
                'code' => '32'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '37',
                'title' => 'Politinės organizacijos formos. Valstybė ir politinės jėgos',
                'code' => '321'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '37',
                'title' => 'Bažnyčios ir valstybės ryšiai',
                'code' => '322'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '37',
                'title' => 'Vidaus politika',
                'code' => '323'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '37',
                'title' => 'Rinkimai. Plebiscitai. Referendumai',
                'code' => '324'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '37',
                'title' => 'Naujų teritorijų grobimas. Kolonizacija',
                'code' => '325'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '37',
                'title' => 'Vergija',
                'code' => '326'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '37',
                'title' => 'Tarptautiniai santykiai. Pasaulio politika. Politikos globaliniai klausimai. Tarptautinis saugumas. Užsienio politika',
                'code' => '327'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '37',
                'title' => 'Parlamentai. Gyventojų atstovavimas. Valstybės valdymas',
                'code' => '328'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '37',
                'title' => 'Politinės partijos ir judėjimai',
                'code' => '329'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '38',
                'title' => 'Ekonomikos mokslas. Pagrindinės ekonominės koncepcijos. Ekonomikos teorija. Kapitalas. Fondai',
                'code' => '330'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '38',
                'title' => 'Darbas. Užimtumas. Darbo ekonomika. Darbo organizavimas',
                'code' => '331'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '38',
                'title' => 'Regioninė ekonomika. Krašto ekonomika. Būsto ekonomika',
                'code' => '332'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '38',
                'title' => 'Kooperacija ir organizacija ekonomikoje',
                'code' => '334'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '38',
                'title' => 'Finansai',
                'code' => '336'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '38',
                'title' => 'Ekonominė padėtis. Prekybos ciklai. Ekonominė plėtra. Ekonominis augimas',
                'code' => '338.1'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '38',
                'title' => 'Ekonominė politika. Ekonomija. Ekonominis planavimas',
                'code' => '338.2'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '38',
                'title' => 'Bendroji gamybos teorija',
                'code' => '338.3'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '38',
                'title' => 'Atskirų ūkio šakų gamyba ir paslaugos',
                'code' => '338.4'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '38',
                'title' => 'Kainos. Kainodara. Kaštai',
                'code' => '338.5'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '38',
                'title' => 'Prekyba. Rinka. Prekių apyvarta',
                'code' => '339.1'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '38',
                'title' => 'Vidaus prekyba. Vietinė prekyba',
                'code' => '339.3'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '38',
                'title' => 'Užsienio prekyba. Tarptautinė prekyba',
                'code' => '339.5'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '38',
                'title' => 'Tarptautiniai finansai',
                'code' => '339.7'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '38',
                'title' => 'Užsienio ekonominiai ryšiai. Tarptautiniai ekonominiai santykiai. Pasaulinis ūkis',
                'code' => '339.9'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '39',
                'title' => 'Administracinis sutvarkymas. Valdžios ir valdymo įstaigos',
                'code' => '35'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '39',
                'title' => 'Valstybės administracinio valdymo sritys',
                'code' => '351'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '39',
                'title' => 'Vietinis valdymas. Savivalda. Vietinės valdymo įstaigos',
                'code' => '352'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '39',
                'title' => 'Vidurinioji valdymo pakopa. Regioninis valdymas. Regioninės valdymo įstaigos',
                'code' => '353'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '39',
                'title' => 'Aukščiausioji valdymo pakopa. Centrinės valdymo įstaigos. Vyriausybinės valdymo įstaigos',
                'code' => '354'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '39',
                'title' => 'Krašto apsaugos bendrieji klausimai. Karyba',
                'code' => '355'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '39',
                'title' => 'Pėstininkai',
                'code' => '356'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '39',
                'title' => 'Kavalerija. Motorizuotos armijos dalys. Karo transportas',
                'code' => '357'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '39',
                'title' => 'Artilerija. Karo inžinerija. Aviacija. Karinės oro pajėgos',
                'code' => '358'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '39',
                'title' => 'Karinis jūrų laivynas. Karo laivai',
                'code' => '359'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '40',
                'title' => 'Socialinė gerovė',
                'code' => '364'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '40',
                'title' => 'Būsto poreikiai ir jų tenkinimas',
                'code' => '365'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '40',
                'title' => 'Vartotojų teisių gynimas',
                'code' => '366'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '43',
                'title' => 'Švietimo, ugdymo, mokymo teorija, politika ir metodologija',
                'code' => '37.01'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '43',
                'title' => 'Didaktikos ir metodikos bendrieji klausimai',
                'code' => '37.02'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '43',
                'title' => 'Intelekto ugdymas. Asmenybės formavimas ir tobulinimas',
                'code' => '37.03'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '43',
                'title' => 'Ugdymas ir mokymas atsižvelgiant į individualius gebėjimus. Konsultavimas',
                'code' => '37.04'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '43',
                'title' => 'Mokyklų finansavimo šaltiniai, parama',
                'code' => '37.05'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '43',
                'title' => 'Socialinės ugdymo ir mokymo problemos. Mokymo institucijų ryšiai su mokiniais.',
                'code' => '37.06'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '43',
                'title' => 'Švietimo įstaigų administravimas',
                'code' => '37.07'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '43',
                'title' => 'Švietimo įstaigų personalas',
                'code' => '37.08'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '43',
                'title' => 'Mokyklos vadovavimas ir administravimas. Mokyklos vadovai',
                'code' => '371.1'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '43',
                'title' => 'Mokymo įstaigų ir mokymo proceso organizavimas',
                'code' => '371.2'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '43',
                'title' => 'Mokymo metodai ir būdai. Mokymo formos',
                'code' => '371.3'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '43',
                'title' => 'Ugdymo sistemos',
                'code' => '371.4'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '43',
                'title' => 'Mokyklos įstaigos vidaus tvarka. Disciplina. Elgesio taisyklės',
                'code' => '371.5'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '43',
                'title' => 'Mokyklos vieta. Mokyklos sklypas. Pastatai ir įrengimai. Aprūpinimas',
                'code' => '371.6'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '43',
                'title' => 'Moksleivių sveikata ir higiena. Medicininė priežiūra ir kontrolė',
                'code' => '371.7'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '43',
                'title' => 'Moksleivių gyvenimas ir veikla ne mokykloje',
                'code' => '371.8'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '43',
                'title' => 'Bendrojo lavinimo mokyklų rūšys. Ikimokyklinis ugdymas',
                'code' => '373'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '43',
                'title' => 'Papildomas ugdymas ir lavinimas. Saviugda. Tęstinis mokymas',
                'code' => '374'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '43',
                'title' => 'Specialiųjų poreikių asmenų švietimas, ugdymas, mokymas. Specialiosios mokyklos',
                'code' => '376'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '43',
                'title' => 'Profesinis ir specialus vidurinis mokslas. Techninis mokymas. Profesinio mokymo mokyklos ir kitos įstaigos',
                'code' => '377'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '43',
                'title' => 'Aukštasis mokslas. Universitetai. Aukštojo mokslo organizacija',
                'code' => '378'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '43',
                'title' => 'Laisvalaikis',
                'code' => '379'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '44',
                'title' => 'Kostiumai. Apranga. Nacionaliniai kostiumai. Mada. Papuošalai',
                'code' => '391'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '44',
                'title' => 'Papročiai. Elgesys privačiame gyvenime',
                'code' => '392'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '44',
                'title' => 'Mirtis. Laidojimo papročiai',
                'code' => '393'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '44',
                'title' => 'Visuomeninis gyvenimas. Socialinis gyvenimas. Šventės',
                'code' => '394'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '44',
                'title' => 'Etiketas. Elgesio taisyklės',
                'code' => '395'
            ],[
                'id_first_level' => '4',
            	'id_second_level' => '44',
                'title' => 'Folkloras',
                'code' => '398'
            ],[
                'id_first_level' => '5',
            	'id_second_level' => '46',
                'title' => 'Tarptautinių organizacijų teisė',
                'code' => '341.1'
            ],[
                'id_first_level' => '5',
            	'id_second_level' => '46',
                'title' => 'Tarptautinės teisės objektai ir subjektai',
                'code' => '341.2'
            ],[
                'id_first_level' => '5',
            	'id_second_level' => '46',
                'title' => 'Tarptautinė karinė teisė',
                'code' => '341.3'
            ],[
                'id_first_level' => '5',
            	'id_second_level' => '46',
                'title' => 'Tarptautinė baudžiamoji teisė',
                'code' => '341.4'
            ],[
                'id_first_level' => '5',
            	'id_second_level' => '46',
                'title' => 'Tarptautinis arbitražas. Tarptautiniai teismai',
                'code' => '341.6'
            ],[
                'id_first_level' => '5',
            	'id_second_level' => '46',
                'title' => 'Diplomatinė teisė',
                'code' => '341.7'
            ],[
                'id_first_level' => '5',
            	'id_second_level' => '46',
                'title' => 'Konsulinė teisė',
                'code' => '341.8'
            ],[
                'id_first_level' => '5',
            	'id_second_level' => '46',
                'title' => 'Tarptautinė privatinė teisė. Teisės konfliktai',
                'code' => '341.9'
            ],[
                'id_first_level' => '5',
            	'id_second_level' => '47',
                'title' => 'Valstybė. Piliečiai. Tauta. Valstybės galia',
                'code' => '342.1'
            ],[
                'id_first_level' => '5',
            	'id_second_level' => '47',
                'title' => 'Valstybės struktūra',
                'code' => '342.2'
            ],[
                'id_first_level' => '5',
            	'id_second_level' => '47',
                'title' => 'Valstybės valdymo formos. Aukščiausioji valdžia. Suverenitetas',
                'code' => '342.3'
            ],[
                'id_first_level' => '5',
            	'id_second_level' => '47',
                'title' => 'Konstitucijos',
                'code' => '342.4'
            ],[
                'id_first_level' => '5',
            	'id_second_level' => '47',
                'title' => 'Valstybės valdžia. Valstybės valdymo sistema ir institucijų funkcijos.',
                'code' => '342.5'
            ],[
                'id_first_level' => '5',
            	'id_second_level' => '47',
                'title' => 'Vykdomoji valdžia. Centrinės valdžios institucijos',
                'code' => '342.6'
            ],[
                'id_first_level' => '5',
            	'id_second_level' => '47',
                'title' => 'Žmogaus teisės. Piliečių teisės ir pareigos',
                'code' => '342.7'
            ],[
                'id_first_level' => '5',
            	'id_second_level' => '47',
                'title' => 'Rinkimų teisė. Balsavimas. Rinkimų sistema',
                'code' => '342.8'
            ],[
                'id_first_level' => '5',
            	'id_second_level' => '47',
                'title' => 'Administracinė teisė',
                'code' => '342.9'
            ],[
                'id_first_level' => '5',
            	'id_second_level' => '48',
                'title' => 'Baudžiamasis procesas. Baudžiamųjų bylų tyrimas. Baudžiamasis procesas',
                'code' => '343.1'
            ],[
                'id_first_level' => '5',
            	'id_second_level' => '48',
                'title' => 'Baudžiamosios teisės bendroji dalis',
                'code' => '343.2'
            ],[
                'id_first_level' => '5',
            	'id_second_level' => '48',
                'title' => 'Nusikaltimai valstybei',
                'code' => '343.3'
            ],[
                'id_first_level' => '5',
            	'id_second_level' => '48',
                'title' => 'Nusikaltimai žmonijai. Nusikaltimai piliečiams',
                'code' => '343.4'
            ],[
                'id_first_level' => '5',
            	'id_second_level' => '48',
                'title' => 'Nusikaltimai visuomenės pasitikėjimui ir moralei. Nusikaltimai šeimai',
                'code' => '343.5'
            ],[
                'id_first_level' => '5',
            	'id_second_level' => '48',
                'title' => 'Nusikaltimai asmeniui.',
                'code' => '343.6'
            ],[
                'id_first_level' => '5',
            	'id_second_level' => '48',
                'title' => 'Turtiniai nusikaltimai',
                'code' => '343.7'
            ],[
                'id_first_level' => '5',
            	'id_second_level' => '48',
                'title' => 'Bausmių vykdymas. Nusikaltimų prevencija',
                'code' => '343.8'
            ],[
                'id_first_level' => '5',
            	'id_second_level' => '48',
                'title' => 'Kriminologija. Kriminalistika',
                'code' => '343.9'
            ],[
                'id_first_level' => '5',
            	'id_second_level' => '51',
                'title' => 'Bendroji civilinė teisė. Civilinės teisės teorija.',
                'code' => '347.1'
            ],[
                'id_first_level' => '5',
            	'id_second_level' => '51',
                'title' => 'Turtinė teisė. Nuosavybės teisė. Nekilnojamas turtas.',
                'code' => '347.2'
            ],[
                'id_first_level' => '5',
            	'id_second_level' => '51',
                'title' => 'Kilnojamas turtas. Asmeniniai daiktai',
                'code' => '347.3'
            ],[
                'id_first_level' => '5',
            	'id_second_level' => '51',
                'title' => 'Prievolinė teisė. Sutartys. Susitarimai',
                'code' => '347.4'
            ],[
                'id_first_level' => '5',
            	'id_second_level' => '51',
                'title' => 'Nesutartinės prievolės. Teisinė atsakomybė',
                'code' => '347.5'
            ],[
                'id_first_level' => '5',
            	'id_second_level' => '51',
                'title' => 'Šeimos teisė. Paveldėjimo teisė',
                'code' => '347.6'
            ],[
                'id_first_level' => '5',
            	'id_second_level' => '51',
                'title' => 'Komercinė teisė. Prekybos teisė',
                'code' => '347.7'
            ],[
                'id_first_level' => '5',
            	'id_second_level' => '51',
                'title' => 'Oro erdvės, aviacijos, eterio, kosmoso ir kt. naudojimo teisinis reguliavimas',
                'code' => '347.8'
            ],[
                'id_first_level' => '5',
            	'id_second_level' => '51',
                'title' => 'Civilinis procesas. Civilinių teismų santvarka',
                'code' => '347.9'
            ],[
                'id_first_level' => '5',
            	'id_second_level' => '53',
                'title' => 'Darbo teisė',
                'code' => '349.2'
            ],[
                'id_first_level' => '5',
            	'id_second_level' => '53',
                'title' => 'Socialinio aprūpinimo teisė',
                'code' => '349.3'
            ],[
                'id_first_level' => '5',
            	'id_second_level' => '53',
                'title' => 'Žemės teisė. Gyvenamųjų vietovių planavimo teisė',
                'code' => '349.4'
            ],[
                'id_first_level' => '5',
            	'id_second_level' => '53',
                'title' => 'Aplinkos apsaugos teisė',
                'code' => '349.6'
            ],[
                'id_first_level' => '5',
            	'id_second_level' => '53',
                'title' => 'Branduolinės energijos teisė',
                'code' => '349.7'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '55',
                'title' => 'Skaičiavimas. Matematiniai tyrimai. Matematiniai metodai. Matematiniai žaidimai. Laisvalaikio matematika',
                'code' => '51'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '55',
                'title' => 'Fundamentinės ir bendrosios matematikos problemos',
                'code' => '510'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '55',
                'title' => 'Skaičių teorija',
                'code' => '511'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '55',
                'title' => 'Algebra',
                'code' => '512'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '55',
                'title' => 'Geometrija',
                'code' => '514'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '55',
                'title' => 'Topologija',
                'code' => '515'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '55',
                'title' => 'Matematinė analizė',
                'code' => '517'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '55',
                'title' => 'Kombinatorinė analizė. Grafų teorija',
                'code' => '519'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '56',
                'title' => 'Astronominių tyrimų instrumentai, prietaisai ir metodai',
                'code' => '520'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '56',
                'title' => 'Teorinė astronomija. Dangaus mechanika',
                'code' => '521'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '56',
                'title' => 'Saulės sistema',
                'code' => '523'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '56',
                'title' => 'Žvaigždės. Žvaigždžių sistemos. Visata',
                'code' => '524'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '56',
                'title' => 'Geodezija. Geodeziniai tyrimai. Fotogrametrija. Aerofotografija. Kartografija',
                'code' => '528'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '57',
                'title' => 'Fizikos teoriniai aspektai, technika ir kt.',
                'code' => '53'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '57',
                'title' => 'Pagrindinės fizikos teorijos',
                'code' => '530'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '57',
                'title' => 'Bendroji mechanika. Kietųjų kūnų mechanika',
                'code' => '531'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '57',
                'title' => 'Skystųjų kūnų mechanika. Hidromechanika',
                'code' => '532'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '57',
                'title' => 'Dujinių kūnų mechanika. Aeromechanika. Plazmos fizika',
                'code' => '533'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '57',
                'title' => 'Virpesiai. Akustika',
                'code' => '534'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '57',
                'title' => 'Optika',
                'code' => '535'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '57',
                'title' => 'Šiluma. Termodinamika',
                'code' => '536'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '57',
                'title' => 'Elektra. Magnetizmas. Elektromagnetizmas',
                'code' => '537'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '57',
                'title' => 'Kondensuoto būvio fizika',
                'code' => '538'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '57',
                'title' => 'Materijos sandara',
                'code' => '539'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '58',
                'title' => 'Medžiagų būsena. Chemijos teoriniai aspektai, technika ir kt Cheminiai junginiai',
                'code' => '54'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '58',
                'title' => 'Praktinė laboratorinė chemija. Preparatų chemija. Eksperimentinė chemija',
                'code' => '542'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '58',
                'title' => 'Analizinė chemija',
                'code' => '543'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '58',
                'title' => 'Fizikinė chemija',
                'code' => '544'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '58',
                'title' => 'Neorganinė chemija',
                'code' => '546'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '58',
                'title' => 'Organinė chemija',
                'code' => '547'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '58',
                'title' => 'Kristalografija',
                'code' => '548'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '58',
                'title' => 'Mineralogija. Specialioji mineralotyra',
                'code' => '549'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '59',
                'title' => 'Pagalbiniai geologijos mokslai',
                'code' => '550'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '59',
                'title' => 'Bendroji geologija. Metereologija. Klimatologija. Istorinė geologija. Stratigrafija. Paleografija',
                'code' => '551'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '59',
                'title' => 'Petrologija. Petrografija',
                'code' => '552'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '59',
                'title' => 'Ekonominė geologija. Mineralų telkiniai',
                'code' => '553'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '59',
                'title' => 'Hidrosfera. Vanduo. Hidrologija',
                'code' => '556'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '60',
                'title' => 'Paleontologijos teoriniai aspektai, technika ir kt.',
                'code' => '56'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '60',
                'title' => 'Sisteminė paleobotanika',
                'code' => '561'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '60',
                'title' => 'Sisteminė paleozoologija',
                'code' => '562/569'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '61',
                'title' => 'Biologijos teoriniai aspektai, technika ir kt.',
                'code' => '57'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '61',
                'title' => 'Antropologija',
                'code' => '572'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '61',
                'title' => 'Bendroji ir teorinė biologija',
                'code' => '573'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '61',
                'title' => 'Bendroji ekologija. Biologinė įvairovė',
                'code' => '574'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '61',
                'title' => 'Bendroji genetika. Bendroji citogenetika',
                'code' => '575'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '61',
                'title' => 'Ląstelių biologija. Citologija',
                'code' => '576'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '61',
                'title' => 'Gyvybės pagrindai. Biochemija. Molekulinė biologija. Biofizika',
                'code' => '577'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '61',
                'title' => 'Virusologija',
                'code' => '578'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '61',
                'title' => 'Mikrobiologija',
                'code' => '579'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '62',
                'title' => 'Bendroji botanika',
                'code' => '581'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '62',
                'title' => 'Sisteminė botanika',
                'code' => '582'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '63',
                'title' => 'Bendroji zoologija',
                'code' => '591'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '63',
                'title' => 'Bestuburiai',
                'code' => '592'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '63',
                'title' => 'Pirmuonys. Duobagyviai. Kempinės. Dilginantieji. Dygiaodžiai',
                'code' => '593'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '63',
                'title' => 'Moliuskai',
                'code' => '594'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '63',
                'title' => 'Nariuotieji',
                'code' => '595'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '63',
                'title' => 'Stuburiniai',
                'code' => '596'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '63',
                'title' => 'Žuvys',
                'code' => '597'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '63',
                'title' => 'Ropliai',
                'code' => '598'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '63',
                'title' => 'Paukščiai',
                'code' => '598.2'
            ],[
                'id_first_level' => '6',
            	'id_second_level' => '63',
                'title' => 'Žinduoliai',
                'code' => '599'
            ],[
                'id_first_level' => '7',
            	'id_second_level' => '69',
                'title' => 'Traumos. Sužeidimai. Žaizdos',
                'code' => '616-001'
            ],[
                'id_first_level' => '7',
            	'id_second_level' => '69',
                'title' => 'Uždegimai. Dirginimas. Sustingimas. Gleivinė hiperemija',
                'code' => '616-002'
            ],[
                'id_first_level' => '7',
            	'id_second_level' => '69',
                'title' => 'Regresyvūs ir atsistatantieji procesai',
                'code' => '616-003'
            ],[
                'id_first_level' => '7',
            	'id_second_level' => '69',
                'title' => 'Sklerozė. Induracija. Kepenų cirozė',
                'code' => '616-004'
            ],[
                'id_first_level' => '7',
            	'id_second_level' => '69',
                'title' => 'Kraujo apytakos sutrikimai',
                'code' => '616-005'
            ],[
                'id_first_level' => '7',
            	'id_second_level' => '69',
                'title' => 'Augliai. Navikai. Blastomos. Choristomos. Hamartomos. Onkologija',
                'code' => '616-006'
            ],[
                'id_first_level' => '7',
            	'id_second_level' => '69',
                'title' => 'Organizmo raidos ydos. Fiziologiniai iškrypimai. Išsigimimai. Padidėję, sumažėję organai. Teratologija (apsigimimų mokslas). Kitos ydos',
                'code' => '616-007'
            ],[
                'id_first_level' => '7',
            	'id_second_level' => '69',
                'title' => 'Funkciniai ir medžiagų apykaitos sutrikimai',
                'code' => '616-008'
            ],[
                'id_first_level' => '7',
            	'id_second_level' => '69',
                'title' => 'Nervų ligos',
                'code' => '616-009'
            ],[
                'id_first_level' => '7',
            	'id_second_level' => '69',
                'title' => 'Bendrieji patologijos klausimai',
                'code' => '616-01/-09'
            ],[
                'id_first_level' => '7',
            	'id_second_level' => '69',
                'title' => 'Susirgimai ir jų gydymas, priklausomai nuo amžiaus',
                'code' => '616-053'
            ],[
                'id_first_level' => '7',
            	'id_second_level' => '69',
                'title' => 'Medicinos ir chirurgijos instrumentai ir aparatūra',
                'code' => '616-7'
            ],[
                'id_first_level' => '7',
            	'id_second_level' => '69',
                'title' => 'Kraujo apytakos sistemos ir kraujagyslių patologija. Širdies ligos',
                'code' => '616.1'
            ],[
                'id_first_level' => '7',
            	'id_second_level' => '69',
                'title' => 'Kvėpavimo sistemos patologija. Kvėpavimo sistemos organų ligos',
                'code' => '616.2'
            ],[
                'id_first_level' => '7',
            	'id_second_level' => '69',
                'title' => 'Virškinimo sistemos patologija. Virškinamojo trakto sistemos ligos',
                'code' => '616.3'
            ],[
                'id_first_level' => '7',
            	'id_second_level' => '69',
                'title' => 'Odontologija. Burnos ertmės ir dantų ligos',
                'code' => '616.31'
            ],[
                'id_first_level' => '7',
            	'id_second_level' => '69',
                'title' => 'Limfinės sistemos, kraujodaros organų, endokrininės sistemos patologija',
                'code' => '616.4'
            ],[
                'id_first_level' => '7',
            	'id_second_level' => '69',
                'title' => 'Oda. Klinikinė dermatologija. Odos ligos',
                'code' => '616.5'
            ],[
                'id_first_level' => '7',
            	'id_second_level' => '69',
                'title' => 'Šlapimo ir lyties organų patologija. Šlapimo ir lyties organų ligos',
                'code' => '616.6'
            ],[
                'id_first_level' => '7',
            	'id_second_level' => '69',
                'title' => 'Judėjimo organų patologija. Atramos ir judėjimo sistemos ligos',
                'code' => '616.7'
            ],[
                'id_first_level' => '7',
            	'id_second_level' => '69',
                'title' => 'Neurologija. Neuropatologija. Nervų sistema',
                'code' => '616.8'
            ],[
                'id_first_level' => '7',
            	'id_second_level' => '69',
                'title' => 'Užkrečiamosios ligos. Infekcinės ligos. Šiltinės',
                'code' => '616.9'
            ],[
                'id_first_level' => '8',
            	'id_second_level' => '74',
                'title' => 'Šiluminiai varikliai. Garas, jo gavimas, paskirstymas ir naudojimas. Garo katilai. Boileriai',
                'code' => '621.1'
            ],[
                'id_first_level' => '8',
            	'id_second_level' => '74',
                'title' => 'Hidraulinė energija. Vandens jėgainės. Hidrauliniai mechanizmai ir mašinos',
                'code' => '621.22'
            ],[
                'id_first_level' => '8',
            	'id_second_level' => '74',
                'title' => 'Elektrotechnika',
                'code' => '621.3'
            ],[
                'id_first_level' => '8',
            	'id_second_level' => '74',
                'title' => 'Elektronika. Elektroninės lempos. Fotoelektronika. Dalelių greitintuvai. Rentgenotechnika',
                'code' => '621.38'
            ],[
                'id_first_level' => '8',
            	'id_second_level' => '74',
                'title' => 'Teleryšiai. Telegrafas. Telefonija. Radijo ryšiai. Vaizdo technika. Televaldymas',
                'code' => '621.39'
            ],[
                'id_first_level' => '8',
            	'id_second_level' => '74',
                'title' => 'Šiluminiai varikliai (išskyrus garo variklius ir garo turbinas)',
                'code' => '621.4'
            ],[
                'id_first_level' => '8',
            	'id_second_level' => '74',
                'title' => 'Pneumoenergetika. Mašinos ir instrumentai. Šaldymo įrengimai',
                'code' => '621.5'
            ],[
                'id_first_level' => '8',
            	'id_second_level' => '74',
                'title' => 'Skysčių saugojimo ir paskirstymo technika ir įrengimai',
                'code' => '621.6'
            ],[
                'id_first_level' => '8',
            	'id_second_level' => '74',
                'title' => 'Mechaninė technologija: procesai, instrumentai ir prietaisai',
                'code' => '621.7'
            ],[
                'id_first_level' => '8',
            	'id_second_level' => '74',
                'title' => 'Mašinų detalės. Jėgos perdavimas. Medžiagų pervežimas. Tvirtinimo priemonės. Tepimas',
                'code' => '621.8'
            ],[
                'id_first_level' => '8',
            	'id_second_level' => '74',
                'title' => 'Apdirbimas pjovimu(nudrožiant). Abrazyvai. Kūjai ir presai.',
                'code' => '621.9'
            ],[
                'id_first_level' => '8',
            	'id_second_level' => '77',
                'title' => 'Konstrukcijos (statiniai ir statinių dalys) iš įvairių medžiagų.',
                'code' => '624.01'
            ],[
                'id_first_level' => '8',
            	'id_second_level' => '77',
                'title' => 'Statybinis projektavimas. Grafinės ir analitinės statikos taikymas tiriant, projektuojant ir skaičiuojant konstrukcijas',
                'code' => '624.04'
            ],[
                'id_first_level' => '8',
            	'id_second_level' => '77',
                'title' => 'Konstrukcijų elementai. Laikančiosios konstrukcijos',
                'code' => '624.07'
            ],[
                'id_first_level' => '8',
            	'id_second_level' => '77',
                'title' => 'Požeminė statyba. Žemės darbai. Pagrindai ir pamatai. Tunelių statyba',
                'code' => '624.1'
            ],[
                'id_first_level' => '8',
            	'id_second_level' => '77',
                'title' => 'Tiltų statyba',
                'code' => '624.2/.8'
            ],[
                'id_first_level' => '8',
            	'id_second_level' => '77',
                'title' => 'Antžeminiai statiniai (išskyrus tiltus). Antžeminiai kompleksiniai statiniai',
                'code' => '624.9'
            ],[
                'id_first_level' => '8',
            	'id_second_level' => '81',
                'title' => 'Vandens tiekimas. Vandens valymas. Vandens vartojimas',
                'code' => '628.1'
            ],[
                'id_first_level' => '8',
            	'id_second_level' => '81',
                'title' => 'Miesto nutekamieji vandenys. Miesto kanalizacija. Kanalizacija',
                'code' => '628.2'
            ],[
                'id_first_level' => '8',
            	'id_second_level' => '81',
                'title' => 'Nutekamieji vandenys. Nutekamųjų vandenų valymas, naudojimas ir utilizavimas',
                'code' => '628.3'
            ],[
                'id_first_level' => '8',
            	'id_second_level' => '81',
                'title' => 'Miesto higiena. Atliekos. Šiukšlės. Miesto atliekų surinkimas ir tvarkymas',
                'code' => '628.4'
            ],[
                'id_first_level' => '8',
            	'id_second_level' => '81',
                'title' => 'Apsauga nuo kenksmingų gamybos ir kitų veiksnių',
                'code' => '628.5'
            ],[
                'id_first_level' => '8',
            	'id_second_level' => '81',
                'title' => 'Patalpų klimatas. Oro kondicionavimas. Šildymas. Ventiliavimas',
                'code' => '628.8'
            ],[
                'id_first_level' => '8',
            	'id_second_level' => '81',
                'title' => 'Apšvietimas. Šviesos technika',
                'code' => '628.9'
            ],[
                'id_first_level' => '8',
            	'id_second_level' => '82',
                'title' => 'Antžeminės transporto priemonės (išskyrus bėgių transportą)',
                'code' => '629.1'
            ],[
                'id_first_level' => '8',
            	'id_second_level' => '82',
                'title' => 'Geležinkelio transporto priemonių inžinerija. Lokomotyvai. Riedmenys. Lokomotyvų ir vagonų ūkis.',
                'code' => '629.4'
            ],[
                'id_first_level' => '8',
            	'id_second_level' => '82',
                'title' => 'Vandens transporto priemonės. Valtys. Laivai. Valčių ir laivų statyba',
                'code' => '629.5'
            ],[
                'id_first_level' => '8',
            	'id_second_level' => '82',
                'title' => 'Oro ir erdvės transporto priemonės. Aeronautika ir aviacija. Raketos ir reaktyviniai sviediniai. Kosmonautika ir erdvėlaiviai',
                'code' => '629.7'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '83',
                'title' => 'Miško biologija. Aplinkos sąlygos',
                'code' => '630.1'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '83',
                'title' => 'Miškininkystė',
                'code' => '630.2'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '83',
                'title' => 'Mokslinis darbas miškininkystėje. Miško ruoša ir transportas.',
                'code' => '630.3'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '83',
                'title' => 'Miškų kenkėjai. Miškų apsauga.',
                'code' => '630.4'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '83',
                'title' => 'Miško taksacija. Miško augimas. Miško želdinių sudėtis.',
                'code' => '630.5'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '83',
                'title' => 'Miškų ūkio ekonomika. Miškų ūkio organizavimas, administravimas, finansinė veikla.',
                'code' => '630.6'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '83',
                'title' => 'Prekyba mišku. Miško transporto ir miško pramonės ekonomika',
                'code' => '630.7'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '83',
                'title' => 'Miško produktai ir jų panaudojimas.',
                'code' => '630.8'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '83',
                'title' => 'Miškininkystės politika. Valstybinė miškininkystės politika. Apželdinimo politika. Miškų ūkio socialinė ekonomika.',
                'code' => '630.9'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '84',
                'title' => 'Žemės ūkio organizavimas ir valdymas',
                'code' => '631.1'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '84',
                'title' => 'Žemės ūkio pastatai ir statiniai',
                'code' => '631.2'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '84',
                'title' => 'Žemės ūkio mašinos ir padargai. Žemės ūkio įrenginiai.',
                'code' => '631.3'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '84',
                'title' => 'Dirvotyra. Dirvožemio tyrimai.',
                'code' => '631.4'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '84',
                'title' => 'Agrotechnika. Argrotechnologija.',
                'code' => '631.5'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '84',
                'title' => 'Žemės ūkio melioracija',
                'code' => '631.6'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '84',
                'title' => 'Trąšos. Tręšimas. Augalų augimo stimuliavimas.',
                'code' => '631.8'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '84',
                'title' => 'Žemės dirbimo įtaka geografiniams faktoriams. Ūkininkavimo įtaka klimatui, dirvožemiui, vandens telkiniams.',
                'code' => '631.9'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '85',
                'title' => 'Neparazitinės augalų ligos.',
                'code' => '632.1'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '85',
                'title' => 'Augalų ligų simptomatika',
                'code' => '632.2'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '85',
                'title' => 'Bakterinės ir virusinės augalų ligos.',
                'code' => '632.3'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '85',
                'title' => 'Grybelių sukeliamos augalų ligos.',
                'code' => '632.4'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '85',
                'title' => 'Kenksmingi augalai.',
                'code' => '632.5'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '85',
                'title' => 'Gyvūnai – augalų kenkėjai (išskyrus vabzdžius)',
                'code' => '632.6'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '85',
                'title' => 'Vabzdžiai- augalų kenkėjai.',
                'code' => '632.7'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '85',
                'title' => 'Kiti augalų kenkėjai. Neaiškios kilmės augalų ligos.',
                'code' => '632.8'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '85',
                'title' => 'Augalų ligų ir kenkėjų kontrolė. Pesticidų naudojimas.',
                'code' => '632.9'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '86',
                'title' => 'Javai. Grūdinės kultūros',
                'code' => '633.1'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '86',
                'title' => 'Pašarinės žolės. Pievų žolės.',
                'code' => '633.2'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '86',
                'title' => 'Pašariniai augalai (išskyrus žoles)',
                'code' => '633.3'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '86',
                'title' => 'Šakniavaisiai ir gumbavaisiai.',
                'code' => '633.4'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '86',
                'title' => 'Pluoštiniai ir karniniai augalai.',
                'code' => '633.5'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '86',
                'title' => 'Cukringieji ir krakmolingieji augalai.',
                'code' => '633.6'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '86',
                'title' => 'Tonizuojantieji ir narkotiniai augalai.',
                'code' => '633.7'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '86',
                'title' => 'Aromatiniai augalai. Prieskoniniai augalai. Aliejiniai augalai. Dažiniai(dažantys) augalai. Rauginiai (rauginantys) augalai. Vaistiniai augalai.',
                'code' => '633.8'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '86',
                'title' => 'Kiti techniniai augalai.',
                'code' => '633.9'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '87',
                'title' => 'Vaisininkystė.',
                'code' => '634.1'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '87',
                'title' => 'Dengtasėkliai ir Kaulavaisiai.',
                'code' => '634.2'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '87',
                'title' => 'Griežtiniai vaisiai. Citrusiniai vaisiai.',
                'code' => '634.3'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '87',
                'title' => 'Riešutai.',
                'code' => '634.5'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '87',
                'title' => 'Tropiniai ir subtropiniai vaisiai.',
                'code' => '634.6'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '87',
                'title' => 'Uoginės kultūros.',
                'code' => '634.7'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '87',
                'title' => 'Vynuogininkystė. Vynuogynai.',
                'code' => '634.8'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '88',
                'title' => 'Šakniavaisinės daržovės',
                'code' => '635.1'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '88',
                'title' => 'Gumbinės ir svogūninės daržovės.',
                'code' => '635.2'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '88',
                'title' => 'Žalumyninės daržovės.',
                'code' => '635.3'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '88',
                'title' => 'Salotinės daržovės.',
                'code' => '635.5'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '88',
                'title' => 'Augalai, kurių valgomi vaisiai ir sėklos',
                'code' => '635.6'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '88',
                'title' => 'Kvepiantieji ir prieskoniniai augalai.',
                'code' => '635.7'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '88',
                'title' => 'Grybai',
                'code' => '635.8'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '88',
                'title' => 'Dekoratyvieji augalai. Dekoratyvioji sodininkystė',
                'code' => '635.9'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '89',
                'title' => 'Naminių gyvūnų kilmė. Gyvūnų prijaukinimas. Gyvūnų auginimas, priežiūra, treniravimas',
                'code' => '636.01'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '89',
                'title' => 'Veislei, parodai ar mokslo tikslams skirti gyvūnai',
                'code' => '636.02'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '89',
                'title' => 'Maistui skirti gyvuliai. Gyvulių ūkiai.',
                'code' => '636.03'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '89',
                'title' => 'Darbui ar žmogaus pramogoms skirti gyvuliai.',
                'code' => '636.04'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '89',
                'title' => 'Veisliniai gyvuliai',
                'code' => '636.05'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '89',
                'title' => 'Naminių gyvūnų ypatybės, konstitucija ir specialūs biologiniai duomenys',
                'code' => '636.06'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '89',
                'title' => 'Bendrieji gyvulių veisimo, auginimo ir priežiūros klausimai',
                'code' => '636.08'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '89',
                'title' => 'Veterinarija',
                'code' => '636.09'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '89',
                'title' => 'Vienanagiai. Arkliai',
                'code' => '636.1'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '89',
                'title' => 'Stambūs raguočiai galvijai. Karvės. Jaučiai.',
                'code' => '636.2'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '89',
                'title' => 'Smulkūs raguočiai gyvuliai. Avys. Ožkos',
                'code' => '636.3'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '89',
                'title' => 'Kiaulės',
                'code' => '636.4'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '89',
                'title' => 'Naminiai paukščiai',
                'code' => '636.5'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '89',
                'title' => 'Ne naminiai žmogaus auginami paukščiai',
                'code' => '636.6'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '89',
                'title' => 'Šunys',
                'code' => '636.7'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '89',
                'title' => 'Katės',
                'code' => '636.8'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '89',
                'title' => 'Kiti žmogaus auginami gyvūnai',
                'code' => '636.9'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '90',
                'title' => 'Pieno pramonė apskritai.',
                'code' => '637.1'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '90',
                'title' => 'Sviestas ir sviesto gamyba.',
                'code' => '637.2'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '90',
                'title' => 'Sūriai ir sūrių gamyba.',
                'code' => '637.3'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '90',
                'title' => 'Kiaušiniai. Kiaušinių produktai.',
                'code' => '637.4'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '90',
                'title' => 'Mėsa. Mėsos produktai.',
                'code' => '637.5'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '90',
                'title' => 'Kiti gyvuliniai produktai (išskyrus mėsą)',
                'code' => '637.6'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '91',
                'title' => 'Bitininkystė.',
                'code' => '638.1'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '91',
                'title' => 'Šilkverpių auginimas. Šilkininkystė.',
                'code' => '638.2'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '92',
                'title' => 'Medžioklė. Medžioklės ūkis.',
                'code' => '639.1'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '92',
                'title' => 'Žvejyba. Žūklė.',
                'code' => '639.2'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '92',
                'title' => 'Žuvivaisa. Žuvininkystė.',
                'code' => '639.3'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '92',
                'title' => 'Moliuskų auginimas.',
                'code' => '639.4'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '92',
                'title' => 'Vėžiagyvių, jūros ežių, dėlių auginimas.',
                'code' => '639.5'
            ],[
                'id_first_level' => '9',
            	'id_second_level' => '92',
                'title' => 'Kitų jūros gyvūnų ir augalų auginimas.',
                'code' => '639.6'
            ],[
                'id_first_level' => '11',
            	'id_second_level' => '106',
                'title' => 'Transporto organizavimo ir valdymo bendrieji klausimai',
                'code' => '656.01/.09'
            ],[
                'id_first_level' => '11',
            	'id_second_level' => '106',
                'title' => 'Kelių transportas. Kelių eismas',
                'code' => '656.1'
            ],[
                'id_first_level' => '11',
            	'id_second_level' => '106',
                'title' => 'Geležinkelio transportas. Geležinkelio eismas',
                'code' => '656.2'
            ],[
                'id_first_level' => '11',
            	'id_second_level' => '106',
                'title' => 'Specialus geležinkelio transportas',
                'code' => '656.3'
            ],[
                'id_first_level' => '11',
            	'id_second_level' => '106',
                'title' => 'Kitos sausumos transporto rūšys',
                'code' => '656.5'
            ],[
                'id_first_level' => '11',
            	'id_second_level' => '106',
                'title' => 'Vandens transportas',
                'code' => '656.6'
            ],[
                'id_first_level' => '11',
            	'id_second_level' => '106',
                'title' => 'Oro transportas. Oro eismas',
                'code' => '656.7'
            ],[
                'id_first_level' => '11',
            	'id_second_level' => '106',
                'title' => 'Paštas ryšiai. Pašto administravimas',
                'code' => '656.8'
            ],[
                'id_first_level' => '11',
            	'id_second_level' => '108',
                'title' => 'Įmonių tipai. Finansai',
                'code' => '658.1'
            ],[
                'id_first_level' => '11',
            	'id_second_level' => '108',
                'title' => 'Gamybos įrengimai. Patalpos. Pastatai. Gamybos priemonės. Medžiagos',
                'code' => '658.2'
            ],[
                'id_first_level' => '11',
            	'id_second_level' => '108',
                'title' => 'Tarpusavio santykiai įmonėje',
                'code' => '658.3'
            ],[
                'id_first_level' => '11',
            	'id_second_level' => '108',
                'title' => 'Gamybos projektavimas ir planavimas. Pramoninis dizainas. Technologinių procesų valdymas ir kontrolė',
                'code' => '658.5'
            ],[
                'id_first_level' => '11',
            	'id_second_level' => '108',
                'title' => 'Prekybos organizavimas ir technika. Prekės. Paslaugos',
                'code' => '658.6'
            ],[
                'id_first_level' => '11',
            	'id_second_level' => '108',
                'title' => 'Supirkimas. Materialinis aprūpinimas irtiekimas. Sandėlių ūkio valdymas',
                'code' => '658.7'
            ],[
                'id_first_level' => '11',
            	'id_second_level' => '108',
                'title' => 'Marketingas. Pardavimas. Prekyba. Prekių paskirstymas',
                'code' => '658.8'
            ],[
                'id_first_level' => '11',
            	'id_second_level' => '108',
                'title' => 'Kitos prekybos veiklos',
                'code' => '658.9'
            ],[
                'id_first_level' => '11',
            	'id_second_level' => '108',
                'title' => 'Reklama. Informacijos sistema. Ryšiai su visuomene',
                'code' => '659'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '155',
                'title' => 'Bendrieji planavimo ir užstatymo principai. Regioninis, miestų , rajonų planavimas',
                'code' => '711'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '155',
                'title' => 'Landšafto planavimas. Parkai. Sodai',
                'code' => '712'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '155',
                'title' => 'Kapinių, krematoriumų ir kitų laidojimo vietų planavimas bei priežiūra',
                'code' => '718'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '155',
                'title' => 'Istorijos ir kultūros paminklų apsauga',
                'code' => '719'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '156',
                'title' => 'Pastatų projektavimas',
                'code' => '721'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '156',
                'title' => 'Visuomeniniai ir pramoniniai pastatai. Civilinė statyba',
                'code' => '725'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '156',
                'title' => 'Kulto pastatai ir statiniai',
                'code' => '726'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '156',
                'title' => 'Mokymo, mokslo ir kultūros švietimo įstaigų statiniai',
                'code' => '727'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '156',
                'title' => 'Gyvenamųjų pastatų architektūra. Gyvenamieji pastatai',
                'code' => '728'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '157',
                'title' => 'Skulptūra',
                'code' => '730'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '157',
                'title' => 'Gliptika. Silgilografija',
                'code' => '736'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '157',
                'title' => 'Numizmatika',
                'code' => '737'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '157',
                'title' => 'Meninė keramika. Meninės keramikos dirbiniai',
                'code' => '738'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '157',
                'title' => 'Meninis metalų apdirbimas. Meniniai metalų dirbiniai',
                'code' => '739'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '158',
                'title' => 'Piešimas. Bendrieji klausimai',
                'code' => '741'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '158',
                'title' => 'Perspektyva piešinyje, brėžinyje',
                'code' => ' 742'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '158',
                'title' => 'Anatomija (dailė). Aktas (dailė)',
                'code' => '743'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '158',
                'title' => 'Braižyba. Techninis piešimas',
                'code' => '744'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '158',
                'title' => 'Dailieji verslai. Dailieji amatai',
                'code' => '745'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '158',
                'title' => 'Rankdarbiai',
                'code' => '746'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '158',
                'title' => 'Interjero apipavidalinimas',
                'code' => '747'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '158',
                'title' => 'Dailės dirbiniai iš stiklo ir krištolo',
                'code' => '748'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '158',
                'title' => 'Dailieji baldai. Židiniai. Krosnys. Šviestuvai',
                'code' => '749'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '160',
                'title' => 'Iškiliaspaudė graviūra',
                'code' => '761'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '160',
                'title' => 'Intalijos. Giliaspaudė graviūra',
                'code' => '762'
            ],[
            	'id_first_level' => '15',
            	'id_second_level' => '160',
                'title' => 'Plokščiaspaudė graviūra. Litografija',
                'code' => '763'
            ],[
            	'id_first_level' => '15',
            	'id_second_level' => '160',
                'title' => 'Taikomoji grafika. Komercinė grafika',
                'code' => '766'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '161',
                'title' => 'Fotografijos technikos įrenginių , aparatūros charakteristika. Fotografijos teorija ir technika. Demonstravimas',
                'code' => '77'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '161',
                'title' => 'Fotografavimo prietaisai. Aparatai, medžiagos',
                'code' => '771'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '161',
                'title' => 'Fotografijos procesai, naudojantys neorganines medžiagas arba fizikinius reiškinius',
                'code' => '772'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '161',
                'title' => 'Fotografijos procesai, naudojantys organines medžiagas',
                'code' => '773'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '161',
                'title' => 'Fotomechaniniai procesai',
                'code' => '774'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '161',
                'title' => 'Fotolitografija. Plokščiosios spaudos formų gamybos fotografiniai procesai',
                'code' => '776'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '161',
                'title' => 'Giliaspaudės formos. Fotograviūra. Iškiliosios spaudos formos',
                'code' => '777'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '161',
                'title' => 'Specialiosios fotografijos taikymo sritys',
                'code' => '778'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '162',
                'title' => 'Muzikos teorija. Muzikos filosofija',
                'code' => '78.01'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '162',
                'title' => 'Muzikos kūrimo technika',
                'code' => '78.02'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '162',
                'title' => 'Muzikos istorija. Muzikos stiliai, kryptys, įtakos',
                'code' => '78.03'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '162',
                'title' => 'Muzikos reprezentavimo subjektai. Programinė muzika',
                'code' => '78.04'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '162',
                'title' => 'Muzikos naudojimas. Taikomoji muzika',
                'code' => '78.05'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '162',
                'title' => 'Įvairūs kiti klausimai apie muziką',
                'code' => '78.06'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '162',
                'title' => 'Muzikinės veiklos rūšys',
                'code' => '78.07'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '162',
                'title' => 'Muzikos kūrinių žanrai. (būdingos ypatybės, formos)',
                'code' => '78.08'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '162',
                'title' => 'Atlikimo, pristatymo tipai',
                'code' => '78.09'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '162',
                'title' => 'Muzikos teorija. Bendri klausimai',
                'code' => '781'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '162',
                'title' => 'Teatro (scenos muzika)',
                'code' => '782'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '162',
                'title' => 'Religinė muzika. Bažnytinė muzika',
                'code' => '783'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '162',
                'title' => 'Vokalinė muzika',
                'code' => '784'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '162',
                'title' => 'Instrumentinė muzika. Simfoninė muzika. Instrumentinės grupės. Muzikos ansambliai',
                'code' => '785'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '162',
                'title' => 'Muzika atskiriems instrumentams',
                'code' => '786'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '162',
                'title' => 'Muzika strykiniams ir styginiams instrumentams',
                'code' => '787'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '162',
                'title' => 'Muzika pučiamiesiems instrumentams',
                'code' => '788'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '162',
                'title' => 'Muzika mušamiesiems ir mechaniniams muzikos instrumentams',
                'code' => '789'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '163',
                'title' => 'Masinės pramogos ir reginiai. Kino menas',
                'code' => '791'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '163',
                'title' => 'Teatras. Scenos menas',
                'code' => '792'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '163',
                'title' => 'Ypatingos šventės ir iškilmės. Choreografija. Judrieji ir didaktiniai žaidimai',
                'code' => '793'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '163',
                'title' => 'Stalo žaidimai',
                'code' => '794'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '163',
                'title' => 'Sportas. Žaidimai. Kūno kultūra apskritai',
                'code' => '796'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '163',
                'title' => 'Vandens sportas. Aviacijos sportas',
                'code' => '797'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '163',
                'title' => 'Jojimo sportas. Ristūnų žirgų lenktynės',
                'code' => '798'
            ],[
                'id_first_level' => '15',
            	'id_second_level' => '163',
                'title' => 'Sportinė žūklė. Sportinė medžioklė. Šaudymo sportas',
                'code' => '799'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '164',
                'title' => 'Prozodija: metras, ritmas, rimas, eilėdara',
                'code' => '801.6'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '164',
                'title' => 'Filologijos pagalbiniai mokslai',
                'code' => '801.7'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '164',
                'title' => 'Lingvistikos ir filologijos šaltiniai. Tekstų rinkiniai.',
                'code' => '801.8'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '164',
                'title' => 'Retorika',
                'code' => '808'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '166',
                'title' => 'Germanų kalbos',
                'code' => '811.11'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '166',
                'title' => 'Lotynų kalba',
                'code' => '811.124'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '166',
                'title' => 'Romanų kalbos',
                'code' => '811.12/13'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '166',
                'title' => 'Graikų kalba',
                'code' => '811.14'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '166',
                'title' => 'Keltų kalbos',
                'code' => '811.15'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '166',
                'title' => 'Slavų kalbos',
                'code' => '811.16'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '166',
                'title' => 'Baltų kalbos',
                'code' => '811.17'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '166',
                'title' => 'Lietuvių kalba',
                'code' => '811.172'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '166',
                'title' => 'Indų-iranėnų kalbos',
                'code' => '811.21/22'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '166',
                'title' => 'Mirusios kalbos',
                'code' => '811.29/34'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '166',
                'title' => 'Ibero-kaukaziečių kalbos',
                'code' => '811.35'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '166',
                'title' => 'Baskų kalba',
                'code' => '811.361'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '166',
                'title' => 'Afrazijiečių kalbos',
                'code' => '811.4'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '166',
                'title' => 'Finų-ugrų (uraliečių) kalbos. Altajiečių kalbos',
                'code' => '811.51'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '166',
                'title' => 'Japonų kalba',
                'code' => '811.521'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '166',
                'title' => 'Korėjiečių kalba',
                'code' => '811.531'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '166',
                'title' => 'Paleoazijiečių kalbos',
                'code' => '811.55'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '166',
                'title' => 'Eskimų-Aleutų kalbos',
                'code' => '811.56'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '166',
                'title' => 'Dravidų kalbos',
                'code' => '811.57'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '166',
                'title' => 'Kinų-tibetiečių kalbos',
                'code' => '811.58'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '166',
                'title' => 'Austoazijiečių kalbos. Polineziečių kalba. Okeanijos tautų kalba.',
                'code' => '811.61/.62'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '166',
                'title' => 'Ramiojo vandenyno tautų kalbos',
                'code' => '811.71'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '166',
                'title' => 'Australiečių kalbos',
                'code' => '811.72'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '166',
                'title' => 'Amerikos indėnų kalbos',
                'code' => '811.8'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '166',
                'title' => 'Dirbtinės kalbos',
                'code' => '811.9'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '168',
                'title' => 'Anglų literatūra',
                'code' => '821.111'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '168',
                'title' => 'Vokiečių literatūra',
                'code' => '821.112.2'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '168',
                'title' => 'Olandų literatūra',
                'code' => '821.112.5'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '168',
                'title' => 'Literatūra afrikans kalba',
                'code' => '821.112.6'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '168',
                'title' => 'Islandų literatūra',
                'code' => '821.113.3'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '168',
                'title' => 'Danų literatūra',
                'code' => '821.113.4'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '168',
                'title' => 'Norvegų literatūra',
                'code' => '821.113.5'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '168',
                'title' => 'Švedų literatūra',
                'code' => '821.113.6'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '168',
                'title' => 'Lotynų literatūra',
                'code' => '821.124'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '168',
                'title' => 'Italų literatūra',
                'code' => '821.131.1'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '168',
                'title' => 'Ispanų literatūra',
                'code' => '821.134.2'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '168',
                'title' => 'Portugalų literatūra',
                'code' => '821.134.3'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '168',
                'title' => 'Prancūzų literatūra',
                'code' => '821.133.1'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '168',
                'title' => 'Rumunų literatūra',
                'code' => '821.135.1'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '168',
                'title' => 'Moldavų literatūra',
                'code' => '821.135.2'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '168',
                'title' => 'Graikų literatūra',
                'code' => '821.14'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '168',
                'title' => 'Keltų literatūra',
                'code' => '821.15'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '168',
                'title' => 'Rusų literatūra',
                'code' => '821.161.1'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '168',
                'title' => 'Ukrainiečių literatūra',
                'code' => '821.161.2'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '168',
                'title' => 'Baltarusių literatūra',
                'code' => '821.161.3'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '168',
                'title' => ' Lenkų literatūra',
                'code' => '821.162.1'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '168',
                'title' => 'Čekų literatūra',
                'code' => '821.162.3'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '168',
                'title' => 'Slovakų literatūra',
                'code' => '821.162.4'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '168',
                'title' => 'Bulgarų literatūra',
                'code' => '821.163.2'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '168',
                'title' => 'Makedonų literatūra',
                'code' => '821.163.3'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '168',
                'title' => 'Serbų literatūra',
                'code' => '821.163.4'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '168',
                'title' => 'Slovėnų literatūra',
                'code' => '821.163.6'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '168',
                'title' => 'Lietuvių literatūra',
                'code' => '821.172'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '168',
                'title' => 'Latvių literatūra',
                'code' => '821.174'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '168',
                'title' => 'Albanų literatūra',
                'code' => '821.18'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '168',
                'title' => 'Armėnų literatūra',
                'code' => '821.19'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '168',
                'title' => 'Indų literatūra',
                'code' => '821.21'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '168',
                'title' => 'Iraniečių literatūra',
                'code' => '821.22'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '168',
                'title' => 'Kaukaziečių literatūra',
                'code' => '821.35'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '168',
                'title' => 'Hebrajų literatūra',
                'code' => '821.411.16'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '168',
                'title' => 'Arabų literatūra',
                'code' => '821.411.21'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '168',
                'title' => 'Suomių literatūra',
                'code' => '821.511.111'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '168',
                'title' => 'Estų literatūra',
                'code' => '821.511.113'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '168',
                'title' => 'Japonų literatūra',
                'code' => '821.521'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '168',
                'title' => 'Korėjiečių literatūra',
                'code' => '821.531'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '168',
                'title' => 'Kinų ir tibetiečių literatūra',
                'code' => '821.58'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '168',
                'title' => 'Kinų literatūra',
                'code' => '821.581'
            ],[
                'id_first_level' => '16',
            	'id_second_level' => '168',
                'title' => 'Esperanto literatūra',
                'code' => '821.922'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '180',
                'title' => 'Britų Salų istorija',
                'code' => '94(41)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '180',
                'title' => 'Anglijos ir Didžiosios Britanijos istorija',
                'code' => '94(420)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '180',
                'title' => 'Vokietijos istorija',
                'code' => '94(430)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '180',
                'title' => 'Čekoslovakijos istorija. Čekijos istorija. Slovakijos istorija.',
                'code' => '94(437)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '180',
                'title' => 'Lenkijos istorija',
                'code' => '94(438)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '180',
                'title' => 'Vengrijos istorija',
                'code' => '94(439)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '180',
                'title' => 'Prancūzijos istorija',
                'code' => '94(44)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '180',
                'title' => 'Italijos istorija',
                'code' => '94(450)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '180',
                'title' => 'Ispanijos istorija',
                'code' => '94(460)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '180',
                'title' => 'Portugalijos istorija',
                'code' => '94(469)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '180',
                'title' => 'Tarybų Socialistinių Respublikų Sąjungos (TSRS) istorija',
                'code' => '94(47+57)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '180',
                'title' => 'Baltijos šalių istorija',
                'code' => '94(474)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '180',
                'title' => 'Estijos istorija',
                'code' => '94(474.2)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '180',
                'title' => 'Latvijos istorija',
                'code' => '94(474.3)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '180',
                'title' => 'Lietuvos istorija',
                'code' => '94(474.5)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '180',
                'title' => 'Baltarusijos istorija',
                'code' => '94(476)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '180',
                'title' => 'Ukrainos istorija',
                'code' => '94(477)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '180',
                'title' => 'Kaukazo tautų istorija',
                'code' => '94(479)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '180',
                'title' => 'Skandinavijos šalių istorija',
                'code' => '94(48)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '180',
                'title' => 'Islandijos istorija',
                'code' => '94(491.1)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '180',
                'title' => 'Niderlandų istorija',
                'code' => '94(492)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '180',
                'title' => 'Belgijos istorija',
                'code' => '94(493)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '180',
                'title' => 'Šveicarijos istorija',
                'code' => '94(494)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '180',
                'title' => 'Graikijos istorija',
                'code' => '94(495)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '180',
                'title' => 'Albanijos istorija',
                'code' => '94(496.5)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '180',
                'title' => 'Balkanų valstybių istorija',
                'code' => '94(497)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '180',
                'title' => 'Rumunijos istorija',
                'code' => '94(498)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '181',
                'title' => 'Kinijos istorija',
                'code' => '94(510)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '181',
                'title' => 'Mongolijos istorija',
                'code' => '94(517)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '181',
                'title' => 'Šiaurės Korėjos istorija',
                'code' => '94(519.3)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '181',
                'title' => 'Pietų Korėjos istorija',
                'code' => '94(519.5)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '181',
                'title' => 'Japonijos istorija',
                'code' => '94(520)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '181',
                'title' => 'Taivanio istorija',
                'code' => '94(529)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '181',
                'title' => 'Arabijos valstybių ir teritorijų istorija',
                'code' => '94(53)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '181',
                'title' => 'Indijos pusiasalio valstybių istorija',
                'code' => '94(54)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '181',
                'title' => 'Irano istorija',
                'code' => '94(55)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '181',
                'title' => 'Turkijos istorija',
                'code' => '94(560)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '181',
                'title' => 'Kipro istorija',
                'code' => '94(564.3)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '181',
                'title' => 'Irako istorija',
                'code' => '94(567)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '181',
                'title' => 'Sirijos istorija',
                'code' => '94(569.1)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '181',
                'title' => 'Libano istorija',
                'code' => '94(569.3)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '181',
                'title' => 'Palestinos ir Izraelio istorija',
                'code' => '94(569.4)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '181',
                'title' => 'Kazachstano istorija',
                'code' => '94(571)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '181',
                'title' => 'Afganistano istorija',
                'code' => '94(581)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '181',
                'title' => 'Pietryčių Azijos valstybių ir teritorijų istorija',
                'code' => '94(59)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '183',
                'title' => 'Kanados istorija',
                'code' => '94(71)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '183',
                'title' => 'Meksikos istorija',
                'code' => '94(72)'
            ],[
                'id_first_level' => '18',
            	'id_second_level' => '183',
                'title' => 'Jungtinių Amerikos Valstijų istorija',
                'code' => '94(73)'
            ]
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class UDKsecondLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('udk_second_level')->insert([
            [
            	'id_first_level' => '1',
                'title' => 'Mokslas ir žinija. Mokslatyra. Intelektinio darbo organizacija',
                'code' => '001'
            ],[
                'id_first_level' => '1',
                'title' => 'Dokumentacija. Knygos. Raštai. Kūryba',
                'code' => '002'
            ],[
                'id_first_level' => '1',
                'title' => 'Rašto sistemos ir rašto ženklai. Raštas',
                'code' => '003'
            ],[
                'id_first_level' => '1',
                'title' => 'Kompiuterija. Kompiuterinė technologija. Duomenų tvarkymas',
                'code' => '004'
            ],[
                'id_first_level' => '1',
                'title' => 'Valdymas. Vadyba',
                'code' => '005'
            ],[
                'id_first_level' => '1',
                'title' => 'Standartizacija. Gaminių, operacijų, svorių, matų ir laiko standartai. Metrologija. Chronologija',
                'code' => '006'
            ],[
                'id_first_level' => '1',
                'title' => 'Veikla ir organizavimas. Komunikacija. Kibernetika',
                'code' => '007'
            ],[
                'id_first_level' => '1',
                'title' => 'Civilizacija. Kultūra. Progresas',
                'code' => '008'
            ],[
                'id_first_level' => '1',
                'title' => 'Bibliografija. Bibliografinės priemonės. Katalogai',
                'code' => '01'
            ],[
                'id_first_level' => '1',
                'title' => 'Bibliotekininkystė',
                'code' => '02'
            ],[
                'id_first_level' => '1',
                'title' => 'Informaciniai leidiniai. Enciklopedijos. Žinynai',
                'code' => '030'
            ],[
                'id_first_level' => '1',
                'title' => 'Serialiniai leidiniai',
                'code' => '05'
            ],[
                'id_first_level' => '1',
                'title' => 'Rankraščiai. Retos knygos',
                'code' => '09'
            ],[
                'id_first_level' => '1',
                'title' => 'Organizacijos',
                'code' => '06'
            ],[
                'id_first_level' => '1',
                'title' => 'Spauda. Laikraščiai. Žurnalistika',
                'code' => '07'
            ],[
                'id_first_level' => '2',
                'title' => 'Filosofijos mokslo esmė ir uždaviniai',
                'code' => '101'
            ],[
                'id_first_level' => '2',
                'title' => 'Metafizika. Ontologija. Pagrindinės filosofijos kategorijos',
                'code' => '11'
            ],[
                'id_first_level' => '2',
                'title' => 'Specialioji metafizika',
                'code' => '12'
            ],[
                'id_first_level' => '2',
                'title' => 'Dvasios filosofija. Dvasinio gyvenimo metafizika',
                'code' => '13'
            ],[
                'id_first_level' => '2',
                'title' => 'Filosofijos sistemos ir koncepcijos',
                'code' => '14'
            ],[
                'id_first_level' => '2',
                'title' => 'Psichologija',
                'code' => '159.9'
            ],[
                'id_first_level' => '2',
                'title' => 'Logika. Epistemologija. Pažinimo teorija. Logikos metodologija',
                'code' => '16'
            ],[
                'id_first_level' => '2',
                'title' => 'Etika. Moralės filosofija. Praktinė filosofija',
                'code' => '17'
            ],[
                'id_first_level' => '3',
                'title' => 'Priešistorinės ir primityviosios religijos',
                'code' => '21'
            ],[
                'id_first_level' => '3',
                'title' => 'Tolimųjų Rytų religijos',
                'code' => '22'
            ],[
                'id_first_level' => '3',
                'title' => 'Indijos pusiasalio religijos. Induizmas plačiąja prasme',
                'code' => '23'
            ],[
                'id_first_level' => '3',
                'title' => 'Budizmas',
                'code' => '24'
            ],[
                'id_first_level' => '3',
                'title' => 'Antikos religijos',
                'code' => '25'
            ],[
                'id_first_level' => '3',
                'title' => 'Judaizmas',
                'code' => '26'
            ],[
                'id_first_level' => '3',
                'title' => 'Krikščionybė',
                'code' => '27'
            ],[
                'id_first_level' => '3',
                'title' => 'Islamas',
                'code' => '28'
            ],[
                'id_first_level' => '3',
                'title' => 'Šiuolaikiniai dvasiniai judėjimai',
                'code' => '29'
            ],[
                'id_first_level' => '4',
                'title' => 'Socialinių mokslų teorija ir metodologija. Sociografija',
                'code' => '30'
            ],[
                'id_first_level' => '4',
                'title' => 'Statistika',
                'code' => '311'
            ],[
                'id_first_level' => '4',
                'title' => 'Demografija. Gyventojai',
                'code' => '314'
            ],[
                'id_first_level' => '4',
                'title' => 'Sociologija',
                'code' => '316'
            ],[
                'id_first_level' => '4',
                'title' => 'Politika',
                'code' => '32'
            ],[
                'id_first_level' => '4',
                'title' => 'Ekonomika. Ekonomikos mokslas',
                'code' => '33'
            ],[
                'id_first_level' => '4',
                'title' => 'Valstybės administracinis valdymas. Vykdomoji valdžia. Krašto apsauga',
                'code' => '35'
            ],[
                'id_first_level' => '4',
                'title' => 'Socialinis aprūpinimas. Dvasinių ir materialinių gyvenimo sąlygų užtikrinimas',
                'code' => '36'
            ],[
                'id_first_level' => '4',
                'title' => 'Draudimas',
                'code' => '368'
            ],[
                'id_first_level' => '4',
                'title' => 'Socialinis draudimas',
                'code' => '369'
            ],[
                'id_first_level' => '4',
                'title' => 'Švietimas',
                'code' => '37'
            ],[
                'id_first_level' => '4',
                'title' => 'Etnologija. Etnografija. Papročiai. Tradicijos. Gyvenimo būdas',
                'code' => '39'
            ],[
                'id_first_level' => '5',
                'title' => 'Teisės teorija ir metodologija',
                'code' => '340'
            ],[
                'id_first_level' => '5',
                'title' => 'Tarptautinė teisė',
                'code' => '341'
            ],[
                'id_first_level' => '5',
                'title' => 'Valstybinė teisė. Konstitucinė teisė. Administracinė teisė',
                'code' => '342'
            ],[
                'id_first_level' => '5',
                'title' => 'Baudžiamoji teisė. Baudžiamieji nusikaltimai',
                'code' => '343'
            ],[
                'id_first_level' => '5',
                'title' => 'Specialioji baudžiamoji teisė. Karinė baudžiamoji teisė',
                'code' => '344'
            ],[
                'id_first_level' => '5',
                'title' => 'Ekonominė teisė. Ekonomikos valstybinio reguliavimo teisiniai pagrindai',
                'code' => '346'
            ],[
                'id_first_level' => '5',
                'title' => 'Civilinė teisė. Privatinė teisė.',
                'code' => '347'
            ],[
                'id_first_level' => '5',
                'title' => 'Kanonų teisė. Religinė teisė',
                'code' => '348'
            ],[
                'id_first_level' => '5',
                'title' => 'Specialios teisės sritys',
                'code' => '349'
            ],[
                'id_first_level' => '6',
                'title' => 'Aplinkotyra. Gamtos resursų išsaugojimas. Aplinkos apsauga',
                'code' => '50'
            ],[
                'id_first_level' => '6',
                'title' => 'Matematika',
                'code' => '51'
            ],[
                'id_first_level' => '6',
                'title' => 'Astronomija. Astrofizika. Dangaus kūnų stebėjimai. Geodezija',
                'code' => '52'
            ],[
                'id_first_level' => '6',
                'title' => 'Fizika',
                'code' => '53'
            ],[
                'id_first_level' => '6',
                'title' => 'Chemija. Kristalografija. Mineralogija',
                'code' => '54'
            ],[
                'id_first_level' => '6',
                'title' => 'Geologija. Geologijos mokslai',
                'code' => '55'
            ],[
                'id_first_level' => '6',
                'title' => 'Paleontologija',
                'code' => '56'
            ],[
                'id_first_level' => '6',
                'title' => 'Biologijos mokslai',
                'code' => '57'
            ],[
                'id_first_level' => '6',
                'title' => 'Botanika. Botanikos teoriniai aspektai, technika ir kt.',
                'code' => '58'
            ],[
                'id_first_level' => '6',
                'title' => 'Zoologija. Zoologijos teoriniai aspektai, technika ir kt.',
                'code' => '59'
            ],[
                'id_first_level' => '7',
                'title' => 'Anatomija. Žmogaus ir lyginamoji anatomija',
                'code' => '611'
            ],[
                'id_first_level' => '7',
                'title' => 'Fiziologija. Žmogaus ir lyginamoji fiziologija',
                'code' => '612'
            ],[
                'id_first_level' => '7',
                'title' => 'Higiena. Asmens sveikata ir higiena',
                'code' => '613'
            ],[
                'id_first_level' => '7',
                'title' => 'Sveikatos apsauga ir higiena. Saugumo technika',
                'code' => '614'
            ],[
                'id_first_level' => '7',
                'title' => 'Farmakologija. Bendroji terapija. Toksikologija',
                'code' => '615'
            ],[
                'id_first_level' => '7',
                'title' => 'Patologija. Klinikinė medicina',
                'code' => '616'
            ],[
                'id_first_level' => '7',
                'title' => 'Chirurgija. Ortopedija. Oftalmologija',
                'code' => '617'
            ],[
                'id_first_level' => '7',
                'title' => 'Akušerija ir ginekologija',
                'code' => '618'
            ],[
                'id_first_level' => '8',
                'title' => 'Mašinų detalių, prietaisų, įrengimų, procesų ir gaminių charakteristikos',
                'code' => '62'
            ],[
                'id_first_level' => '8',
                'title' => 'Medžiagų bandymai. Prekių mokslas. Jėgainės. Bendroji energetika',
                'code' => '620'
            ],[
                'id_first_level' => '8',
                'title' => 'Bendroji mašinų gamyba. Branduolinė technika. Elektrotechnika. Mašinų gamybos technologija',
                'code' => '621'
            ],[
                'id_first_level' => '8',
                'title' => 'Kalnakasyba.',
                'code' => '622'
            ],[
                'id_first_level' => '8',
                'title' => 'Karo technika.',
                'code' => '623'
            ],[
                'id_first_level' => '8',
                'title' => 'Civilinė statyba. Statybos technika',
                'code' => '624'
            ],[
                'id_first_level' => '8',
                'title' => 'Kelių tiesimas. Geležinkelių inžinerija. Kelių inžinerija',
                'code' => '625'
            ],[
                'id_first_level' => '8',
                'title' => 'Hidrotechnika',
                'code' => '626'
            ],[
                'id_first_level' => '8',
                'title' => 'Vandens kelių, uostų ir krantų inžinerija. Navigacijos įrenginiai, avarinės gelbstimosios priemonės. Užtvankos. Hidroelektrinių statiniai',
                'code' => '627'
            ],[
                'id_first_level' => '8',
                'title' => 'Sanitarinė technika. Vandentiekis. Kanalizacija. Apšvietimo technika',
                'code' => '628'
            ],[
                'id_first_level' => '8',
                'title' => 'Transporto priemonių technika',
                'code' => '629'
            ],[
                'id_first_level' => '9',
                'title' => 'Miškininkystė. Miškai. Miškų ūkis',
                'code' => '630'
            ],[
                'id_first_level' => '9',
                'title' => 'Žemės ūkio ekonomika ir organizacija',
                'code' => '631'
            ],[
                'id_first_level' => '9',
                'title' => 'Augalų apsauga. Augalų kenkėjai. Augalų ligos.',
                'code' => '632'
            ],[
                'id_first_level' => '9',
                'title' => 'Augalininkystė',
                'code' => '633'
            ],[
                'id_first_level' => '9',
                'title' => 'Sodininkystė',
                'code' => '634'
            ],[
                'id_first_level' => '9',
                'title' => 'Daržininkystė',
                'code' => '635'
            ],[
                'id_first_level' => '9',
                'title' => 'Gyvulininkystė. Veislininkystė',
                'code' => '636'
            ],[
                'id_first_level' => '9',
                'title' => 'Gyvulininkystės ir medžioklės produktai.',
                'code' => '637'
            ],[
                'id_first_level' => '9',
                'title' => 'Vabzdžių ir kitų nariuotakojų veisimas ir auginimas. Bitininkystė.',
                'code' => '638'
            ],[
                'id_first_level' => '9',
                'title' => 'Medžioklė. Žvejyba',
                'code' => '639'
            ],[
                'id_first_level' => '10',
                'title' => 'Bendrieji namų ūkio ekonomikos principai. Namų ūkio organizavimas. Namų ruoša. Namų ūkio administravimas',
                'code' => '64'
            ],[
                'id_first_level' => '10',
                'title' => 'Namų ūkio tipai. Namų ūkio valdymas',
                'code' => '640'
            ],[
                'id_first_level' => '10',
                'title' => 'Maisto produktai. Maisto gaminimas. Patiekalai',
                'code' => '641'
            ],[
                'id_first_level' => '10',
                'title' => 'Mityba ir maitinimas. Indai',
                'code' => '642'
            ],[
                'id_first_level' => '10',
                'title' => 'Gyvenamosios patalpos',
                'code' => '643'
            ],[
                'id_first_level' => '10',
                'title' => 'Gyvenamųjų patalpų sanitariniai techniniai įrenginiai',
                'code' => '644'
            ],[
                'id_first_level' => '10',
                'title' => 'Gyvenamųjų patalpų apstatymas',
                'code' => '645'
            ],[
                'id_first_level' => '10',
                'title' => 'Drabužiai. Kūno priežiūra',
                'code' => '646'
            ],[
                'id_first_level' => '10',
                'title' => 'Namų ūkio aptarnaujantis personalas',
                'code' => '647'
            ],[
                'id_first_level' => '10',
                'title' => 'Skalbimas. Skalbyklos. Patalpų valymas.',
                'code' => '648'
            ],[
                'id_first_level' => '10',
                'title' => 'Vaikų ir invalidų priežiūra. Svečių priėmimas namuose',
                'code' => '649'
            ],[
                'id_first_level' => '11',
                'title' => 'Teleryšiai ir teleryšių valdymas (organizavimas ir eksploatavimas)',
                'code' => '654'
            ],[
                'id_first_level' => '11',
                'title' => 'Poligrafijos pramonė. Spausdinimas. Leidyklos. Knygų prekyba',
                'code' => '655'
            ],[
                'id_first_level' => '11',
                'title' => 'Transportas. Pervežimai. Pašto ryšiai',
                'code' => '656'
            ],[
                'id_first_level' => '11',
                'title' => 'Buhalterija.',
                'code' => '657'
            ],[
                'id_first_level' => '11',
                'title' => 'Verslo vadyba ir administravimas. Prekybos organizavimas',
                'code' => '658'
            ],[
                'id_first_level' => '12',
                'title' => 'Procesai, sąlygos ir gamybos procesų, įrengimų ir įrenginių charakteristikos. Cheminė inžinerija',
                'code' => '66'
            ],[
                'id_first_level' => '12',
                'title' => 'Cheminės medžiagos',
                'code' => '661'
            ],[
                'id_first_level' => '12',
                'title' => 'Sprogstamosios medžiagos. Kuras',
                'code' => '662'
            ],[
                'id_first_level' => '12',
                'title' => 'Techninė mikrobiologija. Techninė mikologija. Mielių, fermentų gamyba. Gėrimų gamyba. Prieskonių gamyba',
                'code' => '663'
            ],[
                'id_first_level' => '12',
                'title' => 'Maisto produktų gamyba ir konservavimas',
                'code' => '664'
            ],[
                'id_first_level' => '12',
                'title' => 'Aliejai. Riebalai. Vaškai. Lipalai. Dervos. Sakai',
                'code' => '665'
            ],[
                'id_first_level' => '12',
                'title' => 'Stiklo pramonė. Keramika. Cementas ir betonas',
                'code' => '666'
            ],[
                'id_first_level' => '12',
                'title' => 'Dažų gamyba',
                'code' => '667'
            ],[
                'id_first_level' => '12',
                'title' => 'Metalurgija',
                'code' => '669'
            ],[
                'id_first_level' => '13',
                'title' => 'Individuali gamyba. Amatininkystė.',
                'code' => '67'
            ],[
                'id_first_level' => '13',
                'title' => 'Tauriųjų metalų, brangakmenių dirbinių gamyba',
                'code' => '671'
            ],[
                'id_first_level' => '13',
                'title' => 'Geležies, ketaus ir plieno dirbiniai',
                'code' => '672'
            ],[
                'id_first_level' => '13',
                'title' => 'Spalvotųjų metalų dirbiniai (išskyrus tauriuosius metalus)',
                'code' => '673'
            ],[
                'id_first_level' => '13',
                'title' => 'Medžio apdirbimas',
                'code' => '674'
            ],[
                'id_first_level' => '13',
                'title' => 'Odos gamyba (įskaitant kailių ir dirbtinių odų )',
                'code' => '675'
            ],[
                'id_first_level' => '13',
                'title' => 'Celiuliozės, popieriaus ir kartono gamyba',
                'code' => '676'
            ],[
                'id_first_level' => '13',
                'title' => 'Tekstilės gamyba',
                'code' => '677'
            ],[
                'id_first_level' => '13',
                'title' => 'Stambiamolėkulinių medžiagų pramonė. Gumos pramonė. Plastikai',
                'code' => '678'
            ],[
                'id_first_level' => '13',
                'title' => 'Įvairių natūralių medžiagų, tinkančių apdirbti, technologija',
                'code' => '679'
            ],[
                'id_first_level' => '13',
                'title' => 'Tikslieji mechanizmai ir prietaisai',
                'code' => '681'
            ],[
                'id_first_level' => '13',
                'title' => 'Kalvystė. Kaustimas. Kalvystės dirbinių gamyba',
                'code' => '682'
            ],[
                'id_first_level' => '13',
                'title' => 'Geležies dirbiniai. Lengvųjų metalų dirbiniai. Šaltkalvystė. Butelių gamyba. Šviestuvai. Šildymo įrenginiai',
                'code' => '683'
            ],[
                'id_first_level' => '13',
                'title' => 'Baldų gamyba. Apmušalai',
                'code' => '684'
            ],[
                'id_first_level' => '13',
                'title' => 'Balnų gamyba. Avalynės gamyba. Pirštinių gamyba. Kelionės, sporto ir žaidimų reikmenų gamyba',
                'code' => '685'
            ],[
                'id_first_level' => '13',
                'title' => 'Knygų įrišimas. Metalizacija. Veidrodžių gamyba. Raštinės reikmenys',
                'code' => '686'
            ],[
                'id_first_level' => '13',
                'title' => 'Siuvimo pramonė. Drabužių gamyba. Drabužių reikmenys. Kosmetologija',
                'code' => '687'
            ],[
                'id_first_level' => '13',
                'title' => 'Galanterijos ir žaislų gamyba. Dekoratyvieji dirbiniai',
                'code' => '688'
            ],[
                'id_first_level' => '13',
                'title' => 'Rankdarbiai. Techniniai ir kiti mėgėjiški rankų darbai.',
                'code' => '689'
            ],[
                'id_first_level' => '14',
                'title' => 'Pastatai ir statinių dalys iš įvairių medžiagų. Įvairių dydžių, išdėstymo, formos pastatai ir statiniai',
                'code' => '69'
            ],[
                'id_first_level' => '14',
                'title' => 'Statybinės medžiagos ir gaminiai',
                'code' => '691'
            ],[
                'id_first_level' => '14',
                'title' => 'Statinių dalys ir pastatų elementai',
                'code' => '692'
            ],[
                'id_first_level' => '14',
                'title' => 'Mūro ir panašūs statybos darbai.',
                'code' => '693'
            ],[
                'id_first_level' => '14',
                'title' => 'Medinių statinių statyba. Dailidystė . Stalių darbai',
                'code' => '694'
            ],[
                'id_first_level' => '14',
                'title' => 'Sanitarinė techninė pastatų įranga (sanitariniai, dujų, garo įrenginiai, elektros instaliacija). Vidaus vandens ir kanalizacijos vamzdynas. Metalo darbai. Vamzdžių montavimas. Elektros įranga ir kiti darbai',
                'code' => '696'
            ],[
                'id_first_level' => '14',
                'title' => 'Pastatų šildymas, ventiliacija ir oro kondicionavimas',
                'code' => '697'
            ],[
                'id_first_level' => '14',
                'title' => 'Apdailos darbai',
                'code' => '698'
            ],[
                'id_first_level' => '14',
                'title' => 'Pastatų, statinių, konstrukcijų apsauga. Apsaugos priemonės',
                'code' => '699'
            ],[
                'id_first_level' => '15',
                'title' => 'Bendroji meno teorija. Estetika. Meno filosofija. Meninis skonis',
                'code' => '7.01'
            ],[
                'id_first_level' => '15',
                'title' => 'Meno technika. Meistriškumas',
                'code' => '7.02'
            ],[
                'id_first_level' => '15',
                'title' => 'Meno istorija. Kūrybiniai metodai. Laikotarpis, stiliai, mokyklos',
                'code' => '7.03'
            ],[
                'id_first_level' => '15',
                'title' => 'Meno objektai ir temos. Ikonografija. Dekoravimas. Ornamentas',
                'code' => '7.04'
            ],[
                'id_first_level' => '15',
                'title' => 'Meno pritaikymas (pramonėje, versle, buityje). Pramoninis, komercinis dizainas',
                'code' => '7.05'
            ],[
                'id_first_level' => '15',
                'title' => 'Įvairūs meno klausimai',
                'code' => '7.06'
            ],[
                'id_first_level' => '15',
                'title' => 'Meninės veiklos rūšys. Meno veikėjai',
                'code' => '7.07'
            ],[
                'id_first_level' => '15',
                'title' => 'Formų ir žanrų ypatumai mene',
                'code' => '7.08'
            ],[
                'id_first_level' => '15',
                'title' => 'Atlikimas. Konkursai',
                'code' => '7.09'
            ],[
                'id_first_level' => '15',
                'title' => 'Rajonų planavimas. Urbanistika. Landšafto formavimas',
                'code' => '71'
            ],[
                'id_first_level' => '15',
                'title' => 'Architektūra',
                'code' => '72'
            ],[
                'id_first_level' => '15',
                'title' => 'Plastiniai menai',
                'code' => '73'
            ],[
                'id_first_level' => '15',
                'title' => 'Piešimas ir braižyba. Taikomoji dekoratyvinė dailė. Dizainas',
                'code' => '74'
            ],[
                'id_first_level' => '15',
                'title' => 'Tapyba',
                'code' => '75'
            ],[
                'id_first_level' => '15',
                'title' => 'Grafika. Graviūra',
                'code' => '76'
            ],[
                'id_first_level' => '15',
                'title' => 'Fotografija ir panašūs procesai',
                'code' => '77'
            ],[
                'id_first_level' => '15',
                'title' => 'Muzika',
                'code' => '78'
            ],[
                'id_first_level' => '15',
                'title' => 'Reginiai (žiūrovinis menas). Masinės pramogos. Žaidimai. Sportas',
                'code' => '79'
            ],[
                'id_first_level' => '16',
                'title' => 'Lingvistikos ir filologijos bendrieji klausimai',
                'code' => '80'
            ],[
                'id_first_level' => '16',
                'title' => 'Lingvistika',
                'code' => '81'
            ],[
                'id_first_level' => '16',
                'title' => 'Kalbos',
                'code' => '811'
            ],[
                'id_first_level' => '16',
                'title' => 'Literatūros teorija ir kritika. Literatūros žanrai',
                'code' => '82'
            ],[
                'id_first_level' => '16',
                'title' => 'Atskirų tautų literatūra',
                'code' => '821'
            ],[
                'id_first_level' => '17',
                'title' => 'Geografijos mokslas. Kelionės.',
                'code' => '910'
            ],[
                'id_first_level' => '17',
                'title' => 'Bendroji geografija. Sistematinė geografija. Teorinė geografija',
                'code' => '911'
            ],[
                'id_first_level' => '17',
                'title' => 'Neliteratūrinis, netekstinis regiono vaizdavimas. Žemėlapiai. Atlasai. Gaubliai ir kt.',
                'code' => '912'
            ],[
                'id_first_level' => '17',
                'title' => 'Regioninė geografija.',
                'code' => '913'
            ],[
                'id_first_level' => '18',
                'title' => 'Archeologija',
                'code' => '902'
            ],[
                'id_first_level' => '18',
                'title' => 'Priešistorija. Priešistoriniai radiniai. Artefaktai. Antika.',
                'code' => '903'
            ],[
                'id_first_level' => '18',
                'title' => 'Istorijos paminklai',
                'code' => '904'
            ],[
                'id_first_level' => '18',
                'title' => 'Kraštotyra. Vietovių tyrinėjimai',
                'code' => '908'
            ],[
                'id_first_level' => '18',
                'title' => 'Biografijos. Biografiniai tyrimai.',
                'code' => '929'
            ],[
                'id_first_level' => '18',
                'title' => 'Istorija',
                'code' => '93'
            ],[
                'id_first_level' => '18',
                'title' => 'Pasaulio istorija',
                'code' => '94(100)'
            ],[
                'id_first_level' => '18',
                'title' => 'Europos istorija',
                'code' => '94(4)'
            ],[
                'id_first_level' => '18',
                'title' => 'Artimųjų Rytų istorija. Azijos šalių istorija.',
                'code' => '94(5)'
            ],[
                'id_first_level' => '18',
                'title' => 'Afrikos istorija',
                'code' => '94(6)'
            ],[
                'id_first_level' => '18',
                'title' => 'Šiaurės ir Centrinės Amerikos istorija',
                'code' => '94(7)'
            ],[
                'id_first_level' => '18',
                'title' => 'Pietų Amerikos istorija',
                'code' => '94(8)'
            ],[
                'id_first_level' => '18',
                'title' => 'Okeanijos, Poliarinių regionų, Australijos žemyno ir kt. istorija',
                'code' => '94(9)'
            ],[
                'id_first_level' => '19',
                'title' => 'Afganistanas',
                'code' => '(581)'
            ],[
                'id_first_level' => '19',
                'title' => 'Afrika',
                'code' => '(6)'
            ],[
                'id_first_level' => '19',
                'title' => 'Albanija',
                'code' => '(496.5)'
            ],[
                'id_first_level' => '19',
                'title' => 'Anglija ir Didžioji Britanija',
                'code' => '(420)'
            ],[
                'id_first_level' => '19',
                'title' => 'Arabijos pusiasalis',
                'code' => '(53)'
            ],[
                'id_first_level' => '19',
                'title' => 'Artimieji Rytai. Azija.',
                'code' => '(5)'
            ],[
                'id_first_level' => '19',
                'title' => 'Balkanų pusiasalis',
                'code' => '(497)'
            ],[
                'id_first_level' => '19',
                'title' => 'Baltarusija',
                'code' => '(476)'
            ],[
                'id_first_level' => '19',
                'title' => 'Belgija',
                'code' => '(493)'
            ],[
                'id_first_level' => '19',
                'title' => 'Britų salos',
                'code' => '(41)'
            ],[
                'id_first_level' => '19',
                'title' => 'Čekoslovakija. Čekija. Slovakija.',
                'code' => '(437)'
            ],[
                'id_first_level' => '19',
                'title' => 'Estija',
                'code' => '(474.2)'
            ],[
                'id_first_level' => '19',
                'title' => 'Graikija',
                'code' => '(495)'
            ],[
                'id_first_level' => '19',
                'title' => 'Indijos pusiasalis',
                'code' => '(54)'
            ],[
                'id_first_level' => '19',
                'title' => 'Irakas',
                'code' => '(567)'
            ],[
                'id_first_level' => '19',
                'title' => 'Iranas',
                'code' => '(55)'
            ],[
                'id_first_level' => '19',
                'title' => 'Islandija',
                'code' => '(491.1)'
            ],[
                'id_first_level' => '19',
                'title' => 'Ispanija',
                'code' => '(460)'
            ],[
                'id_first_level' => '19',
                'title' => 'Italija',
                'code' => '(450)'
            ],[
                'id_first_level' => '19',
                'title' => 'Japonija',
                'code' => '(520)'
            ],[
                'id_first_level' => '19',
                'title' => 'Jungtinės Amerikos Valstijos',
                'code' => '(73)'
            ],[
                'id_first_level' => '19',
                'title' => 'Kanada',
                'code' => '(71)'
            ],[
                'id_first_level' => '19',
                'title' => 'Kaukazo tautos',
                'code' => '(479)'
            ],[
                'id_first_level' => '19',
                'title' => 'Kazachstanas',
                'code' => '(571)'
            ],[
                'id_first_level' => '19',
                'title' => 'Kinija',
                'code' => '(510)'
            ],[
                'id_first_level' => '19',
                'title' => 'Kipras',
                'code' => '(564.3)'
            ],[
                'id_first_level' => '19',
                'title' => 'Latvija',
                'code' => '(474.3)'
            ],[
                'id_first_level' => '19',
                'title' => 'Lenkija',
                'code' => '(438)'
            ],[
                'id_first_level' => '19',
                'title' => 'Libanas',
                'code' => '(569.3)'
            ],[
                'id_first_level' => '19',
                'title' => 'Lietuva',
                'code' => '(474.5)'
            ],[
                'id_first_level' => '19',
                'title' => 'Meksika',
                'code' => '(72)'
            ],[
                'id_first_level' => '19',
                'title' => 'Mongolija',
                'code' => '(517)'
            ],[
                'id_first_level' => '19',
                'title' => 'Niderlandai',
                'code' => '(492)'
            ],[
                'id_first_level' => '19',
                'title' => 'Okeanija, Poliariniai regionai, Australijos žemynas',
                'code' => '(9)'
            ],[
                'id_first_level' => '19',
                'title' => 'Palestina ir Izraelis',
                'code' => '(569.4)'
            ],[
                'id_first_level' => '19',
                'title' => 'Pietryčių Azija',
                'code' => '(59)'
            ],[
                'id_first_level' => '19',
                'title' => 'Pietų Amerika',
                'code' => '(8)'
            ],[
                'id_first_level' => '19',
                'title' => 'Pietų Korėja',
                'code' => '(519.5)'
            ],[
                'id_first_level' => '19',
                'title' => 'Portugalija',
                'code' => '(469)'
            ],[
                'id_first_level' => '19',
                'title' => 'Prancūzija',
                'code' => '(44)'
            ],[
                'id_first_level' => '19',
                'title' => 'Rumunija',
                'code' => '(498)'
            ],[
                'id_first_level' => '19',
                'title' => 'Sirija',
                'code' => '(569.1)'
            ],[
                'id_first_level' => '19',
                'title' => 'Skandinavijos pusiasalis',
                'code' => '(48)'
            ],[
                'id_first_level' => '19',
                'title' => 'Šiaurės ir Centrinė Amerika',
                'code' => '(7)'
            ],[
                'id_first_level' => '19',
                'title' => 'Šiaurės Korėja',
                'code' => '(519.3)'
            ],[
                'id_first_level' => '19',
                'title' => 'Šveicarija',
                'code' => '(494)'
            ],[
                'id_first_level' => '19',
                'title' => 'Taivanis',
                'code' => '(529)'
            ],[
                'id_first_level' => '19',
                'title' => 'Turkija',
                'code' => '(560)'
            ],[
                'id_first_level' => '19',
                'title' => 'Ukraina',
                'code' => '(477)'
            ],[
                'id_first_level' => '19',
                'title' => 'Vengrija ',
                'code' => '(439)'
            ],[
                'id_first_level' => '19',
                'title' => 'Vokietija',
                'code' => '(430)'
            ]
        ]);
    }
}

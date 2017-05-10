<?php

use Illuminate\Database\Seeder;

class UDKfirstLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('udk_first_level')->insert([
            [
                'title' => 'Bendrieji mokslo ir kultūros dalykai',
                'code' => '0'
            ],[
                'title' => 'Filosofija. Psichologija. Logika. Etika',
                'code' => '1'
            ],[
                'title' => 'Religija. Teologija',
                'code' => '2'
            ],[
                'title' => 'Socialiniai mokslai',
                'code' => '3'
            ],[
                'title' => 'Teisė. Jurisprudencija',
                'code' => '34'
            ],[
                'title' => 'Matematika ir gamtos mokslai',
                'code' => '5'
            ],[
                'title' => 'Medicina',
                'code' => '61'
            ],[
                'title' => 'Inžinerija. Technologija',
                'code' => '62'
            ],[
                'title' => 'Žemės ūkis ir susijusios sritys. Miškų ūkis. Ūkininkavimas. Laukinės gamtos naudojimas.',
                'code' => '63'
            ],[
                'title' => 'Namų ūkio ekonomika. Namų ūkis. Namų ruoša.',
                'code' => '64'
            ],[
                'title' => 'Teleryšiai. Leidyba. Knygų prekyba. Buhalterija. Verslas. Ryšiai su visuomene',
                'code' => '65'
            ],[
                'title' => 'Chemijos technologija. Chemijos pramonė',
                'code' => '66'
            ],[
                'title' => 'Gaminiai. Dirbiniai. Smulkioji gamyba. Amatai',
                'code' => '67'
            ],[
                'title' => 'Statyba. Statybinės medžiagos. Statybos darbai. Statybos technologija',
                'code' => '69'
            ],[
                'title' => 'Menai. Pramogos. Sportas',
                'code' => '7'
            ],[
                'title' => 'Kalba. Lingvistika. Literatūra',
                'code' => '8'
            ],[
                'title' => 'Geografija. Atskirų šalių žemių tyrimas. Kelionės. Regioninė geografija',
                'code' => '91'
            ],[
                'title' => 'Archeologija. Biografijos. Istorija.',
                'code' => '9'
            ],[
                'title' => 'Pagalbiniai geografiniai rodikliai',
                'code' => '(...)'
            ]
        ]);
    }
}

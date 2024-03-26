<?php
namespace App\Database\Seeds;

use App\Models\Language;
use App\Database\Factories\LanguageFactory;
use Illuminate\Database\Seeder;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $languages = array(array("name"=>"Afrikaans","iso"=>"af","layout"=>"ltr","status"=>"inactive",),array("name"=>"Aghem","iso"=>"agq","layout"=>"ltr","status"=>"inactive",),array("name"=>"Akan","iso"=>"ak","layout"=>"ltr","status"=>"inactive",),array("name"=>"Albanian","iso"=>"sq","layout"=>"ltr","status"=>"inactive",),array("name"=>"Amharic","iso"=>"am","layout"=>"ltr","status"=>"inactive",),array("name"=>"Arabic","iso"=>"ar","layout"=>"ltr","status"=>"inactive",),array("name"=>"Armenian","iso"=>"hy","layout"=>"ltr","status"=>"inactive",),array("name"=>"Assamese","iso"=>"as","layout"=>"ltr","status"=>"inactive",),array("name"=>"Asturian","iso"=>"ast","layout"=>"ltr","status"=>"inactive",),array("name"=>"Asu","iso"=>"asa","layout"=>"ltr","status"=>"inactive",),array("name"=>"Azerbaijani","iso"=>"az","layout"=>"ltr","status"=>"inactive",),array("name"=>"Bafia","iso"=>"ksf","layout"=>"ltr","status"=>"inactive",),array("name"=>"Bambara","iso"=>"bm","layout"=>"ltr","status"=>"inactive",),array("name"=>"Bangla","iso"=>"bn","layout"=>"ltr","status"=>"inactive",),array("name"=>"Basaa","iso"=>"bas","layout"=>"ltr","status"=>"inactive",),array("name"=>"Basque","iso"=>"eu","layout"=>"ltr","status"=>"inactive",),array("name"=>"Belarusian","iso"=>"be","layout"=>"ltr","status"=>"inactive",),array("name"=>"Bemba","iso"=>"bem","layout"=>"ltr","status"=>"inactive",),array("name"=>"Bena","iso"=>"bez","layout"=>"ltr","status"=>"inactive",),array("name"=>"Bodo","iso"=>"brx","layout"=>"ltr","status"=>"inactive",),array("name"=>"Bosnian","iso"=>"bs","layout"=>"ltr","status"=>"inactive",),array("name"=>"Breton","iso"=>"br","layout"=>"ltr","status"=>"inactive",),array("name"=>"Bulgarian","iso"=>"bg","layout"=>"ltr","status"=>"inactive",),array("name"=>"Burmese","iso"=>"my","layout"=>"ltr","status"=>"inactive",),array("name"=>"Cantonese","iso"=>"yue","layout"=>"ltr","status"=>"inactive",),array("name"=>"Catalan","iso"=>"ca","layout"=>"ltr","status"=>"inactive",),array("name"=>"Central Atlas Tamazight","iso"=>"tzm","layout"=>"ltr","status"=>"inactive",),array("name"=>"Central Kurdish","iso"=>"ckb","layout"=>"ltr","status"=>"inactive",),array("name"=>"Chakma","iso"=>"ccp","layout"=>"ltr","status"=>"inactive",),array("name"=>"Chechen","iso"=>"ce","layout"=>"ltr","status"=>"inactive",),array("name"=>"Cherokee","iso"=>"chr","layout"=>"ltr","status"=>"inactive",),array("name"=>"Chiga","iso"=>"cgg","layout"=>"ltr","status"=>"inactive",),array("name"=>"Chinese","iso"=>"zh","layout"=>"ltr","status"=>"inactive",),array("name"=>"Colognian","iso"=>"ksh","layout"=>"ltr","status"=>"inactive",),array("name"=>"Cornish","iso"=>"kw","layout"=>"ltr","status"=>"inactive",),array("name"=>"Croatian","iso"=>"hr","layout"=>"ltr","status"=>"inactive",),array("name"=>"Czech","iso"=>"cs","layout"=>"ltr","status"=>"inactive",),array("name"=>"Danish","iso"=>"da","layout"=>"ltr","status"=>"inactive",),array("name"=>"Duala","iso"=>"dua","layout"=>"ltr","status"=>"inactive",),array("name"=>"Dutch","iso"=>"nl","layout"=>"ltr","status"=>"inactive",),array("name"=>"Dzongkha","iso"=>"dz","layout"=>"ltr","status"=>"inactive",),array("name"=>"Embu","iso"=>"ebu","layout"=>"ltr","status"=>"inactive",),array("name"=>"English","iso"=>"en","layout"=>"ltr","status"=>"active",),array("name"=>"Esperanto","iso"=>"eo","layout"=>"ltr","status"=>"inactive",),array("name"=>"Estonian","iso"=>"et","layout"=>"ltr","status"=>"inactive",),array("name"=>"Ewe","iso"=>"ee","layout"=>"ltr","status"=>"inactive",),array("name"=>"Ewondo","iso"=>"ewo","layout"=>"ltr","status"=>"inactive",),array("name"=>"Faroese","iso"=>"fo","layout"=>"ltr","status"=>"inactive",),array("name"=>"Filipino","iso"=>"fil","layout"=>"ltr","status"=>"inactive",),array("name"=>"Finnish","iso"=>"fi","layout"=>"ltr","status"=>"inactive",),array("name"=>"French","iso"=>"fr","layout"=>"ltr","status"=>"inactive",),array("name"=>"Friulian","iso"=>"fur","layout"=>"ltr","status"=>"inactive",),array("name"=>"Fulah","iso"=>"ff","layout"=>"ltr","status"=>"inactive",),array("name"=>"Galician","iso"=>"gl","layout"=>"ltr","status"=>"inactive",),array("name"=>"Ganda","iso"=>"lg","layout"=>"ltr","status"=>"inactive",),array("name"=>"Georgian","iso"=>"ka","layout"=>"ltr","status"=>"inactive",),array("name"=>"German","iso"=>"de","layout"=>"ltr","status"=>"inactive",),array("name"=>"Greek","iso"=>"el","layout"=>"ltr","status"=>"inactive",),array("name"=>"Gujarati","iso"=>"gu","layout"=>"ltr","status"=>"inactive",),array("name"=>"Gusii","iso"=>"guz","layout"=>"ltr","status"=>"inactive",),array("name"=>"Hausa","iso"=>"ha","layout"=>"ltr","status"=>"inactive",),array("name"=>"Hawaiian","iso"=>"haw","layout"=>"ltr","status"=>"inactive",),array("name"=>"Hebrew","iso"=>"he","layout"=>"ltr","status"=>"inactive",),array("name"=>"Hindi","iso"=>"hi","layout"=>"ltr","status"=>"inactive",),array("name"=>"Hungarian","iso"=>"hu","layout"=>"ltr","status"=>"inactive",),array("name"=>"Icelandic","iso"=>"is","layout"=>"ltr","status"=>"inactive",),array("name"=>"Igbo","iso"=>"ig","layout"=>"ltr","status"=>"inactive",),array("name"=>"Inari Sami","iso"=>"smn","layout"=>"ltr","status"=>"inactive",),array("name"=>"Indonesian","iso"=>"id","layout"=>"ltr","status"=>"inactive",),array("name"=>"Irish","iso"=>"ga","layout"=>"ltr","status"=>"inactive",),array("name"=>"Italian","iso"=>"it","layout"=>"ltr","status"=>"inactive",),array("name"=>"Japanese","iso"=>"ja","layout"=>"ltr","status"=>"inactive",),array("name"=>"Jola-Fonyi","iso"=>"dyo","layout"=>"ltr","status"=>"inactive",),array("name"=>"Kabuverdianu","iso"=>"kea","layout"=>"ltr","status"=>"inactive",),array("name"=>"Kabyle","iso"=>"kab","layout"=>"ltr","status"=>"inactive",),array("name"=>"Kako","iso"=>"kkj","layout"=>"ltr","status"=>"inactive",),array("name"=>"Kalaallisut","iso"=>"kl","layout"=>"ltr","status"=>"inactive",),array("name"=>"Kalenjin","iso"=>"kln","layout"=>"ltr","status"=>"inactive",),array("name"=>"Kamba","iso"=>"kam","layout"=>"ltr","status"=>"inactive",),array("name"=>"Kannada","iso"=>"kn","layout"=>"ltr","status"=>"inactive",),array("name"=>"Kashmiri","iso"=>"ks","layout"=>"ltr","status"=>"inactive",),array("name"=>"Kazakh","iso"=>"kk","layout"=>"ltr","status"=>"inactive",),array("name"=>"Khmer","iso"=>"km","layout"=>"ltr","status"=>"inactive",),array("name"=>"Kikuyu","iso"=>"ki","layout"=>"ltr","status"=>"inactive",),array("name"=>"Kinyarwanda","iso"=>"rw","layout"=>"ltr","status"=>"inactive",),array("name"=>"Konkani","iso"=>"kok","layout"=>"ltr","status"=>"inactive",),array("name"=>"Korean","iso"=>"ko","layout"=>"ltr","status"=>"inactive",),array("name"=>"Koyra Chiini","iso"=>"khq","layout"=>"ltr","status"=>"inactive",),array("name"=>"Koyraboro Senni","iso"=>"ses","layout"=>"ltr","status"=>"inactive",),array("name"=>"Kwasio","iso"=>"nmg","layout"=>"ltr","status"=>"inactive",),array("name"=>"Kyrgyz","iso"=>"ky","layout"=>"ltr","status"=>"inactive",),array("name"=>"Lakota","iso"=>"lkt","layout"=>"ltr","status"=>"inactive",),array("name"=>"Langi","iso"=>"lag","layout"=>"ltr","status"=>"inactive",),array("name"=>"Lao","iso"=>"lo","layout"=>"ltr","status"=>"inactive",),array("name"=>"Latvian","iso"=>"lv","layout"=>"ltr","status"=>"inactive",),array("name"=>"Lingala","iso"=>"ln","layout"=>"ltr","status"=>"inactive",),array("name"=>"Lithuanian","iso"=>"lt","layout"=>"ltr","status"=>"inactive",),array("name"=>"Low German","iso"=>"nds","layout"=>"ltr","status"=>"inactive",),array("name"=>"Lower Sorbian","iso"=>"dsb","layout"=>"ltr","status"=>"inactive",),array("name"=>"Luba-Katanga","iso"=>"lu","layout"=>"ltr","status"=>"inactive",),array("name"=>"Luo","iso"=>"luo","layout"=>"ltr","status"=>"inactive",),array("name"=>"Luxembourgish","iso"=>"lb","layout"=>"ltr","status"=>"inactive",),array("name"=>"Luyia","iso"=>"luy","layout"=>"ltr","status"=>"inactive",),array("name"=>"Macedonian","iso"=>"mk","layout"=>"ltr","status"=>"inactive",),array("name"=>"Machame","iso"=>"jmc","layout"=>"ltr","status"=>"inactive",),array("name"=>"Makhuwa-Meetto","iso"=>"mgh","layout"=>"ltr","status"=>"inactive",),array("name"=>"Makonde","iso"=>"kde","layout"=>"ltr","status"=>"inactive",),array("name"=>"Malagasy","iso"=>"mg","layout"=>"ltr","status"=>"inactive",),array("name"=>"Malay","iso"=>"ms","layout"=>"ltr","status"=>"inactive",),array("name"=>"Malayalam","iso"=>"ml","layout"=>"ltr","status"=>"inactive",),array("name"=>"Maltese","iso"=>"mt","layout"=>"ltr","status"=>"inactive",),array("name"=>"Manx","iso"=>"gv","layout"=>"ltr","status"=>"inactive",),array("name"=>"Marathi","iso"=>"mr","layout"=>"ltr","status"=>"inactive",),array("name"=>"Masai","iso"=>"mas","layout"=>"ltr","status"=>"inactive",),array("name"=>"Mazanderani","iso"=>"mzn","layout"=>"ltr","status"=>"inactive",),array("name"=>"Meru","iso"=>"mer","layout"=>"ltr","status"=>"inactive",),array("name"=>"Meta'","iso"=>"mgo","layout"=>"ltr","status"=>"inactive",),array("name"=>"Mongolian","iso"=>"mn","layout"=>"ltr","status"=>"inactive",),array("name"=>"Morisyen","iso"=>"mfe","layout"=>"ltr","status"=>"inactive",),array("name"=>"Mundang","iso"=>"mua","layout"=>"ltr","status"=>"inactive",),array("name"=>"Nama","iso"=>"naq","layout"=>"ltr","status"=>"inactive",),array("name"=>"Nepali","iso"=>"ne","layout"=>"ltr","status"=>"inactive",),array("name"=>"Ngiemboon","iso"=>"nnh","layout"=>"ltr","status"=>"inactive",),array("name"=>"Ngomba","iso"=>"jgo","layout"=>"ltr","status"=>"inactive",),array("name"=>"North Ndebele","iso"=>"nd","layout"=>"ltr","status"=>"inactive",),array("name"=>"Northern Luri","iso"=>"lrc","layout"=>"ltr","status"=>"inactive",),array("name"=>"Northern Sami","iso"=>"se","layout"=>"ltr","status"=>"inactive",),array("name"=>"Norwegian Bokmål","iso"=>"nb","layout"=>"ltr","status"=>"inactive",),array("name"=>"Norwegian Nynorsk","iso"=>"nn","layout"=>"ltr","status"=>"inactive",),array("name"=>"Nuer","iso"=>"nus","layout"=>"ltr","status"=>"inactive",),array("name"=>"Nyankole","iso"=>"nyn","layout"=>"ltr","status"=>"inactive",),array("name"=>"Odia","iso"=>"or","layout"=>"ltr","status"=>"inactive",),array("name"=>"Oromo","iso"=>"om","layout"=>"ltr","status"=>"inactive",),array("name"=>"Ossetic","iso"=>"os","layout"=>"ltr","status"=>"inactive",),array("name"=>"Pashto","iso"=>"ps","layout"=>"ltr","status"=>"inactive",),array("name"=>"Persian","iso"=>"fa","layout"=>"ltr","status"=>"inactive",),array("name"=>"Polish","iso"=>"pl","layout"=>"ltr","status"=>"inactive",),array("name"=>"Portuguese","iso"=>"pt","layout"=>"ltr","status"=>"inactive",),array("name"=>"Punjabi","iso"=>"pa","layout"=>"ltr","status"=>"inactive",),array("name"=>"Quechua","iso"=>"qu","layout"=>"ltr","status"=>"inactive",),array("name"=>"Romanian","iso"=>"ro","layout"=>"ltr","status"=>"inactive",),array("name"=>"Romansh","iso"=>"rm","layout"=>"ltr","status"=>"inactive",),array("name"=>"Rombo","iso"=>"rof","layout"=>"ltr","status"=>"inactive",),array("name"=>"Rundi","iso"=>"rn","layout"=>"ltr","status"=>"inactive",),array("name"=>"Russian","iso"=>"ru","layout"=>"ltr","status"=>"inactive",),array("name"=>"Rwa","iso"=>"rwk","layout"=>"ltr","status"=>"inactive",),array("name"=>"Sakha","iso"=>"sah","layout"=>"ltr","status"=>"inactive",),array("name"=>"Samburu","iso"=>"saq","layout"=>"ltr","status"=>"inactive",),array("name"=>"Sango","iso"=>"sg","layout"=>"ltr","status"=>"inactive",),array("name"=>"Sangu","iso"=>"sbp","layout"=>"ltr","status"=>"inactive",),array("name"=>"Scottish Gaelic","iso"=>"gd","layout"=>"ltr","status"=>"inactive",),array("name"=>"Sena","iso"=>"seh","layout"=>"ltr","status"=>"inactive",),array("name"=>"Serbian","iso"=>"sr","layout"=>"ltr","status"=>"inactive",),array("name"=>"Shambala","iso"=>"ksb","layout"=>"ltr","status"=>"inactive",),array("name"=>"Shona","iso"=>"sn","layout"=>"ltr","status"=>"inactive",),array("name"=>"Sichuan Yi","iso"=>"ii","layout"=>"ltr","status"=>"inactive",),array("name"=>"Sinhala","iso"=>"si","layout"=>"ltr","status"=>"inactive",),array("name"=>"Slovak","iso"=>"sk","layout"=>"ltr","status"=>"inactive",),array("name"=>"Slovenian","iso"=>"sl","layout"=>"ltr","status"=>"inactive",),array("name"=>"Soga","iso"=>"xog","layout"=>"ltr","status"=>"inactive",),array("name"=>"Somali","iso"=>"so","layout"=>"ltr","status"=>"inactive",),array("name"=>"Spanish","iso"=>"es","layout"=>"ltr","status"=>"inactive",),array("name"=>"Standard Moroccan Tamazight","iso"=>"zgh","layout"=>"ltr","status"=>"inactive",),array("name"=>"Swahili","iso"=>"sw","layout"=>"ltr","status"=>"inactive",),array("name"=>"Swedish","iso"=>"sv","layout"=>"ltr","status"=>"inactive",),array("name"=>"Swiss German","iso"=>"gsw","layout"=>"ltr","status"=>"inactive",),array("name"=>"Tachelhit","iso"=>"shi","layout"=>"ltr","status"=>"inactive",),array("name"=>"Taita","iso"=>"dav","layout"=>"ltr","status"=>"inactive",),array("name"=>"Tajik","iso"=>"tg","layout"=>"ltr","status"=>"inactive",),array("name"=>"Tamil","iso"=>"ta","layout"=>"ltr","status"=>"inactive",),array("name"=>"Tasawaq","iso"=>"twq","layout"=>"ltr","status"=>"inactive",),array("name"=>"Tatar","iso"=>"tt","layout"=>"ltr","status"=>"inactive",),array("name"=>"Telugu","iso"=>"te","layout"=>"ltr","status"=>"inactive",),array("name"=>"Teso","iso"=>"teo","layout"=>"ltr","status"=>"inactive",),array("name"=>"Thai","iso"=>"th","layout"=>"ltr","status"=>"inactive",),array("name"=>"Tibetan","iso"=>"bo","layout"=>"ltr","status"=>"inactive",),array("name"=>"Tigrinya","iso"=>"ti","layout"=>"ltr","status"=>"inactive",),array("name"=>"Tongan","iso"=>"to","layout"=>"ltr","status"=>"inactive",),array("name"=>"Turkish","iso"=>"tr","layout"=>"ltr","status"=>"inactive",),array("name"=>"Ukrainian","iso"=>"uk","layout"=>"ltr","status"=>"inactive",),array("name"=>"Upper Sorbian","iso"=>"hsb","layout"=>"ltr","status"=>"inactive",),array("name"=>"Urdu","iso"=>"ur","layout"=>"ltr","status"=>"inactive",),array("name"=>"Uyghur","iso"=>"ug","layout"=>"ltr","status"=>"inactive",),array("name"=>"Uzbek","iso"=>"uz","layout"=>"ltr","status"=>"inactive",),array("name"=>"Vai","iso"=>"vai","layout"=>"ltr","status"=>"inactive",),array("name"=>"Vietnamese","iso"=>"vi","layout"=>"ltr","status"=>"inactive",),array("name"=>"Vunjo","iso"=>"vun","layout"=>"ltr","status"=>"inactive",),array("name"=>"Walser","iso"=>"wae","layout"=>"ltr","status"=>"inactive",),array("name"=>"Welsh","iso"=>"cy","layout"=>"ltr","status"=>"inactive",),array("name"=>"Western Frisian","iso"=>"fy","layout"=>"ltr","status"=>"inactive",),array("name"=>"Wolof","iso"=>"wo","layout"=>"ltr","status"=>"inactive",),array("name"=>"Yangben","iso"=>"yav","layout"=>"ltr","status"=>"inactive",),array("name"=>"Yiddish","iso"=>"yi","layout"=>"ltr","status"=>"inactive",),array("name"=>"Yoruba","iso"=>"yo","layout"=>"ltr","status"=>"inactive",),array("name"=>"Zarma","iso"=>"dje","layout"=>"ltr","status"=>"inactive",),array("name"=>"Zulu","iso"=>"zu","layout"=>"ltr","status"=>"inactive",),);
        
        foreach($languages as $language){
            Language::create($language);
        }
    }
}
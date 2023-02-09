<?php

namespace Modules\Zone\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class DairaTableSeeder extends Seeder
{
    private $dairas = [
        [

            'name_ar' => 'أدرار',
            'name_fr' => 'Adrar',
            'wilaya_id' => '01',
        ],
        [

            'name_ar' => 'أولف',
            'name_fr' => 'Aoulef',
            'wilaya_id' => '01',
        ],
        [

            'name_ar' => 'أوقروت',
            'name_fr' => 'Aougrout',
            'wilaya_id' => '49',
        ],
        [

            'name_ar' => 'برج باجي مختار',
            'name_fr' => 'Bordj Badji Mokhtar',
            'wilaya_id' => '50',
        ],
        [

            'name_ar' => 'شروين',
            'name_fr' => 'Charouine',
            'wilaya_id' => '49',
        ],
        [

            'name_ar' => 'فنوغيل',
            'name_fr' => 'Fenoughil',
            'wilaya_id' => '01',
        ],
        [

            'name_ar' => 'زاوية كنتة',
            'name_fr' => 'Zaouiat Kounta',
            'wilaya_id' => '01',
        ],
        [

            'name_ar' => 'تنركوك',
            'name_fr' => 'Tinerkouk',
            'wilaya_id' => '49',
        ],
        [

            'name_ar' => 'تيميمون',
            'name_fr' => 'Timimoun',
            'wilaya_id' => '49',
        ],
        [

            'name_ar' => 'رقان',
            'name_fr' => 'Reggane',
            'wilaya_id' => '01',
        ],
        [

            'name_ar' => 'تسابيت',
            'name_fr' => 'Tsabit',
            'wilaya_id' => '01',
        ],
        [

            'name_ar' => 'أبو الحسن',
            'name_fr' => 'Abou El Hassane',
            'wilaya_id' => '02',
        ],
        [

            'name_ar' => 'عين مران',
            'name_fr' => 'Ain Merane',
            'wilaya_id' => '02',
        ],
        [

            'name_ar' => 'الزبوجة',
            'name_fr' => 'Zeboudja',
            'wilaya_id' => '02',
        ],
        [

            'name_ar' => 'الكريمية',
            'name_fr' => 'El Karimia',
            'wilaya_id' => '02',
        ],
        [

            'name_ar' => 'بني حواء',
            'name_fr' => 'Beni Haoua',
            'wilaya_id' => '02',
        ],
        [

            'name_ar' => 'وادي الفضة',
            'name_fr' => 'Oued Fodda',
            'wilaya_id' => '02',
        ],
        [

            'name_ar' => 'بوقادير',
            'name_fr' => 'Boukadir',
            'wilaya_id' => '02',
        ],
        [

            'name_ar' => 'أولاد فارس',
            'name_fr' => 'Ouled Fares',
            'wilaya_id' => '02',
        ],
        [

            'name_ar' => 'الشلف',
            'name_fr' => 'Chlef',
            'wilaya_id' => '02',
        ],
        [

            'name_ar' => 'تاوقريت',
            'name_fr' => 'Taougrit',
            'wilaya_id' => '02',
        ],
        [

            'name_ar' => 'أولاد بن عبد القادر',
            'name_fr' => 'Ouled Ben Abdelkader',
            'wilaya_id' => '02',
        ],
        [

            'name_ar' => 'المرسى',
            'name_fr' => 'El Marsa',
            'wilaya_id' => '02',
        ],
        [

            'name_ar' => 'تنس',
            'name_fr' => 'Tenes',
            'wilaya_id' => '02',
        ],
        [

            'name_ar' => 'أفلو',
            'name_fr' => 'Aflou',
            'wilaya_id' => '03',
        ],
        [

            'name_ar' => 'عين ماضي',
            'name_fr' => 'Ain Madhi',
            'wilaya_id' => '03',
        ],
        [

            'name_ar' => 'قتلة سيدي سعيد',
            'name_fr' => 'Gueltat Sidi Saad',
            'wilaya_id' => '03',
        ],
        [

            'name_ar' => 'قصر الحيران',
            'name_fr' => 'Ksar El Hirane',
            'wilaya_id' => '03',
        ],
        [

            'name_ar' => 'بريدة',
            'name_fr' => 'Brida',
            'wilaya_id' => '03',
        ],
        [

            'name_ar' => 'سيدي مخلوف',
            'name_fr' => 'Sidi Makhlouf',
            'wilaya_id' => '03',
        ],
        [

            'name_ar' => 'الغيشة',
            'name_fr' => 'El Ghicha',
            'wilaya_id' => '03',
        ],
        [

            'name_ar' => 'حاسي الرمل',
            'name_fr' => "Hassi R'mel",
            'wilaya_id' => '03',
        ],
        [

            'name_ar' => 'الأغواط',
            'name_fr' => 'Laghouat',
            'wilaya_id' => '03',
        ],
        [

            'name_ar' => 'وادي مرة',
            'name_fr' => 'Oued Morra',
            'wilaya_id' => '03',
        ],
        [

            'name_ar' => 'عين ببوش',
            'name_fr' => 'Ain Babouche',
            'wilaya_id' => '04',
        ],
        [

            'name_ar' => 'عين البيضاء',
            'name_fr' => 'Ain Beida',
            'wilaya_id' => '04',
        ],
        [

            'name_ar' => 'عين فكرون',
            'name_fr' => 'Ain Fekroun',
            'wilaya_id' => '04',
        ],
        [

            'name_ar' => 'عين كرشة',
            'name_fr' => 'Ain Kercha',
            'wilaya_id' => '04',
        ],
        [

            'name_ar' => 'عين مليلة',
            'name_fr' => "Ain M'lila",
            'wilaya_id' => '04',
        ],
        [

            'name_ar' => 'أم البواقي',
            'name_fr' => 'Oum El Bouaghi',
            'wilaya_id' => '04',
        ],
        [

            'name_ar' => 'مسكيانة',
            'name_fr' => 'Meskiana',
            'wilaya_id' => '04',
        ],
        [

            'name_ar' => 'سوق نعمان',
            'name_fr' => 'Souk Naamane',
            'wilaya_id' => '04',
        ],
        [

            'name_ar' => 'الضلعة',
            'name_fr' => 'Dhalaa',
            'wilaya_id' => '04',
        ],
        [

            'name_ar' => 'سيقوس',
            'name_fr' => 'Sigus',
            'wilaya_id' => '04',
        ],
        [

            'name_ar' => 'فكيرينة',
            'name_fr' => "F'kirina",
            'wilaya_id' => '04',
        ],
        [

            'name_ar' => 'قصر الصباحي',
            'name_fr' => 'Ksar Sbahi',
            'wilaya_id' => '04',
        ],
        [

            'name_ar' => 'عين جاسر',
            'name_fr' => 'Ain Djasser',
            'wilaya_id' => '05',
        ],
        [

            'name_ar' => 'عين التوتة',
            'name_fr' => 'Ain Touta',
            'wilaya_id' => '05',
        ],
        [

            'name_ar' => 'المعذر',
            'name_fr' => 'El Madher',
            'wilaya_id' => '05',
        ],
        [

            'name_ar' => 'أريس',
            'name_fr' => 'Arris',
            'wilaya_id' => '05',
        ],
        [

            'name_ar' => 'الجزار',
            'name_fr' => 'Djezzar',
            'wilaya_id' => '05',
        ],
        [

            'name_ar' => 'بريكة',
            'name_fr' => 'Barika',
            'wilaya_id' => '05',
        ],
        [

            'name_ar' => 'باتنة',
            'name_fr' => 'Batna',
            'wilaya_id' => '05',
        ],
        [

            'name_ar' => 'الشمرة',
            'name_fr' => 'Chemora',
            'wilaya_id' => '05',
        ],
        [

            'name_ar' => 'نقاوس',
            'name_fr' => "N'gaous",
            'wilaya_id' => '05',
        ],
        [

            'name_ar' => 'بوزينة',
            'name_fr' => 'Bouzina',
            'wilaya_id' => '05',
        ],
        [

            'name_ar' => 'ثنية العابد',
            'name_fr' => 'Theniet El Abed',
            'wilaya_id' => '05',
        ],
        [

            'name_ar' => 'إشمول',
            'name_fr' => 'Ichemoul',
            'wilaya_id' => '05',
        ],
        [

            'name_ar' => 'تكوت',
            'name_fr' => 'Tkout',
            'wilaya_id' => '05',
        ],
        [

            'name_ar' => 'رأس العيون',
            'name_fr' => 'Ras El Aioun',
            'wilaya_id' => '05',
        ],
        [

            'name_ar' => 'مروانة',
            'name_fr' => 'Merouana',
            'wilaya_id' => '05',
        ],
        [

            'name_ar' => 'سريانة',
            'name_fr' => 'Seriana',
            'wilaya_id' => '05',
        ],
        [

            'name_ar' => 'أولاد سي سليمان',
            'name_fr' => 'Ouled Si Slimane',
            'wilaya_id' => '05',
        ],
        [

            'name_ar' => 'منعة',
            'name_fr' => 'Menaa',
            'wilaya_id' => '05',
        ],
        [

            'name_ar' => 'تيمقاد',
            'name_fr' => 'Timgad',
            'wilaya_id' => '05',
        ],
        [

            'name_ar' => 'تازولت',
            'name_fr' => 'Tazoult',
            'wilaya_id' => '05',
        ],
        [

            'name_ar' => 'سقانة',
            'name_fr' => 'Seggana',
            'wilaya_id' => '05',
        ],
        [

            'name_ar' => 'أدكار',
            'name_fr' => 'Adekar',
            'wilaya_id' => '06',
        ],
        [

            'name_ar' => 'إغيل علي',
            'name_fr' => 'Ighil Ali',
            'wilaya_id' => '06',
        ],
        [

            'name_ar' => 'درقينة',
            'name_fr' => 'Darguina',
            'wilaya_id' => '06',
        ],
        [

            'name_ar' => 'أقبو',
            'name_fr' => 'Akbou',
            'wilaya_id' => '06',
        ],
        [

            'name_ar' => 'شميني',
            'name_fr' => 'Chemini',
            'wilaya_id' => '06',
        ],
        [

            'name_ar' => 'صدوق',
            'name_fr' => 'Seddouk',
            'wilaya_id' => '06',
        ],
        [

            'name_ar' => 'أميزور',
            'name_fr' => 'Amizour',
            'wilaya_id' => '06',
        ],
        [

            'name_ar' => 'أوقاس',
            'name_fr' => 'Aokas',
            'wilaya_id' => '06',
        ],
        [

            'name_ar' => 'برباشة',
            'name_fr' => 'Barbacha',
            'wilaya_id' => '06',
        ],
        [

            'name_ar' => 'بجاية',
            'name_fr' => 'Bejaia',
            'wilaya_id' => '06',
        ],
        [

            'name_ar' => 'تازملت',
            'name_fr' => 'Tazmalt',
            'wilaya_id' => '06',
        ],
        [

            'name_ar' => 'بني معوش',
            'name_fr' => 'Beni Maouche',
            'wilaya_id' => '06',
        ],
        [

            'name_ar' => 'تيشي',
            'name_fr' => 'Tichy',
            'wilaya_id' => '06',
        ],
        [

            'name_ar' => 'خراطة',
            'name_fr' => 'Kherrata',
            'wilaya_id' => '06',
        ],
        [

            'name_ar' => 'سيدي عيش',
            'name_fr' => 'Sidi Aich',
            'wilaya_id' => '06',
        ],
        [

            'name_ar' => 'القصر',
            'name_fr' => 'El Kseur',
            'wilaya_id' => '06',
        ],
        [

            'name_ar' => 'إفري أوزلاقن',
            'name_fr' => 'Ifri Ouzellaguene',
            'wilaya_id' => '06',
        ],
        [

            'name_ar' => 'سوق الإثنين',
            'name_fr' => 'Souk El Tenine',
            'wilaya_id' => '06',
        ],
        [

            'name_ar' => 'تيمزريت',
            'name_fr' => 'Timezrit',
            'wilaya_id' => '06',
        ],
        [

            'name_ar' => 'سيدي عقبة',
            'name_fr' => 'Sidi Okba',
            'wilaya_id' => '07',
        ],
        [

            'name_ar' => 'القنطرة',
            'name_fr' => 'El Kantara',
            'wilaya_id' => '07',
        ],
        [

            'name_ar' => 'سيدي خالد',
            'name_fr' => 'Sidi Khaled',
            'wilaya_id' => '51',
        ],
        [

            'name_ar' => 'بسكرة',
            'name_fr' => 'Biskra',
            'wilaya_id' => '07',
        ],
        [

            'name_ar' => 'طولقة',
            'name_fr' => 'Tolga',
            'wilaya_id' => '07',
        ],
        [

            'name_ar' => 'جمورة',
            'name_fr' => 'Djemorah',
            'wilaya_id' => '07',
        ],
        [

            'name_ar' => 'أولاد جلال',
            'name_fr' => 'Ouled Djellal',
            'wilaya_id' => '51',
        ],
        [

            'name_ar' => 'زريبة الوادي',
            'name_fr' => 'Zeribet El Oued',
            'wilaya_id' => '07',
        ],
        [

            'name_ar' => 'فوغالة',
            'name_fr' => 'Foughala',
            'wilaya_id' => '07',
        ],
        [

            'name_ar' => 'الوطاية',
            'name_fr' => 'El Outaya',
            'wilaya_id' => '07',
        ],
        [

            'name_ar' => 'أورلال',
            'name_fr' => 'Ourlal',
            'wilaya_id' => '07',
        ],
        [

            'name_ar' => 'مشونش',
            'name_fr' => 'Mechouneche',
            'wilaya_id' => '07',
        ],
        [

            'name_ar' => 'العبادلة',
            'name_fr' => 'Abadla',
            'wilaya_id' => '08',
        ],
        [

            'name_ar' => 'بشار',
            'name_fr' => 'Bechar',
            'wilaya_id' => '08',
        ],
        [

            'name_ar' => 'بني عباس',
            'name_fr' => 'Beni Abbes',
            'wilaya_id' => '52',
        ],
        [

            'name_ar' => 'كرزاز',
            'name_fr' => 'Kerzaz',
            'wilaya_id' => '52',
        ],
        [

            'name_ar' => 'بني ونيف',
            'name_fr' => 'Beni Ounif',
            'wilaya_id' => '08',
        ],
        [

            'name_ar' => 'لحمر',
            'name_fr' => 'Lahmar',
            'wilaya_id' => '08',
        ],
        [

            'name_ar' => 'الواتة',
            'name_fr' => 'El Ouata',
            'wilaya_id' => '52',
        ],
        [

            'name_ar' => 'إقلي',
            'name_fr' => 'Igli',
            'wilaya_id' => '52',
        ],
        [

            'name_ar' => 'القنادسة',
            'name_fr' => 'Kenadsa',
            'wilaya_id' => '08',
        ],
        [

            'name_ar' => 'أولاد خضير',
            'name_fr' => 'Ouled Khodeir',
            'wilaya_id' => '52',
        ],
        [

            'name_ar' => 'تبلبالة',
            'name_fr' => 'Tabelbala',
            'wilaya_id' => '08',
        ],
        [

            'name_ar' => 'تاغيت',
            'name_fr' => 'Taghit',
            'wilaya_id' => '08',
        ],
        [

            'name_ar' => 'موزاية',
            'name_fr' => 'Mouzaia',
            'wilaya_id' => '09',
        ],
        [

            'name_ar' => 'أولاد يعيش',
            'name_fr' => 'Ouled Yaich',
            'wilaya_id' => '09',
        ],
        [

            'name_ar' => 'وادي العلايق',
            'name_fr' => 'Oued El Alleug',
            'wilaya_id' => '09',
        ],
        [

            'name_ar' => 'البليدة',
            'name_fr' => 'Blida',
            'wilaya_id' => '09',
        ],
        [

            'name_ar' => 'بوفاريك',
            'name_fr' => 'Boufarik',
            'wilaya_id' => '09',
        ],
        [

            'name_ar' => 'بوقرة',
            'name_fr' => 'Bougara',
            'wilaya_id' => '09',
        ],
        [

            'name_ar' => 'بوعينان',
            'name_fr' => 'Bouinan',
            'wilaya_id' => '09',
        ],
        [

            'name_ar' => 'مفتاح',
            'name_fr' => 'Meftah',
            'wilaya_id' => '09',
        ],
        [

            'name_ar' => 'العفرون',
            'name_fr' => 'El Affroun',
            'wilaya_id' => '09',
        ],
        [

            'name_ar' => 'الأربعاء',
            'name_fr' => 'Larbaa',
            'wilaya_id' => '09',
        ],
        [

            'name_ar' => 'مشد الله',
            'name_fr' => "M'chedallah",
            'wilaya_id' => '10',
        ],
        [

            'name_ar' => 'بشلول',
            'name_fr' => 'Bechloul',
            'wilaya_id' => '10',
        ],
        [

            'name_ar' => 'عين بسام',
            'name_fr' => 'Ain Bessem',
            'wilaya_id' => '10',
        ],
        [

            'name_ar' => 'البويرة',
            'name_fr' => 'Bouira',
            'wilaya_id' => '10',
        ],
        [

            'name_ar' => 'القادرية',
            'name_fr' => 'Kadiria',
            'wilaya_id' => '10',
        ],
        [

            'name_ar' => 'بئر غبالو',
            'name_fr' => 'Bir Ghbalou',
            'wilaya_id' => '10',
        ],
        [

            'name_ar' => 'برج أوخريص',
            'name_fr' => 'Bordj Okhriss',
            'wilaya_id' => '10',
        ],
        [

            'name_ar' => 'الأخضرية',
            'name_fr' => 'Lakhdaria',
            'wilaya_id' => '10',
        ],
        [

            'name_ar' => 'سور الغزلان',
            'name_fr' => 'Sour El Ghozlane',
            'wilaya_id' => '10',
        ],
        [

            'name_ar' => 'الهاشمية',
            'name_fr' => 'El Hachimia',
            'wilaya_id' => '10',
        ],
        [

            'name_ar' => 'سوق الخميس',
            'name_fr' => 'Souk El Khemis',
            'wilaya_id' => '10',
        ],
        [

            'name_ar' => 'الحيزر',
            'name_fr' => 'Haizer',
            'wilaya_id' => '10',
        ],
        [

            'name_ar' => 'سيلت',
            'name_fr' => 'Silet',
            'wilaya_id' => '11',
        ],
        [

            'name_ar' => 'تمنراست',
            'name_fr' => 'Tamanrasset',
            'wilaya_id' => '11',
        ],
        [

            'name_ar' => 'عين قزام',
            'name_fr' => 'In Guezzam',
            'wilaya_id' => '54',
        ],
        [

            'name_ar' => 'عين صالح',
            'name_fr' => 'In Salah',
            'wilaya_id' => '53',
        ],
        [

            'name_ar' => 'تاظروك',
            'name_fr' => 'Tazrouk',
            'wilaya_id' => '11',
        ],
        [

            'name_ar' => 'إينغر',
            'name_fr' => 'In Ghar',
            'wilaya_id' => '53',
        ],
        [

            'name_ar' => 'تين زواتين',
            'name_fr' => 'Tin Zouatine',
            'wilaya_id' => '54',
        ],
        [

            'name_ar' => 'الونزة',
            'name_fr' => 'Ouenza',
            'wilaya_id' => '12',
        ],
        [

            'name_ar' => 'العقلة',
            'name_fr' => 'El Ogla',
            'wilaya_id' => '12',
        ],
        [

            'name_ar' => 'الكويف',
            'name_fr' => 'El Kouif',
            'wilaya_id' => '12',
        ],
        [

            'name_ar' => 'مرسط',
            'name_fr' => 'Morsott',
            'wilaya_id' => '12',
        ],
        [

            'name_ar' => 'بئر مقدم',
            'name_fr' => 'Bir Mokadem',
            'wilaya_id' => '12',
        ],
        [

            'name_ar' => 'بئر العاتر',
            'name_fr' => 'Bir El Ater',
            'wilaya_id' => '12',
        ],
        [

            'name_ar' => 'العوينات',
            'name_fr' => 'El Aouinet',
            'wilaya_id' => '12',
        ],
        [

            'name_ar' => 'الشريعة',
            'name_fr' => 'Cheria',
            'wilaya_id' => '12',
        ],
        [

            'name_ar' => 'الماء الابيض',
            'name_fr' => 'El Malabiod',
            'wilaya_id' => '12',
        ],
        [

            'name_ar' => 'نقرين',
            'name_fr' => 'Negrine',
            'wilaya_id' => '12',
        ],
        [

            'name_ar' => 'أم علي',
            'name_fr' => 'Oum Ali',
            'wilaya_id' => '12',
        ],
        [

            'name_ar' => 'تبسة',
            'name_fr' => 'Tebessa',
            'wilaya_id' => '12',
        ],
        [

            'name_ar' => 'فلاوسن',
            'name_fr' => 'Fellaoucene',
            'wilaya_id' => '13',
        ],
        [

            'name_ar' => 'شتوان',
            'name_fr' => 'Chetouane',
            'wilaya_id' => '13',
        ],
        [

            'name_ar' => 'منصورة',
            'name_fr' => 'Mansourah',
            'wilaya_id' => '13',
        ],
        [

            'name_ar' => 'عين تالوت',
            'name_fr' => 'Ain Tellout',
            'wilaya_id' => '13',
        ],
        [

            'name_ar' => 'الرمشي',
            'name_fr' => 'Remchi',
            'wilaya_id' => '13',
        ],
        [

            'name_ar' => 'باب العسة',
            'name_fr' => 'Bab El Assa',
            'wilaya_id' => '13',
        ],
        [

            'name_ar' => 'بني سنوس',
            'name_fr' => 'Beni Snous',
            'wilaya_id' => '13',
        ],
        [

            'name_ar' => 'بني بوسعيد',
            'name_fr' => 'Beni Boussaid',
            'wilaya_id' => '13',
        ],
        [

            'name_ar' => 'هنين',
            'name_fr' => 'Honnaine',
            'wilaya_id' => '13',
        ],
        [

            'name_ar' => 'أولاد ميمون',
            'name_fr' => 'Ouled Mimoun',
            'wilaya_id' => '13',
        ],
        [

            'name_ar' => 'بن سكران',
            'name_fr' => 'Bensekrane',
            'wilaya_id' => '13',
        ],
        [

            'name_ar' => 'صبرة',
            'name_fr' => 'Sabra',
            'wilaya_id' => '13',
        ],
        [

            'name_ar' => 'سيدي الجيلالي',
            'name_fr' => 'Sidi Djillali',
            'wilaya_id' => '13',
        ],
        [

            'name_ar' => 'الغزوات',
            'name_fr' => 'Ghazaouet',
            'wilaya_id' => '13',
        ],
        [

            'name_ar' => 'ندرومة',
            'name_fr' => 'Nedroma',
            'wilaya_id' => '13',
        ],
        [

            'name_ar' => 'سبدو',
            'name_fr' => 'Sebdou',
            'wilaya_id' => '13',
        ],
        [

            'name_ar' => 'مغنية',
            'name_fr' => 'Maghnia',
            'wilaya_id' => '13',
        ],
        [

            'name_ar' => 'الحناية',
            'name_fr' => 'Hennaya',
            'wilaya_id' => '13',
        ],
        [

            'name_ar' => 'مرسى بن مهيدي',
            'name_fr' => 'Marsa Ben Mehdi',
            'wilaya_id' => '13',
        ],
        [

            'name_ar' => 'تلمسان',
            'name_fr' => 'Tlemcen',
            'wilaya_id' => '13',
        ],
        [

            'name_ar' => 'دحموني',
            'name_fr' => 'Dahmouni',
            'wilaya_id' => '14',
        ],
        [

            'name_ar' => 'عين الذهب',
            'name_fr' => 'Ain Deheb',
            'wilaya_id' => '14',
        ],
        [

            'name_ar' => 'مهدية',
            'name_fr' => 'Mahdia',
            'wilaya_id' => '14',
        ],
        [

            'name_ar' => 'فرندة',
            'name_fr' => 'Frenda',
            'wilaya_id' => '14',
        ],
        [

            'name_ar' => 'عين كرمس',
            'name_fr' => 'Ain Kermes',
            'wilaya_id' => '14',
        ],
        [

            'name_ar' => 'حمادية',
            'name_fr' => 'Hamadia',
            'wilaya_id' => '14',
        ],
        [

            'name_ar' => 'مشرع الصفا',
            'name_fr' => 'Mechraa Sfa',
            'wilaya_id' => '14',
        ],
        [

            'name_ar' => 'السوقر',
            'name_fr' => 'Sougueur',
            'wilaya_id' => '14',
        ],
        [

            'name_ar' => 'رحوية',
            'name_fr' => 'Rahouia',
            'wilaya_id' => '14',
        ],
        [

            'name_ar' => 'قصر الشلالة',
            'name_fr' => 'Ksar Chellala',
            'wilaya_id' => '14',
        ],
        [

            'name_ar' => 'مدروسة',
            'name_fr' => 'Medroussa',
            'wilaya_id' => '14',
        ],
        [

            'name_ar' => 'مغيلة',
            'name_fr' => 'Meghila',
            'wilaya_id' => '14',
        ],
        [

            'name_ar' => 'وادي ليلي',
            'name_fr' => 'Oued Lili',
            'wilaya_id' => '14',
        ],
        [

            'name_ar' => 'تيارت',
            'name_fr' => 'Tiaret',
            'wilaya_id' => '14',
        ],
        [

            'name_ar' => 'عين الحمام',
            'name_fr' => 'Ain El Hammam',
            'wilaya_id' => '15',
        ],
        [

            'name_ar' => 'أزفون',
            'name_fr' => 'Azeffoun',
            'wilaya_id' => '15',
        ],
        [

            'name_ar' => 'واضية',
            'name_fr' => 'Ouadhias',
            'wilaya_id' => '15',
        ],
        [

            'name_ar' => 'ذراع الميزان',
            'name_fr' => 'Draa El Mizan',
            'wilaya_id' => '15',
        ],
        [

            'name_ar' => 'الأربعاء ناث إيراثن',
            'name_fr' => 'Larbaa Nath Iraten',
            'wilaya_id' => '15',
        ],
        [

            'name_ar' => 'واسيف',
            'name_fr' => 'Ouacif',
            'wilaya_id' => '15',
        ],
        [

            'name_ar' => 'مقلع',
            'name_fr' => 'Mekla',
            'wilaya_id' => '15',
        ],
        [

            'name_ar' => 'واقنون',
            'name_fr' => 'Ouaguenoun',
            'wilaya_id' => '15',
        ],
        [

            'name_ar' => 'بني دوالة',
            'name_fr' => 'Beni Douala',
            'wilaya_id' => '15',
        ],
        [

            'name_ar' => 'تيزي راشد',
            'name_fr' => 'Tizi Rached',
            'wilaya_id' => '15',
        ],
        [

            'name_ar' => 'بوغني',
            'name_fr' => 'Boghni',
            'wilaya_id' => '15',
        ],
        [

            'name_ar' => 'عزازقة',
            'name_fr' => 'Azazga',
            'wilaya_id' => '15',
        ],
        [

            'name_ar' => 'بني يني',
            'name_fr' => 'Benni Yenni',
            'wilaya_id' => '15',
        ],
        [

            'name_ar' => 'بوزقن',
            'name_fr' => 'Bouzeguene',
            'wilaya_id' => '15',
        ],
        [

            'name_ar' => 'ماكودة',
            'name_fr' => 'Makouda',
            'wilaya_id' => '15',
        ],
        [

            'name_ar' => 'ذراع بن خدة',
            'name_fr' => 'Draa Ben Khedda',
            'wilaya_id' => '15',
        ],
        [

            'name_ar' => 'إفرحونان',
            'name_fr' => 'Iferhounene',
            'wilaya_id' => '15',
        ],
        [

            'name_ar' => 'تيقزيرت',
            'name_fr' => 'Tigzirt',
            'wilaya_id' => '15',
        ],
        [

            'name_ar' => 'معاتقة',
            'name_fr' => 'Maatkas',
            'wilaya_id' => '15',
        ],
        [

            'name_ar' => 'تيزي غنيف',
            'name_fr' => 'Tizi-Ghenif',
            'wilaya_id' => '15',
        ],
        [

            'name_ar' => 'تيزي وزو',
            'name_fr' => 'Tizi Ouzou',
            'wilaya_id' => '15',
        ],
        [

            'name_ar' => 'الشراقة',
            'name_fr' => 'Cheraga',
            'wilaya_id' => '16',
        ],
        [

            'name_ar' => 'الدار البيضاء',
            'name_fr' => 'Dar El Beida',
            'wilaya_id' => '16',
        ],
        [

            'name_ar' => 'سيدي امحمد',
            'name_fr' => "Sidi M'hamed",
            'wilaya_id' => '16',
        ],
        [

            'name_ar' => 'باب الوادي',
            'name_fr' => 'Bab El Oued',
            'wilaya_id' => '16',
        ],
        [

            'name_ar' => 'الدرارية',
            'name_fr' => 'Draria',
            'wilaya_id' => '16',
        ],
        [

            'name_ar' => 'الحراش',
            'name_fr' => 'El Harrach',
            'wilaya_id' => '16',
        ],
        [

            'name_ar' => 'براقي',
            'name_fr' => 'Baraki',
            'wilaya_id' => '16',
        ],
        [

            'name_ar' => 'بوزريعة',
            'name_fr' => 'Bouzareah',
            'wilaya_id' => '16',
        ],
        [

            'name_ar' => 'بئر مراد رايس',
            'name_fr' => 'Bir Mourad Rais',
            'wilaya_id' => '16',
        ],
        [

            'name_ar' => 'بئر توتة',
            'name_fr' => 'Birtouta',
            'wilaya_id' => '16',
        ],
        [

            'name_ar' => 'حسين داي',
            'name_fr' => 'Hussein Dey',
            'wilaya_id' => '16',
        ],
        [

            'name_ar' => 'الرويبة',
            'name_fr' => 'Rouiba',
            'wilaya_id' => '16',
        ],
        [

            'name_ar' => 'زرالدة',
            'name_fr' => 'Zeralda',
            'wilaya_id' => '16',
        ],
        [

            'name_ar' => 'الادريسية',
            'name_fr' => 'El Idrissia',
            'wilaya_id' => '17',
        ],
        [

            'name_ar' => 'عين الإبل',
            'name_fr' => 'Ain El Ibel',
            'wilaya_id' => '17',
        ],
        [

            'name_ar' => 'حد الصحاري',
            'name_fr' => 'Had Sahary',
            'wilaya_id' => '17',
        ],
        [

            'name_ar' => 'حاسي بحبح',
            'name_fr' => 'Hassi Bahbah',
            'wilaya_id' => '17',
        ],
        [

            'name_ar' => 'عين وسارة',
            'name_fr' => 'Ain Oussera',
            'wilaya_id' => '17',
        ],
        [

            'name_ar' => 'فيض البطمة',
            'name_fr' => 'Faidh El Botma',
            'wilaya_id' => '17',
        ],
        [

            'name_ar' => 'بيرين',
            'name_fr' => 'Birine',
            'wilaya_id' => '17',
        ],
        [

            'name_ar' => 'الشارف',
            'name_fr' => 'Charef',
            'wilaya_id' => '17',
        ],
        [

            'name_ar' => 'دار الشيوخ',
            'name_fr' => 'Dar Chioukh',
            'wilaya_id' => '17',
        ],
        [

            'name_ar' => 'مسعد',
            'name_fr' => 'Messaad',
            'wilaya_id' => '17',
        ],
        [

            'name_ar' => 'الجلفة',
            'name_fr' => 'Djelfa',
            'wilaya_id' => '17',
        ],
        [

            'name_ar' => 'سيدي لعجال',
            'name_fr' => 'Sidi Laadjel',
            'wilaya_id' => '17',
        ],
        [

            'name_ar' => 'الشقفة',
            'name_fr' => 'Chekfa',
            'wilaya_id' => '18',
        ],
        [

            'name_ar' => 'جيملة',
            'name_fr' => 'Djimla',
            'wilaya_id' => '18',
        ],
        [

            'name_ar' => 'العنصر',
            'name_fr' => 'El Ancer',
            'wilaya_id' => '18',
        ],
        [

            'name_ar' => 'الطاهير',
            'name_fr' => 'Taher',
            'wilaya_id' => '18',
        ],
        [

            'name_ar' => 'العوانة',
            'name_fr' => 'El Aouana',
            'wilaya_id' => '18',
        ],
        [

            'name_ar' => 'الميلية',
            'name_fr' => 'El Milia',
            'wilaya_id' => '18',
        ],
        [

            'name_ar' => 'زيامة منصورية',
            'name_fr' => 'Ziamah Mansouriah',
            'wilaya_id' => '18',
        ],
        [

            'name_ar' => 'السطارة',
            'name_fr' => 'Settara',
            'wilaya_id' => '18',
        ],
        [

            'name_ar' => 'جيجل',
            'name_fr' => 'Jijel',
            'wilaya_id' => '18',
        ],
        [

            'name_ar' => 'تاكسنة',
            'name_fr' => 'Texenna',
            'wilaya_id' => '18',
        ],
        [

            'name_ar' => 'سيدي معروف',
            'name_fr' => 'Sidi Marouf',
            'wilaya_id' => '18',
        ],
        [

            'name_ar' => 'عين أرنات',
            'name_fr' => 'Ain Arnat',
            'wilaya_id' => '19',
        ],
        [

            'name_ar' => 'عين أزال',
            'name_fr' => 'Ain Azel',
            'wilaya_id' => '19',
        ],
        [

            'name_ar' => 'عين الكبيرة',
            'name_fr' => 'Ain El Kebira',
            'wilaya_id' => '19',
        ],
        [

            'name_ar' => 'عين ولمان',
            'name_fr' => 'Ain Oulmene',
            'wilaya_id' => '19',
        ],
        [

            'name_ar' => 'بني ورتيلان',
            'name_fr' => 'Beni Ourtilane',
            'wilaya_id' => '19',
        ],
        [

            'name_ar' => 'بوقاعة',
            'name_fr' => 'Bougaa',
            'wilaya_id' => '19',
        ],
        [

            'name_ar' => 'بني عزيز',
            'name_fr' => 'Beni Aziz',
            'wilaya_id' => '19',
        ],
        [

            'name_ar' => 'بوعنداس',
            'name_fr' => 'Bouandas',
            'wilaya_id' => '19',
        ],
        [

            'name_ar' => 'عموشة',
            'name_fr' => 'Amoucha',
            'wilaya_id' => '19',
        ],
        [

            'name_ar' => 'بابور',
            'name_fr' => 'Babor',
            'wilaya_id' => '19',
        ],
        [

            'name_ar' => 'العلمة',
            'name_fr' => 'El Eulma',
            'wilaya_id' => '19',
        ],
        [

            'name_ar' => 'بئر العرش',
            'name_fr' => 'Bir El Arch',
            'wilaya_id' => '19',
        ],
        [

            'name_ar' => 'جميلة',
            'name_fr' => 'Djemila',
            'wilaya_id' => '19',
        ],
        [

            'name_ar' => 'صالح باي',
            'name_fr' => 'Salah Bey',
            'wilaya_id' => '19',
        ],
        [

            'name_ar' => 'حمام قرقور',
            'name_fr' => 'Hammam Guergour',
            'wilaya_id' => '19',
        ],
        [

            'name_ar' => 'قنزات',
            'name_fr' => 'Guenzet',
            'wilaya_id' => '19',
        ],
        [

            'name_ar' => 'قجال',
            'name_fr' => 'Guidjel',
            'wilaya_id' => '19',
        ],
        [

            'name_ar' => 'حمام السخنة',
            'name_fr' => 'Hammam Sokhna',
            'wilaya_id' => '19',
        ],
        [

            'name_ar' => 'ماوكلان',
            'name_fr' => 'Maoklane',
            'wilaya_id' => '19',
        ],
        [

            'name_ar' => 'سطيف',
            'name_fr' => 'Setif',
            'wilaya_id' => '19',
        ],
        [

            'name_ar' => 'عين الحجر',
            'name_fr' => 'Ain El Hadjar',
            'wilaya_id' => '20',
        ],
        [

            'name_ar' => 'الحساسنة',
            'name_fr' => 'El Hassasna',
            'wilaya_id' => '20',
        ],
        [

            'name_ar' => 'أولاد ابراهيم',
            'name_fr' => 'Ouled Brahim',
            'wilaya_id' => '20',
        ],
        [

            'name_ar' => 'يوب',
            'name_fr' => 'Youb',
            'wilaya_id' => '20',
        ],
        [

            'name_ar' => 'سيدي بوبكر',
            'name_fr' => 'Sidi Boubekeur',
            'wilaya_id' => '20',
        ],
        [

            'name_ar' => 'سعيدة',
            'name_fr' => 'Saida',
            'wilaya_id' => '20',
        ],
        [

            'name_ar' => 'سيدي مزغيش',
            'name_fr' => 'Sidi Mezghiche',
            'wilaya_id' => '21',
        ],
        [

            'name_ar' => 'عزابة',
            'name_fr' => 'Azzaba',
            'wilaya_id' => '21',
        ],
        [

            'name_ar' => 'عين قشرة',
            'name_fr' => 'Ain Kechra',
            'wilaya_id' => '21',
        ],
        [

            'name_ar' => 'الحدائق',
            'name_fr' => 'El Hadaiek',
            'wilaya_id' => '21',
        ],
        [

            'name_ar' => 'بن عزوز',
            'name_fr' => 'Ben Azzouz',
            'wilaya_id' => '21',
        ],
        [

            'name_ar' => 'رمضان جمال',
            'name_fr' => 'Ramdane Djamel',
            'wilaya_id' => '21',
        ],
        [

            'name_ar' => 'القل',
            'name_fr' => 'Collo',
            'wilaya_id' => '21',
        ],
        [

            'name_ar' => 'تمالوس',
            'name_fr' => 'Tamalous',
            'wilaya_id' => '21',
        ],
        [

            'name_ar' => 'الحروش',
            'name_fr' => 'El Harrouch',
            'wilaya_id' => '21',
        ],
        [

            'name_ar' => 'سكيكدة',
            'name_fr' => 'Skikda',
            'wilaya_id' => '21',
        ],
        [

            'name_ar' => 'الزيتونة',
            'name_fr' => 'Zitouna',
            'wilaya_id' => '21',
        ],
        [

            'name_ar' => 'أولاد عطية',
            'name_fr' => 'Ouled Attia',
            'wilaya_id' => '21',
        ],
        [

            'name_ar' => 'أم الطوب',
            'name_fr' => 'Oum Toub',
            'wilaya_id' => '21',
        ],
        [

            'name_ar' => 'عين البرد',
            'name_fr' => 'Ain El Berd',
            'wilaya_id' => '22',
        ],
        [

            'name_ar' => 'سيدي علي بوسيدي',
            'name_fr' => 'Sidi Ali Boussidi',
            'wilaya_id' => '22',
        ],
        [

            'name_ar' => 'تسالة',
            'name_fr' => 'Tessala',
            'wilaya_id' => '22',
        ],
        [

            'name_ar' => 'مولاي سليسن',
            'name_fr' => 'Moulay Slissen',
            'wilaya_id' => '22',
        ],
        [

            'name_ar' => 'سفيزف',
            'name_fr' => 'Sfisef',
            'wilaya_id' => '22',
        ],
        [

            'name_ar' => 'سيدي لحسن',
            'name_fr' => 'Sidi Lahcene',
            'wilaya_id' => '22',
        ],
        [

            'name_ar' => 'بن باديس',
            'name_fr' => 'Ben Badis',
            'wilaya_id' => '22',
        ],
        [

            'name_ar' => 'مصطفى بن ابراهيم',
            'name_fr' => 'Mostefa Ben Brahim',
            'wilaya_id' => '22',
        ],
        [

            'name_ar' => 'تنيرة',
            'name_fr' => 'Tenira',
            'wilaya_id' => '22',
        ],
        [

            'name_ar' => 'مرحوم',
            'name_fr' => 'Marhoum',
            'wilaya_id' => '22',
        ],
        [

            'name_ar' => 'سيدي علي بن يوب',
            'name_fr' => 'Sidi Ali Ben Youb',
            'wilaya_id' => '22',
        ],
        [

            'name_ar' => 'تلاغ',
            'name_fr' => 'Telagh',
            'wilaya_id' => '22',
        ],
        [

            'name_ar' => 'مرين',
            'name_fr' => 'Merine',
            'wilaya_id' => '22',
        ],
        [

            'name_ar' => 'راس الماء',
            'name_fr' => 'Ras El Ma',
            'wilaya_id' => '22',
        ],
        [

            'name_ar' => 'سيدي بلعباس',
            'name_fr' => 'Sidi Bel Abbes',
            'wilaya_id' => '22',
        ],
        [

            'name_ar' => 'عين الباردة',
            'name_fr' => 'Ain El Berda',
            'wilaya_id' => '23',
        ],
        [

            'name_ar' => 'عنابة',
            'name_fr' => 'Annaba',
            'wilaya_id' => '23',
        ],
        [

            'name_ar' => 'برحال',
            'name_fr' => 'Berrahal',
            'wilaya_id' => '23',
        ],
        [

            'name_ar' => 'شطايبي',
            'name_fr' => 'Chetaibi',
            'wilaya_id' => '23',
        ],
        [

            'name_ar' => 'البوني',
            'name_fr' => 'El Bouni',
            'wilaya_id' => '23',
        ],
        [

            'name_ar' => 'الحجار',
            'name_fr' => 'El Hadjar',
            'wilaya_id' => '23',
        ],
        [

            'name_ar' => 'بوشقوف',
            'name_fr' => 'Bouchegouf',
            'wilaya_id' => '24',
        ],
        [

            'name_ar' => 'عين مخلوف',
            'name_fr' => 'Ain Makhlouf',
            'wilaya_id' => '24',
        ],
        [

            'name_ar' => 'وادي الزناتي',
            'name_fr' => 'Oued Zenati',
            'wilaya_id' => '24',
        ],
        [

            'name_ar' => 'خزارة',
            'name_fr' => 'Khezaras',
            'wilaya_id' => '24',
        ],
        [

            'name_ar' => 'قلعة بوصبع',
            'name_fr' => 'Guelaat Bousbaa',
            'wilaya_id' => '24',
        ],
        [

            'name_ar' => 'قالمة',
            'name_fr' => 'Guelma',
            'wilaya_id' => '24',
        ],
        [

            'name_ar' => 'حمام دباغ',
            'name_fr' => 'Hammam Debagh',
            'wilaya_id' => '24',
        ],
        [

            'name_ar' => 'هيليوبوليس',
            'name_fr' => 'Heliopolis',
            'wilaya_id' => '24',
        ],
        [

            'name_ar' => 'حمام النبايل',
            'name_fr' => "Hammam N'bails",
            'wilaya_id' => '24',
        ],
        [

            'name_ar' => 'عين حساينية',
            'name_fr' => 'Ain Hessainia',
            'wilaya_id' => '24',
        ],
        [

            'name_ar' => 'عين عبيد',
            'name_fr' => 'Ain Abid',
            'wilaya_id' => '25',
        ],
        [

            'name_ar' => 'الخروب',
            'name_fr' => 'El Khroub',
            'wilaya_id' => '25',
        ],
        [

            'name_ar' => 'زيغود يوسف',
            'name_fr' => 'Zighoud Youcef',
            'wilaya_id' => '25',
        ],
        [

            'name_ar' => 'قسنطينة',
            'name_fr' => 'Constantine',
            'wilaya_id' => '25',
        ],
        [

            'name_ar' => 'حامة بوزيان',
            'name_fr' => 'Hamma Bouziane',
            'wilaya_id' => '25',
        ],
        [

            'name_ar' => 'ابن زياد',
            'name_fr' => 'Ibn Ziad',
            'wilaya_id' => '25',
        ],
        [

            'name_ar' => 'عين بوسيف',
            'name_fr' => 'Ain Boucif',
            'wilaya_id' => '26',
        ],
        [

            'name_ar' => 'شلالة العذاورة',
            'name_fr' => 'Chellalat El Adhaoura',
            'wilaya_id' => '26',
        ],
        [

            'name_ar' => 'تابلاط',
            'name_fr' => 'Tablat',
            'wilaya_id' => '26',
        ],
        [

            'name_ar' => 'عزيز',
            'name_fr' => 'Aziz',
            'wilaya_id' => '26',
        ],
        [

            'name_ar' => 'العمارية',
            'name_fr' => 'El Omaria',
            'wilaya_id' => '26',
        ],
        [

            'name_ar' => 'وزرة',
            'name_fr' => 'Ouzera',
            'wilaya_id' => '26',
        ],
        [

            'name_ar' => 'بني سليمان',
            'name_fr' => 'Beni Slimane',
            'wilaya_id' => '26',
        ],
        [

            'name_ar' => 'البرواقية',
            'name_fr' => 'Berrouaghia',
            'wilaya_id' => '26',
        ],
        [

            'name_ar' => 'القلب الكبير',
            'name_fr' => 'Guelb El Kebir',
            'wilaya_id' => '26',
        ],
        [

            'name_ar' => 'أولاد عنتر',
            'name_fr' => 'Ouled Antar',
            'wilaya_id' => '26',
        ],
        [

            'name_ar' => 'الشهبونية',
            'name_fr' => 'Chahbounia',
            'wilaya_id' => '26',
        ],
        [

            'name_ar' => 'سي المحجوب',
            'name_fr' => 'Si Mahdjoub',
            'wilaya_id' => '26',
        ],
        [

            'name_ar' => 'سيدي نعمان',
            'name_fr' => 'Sidi Naamane',
            'wilaya_id' => '26',
        ],
        [

            'name_ar' => 'السواقي',
            'name_fr' => 'Souaghi',
            'wilaya_id' => '26',
        ],
        [

            'name_ar' => 'المدية',
            'name_fr' => 'Medea',
            'wilaya_id' => '26',
        ],
        [

            'name_ar' => 'العزيزية',
            'name_fr' => 'El Azizia',
            'wilaya_id' => '26',
        ],
        [

            'name_ar' => 'عوامري',
            'name_fr' => 'Ouamri',
            'wilaya_id' => '26',
        ],
        [

            'name_ar' => 'قصر البخاري',
            'name_fr' => 'Ksar El Boukhari',
            'wilaya_id' => '26',
        ],
        [

            'name_ar' => 'سغوان',
            'name_fr' => 'Seghouane',
            'wilaya_id' => '26',
        ],
        [

            'name_ar' => 'عشعاشة',
            'name_fr' => 'Achaacha',
            'wilaya_id' => '27',
        ],
        [

            'name_ar' => 'خير الدين',
            'name_fr' => 'Kheir Eddine',
            'wilaya_id' => '27',
        ],
        [

            'name_ar' => 'عين نويسي',
            'name_fr' => 'Ain Nouicy',
            'wilaya_id' => '27',
        ],
        [

            'name_ar' => 'ماسرة',
            'name_fr' => 'Mesra',
            'wilaya_id' => '27',
        ],
        [

            'name_ar' => 'عين تادلس',
            'name_fr' => 'Ain Tedeles',
            'wilaya_id' => '27',
        ],
        [

            'name_ar' => 'سيدي لخضر',
            'name_fr' => 'Sidi Lakhdar',
            'wilaya_id' => '27',
        ],
        [

            'name_ar' => 'بوقيراط',
            'name_fr' => 'Bouguirat',
            'wilaya_id' => '27',
        ],
        [

            'name_ar' => 'حاسي ماماش',
            'name_fr' => 'Hassi Mameche',
            'wilaya_id' => '27',
        ],
        [

            'name_ar' => 'مستغانم',
            'name_fr' => 'Mostaganem',
            'wilaya_id' => '27',
        ],
        [

            'name_ar' => 'سيدي علي',
            'name_fr' => 'Sidi Ali',
            'wilaya_id' => '27',
        ],
        [

            'name_ar' => 'عين الحجل',
            'name_fr' => 'Ain El Hadjel',
            'wilaya_id' => '28',
        ],
        [

            'name_ar' => 'عين الملح',
            'name_fr' => 'Ain El Melh',
            'wilaya_id' => '28',
        ],
        [

            'name_ar' => 'مقرة',
            'name_fr' => 'Magra',
            'wilaya_id' => '28',
        ],
        [

            'name_ar' => 'بن سرور',
            'name_fr' => 'Ben Srour',
            'wilaya_id' => '28',
        ],
        [

            'name_ar' => 'سيدي عيسى',
            'name_fr' => 'Sidi Aissa',
            'wilaya_id' => '28',
        ],
        [

            'name_ar' => 'أولاد سيدي ابراهيم',
            'name_fr' => 'Ouled Sidi Brahim',
            'wilaya_id' => '28',
        ],
        [

            'name_ar' => 'بوسعادة',
            'name_fr' => 'Bousaada',
            'wilaya_id' => '28',
        ],
        [

            'name_ar' => 'شلال',
            'name_fr' => 'Chellal',
            'wilaya_id' => '28',
        ],
        [

            'name_ar' => 'جبل مساعد',
            'name_fr' => 'Djebel Messaad',
            'wilaya_id' => '28',
        ],
        [

            'name_ar' => 'خبانة',
            'name_fr' => 'Khoubana',
            'wilaya_id' => '28',
        ],
        [

            'name_ar' => 'حمام الضلعة',
            'name_fr' => 'Hammam Dalaa',
            'wilaya_id' => '28',
        ],
        [

            'name_ar' => 'أولاد دراج',
            'name_fr' => 'Ouled Derradj',
            'wilaya_id' => '28',
        ],
        [

            'name_ar' => 'امجدل',
            'name_fr' => 'Medjedel',
            'wilaya_id' => '28',
        ],
        [

            'name_ar' => 'المسيلة',
            'name_fr' => "M'sila",
            'wilaya_id' => '28',
        ],
        [

            'name_ar' => 'سيدي عامر',
            'name_fr' => 'Sidi Ameur',
            'wilaya_id' => '28',
        ],
        [

            'name_ar' => 'عين فارس',
            'name_fr' => 'Ain Fares',
            'wilaya_id' => '29',
        ],
        [

            'name_ar' => 'عين فكان',
            'name_fr' => 'Ain Fekan',
            'wilaya_id' => '29',
        ],
        [

            'name_ar' => 'وادي الأبطال',
            'name_fr' => 'Oued El Abtal',
            'wilaya_id' => '29',
        ],
        [

            'name_ar' => 'عقاز',
            'name_fr' => 'Oggaz',
            'wilaya_id' => '29',
        ],
        [

            'name_ar' => 'عوف',
            'name_fr' => 'Aouf',
            'wilaya_id' => '29',
        ],
        [

            'name_ar' => 'سيق',
            'name_fr' => 'Sig',
            'wilaya_id' => '29',
        ],
        [

            'name_ar' => 'بوحنيفية',
            'name_fr' => 'Bouhanifia',
            'wilaya_id' => '29',
        ],
        [

            'name_ar' => 'البرج',
            'name_fr' => 'El Bordj',
            'wilaya_id' => '29',
        ],
        [

            'name_ar' => 'زهانة',
            'name_fr' => 'Zahana',
            'wilaya_id' => '29',
        ],
        [

            'name_ar' => 'المحمدية',
            'name_fr' => 'Mohammadia',
            'wilaya_id' => '29',
        ],
        [

            'name_ar' => 'الحشم',
            'name_fr' => 'Hachem',
            'wilaya_id' => '29',
        ],
        [

            'name_ar' => 'تيزي',
            'name_fr' => 'Tizi',
            'wilaya_id' => '29',
        ],
        [

            'name_ar' => 'غريس',
            'name_fr' => 'Ghriss',
            'wilaya_id' => '29',
        ],
        [

            'name_ar' => 'وادي التاغية',
            'name_fr' => 'Oued Taria',
            'wilaya_id' => '29',
        ],
        [

            'name_ar' => 'معسكر',
            'name_fr' => 'Mascara',
            'wilaya_id' => '29',
        ],
        [

            'name_ar' => 'تيغنيف',
            'name_fr' => 'Tighennif',
            'wilaya_id' => '29',
        ],
        [

            'name_ar' => 'سيدي خويلد',
            'name_fr' => 'Sidi Khouiled',
            'wilaya_id' => '30',
        ],
        [

            'name_ar' => 'الطيبات',
            'name_fr' => 'Taibet',
            'wilaya_id' => '55',
        ],
        [

            'name_ar' => 'تماسين',
            'name_fr' => 'Temacine',
            'wilaya_id' => '55',
        ],
        [

            'name_ar' => 'الحجيرة',
            'name_fr' => 'El-Hadjira',
            'wilaya_id' => '55',
        ],
        [

            'name_ar' => 'البرمة',
            'name_fr' => 'El Borma',
            'wilaya_id' => '30',
        ],
        [

            'name_ar' => 'حاسي مسعود',
            'name_fr' => 'Hassi Messaoud',
            'wilaya_id' => '30',
        ],
        [

            'name_ar' => 'المقارين',
            'name_fr' => 'Megarine',
            'wilaya_id' => '55',
        ],
        [

            'name_ar' => 'تقرت',
            'name_fr' => 'Touggourt',
            'wilaya_id' => '55',
        ],
        [

            'name_ar' => 'انقوسة',
            'name_fr' => "N'goussa",
            'wilaya_id' => '30',
        ],
        [

            'name_ar' => 'ورقلة',
            'name_fr' => 'Ouargla',
            'wilaya_id' => '30',
        ],
        [

            'name_ar' => 'بطيوة',
            'name_fr' => 'Bethioua',
            'wilaya_id' => '31',
        ],
        [

            'name_ar' => 'بوتليليس',
            'name_fr' => 'Boutlelis',
            'wilaya_id' => '31',
        ],
        [

            'name_ar' => 'عين الترك',
            'name_fr' => 'Ain Turk',
            'wilaya_id' => '31',
        ],
        [

            'name_ar' => 'أرزيو',
            'name_fr' => 'Arzew',
            'wilaya_id' => '31',
        ],
        [

            'name_ar' => 'قديل',
            'name_fr' => 'Gdyel',
            'wilaya_id' => '31',
        ],
        [

            'name_ar' => 'بئر الجير',
            'name_fr' => 'Bir El Djir',
            'wilaya_id' => '31',
        ],
        [

            'name_ar' => 'وادي تليلات',
            'name_fr' => 'Oued Tlelat',
            'wilaya_id' => '31',
        ],
        [

            'name_ar' => 'السانية',
            'name_fr' => 'Es Senia',
            'wilaya_id' => '31',
        ],
        [

            'name_ar' => 'وهران',
            'name_fr' => 'Oran',
            'wilaya_id' => '31',
        ],
        [

            'name_ar' => 'الأبيض سيدي الشيخ',
            'name_fr' => 'Labiodh Sidi Cheikh',
            'wilaya_id' => '32',
        ],
        [

            'name_ar' => 'بوعلام',
            'name_fr' => 'Boualem',
            'wilaya_id' => '32',
        ],
        [

            'name_ar' => 'بوقطب',
            'name_fr' => 'Bougtoub',
            'wilaya_id' => '32',
        ],
        [

            'name_ar' => 'بوسمغون',
            'name_fr' => 'Boussemghoun',
            'wilaya_id' => '32',
        ],
        [

            'name_ar' => 'بريزينة',
            'name_fr' => 'Brezina',
            'wilaya_id' => '32',
        ],
        [

            'name_ar' => 'رقاصة',
            'name_fr' => 'Rogassa',
            'wilaya_id' => '32',
        ],
        [

            'name_ar' => 'شلالة',
            'name_fr' => 'Chellala',
            'wilaya_id' => '32',
        ],
        [

            'name_ar' => 'البيض',
            'name_fr' => 'El Bayadh',
            'wilaya_id' => '32',
        ],
        [

            'name_ar' => 'جانت',
            'name_fr' => 'Djanet',
            'wilaya_id' => '56',
        ],
        [

            'name_ar' => 'إن أمناس',
            'name_fr' => 'In Amenas',
            'wilaya_id' => '33',
        ],
        [

            'name_ar' => 'إيليزي',
            'name_fr' => 'Illizi',
            'wilaya_id' => '33',
        ],
        [

            'name_ar' => 'عين تاغروت',
            'name_fr' => 'Ain Taghrout',
            'wilaya_id' => '34',
        ],
        [

            'name_ar' => 'رأس الوادي',
            'name_fr' => 'Ras El Oued',
            'wilaya_id' => '34',
        ],
        [

            'name_ar' => 'برج بوعريريج',
            'name_fr' => 'Bordj Bou Arreridj',
            'wilaya_id' => '34',
        ],
        [

            'name_ar' => 'برج الغدير',
            'name_fr' => 'Bordj Ghedir',
            'wilaya_id' => '34',
        ],
        [

            'name_ar' => 'المنصورة',
            'name_fr' => 'Mansourah',
            'wilaya_id' => '34',
        ],
        [

            'name_ar' => 'بئر قاصد علي',
            'name_fr' => 'Bir Kasdali',
            'wilaya_id' => '34',
        ],
        [

            'name_ar' => 'برج زمورة',
            'name_fr' => 'Bordj Zemmoura',
            'wilaya_id' => '34',
        ],
        [

            'name_ar' => 'جعافرة',
            'name_fr' => 'Djaafra',
            'wilaya_id' => '34',
        ],
        [

            'name_ar' => 'الحمادية',
            'name_fr' => 'El Hamadia',
            'wilaya_id' => '34',
        ],
        [

            'name_ar' => 'مجانة',
            'name_fr' => 'Medjana',
            'wilaya_id' => '34',
        ],
        [

            'name_ar' => 'دلس',
            'name_fr' => 'Dellys',
            'wilaya_id' => '35',
        ],
        [

            'name_ar' => 'الثنية',
            'name_fr' => 'Thenia',
            'wilaya_id' => '35',
        ],
        [

            'name_ar' => 'بغلية',
            'name_fr' => 'Baghlia',
            'wilaya_id' => '35',
        ],
        [

            'name_ar' => 'برج منايل',
            'name_fr' => 'Bordj Menaiel',
            'wilaya_id' => '35',
        ],
        [

            'name_ar' => 'بودواو',
            'name_fr' => 'Boudouaou',
            'wilaya_id' => '35',
        ],
        [

            'name_ar' => 'بومرداس',
            'name_fr' => 'Boumerdes',
            'wilaya_id' => '35',
        ],
        [

            'name_ar' => 'يسر',
            'name_fr' => 'Isser',
            'wilaya_id' => '35',
        ],
        [

            'name_ar' => 'خميس الخشنة',
            'name_fr' => 'Khemis El Khechna',
            'wilaya_id' => '35',
        ],
        [

            'name_ar' => 'الناصرية',
            'name_fr' => 'Naciria',
            'wilaya_id' => '35',
        ],
        [

            'name_ar' => 'الطارف',
            'name_fr' => 'El Tarf',
            'wilaya_id' => '36',
        ],
        [

            'name_ar' => 'بوحجار',
            'name_fr' => 'Bouhadjar',
            'wilaya_id' => '36',
        ],
        [

            'name_ar' => 'البسباس',
            'name_fr' => 'Besbes',
            'wilaya_id' => '36',
        ],
        [

            'name_ar' => 'بن مهيدي',
            'name_fr' => "Ben M'hidi",
            'wilaya_id' => '36',
        ],
        [

            'name_ar' => 'بوثلجة',
            'name_fr' => 'Bouteldja',
            'wilaya_id' => '36',
        ],
        [

            'name_ar' => 'الذرعان',
            'name_fr' => 'Drean',
            'wilaya_id' => '36',
        ],
        [

            'name_ar' => 'القالة',
            'name_fr' => 'El Kala',
            'wilaya_id' => '36',
        ],
        [

            'name_ar' => 'تندوف',
            'name_fr' => 'Tindouf',
            'wilaya_id' => '37',
        ],
        [

            'name_ar' => 'عماري',
            'name_fr' => 'Ammari',
            'wilaya_id' => '38',
        ],
        [

            'name_ar' => 'برج بونعامة',
            'name_fr' => 'Bordj Bounaama',
            'wilaya_id' => '38',
        ],
        [

            'name_ar' => 'برج الأمير عبد القادر',
            'name_fr' => 'Bordj Emir Abdelkader',
            'wilaya_id' => '38',
        ],
        [

            'name_ar' => 'الأزهرية',
            'name_fr' => 'Lazharia',
            'wilaya_id' => '38',
        ],
        [

            'name_ar' => 'خميستي',
            'name_fr' => 'Khemisti',
            'wilaya_id' => '38',
        ],
        [

            'name_ar' => 'لرجام',
            'name_fr' => 'Lardjem',
            'wilaya_id' => '38',
        ],
        [

            'name_ar' => 'تيسمسيلت',
            'name_fr' => 'Tissemsilt',
            'wilaya_id' => '38',
        ],
        [

            'name_ar' => 'ثنية الاحد',
            'name_fr' => 'Theniet El Had',
            'wilaya_id' => '38',
        ],
        [

            'name_ar' => 'البياضة',
            'name_fr' => 'Bayadha',
            'wilaya_id' => '39',
        ],
        [

            'name_ar' => 'الطالب العربي',
            'name_fr' => 'Taleb Larbi',
            'wilaya_id' => '39',
        ],
        [

            'name_ar' => 'الدبيلة',
            'name_fr' => 'Debila',
            'wilaya_id' => '39',
        ],
        [

            'name_ar' => 'جامعة',
            'name_fr' => 'Djamaa',
            'wilaya_id' => '57',
        ],
        [

            'name_ar' => 'الرباح',
            'name_fr' => 'Robbah',
            'wilaya_id' => '39',
        ],
        [

            'name_ar' => 'المغير',
            'name_fr' => 'El Meghaier',
            'wilaya_id' => '57',
        ],
        [

            'name_ar' => 'الوادي',
            'name_fr' => 'El Oued',
            'wilaya_id' => '39',
        ],
        [

            'name_ar' => 'قمار',
            'name_fr' => 'Guemar',
            'wilaya_id' => '39',
        ],
        [

            'name_ar' => 'الرقيبة',
            'name_fr' => 'Reguiba',
            'wilaya_id' => '39',
        ],
        [

            'name_ar' => 'حاسي خليفة',
            'name_fr' => 'Hassi Khalifa',
            'wilaya_id' => '39',
        ],
        [

            'name_ar' => 'المقرن',
            'name_fr' => 'Magrane',
            'wilaya_id' => '39',
        ],
        [

            'name_ar' => 'اميه وانسة',
            'name_fr' => 'Mih Ouensa',
            'wilaya_id' => '39',
        ],
        [

            'name_ar' => 'عين الطويلة',
            'name_fr' => 'Ain Touila',
            'wilaya_id' => '40',
        ],
        [

            'name_ar' => 'بابار',
            'name_fr' => 'Babar',
            'wilaya_id' => '40',
        ],
        [

            'name_ar' => 'الحامة',
            'name_fr' => 'El Hamma',
            'wilaya_id' => '40',
        ],
        [

            'name_ar' => 'بوحمامة',
            'name_fr' => 'Bouhmama',
            'wilaya_id' => '40',
        ],
        [

            'name_ar' => 'ششار',
            'name_fr' => 'Chechar',
            'wilaya_id' => '40',
        ],
        [

            'name_ar' => 'أولاد رشاش',
            'name_fr' => 'Ouled Rechache',
            'wilaya_id' => '40',
        ],
        [

            'name_ar' => 'قايس',
            'name_fr' => 'Kais',
            'wilaya_id' => '40',
        ],
        [

            'name_ar' => 'خنشلة',
            'name_fr' => 'Khenchela',
            'wilaya_id' => '40',
        ],
        [

            'name_ar' => 'سدراتة',
            'name_fr' => 'Sedrata',
            'wilaya_id' => '41',
        ],
        [

            'name_ar' => 'أولاد إدريس',
            'name_fr' => 'Ouled Driss',
            'wilaya_id' => '41',
        ],
        [

            'name_ar' => 'بئر بوحوش',
            'name_fr' => 'Bir Bouhouche',
            'wilaya_id' => '41',
        ],
        [

            'name_ar' => 'تاورة',
            'name_fr' => 'Taoura',
            'wilaya_id' => '41',
        ],
        [

            'name_ar' => 'الحدادة',
            'name_fr' => 'Haddada',
            'wilaya_id' => '41',
        ],
        [

            'name_ar' => 'المشروحة',
            'name_fr' => 'Mechroha',
            'wilaya_id' => '41',
        ],
        [

            'name_ar' => 'مداوروش',
            'name_fr' => "M'daourouche",
            'wilaya_id' => '41',
        ],
        [

            'name_ar' => 'المراهنة',
            'name_fr' => 'Merahna',
            'wilaya_id' => '41',
        ],
        [

            'name_ar' => 'أم العظايم',
            'name_fr' => 'Oum El Adhaim',
            'wilaya_id' => '41',
        ],
        [

            'name_ar' => 'سوق أهراس',
            'name_fr' => 'Souk Ahras',
            'wilaya_id' => '41',
        ],
        [

            'name_ar' => 'قوراية',
            'name_fr' => 'Gouraya',
            'wilaya_id' => '42',
        ],
        [

            'name_ar' => 'أحمر العين',
            'name_fr' => 'Ahmar El Ain',
            'wilaya_id' => '42',
        ],
        [

            'name_ar' => 'بواسماعيل',
            'name_fr' => 'Bou Ismail',
            'wilaya_id' => '42',
        ],
        [

            'name_ar' => 'القليعة',
            'name_fr' => 'Kolea',
            'wilaya_id' => '42',
        ],
        [

            'name_ar' => 'الداموس',
            'name_fr' => 'Damous',
            'wilaya_id' => '42',
        ],
        [

            'name_ar' => 'شرشال',
            'name_fr' => 'Cherchell',
            'wilaya_id' => '42',
        ],
        [

            'name_ar' => 'فوكة',
            'name_fr' => 'Fouka',
            'wilaya_id' => '42',
        ],
        [

            'name_ar' => 'حجوط',
            'name_fr' => 'Hadjout',
            'wilaya_id' => '42',
        ],
        [

            'name_ar' => 'سيدي أعمر',
            'name_fr' => 'Sidi Amar',
            'wilaya_id' => '42',
        ],
        [

            'name_ar' => 'تيبازة',
            'name_fr' => 'Tipaza',
            'wilaya_id' => '42',
        ],
        [

            'name_ar' => 'وادي النجاء',
            'name_fr' => 'Oued Endja',
            'wilaya_id' => '43',
        ],
        [

            'name_ar' => 'عين البيضاء أحريش',
            'name_fr' => 'Ain Beida Harriche',
            'wilaya_id' => '43',
        ],
        [

            'name_ar' => 'شلغوم العيد',
            'name_fr' => 'Chelghoum Laid',
            'wilaya_id' => '43',
        ],
        [

            'name_ar' => 'ميلة',
            'name_fr' => 'Mila',
            'wilaya_id' => '43',
        ],
        [

            'name_ar' => 'ترعي باينان',
            'name_fr' => 'Terrai Bainen',
            'wilaya_id' => '43',
        ],
        [

            'name_ar' => 'تاجنانت',
            'name_fr' => 'Tadjenanet',
            'wilaya_id' => '43',
        ],
        [

            'name_ar' => 'بوحاتم',
            'name_fr' => 'Bouhatem',
            'wilaya_id' => '43',
        ],
        [

            'name_ar' => 'سيدي مروان',
            'name_fr' => 'Sidi Merouane',
            'wilaya_id' => '43',
        ],
        [

            'name_ar' => 'التلاغمة',
            'name_fr' => 'Teleghma',
            'wilaya_id' => '43',
        ],
        [

            'name_ar' => 'فرجيوة',
            'name_fr' => 'Ferdjioua',
            'wilaya_id' => '43',
        ],
        [

            'name_ar' => 'القرارم قوقة',
            'name_fr' => 'Grarem Gouga',
            'wilaya_id' => '43',
        ],
        [

            'name_ar' => 'تسدان حدادة',
            'name_fr' => 'Tassadane Haddada',
            'wilaya_id' => '43',
        ],
        [

            'name_ar' => 'الرواشد',
            'name_fr' => 'Rouached',
            'wilaya_id' => '43',
        ],
        [

            'name_ar' => 'حمام ريغة',
            'name_fr' => 'Hammam Righa',
            'wilaya_id' => '44',
        ],
        [

            'name_ar' => 'العبادية',
            'name_fr' => 'El Abadia',
            'wilaya_id' => '44',
        ],
        [

            'name_ar' => 'عين الدفلى',
            'name_fr' => 'Ain Defla',
            'wilaya_id' => '44',
        ],
        [

            'name_ar' => 'عين الاشياخ',
            'name_fr' => 'Ain Lechiakh',
            'wilaya_id' => '44',
        ],
        [

            'name_ar' => 'العامرة',
            'name_fr' => 'El Amra',
            'wilaya_id' => '44',
        ],
        [

            'name_ar' => 'جندل',
            'name_fr' => 'Djendel',
            'wilaya_id' => '44',
        ],
        [

            'name_ar' => 'بطحية',
            'name_fr' => 'Bathia',
            'wilaya_id' => '44',
        ],
        [

            'name_ar' => 'مليانة',
            'name_fr' => 'Miliana',
            'wilaya_id' => '44',
        ],
        [

            'name_ar' => 'برج الأمير خالد',
            'name_fr' => 'Bordj El Emir Khaled',
            'wilaya_id' => '44',
        ],
        [

            'name_ar' => 'بومدفع',
            'name_fr' => 'Boumedfaa',
            'wilaya_id' => '44',
        ],
        [

            'name_ar' => 'جليدة',
            'name_fr' => 'Djelida',
            'wilaya_id' => '44',
        ],
        [

            'name_ar' => 'العطاف',
            'name_fr' => 'El Attaf',
            'wilaya_id' => '44',
        ],
        [

            'name_ar' => 'الروينة',
            'name_fr' => 'Rouina',
            'wilaya_id' => '44',
        ],
        [

            'name_ar' => 'خميس',
            'name_fr' => 'Khemis',
            'wilaya_id' => '44',
        ],
        [

            'name_ar' => 'المشرية',
            'name_fr' => 'Mecheria',
            'wilaya_id' => '45',
        ],
        [

            'name_ar' => 'عين الصفراء',
            'name_fr' => 'Ain Sefra',
            'wilaya_id' => '45',
        ],
        [

            'name_ar' => 'عسلة',
            'name_fr' => 'Asla',
            'wilaya_id' => '45',
        ],
        [

            'name_ar' => 'مغرار',
            'name_fr' => 'Moghrar',
            'wilaya_id' => '45',
        ],
        [

            'name_ar' => 'مكمن بن عمار',
            'name_fr' => 'Mekmen Ben Amar',
            'wilaya_id' => '45',
        ],
        [

            'name_ar' => 'النعامة',
            'name_fr' => 'Naama',
            'wilaya_id' => '45',
        ],
        [

            'name_ar' => 'سفيسيفة',
            'name_fr' => 'Sfissifa',
            'wilaya_id' => '45',
        ],
        [

            'name_ar' => 'عين الكيحل',
            'name_fr' => 'Ain Kihel',
            'wilaya_id' => '46',
        ],
        [

            'name_ar' => 'عين الأربعاء',
            'name_fr' => 'Ain Larbaa',
            'wilaya_id' => '46',
        ],
        [

            'name_ar' => 'عين تموشنت',
            'name_fr' => 'Ain Temouchent',
            'wilaya_id' => '46',
        ],
        [

            'name_ar' => 'بني صاف',
            'name_fr' => 'Beni Saf',
            'wilaya_id' => '46',
        ],
        [

            'name_ar' => 'العامرية',
            'name_fr' => 'El Amria',
            'wilaya_id' => '46',
        ],
        [

            'name_ar' => 'المالح',
            'name_fr' => 'El Maleh',
            'wilaya_id' => '46',
        ],
        [

            'name_ar' => 'حمام بوحجر',
            'name_fr' => 'Hammam Bou Hadjar',
            'wilaya_id' => '46',
        ],
        [

            'name_ar' => 'ولهاصة الغرابة',
            'name_fr' => 'Oulhassa Gheraba',
            'wilaya_id' => '46',
        ],
        [

            'name_ar' => 'بريان',
            'name_fr' => 'Berriane',
            'wilaya_id' => '47',
        ],
        [

            'name_ar' => 'بونورة',
            'name_fr' => 'Bounoura',
            'wilaya_id' => '47',
        ],
        [

            'name_ar' => 'ضاية بن ضحوة',
            'name_fr' => 'Dhayet Ben Dhahoua',
            'wilaya_id' => '47',
        ],
        [

            'name_ar' => 'المنيعة',
            'name_fr' => 'El Menia',
            'wilaya_id' => '58',
        ],
        [

            'name_ar' => 'غرداية',
            'name_fr' => 'Ghardaia',
            'wilaya_id' => '47',
        ],
        [

            'name_ar' => 'القرارة',
            'name_fr' => 'El Guerrara',
            'wilaya_id' => '47',
        ],
        [

            'name_ar' => 'المنصورة',
            'name_fr' => 'Mansourah',
            'wilaya_id' => '58',
        ],
        [

            'name_ar' => 'المنصورة',
            'name_fr' => 'Mansourah',
            'wilaya_id' => '47',
        ],
        [

            'name_ar' => 'متليلي',
            'name_fr' => 'Metlili',
            'wilaya_id' => '47',
        ],
        [

            'name_ar' => 'زلفانة',
            'name_fr' => 'Zelfana',
            'wilaya_id' => '47',
        ],
        [

            'name_ar' => 'يلل',
            'name_fr' => 'Yellel',
            'wilaya_id' => '48',
        ],
        [

            'name_ar' => 'عين طارق',
            'name_fr' => 'Ain Tarek',
            'wilaya_id' => '48',
        ],
        [

            'name_ar' => 'عمي موسى',
            'name_fr' => 'Ammi Moussa',
            'wilaya_id' => '48',
        ],
        [

            'name_ar' => 'المطمر',
            'name_fr' => 'El Matmar',
            'wilaya_id' => '48',
        ],
        [

            'name_ar' => 'غليزان',
            'name_fr' => 'Relizane',
            'wilaya_id' => '48',
        ],
        [

            'name_ar' => 'زمورة',
            'name_fr' => 'Zemmoura',
            'wilaya_id' => '48',
        ],
        [

            'name_ar' => 'سيدي أمحمد بن علي',
            'name_fr' => "Sidi M'hamed Ben Ali",
            'wilaya_id' => '48',
        ],
        [

            'name_ar' => 'جديوية',
            'name_fr' => 'Djidiouia',
            'wilaya_id' => '48',
        ],
        [

            'name_ar' => 'الحمادنة',
            'name_fr' => "El H'madna",
            'wilaya_id' => '48',
        ],
        [

            'name_ar' => 'مازونة',
            'name_fr' => 'Mazouna',
            'wilaya_id' => '48',
        ],
        [

            'name_ar' => 'وادي رهيو',
            'name_fr' => 'Oued Rhiou',
            'wilaya_id' => '48',
        ],
        [

            'name_ar' => 'منداس',
            'name_fr' => 'Mendes',
            'wilaya_id' => '48',
        ],
        [

            'name_ar' => 'الرمكة',
            'name_fr' => 'Ramka',
            'wilaya_id' => '48',
        ],
    ];

    public function run()
    {
        DB::table('dairas')->insert($this->dairas);
    }
}

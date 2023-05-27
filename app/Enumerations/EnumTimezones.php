<?php

namespace App\Enumerations;


enum EnumTimezones: int
{

    case DEFAULT_UTC = 0;
    case US_SAMOA = 1;
    case US_HAWAII = 2;
    case US_ALASKA = 3;
    case US_PACIFIC = 4;
    case AMERICA_TIJUANA = 5;
    case US_ARIZONA = 6;
    case US_MOUNTAIN = 7;
    case AMERICA_CHIHUAHUA = 8;
    case AMERICA_MAZATLAN = 9;
    case AMERICA_MEXICO_CITY  = 10;
    case AMERICA_MONTERREY = 11;
    case CANADA_SASKATCHEWAN  = 12;
    case US_CENTRAL = 13;
    case US_EASTERN = 14;
    case US_EAST_INDIANA = 15;
    case AMERICA_BOGOTA = 16;
    case AMERICA_LIMA   = 17;
    case AMERICA_CARACAS = 18;
    case CANADA_ATLANTIC = 19;
    case AMERICA_LA_PAZ = 20;
    case AMERICA_SANTIAGO = 21;
    case CANADA_NEWFOUNDLAND  = 22;
    case AMERICA_BUENOS_AIRES = 23;
    case GREENLAND = 24;
    case ATLANTIC_STANLEY = 25;
    case ATLANTIC_AZORES = 26;
    case ATLANTIC_CAPE_VERDE  = 27;
    case AFRICA_CASABLANCA = 28;
    case EUROPE_DUBLIN  = 29;
    case EUROPE_LISBON  = 30;
    case EUROPE_LONDON  = 31;
    case AFRICA_MONROVIA = 32;
    case EUROPE_AMSTERDAM = 33;
    case EUROPE_BELGRADE = 34;
    case EUROPE_BERLIN  = 35;
    case EUROPE_BRATISLAVA = 36;
    case EUROPE_BRUSSELS = 37;
    case EUROPE_BUDAPEST = 38;
    case EUROPE_COPENHAGEN = 39;
    case EUROPE_LJUBLJANA = 40;
    case EUROPE_MADRID  = 41;
    case EUROPE_PARIS   = 42;
    case EUROPE_PRAGUE  = 43;
    case EUROPE_ROME = 44;
    case EUROPE_SARAJEVO = 45;
    case EUROPE_SKOPJE  = 46;
    case EUROPE_STOCKHOLM = 47;
    case EUROPE_VIENNA  = 48;
    case EUROPE_WARSAW  = 49;
    case EUROPE_ZAGREB  = 50;
    case EUROPE_ATHENS  = 51;
    case EUROPE_BUCHAREST = 52;
    case AFRICA_CAIRO   = 53;
    case AFRICA_HARARE  = 54;
    case EUROPE_HELSINKI = 55;
    case EUROPE_ISTANBUL = 56;
    case ASIA_JERUSALEM = 57;
    case EUROPE_KIEV = 58;
    case EUROPE_MINSK   = 59;
    case EUROPE_RIGA = 60;
    case EUROPE_SOFIA   = 61;
    case EUROPE_TALLINN = 62;
    case EUROPE_VILNIUS = 63;
    case ASIA_BAGHDAD   = 64;
    case ASIA_KUWAIT = 66;
    case AFRICA_NAIROBI = 67;
    case ASIA_RIYADH = 68;
    case EUROPE_MOSCOW  = 69;
    case ASIA_TEHRAN = 70;
    case ASIA_BAKU = 71;
    case EUROPE_VOLGOGRAD = 72;
    case ASIA_MUSCAT = 73;
    case ASIA_TBILISI   = 74;
    case ASIA_YEREVAN   = 75;
    case ASIA_KABUL = 76;
    case ASIA_KARACHI   = 77;
    case ASIA_TASHKENT  = 78;
    case ASIA_KOLKATA   = 79;
    case ASIA_KATHMANDU = 80;
    case ASIA_YEKATERINBURG   = 81;
    case ASIA_ALMATY = 82;
    case ASIA_DHAKA = 83;
    case ASIA_NOVOSIBIRSK = 84;
    case ASIA_BANGKOK   = 85;
    case ASIA_JAKARTA   = 86;
    case ASIA_KRASNOYARSK = 87;
    case ASIA_CHONGQING = 88;
    case ASIA_HONG_KONG = 89;
    case ASIA_KUALA_LUMPUR = 90;
    case AUSTRALIA_PERTH = 91;
    case ASIA_SINGAPORE = 92;
    case ASIA_TAIPEI = 93;
    case ASIA_ULAANBAATAR = 94;
    case ASIA_URUMQI = 95;
    case ASIA_IRKUTSK   = 96;
    case ASIA_SEOUL = 97;
    case ASIA_TOKYO = 98;
    case AUSTRALIA_ADELAIDE   = 99;
    case AUSTRALIA_DARWIN = 100;
    case ASIA_YAKUTSK   = 111;
    case AUSTRALIA_BRISBANE   = 102;
    case AUSTRALIA_CANBERRA   = 103;
    case PACIFIC_GUAM   = 104;
    case AUSTRALIA_HOBART = 105;
    case AUSTRALIA_MELBOURNE  = 106;
    case PACIFIC_PORT_MORESBY = 107;
    case AUSTRALIA_SYDNEY = 108;
    case ASIA_VLADIVOSTOK = 109;
    case ASIA_MAGADAN   = 110;
    case PACIFIC_AUCKLAND = 111;
    case PACIFIC_FIJI   = 112;
    case PACIFIC_MIDWAY = 113;

    public function timezones()
    {
        return  [
            self::DEFAULT_UTC->value => '(GMT-00:00) UTC',
            self::US_SAMOA->value => '(GMT-11:00) Midway Island',
            self::US_HAWAII->value => '(GMT-11:00) Samoa',
            self::US_ALASKA->value => '(GMT-10:00) Hawaii',
            self::US_PACIFIC->value => '(GMT-09:00) Alaska',
            self::AMERICA_TIJUANA->value => '(GMT-08:00) Pacific Time (US &amp; Canada)',
            self::US_ARIZONA->value => '(GMT-08:00) Tijuana',
            self::US_MOUNTAIN->value => '(GMT-07:00) Arizona',
            self::AMERICA_CHIHUAHUA->value => '(GMT-07:00) Mountain Time (US &amp; Canada)',
            self::AMERICA_MAZATLAN->value => '(GMT-07:00) Chihuahua',
            self::AMERICA_MEXICO_CITY->value => '(GMT-07:00) Mazatlan',
            self::AMERICA_MONTERREY->value  => '(GMT-06:00) Mexico City',
            self::CANADA_SASKATCHEWAN->value => '(GMT-06:00) Monterrey',
            self::US_CENTRAL->value  => '(GMT-06:00) Saskatchewan',
            self::US_EASTERN->value => '(GMT-06:00) Central Time (US &amp; Canada)',
            self::US_EAST_INDIANA->value => '(GMT-05:00) Eastern Time (US &amp; Canada)',
            self::AMERICA_BOGOTA->value => '(GMT-05:00) Indiana (East)',
            self::AMERICA_LIMA->value => '(GMT-05:00) Bogota',
            self::AMERICA_CARACAS->value   => '(GMT-05:00) Lima',
            self::CANADA_ATLANTIC->value => '(GMT-04:30) Caracas',
            self::AMERICA_LA_PAZ->value => '(GMT-04:00) Atlantic Time (Canada)',
            self::AMERICA_SANTIAGO->value => '(GMT-04:00) La Paz',
            self::CANADA_NEWFOUNDLAND->value => '(GMT-04:00) Santiago',
            self::AMERICA_BUENOS_AIRES->value  => '(GMT-03:30) Newfoundland',
            self::GREENLAND->value => '(GMT-03:00) Buenos Aires',
            self::ATLANTIC_STANLEY->value => '(GMT-03:00) Greenland',
            self::ATLANTIC_AZORES->value => '(GMT-02:00) Stanley',
            self::ATLANTIC_CAPE_VERDE->value => '(GMT-01:00) Azores',
            self::AFRICA_CASABLANCA->value  => '(GMT-01:00) Cape Verde Is.',
            self::EUROPE_DUBLIN->value => '(GMT) Casablanca',
            self::EUROPE_LISBON->value  => '(GMT) Dublin',
            self::EUROPE_LONDON->value  => '(GMT) Lisbon',
            self::AFRICA_MONROVIA->value  => '(GMT) London',
            self::EUROPE_AMSTERDAM->value => '(GMT) Monrovia',
            self::EUROPE_BELGRADE->value => '(GMT+01:00) Amsterdam',
            self::EUROPE_BERLIN->value => '(GMT+01:00) Belgrade',
            self::EUROPE_BRATISLAVA->value  => '(GMT+01:00) Berlin',
            self::EUROPE_BRUSSELS->value => '(GMT+01:00) Bratislava',
            self::EUROPE_BUDAPEST->value => '(GMT+01:00) Brussels',
            self::EUROPE_COPENHAGEN->value => '(GMT+01:00) Budapest',
            self::EUROPE_LJUBLJANA->value => '(GMT+01:00) Copenhagen',
            self::EUROPE_MADRID->value => '(GMT+01:00) Ljubljana',
            self::EUROPE_PARIS->value  => '(GMT+01:00) Madrid',
            self::EUROPE_PRAGUE->value   => '(GMT+01:00) Paris',
            self::EUROPE_ROME->value  => '(GMT+01:00) Prague',
            self::EUROPE_SARAJEVO->value => '(GMT+01:00) Rome',
            self::EUROPE_SKOPJE->value => '(GMT+01:00) Sarajevo',
            self::EUROPE_STOCKHOLM->value  => '(GMT+01:00) Skopje',
            self::EUROPE_VIENNA->value => '(GMT+01:00) Stockholm',
            self::EUROPE_WARSAW->value  => '(GMT+01:00) Vienna',
            self::EUROPE_ZAGREB->value  => '(GMT+01:00) Warsaw',
            self::EUROPE_ATHENS->value  => '(GMT+01:00) Zagreb',
            self::EUROPE_BUCHAREST->value  => '(GMT+02:00) Athens',
            self::AFRICA_HARARE->value => '(GMT+02:00) Bucharest',
            self::EUROPE_HELSINKI->value   => '(GMT+02:00) Cairo',
            self::EUROPE_ISTANBUL->value  => '(GMT+02:00) Harare',
            self::ASIA_JERUSALEM->value => '(GMT+02:00) Helsinki',
            self::EUROPE_MINSK->value => '(GMT+02:00) Istanbul',
            self::EUROPE_RIGA->value => '(GMT+02:00) Jerusalem',
            self::EUROPE_SOFIA->value => '(GMT+02:00) Kyiv',
            self::EUROPE_TALLINN->value   => '(GMT+02:00) Minsk',
            self::EUROPE_VILNIUS->value   => '(GMT+02:00) Riga',
            self::ASIA_BAGHDAD->value   => '(GMT+02:00) Sofia',
            self::ASIA_KUWAIT->value => '(GMT+02:00) Tallinn',
            self::AFRICA_NAIROBI->value => '(GMT+02:00) Vilnius',
            self::ASIA_RIYADH->value   => '(GMT+03:00) Baghdad',
            self::EUROPE_MOSCOW->value => '(GMT+03:00) Kuwait',
            self::ASIA_TEHRAN->value => '(GMT+03:00) Nairobi',
            self::ASIA_BAKU->value => '(GMT+03:00) Riyadh',
            self::EUROPE_VOLGOGRAD->value  => '(GMT+03:00) Moscow',
            self::ASIA_MUSCAT->value => '(GMT+03:30) Tehran',
            self::ASIA_TBILISI->value => '(GMT+04:00) Baku',
            self::ASIA_YEREVAN->value => '(GMT+04:00) Volgograd',
            self::ASIA_KABUL->value => '(GMT+04:00) Muscat',
            self::ASIA_KARACHI->value   => '(GMT+04:00) Tbilisi',
            self::ASIA_TASHKENT->value   => '(GMT+04:00) Yerevan',
            self::ASIA_KOLKATA->value => '(GMT+04:30) Kabul',
            self::ASIA_KATHMANDU->value   => '(GMT+05:00) Karachi',
            self::ASIA_YEKATERINBURG->value  => '(GMT+05:00) Tashkent',
            self::ASIA_ALMATY->value   => '(GMT+05:30) Kolkata',
            self::ASIA_DHAKA->value => '(GMT+05:45) Kathmandu',
            self::ASIA_NOVOSIBIRSK->value   => '(GMT+06:00) Ekaterinburg',
            self::ASIA_BANGKOK->value => '(GMT+06:00) Almaty',
            self::ASIA_JAKARTA->value => '(GMT+06:00) Dhaka',
            self::ASIA_KRASNOYARSK->value => '(GMT+07:00) Novosibirsk',
            self::ASIA_CHONGQING->value   => '(GMT+07:00) Bangkok',
            self::ASIA_HONG_KONG->value   => '(GMT+07:00) Jakarta',
            self::ASIA_KUALA_LUMPUR->value => '(GMT+08:00) Krasnoyarsk',
            self::AUSTRALIA_PERTH->value => '(GMT+08:00) Chongqing',
            self::ASIA_SINGAPORE->value => '(GMT+08:00) Hong Kong',
            self::ASIA_TAIPEI->value => '(GMT+08:00) Kuala Lumpur',
            self::ASIA_ULAANBAATAR->value => '(GMT+08:00) Perth',
            self::ASIA_URUMQI->value => '(GMT+08:00) Singapore',
            self::ASIA_IRKUTSK->value => '(GMT+08:00) Taipei',
            self::ASIA_SEOUL->value => '(GMT+08:00) Ulaan Bataar',
            self::ASIA_TOKYO->value => '(GMT+08:00) Urumqi',
            self::AUSTRALIA_ADELAIDE->value   => '(GMT+09:00) Irkutsk',
            self::AUSTRALIA_DARWIN->value => '(GMT+09:00) Seoul',
            self::ASIA_YAKUTSK->value => '(GMT+09:00) Tokyo',
            self::AUSTRALIA_BRISBANE->value   => '(GMT+09:30) Adelaide',
            self::AUSTRALIA_CANBERRA->value => '(GMT+09:30) Darwin',
            self::PACIFIC_GUAM->value   => '(GMT+10:00) Yakutsk',
            self::AUSTRALIA_HOBART->value   => '(GMT+10:00) Brisbane',
            self::AUSTRALIA_MELBOURNE->value   => '(GMT+10:00) Canberra',
            self::PACIFIC_PORT_MORESBY->value   => '(GMT+10:00) Guam',
            self::AUSTRALIA_SYDNEY->value => '(GMT+10:00) Hobart',
            self::ASIA_VLADIVOSTOK->value  => '(GMT+10:00) Melbourne',
            self::ASIA_MAGADAN->value => '(GMT+10:00) Port Moresby',
            self::PACIFIC_AUCKLAND->value => '(GMT+10:00) Sydney',
            self::PACIFIC_FIJI->value => '(GMT+11:00) Vladivostok',
            self::PACIFIC_MIDWAY->value   => '(GMT+12:00) Magadan',
            self::DEFAULT_UTC->value => '(GMT+12:00) Auckland',
            self::DEFAULT_UTC->value   => '(GMT+12:00) Fiji',
        ];
    }

    public function descriptions()
    {
        return  [
            'Pacific/Midway' => '(GMT-11:00) Midway Island',
            'US/Samoa' => '(GMT-11:00) Samoa',
            'US/Hawaii' => '(GMT-10:00) Hawaii',
            'US/Alaska' => '(GMT-09:00) Alaska',
            'US/Pacific' => '(GMT-08:00) Pacific Time (US &amp; Canada)',
            'America/Tijuana' => '(GMT-08:00) Tijuana',
            'US/Arizona' => '(GMT-07:00) Arizona',
            'US/Mountain' => '(GMT-07:00) Mountain Time (US &amp; Canada)',
            'America/Chihuahua' => '(GMT-07:00) Chihuahua',
            'America/Mazatlan' => '(GMT-07:00) Mazatlan',
            'America/Mexico_City'  => '(GMT-06:00) Mexico City',
            'America/Monterrey' => '(GMT-06:00) Monterrey',
            'Canada/Saskatchewan'  => '(GMT-06:00) Saskatchewan',
            'US/Central' => '(GMT-06:00) Central Time (US &amp; Canada)',
            'US/Eastern' => '(GMT-05:00) Eastern Time (US &amp; Canada)',
            'US/East-Indiana' => '(GMT-05:00) Indiana (East)',
            'America/Bogota' => '(GMT-05:00) Bogota',
            'America/Lima'   => '(GMT-05:00) Lima',
            'America/Caracas' => '(GMT-04:30) Caracas',
            'Canada/Atlantic' => '(GMT-04:00) Atlantic Time (Canada)',
            'America/La_Paz' => '(GMT-04:00) La Paz',
            'America/Santiago' => '(GMT-04:00) Santiago',
            'Canada/Newfoundland'  => '(GMT-03:30) Newfoundland',
            'America/Buenos_Aires' => '(GMT-03:00) Buenos Aires',
            'Greenland' => '(GMT-03:00) Greenland',
            'Atlantic/Stanley' => '(GMT-02:00) Stanley',
            'Atlantic/Azores' => '(GMT-01:00) Azores',
            'Atlantic/Cape_Verde'  => '(GMT-01:00) Cape Verde Is.',
            'Africa/Casablanca' => '(GMT) Casablanca',
            'Europe/Dublin'  => '(GMT) Dublin',
            'Europe/Lisbon'  => '(GMT) Lisbon',
            'Europe/London'  => '(GMT) London',
            'Africa/Monrovia' => '(GMT) Monrovia',
            'Europe/Amsterdam' => '(GMT+01:00) Amsterdam',
            'Europe/Belgrade' => '(GMT+01:00) Belgrade',
            'Europe/Berlin'  => '(GMT+01:00) Berlin',
            'Europe/Bratislava' => '(GMT+01:00) Bratislava',
            'Europe/Brussels' => '(GMT+01:00) Brussels',
            'Europe/Budapest' => '(GMT+01:00) Budapest',
            'Europe/Copenhagen' => '(GMT+01:00) Copenhagen',
            'Europe/Ljubljana' => '(GMT+01:00) Ljubljana',
            'Europe/Madrid'  => '(GMT+01:00) Madrid',
            'Europe/Paris'   => '(GMT+01:00) Paris',
            'Europe/Prague'  => '(GMT+01:00) Prague',
            'Europe/Rome' => '(GMT+01:00) Rome',
            'Europe/Sarajevo' => '(GMT+01:00) Sarajevo',
            'Europe/Skopje'  => '(GMT+01:00) Skopje',
            'Europe/Stockholm' => '(GMT+01:00) Stockholm',
            'Europe/Vienna'  => '(GMT+01:00) Vienna',
            'Europe/Warsaw'  => '(GMT+01:00) Warsaw',
            'Europe/Zagreb'  => '(GMT+01:00) Zagreb',
            'Europe/Athens'  => '(GMT+02:00) Athens',
            'Europe/Bucharest' => '(GMT+02:00) Bucharest',
            'Africa/Cairo'   => '(GMT+02:00) Cairo',
            'Africa/Harare'  => '(GMT+02:00) Harare',
            'Europe/Helsinki' => '(GMT+02:00) Helsinki',
            'Europe/Istanbul' => '(GMT+02:00) Istanbul',
            'Asia/Jerusalem' => '(GMT+02:00) Jerusalem',
            'Europe/Kiev' => '(GMT+02:00) Kyiv',
            'Europe/Minsk'   => '(GMT+02:00) Minsk',
            'Europe/Riga' => '(GMT+02:00) Riga',
            'Europe/Sofia'   => '(GMT+02:00) Sofia',
            'Europe/Tallinn' => '(GMT+02:00) Tallinn',
            'Europe/Vilnius' => '(GMT+02:00) Vilnius',
            'Asia/Baghdad'   => '(GMT+03:00) Baghdad',
            'Asia/Kuwait' => '(GMT+03:00) Kuwait',
            'Africa/Nairobi' => '(GMT+03:00) Nairobi',
            'Asia/Riyadh' => '(GMT+03:00) Riyadh',
            'Europe/Moscow'  => '(GMT+03:00) Moscow',
            'Asia/Tehran' => '(GMT+03:30) Tehran',
            'Asia/Baku' => '(GMT+04:00) Baku',
            'Europe/Volgograd' => '(GMT+04:00) Volgograd',
            'Asia/Muscat' => '(GMT+04:00) Muscat',
            'Asia/Tbilisi'   => '(GMT+04:00) Tbilisi',
            'Asia/Yerevan'   => '(GMT+04:00) Yerevan',
            'Asia/Kabul' => '(GMT+04:30) Kabul',
            'Asia/Karachi'   => '(GMT+05:00) Karachi',
            'Asia/Tashkent'  => '(GMT+05:00) Tashkent',
            'Asia/Kolkata'   => '(GMT+05:30) Kolkata',
            'Asia/Kathmandu' => '(GMT+05:45) Kathmandu',
            'Asia/Yekaterinburg'   => '(GMT+06:00) Ekaterinburg',
            'Asia/Almaty' => '(GMT+06:00) Almaty',
            'Asia/Dhaka' => '(GMT+06:00) Dhaka',
            'Asia/Novosibirsk' => '(GMT+07:00) Novosibirsk',
            'Asia/Bangkok'   => '(GMT+07:00) Bangkok',
            'Asia/Jakarta'   => '(GMT+07:00) Jakarta',
            'Asia/Krasnoyarsk' => '(GMT+08:00) Krasnoyarsk',
            'Asia/Chongqing' => '(GMT+08:00) Chongqing',
            'Asia/Hong_Kong' => '(GMT+08:00) Hong Kong',
            'Asia/Kuala_Lumpur' => '(GMT+08:00) Kuala Lumpur',
            'Australia/Perth' => '(GMT+08:00) Perth',
            'Asia/Singapore' => '(GMT+08:00) Singapore',
            'Asia/Taipei' => '(GMT+08:00) Taipei',
            'Asia/Ulaanbaatar' => '(GMT+08:00) Ulaan Bataar',
            'Asia/Urumqi' => '(GMT+08:00) Urumqi',
            'Asia/Irkutsk'   => '(GMT+09:00) Irkutsk',
            'Asia/Seoul' => '(GMT+09:00) Seoul',
            'Asia/Tokyo' => '(GMT+09:00) Tokyo',
            'Australia/Adelaide'   => '(GMT+09:30) Adelaide',
            'Australia/Darwin' => '(GMT+09:30) Darwin',
            'Asia/Yakutsk'   => '(GMT+10:00) Yakutsk',
            'Australia/Brisbane'   => '(GMT+10:00) Brisbane',
            'Australia/Canberra'   => '(GMT+10:00) Canberra',
            'Pacific/Guam'   => '(GMT+10:00) Guam',
            'Australia/Hobart' => '(GMT+10:00) Hobart',
            'Australia/Melbourne'  => '(GMT+10:00) Melbourne',
            'Pacific/Port_Moresby' => '(GMT+10:00) Port Moresby',
            'Australia/Sydney' => '(GMT+10:00) Sydney',
            'Asia/Vladivostok' => '(GMT+11:00) Vladivostok',
            'Asia/Magadan'   => '(GMT+12:00) Magadan',
            'Pacific/Auckland' => '(GMT+12:00) Auckland',
            'Pacific/Fiji'   => '(GMT+12:00) Fiji',
        ];
    }

    public function teste()
    {
        $timezones = array(
            'Pacific/Midway' => '(GMT-11:00) Midway Island',
            'US/Samoa' => '(GMT-11:00) Samoa',
            'US/Hawaii' => '(GMT-10:00) Hawaii',
            'US/Alaska' => '(GMT-09:00) Alaska',
            'US/Pacific' => '(GMT-08:00) Pacific Time (US &amp; Canada)',
            'America/Tijuana' => '(GMT-08:00) Tijuana',
            'US/Arizona' => '(GMT-07:00) Arizona',
            'US/Mountain' => '(GMT-07:00) Mountain Time (US &amp; Canada)',
            'America/Chihuahua' => '(GMT-07:00) Chihuahua',
            'America/Mazatlan' => '(GMT-07:00) Mazatlan',
            'America/Mexico_City'  => '(GMT-06:00) Mexico City',
            'America/Monterrey' => '(GMT-06:00) Monterrey',
            'Canada/Saskatchewan'  => '(GMT-06:00) Saskatchewan',
            'US/Central' => '(GMT-06:00) Central Time (US &amp; Canada)',
            'US/Eastern' => '(GMT-05:00) Eastern Time (US &amp; Canada)',
            'US/East-Indiana' => '(GMT-05:00) Indiana (East)',
            'America/Bogota' => '(GMT-05:00) Bogota',
            'America/Lima'   => '(GMT-05:00) Lima',
            'America/Caracas' => '(GMT-04:30) Caracas',
            'Canada/Atlantic' => '(GMT-04:00) Atlantic Time (Canada)',
            'America/La_Paz' => '(GMT-04:00) La Paz',
            'America/Santiago' => '(GMT-04:00) Santiago',
            'Canada/Newfoundland'  => '(GMT-03:30) Newfoundland',
            'America/Buenos_Aires' => '(GMT-03:00) Buenos Aires',
            'Greenland' => '(GMT-03:00) Greenland',
            'Atlantic/Stanley' => '(GMT-02:00) Stanley',
            'Atlantic/Azores' => '(GMT-01:00) Azores',
            'Atlantic/Cape_Verde'  => '(GMT-01:00) Cape Verde Is.',
            'Africa/Casablanca' => '(GMT) Casablanca',
            'Europe/Dublin'  => '(GMT) Dublin',
            'Europe/Lisbon'  => '(GMT) Lisbon',
            'Europe/London'  => '(GMT) London',
            'Africa/Monrovia' => '(GMT) Monrovia',
            'Europe/Amsterdam' => '(GMT+01:00) Amsterdam',
            'Europe/Belgrade' => '(GMT+01:00) Belgrade',
            'Europe/Berlin'  => '(GMT+01:00) Berlin',
            'Europe/Bratislava' => '(GMT+01:00) Bratislava',
            'Europe/Brussels' => '(GMT+01:00) Brussels',
            'Europe/Budapest' => '(GMT+01:00) Budapest',
            'Europe/Copenhagen' => '(GMT+01:00) Copenhagen',
            'Europe/Ljubljana' => '(GMT+01:00) Ljubljana',
            'Europe/Madrid'  => '(GMT+01:00) Madrid',
            'Europe/Paris'   => '(GMT+01:00) Paris',
            'Europe/Prague'  => '(GMT+01:00) Prague',
            'Europe/Rome' => '(GMT+01:00) Rome',
            'Europe/Sarajevo' => '(GMT+01:00) Sarajevo',
            'Europe/Skopje'  => '(GMT+01:00) Skopje',
            'Europe/Stockholm' => '(GMT+01:00) Stockholm',
            'Europe/Vienna'  => '(GMT+01:00) Vienna',
            'Europe/Warsaw'  => '(GMT+01:00) Warsaw',
            'Europe/Zagreb'  => '(GMT+01:00) Zagreb',
            'Europe/Athens'  => '(GMT+02:00) Athens',
            'Europe/Bucharest' => '(GMT+02:00) Bucharest',
            'Africa/Cairo'   => '(GMT+02:00) Cairo',
            'Africa/Harare'  => '(GMT+02:00) Harare',
            'Europe/Helsinki' => '(GMT+02:00) Helsinki',
            'Europe/Istanbul' => '(GMT+02:00) Istanbul',
            'Asia/Jerusalem' => '(GMT+02:00) Jerusalem',
            'Europe/Kiev' => '(GMT+02:00) Kyiv',
            'Europe/Minsk'   => '(GMT+02:00) Minsk',
            'Europe/Riga' => '(GMT+02:00) Riga',
            'Europe/Sofia'   => '(GMT+02:00) Sofia',
            'Europe/Tallinn' => '(GMT+02:00) Tallinn',
            'Europe/Vilnius' => '(GMT+02:00) Vilnius',
            'Asia/Baghdad'   => '(GMT+03:00) Baghdad',
            'Asia/Kuwait' => '(GMT+03:00) Kuwait',
            'Africa/Nairobi' => '(GMT+03:00) Nairobi',
            'Asia/Riyadh' => '(GMT+03:00) Riyadh',
            'Europe/Moscow'  => '(GMT+03:00) Moscow',
            'Asia/Tehran' => '(GMT+03:30) Tehran',
            'Asia/Baku' => '(GMT+04:00) Baku',
            'Europe/Volgograd' => '(GMT+04:00) Volgograd',
            'Asia/Muscat' => '(GMT+04:00) Muscat',
            'Asia/Tbilisi'   => '(GMT+04:00) Tbilisi',
            'Asia/Yerevan'   => '(GMT+04:00) Yerevan',
            'Asia/Kabul' => '(GMT+04:30) Kabul',
            'Asia/Karachi'   => '(GMT+05:00) Karachi',
            'Asia/Tashkent'  => '(GMT+05:00) Tashkent',
            'Asia/Kolkata'   => '(GMT+05:30) Kolkata',
            'Asia/Kathmandu' => '(GMT+05:45) Kathmandu',
            'Asia/Yekaterinburg'   => '(GMT+06:00) Ekaterinburg',
            'Asia/Almaty' => '(GMT+06:00) Almaty',
            'Asia/Dhaka' => '(GMT+06:00) Dhaka',
            'Asia/Novosibirsk' => '(GMT+07:00) Novosibirsk',
            'Asia/Bangkok'   => '(GMT+07:00) Bangkok',
            'Asia/Jakarta'   => '(GMT+07:00) Jakarta',
            'Asia/Krasnoyarsk' => '(GMT+08:00) Krasnoyarsk',
            'Asia/Chongqing' => '(GMT+08:00) Chongqing',
            'Asia/Hong_Kong' => '(GMT+08:00) Hong Kong',
            'Asia/Kuala_Lumpur' => '(GMT+08:00) Kuala Lumpur',
            'Australia/Perth' => '(GMT+08:00) Perth',
            'Asia/Singapore' => '(GMT+08:00) Singapore',
            'Asia/Taipei' => '(GMT+08:00) Taipei',
            'Asia/Ulaanbaatar' => '(GMT+08:00) Ulaan Bataar',
            'Asia/Urumqi' => '(GMT+08:00) Urumqi',
            'Asia/Irkutsk'   => '(GMT+09:00) Irkutsk',
            'Asia/Seoul' => '(GMT+09:00) Seoul',
            'Asia/Tokyo' => '(GMT+09:00) Tokyo',
            'Australia/Adelaide'   => '(GMT+09:30) Adelaide',
            'Australia/Darwin' => '(GMT+09:30) Darwin',
            'Asia/Yakutsk'   => '(GMT+10:00) Yakutsk',
            'Australia/Brisbane'   => '(GMT+10:00) Brisbane',
            'Australia/Canberra'   => '(GMT+10:00) Canberra',
            'Pacific/Guam'   => '(GMT+10:00) Guam',
            'Australia/Hobart' => '(GMT+10:00) Hobart',
            'Australia/Melbourne'  => '(GMT+10:00) Melbourne',
            'Pacific/Port_Moresby' => '(GMT+10:00) Port Moresby',
            'Australia/Sydney' => '(GMT+10:00) Sydney',
            'Asia/Vladivostok' => '(GMT+11:00) Vladivostok',
            'Asia/Magadan'   => '(GMT+12:00) Magadan',
            'Pacific/Auckland' => '(GMT+12:00) Auckland',
            'Pacific/Fiji'   => '(GMT+12:00) Fiji',
        );
    }

    public function name(): string
    {
        return $this->name;
    }

    public function value(): int
    {
        return $this->value;
    }

    public function names(): array
    {
        $assoc = [];
        $list = self::cases();
        array_walk($list, function ($case) use (&$assoc) {
            $assoc[$case->value] = $case->name;
        });
        return $assoc;
    }

    public function values(): array
    {
        $assoc = [];
        $list = self::cases();
        array_walk($list, function ($case) use (&$assoc) {
            $assoc[$case->name] = $case->value;
        });
        return $assoc;
    }

    public function label(): string
    {
        return match ($this) {
            static::GENERATED => 'GENERATED',
            static::SENT_AND_RECEIVED_ASAAS => 'SENT_AND_RECEIVED_ASAAS',
            static::PENDING => 'PENDING',
            static::RECEIVED => 'RECEIVED',
            static::CONFIRMED => 'CONFIRMED',
            static::OVERDUE => 'OVERDUE',
            static::REFUNDED => 'REFUNDED',
            static::RECEIVED_IN_CASH => 'RECEIVED_IN_CASH',
            static::REFUND_REQUESTED => 'REFUND_REQUESTED',
            static::REFUND_IN_PROGRESS => 'REFUND_IN_PROGRESS',
            static::CHARGEBACK_REQUESTED => 'CHARGEBACK_REQUESTED',
            static::CHARGEBACK_DISPUTE => 'CHARGEBACK_DISPUTE',
            static::AWAITING_CHARGEBACK_REVERSAL => 'AWAITING_CHARGEBACK_REVERSAL',
            static::DUNNING_REQUESTED => 'DUNNING_REQUESTED',
            static::DUNNING_RECEIVED => 'DUNNING_RECEIVED',
            static::AWAITING_RISK_ANALYSIS => 'AWAITING_RISK_ANALYSIS',
            default => 'UNDEFINED'
        };
    }

    public function description(): string
    {
        return match ($this) {
            static::GENERATED => 'Registro gerado, porém não enviado a Asaas',
            static::SENT_AND_RECEIVED_ASAAS => 'Registro gerado enviado e retornado o relacionamento com registor da Asaas',
            static::PENDING => 'Aguardando pagamento',
            static::RECEIVED => 'Recebida (saldo já creditado na conta)',
            static::CONFIRMED => 'Pagamento confirmado (saldo ainda não creditado)',
            static::OVERDUE => 'Vencida',
            static::REFUNDED => 'Estornada',
            static::RECEIVED_IN_CASH => 'Recebida em dinheiro (não gera saldo na conta)',
            static::REFUND_REQUESTED => 'Estorno Solicitado',
            static::REFUND_IN_PROGRESS => 'Estorno em processamento (liquidação já está agendada, cobrança será estornada após executar a liquidação)',
            static::CHARGEBACK_REQUESTED => 'Recebido chargeback',
            static::CHARGEBACK_DISPUTE => 'Em disputa de chargeback (caso sejam apresentados documentos para contestação)',
            static::AWAITING_CHARGEBACK_REVERSAL => 'Disputa vencida, aguardando repasse da adquirente',
            static::DUNNING_REQUESTED => 'Em processo de negativação',
            static::DUNNING_RECEIVED => 'Recuperada',
            static::AWAITING_RISK_ANALYSIS => 'Pagamento em análise',
            default => 'UNDEFINED'
        };
    }

    public static function enum(int|string|null $value): static|null
    {
        $list = self::cases();
        $enums = array_filter($list, function ($case) use ($value) {
            return (is_numeric($value) && $case->value == $value) || (empty(is_numeric($value)) && $case->label() == $value);
        });
        return current($enums) ?: null;
    }

    public static function options(): array
    {
        $assoc = [];
        $list = self::cases();
        array_walk($list, function ($case) use (&$assoc) {
            $assoc[] = ['id' => $case->value, 'description' => $case->label()];
        });
        return $assoc;
    }

    public static function assoc(): array
    {
        $assoc = [];
        $list = self::cases();
        array_walk($list, function ($case) use (&$assoc) {
            $assoc[$case->value] = $case->label();
        });
        return $assoc;
    }
}

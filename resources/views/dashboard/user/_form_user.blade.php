{{-- <link rel="stylesheet" href="{{ asset('country/js/select2/select2-bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('country/js/select2/select2.css') }}">
<script src="{{ asset('country/js/select2/select2.min.js') }}"></script> --}}

<div class="card-header border-0 d-flex justify-content-between align-items-center">
    <h5 class="card-title">{{ $form_title }}</h5>
    <div>
        <a href="{{ url()->previous() }}" class="btn btn-cancel shadow-sm px-2 ms-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-arrow-left">
                <line x1="19" y1="12" x2="5" y2="12"></line>
                <polyline points="12 19 5 12 12 5"></polyline>
            </svg>
            <span>Cancel</span>
        </a>
        <x-BaseComponents.form.common.submit_button />

    </div>
    {{-- <button type="submit" class="btn btn-primary px-5">{{ str_word_count($form_title, 1)[0] ?? 'Save' }}</button> --}}
</div>
<hr class="hr p-0 mx-3 my-1">
<div class="card-body table-responsive p-4">
    <div class="row">

        {{-- <x-BaseComponents.form.common.input type="text" name="guard_name" :model="$user" /> --}}
        <x-BaseComponents.form.common.input type="text" name="name" :model="$user" />

        <x-BaseComponents.form.common.input type="email" name="email" :model="$user" />

        <x-BaseComponents.form.common.password name="password" :model="$user" />
        <x-BaseComponents.form.common.password name="confirm-password" :model="$user" />


        <div class="mb-3">
            <label class="form-label">Select Languages</label>
            <select name="languages[]" class="multiple-select" data-placeholder="Choose User Languages" multiple="multiple">
                <option value=""></option>
                <option value="AF"@selected(collect(old('languages', json_decode($user['languages'])))->contains('AF'))>Afrikaans</option>
                <option value="SQ"@selected(collect(old('languages', json_decode($user['languages'])))->contains('SQ'))>Albanian - shqip</option>
                <option value="AM"@selected(collect(old('languages', json_decode($user['languages'])))->contains('AM'))>Amharic - አማርኛ</option>
                <option value="AR" @selected(collect(old('languages', json_decode($user['languages'])))->contains('AR'))>Arabic - العربية</option>
                <option value="AN"@selected(collect(old('languages', json_decode($user['languages'])))->contains('AN'))>Aragonese - aragonés</option>
                <option value="HY"@selected(collect(old('languages', json_decode($user['languages'])))->contains('HY'))>Armenian - հայերեն</option>
                <option value="AST"@selected(collect(old('languages', json_decode($user['languages'])))->contains('AST'))>Asturian - asturianu</option>
                <option value="AZ"@selected(collect(old('languages', json_decode($user['languages'])))->contains('AZ'))>Azerbaijani - azərbaycan dili</option>
                <option value="EU"@selected(collect(old('languages', json_decode($user['languages'])))->contains('EU'))>Basque - euskara</option>
                <option value="BE"@selected(collect(old('languages', json_decode($user['languages'])))->contains('BE'))>Belarusian - беларуская</option>
                <option value="BN"@selected(collect(old('languages', json_decode($user['languages'])))->contains('BN'))>Bengali - বাংলা</option>
                <option value="BS"@selected(collect(old('languages', json_decode($user['languages'])))->contains('BS'))>Bosnian - bosanski</option>
                <option value="BR"@selected(collect(old('languages', json_decode($user['languages'])))->contains('BR'))>Breton - brezhoneg</option>
                <option value="BG"@selected(collect(old('languages', json_decode($user['languages'])))->contains('BG'))>Bulgarian - български</option>
                <option value="CA"@selected(collect(old('languages', json_decode($user['languages'])))->contains('CA'))>Catalan - català</option>
                <option value="CKB"@selected(collect(old('languages', json_decode($user['languages'])))->contains('CKB'))>Central Kurdish - کوردی (دەستنوسی عەرەبی)</option>
                <option value="ZH"@selected(collect(old('languages', json_decode($user['languages'])))->contains('ZH'))>Chinese - 中文</option>
                <option value="ZH-HK"@selected(collect(old('languages', json_decode($user['languages'])))->contains('ZH-HK'))>Chinese (Hong Kong) - 中文（香港）</option>
                <option value="ZH-CN"@selected(collect(old('languages', json_decode($user['languages'])))->contains('ZH-CN'))>Chinese (Simplified) - 中文（简体）</option>
                <option value="HR"@selected(collect(old('languages', json_decode($user['languages'])))->contains('HR'))>Croatian - hrvatski</option>
                <option value="CS"@selected(collect(old('languages', json_decode($user['languages'])))->contains('CS'))>Czech - čeština</option>
                <option value="DA"@selected(collect(old('languages', json_decode($user['languages'])))->contains('DA'))>Danish - dansk</option>
                <option value="NL"@selected(collect(old('languages', json_decode($user['languages'])))->contains('NL'))>Dutch - Nederlands</option>
                <option value="EN"@selected(collect(old('languages', json_decode($user['languages'])))->contains('EN'))>English</option>
                <option value="EN-AU"@selected(collect(old('languages', json_decode($user['languages'])))->contains('EN-AU'))>English (Australia)</option>
                <option value="EN-CA"@selected(collect(old('languages', json_decode($user['languages'])))->contains('EN-CA'))>English (Canada)</option>
                <option value="EN-IN"@selected(collect(old('languages', json_decode($user['languages'])))->contains('EN-IN'))>English (India)</option>
                <option value="EN-NZ"@selected(collect(old('languages', json_decode($user['languages'])))->contains('EN-NZ'))>English (New Zealand)</option>
                <option value="EN-ZA"@selected(collect(old('languages', json_decode($user['languages'])))->contains('EN-ZA'))>English (South Africa)</option>
                <option value="EN-GB"@selected(collect(old('languages', json_decode($user['languages'])))->contains('EN-GB'))>English (United Kingdom)</option>
                <option value="EN-US"@selected(collect(old('languages', json_decode($user['languages'])))->contains('EN-US'))>English (United States)</option>
                <option value="EO"@selected(collect(old('languages', json_decode($user['languages'])))->contains('EO'))>Esperanto - esperanto</option>
                <option value="ET"@selected(collect(old('languages', json_decode($user['languages'])))->contains('ET'))>Estonian - eesti</option>
                <option value="FO"@selected(collect(old('languages', json_decode($user['languages'])))->contains('FO'))>Faroese - føroyskt</option>
                <option value="FIL"@selected(collect(old('languages', json_decode($user['languages'])))->contains('FIL'))>Filipino</option>
                <option value="FI"@selected(collect(old('languages', json_decode($user['languages'])))->contains('FI'))>Finnish - suomi</option>
                <option value="FR"@selected(collect(old('languages', json_decode($user['languages'])))->contains('FR'))>French - français</option>
                <option value="FR-CA"@selected(collect(old('languages', json_decode($user['languages'])))->contains('FR-CA'))>French (Canada) - français (Canada)</option>
                <option value="FR-FR"@selected(collect(old('languages', json_decode($user['languages'])))->contains('FR-FR'))>French (France) - français (France)</option>
                <option value="FR-CH"@selected(collect(old('languages', json_decode($user['languages'])))->contains('FR-CH'))>French (Switzerland) - français (Suisse)</option>
                <option value="GL"@selected(collect(old('languages', json_decode($user['languages'])))->contains('GL'))>Galician - galego</option>
                <option value="KA"@selected(collect(old('languages', json_decode($user['languages'])))->contains('KA'))>Georgian - ქართული</option>
                <option value="DE"@selected(collect(old('languages', json_decode($user['languages'])))->contains('DE'))>German - Deutsch</option>
                <option value="DE-AT"@selected(collect(old('languages', json_decode($user['languages'])))->contains('DE-AT'))>German (Austria) - Deutsch (Österreich)</option>
                <option value="DE-DE"@selected(collect(old('languages', json_decode($user['languages'])))->contains('DE-DE'))>German (Germany) - Deutsch (Deutschland)</option>
                <option value="DE-LI"@selected(collect(old('languages', json_decode($user['languages'])))->contains('DE-LI'))>German (Liechtenstein) - Deutsch (Liechtenstein)</option>
                <option value="DE-CH"@selected(collect(old('languages', json_decode($user['languages'])))->contains('DE-CH'))>German (Switzerland) - Deutsch (Schweiz)</option>
                <option value="EL"@selected(collect(old('languages', json_decode($user['languages'])))->contains('EL'))>Greek - Ελληνικά</option>
                <option value="GN"@selected(collect(old('languages', json_decode($user['languages'])))->contains('GN'))>Guarani</option>
                <option value="GU"@selected(collect(old('languages', json_decode($user['languages'])))->contains('GU'))>Gujarati - ગુજરાતી</option>
                <option value="HA"@selected(collect(old('languages', json_decode($user['languages'])))->contains('HA'))>Hausa</option>
                <option value="HAW"@selected(collect(old('languages', json_decode($user['languages'])))->contains('HAW'))>Hawaiian - ʻŌlelo Hawaiʻi</option>
                <option value="HE"@selected(collect(old('languages', json_decode($user['languages'])))->contains('HE'))>Hebrew - עברית</option>
                <option value="HI"@selected(collect(old('languages', json_decode($user['languages'])))->contains('HI'))>Hindi - हिन्दी</option>
                <option value="HU"@selected(collect(old('languages', json_decode($user['languages'])))->contains('HU'))>Hungarian - magyar</option>
                <option value="IS"@selected(collect(old('languages', json_decode($user['languages'])))->contains('IS'))>Icelandic - íslenska</option>
                <option value="ID"@selected(collect(old('languages', json_decode($user['languages'])))->contains('ID'))>Indonesian - Indonesia</option>
                <option value="IA"@selected(collect(old('languages', json_decode($user['languages'])))->contains('IA'))>Interlingua</option>
                <option value="GA"@selected(collect(old('languages', json_decode($user['languages'])))->contains('GA'))>Irish - Gaeilge</option>
                <option value="IT"@selected(collect(old('languages', json_decode($user['languages'])))->contains('IT'))>Italian - italiano</option>
                <option value="IT-IT"@selected(collect(old('languages', json_decode($user['languages'])))->contains('IT-IT'))>Italian (Italy) - italiano (Italia)</option>
                <option value="IT-CH"@selected(collect(old('languages', json_decode($user['languages'])))->contains('IT-CH'))>Italian (Switzerland) - italiano (Svizzera)</option>
                <option value="JA"@selected(collect(old('languages', json_decode($user['languages'])))->contains('JA'))>Japanese - 日本語</option>
                <option value="KN"@selected(collect(old('languages', json_decode($user['languages'])))->contains('KN'))>Kannada - ಕನ್ನಡ</option>
                <option value="KK"@selected(collect(old('languages', json_decode($user['languages'])))->contains('KK'))>Kazakh - қазақ тілі</option>
                <option value="KM"@selected(collect(old('languages', json_decode($user['languages'])))->contains('KM'))>Khmer - ខ្មែរ</option>
                <option value="KO"@selected(collect(old('languages', json_decode($user['languages'])))->contains('KO'))>Korean - 한국어</option>
                <option value="KU"@selected(collect(old('languages', json_decode($user['languages'])))->contains('KU'))>Kurdish - Kurdî</option>
                <option value="KY"@selected(collect(old('languages', json_decode($user['languages'])))->contains('KY'))>Kyrgyz - кыргызча</option>
                <option value="LO"@selected(collect(old('languages', json_decode($user['languages'])))->contains('LO'))>Lao - ລາວ</option>
                <option value="LA"@selected(collect(old('languages', json_decode($user['languages'])))->contains('LA'))>Latin</option>
                <option value="LV"@selected(collect(old('languages', json_decode($user['languages'])))->contains('LV'))>Latvian - latviešu</option>
                <option value="LN"@selected(collect(old('languages', json_decode($user['languages'])))->contains('LN'))>Lingala - lingála</option>
                <option value="LT"@selected(collect(old('languages', json_decode($user['languages'])))->contains('LT'))>Lithuanian - lietuvių</option>
                <option value="MK"@selected(collect(old('languages', json_decode($user['languages'])))->contains('MK'))>Macedonian - македонски</option>
                <option value="MS"@selected(collect(old('languages', json_decode($user['languages'])))->contains('MS'))>Malay - Bahasa Melayu</option>
                <option value="ML"@selected(collect(old('languages', json_decode($user['languages'])))->contains('ML'))>Malayalam - മലയാളം</option>
                <option value="MT"@selected(collect(old('languages', json_decode($user['languages'])))->contains('MT'))>Maltese - Malti</option>
                <option value="MR"@selected(collect(old('languages', json_decode($user['languages'])))->contains('MR'))>Marathi - मराठी</option>
                <option value="MN"@selected(collect(old('languages', json_decode($user['languages'])))->contains('MN'))>Mongolian - монгол</option>
                <option value="NE"@selected(collect(old('languages', json_decode($user['languages'])))->contains('NE'))>Nepali - नेपाली</option>
                <option value="NO"@selected(collect(old('languages', json_decode($user['languages'])))->contains('NO'))>Norwegian - norsk</option>
                <option value="NB"@selected(collect(old('languages', json_decode($user['languages'])))->contains('NB'))>Norwegian Bokmål - norsk bokmål</option>
                <option value="NN"@selected(collect(old('languages', json_decode($user['languages'])))->contains('NN'))>Norwegian Nynorsk - nynorsk</option>
                <option value="OC"@selected(collect(old('languages', json_decode($user['languages'])))->contains('OC'))>Occitan</option>
                <option value="OR"@selected(collect(old('languages', json_decode($user['languages'])))->contains('OR'))>Oriya - ଓଡ଼ିଆ</option>
                <option value="OM"@selected(collect(old('languages', json_decode($user['languages'])))->contains('OM'))>Oromo - Oromoo</option>
                <option value="PS"@selected(collect(old('languages', json_decode($user['languages'])))->contains('PS'))>Pashto - پښتو</option>
                <option value="FA"@selected(collect(old('languages', json_decode($user['languages'])))->contains('FA'))>Persian - فارسی</option>
                <option value="PL"@selected(collect(old('languages', json_decode($user['languages'])))->contains('PL'))>Polish - polski</option>
                <option value="PT"@selected(collect(old('languages', json_decode($user['languages'])))->contains('PT'))>Portuguese - português</option>
                <option value="PT-BR"@selected(collect(old('languages', json_decode($user['languages'])))->contains('PT-BR'))>Portuguese (Brazil) - português (Brasil)</option>
                <option value="PT-PT"@selected(collect(old('languages', json_decode($user['languages'])))->contains('PT-PT'))>Portuguese (Portugal) - português (Portugal)</option>
                <option value="PA"@selected(collect(old('languages', json_decode($user['languages'])))->contains('PA'))>Punjabi - ਪੰਜਾਬੀ</option>
                <option value="QU"@selected(collect(old('languages', json_decode($user['languages'])))->contains('QU'))>Quechua</option>
                <option value="RO"@selected(collect(old('languages', json_decode($user['languages'])))->contains('RO'))>Romanian - română</option>
                <option value="MO"@selected(collect(old('languages', json_decode($user['languages'])))->contains('MO'))>Romanian (Moldova) - română (Moldova)</option>
                <option value="RM"@selected(collect(old('languages', json_decode($user['languages'])))->contains('RM'))>Romansh - rumantsch</option>
                <option value="RU"@selected(collect(old('languages', json_decode($user['languages'])))->contains('RU'))>Russian - русский</option>
                <option value="GD"@selected(collect(old('languages', json_decode($user['languages'])))->contains('GD'))>Scottish Gaelic</option>
                <option value="SR"@selected(collect(old('languages', json_decode($user['languages'])))->contains('SR'))>Serbian - српски</option>
                <option value="SH"@selected(collect(old('languages', json_decode($user['languages'])))->contains('SH'))>Serbo-Croatian - Srpskohrvatski</option>
                <option value="SN"@selected(collect(old('languages', json_decode($user['languages'])))->contains('SN'))>Shona - chiShona</option>
                <option value="SD"@selected(collect(old('languages', json_decode($user['languages'])))->contains('SD'))>Sindhi</option>
                <option value="SI"@selected(collect(old('languages', json_decode($user['languages'])))->contains('SI'))>Sinhala - සිංහල</option>
                <option value="SK"@selected(collect(old('languages', json_decode($user['languages'])))->contains('SK'))>Slovak - slovenčina</option>
                <option value="SL"@selected(collect(old('languages', json_decode($user['languages'])))->contains('SL'))>Slovenian - slovenščina</option>
                <option value="SO"@selected(collect(old('languages', json_decode($user['languages'])))->contains('SO'))>Somali - Soomaali</option>
                <option value="ST"@selected(collect(old('languages', json_decode($user['languages'])))->contains('ST'))>Southern Sotho</option>
                <option value="ES"@selected(collect(old('languages', json_decode($user['languages'])))->contains('ES'))>Spanish - español</option>
                <option value="ES-AR"@selected(collect(old('languages', json_decode($user['languages'])))->contains('ES-AR'))>Spanish (Argentina) - español (Argentina)</option>
                <option value="ES-419"@selected(collect(old('languages', json_decode($user['languages'])))->contains('ES-419'))>Spanish (Latin America) - español (Latinoamérica)</option>
                <option value="ES-MX"@selected(collect(old('languages', json_decode($user['languages'])))->contains('ES-MX'))>Spanish (Mexico) - español (México)</option>
                <option value="ES-ES"@selected(collect(old('languages', json_decode($user['languages'])))->contains('ES-ES'))>Spanish (Spain) - español (España)</option>
                <option value="ES-US"@selected(collect(old('languages', json_decode($user['languages'])))->contains('ES-US'))>Spanish (United States) - español (Estados Unidos)</option>
                <option value="SU"@selected(collect(old('languages', json_decode($user['languages'])))->contains('SU'))>Sundanese</option>
                <option value="SW"@selected(collect(old('languages', json_decode($user['languages'])))->contains('SW'))>Swahili - Kiswahili</option>
                <option value="SV"@selected(collect(old('languages', json_decode($user['languages'])))->contains('SV'))>Swedish - svenska</option>
                <option value="TG"@selected(collect(old('languages', json_decode($user['languages'])))->contains('TG'))>Tajik - тоҷикӣ</option>
                <option value="TA"@selected(collect(old('languages', json_decode($user['languages'])))->contains('TA'))>Tamil - தமிழ்</option>
                <option value="TT"@selected(collect(old('languages', json_decode($user['languages'])))->contains('TT'))>Tatar</option>
                <option value="TE"@selected(collect(old('languages', json_decode($user['languages'])))->contains('TE'))>Telugu - తెలుగు</option>
                <option value="TH"@selected(collect(old('languages', json_decode($user['languages'])))->contains('TH'))>Thai - ไทย</option>
                <option value="TI"@selected(collect(old('languages', json_decode($user['languages'])))->contains('TI'))>Tigrinya - ትግርኛ</option>
                <option value="TO"@selected(collect(old('languages', json_decode($user['languages'])))->contains('TO'))>Tongan - lea fakatonga</option>
                <option value="TR"@selected(collect(old('languages', json_decode($user['languages'])))->contains('TR'))>Turkish - Türkçe</option>
                <option value="TK"@selected(collect(old('languages', json_decode($user['languages'])))->contains('TK'))>Turkmen</option>
                <option value="TW"@selected(collect(old('languages', json_decode($user['languages'])))->contains('TW'))>Twi</option>
                <option value="UK"@selected(collect(old('languages', json_decode($user['languages'])))->contains('UK'))>Ukrainian - українська</option>
                <option value="UR"@selected(collect(old('languages', json_decode($user['languages'])))->contains('UR'))>Urdu - اردو</option>
                <option value="UG"@selected(collect(old('languages', json_decode($user['languages'])))->contains('UG'))>Uyghur</option>
                <option value="UZ"@selected(collect(old('languages', json_decode($user['languages'])))->contains('UZ'))>Uzbek - o‘zbek</option>
                <option value="VI"@selected(collect(old('languages', json_decode($user['languages'])))->contains('VI'))>Vietnamese - Tiếng Việt</option>
                <option value="WA"@selected(collect(old('languages', json_decode($user['languages'])))->contains('WA'))>Walloon - wa</option>
                <option value="CY"@selected(collect(old('languages', json_decode($user['languages'])))->contains('CY'))>Welsh - Cymraeg</option>
                <option value="FY"@selected(collect(old('languages', json_decode($user['languages'])))->contains('FY'))>Western Frisian</option>
                <option value="XH"@selected(collect(old('languages', json_decode($user['languages'])))->contains('XH'))>Xhosa</option>
                <option value="YI"@selected(collect(old('languages', json_decode($user['languages'])))->contains('YI'))>Yiddish</option>
                <option value="YO"@selected(collect(old('languages', json_decode($user['languages'])))->contains('YO'))>Yoruba - Èdè Yorùbá</option>
                <option value="ZU"@selected(collect(old('languages', json_decode($user['languages'])))->contains('ZU'))>Zulu - isiZulu</option>
            </select>
        </div>


        <div class="mb-3">
            <label class="form-label">Select Country</label>
            <select name="country" class="single-select" data-placeholder="Choose User Country">
                <option value=""></option>
                <option value="AF" @selected(old('country', $user['country']) == 'AF')>Afghanistan</option>
                <option value="AX" @selected(old('country', $user['country']) == 'AX')>Aland Islands</option>
                <option value="AL"@selected(old('country', $user['country']) == 'AL')>Albania</option>
                <option value="DZ"@selected(old('country', $user['country']) == 'DZ')>Algeria</option>
                <option value="AS"@selected(old('country', $user['country']) == 'AS')>American Samoa</option>
                <option value="AD"@selected(old('country', $user['country']) == 'AD')>Andorra</option>
                <option value="AO"@selected(old('country', $user['country']) == 'AO')>Angola</option>
                <option value="AI"@selected(old('country', $user['country']) == 'AI')>Anguilla</option>
                <option value="AQ"@selected(old('country', $user['country']) == 'AQ')>Antarctica</option>
                <option value="AG"@selected(old('country', $user['country']) == 'AG')>Antigua and Barbuda</option>
                <option value="AR"@selected(old('country', $user['country']) == 'AR')>Argentina</option>
                <option value="AM"@selected(old('country', $user['country']) == 'AM')>Armenia</option>
                <option value="AW"@selected(old('country', $user['country']) == 'AW')>Aruba</option>
                <option value="AU"@selected(old('country', $user['country']) == 'AU')>Australia</option>
                <option value="AT"@selected(old('country', $user['country']) == 'AT')>Austria</option>
                <option value="AZ"@selected(old('country', $user['country']) == 'AZ')>Azerbaijan</option>
                <option value="BS"@selected(old('country', $user['country']) == 'BS')>Bahamas</option>
                <option value="BH"@selected(old('country', $user['country']) == 'BH')>Bahrain</option>
                <option value="BD"@selected(old('country', $user['country']) == 'BD')>Bangladesh</option>
                <option value="BB"@selected(old('country', $user['country']) == 'BB')>Barbados</option>
                <option value="BY"@selected(old('country', $user['country']) == 'BY')>Belarus</option>
                <option value="BE"@selected(old('country', $user['country']) == 'BE')>Belgium</option>
                <option value="BZ"@selected(old('country', $user['country']) == 'BZ')>Belize</option>
                <option value="BJ"@selected(old('country', $user['country']) == 'BJ')>Benin</option>
                <option value="BM"@selected(old('country', $user['country']) == 'BM')>Bermuda</option>
                <option value="BT"@selected(old('country', $user['country']) == 'BT')>Bhutan</option>
                <option value="BO"@selected(old('country', $user['country']) == 'BO')>Bolivia</option>
                <option value="BQ"@selected(old('country', $user['country']) == 'BQ')>Bonaire, Sint Eustatius and Saba</option>
                <option value="BA"@selected(old('country', $user['country']) == 'BA')>Bosnia and Herzegovina</option>
                <option value="BW"@selected(old('country', $user['country']) == 'BW')>Botswana</option>
                <option value="BV"@selected(old('country', $user['country']) == 'BV')>Bouvet Island</option>
                <option value="BR"@selected(old('country', $user['country']) == 'BR')>Brazil</option>
                <option value="IO"@selected(old('country', $user['country']) == 'IO')>British Indian Ocean Territory</option>
                <option value="BN"@selected(old('country', $user['country']) == 'BN')>Brunei Darussalam</option>
                <option value="BG"@selected(old('country', $user['country']) == 'BG')>Bulgaria</option>
                <option value="BF"@selected(old('country', $user['country']) == 'BF')>Burkina Faso</option>
                <option value="BI"@selected(old('country', $user['country']) == 'BI')>Burundi</option>
                <option value="KH"@selected(old('country', $user['country']) == 'KH')>Cambodia</option>
                <option value="CM"@selected(old('country', $user['country']) == 'CM')>Cameroon</option>
                <option value="CA"@selected(old('country', $user['country']) == 'CA')>Canada</option>
                <option value="CV"@selected(old('country', $user['country']) == 'CV')>Cape Verde</option>
                <option value="KY"@selected(old('country', $user['country']) == 'KY')>Cayman Islands</option>
                <option value="CF"@selected(old('country', $user['country']) == 'CF')>Central African Republic</option>
                <option value="TD"@selected(old('country', $user['country']) == 'TD')>Chad</option>
                <option value="CL"@selected(old('country', $user['country']) == 'CL')>Chile</option>
                <option value="CN"@selected(old('country', $user['country']) == 'CN')>China</option>
                <option value="CX"@selected(old('country', $user['country']) == 'CX')>Christmas Island</option>
                <option value="CC"@selected(old('country', $user['country']) == 'CC')>Cocos (Keeling) Islands</option>
                <option value="CO"@selected(old('country', $user['country']) == 'CO')>Colombia</option>
                <option value="KM"@selected(old('country', $user['country']) == 'KM')>Comoros</option>
                <option value="CG"@selected(old('country', $user['country']) == 'CG')>Congo</option>
                <option value="CD"@selected(old('country', $user['country']) == 'CD')>Congo, Democratic Republic of the Congo</option>
                <option value="CK"@selected(old('country', $user['country']) == 'CK')>Cook Islands</option>
                <option value="CR"@selected(old('country', $user['country']) == 'CR')>Costa Rica</option>
                <option value="CI"@selected(old('country', $user['country']) == 'CI')>Cote D'Ivoire</option>
                <option value="HR"@selected(old('country', $user['country']) == 'HR')>Croatia</option>
                <option value="CU"@selected(old('country', $user['country']) == 'CU')>Cuba</option>
                <option value="CW"@selected(old('country', $user['country']) == 'CW')>Curacao</option>
                <option value="CY"@selected(old('country', $user['country']) == 'CY')>Cyprus</option>
                <option value="CZ"@selected(old('country', $user['country']) == 'CZ')>Czech Republic</option>
                <option value="DK"@selected(old('country', $user['country']) == 'DK')>Denmark</option>
                <option value="DJ"@selected(old('country', $user['country']) == 'DJ')>Djibouti</option>
                <option value="DM"@selected(old('country', $user['country']) == 'DM')>Dominica</option>
                <option value="DO"@selected(old('country', $user['country']) == 'DO')>Dominican Republic</option>
                <option value="EC"@selected(old('country', $user['country']) == 'EC')>Ecuador</option>
                <option value="EG"@selected(old('country', $user['country']) == 'EG')>Egypt</option>
                <option value="SV"@selected(old('country', $user['country']) == 'SV')>El Salvador</option>
                <option value="GQ"@selected(old('country', $user['country']) == 'GQ')>Equatorial Guinea</option>
                <option value="ER"@selected(old('country', $user['country']) == 'ER')>Eritrea</option>
                <option value="EE"@selected(old('country', $user['country']) == 'EE')>Estonia</option>
                <option value="ET"@selected(old('country', $user['country']) == 'ET')>Ethiopia</option>
                <option value="FK"@selected(old('country', $user['country']) == 'FK')>Falkland Islands (Malvinas)</option>
                <option value="FO"@selected(old('country', $user['country']) == 'FO')>Faroe Islands</option>
                <option value="FJ"@selected(old('country', $user['country']) == 'FJ')>Fiji</option>
                <option value="FI"@selected(old('country', $user['country']) == 'FI')>Finland</option>
                <option value="FR"@selected(old('country', $user['country']) == 'FR')>France</option>
                <option value="GF"@selected(old('country', $user['country']) == 'GF')>French Guiana</option>
                <option value="PF"@selected(old('country', $user['country']) == 'PF')>French Polynesia</option>
                <option value="TF"@selected(old('country', $user['country']) == 'TF')>French Southern Territories</option>
                <option value="GM"@selected(old('country', $user['country']) == 'GM')>Gambia</option>
                <option value="GE"@selected(old('country', $user['country']) == 'GE')>Georgia</option>
                <option value="DE"@selected(old('country', $user['country']) == 'DE')>Germany</option>
                <option value="GH"@selected(old('country', $user['country']) == 'GH')>Ghana</option>
                <option value="GI"@selected(old('country', $user['country']) == 'GI')>Gibraltar</option>
                <option value="GR"@selected(old('country', $user['country']) == 'GR')>Greece</option>
                <option value="GL"@selected(old('country', $user['country']) == 'GL')>Greenland</option>
                <option value="GD"@selected(old('country', $user['country']) == 'GD')>Grenada</option>
                <option value="GP"@selected(old('country', $user['country']) == 'GP')>Guadeloupe</option>
                <option value="GU"@selected(old('country', $user['country']) == 'GU')>Guam</option>
                <option value="GT"@selected(old('country', $user['country']) == 'GT')>Guatemala</option>
                <option value="GG"@selected(old('country', $user['country']) == 'GG')>Guernsey</option>
                <option value="GN"@selected(old('country', $user['country']) == 'GN')>Guinea</option>
                <option value="GW"@selected(old('country', $user['country']) == 'GW')>Guinea-Bissau</option>
                <option value="GY"@selected(old('country', $user['country']) == 'GY')>Guyana</option>
                <option value="HT"@selected(old('country', $user['country']) == 'HT')>Haiti</option>
                <option value="HM"@selected(old('country', $user['country']) == 'HM')>Heard Island and Mcdonald Islands</option>
                <option value="VA"@selected(old('country', $user['country']) == 'VA')>Holy See (Vatican City State)</option>
                <option value="HN"@selected(old('country', $user['country']) == 'HN')>Honduras</option>
                <option value="HK"@selected(old('country', $user['country']) == 'HK')>Hong Kong</option>
                <option value="HU"@selected(old('country', $user['country']) == 'HU')>Hungary</option>
                <option value="IS"@selected(old('country', $user['country']) == 'IS')>Iceland</option>
                <option value="IN"@selected(old('country', $user['country']) == 'IN')>India</option>
                <option value="ID"@selected(old('country', $user['country']) == 'ID')>Indonesia</option>
                <option value="IR"@selected(old('country', $user['country']) == 'IR')>Iran, Islamic Republic of</option>
                <option value="IQ"@selected(old('country', $user['country']) == 'IQ')>Iraq</option>
                <option value="IE"@selected(old('country', $user['country']) == 'IE')>Ireland</option>
                <option value="IM"@selected(old('country', $user['country']) == 'IM')>Isle of Man</option>
                <option value="IT"@selected(old('country', $user['country']) == 'IT')>Italy</option>
                <option value="JM"@selected(old('country', $user['country']) == 'JM')>Jamaica</option>
                <option value="JP"@selected(old('country', $user['country']) == 'JP')>Japan</option>
                <option value="JE"@selected(old('country', $user['country']) == 'JE')>Jersey</option>
                <option value="JO"@selected(old('country', $user['country']) == 'JO')>Jordan</option>
                <option value="KZ"@selected(old('country', $user['country']) == 'KZ')>Kazakhstan</option>
                <option value="KE"@selected(old('country', $user['country']) == 'KE')>Kenya</option>
                <option value="KI"@selected(old('country', $user['country']) == 'KI')>Kiribati</option>
                <option value="KP"@selected(old('country', $user['country']) == 'KP')>Korea, Democratic People's Republic of</option>
                <option value="KR"@selected(old('country', $user['country']) == 'KR')>Korea, Republic of</option>
                <option value="XK"@selected(old('country', $user['country']) == 'XK')>Kosovo</option>
                <option value="KW"@selected(old('country', $user['country']) == 'KW')>Kuwait</option>
                <option value="KG"@selected(old('country', $user['country']) == 'KG')>Kyrgyzstan</option>
                <option value="LA"@selected(old('country', $user['country']) == 'LA')>Lao People's Democratic Republic</option>
                <option value="LV"@selected(old('country', $user['country']) == 'LV')>Latvia</option>
                <option value="LB"@selected(old('country', $user['country']) == 'LB')>Lebanon</option>
                <option value="LS"@selected(old('country', $user['country']) == 'LS')>Lesotho</option>
                <option value="LR"@selected(old('country', $user['country']) == 'LR')>Liberia</option>
                <option value="LY"@selected(old('country', $user['country']) == 'LY')>Libyan Arab Jamahiriya</option>
                <option value="LI"@selected(old('country', $user['country']) == 'LI')>Liechtenstein</option>
                <option value="LT"@selected(old('country', $user['country']) == 'LT')>Lithuania</option>
                <option value="LU"@selected(old('country', $user['country']) == 'LU')>Luxembourg</option>
                <option value="MO"@selected(old('country', $user['country']) == 'MO')>Macao</option>
                <option value="MK"@selected(old('country', $user['country']) == 'MK')>Macedonia, the Former Yugoslav Republic of</option>
                <option value="MG"@selected(old('country', $user['country']) == 'MG')>Madagascar</option>
                <option value="MW"@selected(old('country', $user['country']) == 'MW')>Malawi</option>
                <option value="MY"@selected(old('country', $user['country']) == 'MY')>Malaysia</option>
                <option value="MV"@selected(old('country', $user['country']) == 'MV')>Maldives</option>
                <option value="ML"@selected(old('country', $user['country']) == 'ML')>Mali</option>
                <option value="MT"@selected(old('country', $user['country']) == 'MT')>Malta</option>
                <option value="MH"@selected(old('country', $user['country']) == 'MH')>Marshall Islands</option>
                <option value="MQ"@selected(old('country', $user['country']) == 'MQ')>Martinique</option>
                <option value="MR"@selected(old('country', $user['country']) == 'MR')>Mauritania</option>
                <option value="MU"@selected(old('country', $user['country']) == 'MU')>Mauritius</option>
                <option value="YT"@selected(old('country', $user['country']) == 'YT')>Mayotte</option>
                <option value="MX"@selected(old('country', $user['country']) == 'MX')>Mexico</option>
                <option value="FM"@selected(old('country', $user['country']) == 'FM')>Micronesia, Federated States of</option>
                <option value="MD"@selected(old('country', $user['country']) == 'MD')>Moldova, Republic of</option>
                <option value="MC"@selected(old('country', $user['country']) == 'MC')>Monaco</option>
                <option value="MN"@selected(old('country', $user['country']) == 'MN')>Mongolia</option>
                <option value="ME"@selected(old('country', $user['country']) == 'ME')>Montenegro</option>
                <option value="MS"@selected(old('country', $user['country']) == 'MS')>Montserrat</option>
                <option value="MA"@selected(old('country', $user['country']) == 'MA')>Morocco</option>
                <option value="MZ"@selected(old('country', $user['country']) == 'MZ')>Mozambique</option>
                <option value="MM"@selected(old('country', $user['country']) == 'MM')>Myanmar</option>
                <option value="NA"@selected(old('country', $user['country']) == 'NA')>Namibia</option>
                <option value="NR"@selected(old('country', $user['country']) == 'NR')>Nauru</option>
                <option value="NP"@selected(old('country', $user['country']) == 'NP')>Nepal</option>
                <option value="NL"@selected(old('country', $user['country']) == 'NL')>Netherlands</option>
                <option value="AN"@selected(old('country', $user['country']) == 'AN')>Netherlands Antilles</option>
                <option value="NC"@selected(old('country', $user['country']) == 'NC')>New Caledonia</option>
                <option value="NZ"@selected(old('country', $user['country']) == 'NZ')>New Zealand</option>
                <option value="NI"@selected(old('country', $user['country']) == 'NI')>Nicaragua</option>
                <option value="NE"@selected(old('country', $user['country']) == 'NE')>Niger</option>
                <option value="NG"@selected(old('country', $user['country']) == 'NG')>Nigeria</option>
                <option value="NU"@selected(old('country', $user['country']) == 'NU')>Niue</option>
                <option value="NF"@selected(old('country', $user['country']) == 'NF')>Norfolk Island</option>
                <option value="MP"@selected(old('country', $user['country']) == 'MP')>Northern Mariana Islands</option>
                <option value="NO"@selected(old('country', $user['country']) == 'NO')>Norway</option>
                <option value="OM"@selected(old('country', $user['country']) == 'OM')>Oman</option>
                <option value="PK"@selected(old('country', $user['country']) == 'PK')>Pakistan</option>
                <option value="PW" @selected(old('country', $user['country']) == 'PW')>Palau</option>
                <option value="PS" @selected(old('country', $user['country']) == 'PS')>Palestinian Territory, Occupied</option>
                <option value="PA"@selected(old('country', $user['country']) == 'PA')>Panama</option>
                <option value="PG"@selected(old('country', $user['country']) == 'PG')>Papua New Guinea</option>
                <option value="PY"@selected(old('country', $user['country']) == 'PY')>Paraguay</option>
                <option value="PE"@selected(old('country', $user['country']) == 'PE')>Peru</option>
                <option value="PH"@selected(old('country', $user['country']) == 'PH')>Philippines</option>
                <option value="PN"@selected(old('country', $user['country']) == 'PN')>Pitcairn</option>
                <option value="PL"@selected(old('country', $user['country']) == 'PL')>Poland</option>
                <option value="PT"@selected(old('country', $user['country']) == 'PT')>Portugal</option>
                <option value="PR"@selected(old('country', $user['country']) == 'PR')>Puerto Rico</option>
                <option value="QA"@selected(old('country', $user['country']) == 'QA')>Qatar</option>
                <option value="RE"@selected(old('country', $user['country']) == 'RE')>Reunion</option>
                <option value="RO"@selected(old('country', $user['country']) == 'RO')>Romania</option>
                <option value="RU"@selected(old('country', $user['country']) == 'RU')>Russian Federation</option>
                <option value="RW"@selected(old('country', $user['country']) == 'RW')>Rwanda</option>
                <option value="BL"@selected(old('country', $user['country']) == 'BL')>Saint Barthelemy</option>
                <option value="SH"@selected(old('country', $user['country']) == 'SH')>Saint Helena</option>
                <option value="KN"@selected(old('country', $user['country']) == 'KN')>Saint Kitts and Nevis</option>
                <option value="LC"@selected(old('country', $user['country']) == 'LC')>Saint Lucia</option>
                <option value="MF"@selected(old('country', $user['country']) == 'MF')>Saint Martin</option>
                <option value="PM"@selected(old('country', $user['country']) == 'PM')>Saint Pierre and Miquelon</option>
                <option value="VC"@selected(old('country', $user['country']) == 'VC')>Saint Vincent and the Grenadines</option>
                <option value="WS"@selected(old('country', $user['country']) == 'WS')>Samoa</option>
                <option value="SM"@selected(old('country', $user['country']) == 'SM')>San Marino</option>
                <option value="ST"@selected(old('country', $user['country']) == 'ST')>Sao Tome and Principe</option>
                <option value="SA"@selected(old('country', $user['country']) == 'SA')>Saudi Arabia</option>
                <option value="SN"@selected(old('country', $user['country']) == 'SN')>Senegal</option>
                <option value="RS"@selected(old('country', $user['country']) == 'RS')>Serbia</option>
                <option value="CS"@selected(old('country', $user['country']) == 'CS')>Serbia and Montenegro</option>
                <option value="SC"@selected(old('country', $user['country']) == 'SC')>Seychelles</option>
                <option value="SL"@selected(old('country', $user['country']) == 'SL')>Sierra Leone</option>
                <option value="SG"@selected(old('country', $user['country']) == 'SG')>Singapore</option>
                <option value="SX"@selected(old('country', $user['country']) == 'SX')>Sint Maarten</option>
                <option value="SK"@selected(old('country', $user['country']) == 'SK')>Slovakia</option>
                <option value="SI"@selected(old('country', $user['country']) == 'SI')>Slovenia</option>
                <option value="SB"@selected(old('country', $user['country']) == 'SB')>Solomon Islands</option>
                <option value="SO"@selected(old('country', $user['country']) == 'SO')>Somalia</option>
                <option value="ZA"@selected(old('country', $user['country']) == 'ZA')>South Africa</option>
                <option value="GS"@selected(old('country', $user['country']) == 'GS')>South Georgia and the South Sandwich Islands</option>
                <option value="SS"@selected(old('country', $user['country']) == 'SS')>South Sudan</option>
                <option value="ES"@selected(old('country', $user['country']) == 'ES')>Spain</option>
                <option value="LK"@selected(old('country', $user['country']) == 'LK')>Sri Lanka</option>
                <option value="SD"@selected(old('country', $user['country']) == 'SD')>Sudan</option>
                <option value="SR"@selected(old('country', $user['country']) == 'SR')>Suriname</option>
                <option value="SJ"@selected(old('country', $user['country']) == 'SJ')>Svalbard and Jan Mayen</option>
                <option value="SZ"@selected(old('country', $user['country']) == 'SZ')>Swaziland</option>
                <option value="SE"@selected(old('country', $user['country']) == 'SE')>Sweden</option>
                <option value="CH"@selected(old('country', $user['country']) == 'CH')>Switzerland</option>
                <option value="SY"@selected(old('country', $user['country']) == 'SY')>Syrian Arab Republic</option>
                <option value="TW"@selected(old('country', $user['country']) == 'TW')>Taiwan, Province of China</option>
                <option value="TJ"@selected(old('country', $user['country']) == 'TJ')>Tajikistan</option>
                <option value="TZ"@selected(old('country', $user['country']) == 'TZ')>Tanzania, United Republic of</option>
                <option value="TH"@selected(old('country', $user['country']) == 'TH')>Thailand</option>
                <option value="TL"@selected(old('country', $user['country']) == 'TL')>Timor-Leste</option>
                <option value="TG"@selected(old('country', $user['country']) == 'TG')>Togo</option>
                <option value="TK"@selected(old('country', $user['country']) == 'TK')>Tokelau</option>
                <option value="TO"@selected(old('country', $user['country']) == 'TO')>Tonga</option>
                <option value="TT"@selected(old('country', $user['country']) == 'TT')>Trinidad and Tobago</option>
                <option value="TN"@selected(old('country', $user['country']) == 'TN')>Tunisia</option>
                <option value="TR"@selected(old('country', $user['country']) == 'TR')>Turkey</option>
                <option value="TM"@selected(old('country', $user['country']) == 'TM')>Turkmenistan</option>
                <option value="TC"@selected(old('country', $user['country']) == 'TC')>Turks and Caicos Islands</option>
                <option value="TV"@selected(old('country', $user['country']) == 'TV')>Tuvalu</option>
                <option value="UG"@selected(old('country', $user['country']) == 'UG')>Uganda</option>
                <option value="UA"@selected(old('country', $user['country']) == 'UA')>Ukraine</option>
                <option value="AE"@selected(old('country', $user['country']) == 'AE')>United Arab Emirates</option>
                <option value="GB"@selected(old('country', $user['country']) == 'GB')>United Kingdom</option>
                <option value="US"@selected(old('country', $user['country']) == 'US')>United States</option>
                <option value="UM"@selected(old('country', $user['country']) == 'UM')>United States Minor Outlying Islands</option>
                <option value="UY"@selected(old('country', $user['country']) == 'UY')>Uruguay</option>
                <option value="UZ"@selected(old('country', $user['country']) == 'UZ')>Uzbekistan</option>
                <option value="VU"@selected(old('country', $user['country']) == 'VU')>Vanuatu</option>
                <option value="VE"@selected(old('country', $user['country']) == 'VE')>Venezuela</option>
                <option value="VN"@selected(old('country', $user['country']) == 'VN')>Viet Nam</option>
                <option value="VG"@selected(old('country', $user['country']) == 'VG')>Virgin Islands, British</option>
                <option value="VI"@selected(old('country', $user['country']) == 'VI')>Virgin Islands, U.s.</option>
                <option value="WF"@selected(old('country', $user['country']) == 'WF')>Wallis and Futuna</option>
                <option value="EH"@selected(old('country', $user['country']) == 'EH')>Western Sahara</option>
                <option value="YE"@selected(old('country', $user['country']) == 'YE')>Yemen</option>
                <option value="ZM"@selected(old('country', $user['country']) == 'ZM')>Zambia</option>
                <option value="ZW"@selected(old('country', $user['country']) == 'ZW')>Zimbabwe</option>
            </select>
        </div>
        <x-BaseComponents.form.common.select_fixed name="is_active" :model="$user" label="Is Active" cols="6"
            :options="[
                '1' => 'Active',
                '0' => 'Not Active',
            ]" />

        <x-BaseComponents.form.common.select_fixed name="is_super" :model="$user" label="Is Super" cols="6"
            :options="[
                '0' => 'Not Super',
                '1' => 'Super',
            ]" />



        <x-BaseComponents.form.common.image name="avatar" :model="$user" />


    </div>
</div>


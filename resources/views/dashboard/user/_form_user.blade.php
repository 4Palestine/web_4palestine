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
                <option value="AF">Afrikaans</option>
                <option value="SQ">Albanian - shqip</option>
                <option value="AM">Amharic - አማርኛ</option>
                <option value="AR" @selected(collect(old('languages', json_decode($user['languages'])))->contains('AR'))>Arabic - العربية</option>
                <option value="AN">Aragonese - aragonés</option>
                <option value="HY">Armenian - հայերեն</option>
                <option value="AST">Asturian - asturianu</option>
                <option value="AZ">Azerbaijani - azərbaycan dili</option>
                <option value="EU">Basque - euskara</option>
                <option value="BE">Belarusian - беларуская</option>
                <option value="BN">Bengali - বাংলা</option>
                <option value="BS">Bosnian - bosanski</option>
                <option value="BR">Breton - brezhoneg</option>
                <option value="BG">Bulgarian - български</option>
                <option value="CA">Catalan - català</option>
                <option value="CKB">Central Kurdish - کوردی (دەستنوسی عەرەبی)</option>
                <option value="ZH">Chinese - 中文</option>
                <option value="ZH-HK">Chinese (Hong Kong) - 中文（香港）</option>
                <option value="ZH-CN">Chinese (Simplified) - 中文（简体）</option>
                <option value="ZH-TW">Chinese (Traditional) - 中文（繁體）</option>
                <option value="CO">Corsican</option>
                <option value="HR">Croatian - hrvatski</option>
                <option value="CS">Czech - čeština</option>
                <option value="DA">Danish - dansk</option>
                <option value="NL">Dutch - Nederlands</option>
                <option value="EN">English</option>
                <option value="EN-AU">English (Australia)</option>
                <option value="EN-CA">English (Canada)</option>
                <option value="EN-IN">English (India)</option>
                <option value="EN-NZ">English (New Zealand)</option>
                <option value="EN-ZA">English (South Africa)</option>
                <option value="EN-GB">English (United Kingdom)</option>
                <option value="EN-US">English (United States)</option>
                <option value="EO">Esperanto - esperanto</option>
                <option value="ET">Estonian - eesti</option>
                <option value="FO">Faroese - føroyskt</option>
                <option value="FIL">Filipino</option>
                <option value="FI">Finnish - suomi</option>
                <option value="FR">French - français</option>
                <option value="FR-CA">French (Canada) - français (Canada)</option>
                <option value="FR-FR">French (France) - français (France)</option>
                <option value="FR-CH">French (Switzerland) - français (Suisse)</option>
                <option value="GL">Galician - galego</option>
                <option value="KA">Georgian - ქართული</option>
                <option value="DE">German - Deutsch</option>
                <option value="DE-AT">German (Austria) - Deutsch (Österreich)</option>
                <option value="DE-DE">German (Germany) - Deutsch (Deutschland)</option>
                <option value="DE-LI">German (Liechtenstein) - Deutsch (Liechtenstein)</option>
                <option value="DE-CH">German (Switzerland) - Deutsch (Schweiz)</option>
                <option value="EL">Greek - Ελληνικά</option>
                <option value="GN">Guarani</option>
                <option value="GU">Gujarati - ગુજરાતી</option>
                <option value="HA">Hausa</option>
                <option value="HAW">Hawaiian - ʻŌlelo Hawaiʻi</option>
                <option value="HE">Hebrew - עברית</option>
                <option value="HI">Hindi - हिन्दी</option>
                <option value="HU">Hungarian - magyar</option>
                <option value="IS">Icelandic - íslenska</option>
                <option value="ID">Indonesian - Indonesia</option>
                <option value="IA">Interlingua</option>
                <option value="GA">Irish - Gaeilge</option>
                <option value="IT">Italian - italiano</option>
                <option value="IT-IT">Italian (Italy) - italiano (Italia)</option>
                <option value="IT-CH">Italian (Switzerland) - italiano (Svizzera)</option>
                <option value="JA">Japanese - 日本語</option>
                <option value="KN">Kannada - ಕನ್ನಡ</option>
                <option value="KK">Kazakh - қазақ тілі</option>
                <option value="KM">Khmer - ខ្មែរ</option>
                <option value="KO">Korean - 한국어</option>
                <option value="KU">Kurdish - Kurdî</option>
                <option value="KY">Kyrgyz - кыргызча</option>
                <option value="LO">Lao - ລາວ</option>
                <option value="LA">Latin</option>
                <option value="LV">Latvian - latviešu</option>
                <option value="LN">Lingala - lingála</option>
                <option value="LT">Lithuanian - lietuvių</option>
                <option value="MK">Macedonian - македонски</option>
                <option value="MS">Malay - Bahasa Melayu</option>
                <option value="ML">Malayalam - മലയാളം</option>
                <option value="MT">Maltese - Malti</option>
                <option value="MR">Marathi - मराठी</option>
                <option value="MN">Mongolian - монгол</option>
                <option value="NE">Nepali - नेपाली</option>
                <option value="NO">Norwegian - norsk</option>
                <option value="NB">Norwegian Bokmål - norsk bokmål</option>
                <option value="NN">Norwegian Nynorsk - nynorsk</option>
                <option value="OC">Occitan</option>
                <option value="OR">Oriya - ଓଡ଼ିଆ</option>
                <option value="OM">Oromo - Oromoo</option>
                <option value="PS">Pashto - پښتو</option>
                <option value="FA">Persian - فارسی</option>
                <option value="PL">Polish - polski</option>
                <option value="PT">Portuguese - português</option>
                <option value="PT-BR">Portuguese (Brazil) - português (Brasil)</option>
                <option value="PT-PT">Portuguese (Portugal) - português (Portugal)</option>
                <option value="PA">Punjabi - ਪੰਜਾਬੀ</option>
                <option value="QU">Quechua</option>
                <option value="RO">Romanian - română</option>
                <option value="MO">Romanian (Moldova) - română (Moldova)</option>
                <option value="RM">Romansh - rumantsch</option>
                <option value="RU">Russian - русский</option>
                <option value="GD">Scottish Gaelic</option>
                <option value="SR">Serbian - српски</option>
                <option value="SH">Serbo-Croatian - Srpskohrvatski</option>
                <option value="SN">Shona - chiShona</option>
                <option value="SD">Sindhi</option>
                <option value="SI">Sinhala - සිංහල</option>
                <option value="SK">Slovak - slovenčina</option>
                <option value="SL">Slovenian - slovenščina</option>
                <option value="SO">Somali - Soomaali</option>
                <option value="ST">Southern Sotho</option>
                <option value="ES">Spanish - español</option>
                <option value="ES-AR">Spanish (Argentina) - español (Argentina)</option>
                <option value="ES-419">Spanish (Latin America) - español (Latinoamérica)</option>
                <option value="ES-MX">Spanish (Mexico) - español (México)</option>
                <option value="ES-ES">Spanish (Spain) - español (España)</option>
                <option value="ES-US">Spanish (United States) - español (Estados Unidos)</option>
                <option value="SU">Sundanese</option>
                <option value="SW">Swahili - Kiswahili</option>
                <option value="SV">Swedish - svenska</option>
                <option value="TG">Tajik - тоҷикӣ</option>
                <option value="TA">Tamil - தமிழ்</option>
                <option value="TT">Tatar</option>
                <option value="TE">Telugu - తెలుగు</option>
                <option value="TH">Thai - ไทย</option>
                <option value="TI">Tigrinya - ትግርኛ</option>
                <option value="TO">Tongan - lea fakatonga</option>
                <option value="TR">Turkish - Türkçe</option>
                <option value="TK">Turkmen</option>
                <option value="TW">Twi</option>
                <option value="UK">Ukrainian - українська</option>
                <option value="UR">Urdu - اردو</option>
                <option value="UG">Uyghur</option>
                <option value="UZ">Uzbek - o‘zbek</option>
                <option value="VI">Vietnamese - Tiếng Việt</option>
                <option value="WA">Walloon - wa</option>
                <option value="CY">Welsh - Cymraeg</option>
                <option value="FY">Western Frisian</option>
                <option value="XH">Xhosa</option>
                <option value="YI">Yiddish</option>
                <option value="YO">Yoruba - Èdè Yorùbá</option>
                <option value="ZU">Zulu - isiZulu</option>
            </select>
        </div>


        <div class="mb-3">
            <label class="form-label">Select Country</label>
            <select name="country" class="single-select" data-placeholder="Choose User Country">
                <option value=""></option>
                <option value="AF" @selected(old('country', $user['country']) == 'AF')>Afghanistan</option>
                <option value="AX">Aland Islands</option>
                <option value="AL">Albania</option>
                <option value="DZ">Algeria</option>
                <option value="AS">American Samoa</option>
                <option value="AD">Andorra</option>
                <option value="AO">Angola</option>
                <option value="AI">Anguilla</option>
                <option value="AQ">Antarctica</option>
                <option value="AG">Antigua and Barbuda</option>
                <option value="AR">Argentina</option>
                <option value="AM">Armenia</option>
                <option value="AW">Aruba</option>
                <option value="AU">Australia</option>
                <option value="AT">Austria</option>
                <option value="AZ">Azerbaijan</option>
                <option value="BS">Bahamas</option>
                <option value="BH">Bahrain</option>
                <option value="BD">Bangladesh</option>
                <option value="BB">Barbados</option>
                <option value="BY">Belarus</option>
                <option value="BE">Belgium</option>
                <option value="BZ">Belize</option>
                <option value="BJ">Benin</option>
                <option value="BM">Bermuda</option>
                <option value="BT">Bhutan</option>
                <option value="BO">Bolivia</option>
                <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                <option value="BA">Bosnia and Herzegovina</option>
                <option value="BW">Botswana</option>
                <option value="BV">Bouvet Island</option>
                <option value="BR">Brazil</option>
                <option value="IO">British Indian Ocean Territory</option>
                <option value="BN">Brunei Darussalam</option>
                <option value="BG">Bulgaria</option>
                <option value="BF">Burkina Faso</option>
                <option value="BI">Burundi</option>
                <option value="KH">Cambodia</option>
                <option value="CM">Cameroon</option>
                <option value="CA">Canada</option>
                <option value="CV">Cape Verde</option>
                <option value="KY">Cayman Islands</option>
                <option value="CF">Central African Republic</option>
                <option value="TD">Chad</option>
                <option value="CL">Chile</option>
                <option value="CN">China</option>
                <option value="CX">Christmas Island</option>
                <option value="CC">Cocos (Keeling) Islands</option>
                <option value="CO">Colombia</option>
                <option value="KM">Comoros</option>
                <option value="CG">Congo</option>
                <option value="CD">Congo, Democratic Republic of the Congo</option>
                <option value="CK">Cook Islands</option>
                <option value="CR">Costa Rica</option>
                <option value="CI">Cote D'Ivoire</option>
                <option value="HR">Croatia</option>
                <option value="CU">Cuba</option>
                <option value="CW">Curacao</option>
                <option value="CY">Cyprus</option>
                <option value="CZ">Czech Republic</option>
                <option value="DK">Denmark</option>
                <option value="DJ">Djibouti</option>
                <option value="DM">Dominica</option>
                <option value="DO">Dominican Republic</option>
                <option value="EC">Ecuador</option>
                <option value="EG">Egypt</option>
                <option value="SV">El Salvador</option>
                <option value="GQ">Equatorial Guinea</option>
                <option value="ER">Eritrea</option>
                <option value="EE">Estonia</option>
                <option value="ET">Ethiopia</option>
                <option value="FK">Falkland Islands (Malvinas)</option>
                <option value="FO">Faroe Islands</option>
                <option value="FJ">Fiji</option>
                <option value="FI">Finland</option>
                <option value="FR">France</option>
                <option value="GF">French Guiana</option>
                <option value="PF">French Polynesia</option>
                <option value="TF">French Southern Territories</option>
                <option value="GA">Gabon</option>
                <option value="GM">Gambia</option>
                <option value="GE">Georgia</option>
                <option value="DE">Germany</option>
                <option value="GH">Ghana</option>
                <option value="GI">Gibraltar</option>
                <option value="GR">Greece</option>
                <option value="GL">Greenland</option>
                <option value="GD">Grenada</option>
                <option value="GP">Guadeloupe</option>
                <option value="GU">Guam</option>
                <option value="GT">Guatemala</option>
                <option value="GG">Guernsey</option>
                <option value="GN">Guinea</option>
                <option value="GW">Guinea-Bissau</option>
                <option value="GY">Guyana</option>
                <option value="HT">Haiti</option>
                <option value="HM">Heard Island and Mcdonald Islands</option>
                <option value="VA">Holy See (Vatican City State)</option>
                <option value="HN">Honduras</option>
                <option value="HK">Hong Kong</option>
                <option value="HU">Hungary</option>
                <option value="IS">Iceland</option>
                <option value="IN">India</option>
                <option value="ID">Indonesia</option>
                <option value="IR">Iran, Islamic Republic of</option>
                <option value="IQ">Iraq</option>
                <option value="IE">Ireland</option>
                <option value="IM">Isle of Man</option>
                <option value="IT">Italy</option>
                <option value="JM">Jamaica</option>
                <option value="JP">Japan</option>
                <option value="JE">Jersey</option>
                <option value="JO">Jordan</option>
                <option value="KZ">Kazakhstan</option>
                <option value="KE">Kenya</option>
                <option value="KI">Kiribati</option>
                <option value="KP">Korea, Democratic People's Republic of</option>
                <option value="KR">Korea, Republic of</option>
                <option value="XK">Kosovo</option>
                <option value="KW">Kuwait</option>
                <option value="KG">Kyrgyzstan</option>
                <option value="LA">Lao People's Democratic Republic</option>
                <option value="LV">Latvia</option>
                <option value="LB">Lebanon</option>
                <option value="LS">Lesotho</option>
                <option value="LR">Liberia</option>
                <option value="LY">Libyan Arab Jamahiriya</option>
                <option value="LI">Liechtenstein</option>
                <option value="LT">Lithuania</option>
                <option value="LU">Luxembourg</option>
                <option value="MO">Macao</option>
                <option value="MK">Macedonia, the Former Yugoslav Republic of</option>
                <option value="MG">Madagascar</option>
                <option value="MW">Malawi</option>
                <option value="MY">Malaysia</option>
                <option value="MV">Maldives</option>
                <option value="ML">Mali</option>
                <option value="MT">Malta</option>
                <option value="MH">Marshall Islands</option>
                <option value="MQ">Martinique</option>
                <option value="MR">Mauritania</option>
                <option value="MU">Mauritius</option>
                <option value="YT">Mayotte</option>
                <option value="MX">Mexico</option>
                <option value="FM">Micronesia, Federated States of</option>
                <option value="MD">Moldova, Republic of</option>
                <option value="MC">Monaco</option>
                <option value="MN">Mongolia</option>
                <option value="ME">Montenegro</option>
                <option value="MS">Montserrat</option>
                <option value="MA">Morocco</option>
                <option value="MZ">Mozambique</option>
                <option value="MM">Myanmar</option>
                <option value="NA">Namibia</option>
                <option value="NR">Nauru</option>
                <option value="NP">Nepal</option>
                <option value="NL">Netherlands</option>
                <option value="AN">Netherlands Antilles</option>
                <option value="NC">New Caledonia</option>
                <option value="NZ">New Zealand</option>
                <option value="NI">Nicaragua</option>
                <option value="NE">Niger</option>
                <option value="NG">Nigeria</option>
                <option value="NU">Niue</option>
                <option value="NF">Norfolk Island</option>
                <option value="MP">Northern Mariana Islands</option>
                <option value="NO">Norway</option>
                <option value="OM">Oman</option>
                <option value="PK">Pakistan</option>
                <option value="PW">Palau</option>
                <option value="PS" @selected(old('country', $user['country']) == 'PS')>Palestinian Territory, Occupied</option>
                <option value="PA">Panama</option>
                <option value="PG">Papua New Guinea</option>
                <option value="PY">Paraguay</option>
                <option value="PE">Peru</option>
                <option value="PH">Philippines</option>
                <option value="PN">Pitcairn</option>
                <option value="PL">Poland</option>
                <option value="PT">Portugal</option>
                <option value="PR">Puerto Rico</option>
                <option value="QA">Qatar</option>
                <option value="RE">Reunion</option>
                <option value="RO">Romania</option>
                <option value="RU">Russian Federation</option>
                <option value="RW">Rwanda</option>
                <option value="BL">Saint Barthelemy</option>
                <option value="SH">Saint Helena</option>
                <option value="KN">Saint Kitts and Nevis</option>
                <option value="LC">Saint Lucia</option>
                <option value="MF">Saint Martin</option>
                <option value="PM">Saint Pierre and Miquelon</option>
                <option value="VC">Saint Vincent and the Grenadines</option>
                <option value="WS">Samoa</option>
                <option value="SM">San Marino</option>
                <option value="ST">Sao Tome and Principe</option>
                <option value="SA">Saudi Arabia</option>
                <option value="SN">Senegal</option>
                <option value="RS">Serbia</option>
                <option value="CS">Serbia and Montenegro</option>
                <option value="SC">Seychelles</option>
                <option value="SL">Sierra Leone</option>
                <option value="SG">Singapore</option>
                <option value="SX">Sint Maarten</option>
                <option value="SK">Slovakia</option>
                <option value="SI">Slovenia</option>
                <option value="SB">Solomon Islands</option>
                <option value="SO">Somalia</option>
                <option value="ZA">South Africa</option>
                <option value="GS">South Georgia and the South Sandwich Islands</option>
                <option value="SS">South Sudan</option>
                <option value="ES">Spain</option>
                <option value="LK">Sri Lanka</option>
                <option value="SD">Sudan</option>
                <option value="SR">Suriname</option>
                <option value="SJ">Svalbard and Jan Mayen</option>
                <option value="SZ">Swaziland</option>
                <option value="SE">Sweden</option>
                <option value="CH">Switzerland</option>
                <option value="SY">Syrian Arab Republic</option>
                <option value="TW">Taiwan, Province of China</option>
                <option value="TJ">Tajikistan</option>
                <option value="TZ">Tanzania, United Republic of</option>
                <option value="TH">Thailand</option>
                <option value="TL">Timor-Leste</option>
                <option value="TG">Togo</option>
                <option value="TK">Tokelau</option>
                <option value="TO">Tonga</option>
                <option value="TT">Trinidad and Tobago</option>
                <option value="TN">Tunisia</option>
                <option value="TR">Turkey</option>
                <option value="TM">Turkmenistan</option>
                <option value="TC">Turks and Caicos Islands</option>
                <option value="TV">Tuvalu</option>
                <option value="UG">Uganda</option>
                <option value="UA">Ukraine</option>
                <option value="AE">United Arab Emirates</option>
                <option value="GB">United Kingdom</option>
                <option value="US">United States</option>
                <option value="UM">United States Minor Outlying Islands</option>
                <option value="UY">Uruguay</option>
                <option value="UZ">Uzbekistan</option>
                <option value="VU">Vanuatu</option>
                <option value="VE">Venezuela</option>
                <option value="VN">Viet Nam</option>
                <option value="VG">Virgin Islands, British</option>
                <option value="VI">Virgin Islands, U.s.</option>
                <option value="WF">Wallis and Futuna</option>
                <option value="EH">Western Sahara</option>
                <option value="YE">Yemen</option>
                <option value="ZM">Zambia</option>
                <option value="ZW">Zimbabwe</option>
            </select>
        </div>
<<<<<<< HEAD
        <div class="select col-12 col-md-6">
            <label class="form-label">Choose Language</label>
            <select name="languages" id="languages" multiple>
            <option value="af">Afghanistan</option>
            <option value="au">Australia</option>
            <option value="ge">Germany</option>
            <option value="ca">Canada</option>
            <option value="ru">Russia</option>
            </select>
        </div>
        {{-- <x-BaseComponents.form.common.select_fixed name="languages" :model="$user" :options="[
            'ar' => 'Arabic',
            'en' => 'English',
            'fr' => 'French',
            'de' => 'German',
            'tr' => 'Turkish',
        ]" /> --}}
=======
>>>>>>> b6de5a15219b688ff2257318d6e8614611268b8d


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


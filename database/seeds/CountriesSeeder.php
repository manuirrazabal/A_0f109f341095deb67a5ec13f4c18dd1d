<?php

use App\Models\Country;
use App\Models\States;
use App\Models\Cities;
use Illuminate\Database\Seeder;

class CountriesSeeder extends Seeder
{
    /**
     * Protected attributes.
     *
     * @var array
     */
    protected $initCountries = array(
    	[ 'AF',  'Afghanistan', '0'],
		[ 'AL',  'Albania', '0'],
		[ 'DZ',  'Algeria', '0'],
		[ 'AS',  'American Samoa', '0'],
		[ 'AD',  'Andorra', '0'],
		[ 'AO',  'Angola', '0'],
		[ 'AI',  'Anguilla', '0'],
		[ 'AQ',  'Antarctica', '0'],
		[ 'AG',  'Antigua And Barbuda', '0'],
		[ 'AR',  'Argentina', '0'],
		[ 'AM',  'Armenia', '0'],
		[ 'AW',  'Aruba', '0'],
		[ 'AU',  'Australia', '0'],
		[ 'AT',  'Austria', '0'],
		[ 'AZ',  'Azerbaijan', '0'],
		[ 'BS',  'Bahamas The', '0'],
		[ 'BH',  'Bahrain', '0'],
		[ 'BD',  'Bangladesh', '0'],
		[ 'BB',  'Barbados', '0'],
		[ 'BY',  'Belarus', '0'],
		[ 'BE',  'Belgium', '0'],
		[ 'BZ',  'Belize', '0'],
		[ 'BJ',  'Benin', '0'],
		[ 'BM',  'Bermuda', '0'],
		[ 'BT',  'Bhutan', '0'],
		[ 'BO',  'Bolivia', '0'],
		[ 'BA',  'Bosnia and Herzegovina', '0'],
		[ 'BW',  'Botswana', '0'],
		[ 'BV',  'Bouvet Island', '0'],
		[ 'BR',  'Brazil', '0'],
		[ 'IO',  'British Indian Ocean Territory', '0'],
		[ 'BN',  'Brunei', '0'],
		[ 'BG',  'Bulgaria', '0'],
		[ 'BF',  'Burkina Faso', '0'],
		[ 'BI',  'Burundi', '0'],
		[ 'KH',  'Cambodia', '0'],
		[ 'CM',  'Cameroon', '0'],
		[ 'CA',  'Canada', '0'],
		[ 'CV',  'Cape Verde', '0'],
		[ 'KY',  'Cayman Islands', '0'],
		[ 'CF',  'Central African Republic', '0'],
		[ 'TD',  'Chad', '0'],
		[ 'CL',  'Chile', '1'],
		[ 'CN',  'China', '0'],
		[ 'CX',  'Christmas Island', '0'],
		[ 'CC',  'Cocos Keeling Islands', '0'],
		[ 'CO',  'Colombia', '0'],
		[ 'KM',  'Comoros', '0'],
		[ 'CG',  'Republic Of The Congo', '0'],
		[ 'CD',  'Democratic Republic Of The Congo', '0'],
		[ 'CK',  'Cook Islands', '0'],
		[ 'CR',  'Costa Rica', '0'],
		[ 'CI',  'Cote DIvoire Ivory Coast', '0'],
		[ 'HR',  'Croatia Hrvatska', '0'],
		[ 'CU',  'Cuba', '0'],
		[ 'CY',  'Cyprus', '0'],
		[ 'CZ',  'Czech Republic', '0'],
		[ 'DK',  'Denmark', '0'],
		[ 'DJ',  'Djibouti', '0'],
		[ 'DM',  'Dominica', '0'],
		[ 'DO',  'Dominican Republic', '0'],
		[ 'TP',  'East Timor', '0'],
		[ 'EC',  'Ecuador', '0'],
		[ 'EG',  'Egypt', '0'],
		[ 'SV',  'El Salvador', '0'],
		[ 'GQ',  'Equatorial Guinea', '0'],
		[ 'ER',  'Eritrea', '0'],
		[ 'EE',  'Estonia', '0'],
		[ 'ET',  'Ethiopia', '0'],
		[ 'XA',  'External Territories of Australia', '0'],
		[ 'FK',  'Falkland Islands', '0'],
		[ 'FO',  'Faroe Islands', '0'],
		[ 'FJ',  'Fiji Islands', '0'],
		[ 'FI',  'Finland', '0'],
		[ 'FR',  'France', '0'],
		[ 'GF',  'French Guiana', '0'],
		[ 'PF',  'French Polynesia', '0'],
		[ 'TF',  'French Southern Territories', '0'],
		[ 'GA',  'Gabon', '0'],
		[ 'GM',  'Gambia The', '0'],
		[ 'GE',  'Georgia', '0'],
		[ 'DE',  'Germany', '0'],
		[ 'GH',  'Ghana', '0'],
		[ 'GI',  'Gibraltar', '0'],
		[ 'GR',  'Greece', '0'],
		[ 'GL',  'Greenland', '0'],
		[ 'GD',  'Grenada', '0'],
		[ 'GP',  'Guadeloupe', '0'],
		[ 'GU',  'Guam', '0'],
		[ 'GT',  'Guatemala', '0'],
		[ 'XU',  'Guernsey and Alderney', '0'],
		[ 'GN',  'Guinea', '0'],
		[ 'GW',  'Guinea-Bissau', '0'],
		[ 'GY',  'Guyana', '0'],
		[ 'HT',  'Haiti', '0'],
		[ 'HM',  'Heard and McDonald Islands', '0'],
		[ 'HN',  'Honduras', '0'],
		[ 'HK',  'Hong Kong S.A.R.', '0'],
		[ 'HU',  'Hungary', '0'],
		[ 'IS',  'Iceland', '0'],
		[ 'IN',  'India', '0'],
		[ 'ID',  'Indonesia', '0'],
		[ 'IR',  'Iran', '0'],
		[ 'IQ',  'Iraq', '0'],
		[ 'IE',  'Ireland', '0'],
		[ 'IL',  'Israel', '0'],
		[ 'IT',  'Italy', '0'],
		[ 'JM',  'Jamaica', '0'],
		[ 'JP',  'Japan', '0'],
		[ 'XJ',  'Jersey', '0'],
		[ 'JO',  'Jordan', '0'],
		[ 'KZ',  'Kazakhstan', '0'],
		[ 'KE',  'Kenya', '0'],
		[ 'KI',  'Kiribati', '0'],
		[ 'KP',  'Korea North', '0'],
		[ 'KR',  'Korea South', '0'],
		[ 'KW',  'Kuwait', '0'],
		[ 'KG',  'Kyrgyzstan', '0'],
		[ 'LA',  'Laos', '0'],
		[ 'LV',  'Latvia', '0'],
		[ 'LB',  'Lebanon', '0'],
		[ 'LS',  'Lesotho', '0'],
		[ 'LR',  'Liberia', '0'],
		[ 'LY',  'Libya', '0'],
		[ 'LI',  'Liechtenstein', '0'],
		[ 'LT',  'Lithuania', '0'],
		[ 'LU',  'Luxembourg', '0'],
		[ 'MO',  'Macau S.A.R.', '0'],
		[ 'MK',  'Macedonia', '0'],
		[ 'MG',  'Madagascar', '0'],
		[ 'MW',  'Malawi', '0'],
		[ 'MY',  'Malaysia', '0'],
		[ 'MV',  'Maldives', '0'],
		[ 'ML',  'Mali', '0'],
		[ 'MT',  'Malta', '0'],
		[ 'XM',  'Man Isle of', '0'],
		[ 'MH',  'Marshall Islands', '0'],
		[ 'MQ',  'Martinique', '0'],
		[ 'MR',  'Mauritania', '0'],
		[ 'MU',  'Mauritius', '0'],
		[ 'YT',  'Mayotte', '0'],
		[ 'MX',  'Mexico', '0'],
		[ 'FM',  'Micronesia', '0'],
		[ 'MD',  'Moldova', '0'],
		[ 'MC',  'Monaco', '0'],
		[ 'MN',  'Mongolia', '0'],
		[ 'MS',  'Montserrat', '0'],
		[ 'MA',  'Morocco', '0'],
		[ 'MZ',  'Mozambique', '0'],
		[ 'MM',  'Myanmar', '0'],
		[ 'NA',  'Namibia', '0'],
		[ 'NR',  'Nauru', '0'],
		[ 'NP',  'Nepal', '0'],
		[ 'AN',  'Netherlands Antilles', '0'],
		[ 'NL',  'Netherlands The', '0'],
		[ 'NC',  'New Caledonia', '0'],
		[ 'NZ',  'New Zealand', '0'],
		[ 'NI',  'Nicaragua', '0'],
		[ 'NE',  'Niger', '0'],
		[ 'NG',  'Nigeria', '0'],
		[ 'NU',  'Niue', '0'],
		[ 'NF',  'Norfolk Island', '0'],
		[ 'MP',  'Northern Mariana Islands', '0'],
		[ 'NO',  'Norway', '0'],
		[ 'OM',  'Oman', '0'],
		[ 'PK',  'Pakistan', '0'],
		[ 'PW',  'Palau', '0'],
		[ 'PS',  'Palestinian Territory Occupied', '0'],
		[ 'PA',  'Panama', '0'],
		[ 'PG',  'Papua new Guinea', '0'],
		[ 'PY',  'Paraguay', '0'],
		[ 'PE',  'Peru', '0'],
		[ 'PH',  'Philippines', '0'],
		[ 'PN',  'Pitcairn Island', '0'],
		[ 'PL',  'Poland', '0'],
		[ 'PT',  'Portugal', '0'],
		[ 'PR',  'Puerto Rico', '0'],
		[ 'QA',  'Qatar', '0'],
		[ 'RE',  'Reunion', '0'],
		[ 'RO',  'Romania', '0'],
		[ 'RU',  'Russia', '0'],
		[ 'RW',  'Rwanda', '0'],
		[ 'SH',  'Saint Helena', '0'],
		[ 'KN',  'Saint Kitts And Nevis', '0'],
		[ 'LC',  'Saint Lucia', '0'],
		[ 'PM',  'Saint Pierre and Miquelon', '0'],
		[ 'VC',  'Saint Vincent And The Grenadines', '0'],
		[ 'WS',  'Samoa', '0'],
		[ 'SM',  'San Marino', '0'],
		[ 'ST',  'Sao Tome and Principe', '0'],
		[ 'SA',  'Saudi Arabia', '0'],
		[ 'SN',  'Senegal', '0'],
		[ 'RS',  'Serbia', '0'],
		[ 'SC',  'Seychelles', '0'],
		[ 'SL',  'Sierra Leone', '0'],
		[ 'SG',  'Singapore', '0'],
		[ 'SK',  'Slovakia', '0'],
		[ 'SI',  'Slovenia', '0'],
		[ 'XG',  'Smaller Territories of the UK', '0'],
		[ 'SB',  'Solomon Islands', '0'],
		[ 'SO',  'Somalia', '0'],
		[ 'ZA',  'South Africa', '0'],
		[ 'GS',  'South Georgia', '0'],
		[ 'SS',  'South Sudan', '0'],
		[ 'ES',  'Spain', '0'],
		[ 'LK',  'Sri Lanka', '0'],
		[ 'SD',  'Sudan', '0'],
		[ 'SR',  'Suriname', '0'],
		[ 'SJ',  'Svalbard And Jan Mayen Islands', '0'],
		[ 'SZ',  'Swaziland', '0'],
		[ 'SE',  'Sweden', '0'],
		[ 'CH',  'Switzerland', '0'],
		[ 'SY',  'Syria', '0'],
		[ 'TW',  'Taiwan', '0'],
		[ 'TJ',  'Tajikistan', '0'],
		[ 'TZ',  'Tanzania', '0'],
		[ 'TH',  'Thailand', '0'],
		[ 'TG',  'Togo', '0'],
		[ 'TK',  'Tokelau', '0'],
		[ 'TO',  'Tonga', '0'],
		[ 'TT',  'Trinidad And Tobago', '0'],
		[ 'TN',  'Tunisia', '0'],
		[ 'TR',  'Turkey', '0'],
		[ 'TM',  'Turkmenistan', '0'],
		[ 'TC',  'Turks And Caicos Islands', '0'],
		[ 'TV',  'Tuvalu', '0'],
		[ 'UG',  'Uganda', '0'],
		[ 'UA',  'Ukraine', '0'],
		[ 'AE',  'United Arab Emirates', '0'],
		[ 'GB',  'United Kingdom', '0'],
		[ 'US',  'United States', '0'],
		[ 'UM',  'United States Minor Outlying Islands', '0'],
		[ 'UY',  'Uruguay', '0'],
		[ 'UZ',  'Uzbekistan', '0'],
		[ 'VU',  'Vanuatu', '0'],
		[ 'VA',  'Vatican City State Holy See', '0'],
		[ 'VE',  'Venezuela', '0'],
		[ 'VN',  'Vietnam', '0'],
		[ 'VG',  'Virgin Islands British', '0'],
		[ 'VI',  'Virgin Islands US', '0'],
		[ 'WF',  'Wallis And Futuna Islands', '0'],
		[ 'EH',  'Western Sahara', '0'],
		[ 'YE',  'Yemen', '0'],
		[ 'YU',  'Yugoslavia', '0'],
		[ 'ZM',  'Zambia', '0'],
		[ 'ZW',  'Zimbabwe', '0'],
    	);

    protected $initStates = array(
    	['Arica y Parinacota', '1', '0'],
		['Tarapacá', '2', '0'],
		['Antofagasta', '3', '0'],
		['Atacama', '4', '0'],
		['Coquimbo', '5', '0'],
		['Valparaíso', '6', '0'],
		['Libertador B. OHiggins', '7', '0'],
		['Maule', '8', '0'],
		['Bíobío', '9', '0'],
		['La Araucanía', '10', '0'],
		['Los Ríos', '11', '0'],
		['Los Lagos', '12', '0'],
		['Aisén del Gral. C. Ibáñez del Campo', '13', '0'],
		['Magallanes y La Antártica Chilena', '14', '0'],
		['Metropolitana de Santiago', '15', '1'],
		);

    protected $initCities = array(
    	['Arica', '15101', '1'],
		['Camarones', '15102', '1'],
		['Putre', '15201', '1'],
		['General Lagos', '15202', '1'],
		['Iquique', '01101', '2'],
		['Camiña', '01402', '2'],
		['Colchane', '01403', '2'],
		['Huara', '01404', '2'],
		['Pica', '01405', '2'],
		['Pozo Almonte', '01401', '2'],
		['Alto Hospicio', '01107', '2'],
		['Antofagasta', '02101', '3'],
		['Mejillones', '02102', '3'],
		['Sierra Gorda', '02103', '3'],
		['Taltal', '02104', '3'],
		['Calama', '02201', '3'],
		['Ollagüe', '02202', '3'],
		['San Pedro de Atacama', '02203', '3'],
		['Tocopilla', '02301', '3'],
		['María Elena', '02302', '3'],
		['Copiapó', '03101', '4'],
		['Caldera', '03102', '4'],
		['Tierra Amarilla', '03103', '4'],
		['Chañaral', '03201', '4'],
		['Diego de Almagro', '03202', '4'],
		['Vallenar', '03301', '4'],
		['Alto del Carmen', '03302', '4'],
		['Freirina', '03303', '4'],
		['Huasco', '03304', '4'],
		['La Serena', '04101', '5'],
		['Coquimbo', '04102', '5'],
		['Andacollo', '04103', '5'],
		['La Higuera', '04104', '5'],
		['Paiguano', '04105', '5'],
		['Vicuña', '04106', '5'],
		['Illapel', '04201', '5'],
		['Canela', '04202', '5'],
		['Los Vilos', '04203', '5'],
		['Salamanca', '04204', '5'],
		['Ovalle', '04301', '5'],
		['Combarbalá', '04302', '5'],
		['Monte Patria', '04303', '5'],
		['Punitaqui', '04304', '5'],
		['Río Hurtado', '04305', '5'],
		['Valparaíso', '05101', '6'],
		['Casablanca', '05102', '6'],
		['Concón', '05103', '6'],
		['Juan Fernández', '05104', '6'],
		['Puchuncaví', '05105', '6'],
		['Quilpué', '05801', '6'],
		['Quintero', '05107', '6'],
		['Villa Alemana', '05804', '6'],
		['Viña del Mar', '05109', '6'],
		['Isla  de Pascua', '05201', '6'],
		['Los Andes', '05301', '6'],
		['Calle Larga', '05302', '6'],
		['Rinconada', '05303', '6'],
		['San Esteban', '05304', '6'],
		['La Ligua', '05401', '6'],
		['Cabildo', '05402', '6'],
		['Papudo', '05403', '6'],
		['Petorca', '05404', '6'],
		['Zapallar', '05405', '6'],
		['Quillota', '05501', '6'],
		['Calera', '05502', '6'],
		['Hijuelas', '05503', '6'],
		['La Cruz', '05504', '6'],
		['Limache', '05802', '6'],
		['Nogales', '05506', '6'],
		['Olmué', '05803', '6'],
		['San Antonio', '05601', '6'],
		['Algarrobo', '05602', '6'],
		['Cartagena', '05603', '6'],
		['El Quisco', '05604', '6'],
		['El Tabo', '05605', '6'],
		['Santo Domingo', '05606', '6'],
		['San Felipe', '05701', '6'],
		['Catemu', '05702', '6'],
		['Llaillay', '05703', '6'],
		['Panquehue', '05704', '6'],
		['Putaendo', '05705', '6'],
		['Santa María', '05706', '6'],
		['Rancagua', '06101', '7'],
		['Codegua', '06102', '7'],
		['Coinco', '06103', '7'],
		['Coltauco', '06104', '7'],
		['Doñihue', '06105', '7'],
		['Graneros', '06106', '7'],
		['Las Cabras', '06107', '7'],
		['Machalí', '06108', '7'],
		['Malloa', '06109', '7'],
		['Mostazal', '06110', '7'],
		['Olivar', '06111', '7'],
		['Peumo', '06112', '7'],
		['Pichidegua', '06113', '7'],
		['Quinta de Tilcoco', '06114', '7'],
		['Rengo', '06115', '7'],
		['Requínoa', '06116', '7'],
		['San Vicente', '06117', '7'],
		['Pichilemu', '06201', '7'],
		['La Estrella', '06202', '7'],
		['Litueche', '06203', '7'],
		['Marchihue', '06204', '7'],
		['Navidad', '06205', '7'],
		['Paredones', '06206', '7'],
		['San Fernando', '06301', '7'],
		['Chépica', '06302', '7'],
		['Chimbarongo', '06303', '7'],
		['Lolol', '06304', '7'],
		['Nancagua', '06305', '7'],
		['Palmilla', '06306', '7'],
		['Peralillo', '06307', '7'],
		['Placilla', '06308', '7'],
		['Pumanque', '06309', '7'],
		['Santa Cruz', '06310', '7'],
		['Talca', '07101', '8'],
		['Constitución', '07102', '8'],
		['Curepto', '07103', '8'],
		['Empedrado', '07104', '8'],
		['Maule', '07105', '8'],
		['Pelarco', '07106', '8'],
		['Pencahue', '07107', '8'],
		['Río Claro', '07108', '8'],
		['San Clemente', '07109', '8'],
		['San Rafael', '07110', '8'],
		['Cauquenes', '07201', '8'],
		['Chanco', '07202', '8'],
		['Pelluhue', '07203', '8'],
		['Curicó', '07301', '8'],
		['Hualañé', '07302', '8'],
		['Licantén', '07303', '8'],
		['Molina', '07304', '8'],
		['Rauco', '07305', '8'],
		['Romeral', '07306', '8'],
		['Sagrada Familia', '07307', '8'],
		['Teno', '07308', '8'],
		['Vichuquén', '07309', '8'],
		['Linares', '07401', '8'],
		['Colbún', '07402', '8'],
		['Longaví', '07403', '8'],
		['Parral', '07404', '8'],
		['Retiro', '07405', '8'],
		['San Javier', '07406', '8'],
		['Villa Alegre', '07407', '8'],
		['Yerbas Buenas', '07408', '8'],
		['Concepción', '08101', '9'],
		['Coronel', '08102', '9'],
		['Chiguayante', '08103', '9'],
		['Florida', '08104', '9'],
		['Hualqui', '08105', '9'],
		['Lota', '08106', '9'],
		['Penco', '08107', '9'],
		['San Pedro de la Paz', '08108', '9'],
		['Santa Juana', '08109', '9'],
		['Talcahuano', '08110', '9'],
		['Tomé', '08111', '9'],
		['Hualpén', '08112', '9'],
		['Lebu', '08201', '9'],
		['Arauco', '08202', '9'],
		['Cañete', '08203', '9'],
		['Contulmo', '08204', '9'],
		['Curanilahue', '08205', '9'],
		['Los Álamos', '08206', '9'],
		['Tirúa', '08207', '9'],
		['Los Ángeles', '08301', '9'],
		['Antuco', '08302', '9'],
		['Cabrero', '08303', '9'],
		['Laja', '08304', '9'],
		['Mulchén', '08305', '9'],
		['Nacimiento', '08306', '9'],
		['Negrete', '08307', '9'],
		['Quilaco', '08308', '9'],
		['Quilleco', '08309', '9'],
		['San Rosendo', '08310', '9'],
		['Santa Bárbara', '08311', '9'],
		['Tucapel', '08312', '9'],
		['Yumbel', '08313', '9'],
		['Alto Biobío', '08314', '9'],
		['Chillán', '08401', '9'],
		['Bulnes', '08402', '9'],
		['Cobquecura', '08403', '9'],
		['Coelemu', '08404', '9'],
		['Coihueco', '08405', '9'],
		['Chillán Viejo', '08406', '9'],
		['El Carmen', '08407', '9'],
		['Ninhue', '08408', '9'],
		['Ñiquén', '08409', '9'],
		['Pemuco', '08410', '9'],
		['Pinto', '08411', '9'],
		['Portezuelo', '08412', '9'],
		['Quillón', '08413', '9'],
		['Quirihue', '08414', '9'],
		['Ránquil', '08415', '9'],
		['San Carlos', '08416', '9'],
		['San Fabián', '08417', '9'],
		['San Ignacio', '08418', '9'],
		['San Nicolás', '08419', '9'],
		['Treguaco', '08420', '9'],
		['Yungay', '08421', '9'],
		['Temuco', '09101', '10'],
		['Carahue', '09102', '10'],
		['Cunco', '09103', '10'],
		['Curarrehue', '09104', '10'],
		['Freire', '09105', '10'],
		['Galvarino', '09106', '10'],
		['Gorbea', '09107', '10'],
		['Lautaro', '09108', '10'],
		['Loncoche', '09109', '10'],
		['Melipeuco', '09110', '10'],
		['Nueva Imperial', '09111', '10'],
		['Padre Las Casas', '09112', '10'],
		['Perquenco', '09113', '10'],
		['Pitrufquén', '09114', '10'],
		['Pucón', '09115', '10'],
		['Saavedra', '09116', '10'],
		['Teodoro Schmidt', '09117', '10'],
		['Toltén', '09118', '10'],
		['Vilcún', '09119', '10'],
		['Villarrica', '09120', '10'],
		['Cholchol', '09121', '10'],
		['Angol', '09201', '10'],
		['Collipulli', '09202', '10'],
		['Curacautín', '09203', '10'],
		['Ercilla', '09204', '10'],
		['Lonquimay', '09205', '10'],
		['Los Sauces', '09206', '10'],
		['Lumaco', '09207', '10'],
		['Purén', '09208', '10'],
		['Renaico', '09209', '10'],
		['Traiguén', '09210', '10'],
		['Victoria', '09211', '10'],
		['Valdivia', '14101', '11'],
		['Corral', '14102', '11'],
		['Futrono', '14202', '11'],
		['La Unión', '14201', '11'],
		['Lago Ranco', '14203', '11'],
		['Lanco', '14103', '11'],
		['Los Lagos', '14104', '11'],
		['Máfil', '14105', '11'],
		['Mariquina', '14106', '11'],
		['Paillaco', '14107', '11'],
		['Panguipulli', '14108', '11'],
		['Río Bueno', '14204', '11'],
		['Puerto Montt', '10101', '12'],
		['Calbuco', '10102', '12'],
		['Cochamó', '10103', '12'],
		['Fresia', '10104', '12'],
		['Frutillar', '10105', '12'],
		['Los Muermos', '10106', '12'],
		['Llanquihue', '10107', '12'],
		['Maullín', '10108', '12'],
		['Puerto Varas', '10109', '12'],
		['Castro', '10201', '12'],
		['Ancud', '10202', '12'],
		['Chonchi', '10203', '12'],
		['Curaco de Vélez', '10204', '12'],
		['Dalcahue', '10205', '12'],
		['Puqueldón', '10206', '12'],
		['Queilén', '10207', '12'],
		['Quellón', '10208', '12'],
		['Quemchi', '10209', '12'],
		['Quinchao', '10210', '12'],
		['Osorno', '10301', '12'],
		['Puerto Octay', '10302', '12'],
		['Purranque', '10303', '12'],
		['Puyehue', '10304', '12'],
		['Río Negro', '10305', '12'],
		['San Juan de la Costa', '10306', '12'],
		['San Pablo', '10307', '12'],
		['Chaitén', '10401', '12'],
		['Futaleufú', '10402', '12'],
		['Hualaihué', '10403', '12'],
		['Palena', '10404', '12'],
		['Coihaique', '11101', '13'],
		['Lago Verde', '11102', '13'],
		['Aisén', '11201', '13'],
		['Cisnes', '11202', '13'],
		['Guaitecas', '11203', '13'],
		['Cochrane', '11301', '13'],
		['OHiggins', '11302', '13'],
		['Tortel', '11303', '13'],
		['Chile Chico', '11401', '13'],
		['Río Ibáñez', '11402', '13'],
		['Punta Arenas', '12101', '14'],
		['Laguna Blanca', '12102', '14'],
		['Río Verde', '12103', '14'],
		['San Gregorio', '12104', '14'],
		['Cabo de Hornos', '12201', '14'],
		['Antártica', '12202', '14'],
		['Porvenir', '12301', '14'],
		['Primavera', '12302', '14'],
		['Timaukel', '12303', '14'],
		['Natales', '12401', '14'],
		['Torres del Paine', '12402', '14'],
		['Santiago', '13101', '15'],
		['Cerrillos', '13102', '15'],
		['Cerro Navia', '13103', '15'],
		['Conchalí', '13104', '15'],
		['El Bosque', '13105', '15'],
		['Estación Central', '13106', '15'],
		['Huechuraba', '13107', '15'],
		['Independencia', '13108', '15'],
		['La Cisterna', '13109', '15'],
		['La Florida', '13110', '15'],
		['La Granja', '13111', '15'],
		['La Pintana', '13112', '15'],
		['La Reina', '13113', '15'],
		['Las Condes', '13114', '15'],
		['Lo Barnechea', '13115', '15'],
		['Lo Espejo', '13116', '15'],
		['Lo Prado', '13117', '15'],
		['Macul', '13118', '15'],
		['Maipú', '13119', '15'],
		['Ñuñoa', '13120', '15'],
		['Pedro Aguirre Cerda', '13121', '15'],
		['Peñalolén', '13122', '15'],
		['Providencia', '13123', '15'],
		['Pudahuel', '13124', '15'],
		['Quilicura', '13125', '15'],
		['Quinta Normal', '13126', '15'],
		['Recoleta', '13127', '15'],
		['Renca', '13128', '15'],
		['San Joaquín', '13129', '15'],
		['San Miguel', '13130', '15'],
		['San Ramón', '13131', '15'],
		['Vitacura', '13132', '15'],
		['Puente Alto', '13201', '15'],
		['Pirque', '13202', '15'],
		['San José de Maipo', '13203', '15'],
		['Colina', '13301', '15'],
		['Lampa', '13302', '15'],
		['Tiltil', '13303', '15'],
		['San Bernardo', '13401', '15'],
		['Buin', '13402', '15'],
		['Calera de Tango', '13403', '15'],
		['Paine', '13404', '15'],
		['Melipilla', '13501', '15'],
		['Alhué', '13502', '15'],
		['Curacaví', '13503', '15'],
		['María Pinto', '13504', '15'],
		['San Pedro', '13505', '15'],
		['Talagante', '13601', '15'],
		['El Monte', '13602', '15'],
		['Isla de Maipo', '13603', '15'],
		['Padre Hurtado', '13604', '15'],
		['Peñaflor', '13605', '15'],
    	);


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Loading and saving countries
        foreach ($this->initCountries as $countries) {
        	//If Doesnt Exist Create It
        	if (Country::where('country_code', $countries[0])->count() == 0) {
        		//Create a new record. 
        		$newCountry = factory(Country::class, 1)->create(
                    [
                        'country_code'    	=> $countries[0],
                        'country_name'   	=> $countries[1],
                        'country_active'	=> $countries[2]
                     ]
                );
        	}
        }

        //Loading and saving states and Cities. 
        $country_id = Country::where('country_code', 'CL')->first()->id;
        foreach ($this->initStates as $states) {
        	//If Doesnt Exist Create It
        	if (States::where('state_name', $states[0])->count() == 0) {
        		//Create a new record. 
        		$newState = factory(States::class, 1)->create(
                    [
                        'state_name'    	=> $states[0],
                        'state_number'   	=> $states[1],
                        'state_country_id'	=> $country_id,
                        'state_active'		=> $states[2],
                     ]
                );
        	}
        }

        //Loading and saving Cities. 
        foreach ($this->initCities as $cities) {
        	//Create a new record. 
    		$newCity = factory(Cities::class, 1)->create(
                [
                    'city_name'    	=> $cities[0],
                    'city_code'   	=> $cities[1],
                    'city_state_id'	=> $cities[2],
                 ]
            );
        }
    }
}

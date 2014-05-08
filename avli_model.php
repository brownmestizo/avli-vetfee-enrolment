<?php

/* AVLI Form Pseudo-model */
/* March 1, 2014 */
/* brownmestizo@gmail.com */

	class AvliForm {

		public $title = '';
		public $gender = '';
		public $vetFeeCourses = '';
		public $previousName = '';
		public $country = '';
		public $state = '';

	}

	class VetfeeEnrolment extends AvliForm {

			public function __construct() {


				$this->title = array(
	                '1' =>  'Mr',
	                '2' =>  'Mrs',
	                '3' =>  'Miss',
	                '4' =>  'Ms',
            	);

            	$this->gender = array(
            		'1' => 'Male',
            		'2' => 'Female',
            	);

				$this->vetFeeCourses = array(
					'1' => 'BSB50207 Diploma of Business',
		            '2' => 'BSB50407 Diploma of Business Administration',
		            '3' => 'BSB50613 Diploma of Human Resources Management',
		            '4' => 'BSB51107 Diploma of Management',
		            '5' => 'BSB51413 Diploma of Project Management',
		            '6' => 'BSB50207 Diploma of Business|BSB50613 Diploma of Human Resources Management',
		            '7' => 'BSB50207 Diploma of Business|BSB51107 Diploma of Management',
		            '8' => 'BSB50407 Diploma of Business Administration|BSB50207 Diploma of Business',
		            '9' => 'BSB50407 Diploma of Business Administration|BSB51107 Diploma of Management',
		            '10' => 'BSB50613 Diploma of Human Resources Management|BSB50407 Diploma of Business Administration',
		            '11' => 'BSB50613 Diploma of Human Resources Management|BSB51107 Diploma of Management',
		            '12' => 'BSB51413 Diploma of Project Management|BSB50207 Diploma of Business',
		            '13' => 'BSB51413 Diploma of Project Management|BSB50407 Diploma of Business Administration',
		            '14' => 'BSB51413 Diploma of Project Management|BSB50613 Diploma of Human Resources Management',
		            '15' => 'BSB51413 Diploma of Project Management|BSB51107 Diploma of Management',
				);

				$this->yesNo = array(
            		'1' => 'Yes',
            		'2' => 'No',					
				);
				

				$this->previousName = $this->yesNo;

				$this->state = array(
					  '8' => 'Australian Capital Territory',
		              '2' => 'New South Wales',
		              '3' => 'Northern Territory',
		              '4' => 'Queensland',
		              '5' => 'South Australia',
		              '6' => 'Tasmania',
		              '1' => 'Victoria',
		              '7' => 'Western Australia',
				);

				$this->englishAbility = array(
	                '1' =>  'Very well',
	                '2' =>  'Well',
	                '3' =>  'Not well',
	                '4' =>  'Not at all',
            	);

            	$this->aboriginalStatus = array(
            		'4' => 'No',
            		'3' => 'Yes, Aboriginal',
            		'2' => 'Yes, Torres Strait Islander',
            		'1' => 'Yes, Aboriginal and Torres Strait Islander',
            	);

            	$this->completedQualifications = array(
            		'ask_qualbachelordegreeorhigherdegree' => 'Bachelor Degree or Higher Degree',
            		'ask_qualadvanceddiplomaorassociatede' => 'Advanced Diploma or Associate Degree',
            		'ask_qualdiploma' => 'Diploma (or Associate Diploma)',
            		'ask_qualcertificateiv' => 'Certificate IV (or Advanced Certificate/Technician)',
            		'ask_qualcertificateiii' => 'Certificate III (or Trade Certificate)',
            		'ask_qualcertificateii' => 'Certificate II',
            		'ask_qualcertificatei' => 'Certificate I',
            		'ask_qualothers' => 'Certificates other than the above',
            		'ask_qualnoneoftheabove' => 'None of the above',
            	);

				$this->disabilityStatus = $this->yesNo;

            	$this->disabilityAreas = array(
            		'ask_disabilityhearingdeaf' => 'Hearing or Deaf',
            		'ask_disabilityphysical' => 'Physical',
            		'ask_disabilityintellectual' => 'Intellectual',
            		'ask_disabilitylearning' => 'Learning',
            		'ask_disabilitymentalillness' => 'Mental Illness',
            		'ask_disabilityacquiredbraininjury' => 'Acquired Brain Impairment',
            		'ask_disabilityvision' => 'Vision',
            		'ask_disabilitymedicalcondition' => 'Medical Condition',
            		'ask_disabilityother' => 'Other',
            	);     


				$this->highestCompletedSchoolLevel = array(
	                '1' =>  'Year 12 or equivalent',
	                '2' =>  'Year 11 or equivalent',
	                '3' =>  'Year 10 or equivalent',
	                '4' =>  'Year 9 or equivalent',
	                '5' =>  'Year 8 or below',
	                '6' =>  'Never attended school',
            	);     

            	$this->secondarySchool = $this->yesNo;

            	$this->employmentStatus = array(
            		'1' =>  'Full-time employee',
            		'2' =>  'Part-time employee',
            		'3' =>  'Self employed - not employing others',
            		'4' =>  'Employer',
            		'5' =>  'Employed - unpaid worker in a family business',
            		'6' =>  'Unemployed - seeking full-time work',
            		'7' =>  'Unemployed - seeking part-time work',
            		'8' =>  'Not employed - not seeking employment',
            	);


            	$this->studyReason = array(
            		'1' => 'To get a job',
            		'2' => 'To develop my existing business',
            		'3' => 'To start my own business',
            		'4' => 'To try for a different career',
            		'5' => 'To get a better job or promotion',
            		'6' => 'It was a requirement of my job',
            		'7' => 'To get into another course of study',
            		'8' => 'For personal interest or self-development',
            		'9' => 'Other reasons'
            	);


				$this->country = array(
					"12"=>"Australia",
					"1"=>"Afghanistan",
					"2"=>"Albania",
					"3"=>"Algeria",
					"4"=>"American Samoa",
					"5"=>"Andorra",
					"6"=>"Angolo",
					"7"=>"Anguilla",
					"8"=>"Antigua and Burbuda",
					"9"=>"Argentina",
					"10"=>"Armenia",
					"11"=>"Aruba",
					"13"=>"Austria",
					"14"=>"Azerbaijan",
					"15"=>"Bahamas",
					"16"=>"Bahrain",
					"17"=>"Bangladesh",
					"18"=>"Barbados",
					"19"=>"Belarus",
					"20"=>"Belgium",
					"21"=>"Belize",
					"22"=>"Benin",
					"23"=>"Bermuda",
					"24"=>"Bhutan",
					"25"=>"Bolivia",
					"26"=>"Bosnia and Herzegovina",
					"27"=>"Botswana",
					"28"=>"Brazil",
					"29"=>"British Indian Ocean Territory",
					"30"=>"British Virgin Islands",
					"31"=>"Brunei",
					"32"=>"Bulgaria",
					"33"=>"Burkina Faso",
					"34"=>"Burundi",
					"35"=>"Cambodia",
					"36"=>"Cameroon",
					"37"=>"Canada",
					"38"=>"Cape Varde Islands",
					"39"=>"Cayman Islands",
					"40"=>"Central African Republic",
					"41"=>"Chad",
					"42"=>"Chile",
					"43"=>"China",
					"44"=>"Colombia",
					"45"=>"Comoros",
					"46"=>"Congo",
					"47"=>"Cook Islands",
					"48"=>"Costa Rica",
					"49"=>"Cte d'Ivoire",
					"50"=>"Croatia",
					"51"=>"Cuba",
					"52"=>"Cyprus",
					"53"=>"Czech Republic",
					"54"=>"Democratic Republic of the Congo",
					"55"=>"Denmark",
					"56"=>"Djibouti",
					"57"=>"Dominica",
					"58"=>"Dominican Republic",
					"59"=>"East Timor",
					"60"=>"Ecuador",
					"61"=>"Egypt",
					"62"=>"El Salvador",
					"63"=>"Equatorial Guinea",
					"64"=>"Eritrea",
					"65"=>"Estonia",
					"66"=>"Ethiopia",
					"67"=>"Falkland Islands",
					"68"=>"Fiji",
					"69"=>"Finland",
					"70"=>"France",
					"71"=>"French Guiana",
					"72"=>"French Plynesia",
					"73"=>"Gabon",
					"74"=>"Gambia",
					"75"=>"Georgia",
					"76"=>"Germany",
					"77"=>"Ghana",
					"78"=>"Gibraltar",
					"79"=>"Greece",
					"80"=>"Greenland",
					"81"=>"Grenada",
					"82"=>"Guadeloupe",
					"83"=>"Guam",
					"84"=>"Guatemala",
					"85"=>"Guinea",
					"86"=>"Guinea-Bissau",
					"87"=>"Guyana",
					"88"=>"Haiti",
					"89"=>"Hinduras",
					"90"=>"Hungry",
					"91"=>"Iceland",
					"92"=>"india",
					"93"=>"Indonesia",
					"94"=>"Iran",
					"95"=>"Iraq",
					"96"=>"Ireland",
					"97"=>"Isreal",
					"98"=>"Italy",
					"99"=>"Jamaica",
					"100"=>"Japan",
					"101"=>"Jordan",
					"102"=>"Kazakhstan",
					"103"=>"Kenya",
					"104"=>"Kiribati",
					"105"=>"Korea, North",
					"106"=>"Korea, South",
					"107"=>"Kuwait",
					"108"=>"Kyrgyzstan",
					"109"=>"Laos",
					"110"=>"Latvia",
					"111"=>"Lebanon",
					"112"=>"Lesotho",
					"113"=>"Liberia",
					"114"=>"Libya",
					"115"=>"Liechtenstein",
					"116"=>"Lithuania",
					"117"=>"Luxembourg",
					"118"=>"Macedonia",
					"119"=>"Madagascar",
					"120"=>"Malawi",
					"121"=>"Malaysia",
					"122"=>"Maldives",
					"123"=>"Mali",
					"124"=>"Malta",
					"125"=>"Marshall Islands",
					"126"=>"Martinique",
					"127"=>"Mauritania",
					"128"=>"Mauritius",
					"129"=>"Mayotte",
					"130"=>"Mexico",
					"131"=>"Micronesia",
					"132"=>"Moldova",
					"133"=>"Monacco",
					"134"=>"Mongolia",
					"135"=>"Montserrat",
					"136"=>"Morocco",
					"137"=>"Mozambique",
					"138"=>"Myanmar",
					"139"=>"Namibia",
					"140"=>"Nauru",
					"141"=>"Nepal",
					"142"=>"Netherlands",
					"143"=>"Netherlands Antilles",
					"144"=>"New Caledonia",
					"145"=>"New Zealand",
					"146"=>"Nicaragua",
					"147"=>"Niger",
					"148"=>"Nigeria",
					"149"=>"Niue",
					"150"=>"Norfolk Island",
					"151"=>"Northern Mariana Islands",
					"152"=>"Norway",
					"153"=>"Oman",
					"154"=>"Pakistan",
					"155"=>"Palau",
					"156"=>"Panama",
					"157"=>"Papua New Guinea",
					"158"=>"Paraguay",
					"159"=>"Pelestinian West Bank and Gaza",
					"160"=>"Peru",
					"161"=>"Philippines",
					"162"=>"Pitcaim",
					"163"=>"Poland",
					"164"=>"Portugal",
					"165"=>"Puerto Rico",
					"166"=>"Qatar",
					"167"=>"Runion",
					"168"=>"Romania",
					"169"=>"Russia",
					"170"=>"Rwanda",
					"171"=>"Saint Helena",
					"172"=>"Saint Kitts and Nevis",
					"173"=>"Saint Lucia",
					"174"=>"Saint Pierre and Miquelon",
					"175"=>"Saint Vincent and the Grenadines",
					"176"=>"Samoa",
					"177"=>"San Marino",
					"178"=>"So Tom e Prncipe",
					"179"=>"Saudi Arabia",
					"180"=>"Senegal",
					"181"=>"Serbia and Montenegro",
					"182"=>"Seychelles",
					"183"=>"Sierra Leone",
					"184"=>"Singapore",
					"185"=>"Slovakia",
					"186"=>"Slovenia",
					"187"=>"Solomon Islands",
					"188"=>"Somalia",
					"189"=>"South Africa",
					"190"=>"Spain",
					"191"=>"Sri Lanka",
					"192"=>"Sudan",
					"193"=>"Suriname",
					"194"=>"Swaziland",
					"195"=>"Swedan",
					"196"=>"Switzerland",
					"197"=>"Syria",
					"198"=>"Taiwan",
					"199"=>"Tajikistan",
					"200"=>"Tanzania",
					"201"=>"Thailand",
					"202"=>"Togo",
					"203"=>"Tokelau",
					"204"=>"Tonga",
					"205"=>"Trinidad and Tobago",
					"206"=>"Tunisia",
					"207"=>"Turkey",
					"208"=>"Turkmenistan",
					"209"=>"Turks and Caicos Islands",
					"210"=>"Tuvalu",
					"211"=>"U.S. Virgin Islands",
					"212"=>"Uganda",
					"213"=>"Ukraine",
					"214"=>"United Arab Emirates",
					"215"=>"United Kingdom",
					"216"=>"Uruguay",
					"217"=>"USA",
					"218"=>"Uzbekistan",
					"219"=>"Vanuatu",
					"220"=>"Vatican State",
					"221"=>"Venezuela",
					"222"=>"Viet Nam",
					"223"=>"Wallis and Futuna",
					"224"=>"Yeman",
					"225"=>"Zambia",
					"226"=>"Zimbabwe"
				);


			}

	}


?>
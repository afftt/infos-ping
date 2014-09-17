<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories 		= array();  
		$of_categories['none'] 		= ' -- None -- ';  
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name; } 
	      
		  
		$g_font = array(
			"none" => "Select a font", //please, always use this key: "none"
			"Abel" => "Abel",
			"Abril Fatface" => "Abril Fatface",
			"Aclonica" => "Aclonica",
			"Acme" => "Acme",
			"Actor" => "Actor",
			"Adamina" => "Adamina",
			"Advent Pro" => "Advent Pro",
			"Aguafina Script" => "Aguafina Script",
			"Aladin" => "Aladin",
			"Aldrich" => "Aldrich",
			"Alegreya SC" => "Alegreya SC",
			"Alegreya" => "Alegreya",
			"Alex Brush" => "Alex Brush",
			"Alfa Slab One" => "Alfa Slab One",
			"Alike Angular" => "Alike Angular",
			"Alike" => "Alike",
			"Allan" => "Allan:700",
			"Allerta Stencil" => "Allerta Stencil",
			"Allerta" => "Allerta",
			"Allura" => "Allura",
			"Almendra SC" => "Almendra SC",
			"Almendra" => "Almendra",
			"Amarante" => "Amarante",
			"Amaranth" => "Amaranth",
			"Amatic SC" => "Amatic SC",
			"Amethysta" => "Amethysta",
			"Andada" => "Andada",
			"Andika" => "Andika",
			"Anonymous Pro" => "Anonymous Pro",
			"Antic Didone" => "Antic Didone",
			"Antic Slab" => "Antic Slab",
			"Antic" => "Antic",
			"Anton" => "Anton",
			"Arapey" => "Arapey",
			"Arbutus" => "Arbutus",
			"Architects Daughter" => "Architects Daughter",
			"Arimo" => "Arimo",
			"Arizonia" => "Arizonia",
			"Armata" => "Armata",
			"Artifika" => "Artifika",
			"Arvo" => "Arvo",
			"Asap" => "Asap",
			"Asset" => "Asset",
			"Astloch" => "Astloch",
			"Asul" => "Asul",
			"Atomic Age" => "Atomic Age",
			"Aubrey" => "Aubrey",
			"Audiowide" => "Audiowide",
			"Average" => "Average",
			"Averia Libre" => "Averia Libre",
			"Averia Sans Libre" => "Averia Sans Libre",
			"Averia Serif Libre" => "Averia Serif Libre",
			"Bad Script" => "Bad Script",
			"Balthazar" => "Balthazar",
			"Bangers" => "Bangers",
			"Basic" => "Basic",
			"Baumans" => "Baumans",
			"Belgrano" => "Belgrano",
			"Belleza" => "Belleza",
			"Bentham" => "Bentham",
			"Berkshire Swash" => "Berkshire Swash",
			"Bevan" => "Bevan",
			"Bigshot One" => "Bigshot One",
			"Bilbo Swash Caps" => "Bilbo Swash Caps",
			"Bitter" => "Bitter",
			"Black Ops One" => "Black Ops One",
			"Boogaloo" => "Boogaloo",
			"Bowlby One SC" => "Bowlby One SC",
			"Bowlby One" => "Bowlby One",
			"Brawler" => "Brawler",
			"Bree Serif" => "Bree Serif",
			"Bubblegum Sans" => "Bubblegum Sans",
			"Buda" => "Buda:300",
			"Buenard" => "Buenard",
			"Butterfly Kids" => "Butterfly Kids",
			"Cabin Sketch" => "Cabin Sketch",
			"Cabin" => "Cabin",
			"Caesar Dressing" => "Caesar Dressing",
			"Cagliostro" => "Cagliostro",
			"Calligraffitti" => "Calligraffitti",
			"Cambo" => "Cambo",
			"Candal" => "Candal",
			"Cantarell" => "Cantarell",
			"Cantata One" => "Cantata One",
			"Cantora One" => "Cantora One",
			"Capriola" => "Capriola",
			"Cardo" => "Cardo",
			"Carme" => "Carme",
			"Carter One" => "Carter One",
			"Caudex" => "Caudex",
			"Cedarville Cursive" => "Cedarville Cursive",
			"Ceviche One" => "Ceviche One",
			"Changa One" => "Changa One",
			"Chau Philomene One" => "Chau Philomene One",
			"Chelsea Market" => "Chelsea Market",
			"Cherry Cream Soda" => "Cherry Cream Soda",
			"Chewy" => "Chewy",
			"Chivo" => "Chivo",
			"Coda Caption:800" => "Coda Caption:800",
			"Coda" => "Coda",
			"Comfortaa" => "Comfortaa",
			"Coming Soon" => "Coming Soon",
			"Concert One" => "Concert One",
			"Condiment" => "Condiment",
			"Contrail One" => "Contrail One",
			"Convergence" => "Convergence",
			"Cookie" => "Cookie",
			"Copse" => "Copse",
			"Corben" => "Corben",
			"Courgette" => "Courgette",
			"Coustard" => "Coustard",
			"Covered By Your Grace" => "Covered By Your Grace",
			"Crafty Girls" => "Crafty Girls",
			"Creepster" => "Creepster",
			"Crete Round" => "Crete Round",
			"Crimson Text" => "Crimson Text",
			"Crushed" => "Crushed",
			"Cuprum" => "Cuprum",
			"Cutive" => "Cutive",
			"Damion" => "Damion",
			"Dancing Script" => "Dancing Script",
			"Dawning of a New Day" => "Dawning of a New Day",
			"Days One" => "Days One",
			"Delius Swash Caps" => "Delius Swash Caps",
			"Delius Unicase" => "Delius Unicase",
			"Delius" => "Delius",
			"Della Respira" => "Della Respira",
			"Devonshire" => "Devonshire",
			"Didact Gothic" => "Didact Gothic",
			"Diplomata" => "Diplomata",
			"Doppio One" => "Doppio One",
			"Dosis" => "Dosis",
			"Droid Sans Mono" => "Droid Sans Mono",
			"Droid Sans" => "Droid Sans",
			"Droid Serif" => "Droid Serif",
			"Duru Sans" => "Duru Sans",
			"Dynalight" => "Dynalight",
			"EB Garamond" => "EB Garamond",
			"Eater" => "Eater",
			"Economica" => "Economica",
			"Electrolize" => "Electrolize",
			"Emblema One" => "Emblema One",
			"Emilys Candy" => "Emilys Candy",
			"Engagement" => "Engagement",
			"Enriqueta" => "Enriqueta",
			"Esteban" => "Esteban",
			"Euphoria Script" => "Euphoria Script",
			"Ewert" => "Ewert",
			"Exo" => "Exo",
			"Expletus Sans" => "Expletus Sans",
			"Fanwood Text" => "Fanwood Text",
			"Fascinate" => "Fascinate",
			"Federant" => "Federant",
			"Federo" => "Federo",
			"Felipa" => "Felipa",
			"Fjord One" => "Fjord One",
			"Flamenco" => "Flamenco",
			"Flavors" => "Flavors",
			"Fondamento" => "Fondamento",
			"Fontdiner Swanky" => "Fontdiner Swanky",
			"Forum" => "Forum",
			"Francois One" => "Francois One",
			"Fredericka the Great" => "Fredericka the Great",
			"Fredoka One" => "Fredoka One",
			"Fresca" => "Fresca",
			"Fugaz One" => "Fugaz One",
			"Galdeano" => "Galdeano",
			"Gentium Basic" => "Gentium Basic",
			"Gentium Book Basic" => "Gentium Book Basic",
			"Geo" => "Geo",
			"Geostar Fill" => "Geostar Fill",
			"Germania One" => "Germania One",
			"Give You Glory" => "Give You Glory",
			"Glass Antiqua" => "Glass Antiqua",
			"Glegoo" => "Glegoo",
			"Gloria Hallelujah" => "Gloria Hallelujah",
			"Goblin One" => "Goblin One",
			"Gochi Hand" => "Gochi Hand",
			"Gorditas" => "Gorditas",
			"Goudy Bookletter 1911" => "Goudy Bookletter 1911",
			"Graduate" => "Graduate",
			"Gravitas One" => "Gravitas One",
			"Great Vibes" => "Great Vibes",
			"Gruppo" => "Gruppo",
			"Gudea" => "Gudea",
			"Habibi" => "Habibi",
			"Hammersmith One" => "Hammersmith One",
			"Handlee" => "Handlee",
			"Happy Monkey" => "Happy Monkey",
			"Herr Von Muellerhoff" => "Herr Von Muellerhoff",
			"Holtwood One SC" => "Holtwood One SC",
			"Homemade Apple" => "Homemade Apple",
			"Homenaje" => "Homenaje",
			"IM Fell DW Pica SC" => "IM Fell DW Pica SC",
			"IM Fell DW Pica" => "IM Fell DW Pica",
			"IM Fell Double Pica SC" => "IM Fell Double Pica SC",
			"IM Fell Double Pica" => "IM Fell Double Pica",
			"IM Fell English SC" => "IM Fell English SC",
			"IM Fell English" => "IM Fell English",
			"IM Fell French Canon SC" => "IM Fell French Canon SC",
			"IM Fell French Canon" => "IM Fell French Canon",
			"IM Fell Great Primer SC" => "IM Fell Great Primer SC",
			"IM Fell Great Primer" => "IM Fell Great Primer",
			"Iceberg" => "Iceberg",
			"Iceland" => "Iceland",
			"Imprima" => "Imprima",
			"Inder" => "Inder",
			"Indie Flower" => "Indie Flower",
			"Inika" => "Inika",
			"Irish Grover" => "Irish Grover",
			"Istok Web" => "Istok Web",
			"Italiana" => "Italiana",
			"Jim Nightshade" => "Jim Nightshade",
			"Jockey One" => "Jockey One",
			"Jolly Lodger" => "Jolly Lodger",
			"Josefin Sans" => "Josefin Sans",
			"Josefin Slab" => "Josefin Slab",
			"Judson" => "Judson",
			"Julee" => "Julee",
			"Junge" => "Junge",
			"Jura" => "Jura",
			"Just Another Hand" => "Just Another Hand",
			"Just Me Again Down Here" => "Just Me Again Down Here",
			"Kameron" => "Kameron",
			"Karla" => "Karla",
			"Kaushan Script" => "Kaushan Script",
			"Kelly Slab" => "Kelly Slab",
			"Kenia" => "Kenia",
			"Kotta One" => "Kotta One",
			"Kranky" => "Kranky",
			"Kreon" => "Kreon",
			"Kristi" => "Kristi",
			"Krona One" => "Krona One",
			"La Belle Aurore" => "La Belle Aurore",
			"Lancelot" => "Lancelot",
			"Lato" => "Lato",
			"Lato" => "Lato",
			"League Script" => "League Script",
			"Leckerli One" => "Leckerli One",
			"Ledger" => "Ledger",
			"Lekton" => "Lekton",
			"Lemon" => "Lemon",
			"Lilita One" => "Lilita One",
			"Linden Hill" => "Linden Hill",
			"Lobster Two" => "Lobster Two",
			"Lobster" => "Lobster",
			"Londrina Outline" => "Londrina Outline",
			"Londrina Sketch" => "Londrina Sketch",
			"Londrina Solid" => "Londrina Solid",
			"Lora" => "Lora",
			"Love Ya Like A Sister" => "Love Ya Like A Sister",
			"Loved by the King" => "Loved By the King",
			"Luckiest Guy" => "Luckiest Guy",
			"Lusitana" => "Lusitana",
			"Lustria" => "Lustria",
			"Macondo Swash Caps" => "Macondo Swash Caps",
			"Magra" => "Magra",
			"Maiden Orange" => "Maiden Orange",
			"Mako" => "Mako",
			"Marck Script" => "Marck Script",
			"Marko One" => "Marko One",
			"Marmelad" => "Marmelad",
			"Marvel" => "Marvel",
			"Mate SC" => "Mate SC",
			"Mate" => "Mate",
			"Maven Pro" => "Maven Pro",
			"Meddon" => "Meddon",
			"MedievalSharp" => "MedievalSharp",
			"Medula One" => "Medula One",
			"Merienda One" => "Merienda One",
			"Merriweather" => "Merriweather",
			"Metamorphous" => "Metamorphous",
			"Metrophobic" => "Metrophobic",
			"Metrophobic" => "Metrophobic",
			"Michroma" => "Michroma",
			"Miltonian" => "Miltonian",
			"Miss Fajardose" => "Miss Fajardose",
			"Modern Antiqua" => "Modern Antiqua",
			"Molengo" => "Molengo",
			"Monoton" => "Monoton",
			"Monsieur La Doulaise" => "Monsieur La Doulaise",
			"Montaga" => "Montaga",
			"Montez" => "Montez",
			"Montserrat" => "Montserrat",
			"Mountains of Christmas" => "Mountains of Christmas",
			"Mr Dafoe" => "Mr Dafoe",
			"Mr De Haviland" => "Mr De Haviland",
			"Mrs Saint Delafield" => "Mrs Saint Delafield",
			"Mrs Sheppards" => "Mrs Sheppards",
			"Muli" => "Muli",
			"Mystery Quest" => "Mystery Quest",
			"Neucha" => "Neucha",
			"Neuton" => "Neuton",
			"News Cycle" => "News Cycle",
			"Niconne" => "Niconne",
			"Nixie One" => "Nixie One",
			"Nobile" => "Nobile",
			"Norican" => "Norican",
			"Nosifer" => "Nosifer",
			"Nothing You Could Do" => "Nothing You Could Do",
			"Noticia Text" => "Noticia Text",
			"Nova Cut" => "Nova Cut",
			"Nova Flat" => "Nova Flat",
			"Nova Mono" => "Nova Mono",
			"Nova Oval" => "Nova Oval",
			"Nova Round" => "Nova Round",
			"Nova Script" => "Nova Script",
			"Nova Slim" => "Nova Slim",
			"Nova Square" => "Nova Square",
			"Numans" => "Numans",
			"Nunito" => "Nunito",
			"Old Standard TT" => "Old Standard TT",
			"Oldenburg" => "Oldenburg",
			"Oleo Script" => "Oleo Script",
			"Open Sans Condensed:300" => "Open Sans Condensed:300",
			"Open Sans" => "Open Sans",
			"Orbitron" => "Orbitron",
			"Original Surfer" => "Original Surfer",
			"Oswald" => "Oswald",
			"Over the Rainbow" => "Over the Rainbow",
			"Overlock SC" => "Overlock SC",
			"Overlock" => "Overlock",
			"Ovo" => "Ovo",
			"Oxygen" => "Oxygen",
			"PT Mono" => "PT Mono",
			"PT Sans Caption" => "PT Sans Caption",
			"PT Sans Narrow" => "PT Sans Narrow",
			"PT Sans" => "PT Sans",
			"PT Serif Caption" => "PT Serif Caption",
			"PT Serif" => "PT Serif",
			"Pacifico" => "Pacifico",
			"Passero One" => "Passero One",
			"Passion One" => "Passion One",
			"Patrick Hand" => "Patrick Hand",
			"Patua One" => "Patua One",
			"Paytone One" => "Paytone One",
			"Peralta" => "Peralta",
			"Permanent Marker" => "Permanent Marker",
			"Philosopher" => "Philosopher",
			"Piedra" => "Piedra",
			"Pinyon Script" => "Pinyon Script",
			"Plaster" => "Plaster",
			"Play" => "Play",
			"Playball" => "Playball",
			"Playfair Display" => "Playfair Display",
			"Podkova" => "Podkova",
			"Poiret One" => "Poiret One",
			"Poller One" => "Poller One",
			"Poly" => "Poly",
			"Pompiere" => "Pompiere",
			"Pontano Sans" => "Pontano Sans",
			"Port Lligat Sans" => "Port Lligat Sans",
			"Port Lligat Slab" => "Port Lligat Slab",
			"Prata" => "Prata",
			"Press Start 2P" => "Press Start 2P",
			"Princess Sofia" => "Princess Sofia",
			"Prociono" => "Prociono",
			"Prosto One" => "Prosto One",
			"Puritan" => "Puritan",
			"Quantico" => "Quantico",
			"Quattrocento Sans" => "Quattrocento Sans",
			"Quattrocento" => "Quattrocento",
			"Questrial" => "Questrial",
			"Quicksand" => "Quicksand",
			"Qwigley" => "Qwigley",
			"Radley" => "Radley",
			"Raleway" => "Raleway:100",
			"Rationale" => "Rationale",
			"Redressed" => "Redressed",
			"Reenie Beanie" => "Reenie Beanie",
			"Revalia" => "Revalia",
			"Ribeye Marrow" => "Ribeye Marrow",
			"Righteous" => "Righteous",
			"Rochester" => "Rochester",
			"Rokkitt" => "Rokkitt",
			"Ropa Sans" => "Ropa Sans",
			"Rosario" => "Rosario",
			"Rosarivo" => "Rosarivo",
			"Rouge Script" => "Rouge Script",
			"Ruda" => "Ruda",
			"Ruluko" => "Ruluko",
			"Russo One" => "Russo One",
			"Ruthie" => "Ruthie",
			"Salsa" => "Salsa",
			"Sancreek" => "Sancreek",
			"Sansita One" => "Sansita One",
			"Schoolbell" => "Schoolbell",
			"Seaweed Script" => "Seaweed Script",
			"Sevillana" => "Sevillana",
			"Shadows Into Light Two" => "Shadows Into Light Two",
			"Shadows Into Light" => "Shadows Into Light",
			"Shanti" => "Shanti",
			"Short Stack" => "Short Stack",
			"Sigmar One" => "Sigmar One",
			"Signika Negative" => "Signika Negative",
			"Signika" => "Signika",
			"Simonetta" => "Simonetta",
			"Sirin Stencil" => "Sirin Stencil",
			"Six Caps" => "Six Caps",
			"Slackey" => "Slackey",
			"Smokum" => "Smokum",
			"Smythe" => "Smythe",
			"Sniglet" => "Sniglet:800",
			"Snippet" => "Snippet",
			"Sonsie One" => "Sonsie One",
			"Sorts Mill Goudy" => "Sorts Mill Goudy",
			"Source Sans Pro" => "Source Sans Pro",
			"Special Elite" => "Special Elite",
			"Spicy Rice" => "Spicy Rice",
			"Spinnaker" => "Spinnaker",
			"Spirax" => "Spirax",
			"Squada One" => "Squada One",
			"Stardos Stencil" => "Stardos Stencil",
			"Stint Ultra Condensed" => "Stint Ultra Condensed",
			"Stint Ultra Expanded" => "Stint Ultra Expanded",
			"Stoke" => "Stoke",
			"Sue Ellen Francisco" => "Sue Ellen Francisco",
			"Sunshiney" => "Sunshiney",
			"Supermercado One" => "Supermercado One",
			"Swanky and Moo Moo" => "Swanky and Moo Moo",
			"Syncopate" => "Syncopate",
			"Tangerine" => "Tangerine",
			"Tangerine" => "Tangerine",
			"Telex" => "Telex",
			"Tenor Sans" => "Tenor Sans",
			"Terminal Dosis" => "Terminal Dosis",
			"Tienne" => "Tienne",
			"Tinos" => "Tinos",
			"Trade Winds" => "Trade Winds",
			"Trocchi" => "Trocchi",
			"Trochut" => "Trochut",
			"Trykker" => "Trykker",
			"Tulpen One" => "Tulpen One",
			"Ubuntu Condensed" => "Ubuntu Condensed",
			"Ubuntu Mono" => "Ubuntu Mono",
			"Ubuntu" => "Ubuntu",
			"Uncial Antiqua" => "Uncial Antiqua",
			"UnifrakturCook:700" => "UnifrakturCook:700",
			"UnifrakturMaguntia" => "UnifrakturMaguntia",
			"Unkempt" => "Unkempt",
			"Unlock" => "Unlock",
			"Unna" => "Unna",
			"VT323" => "VT323",
			"Varela Round" => "Varela Round",
			"Varela" => "Varela",
			"Vast Shadow" => "Vast Shadow",
			"Vibur" => "Vibur",
			"Vidaloka" => "Vidaloka",
			"Viga" => "Viga",
			"Voces" => "Voces",
			"Volkhov" => "Volkhov",
			"Vollkorn" => "Vollkorn",
			"Voltaire" => "Voltaire",
			"Wallpoet" => "Wallpoet",
			"Walter Turncoat" => "Walter Turncoat",
			"Wellfleet" => "Wellfleet",
			"Wire One" => "Wire One",
			"Yanone Kaffeesatz" => "Yanone Kaffeesatz",
			"Yellowtail" => "Yellowtail",
			"Yeseva One" => "Yeseva One",
			"Zeyada" => "Zeyada",
		);
			

		


		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/admin/assets/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/admin/assets/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 

		

		
/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();


/* = Home Settings
**************************************************************************************/
$of_options[] = array( 	"name" 		=> __("Home Settings",'mtcframework'),
						"type" 		=> "heading"
				);
				
/* Slider */
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "",
						"id" 		=> "header_slider",
						"std" 		=> "<h3>Slider Options</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);			
$of_options[] = array( 	"name" 		=> __("Enable Slider ?",'mtcframework'),
						"desc" 		=> __("Select this if you wish to enable slider home",'mtcframework'),
						"id" 		=> "switch_slider",
						"std" 		=> 0,
						"folds"		=> 1,
						"type" 		=> "switch"
				); 
$of_options[] = array( 	"name" 		=> __("The Content",'mtcframework'),
						"desc" 		=> "",
						"id" 		=> "slider_content",
						"fold"		=> "switch_slider",
						"std" 		=> "",
						"cate" 	=> $of_categories,
						"type" 		=> "content"
				);
$of_options[] = array( 	"name" 		=> __("Number Of Posts",'mtcframework'),
						"desc" 		=> " ",
						"id" 		=> "slider_count",
						"fold"		=> "switch_slider",
						"std" 		=> "5",
						"min" 		=> "3",
						"step"		=> "1",
						"max" 		=> "12",
						"type" 		=> "sliderui" 
				);				
$of_options[] = array( 	"name" 		=> __("Effect",'mtcframework'),
						"desc" 		=> __("Select the effect of the your slider",'mtcframework'),
						"id" 		=> "slider_effect",
						"fold"		=> "switch_slider",
						"std" 		=> "directscroll",
						"type" 		=> "select",
						"options" 	=> array("directscroll","crossfade","cover-fade")
				);	
 $of_options[] = array( "name" 		=> __("Timeout Duration",'mtcframework'),
						"desc" 		=> __("Select the effect of the your slider",'mtcframework'),
						"id" 		=> "slider_timeoutDuration",
						"fold"		=> "switch_slider",
						"std" 		=> "3000",
						"min" 		=> "1000",
						"step"		=> "500",
						"max" 		=> "10000",
						"type" 		=> "sliderui" 
				);	



/* Video Box*/				
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "",
						"id" 		=> "header_scrolling_box",
						"std" 		=> "<h3>Video Box</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);	
$of_options[] = array( 	"name" 		=> __("Enable Video Box ?",'mtcframework'),
						"desc" 		=> "",
						"id" 		=> "switch_scrolling_box",
						"std" 		=> 0,
						"folds"		=> 1,
						"type" 		=> "switch"
				);	
$of_options[] = array( 	"name" 		=> __("The Title",'mtcframework'),
						"desc" 		=> "",
						"id" 		=> "scrolling_box_title",
						"fold"		=> "switch_scrolling_box",
						"std" 		=> "Latest Video",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> __("Style Content",'mtcframework'),
						"desc" 		=> " ",
						"id" 		=> "scrolling_box_style",
						"fold"		=> "switch_scrolling_box",
						"std" 		=> "small",
						"type" 		=> "select2",
						"options" 	=> array(
									'small' => 'Small',
									'large' => 'Large',
									'grid' 	=> 'Grid',
								)
				);					
$of_options[] = array( 	"name" 		=> __("Scroll Post Count",'mtcframework'),
						"desc" 		=> " ",
						"id" 		=> "scrolling_box_count",
						"fold"		=> "switch_scrolling_box",
						"std" 		=> "10",
						"min" 		=> "2",
						"step"		=> "2",
						"max" 		=> "20",
						"type" 		=> "sliderui" 
				);	
				
				
				
				
				
				
				
				
/* NEWS BOX */
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "",
						"id" 		=> "header_news_box",
						"std" 		=> "<h3>News Box  Options</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);				
$url_news_style =  ADMIN_DIR . 'assets/images/news_box/';	

/* News Box 1 */
$of_options[] = array( 	"name" 		=> __("Enable News Box 1",'mtcframework'),
						"desc" 		=> "",
						"id" 		=> "switch_news_box1",
						"std" 		=> 0,
						"folds"		=> 1,
						"type" 		=> "switch"
				);			
$of_options[] = array( 	"name" 		=> __("News Box 1 Options",'mtcframework'),
						"desc" 		=> " ",
						"id" 		=> "news_box_1",
						"std" 		=> "none",
						"type" 		=> "select_news_box",
						"fold"		=> "switch_news_box1",
						"cate" 		=> $of_categories,
						"options" 	=> array(
							'list' 		=> $url_news_style . 'list.png',
							'block' 	=> $url_news_style . 'block.png',
							'feed' 		=> $url_news_style . 'feed.png',
							'shortcode'=> $url_news_style . 'shortcode.png')
				);
/* News Box 2 */
$of_options[] = array( 	"name" 		=> __("Enable News Box 2",'mtcframework'),
						"desc" 		=> "",
						"id" 		=> "switch_news_box2",
						"std" 		=> 0,
						"folds"		=> 1,
						"type" 		=> "switch"
				);			
$of_options[] = array( 	"name" 		=> __("News Box 2 Options",'mtcframework'),
						"desc" 		=> " ",
						"id" 		=> "news_box_2",
						"std" 		=> "none",
						"type" 		=> "select_news_box",
						"fold"		=> "switch_news_box2",
						"cate" 		=> $of_categories,
						"options" 	=> array(
							'list' 		=> $url_news_style . 'list.png',
							'block' 	=> $url_news_style . 'block.png',
							'feed' 		=> $url_news_style . 'feed.png',
							'shortcode'=> $url_news_style . 'shortcode.png')
				);
/* News Box 3 */
$of_options[] = array( 	"name" 		=> __("Enable News Box 3",'mtcframework'),
						"desc" 		=> "",
						"id" 		=> "switch_news_box3",
						"std" 		=> 0,
						"folds"		=> 1,
						"type" 		=> "switch"
				);			
$of_options[] = array( 	"name" 		=> __("News Box 3 Options",'mtcframework'),
						"desc" 		=> " ",
						"id" 		=> "news_box_3",
						"std" 		=> "none",
						"type" 		=> "select_news_box",
						"fold"		=> "switch_news_box3",
						"cate" 		=> $of_categories,
						"options" 	=> array(
							'list' 		=> $url_news_style . 'list.png',
							'block' 	=> $url_news_style . 'block.png',
							'feed' 		=> $url_news_style . 'feed.png',
							'shortcode'=> $url_news_style . 'shortcode.png')
				);
/* News Box 4 */
$of_options[] = array( 	"name" 		=> __("Enable News Box 4",'mtcframework'),
						"desc" 		=> "",
						"id" 		=> "switch_news_box4",
						"std" 		=> 0,
						"folds"		=> 1,
						"type" 		=> "switch"
				);			
$of_options[] = array( 	"name" 		=> __("News Box 4 Options",'mtcframework'),
						"desc" 		=> " ",
						"id" 		=> "news_box_4",
						"std" 		=> "none",
						"type" 		=> "select_news_box",
						"fold"		=> "switch_news_box4",
						"cate" 		=> $of_categories,
						"options" 	=> array(
							'list' 		=> $url_news_style . 'list.png',
							'block' 	=> $url_news_style . 'block.png',
							'feed' 		=> $url_news_style . 'feed.png',
							'shortcode'=> $url_news_style . 'shortcode.png')
				);
/* News Box 5 */
$of_options[] = array( 	"name" 		=> __("Enable News Box 5",'mtcframework'),
						"desc" 		=> "",
						"id" 		=> "switch_news_box5",
						"std" 		=> 0,
						"folds"		=> 1,
						"type" 		=> "switch"
				);			
$of_options[] = array( 	"name" 		=> __("News Box 5 Options",'mtcframework'),
						"desc" 		=> " ",
						"id" 		=> "news_box_5",
						"std" 		=> "none",
						"type" 		=> "select_news_box",
						"fold"		=> "switch_news_box5",
						"cate" 		=> $of_categories,
						"options" 	=> array(
							'list' 		=> $url_news_style . 'list.png',
							'block' 	=> $url_news_style . 'block.png',
							'feed' 		=> $url_news_style . 'feed.png',
							'shortcode'=> $url_news_style . 'shortcode.png')
				);
/* News Box 6 */
$of_options[] = array( 	"name" 		=> __("Enable News Box 6",'mtcframework'),
						"desc" 		=> "",
						"id" 		=> "switch_news_box6",
						"std" 		=> 0,
						"folds"		=> 1,
						"type" 		=> "switch"
				);			
$of_options[] = array( 	"name" 		=> __("News Box 6 Options",'mtcframework'),
						"desc" 		=> " ",
						"id" 		=> "news_box_6",
						"std" 		=> "none",
						"type" 		=> "select_news_box",
						"fold"		=> "switch_news_box6",
						"cate" 		=> $of_categories,
						"options" 	=> array(
							'list' 		=> $url_news_style . 'list.png',
							'block' 	=> $url_news_style . 'block.png',
							'feed' 		=> $url_news_style . 'feed.png',
							'shortcode'=> $url_news_style . 'shortcode.png')
				);
/* News Box 7 */
$of_options[] = array( 	"name" 		=> __("Enable News Box 7",'mtcframework'),
						"desc" 		=> "",
						"id" 		=> "switch_news_box7",
						"std" 		=> 0,
						"folds"		=> 1,
						"type" 		=> "switch"
				);			
$of_options[] = array( 	"name" 		=> __("News Box 7 Options",'mtcframework'),
						"desc" 		=> " ",
						"id" 		=> "news_box_7",
						"std" 		=> "none",
						"type" 		=> "select_news_box",
						"fold"		=> "switch_news_box7",
						"cate" 		=> $of_categories,
						"options" 	=> array(
							'list' 		=> $url_news_style . 'list.png',
							'block' 	=> $url_news_style . 'block.png',
							'feed' 		=> $url_news_style . 'feed.png',
							'shortcode'=> $url_news_style . 'shortcode.png')
				);
				
/* News Box 8 */
$of_options[] = array( 	"name" 		=> __("Enable News Box 8",'mtcframework'),
						"desc" 		=> "",
						"id" 		=> "switch_news_box8",
						"std" 		=> 0,
						"folds"		=> 1,
						"type" 		=> "switch"
				);			
$of_options[] = array( 	"name" 		=> __("News Box 8 Options",'mtcframework'),
						"desc" 		=> " ",
						"id" 		=> "news_box_8",
						"std" 		=> "list",
						"type" 		=> "select_news_box",
						"fold"		=> "switch_news_box8",
						"cate" 		=> $of_categories,
						"options" 	=> array(
							'list' 		=> $url_news_style . 'list.png',
							'block' 	=> $url_news_style . 'block.png',
							'feed' 		=> $url_news_style . 'feed.png',
							'shortcode'=> $url_news_style . 'shortcode.png')
				);
				

				
				
/* News Tabs */
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "",
						"id" 		=> "header_news_tab",
						"std" 		=> "<h3>News Tab Options</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);
$of_options[] = array( 	"name" 		=> __("Enable News Tab",'mtcframework'),
						"desc" 		=> "",
						"id" 		=> "switch_news_tab",
						"std" 		=> 0,
						"folds"		=> 1,
						"type" 		=> "switch"
				);	

$of_options[] = array( 	"name" 		=> __("Tab 1",'mtcframework'),
						"desc" 		=> " ",
						"id" 		=> "news_tab_cat1",
						"fold"		=> "switch_news_tab",
						"std" 		=> "none",
						"type" 		=> "select2",
						"options" 	=> $of_categories
				);
$of_options[] = array( 	"name" 		=> __("Tab 2",'mtcframework'),
						"desc" 		=> " ",
						"id" 		=> "news_tab_cat2",
						"fold"		=> "switch_news_tab",
						"std" 		=> "none",
						"type" 		=> "select2",
						"options" 	=> $of_categories
				);
$of_options[] = array( 	"name" 		=> __("Tab 3",'mtcframework'),
						"desc" 		=> " ",
						"id" 		=> "news_tab_cat3",
						"fold"		=> "switch_news_tab",
						"std" 		=> "none",
						"type" 		=> "select2",
						"options" 	=> $of_categories
				);
$of_options[] = array( 	"name" 		=> __("Tab 4",'mtcframework'),
						"desc" 		=> " ",
						"id" 		=> "news_tab_cat4",
						"fold"		=> "switch_news_tab",
						"std" 		=> "none",
						"type" 		=> "select2",
						"options" 	=> $of_categories
				);
$of_options[] = array( 	"name" 		=> __("Tab 5",'mtcframework'),
						"desc" 		=> " ",
						"id" 		=> "news_tab_cat5",
						"fold"		=> "switch_news_tab",
						"std" 		=> "none",
						"type" 		=> "select2",
						"options" 	=> $of_categories
				);
$of_options[] = array( 	"name" 		=> __("Tab 6",'mtcframework'),
						"desc" 		=> " ",
						"id" 		=> "news_tab_cat6",
						"fold"		=> "switch_news_tab",
						"std" 		=> "none",
						"type" 		=> "select2",
						"options" 	=> $of_categories
				);
$of_options[] = array( 	"name" 		=> __("Tab 7",'mtcframework'),
						"desc" 		=> " ",
						"id" 		=> "news_tab_cat7",
						"fold"		=> "switch_news_tab",
						"std" 		=> "none",
						"type" 		=> "select2",
						"options" 	=> $of_categories
				);
$of_options[] = array( 	"name" 		=> __("Tab 8",'mtcframework'),
						"desc" 		=> " ",
						"id" 		=> "news_tab_cat8",
						"fold"		=> "switch_news_tab",
						"std" 		=> "none",
						"type" 		=> "select2",
						"options" 	=> $of_categories
				);		

				
				
				
				
/* News in Pictures */
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "",
						"id" 		=> "header_news_in_picture",
						"std" 		=> "<h3>News in Pictures</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);
$of_options[] = array( 	"name" 		=> __("Enable News in Pictures",'mtcframework'),
						"desc" 		=> "",
						"id" 		=> "switch_news_in_picture",
						"std" 		=> 0,
						"folds"		=> 1,
						"type" 		=> "switch"
				);	
$of_options[] = array( 	"name" 		=> __("The Title",'mtcframework'),
						"desc" 		=> __("Title of News in picture",'mtcframework'),
						"id" 		=> "news_in_picture_title",
						"fold"		=> "switch_news_in_picture",
						"std" 		=> "5",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> __("The Content",'mtcframework'),
						"desc" 		=> "",
						"id" 		=> "news_in_picture_content",
						"fold"		=> "switch_news_in_picture",
						"std" 		=> "",
						"cate" 	=> $of_categories,
						"type" 		=> "content"
				);				
$of_options[] = array( 	"name" 		=> __("Number Of Posts",'mtcframework'),
						"desc" 		=> " ",
						"id" 		=> "news_in_picture_count",
						"fold"		=> "switch_news_in_picture",
						"std" 		=> "7",
						"min" 		=> "7",
						"step"		=> "7",
						"max" 		=> "49",
						"type" 		=> "sliderui" 
				);	

				
					
/* = Banners Setting
======================================================*/					
$of_options[] = array( 	"name" 		=> __("Banners Setting",'mtcframework'),
						"type" 		=> "heading"
				);
/* Header Ads */
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "",
						"id" 		=> "header_ad_header",
						"std" 		=> "<h3>Banner Header Setting</h3>
										Enable and Configure a banner in header, select a static image with URL or use adsenes code
										",
						"icon" 		=> true,
						"type" 		=> "info"
				);
$of_options[] = array( 	"name" 		=> __("Enable Banner Header",'mtcframework'),
						"desc" 		=> "",
						"id" 		=> "switch_ad_header",
						"std" 		=> 0,
						"folds"		=> 1,
						"type" 		=> "switch"
				);
$url_layout_style =  ADMIN_DIR . 'assets/images/';
$of_options[] = array( 	"name" 		=> __("Banner Size",'mtcframework'),
						"desc" 		=> __("Choose your banner size",'mtcframework'),
						"id" 		=> "ad_header_size",
						"fold"		=> "switch_ad_header",
						"std" 		=> "728",
						"type" 		=> "images",
						"options" 	=> array(
							'468' 	=> $url_layout_style . 'banner_size_468.png',
							'728' 	=> $url_layout_style . 'banner_size_728.png'
				)
			);
$of_options[] = array( 	"name" 		=> __("Banner Image",'mtcframework'),
						"desc" 		=> __("Upload your baner. Or paste the image link.",'mtcframework'),
						"id" 		=> "ad_header_img",
						"fold"		=> "switch_ad_header",
						"std" 		=> "",
						"type" 		=> "media"
				);
$of_options[] = array( 	"name" 		=> __("Banner Image URL",'mtcframework'),
						"desc" 		=> __("Place url of your banner image",'mtcframework'),
						"id" 		=> "ad_header_url",
						"fold"		=> "switch_ad_header",
						"std" 		=> "#",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> __("Adsense Code",'mtcframework'),
						"desc" 		=> __("Place url of your adsense code",'mtcframework'),
						"id" 		=> "ad_header_code",
						"fold"		=> "switch_ad_header",
						"std" 		=> "",
						"type" 		=> "textarea"
				);
/* Header Single Post */
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "",
						"id" 		=> "post_ad_header",
						"std" 		=> "<h3>Banner Single Post Setting</h3>
										Enable and Configure a banner in single post, select a static image with URL or use adsenes code
										",
						"icon" 		=> true,
						"type" 		=> "info"
				);
$of_options[] = array( 	"name" 		=> __("Enable Banner Single Post",'mtcframework'),
						"desc" 		=> "",
						"id" 		=> "switch_ad_post",
						"std" 		=> 0,
						"folds"		=> 1,
						"type" 		=> "switch"
				);
$url_layout_style =  ADMIN_DIR . 'assets/images/';
$of_options[] = array( 	"name" 		=> __("Banner Size",'mtcframework'),
						"desc" 		=> __("Choose your banner size",'mtcframework'),
						"id" 		=> "ad_post_size",
						"fold"		=> "switch_ad_post",
						"std" 		=> "600",
						"type" 		=> "images",
						"options" 	=> array(
							'600' 	=> $url_layout_style . 'banner_size_120x600.png',
							'240' 	=> $url_layout_style . 'banner_size_120x240.png'
				)
			);
$of_options[] = array( 	"name" 		=> __("Banner Image",'mtcframework'),
						"desc" 		=> __("Upload your baner. Or paste the image link.",'mtcframework'),
						"id" 		=> "ad_post_img",
						"fold"		=> "switch_ad_post",
						"std" 		=> "",
						"type" 		=> "media"
				);
$of_options[] = array( 	"name" 		=> __("Banner Image URL",'mtcframework'),
						"desc" 		=> __("Place url of your banner image",'mtcframework'),
						"id" 		=> "ad_post_url",
						"fold"		=> "switch_ad_post",
						"std" 		=> "#",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> __("Adsense Code",'mtcframework'),
						"desc" 		=> __("Place url of your adsense code",'mtcframework'),
						"id" 		=> "ad_post_code",
						"fold"		=> "switch_ad_post",
						"std" 		=> "",
						"type" 		=> "textarea"
				);





				
/* = General Settings
======================================================*/					
$of_options[] = array( 	"name" 		=> __("General Settings",'mtcframework'),
						"type" 		=> "heading"
				);
$url_layout_style =  ADMIN_DIR . 'assets/images/';
$of_options[] = array( 	"name" 		=> __("Layout Style",'mtcframework'),
						"desc" 		=> __("Choose your layout style",'mtcframework'),
						"id" 		=> "layout_style",
						"std" 		=> "boxed",
						"type" 		=> "images",
						"options" 	=> array(
							'wide' 	=> $url_layout_style . 'wide.png',
							'boxed' 	=> $url_layout_style . 'boxed.png'
				)
			);
$of_options[] = array( 	"name" 		=> __("Footer Layout",'mtcframework'),
						"desc" 		=> __("Select your themes alternative footer layout.",'mtcframework'),
						"id" 		=> "layout_footer",
						"std" 		=> "default",
						"type" 		=> "select2",
						"options" 	=> array(
								'default'=> 'Default',
								'two'	=> '2 Column',
								'three'	=> '3 Column',
								'four'	=> '4 Column'
								)
				);
				
$of_options[] = array( 	"name" 		=> __("Logo",'mtcframework'),
						"desc" 		=> __("Upload your Logo. Or paste the image link.",'mtcframework'),
						"id" 		=> "logo",
						"std" 		=> get_template_directory_uri()."/img/logo.png",
						"type" 		=> "media"
				);

$of_options[] = array( 	"name" 		=> __("Custom Favicon",'mtcframework'),
						"desc" 		=> __("Upload a 16px x 16px Png/Gif image that will represent your website's favicon.",'mtcframework'),
						"id" 		=> "custom_favicon",
						"std" 		=> get_template_directory_uri()."/img/favicon.png",
						"type" 		=> "media"
				);
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "",
						"id" 		=> "appletouchicon_info",
						"std" 		=> "<strong>Apple Touch <Icon></Icon></strong>",
						"icon" 		=> true,
						"type" 		=> "info"
				);
$of_options[] = array( 	"name" 		=> __("Apple Touch Icon 57x57",'mtcframework'),
						"desc" 		=> __("",'mtcframework'),
						"id" 		=> "appletouchicon_57",
						"std" 		=> '',
						"type" 		=> "media"
				);
$of_options[] = array( 	"name" 		=> __("Apple Touch Icon 72x72",'mtcframework'),
						"desc" 		=> __("",'mtcframework'),
						"id" 		=> "appletouchicon_72",
						"std" 		=> '',
						"type" 		=> "media"
				);
$of_options[] = array( 	"name" 		=> __("Apple Touch Icon 114x114",'mtcframework'),
						"desc" 		=> __("",'mtcframework'),
						"id" 		=> "appletouchicon_114",
						"std" 		=> '',
						"type" 		=> "media"
				);
$of_options[] = array( 	"name" 		=> __("Apple Touch Icon 144x144",'mtcframework'),
						"desc" 		=> __("",'mtcframework'),
						"id" 		=> "appletouchicon_144",
						"std" 		=> '',
						"type" 		=> "media"
				);
				


				
$of_options[] = array( 	"name" 		=> __("Custom Login Logo",'mtcframework'),
						"desc" 		=> __("Upload a 323px x 67px image here to replace the admin login logo.",'mtcframework'),
						"id" 		=> "login_logo",
						"std" 		=> "",
						"type" 		=> "media"
				);	
$of_options[] = array( 	"name" 		=> __("Tracking Code",'mtcframework'),
						"desc" 		=> __("Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",'mtcframework'),
						"id" 		=> "google_analytics",
						"std" 		=> "",
						"type" 		=> "textarea"
				);	

$of_options[] = array( 	"name" 		=> __("Footer Text",'mtcframework'),
						"desc" 		=> __("Insert text to your Footer",'mtcframework'),
						"id" 		=> "footer_text",
						"std" 		=> get_bloginfo("name"). " -  WPBootstrap.net",
						"type" 		=> "textarea"
				);
$of_options[] = array( 	"name" 		=> __("Enable Scrool to Top Button",'mtcframework'),
						"desc" 		=> __("Select this if you wish to enable Scroll to Top Button",'mtcframework'),
						"id" 		=> "switch_scrooltop",
						"std" 		=> 0,
						"folds"		=> 1,
						"type" 		=> "switch"
				); 
$of_options[] = array( 	"name" 		=> __("Scroll Position",'mtcframework'),
						"desc" 		=> __("Select your themes alternative color scheme.",'mtcframework'),
						"id" 		=> "scroll_pos",
						"fold"		=> "switch_scrooltop",
						"std" 		=> "right",
						"type" 		=> "select2",
						"options" 	=> array(
								'right'	=> 'Right',
								'left'	=> 'Left'
								)
				);				


/* = Import Demo Data
======================================================*/	
$of_options[] = array( 	"name" 		=> __("Import Demo Data",'mtcframework'),
						"type" 		=> "heading"
				);
if(isset($_GET['imported'])){			
$of_options[] = array( 	"name" 		=> "doc",
						"desc" 		=> "",
						"id" 		=> "message_import",
						"std" 		=> __("Successfully imported the demo data...",'mtcframework'),
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
}else{
$install_url = admin_url( 'admin.php?import_data_content=true');
$of_options[] = array( 	"name" 		=> __("Import Demo Data",'mtcframework'),
						"id" 		=> "of_import_demo_data",
						"std" 		=> "",
						"type" 		=> "import-demo-data",
						"desc" 		=> __('You can use this option to import demo data. This will overwrite your settings for all profiles. If you would like to replicate the demo site, you will also have to import the WordPress export XML file that ships with Bzine for WordPress. Please refer to the user manual for instructions.','mtcframework'),
				);
				
}	



/* = News Ticker
======================================================*/
$of_options[] = array( 	"name" 		=> __("News Ticker",'mtcframework'),
						"type" 		=> "heading"
				);
$of_options[] = array( 	"name" 		=> __("Enable News ticker ?",'mtcframework'),
						"desc" 		=> __("Select this if you wish to enable news ticker",'mtcframework'),
						"id" 		=> "switch_news_ticker",
						"std" 		=> 1,
						"folds"		=> 1,
						"type" 		=> "switch"
				);
$of_options[] = array( 	"name" 		=> __("News Label",'mtcframework'),
						"desc" 		=> " ",
						"id" 		=> "news_ticker_label",
						"std" 		=> "BREAKING NEWS",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> __("The Content",'mtcframework'),
						"desc" 		=> __("Select how you would like selection post on news ticker",'mtcframework'),
						"id" 		=> "news_ticker_selection",
						"std" 		=> "recent_post",
						"type" 		=> "select2",
						"options"	=> array(
										'recent_post' => 'Recent Post',
										'most_commented_posts'=> 'Most Commented Posts'
									)
				);
$of_options[] = array( 	"name" 		=> __("News Ticker Animation",'mtcframework'),
						"desc" 		=> __("Select how you would like animation on news ticker",'mtcframework'),
						"id" 		=> "news_ticker_animation",
						"std" 		=> "reveal",
						"type" 		=> "select2",
						"options"	=> array(
										'reveal' => 'Reveal',
										'fade'=> 'Fade'
									)
				);
 $of_options[] = array( "name" 		=> __("Number of Posts",'mtcframework'),
						"desc" 		=> __("Insert count of  News Ticker show (default 5)",'mtcframework'),
						"id" 		=> "news_ticker_number",
						"std" 		=> "5",
						"min" 		=> "5",
						"step"		=> "5",
						"max" 		=> "25",
						"type" 		=> "sliderui" 
				);					

				
				
				
/* = Styling Options
======================================================*/				
$of_options[] = array( 	"name" 		=> __("Styling Options",'mtcframework'),
						"type" 		=> "heading"
				);
$of_options[] = array( 	"name" 		=> __("Use Background Image",'mtcframework'),
						"desc" 		=> __("Select this if you wish to choose your own default font for the theme using the google font selector box below.",'mtcframework'),
						"id" 		=> "switch_custom_bg",
						"std" 		=> 0,
						"folds"		=> 1,
						"type" 		=> "switch"
				); 
$of_options[] = array( 	"name" 		=> __("Select Image",'mtcframework'),
						"desc" 		=> __("Select a preset background image for the body background.",'mtcframework'),
						"id" 		=> "custom_bg",
						'fold'		=> 'switch_custom_bg',
						"std" 		=> $bg_images_url."bg0.png",
						"type" 		=> "tiles",
						"options" 	=> $bg_images,
				);				
$of_options[] = array( 	"name" 		=> __("Use custom image",'mtcframework'),
						"desc" 		=> __("Place url of your image background or upload your custom background image.",'mtcframework'),
						"id" 		=> "custom_bg_upload",
						"std" 		=> "",
						'fold'		=> 'switch_custom_bg',
						"type" 		=> "media"
				);
$of_options[] = array( 	"name" 		=> __("Background Image Repeat",'mtcframework'),
						"desc" 		=> __("Select how you would like to repeat the background-image",'mtcframework'),
						"id" 		=> "custom_bg_repeat",
						"std" 		=> "repeat",
						'fold'		=> 'switch_custom_bg',
						"type" 		=> "select",
						"options"	=> array('no-repeat','repeat','repeat-x','repeat-y')
				);
$of_options[] = array( 	"name" 		=> __("Background Position",'mtcframework'),
						"desc" 		=> __("Select how you would like to position the background",'mtcframework'),
						"id" 		=> "custom_bg_pos",
						"std" 		=> "top-left",
						'fold'		=> 'switch_custom_bg',
						"type" 		=> "select",
						"options"	=> array('top left','top center','top right','center left','center center','center right','bottom left','bottom center','bottom right')
				);	
$of_options[] = array( 	"name" 		=> __("Background Attachment",'mtcframework'),
						"desc" 		=> __("Select whether the background should be fixed or move when the user scrolls",'mtcframework'),
						"id" 		=> "custom_bg_attach",
						"std" 		=> "scroll",
						'fold'		=> 'switch_custom_bg',
						"type" 		=> "select",
						"options"	=> array('fixed','scroll')
				);
				
$of_options[] = array( 	"name" 		=> __("Custom CSS",'mtcframework'),
						"desc" 		=> __("Quickly add some CSS to your theme by adding it to this block.",'mtcframework'),
						"id" 		=> "custom_css",
						"std" 		=> "",
						"type" 		=> "textarea"
				);	
				
				






/* = Typhography Options
======================================================*/					
$of_options[] = array( 	"name" 		=> __("Typhography Options",'mtcframework'),
						"type" 		=> "heading"
				);			
$of_options[] = array( 	"name" 		=> __("Manual Setting Typography",'mtcframework'),
						"desc" 		=> __("Select this if you wish to choose your own default font for the theme using the google font selector box below.",'mtcframework'),
						"id" 		=> "switch_typography",
						"std" 		=> 0,
						"folds"		=> 1,
						"type" 		=> "switch"
				); 				
$of_options[] = array( 	"name" 		=> __("General Typhography setting",'mtcframework'),
						"desc" 		=> __("Specify the body font properties",'mtcframework'),
						"fold"		=> "switch_typography",
						"id" 		=> "general_typo",
						"std" 		=> array('size' => '14px','face2' => 'Raleway','style' => 'normal','color' => '#515151'),
						"type" 		=> "typography",
						"preview" 	=> array(
										"text" => "Grumpy wizards make toxic brew for the evil Queen and Jack.", //this is the text from preview box
										"size" => "20px" 
						),
						"options" 	=> $g_font
				);
$of_options[] = array( 	"name" 		=> __("Post Title",'mtcframework'),
						"desc" 		=> __("Specify the Post Title font properties",'mtcframework'),
						"id" 		=> "f_post",
						"fold"		=> "switch_typography",
						"std" 		=> array('size' => '32px','face2' => 'Raleway','style' => 'normal','color' => '#333333'),
						"type" 		=> "typography",
						"preview" 	=> array(
										"text" => "Grumpy wizards make toxic brew for the evil Queen and Jack.", //this is the text from preview box
										"size" => "20px" 
						),
						"options" 	=> $g_font
				);

$of_options[] = array( 	"name" 		=> __("Post Entry and Page Entry",'mtcframework'),
						"desc" 		=> __("Specify the Post Entry font properties",'mtcframework'),
						"id" 		=> "f_postentry",
						"fold"		=> "switch_typography",
						"std" 		=> array('size' => '14px','face2' => 'Raleway','style' => 'normal','color' => '#333333'),
						"type" 		=> "typography",
						"preview" 	=> array(
										"text" => "Grumpy wizards make toxic brew for the evil Queen and Jack.", //this is the text from preview box
										"size" => "20px" 
						),
						"options" 	=> $g_font
				);
$of_options[] = array( 	"name" 		=> __("Widget Sidebar Title",'mtcframework'),
						"desc" 		=> __("Specify the Widget Sidebar Title font properties",'mtcframework'),
						"id" 		=> "f_widget",
						"fold"		=> "switch_typography",
						"std" 		=> array('size' => '17px','face2' => 'Raleway','style' => 'normal','color' => '#ffffff'),
						"type" 		=> "typography",
						"preview" 	=> array(
										"text" => "Grumpy wizards make toxic brew for the evil Queen and Jack.", //this is the text from preview box
										"size" => "20px" 
						),
						"options" 	=> $g_font
				); 
				






/* = Forum Setting
======================================================*/
$of_options[] = array( 	"name" 		=> __("Forum Setting",'mtcframework'),
						"type" 		=> "heading"
				);
$of_options[] = array( 	"name" 		=> __("Welcome Text on Main Forum",'mtcframework'),
						"desc" 		=> "",
						"id" 		=> "forum_welcome_text",
						"std" 		=> "",
						"type" 		=> "textarea"
				);					
				
				
				

	

/* = Social Media 
======================================================*/	
$of_options[] = array( 	"name" 		=> __("Social Media",'mtcframework'),
						"type" 		=> "heading"
				);
$of_options[] = array( 	"name" 		=> "doc",
						"desc" 		=> "",
						"id" 		=> "introduction",
						"std" 		=> "Please put your full social media link.<br />
										for example : <code> https://www.facebook.com/wpbootstrapnet</code><br />
										leave empty to remove it from your site.",
						"icon" 		=> true,
						"type" 		=> "info"
				);	
$of_options[] = array( 	"name" 		=> __("Show  social icon on header",'mtcframework'),
						"desc" 		=> "",
						"id" 		=> "show_icon_social_header",
						"std" 		=> 1,
						"type" 		=> "switch"
				);
$of_options[] = array( 	"name" 		=> __("Show  social icon on footer",'mtcframework'),
						"desc" 		=> "",
						"id" 		=> "show_icon_social_footer",
						"std" 		=> 1,
						"type" 		=> "switch"
				); 				
				
				
				
				
$of_options[] = array( 	"name" 		=> "Facebook",
						"desc" 		=>  __("Place url of your facebook page/profile",'mtcframework'),
						"id" 		=> "s_facebook",
						"std" 		=> "",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Twitter",
						"desc" 		=>  __("Place url of your Twitter profile",'mtcframework'),
						"id" 		=> "s_twitter",
						"std" 		=> "",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Instagram",
						"desc" 		=>  __("Place url of your Instagram profile",'mtcframework'),
						"id" 		=> "s_instagram",
						"std" 		=> "",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "LinkedIn",
						"desc" 		=>  __("Place url of your LinkedIn profile",'mtcframework'),
						"id" 		=> "s_Linkedin",
						"std" 		=> "",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Google+",
						"desc" 		=>  __("Place url of your Google+ profile",'mtcframework'),
						"id" 		=> "s_Google",
						"std" 		=> "",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Dribbble",
						"desc" 		=>  __("Place url of your facebook page/profile",'mtcframework'),
						"id" 		=> "s_Dribbble",
						"std" 		=> "",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "YouTube",
						"desc" 		=>  __("Place url of your Dribbble profile",'mtcframework'),
						"id" 		=> "s_YouTube",
						"std" 		=> "",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Pinterest",
						"desc" 		=>  __("Place url of your Pinterest profile",'mtcframework'),
						"id" 		=> "s_Pinterest",
						"std" 		=> "",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Flickr",
						"desc" 		=>  __("Place url of your Flickr album",'mtcframework'),
						"id" 		=> "s_Flickr",
						"std" 		=> "",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Tumblr",
						"desc" 		=> __("Place url of your Tumblr profile",'mtcframework'),
						"id" 		=> "s_Tumblr",
						"std" 		=> "",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "RSS",
						"desc" 		=>  __("RSS url",'mtcframework'),
						"id" 		=> "s_Rss",
						"std" 		=> "",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Github",
						"desc" 		=>  __("Place url of your Github profile",'mtcframework'),
						"id" 		=> "s_github",
						"std" 		=> "",
						"type" 		=> "text"
				);


				
				
				
				
/* = Documentation
======================================================*/				
$of_options[] = array( 	"name" 		=> __("Documentation",'mtcframework'),
						"type" 		=> "heading"
				);
$of_options[] = array( 	"name" 		=> "doc",
						"desc" 		=> "",
						"id" 		=> "info_doc",
						"std" 		=> "You can read Our Documentation <a href=\"#\">here</a>",
						"icon" 		=> true,
						"type" 		=> "info"
				);	



				
/* = Backup Options
======================================================*/
$of_options[] = array( 	"name" 		=> __("Backup Options",'mtcframework'),
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> __("Backup and Restore Options",'mtcframework'),
						"id" 		=> "of_backup",
						"std" 		=> "",
						"type" 		=> "backup",
						"desc" 		=> __('You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.','mtcframework'),
				);			
$of_options[] = array( 	"name" 		=> __("Transfer Theme Options Data",'mtcframework'),
						"id" 		=> "of_transfer",
						"std" 		=> "",
						"type" 		=> "transfer",
						"desc" 		=> __('You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".','mtcframework'),
				);
				
	}//End function: of_options()
}//End chack if function exists: of_options()


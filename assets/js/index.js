function autocomplete(inp, arr) {
    var currentFocus;
    inp.addEventListener("input", function(e) {
        var a, b, i, val = this.value;
        closeAllLists();
        if (!val) { return false;}
        currentFocus = -1;
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        this.parentNode.appendChild(a);
        /*for each item in the array...*/
        for (i = 0; i < arr.length; i++) {
          if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
            b = document.createElement("DIV");
            b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
            b.innerHTML += arr[i].substr(val.length);
            b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
            b.addEventListener("click", function(e) {
                inp.value = this.getElementsByTagName("input")[0].value;
                closeAllLists();
            });
            a.appendChild(b);
          }
        }
    });
    /*execute a function presses a key on the keyboard:*/
    inp.addEventListener("keydown", function(e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
          /*If the arrow DOWN key is pressed,
          increase the currentFocus variable:*/
          currentFocus++;
          /*and and make the current item more visible:*/
          addActive(x);
        } else if (e.keyCode == 38) { //up
          /*If the arrow UP key is pressed,
          decrease the currentFocus variable:*/
          currentFocus--;
          /*and and make the current item more visible:*/
          addActive(x);
        } else if (e.keyCode == 13) {
          /*If the ENTER key is pressed, prevent the form from being submitted,*/
          e.preventDefault();
          if (currentFocus > -1) {
            /*and simulate a click on the "active" item:*/
            if (x) x[currentFocus].click();
          }
        }
    });
    function addActive(x) {
      /*a function to classify an item as "active":*/
      if (!x) return false;
      /*start by removing the "active" class on all items:*/
      removeActive(x);
      if (currentFocus >= x.length) currentFocus = 0;
      if (currentFocus < 0) currentFocus = (x.length - 1);
      /*add class "autocomplete-active":*/
      x[currentFocus].classList.add("autocomplete-active");
    }
    function removeActive(x) {
      /*a function to remove the "active" class from all autocomplete items:*/
      for (var i = 0; i < x.length; i++) {
        x[i].classList.remove("autocomplete-active");
      }
    }
    function closeAllLists(elmnt) {
      /*close all autocomplete lists in the document,
      except the one passed as an argument:*/
      var x = document.getElementsByClassName("autocomplete-items");
      for (var i = 0; i < x.length; i++) {
        if (elmnt != x[i] && elmnt != inp) {
          x[i].parentNode.removeChild(x[i]);
        }
      }
    }
    /*execute a function when someone clicks in the document:*/
    document.addEventListener("click", function (e) {
        closeAllLists(e.target);
    });
  }
  
  /*An array containing all the country names in the world:*/
  var cities = ["Caloocan","Las Piñas","Makati","Malabon","Mandaluyong","Manila","Marikina","Muntinlupa","Navotas","Parañaque","Pasay", "Pasig","Pateros","MM","Quezon","San Juan","Taguig","Valenzuela","Bangued","Boliney","Bucay","Bucloc","Daguioman","Danglas","Dolores","La Paz","Lacub","Lagangilang","Lagayan","Langiden","Licuan-Baay","Luba","Malibcong","Manabo" ,"Peñarrubia","Pidigan","Pilar","Sallapadan","San Isidro","San Juan","San Quintin","Tayum","Tineg","Tubo","Villaviciosa" ,"Calanasan","Conner","Flora","Kabugao","Luna","Pudtol","Santa Marcela","Atok", "Baguio","Bakun", "Bokod", "Buguias", "Itogon", "Kabayan", "Kapangan", "Kibungan", "La Trinidad", "Mankayan", "Sablan", "Tuba", "Tublay","Aguinaldo" ,"Alfonso Lista" ,"Asipulo" ,"Banaue" ,"Hingyon" ,"Hungduan" ,"Kiangan" ,"Lagawe" ,"Lamut" ,"Mayoyao" ,"Tinoc" ,"Balbalan","Lubuagan","Pasil","Pinukpuk","Rizal","Tabuk","Tanudan","Tinglayan","Barlig","Bauko","Besao","Bontoc","Natonin","Paracelis","Sabangan","Sadanga","Sagada","Tadian","Adams" ,"Bacarra" ,"Badoc" ,"Bangui" ,"Banna" ,"Batac","Burgos" ,"Carasi" ,"Currimao" ,"Dingras" ,"Dumalneg" ,"Laoag" ,"Marcos" ,"Nueva Era" ,"Pagudpud" ,"Paoay" ,"Pasuquin" ,"Piddig" ,"Pinili" ,"San Nicolas" ,"Sarrat" ,"Solsona" ,"Vintar" ,"Alilem","Banayoyo","Bantay","Burgos","Cabugao","Candon","Caoayan","Cervantes","Galimuyod","Gregorio Del Pilar","Lidlidda","Magsingal","Nagbukel","Narvacan","Quirino","Salcedo","San Emilio","San Esteban","San Ildefonso","San Juan","San Vicente","Santa","Santa Catalina","Santa Cruz","Santa Lucia","Santa Maria","Santiago","Santo Domingo","Sigay","Sinait","Sugpon","Suyo","Tagudin","Vigan","Agoo","Aringay","Bacnotan","Bagulin","Balaoan","Bangar","Bauang","Burgos","Caba","Luna","Naguilian","Pugo","Rosario","San Fernando","San el","San Juan","Santo Tomas","Santol","Sudipen","Tubao","Agno", "Aguilar", "Alaminos","Alcala", "Anda", "Asingan", "Balungao", "Bani", "Basista", "Bautista", "Bayambang", "Binalonan", "Binmaley", "Bolinao", "Bugallon", "Burgos", "Calasiao", "Dagupan","Dasol", "Infanta", "dor", "Laoac", "Lingayen", "Mabini", "Malasiqui", "Manaoag", "Mangaldan", "Mangatarem", "Mapandan", "Natividad", "Pozzorubio", "Rosales", "San Carlos","San Fabian", "San Jacinto", "San Manuel", "San Nicolas", "San Quintin", "Santa Barbara", "Santa Maria", "Santo Tomas", "Sison", "Sual", "Tayug", "Umingan", "Urdaneta","Urbiztondo", "Villasis","Basco","Itbayat","Ivana","Mahatao","Sabtang","Uyugan","Abulug","Alcala","Allacapan","Amulung","Aparri","Baggao","Ballesteros","Buguey","Calayan","Camalaniugan","Claveria","Enrile","Gattaran","Gonzaga","Iguig","Lal-lo","Lasam","Pamplona","Peñablanca","Piat","Rizal","Sanchez-Mira","Santa Ana","Santa Praxedes","Santa Teresita","Santo Niño","Solana","Tuao","Tuguegarao","Alicia","Angadanan","Aurora","to Soliven","Cabagan","Cabatuan","Cauayan", "Cordon","Delfin Albano","Dinapigue","Divilacan","Echague","Gamu","Ilagan","Jones","Luna","Maconacon","Mallig","Naguilian","Palanan","Quezon","Quirino","Ramon","Reina Mercedes","Roxas","San Agustin","San Guillermo","San Isidro","San Manuel","San Mariano","San Mateo","San Pablo","Santa Maria","Santiago","Santo Tomas","Tumauini","Alfonso Castaneda","Ambaguio","Aritao","Bagabag","Bambang","Bayombong","Diadi","Dupax del Norte","Dupax del Sur","Kasibu","Kayapa","Quezon","Santa Fe","Solano","Villaverde","Aglipay","Cabarroguis","Diffun","Maddela","Nagtipunan","Saguday","Baler","Casiguran","Dilasag","Dinalungan","Dingalan","Dipaculao","Maria Aurora","San Luis","Abucay","Bagac","Balanga","Dinalupihan","Hermosa","Limay","Mariveles","Morong","Orani","Orion","Pilar","Samal",
  "Angat","Balagtas","Baliuag","Bocaue","Bulakan","Bustos","Calumpit","Doña Remedios Trinidad","Guiguinto","Hagonoy","Malolos","Marilao","Meycauayan","Norzagaray","Obando","Pandi","Paombong","Plaridel","Pulilan","San Ildefonso","San Jose del Monte","San Miguel","San Rafael","Santa Maria","Aliaga","Bongabon","Cabanatuan","Cabiao","Carranglan","Cuyapo","Gabaldon","Gapan","General Mamerto Natividad","General Tinio","Guimba","Jaen","Laur","Licab","Llanera","Lupao","Muñoz","Nampicuan","Palayan","Pantabangan","Peñaranda","Quezon","Rizal","San Antonio","San Isidro","San Jose","San Leonardo","Santa Rosa","Santo Domingo","Talavera","Talugtug","Zaragoza","Angeles","Apalit","Arayat","Bacolor","Candaba","Floridablanca","Guagua","Lubao","Mabalacat","Macabebe","Magalang","Masantol","Mexico","Minalin","Porac","San Fernando","San Luis","San Simon","Santa Ana","Santa Rita","Santo Tomas","Sasmuan","Anao","Bamban","Camiling","Capas","Concepcion","Gerona","La Paz","Mayantoc","Moncada","Paniqui","Pura","Ramos","San Clemente","San Jose","San Manuel","Santa Ignacia","Tarlac","Victoria","Botolan","Cabangan","Candelaria","Castillejos","Iba","Masinloc","Olongapo","Palauig","San Antonio","San Felipe","San Marcelino","San Narciso","Santa Cruz","Subic","Agoncillo","Alitagtag","Balayan","Balete","Batangas","Bauan","Calaca","Calatagan","Cuenca","Ibaan","Laurel","Lemery","Lian","Lipa","Lobo","Mabini","Malvar","Mataasnakahoy","Nasugbu","Padre Garcia","Rosario","San Jose","San Juan","San Luis","San Nicolas","San Pascual","Santa Teresita","Santo Tomas","Taal","Tanauan","Taysan","Tingloy","Tuy","Alfonso","Amadeo","Bacoor","Carmona","Cavite","Dasmariñas","General Mariano Alvarez","General Emilio Aguinaldo","General Trias","Imus","Indang","Kawit","Magallanes","Maragondon","Mendez","Naic","Noveleta","Rosario","Silang","Tagaytay","Tanza","Ternate","Trece Martires","Alaminos","Bay","Biñan","Cabuyao","Calamba","Calauan","Cavinti","Famy", "Liliw","Los Baños","Luisiana","Lumban","Mabitac","Magdalena","Majayjay","Nagcarlan","Paete","Pagsanjan","Pakil","Pangil","Pila","Rizal","San Pablo","San Pedro","Santa Cruz","Santa Maria","Santa Rosa","Siniloan","Victoria","Agdangan","Alabat","Atimonan","Buenavista","Burdeos","Calauag","Candelaria","Catanauan","Dolores","General Luna","General Nakar","Guinayangan","Gumaca","Infanta","Jomalig","Lopez","Lucban","Lucena","Macalelon","Mauban","Mulanay","Padre Burgos","Pagbilao","Panukulan","Patnanungan","Perez","Pitogo","Plaridel","Polillo","Quezon","Real","Sampaloc","San Andres","San Antonio","San Francisco","San Narciso","Sariaya","Tagkawayan","Tayabas","Tiaong","Angono","Antipolo","Baras","Binangonan","Cainta","Cardona","Jalajala","Morong","Pililla","Rodriguez","San Mateo","Tanay","Taytay","Teresa","Boac","Buenavista","Gasan","Mogpog","Santa Cruz","Torrijos","de Ilog","Calintaan" ,"Looc" ,"Lubang" ,"Magsaysay" ,"Mamburao" ,"Paluan" ,"Rizal" ,"Sablayan" ,"San Jose" ,"Santa Cruz" ,"Baco","Bansud","Bongabong","Bulalacao","Calapan","Gloria","Mansalay","Naujan","Pinamalayan","Pola","Puerto Galera","Roxas","San Teodoro","Socorro","Victoria","Aborlan","Agutaya","Araceli","Balabac","Bataraza","Brooke's Point","Busuanga","ancillo","Coron","Culion","Cuyo","Dumaran","El Nido","aan","Linapacan","Magsaysay","Narra","Puerto Princesa","Quezon","Rizal","Roxas","San Vicente","Sofronio Española","Taytay","Alcantara","Banton","Cajidiocan","Calatrava","Concepcion","Corcuera","Ferrol","Looc","Magdiwang","Odiongan","Romblon","San Agustin","San Andres","San Fernando","San Jose","Santa Fe","Santa Maria","Bacacay","Camalig","Daraga","Guinobatan","Jovellar","Legazpi","Libon","Ligao","Malilipot","Malinao","Manito","Oas","Pio Duran","Polangui","Rapu-Rapu","Santo Domingo","Tabaco","Tiwi","Basud","Capalonga","Daet","Jose Panganiban","Labo","Mercedes","Paracale","San Lorenzo Ruiz","San Vicente","Santa Elena","Vinzons","Baao","Balatan","Bato","Bombon","Buhi","Bula","Cabusao","Calabanga","Camaligan","Canaman","Caramoan","Del Gallego","Gainza","Garchitorena","Goa","Iriga","Lagonoy","Libmanan","Lupi","Magarao","Milaor","Minalabac","Nabua","Naga","Ocampo","Pamplona","Pasacao","Pili","Presentacion","Ragay","Sagñay","San Fernando","San Jose","Sipocot","Siruma","Tigaon","Tinambac","Bagamanoc","Baras","Bato","Caramoran","Gigmoto","Pandan","Panganiban","San Andres","San Miguel","Viga","Virac","Aroroy","Baleno","Balud","Batuan","Cataingan","Cawayan","Claveria","Dimasalang","Esperanza","Mandaon","Masbate","Milagros","Mobo","Monreal","Palanas","Pio V. Corpuz","Placer","San Fernando","San Jacinto","San Pascual","Uson","Barcelona","Bulan","Bulusan","Casiguran","Castilla","Donsol","Gubat","Irosin","Juban","Magallanes","Matnog","Pilar","Prieto Diaz","Santa Magdalena","Sorsogon","Altavas","Balete","Banga","Batan","Buruanga","Ibajay","Lezo","Libacao","Madalag","Makato","Malay","Malinao","Nabas","New Washington","Numancia","Tangalan","Anini-y","Barbaza","Belison","Bugasong","Caluya","Culasi","Hamtic","Laua-an","Libertad","Pandan","Patnongon","San Jose","San Remigio","Sebaste","Sibalom","Tibiao","Tobias Fornier","Valderrama","Cuartero","Dao","Dumalag","Dumarao","Jamindan","Maayon","Mambusao","Panay","Panitan","Pilar","Pontevedra","President Roxas","Roxas","Sapian","Sigma","Tapaz","Buenavista","Jordan","Nueva Valencia","San Lorenzo","Sibunag","Ajuy","Alimodian","Anilao","Badiangan","Balasan","Banate","Barotac Nuevo","Barotac Viejo","Batad","Bingawan","Cabatuan","Calinog","Carles","Concepcion","Dingle","Dueñas","Dumangas","Estancia","Guimbal","Igbaras","Iloilo","Janiuay","Lambunao","Leganes","Lemery","Leon","Maasin","Miagao","Mina","New Lucena","Oton","Passi","Pavia","Pototan","San Dionisio","San Enrique","San Joaquin","San Miguel","San Rafael","Santa Barbara","Sara","Tigbauan","Tubungan","Zarraga","Bacolod","Bago","Binalbagan","Cadiz","Calatrava","Candoni","Cauayan","Enrique B. Magalona","Escalante","Himamaylan","Hinigaran","Hinoba-an","Ilog","La Carlota","La Castellana","Manapla","Moises Padilla","Murcia","Pontevedra","Pulupandan","Sagay","Salvado,dicto","San Carlos","San Enrique","Silay","Sipalay","Toboso","Valladolid","Victorias","Alburquerque","Alicia","Anda","Antequera","Baclayon","Balilihan","Batuan","Bien Unido","Bilar","Buenavista","Calape","Candijay","Carmen","Catigbian","Clarin","Corella","Cortes","Dagohoy","Danao","Dauis","Dimiao","Duero","Garcia Hernandez","Getafe","Guindulman","Inabanga","Jagna","Lila","Loay","Loboc","Loon","Mabini","Maribojoc","Panglao","Pilar","President Carlos P. Garcia","Sagbayan","San Isidro","San Miguel","Sevilla","Sierra Bullones","Sikatuna","Tagbilaran","Talibon","Trinidad","Tubigon","Ubay","Valencia","Alcantara","Alcoy","Alegria","Aloguinsan","Argao","Asturias","Badian","Balamban","Bantayan","Barili","Bogo","Boljoon","Borbon","Carcar","Carmen","Catmon","Cebu","Compostela","Consolacion","Cordoba","Daanbantayan","Dalaguete","Danao","Dumanjug","Ginatilan","Lapu-Lapu","Liloan","Madridejos","Malabuyoc","Mandaue","Medellin","Minglanilla","Moalboal","Naga","Oslob","Pilar","Pinamungajan","Poro","Ronda","Samboan","San Fernando","San Francisco","San Remigio","Santa Fe","Santander","Sibonga","Sogod","Tabogon","Tabuelan","Toledo","Tuburan","Tudela","Amlan","Ayungon","Bacong","Bais","Basay","Bayawan","Bindoy","Canlaon","Dauin","Dumaguete","Guihulngan","Jimalalud","La Libertad","Mabinay","Manjuyod","Pamplona","San Jose","Santa Catalina","Siaton","Sibulan","Tanjay","Tayasan","Valencia","Vallehermoso","Zamboanguita","Enrique Villanueva","Larena","Lazi","Maria","San Juan","Siquijor","Almeria","Biliran","Cabucgayan","Caibiran","Culaba","Kawayan","Maripipi","Naval","Arteche","Balangiga","Balangkayan","Borongan","Can-avid","Dolores","General MacArthur","Giporlos","Guiuan","Hernani","Jipapad","Lawaan","Llorente","Maslog","Maydolong","Mercedes","Oras","Quinapondan","Salcedo","San Julian","San Policarpo","Sulat","Taft",
  "Abuyog","Alangalang","Albuera","Babatngon","Barugo","Bato","Baybay","Burauen","Calubian","Capoocan","Carigara","Dagami","Dulag","Hilongos","Hindang","Inopacan","Jaro","Javier","Julita","Kananga","La Paz","Leyte","MacArthur","Mahaplag","Matag-ob","Matalom","Mayorga","Merida","Ormoc","Palo","Palompon","Pastrana","San Isidro","San Miguel","Santa Fe","Tabango","Tabontabon","Tacloban","Tanauan","Tolosa","Tunga","Villaba","Allen","Biri","Bobon","Capul","Catarman","Catubig","Gamay","Laoang","Lapinig","Las Navas","Lavezares","Lope de Vega","Mapanas","Mondragon","Palapag","Pambujan","Rosario","San Antonio","San Isidro","San Jose","San Roque","San Vicente","Silvino Lobos","Victoria",
  "Almagro","Basey","Calbayog","Calbiga","Catbalogan","Daram","Gandara","Hinabangan","Jiabong","Marabut","Matuguinao","Motiong","Pagsanghan","Paranas","Pinabacdao","San Jorge","San Jose de Buan","San Sebastian","Santa Margarita","Santa Rita","Santo Niño","Tagapul-an","Talalora","Tarangnan","Villareal","Zumarraga",
  "Anahawan","Bontoc","Hinunangan","Hinundayan","Libagon","Liloan","Limasawa","Maasin","Macrohon","Malitbog","Padre Burgos","Pintuyan","Saint Bernard","San Francisco","San Juan","San Ricardo","Silago","Sogod","Tomas Oppus",
  "Baliguian",,"Dapitan","Dipolog","Godod","Gutalac","Jose Dalman","Katipunan" ,"La Libertad" ,"Labason" ,"Leon B. Postigo" ,"Liloy" ,"Manukan" ,"Mutia" ,"Piñan" ,"Polanco" ,"President Manuel A. Roxas" ,"Rizal" ,"Salug" ,"Sergio Osmeña Sr." ,"Siayan" ,"Sibuco" ,"Sibutad" ,"Sindangan" ,"Siocon" ,"Sirawai" ,"Tamp","Aurora","Bayog","Dimataling","Dinas","Dumalinao","Dumingag","Guipos","Josefina","Kumalarang","Labangan","Lakewood","Lapuyan","Mahayag","Margosatubig","Midsalip","Molave","Pagadian","Pitogo","Ramon Magsaysay","San Miguel","San Pablo","Sominot","Tabina","Tambulig","Tigbao","Tukuran","Vincenzo A. Sagun","Zamboanga","Alicia","Buug","Diplahan","Imelda","Ipil","Kabasalan","Mabuhay","Malangas","Naga","Olutanga","Payao","Roseller Lim","Siay","Talusan","Titay","Tungawan",
  "Baungon" ,"Cabanglasan" ,"Damulog" ,"Da," ,"Don Carlos" ,"Impasugong" ,"Kadingilan","angan" ,"Kibawe" ,"Kitaotao" ,"Lantapan" ,"Libona" ,"Malaybalay","Malitbog" ,"Manolo Fortich" ,"Maramag" ,"Pangantucan" ,"Quezon" ,"San Fernando" ,"Sumilao" ,"Talakag" ,"Valencia","Catarman","Guinsiliban","Mahinog","Mambajao","Sagay",
  "Bacolod","Baloi","Baroy","Iligan","Kapatagan","Kauswagan","Kolambugan","Lala","Linamon","Magsaysay","Maigo","Matungao","Munai","Nunungan","Pantao Ragat","Pantar","Poona Piagapo","Salvador","Sapad","Sultan Naga Dimaporo","Tagoloan","Tangcal","Tubod","Aloran","Baliangao","Bonifacio","Calamba","Clarin","Concepcion","Don Victoriano Chiongbian","Jimenez","Lopez Jaena","Oroquieta","Ozamiz","Panaon","Plaridel","Sapang Dalaga","Sinacaban","Tangub","Tudela","Alubijid","Balingasag","Balingoan","Binuangan","an de Oro","Claveria","El Salvador","Gingoog","Gitagum","Initao","Jasaan","Kinoguitan","Lagonglong","Laguindingan","Libertad","Lugait","Magsaysay","Manticao","Medina","Naawan","Opol","Salay","Sugbongcogon","Tagoloan","T,n","Villanueva","Compostela","Laak","Mabini","Maco","Maragusan","Mawab","Monkayo","Montevista","Nabunturan","New Bataan","Pantukan","Asuncion","Braulio E. Dujali","Carmen","Kapalong","New Corella","Panabo","Samal","San Isidro","Santo Tomas","Tagum","Talaingod","Bansalan","Davao","Digos","Hagonoy","Kiblawan","Magsaysay","Malalag","Matanao","Padada","Santa Cruz","Sulop","Don Marcelino","Jose Abad Santos","Malita","Santa Maria","Sarangani","Baganga","Banaybanay","Boston","Caraga","Cateel","Governor Generoso","Lupon","Manay","Mati","San Isidro","Tarragona","Alamada","Aleosan","Antipas","Arakan","Banisilan","Carmen","Kabacan","Kidapawan","Libungan","M'lang","Magpet","Makilala","Matalam","Midsayap","Pigcawayan","Pikit","President Roxas","Tulunan","Alabel","Glan","Kiamba","Maasim","Maitum","Malapatan","Malungon",
  "Banga","General Santos","Koronadal","Lake Sebu","Norala","Polomolok","Santo Niño","Surallah","T'boli","Tampakan","Tantangan","Tupi","Bagumbayan","Columbio","Esperanza","Isulan","ansig","Lambayong","Lebak","Lutayan","Palimbang","President Quirino","Senator Ninoy Aquino","Tacurong","Buenavista","Butuan","Cabadbaran","Carmen","Jabonga","Kitcharao","Las Nieves","Magallanes","Nasipit","Remedios T. Romualdez","Santiago","Tubay",
  "Bayugan","Bunawan","Esperanza","La Paz","Loreto","Prosperidad","Rosario","San Francisco","San Luis","Santa Josefa","Sibagat","Talacogon","Trento","Veruela","Bas","anao","Dinagat","Libjo","Loreto","San Jose","Tubajon",
  "Alegria","Bacuag","Claver","Dapa","Del Carmen","General Luna","Gigaquit","Mainit","Malimono","Pilar","Placer","Sa,to","San Francisco","San Isidro","Santa Monica","Sison","Socorro","Surigao","Tagana-an","Tubod","Barobo","Bayabas","Bislig","Cantilan","Carmen","Carrascal","Cortes","Hinatuan","Lanuza","Lianga","Lingig","Madrid","Marihatag","San Agustin","San Miguel","Tagbina","Tago","Tandag","Akbar","Al-Barka","Hadji Mohammad Ajul","Hadji Muhtamad","Lamitan","Lantawan","Maluso","Sumisip","Tabuan-Lasa","Tipo-Tipo","Tuburan","Ungkaya Pukan","Bacolo,i","Balabagan","Balindong","Bayang","Binidayan","Buadiposo-Buntong","Bubong","Bumbaran","Butig","Calanogas","Ditsaan-Ramain","Ganassi","Kapai","Kapatagan","Lumba-Bayabao","Lumbaca-Unayan","Lumbatan","Lumbayanague","Madalum","Madamba","Maguing","Malabang","Marantao","Marawi","Marogong","Masiu","Mulondo","Pagayawan","Piagapo","Poona Bayabao","Pualas","Saguiaran","Sultan Dumalondong","Picong","Tagoloan II","Tamparan","Taraka","Tubaran","Tugaya","Wao",
  "Ampatuan","Barira","Buldon","Buluan","Cotabato","Datu Abdullah Sangki","Datu Anggal Midtimbang","Datu Blah T. Sinsuat","Datu Hoffer Ampatuan","Datu Montawal","Datu Odin Sinsuat","Datu Paglas","Datu Piang","Datu Salibo","Datu Saudi-Ampatuan","Datu Unsay","General Salipada K. Pendatun","Guindulungan","Kabuntalan","Mamasapano","Mangudadatu","Matanog","Northern Kabuntalan","Pagalungan","Paglat","Pandag","Parang","Rajah Buayan","Shariff Aguak","Shariff Saydona Mustapha","South Upi","Sultan Kudarat","Sultan Mastura","Sultan sa Barongis","Sultan Sumagka","Talayan","Upi",
  "Banguingui","Hadji Panglima Tahil","Indanan","Jolo","galan Caluang","Lugus","Luuk","Maimbung","Old Panamao","Omar","Pandami","Panglima Estino","Pangutaran","Parang","Pata","Patikul","Siasi","Talipao","Tapul",
  "Bongao","Languyan","Mapun","Panglima Sugala","Sapa-Sapa","Sibutu","Simunul","Sitangkai","South Ubian","Tandubas","Turtle Islands"];

  var bicycleTypes = ["Moutain Bike","MTB","Road Bike","RB","Fixie"];

  /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
  autocomplete(document.getElementById("myInput"),cities);

  function redirectTo(){
    window.location.href = "index.php";
  }

  // google map




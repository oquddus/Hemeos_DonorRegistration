
<?php

//Initial Error Checking
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('UTC');

class Db {

    // Database connection
    protected static $connection;

    /**
     * Connect to the database
     *
     * @return err on failure / mysqli MySQLi object instance on success
     */
    public function connect() {

        // Connect to Hemeos Database
        if(!isset(self::$connection)) {
            // Load configuration as an array.
            $config = parse_ini_file('../../config.ini');
           self::$connection = new mysqli($config['host'],$config['username'],$config['password'],$config['dbname'],$config['port']);
        //  echo 'Connected to Hemeos Database, ';
        }

        // If connection was not successful, handle the error
        if(self::$connection === false) {
            // Handle error
        //    echo 'This Connection Failed, ';
    		die();
        }

        return self::$connection;
    }

    public function finder() {
    	// Connect to the database
    	$connection = $this -> connect();

    	// Find last ID
    	$last_id = $connection -> insert_id;

    	return $last_id;
    }

    /**
     * Query the database
     *
     * @param $query The query string
     * @return mixed The result of the mysqli::query() function
     */
    public function query($query) {
        // Connect to the database
        $connection = $this -> connect();

        // Query the database
        $result = $connection -> query($query);

        return $result;
    }

    /**
     * Fetch rows from the database (SELECT query)
     *
     * @param $query The query string
     * @return error message on failure / array Database rows on success
     */
    public function select($query) {
        $rows = array();
        $result = $this -> query($query);
        if($result === false) {
        //     echo 'Failed to retrieve rows from database';
        }
        //echo 'here';
        while ($row = $result -> fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    /**
     * Fetch the last error from the database
     *
     * @return string Database error message
     */
    public function error() {
        $connection = $this -> connect();
        return $connection -> error;
    }

    /**
     * Quote and escape value for use in a database query
     *
     * @param string $value
     * @return string The quoted and escaped string
     */
    public function quote($value) {
        $connection = $this -> connect();
        //$connection -> strip_tags($value);
        return "'" . $connection -> real_escape_string($value) . "'";
    }
}


function fullescape($in)
{
  $out = '';
  for ($i=0;$i<strlen($in);$i++)
  {
    $hex = dechex(ord($in[$i]));
    if ($hex=='')
       $out = $out.urlencode($in[$i]);
    else
       $out = $out .'%'.((strlen($hex)==1) ? ('0'.strtoupper($hex)):(strtoupper($hex)));
  }
  $out = str_replace('+','%20',$out);
  $out = str_replace('_','%5F',$out);
  $out = str_replace('.','%2E',$out);
  $out = str_replace('-','%2D',$out);
  return $out;
}

// Create database object
$db = new Db();

/**
 * Quote and escape registration form submitted values
 */
//Step1
//Contact Information

$fname = $db -> quote($_POST['fname']);
$lname = $db -> quote($_POST['lname']);
$pname = $db -> quote($_POST['pname']);
$dob = $db -> quote($_POST['dob']);
$phone = $db -> quote($_POST['phone']);
$email = $db -> quote($_POST['email']);
//Address Information
$street1 = $db -> quote($_POST['street1']);
$street2 = $db -> quote($_POST['street2']);
$city = $db -> quote($_POST['city']);
$state = $db -> quote($_POST['state']);
$country = $db -> quote($_POST['country']);
$zip = $db -> quote($_POST['zip']);
//Personal Information
$sex = $db -> quote($_POST['sex']);
$height = $db -> quote($_POST['height']);
$weight = $db -> quote($_POST['weight']);
$ethnicity = $db -> quote($_POST['ethnicity']);
$ethnicity_other = $db -> quote($_POST['ethnicity_other']);
$reference = $db -> quote($_POST['reference']);
$registry = $db -> quote($_POST['registry']);
$registryinfo = $db -> quote($_POST['registry_info']);
//Alternative Contact
$altrelationship = $db -> quote($_POST['altrelationship']);
$altfname = $db -> quote($_POST['altfname']);
$altlname = $db -> quote($_POST['altlname']);
$altphone = $db -> quote($_POST['altphone']);


//Step 2
$tia = $db -> quote($_POST['tia']);
$cancer = $db -> quote($_POST['cancer']);
$cancerinfo = $db -> quote($_POST['cancer_info']);
$medication = $db -> quote($_POST['medication']);
$depression = $db -> quote($_POST['depression']);
$autism = $db -> quote($_POST['autism']);
$add = $db -> quote($_POST['add']);
$cholesterol = $db -> quote($_POST['cholesterol']);
$heartdisease = $db -> quote($_POST['heartdisease']);
$heartdiseaseinfo = $db -> quote($_POST['heartdisease_info']);
$arthritis = $db -> quote($_POST['arthritis']);
$chronicfatigue = $db -> quote($_POST['chronicfatigue']);
$seizure = $db -> quote($_POST['seizure']);
$seizureinfo = $db -> quote($_POST['seizure_info']);
$kidneystones = $db -> quote($_POST['kidneystones']);
$asthma = $db -> quote($_POST['asthma']);
$diabetes = $db -> quote($_POST['diabetes']);
$diabetesinfo = $db -> quote($_POST['diabetes_info']);
$aneurysm = $db -> quote($_POST['aneurysm']);
$bloodclot = $db -> quote($_POST['bloodclot']);
$hemophilia = $db -> quote($_POST['hemophilia']);
$anemia = $db -> quote($_POST['anemia']);
$allergies = $db -> quote($_POST['allergies']);
$allergies_info = $db -> quote($_POST['allergies_info']);
$autoimmune = $db -> quote($_POST['autoimmune']);
$autoimmuneinfo = $db -> quote($_POST['autoimmune_info']);
$concussion = $db -> quote($_POST['concussion']);
$concussioninfo = $db -> quote($_POST['concussion_info']);
$infectiousdisease = $db -> quote($_POST['infectiousdisease']);
$infectiousdiseaseinfo = $db -> quote($_POST['infectiousdisease_info']);
$therapy = $db -> quote($_POST['therapy']);
$pain = $db -> quote($_POST['pain']);
$smoker = $db -> quote($_POST['smoker']);
$alzheimer = $db -> quote($_POST['alzheimer']);
$otherconditions = $db -> quote($_POST['otherconditions']);
$prescriptionmeds = $db -> quote($_POST['prescriptionmeds']);


//Step 3
$donorconsent = $db -> quote($_POST['donorconsent']);
$researchconsent = $db -> quote($_POST['researchconsent']);
$termsagreement = $db -> quote($_POST['termsagreement']);
$signature = $db -> quote($_POST['signature']);
$reg_method = $db -> quote($_POST['reg_method']);
$barcode = $db -> quote($_POST['barcode']); //Only for drive registration



/**
 * Simple PHP age Calculator
 *
 * Calculate and returns age based on the date provided by the user.
 * @param   date of birth('Format:yyyy-mm-dd').
 * @return  age based on date of birth
 */

function ageCalculator($dob){
	if(!empty($dob)){
		$birthdate = new DateTime($dob);
		$today   = new DateTime('today');
		$age = $birthdate->diff($today)->y;
		return $age;
	} else{
		return 0;
	}
}


if (isset($_POST["dob"])) {$dob2=$_POST["dob"];}  else{$dob2= " ";}
$age = ageCalculator($dob2);

if (isset($_POST["height"])) {$height2=$_POST["height"];}  else{$height2= " ";}
if (isset($_POST["weight"])) {$weight2=$_POST["weight"];}  else{$weight2= " ";}

$bmi = 703*($weight2/pow((int)$height2,2));

/*Determine Demographic Eligibility*/
if ((strpos($registry, 'No Registry') !== false) || (strpos($registry, 'Not Sure') !== false)) || ($registry == 0){
    $registry_ind = TRUE;
} else {
	$registry_ind = FALSE;
}

if ((strpos($ethnicity, 'african') !== false) || (strpos($ethnicity, 'africanamerican') !== false)) || ((strpos($ethnicity, 'other') !== false){
    $ethnicity_ind = TRUE;
} else {
	$ethnicity_ind = FALSE;
}


if (18 <= $age && $age <=40 && 58 <= $height && 110 <= $weight && $bmi <= 40 && $hiv == 'no' && $hepatitis == 'no' && $diabetes == 'no' && $heartdisease == 'no'
&& $cirrhosis == 'no' && $tia == 'no' && $pain == 'no' && $seizure == 'no' && $hemophilia == 'no') {
	$medical_eligible = 1;
} else {
	$medical_eligible = 0;
}

if (18 <= $age && $age <= 30 && $ethnicity_ind == TRUE && $registry_ind == TRUE ) {
	$demographic_eligible = 1;
} else {
	$demographic_eligible = 0;
}

if (in_array($state,array('DC','VA','MD'))) {
	$geographic_eligible = 1;
} else {
	$geographic_eligible = 0;
}


//POST CONTACT TO INFUSIONSOT
/*PROCESS FIELDS FROM FORM INTO PHP VARIABLES*/
//PROCESSING THESE FIELDS SEPARATELY BECAUSE WE DON'T WANT THEM GOING INTO INFUSIONSOFT WITH QUOTES
if (isset($_POST["pname"])) {$inf_field_Nickname=ucfirst($_POST["pname"]);}  else{$inf_field_Nickname= " ";}
if (isset($_POST["fname"])) {$inf_field_FirstName=ucfirst($_POST["fname"]);}  else{$inf_field_FirstName= " ";}
if (isset($_POST["lname"])) {$inf_field_LastName=ucfirst($_POST["lname"]);}  else{$inf_field_LastName= " ";}
if (isset($_POST["email"])) {$inf_field_Email=$_POST["email"];}  else{$inf_field_Email= " ";}
if (isset($_POST["phone"])) {$inf_field_Phone1=$_POST["phone"];}  else{$inf_field_Phone1= " ";}
if (isset($_POST["street1"])) {$inf_field_StreetAddress1=$_POST["street1"];}  else{$inf_field_StreetAddress1= " ";}
if (isset($_POST["street2"])) {$inf_field_StreetAddress2=$_POST["street2"];}  else{$inf_field_StreetAddress2= " ";}
if (isset($_POST["city"])) {$inf_field_City=$_POST["city"];}  else{$inf_field_City= " ";}
if (isset($_POST["state"])) {$inf_field_State=$_POST["state"];}  else{$inf_field_State= " ";}
if (isset($_POST["zip"])) {$inf_field_PostalCode=$_POST["zip"];}  else{$inf_field_PostalCode= " ";}
if (isset($_POST["country"])) {$inf_field_Country=$_POST["country"];}  else{$inf_field_Country= " ";}

if (isset($_POST["dob"])) {$inf_field_Birthday=$_POST["dob"];}  else{$inf_field_Birthday= " ";}
if (isset($_POST["reg_method"])) {$inf_custom_RegistrationMethod=$_POST["reg_method"];}  else{$inf_custom_RegistrationMethod= " ";}


$inf_custom_MedicallyEligible = $medical_eligible;
$inf_custom_DemographicallyEligible = $demographic_eligible;
$inf_custom_GeographicallyEligible = $geographic_eligible;

//POST TO IN PERSON REGISTRATION URL
$inf_form_xid = '7298b0a588fc59a2e3ffcb9cd1ac56a6';
$inf_form_name = 'In Person Registration';
$infusionsoft_version = '1.59.0.51';


//create cURL connection
$curl_connection = curl_init();

//create array of data to be posted
$post_data['inf_form_xid'] = $inf_form_xid;
$post_data['inf_form_name'] = $inf_form_name;
$post_data['infusionsoft_version'] = $infusionsoft_version;
$post_data['inf_field_Nickname'] = $inf_field_Nickname;
$post_data['inf_field_FirstName'] = $inf_field_FirstName;
$post_data['inf_field_LastName'] = $inf_field_LastName;
$post_data['inf_field_Email'] = $inf_field_Email;
$post_data['inf_field_Phone1'] = $inf_field_Phone1;
$post_data['inf_field_StreetAddress1'] = $inf_field_StreetAddress1;
$post_data['inf_field_StreetAddress2'] = $inf_field_StreetAddress2;
$post_data['inf_field_City'] = $inf_field_City;
$post_data['inf_field_State'] = $inf_field_State;
$post_data['inf_field_PostalCode'] = $inf_field_PostalCode;
$post_data['inf_field_Country'] = $inf_field_Country;
$post_data['inf_custom_MedicallyEligible'] = $medical_eligible;
$post_data['inf_custom_DemographicallyEligible'] = $demographic_eligible;
$post_data['inf_custom_GeographicallyEligible'] = $geographic_eligible;
$post_data['inf_field_Birthday'] = $inf_field_Birthday;
$post_data['inf_custom_RegistrationMethod'] = $inf_custom_RegistrationMethod;

//traverse array and prepare data for posting (key1=value1)
foreach ( $post_data as $key => $value) {
    $post_items[] = $key . '=' . urlencode($value);
}

//create the final string to be posted using implode()
$post_string = implode ('&', $post_items);

//$post_string = 'inf_form_xid=f0bca68295acb856ee10f80b08271149&inf_form_name=In+Person+Registration+-+Demo&infusionsoft_version=1.59.0.39&inf_field_FirstName=Jon+Fernandez+20161120854&inf_field_Email=Jonathan.A.Fernandez%40gmail.com';

//POST TO IN PERSON REGISTRATION URL
$url = "https://px340.infusionsoft.com/app/form/process/7298b0a588fc59a2e3ffcb9cd1ac56a6";

$header[0] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8";
$header[] = "Cache-Control: max-age=0";
$header[] = "Connection: keep-alive";
$header[] = "Keep-Alive: 300";
$header[] = "Accept-Encoding: gzip, deflate, br";
$header[] = "Accept-Language: en-US,en;q=0.8";

//set options
curl_setopt($curl_connection,CURLOPT_URL, $url);
curl_setopt($curl_connection, CURLOPT_POST, true);
curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($curl_connection, CURLOPT_USERAGENT,"Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)");
curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl_connection, CURLOPT_HTTPHEADER, $header);
curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl_connection, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($curl_connection, CURLOPT_PROXY, '127.0.0.1:8888');

//set data to be posted
curl_setopt($curl_connection, CURLOPT_POSTFIELDS, $post_string);

$request_header_info = curl_getinfo($curl_connection, CURLINFO_HEADER_OUT);
print $post_string;
print $request_header_info;


//perform our request
$result = curl_exec($curl_connection);

//show information regarding the request
print_r(curl_getinfo($curl_connection));
echo curl_errno($curl_connection) . '-' .
                curl_error($curl_connection);


//END POST TO INFUSIONSOFT

/*Backfill CSV files to keep them consistent before we deprecate them*/
if (isset($_POST["altemail"])) {$altemail=$_POST["altemail"];}  else{$altemail= " ";}
if (isset($_POST["agreement1"])) {$agreement1=$_POST["agreement1"];}  else{$agreement1= " ";}
if (isset($_POST["agreement2"])) {$agreement2=$_POST["agreement2"];}  else{$agreement2= " ";}
if (isset($_POST["agreement3"])) {$agreement3=$_POST["agreement3"];}  else{$agreement3= " ";}
if (isset($_POST["agreement4"])) {$agreement4=$_POST["agreement4"];}  else{$agreement4= " ";}
if (isset($_POST["agreement5"])) {$agreement5=$_POST["agreement5"];}  else{$agreement5= " ";}
if (isset($_POST["lang"])) {$lang=$_POST["lang"];}  else{$lang= " ";}
if (isset($_POST["othercancer"])) {$othercancer=$_POST["othercancer"];}  else{$othercancer= " ";}
if (isset($_POST["othermed"])) {$othermed=$_POST["othermed"];}  else{$othermed= " ";}
if (isset($_POST["othercholesterol"])) {$othercholesterol=$_POST["othercholesterol"];}  else{$othercholesterol= " ";}
if (isset($_POST["bloodpressure"])) {$bloodpressure=$_POST["bloodpressure"];}  else{$bloodpressure= " ";}
if (isset($_POST["lupus"])) {$lupus=$_POST["lupus"];}  else{$lupus= " ";}
if (isset($_POST["psoriasis"])) {$psoriasis=$_POST["psoriasis"];}  else{$psoriasis= " ";}
if (isset($_POST["sjogrens"])) {$sjogrens=$_POST["sjogrens"];}  else{$sjogrens= " ";}
if (isset($_POST["sclerosis"])) {$sclerosis=$_POST["sclerosis"];}  else{$sclerosis= " ";}
if (isset($_POST["fibromyalgia"])) {$fibromyalgia=$_POST["fibromyalgia"];}  else{$fibromyalgia= " ";}
if (isset($_POST["addinsons"])) {$addinsons=$_POST["addinsons"];}  else{$addinsons= " ";}
if (isset($_POST["thyroid"])) {$thyroid=$_POST["thyroid"];}  else{$thyroid= " ";}
if (isset($_POST["cirrhosis"])) {$cirrhosis=$_POST["cirrhosis"];}  else{$cirrhosis= " ";}
if (isset($_POST["ankylosing"])) {$ankylosing=$_POST["ankylosing"];}  else{$ankylosing= " ";}
if (isset($_POST["hiv"])) {$hiv=$_POST["hiv"];}  else{$hiv= " ";}
if (isset($_POST["hepatitis"])) {$hepatitis=$_POST["hepatitis"];}  else{$hepatitis= " ";}
if (isset($_POST["otherallergies"])) {$otherallergies=$_POST["otherallergies"];}  else{$otherallergies= " ";}
if (isset($_POST["concussiondate"])) {$concussiondate=$_POST["concussiondate"];}  else{$concussiondate= " ";}
if (isset($_POST["followup"])) {$followup=$_POST["followup"];}  else{$followup= " ";}
if (isset($_POST["signature1"])) {$signature1=$_POST["signature1"];}  else{$signature1= " ";}
if (isset($_POST["signature2"])) {$signature2=$_POST["signature2"];}  else{$signature2= " ";}
if (isset($_POST["otherdisease"])) {$otherdisease=$_POST["otherdisease"];}  else{$otherdisease= " ";}

/*ORGANIZE FIELDS INTO A DATA ARRAY FOR CSV DUMP*/
$data_array = array (
            $fname,
			$lname,
			$email,
			$phone,
			$street1,
			$street2,
			$city,
			$state,
			$country,
			$zip,
			$altfname,
			$altlname,
			$altemail,
			$altphone,
			$altrelationship,
			$agreement1,
			$agreement2,
			$agreement3,
			$agreement4,
			$agreement5,
			$dob,
			$sex,
			$height,
			$weight,
			$lang,
			$reference,
			$ethnicity,
			$registry,
			$tia,
			$cancer,
			$othercancer,
			$therapy,
			$pain,
			$medication,
			$othermed,
			$depression,
			$autism,
			$add,
			$cholesterol,
			$othercholesterol,
			$bloodpressure,
			$infectiousdisease,
			$otherdisease,
			$heartdisease,
			$lupus,
			$psoriasis,
			$arthritis,
			$sjogrens,
			$sclerosis,
			$fibromyalgia,
			$chronicfatigue,
			$addinsons,
			$thyroid,
			$seizure,
			$kidneystones,
			$asthma,
			$cirrhosis,
			$ankylosing,
			$hiv,
			$hepatitis,
			$diabetes,
			$aneurysm,
			$bloodclot,
			$hemophilia,
			$anemia,
			$allergies,
			$otherallergies,
			$smoker,
			$alzheimer,
			$concussion,
			$concussiondate,
			$otherconditions,
			$prescriptionmeds,
			$followup,
			$researchconsent,
			$signature1,
			$donorconsent,
			$signature2,
			$age,
			$bmi,
			$reg_method,
      $pname,
      $autoimmune,
      $barcode
            );

/*CREATE HEADERS FOR CSV FILE*/
$csv = "fname,lname,email,phone,street1,street2,city,state,country,zip,altfname,altlname,altemail,altphone,altrelationship,agreement1,agreement2,agreement3,agreement4,agreement5,dob,sex,height,weight,lang,reference,ethnicity,registry,tia,cancer,othercancer,therapy,pain,medication,othermed,depression,autism,add,cholesterol,othercholesterol,bloodpressure,infectiousdisease,otherdisease,heartdisease,lupus,psoriasis,arthritis,sjogrens,sclerosis,fibromyalgia,chronicfatigue,addinsons,thyroid,seizure,kidneystones,asthma,cirrhosis,ankylosing,hiv,hepatitis,diabetes,aneurysm,bloodclot,hemophilia,anemia,allergies,otherallergies,smoker,alzheimer,concussion,concussiondate,otherconditions,prescriptionmeds,followup,researchconsent,signature1,donorconsent,signature2,age,bmi,reg_method,pname,autoimmune,barcode \n";//Column headers
//foreach ($data_array as $record){

/*ADD DATA TO $csv VARIABLE*/
    $csv.= $data_array[0] .
','.$data_array[1] .
','.$data_array[2] .
','.$data_array[3] .
','.$data_array[4] .
','.$data_array[5] .
','.$data_array[6] .
','.$data_array[7] .
','.$data_array[8] .
','.$data_array[9] .
','.$data_array[10] .
','.$data_array[11] .
','.$data_array[12] .
','.$data_array[13] .
','.$data_array[14] .
','.$data_array[15] .
','.$data_array[16] .
','.$data_array[17] .
','.$data_array[18] .
','.$data_array[19] .
','.$data_array[20] .
','.$data_array[21] .
','.$data_array[22] .
','.$data_array[23] .
','.$data_array[24] .
','.$data_array[25] .
','.$data_array[26] .
','.$data_array[27] .
','.$data_array[28] .
','.$data_array[29] .
','.$data_array[30] .
','.$data_array[31] .
','.$data_array[32] .
','.$data_array[33] .
','.$data_array[34] .
','.$data_array[35] .
','.$data_array[36] .
','.$data_array[37] .
','.$data_array[38] .
','.$data_array[39] .
','.$data_array[40] .
','.$data_array[41] .
','.$data_array[42] .
','.$data_array[43] .
','.$data_array[44] .
','.$data_array[45] .
','.$data_array[46] .
','.$data_array[47] .
','.$data_array[48] .
','.$data_array[49] .
','.$data_array[50] .
','.$data_array[51] .
','.$data_array[52] .
','.$data_array[53] .
','.$data_array[54] .
','.$data_array[55] .
','.$data_array[56] .
','.$data_array[57] .
','.$data_array[58] .
','.$data_array[59] .
','.$data_array[60] .
','.$data_array[61] .
','.$data_array[62] .
','.$data_array[63] .
','.$data_array[64] .
','.$data_array[65] .
','.$data_array[66] .
','.$data_array[67] .
','.$data_array[68] .
','.$data_array[69] .
','.$data_array[70] .
','.$data_array[71] .
','.$data_array[72] .
','.$data_array[73] .
','.$data_array[74] .
','.$data_array[75] .
','.$data_array[76] .
','.$data_array[77] .
','.$data_array[78] .
','.$data_array[79] .
','.$data_array[80] .
','.$data_array[81] .
','.$data_array[82] .
','.$data_array[83] .
	"\n";
//Append data to csv
//    }

/*CREATE CSV HANDLER OBJECT WITH FOPEN - USE time() TO MAKE EACH FILE UNIQUE*/
//$csv_handler = fopen ("csvfile".time().".csv",'w');


/*CREATE CSV HANDLER OBJECT WITH FOPEN - USE time() TO MAKE EACH FILE UNIQUE*/
$csv_handler = fopen ("/var/www/html/drive/csvfile".time().".csv",'w');

/*WRITE DATA TO CSV FILE AND CLOSE THE FILE*/
fwrite ($csv_handler,$csv);
fclose ($csv_handler);


/*WRITE DATA TO CSV FILE AND CLOSE THE FILE*/
//fwrite ($csv_handler,$csv);
//fclose ($csv_handler);

/*BEGIN TRANSFERING DATA TO SIMPLYCAST API*/
/*API DOCUMENTATION CAN BE FOUND HERE: https://app.simplycast.com/?q=api/reference*/


$curl = curl_init();

$public = 'c2c64e977da4aff112bda378d76ce39265c65f96';
$secret = '8081b7551046b5e027363d223076000fad403760';

//When using SSL/TLS, you can simply pass your credentials as
//{public key}:{secret key}, rather than creating a signature (though you
//can still create a signature if you desire the additional security).
$authString = base64_encode("$public:$secret");

$name = $fname . ' ' . $lname;


if ($reg_method == "drive"){
	$list_num = 44;
	$api_url = 'https://api.simplycast.com/crossmarketer/18047/inbound/930 HTTP/1.1';
}
else {
	$list_num = 20;
	$api_url = 'https://api.simplycast.com/crossmarketer/12853/inbound/881 HTTP/1.1';
}

if (isset($_POST["email"])) {$email2=$_POST["email"];}  else{$email2= " ";}
if (isset($_POST["phone"])) {$phone2=$_POST["phone"];}  else{$phone2= " ";}

$fields = array(
   'contact' => array(
		'fields' => array (
			0 => array(
			 'id' => '1',
			 'value' => $name,
			),
			1 => array(
			 'id' => '23',
			 'value' => $email2,
			),
			2 => array(
			 'id' => '47',
			 'value' => $phone2,
			),
			3 => array(
			 'id' => '55',
			 'value' => $phone2,
			),
			4 => array(
			 'id' => '5',
			 'value' => $street1,
			),
			5 => array(
			 'id' => '6',
			 'value' => $street2,
			),
			6 => array(
			 'id' => '8',
			 'value' => $city,
			),
			7 => array(
			 'id' => '9',
			 'value' => $state,
			),
			8 => array(
			 'id' => '10',
			 'value' => $zip,
			),
			9 => array(
			 'id' => '7',
			 'value' => $country,
			),
			10 => array(
			 'id' => '101',
			 'value' => $phone2,
			),
			11 => array(
			 'id' => '115',
			 'value' => $medical_eligible,
			),
			12 => array(
			 'id' => '116',
			 'value' => $demographic_eligible,
			),
			13 => array(
			 'id' => '118',
			 'value' => $geographic_eligible,
			),
			14 => array(
			 'id' => '139',
			 'value' => $medical_eligible,
			),
			15 => array(
			 'id' => '143',
			 'value' => $demographic_eligible,
			),
			16 => array(
			 'id' => '140',
			 'value' => $geographic_eligible,
			),
		),
  		'lists' => array(
			0 => $list_num,
			),
  ),

);

$postvars = json_encode($fields);

//Build the request headers.
$headers = array(
  "Host: api.simplycast.com",
  "Connection: close",
  "Accept: application/json",
  "Authorization: Basic $authString",
   "Content-Type: application/json",
  "Content-Length: " . strlen($postvars)
);

curl_setopt($curl, CURLOPT_URL, 'https://api.simplycast.com/contactmanager/contacts HTTP/1.1');
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl,CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_PORT, 443);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

//SET GET or POST
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $postvars);

$result = curl_exec($curl);

curl_close($curl);

$json = json_decode($result);
$registrant_id = $json->contact->id;



$size = $json->contact->lists->{$list_num}->size;

//NOW THAT WE KNOW THE REGISTRANT ID, PASS IT TO THE Push a Contact or List to a 360 Inbound API Connection ElementEndpoint: POST crossmarketer/{project id}/inbound/{connection id} METHOD
$fields2 = array(
'row' =>
	array(
     'list' => $list_num,
     'row' => $registrant_id,
	),
);

$postvars2 = json_encode($fields2);

$curl2 = curl_init();

$headers2 = array(
  "Host: api.simplycast.com",
  "Connection: close",
  "Accept: application/json",
  "Authorization: Basic $authString",
   "Content-Type: application/json",
  "Content-Length: " . strlen($postvars2)
);

curl_setopt($curl2, CURLOPT_URL, $api_url);
curl_setopt($curl2, CURLOPT_HTTPHEADER, $headers2);
curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl2,CURLOPT_HEADER, false);
curl_setopt($curl2, CURLOPT_PORT, 443);
curl_setopt($curl2, CURLOPT_SSL_VERIFYPEER, false);

//SET GET or POST
curl_setopt($curl2, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl2, CURLOPT_POST, 1);
curl_setopt($curl2, CURLOPT_POSTFIELDS, $postvars2);

$result = curl_exec($curl2);
curl_close($curl2);

//    if($result === false)
//    {
//        echo "Error Number:".curl_errno($curl)."<br>";
//        echo "Error String:".curl_error($curl);
//    }



/**
 * Insert the values into the database
 */

//donor_contact table
$result = $db -> query("INSERT INTO `donor_contact` (
			`donor_first_name`,
			`donor_last_name`,
			`donor_preferred_name`,
			`donor_email`,
			`donor_phone`,
			`donor_address1`,
			`donor_address2`,
			`donor_city`,
			`donor_state`,
			`donor_country`,
			`donor_zipcode`,
			`kit_id`
			)
		VALUES (" . $fname . ",
				" . $lname . ",
				" . $pname . ",
				" . $email . ",
				" . $phone . ",
				" . $street1 . ",
				" . $street2 . ",
				" . $city . ",
				" . $state . ",
				" . $country . ",
				" . $zip . ",
				" . $barcode . "
			)");
if($result)
{
//	echo "donor_contact table successfully inserted, ";
	$last_id = $db -> finder();
}
else
{
//	echo "Error: Insert to donor_contact table, ";
//	echo $db->error();
}

//alternate_contact table
$result = $db -> query("INSERT INTO `alternate_contact` (
			`alt_first_name`,
			`alt_last_name`,
			`alt_phone`,
			`alt_relationship`,
			`donor_contact_donor_id`
			)
		VALUES (" . $altfname . ",
				" . $altlname . ",
				" . $altphone . ",
				" . $altrelationship . ",
				" . $last_id . "
			)");


if($result)
{
//	echo "alternate_contact table successfully inserted, ";
}
else
{
//	echo "Error: Insert to alternate_contact table, ";
//	echo $db->error();
}

//donor_info table
//need to add other ethnicity, ethnicity only insert one value
$result = $db -> query("INSERT INTO `donor_info` (
			`donor_contact_donor_id`,
			`donor_dob`,
			`donor_age`,
			`donor_sex`,
			`donor_height`,
			`donor_weight`,
			`donor_bmi`,
			`donor_ethnicity`,
			`donor_reference`,
			`donor_registry`,
			`donor_registry_info`,
			`donor_registration_method`
			)
		VALUES (" . $last_id . ",
				" . $dob . ",
				" . $age . ",
				" . $sex . ",
				" . $height . ",
				" . $weight . ",
				" . $bmi . ",
				" . $ethnicity . ",
				" . $reference . ",
				" . $registry . ",
				" . $registryinfo . ",
				" . $reg_method . "
			)");

if($result)
{
//	echo "donor_info table successfully inserted, ";
}
else
{
//	echo "Error: Insert to donor_info table, ";
//	echo $db->error();
}

//health_info table
$result = $db -> query("INSERT INTO `health_info` (
			`donor_contact_donor_id`,
			`tia`,
			`cancer`,
			`cancer_info`,
			`therapy`,
			`pain`,
			`prescription_painmeds`,
			`depression`,
			`autism`,
			`add`,
			`cholesterol`,
			`infectious_disease`,
			`infectious_disease_info`,
			`heart_disease`,
			`heart_disease_info`,
			`arthritis`,
			`chronic_fatigue`,
			`seizure`,
			`seizure_info`,
			`kidneystones`,
			`asthma`,
			`diabetes`,
			`diabetes_info`,
			`aneurysm`,
			`bloodclot`,
			`hemophilia`,
			`anemia`,
			`allergies`,
			`allergies_info`,
			`smoker`,
			`alzheimer`,
			`concussion`,
			`concussion_date`,
			`autoimmune`,
			`autoimmune_info`,
			`other_conditions`,
			`prescription_meds`
			)
		VALUES (" . $last_id . ",
				" . $tia . ",
				" . $cancer . ",
				" . $cancerinfo . ",
				" . $therapy . ",
				" . $pain . ",
				" . $medication . ",
				" . $depression . ",
				" . $autism . ",
				" . $add . ",
				" . $cholesterol . ",
				" . $infectiousdisease . ",
				" . $infectiousdiseaseinfo . ",
				" . $heartdisease . ",
				" . $heartdiseaseinfo . ",
				" . $arthritis . ",
				" . $chronicfatigue . ",
				" . $seizure . ",
				" . $seizureinfo . ",
				" . $kidneystones . ",
				" . $asthma . ",
				" . $diabetes . ",
				" . $diabetesinfo . ",
				" . $aneurysm . ",
				" . $bloodclot . ",
				" . $hemophilia . ",
				" . $anemia . ",
				" . $allergies . ",
				" . $allergies_info . ",
				" . $smoker . ",
				" . $alzheimer . ",
				" . $concussion . ",
				" . $concussioninfo . ",
				" . $autoimmune . ",
				" . $autoimmuneinfo . ",
				" . $otherconditions . ",
				" . $prescriptionmeds . "
			)");

if($result)
{
//	echo "health_info table successfully inserted, ";
}
else
{
//	echo "Error: Insert to health_info table, ";
//	echo $db->error();
}

//donor_agreements table
$result = $db -> query("INSERT INTO `donor_agreements` (
			`donor_contact_donor_id`,
			`privacy_agreement`,
			`research_consent`,
			`signature`,
			`donor_consent`
			)
		VALUES (" . $last_id . ",
				" . $termsagreement . ",
				" . $researchconsent . ",
				" . $signature . ",
				" . $donorconsent . "
			)");

if($result)
{
//	echo "donor_agreements table successfully inserted, ";
}
else
{
//	echo "Error: Insert to donor_agreements table, ";
//	echo $db->error();
}

?>

<!-- WHEN PROCESSING IS COMPLETE TRANSFER REGISTRANTS TO THE THANK YOU PAGE -->
<script type="text/javascript">
 window.location = "http://www.hemeos.com/thanks.html";
</script>

</body>
</html>

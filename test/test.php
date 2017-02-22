
<?php

//Initial Error Checking
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
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
	if ((strpos($registry, 'No Registry') !== false) || (strpos($registry, 'Not Sure') !== false) || ($registry == 0)){
		$registry_ind = TRUE;
	} else {
		$registry_ind = FALSE;
	}

	if ((strpos($ethnicity, 'african') !== false) || (strpos($ethnicity, 'africanamerican') !== false) || (strpos($ethnicity, 'other') !== false)){
		$ethnicity_ind = TRUE;
	} else {
		$ethnicity_ind = FALSE;
	}


	if (18 <= $age && $age <=40 && 58 <= $height && 110 <= $weight && $bmi <= 40 && $infectiousdisease == 0 && $diabetes == 0 && $heartdisease == 0
	&& $tia == 0 && $pain == 0 && $seizure == 0 && $hemophilia == 0) {
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

	/**
	 * Infusionsoft
	 *
	 * Post donor information to Infusionsoft API
	 */

	require_once '../vendor/autoload.php';

	$infusionsoft = new Infusionsoft\Infusionsoft(array(
			'clientId'     => 'nwkq7y5mzjbr2cgwkj4ub6uy',
			'clientSecret' => '9qGdApUCU5',
			'redirectUri'  => 'https://register.hemeos.com/test/',
	));

	// Retrieve serialized token from database
	$search = $db -> select("SELECT `token` FROM `infusionsoft_token` WHERE `id_infusionsoft_token` = '1'");
	$token = $search[0]['token'];

	$infusionsoft->setToken(unserialize( base64_decode($token)));
	//var_dump($infusionsoft);

	$contact = array(
			'FirstName' => 		$_POST['fname'],
			'Nickname' => 		$_POST['pname'],
			'LastName' => 		$_POST['lname'],
			'Email' => 			$_POST['email'],
			'Phone1' => 		$_POST['phone'],
			'StreetAddress1' => $_POST['street1'],
			'StreetAddress2' => $_POST['street2'],
			'City' => 			$_POST['city'],
			'State' => 			$_POST['state'],
			'PostalCode' => 	$_POST['zip'],
			'Country' => 		$_POST['country'],
			'Birthday' => 		$_POST['dob'],
			'_RegistrationMethod' => $_POST['reg_method'],
			'_MedicallyEligible' => 		$medical_eligible,
			'_DemographicallyEligible' => 	$demographic_eligible,
			'_GeographicallyEligible' => 	$geographic_eligible
	);

	$tagId= 158;
	$dupCheckType= 'EmailAndName';

	$returnID= $infusionsoft->contacts()-> addWithDupCheck($contact, $dupCheckType);
	$infusionsoft->contacts()->addToGroup($returnID, $tagId);


	/**
	 * Insert the values into the database
	 */
/*
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
				`donor_zipcode`
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
					" . $zip . "
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
			`infectiousdisease_info`,
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

	//donor_eligibility table
	$result = $db -> query("INSERT INTO `donor_eligibility` (
			`donor_contact_donor_id`,
			`med_eligible`,
			`geo_eligible`,
			`dem_eligible`
			)
		VALUES (" . $last_id . ",
				" . $medical_eligible . ",
				" . $geographic_eligible . ",
				" . $demographic_eligible . "
			)");

	if($result)
		{
		//	echo "donor_eligibility table successfully inserted, ";
		}
	else
		{
		//	echo "Error: Insert to donor_eligibility table, ";
		//	echo $db->error();
		}
*/

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
			$autoimmune
	);

	/*CREATE HEADERS FOR CSV FILE*/
	$csv = "fname,lname,email,phone,street1,street2,city,state,country,zip,altfname,altlname,altemail,altphone,altrelationship,agreement1,agreement2,agreement3,agreement4,agreement5,dob,sex,height,weight,lang,reference,ethnicity,registry,tia,cancer,othercancer,therapy,pain,medication,othermed,depression,autism,add,cholesterol,othercholesterol,bloodpressure,infectiousdisease,otherdisease,heartdisease,lupus,psoriasis,arthritis,sjogrens,sclerosis,fibromyalgia,chronicfatigue,addinsons,thyroid,seizure,kidneystones,asthma,cirrhosis,ankylosing,hiv,hepatitis,diabetes,aneurysm,bloodclot,hemophilia,anemia,allergies,otherallergies,smoker,alzheimer,concussion,concussiondate,otherconditions,prescriptionmeds,followup,researchconsent,signature1,donorconsent,signature2,age,bmi,reg_method,pname,autoimmune \n";//Column headers
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
	"\n";
	//Append data to csv
	//    }


	/*CREATE CSV HANDLER OBJECT WITH FOPEN - USE time() TO MAKE EACH FILE UNIQUE*/
	$csv_handler = fopen ("/var/www/html/test/csvfile".time().".csv",'w');

	/*WRITE DATA TO CSV FILE AND CLOSE THE FILE*/
	fwrite ($csv_handler,$csv);
	fclose ($csv_handler);

	//CSV END
?>

<!-- WHEN PROCESSING IS COMPLETE TRANSFER REGISTRANTS TO THE THANK YOU PAGE -->
<script type="text/javascript">
  window.location = "http://www.hemeos.com/thanks.html";
</script>

</body>
</html>

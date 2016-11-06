
<?php

//Initial Error Checking 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
          echo 'Connected to Hemeos Database, ';
        }

        // If connection was not successful, handle the error
        if(self::$connection === false) {
            // Handle error 
            echo 'This Connection Failed, ';
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
             echo 'Failed to retrieve rows from database';
        }
        echo 'here';
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
//Step 1
$fname = $db -> quote($_POST['fname']);
$lname = $db -> quote($_POST['lname']);
$pname = $db -> quote($_POST['pname']);
$email = $db -> quote($_POST['email']);
$phone = $db -> quote($_POST['phone']);
$street1 = $db -> quote($_POST['street1']);
$street2 = $db -> quote($_POST['street2']);
$city = $db -> quote($_POST['city']);
$state = $db -> quote($_POST['state']);
$country = $db -> quote($_POST['country']);
$zip = $db -> quote($_POST['zip']);
$altfname = $db -> quote($_POST['altfname']);
$altlname = $db -> quote($_POST['altlname']);
$altemail = $db -> quote($_POST['altemail']);
$altphone = $db -> quote($_POST['altphone']);
$altrelationship = $db -> quote($_POST['altrelationship']);

//Step 2
$dob = $db -> quote($_POST['dob']);
$sex = $db -> quote($_POST['sex']);
$height = $db -> quote($_POST['height']);
$weight = $db -> quote($_POST['weight']);
$lang = $db -> quote($_POST['lang']);
$reference = $db -> quote($_POST['reference']);
$ethnicity = $db -> quote($_POST['ethnicity']);
$ethnicity_other = $db -> quote($_POST['ethnicity_other']);
$registry = $db -> quote($_POST['registry']);

//Step 3
$tia = $db -> quote($_POST['tia']);
$cancer = $db -> quote($_POST['cancer']);
$othercancer = $db -> quote($_POST['othercancer']);
$therapy = $db -> quote($_POST['therapy']);
$pain = $db -> quote($_POST['pain']);
$medication = $db -> quote($_POST['medication']);
$othermed = $db -> quote($_POST['othermed']);
$depression = $db -> quote($_POST['depression']);
$autism = $db -> quote($_POST['autism']);
$add = $db -> quote($_POST['add']);
$cholesterol = $db -> quote($_POST['cholesterol']);
$othercholesterol = $db -> quote($_POST['othercholesterol']);
$bloodpressure = $db -> quote($_POST['bloodpressure']);
$infectiousdisease = $db -> quote($_POST['infectiousdisease']);
$otherdisease = $db -> quote($_POST['otherdisease']);
$heartdisease = $db -> quote($_POST['heartdisease']);
$lupus = $db -> quote($_POST['lupus']);
$psoriasis = $db -> quote($_POST['psoriasis']);
$arthritis = $db -> quote($_POST['arthritis']);
$sjogrens = $db -> quote($_POST['sjogrens']);
$sclerosis = $db -> quote($_POST['sclerosis']);
$fibromyalgia = $db -> quote($_POST['fibromyalgia']);
$chronicfatigue = $db -> quote($_POST['chronicfatigue']);
$addinsons = $db -> quote($_POST['addinsons']);
$thyroid = $db -> quote($_POST['thyroid']);
$seizure = $db -> quote($_POST['seizure']);
$kidneystones = $db -> quote($_POST['kidneystones']);
$asthma = $db -> quote($_POST['asthma']);
$cirrhosis = $db -> quote($_POST['cirrhosis']);
$ankylosing = $db -> quote($_POST['ankylosing']);
$hiv = $db -> quote($_POST['hiv']);
$hepatitis = $db -> quote($_POST['hepatitis']);
$diabetes = $db -> quote($_POST['diabetes']);
$aneurysm = $db -> quote($_POST['aneurysm']);
$bloodclot = $db -> quote($_POST['bloodclot']);
$hemophilia = $db -> quote($_POST['hemophilia']);
$anemia = $db -> quote($_POST['anemia']);
$allergies = $db -> quote($_POST['allergies']);
$otherallergies = $db -> quote($_POST['otherallergies']);
$smoker = $db -> quote($_POST['smoker']);
$alzheimer = $db -> quote($_POST['alzheimer']);
$concussion = $db -> quote($_POST['concussion']);
$concussiondate = $db -> quote($_POST['concussiondate']);
$otherconditions = $db -> quote($_POST['otherconditions']);
$prescriptionmeds = $db -> quote($_POST['prescriptionmeds']);
$followup = $db -> quote($_POST['followup']);

//Step 4 and 5
$researchconsent = $db -> quote($_POST['researchconsent']);
$signature1 = $db -> quote($_POST['signature1']);
$donorconsent = $db -> quote($_POST['donorconsent']);
$agreement1 = $db -> quote($_POST['agreement1']);
$signature2 = $db -> quote($_POST['signature2']);
$reg_method = $db -> quote($_POST['reg_method']);

//Additional variable metrics
//$age = floor((time() - strtotime($dob)) / 31556926);
//$bmi = 703*($weight/pow($height,2));
$age = 30;
$bmi = 100;

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
	echo "donor_contact table successfully inserted, ";
	$last_id = $db -> finder();
}
else
{
	echo "Error: Insert to donor_contact table, ";
	echo $db->error();
}


//alternate_contact table
$result = $db -> query("INSERT INTO `alternate_contact` (
			`alt_first_name`,
			`alt_last_name`,
			`alt_email`,
			`alt_phone`,
			`alt_relationship`,
			`donor_contact_donor_id`
			)
		VALUES (" . $altfname . ",
				" . $altlname . ",
				" . $altemail . ",
				" . $altphone . ",
				" . $altrelationship . ",
				" . $last_id . "
			)");


if($result)
{
	echo "alternate_contact table successfully inserted, ";
}
else
{
	echo "Error: Insert to alternate_contact table, ";
	echo $db->error();
}

//donor_info table
//need to add other ethnicity, ethnicity and registry only insert one value
$result = $db -> query("INSERT INTO `donor_info` (
			`donor_contact_donor_id`,
			`donor_dob`,
			`donor_age`,
			`donor_sex`,
			`donor_height`,
			`donor_weight`,
			`donor_bmi`,
			`donor_language`,
			`donor_ethnicity`,
			`donor_reference`,
			`donor_registry`,
			`donor_registration_method`
			)
		VALUES (" . $last_id . ",
				" . $dob . ",
				" . $age . ",
				" . $sex . ",
				" . $height . ",
				" . $weight . ",
				" . $bmi . ",
				" . $lang . ",
				" . $ethnicity . ",
				" . $reference . ",
				" . $registry . ",
				" . $reg_method . "		
			)");

if($result)
{
	echo "donor_info table successfully inserted, ";
}
else
{
	echo "Error: Insert to donor_info table, ";
	echo $db->error();
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
			`pain_prescriptions`,
			`depression`,
			`autism`,
			`add`,
			`cholesterol`,
			`cholestrol_meds`,
			`bloodpressure`,
			`infectious_disease`,
			`infectious_disease_info`,
			`heart_disease`,
			`lupus`,
			`psoriasis`,
			`arthritis`,
			`sjogrens`,
			`sclerosis`,
			`fibromyalgia`,
			`chronic_fatigue`,
			`addinsons`,
			`thyroid`,
			`seizure`,
			`kidneystones`,
			`asthma`,
			`cirrhosis`,
			`ankylosing`,
			`hiv`,
			`hepatitis`,
			`diabetes`,
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
			`other_conditions`,
			`prescription_meds`
			)
		VALUES (" . $last_id . ",
				" . $tia . ",
				" . $cancer . ",
				" . $othercancer . ",
				" . $therapy . ",
				" . $pain . ",
				" . $medication . ",
				" . $othermed . ",
				" . $depression . ",
				" . $autism . ",
				" . $add . ",
				" . $cholesterol . ",
				" . $othercholesterol . ",
				" . $bloodpressure . ",
				" . $infectiousdisease . ",
				" . $otherdisease . ",
				" . $heartdisease . ",
				" . $lupus . ",
				" . $psoriasis . ",
				" . $arthritis . ",
				" . $sjogrens . ",
				" . $sclerosis . ",
				" . $fibromyalgia . ",
				" . $chronicfatigue . ",
				" . $addinsons . ",
				" . $thyroid . ",
				" . $seizure . ",
				" . $kidneystones . ",
				" . $asthma . ",
				" . $cirrhosis . ",
				" . $ankylosing . ",
				" . $hiv . ",
				" . $hepatitis . ",
				" . $diabetes . ",
				" . $aneurysm . ",
				" . $bloodclot . ",
				" . $hemophilia . ",
				" . $anemia . ",
				" . $allergies . ",
				" . $otherallergies . ",
				" . $smoker . ",
				" . $alzheimer . ",
				" . $concussion . ",
				" . $concussiondate . ",
				" . $otherconditions . ",
				" . $prescriptionmeds . "
			)");

if($result)
{
	echo "health_info table successfully inserted, ";
}
else
{
	echo "Error: Insert to health_info table, ";
	echo $db->error();
}

//donor_agreements table
$result = $db -> query("INSERT INTO `donor_agreements` (
			`donor_contact_donor_id`,
			`privacy_agreement`,
			`followup_agreement`,
			`research_consent`,
			`research_consent_signature`,
			`donor_consent`,
			`donor_consent_signature`
			)
		VALUES (" . $last_id . ",
				" . $agreement1 . ",
				" . $followup . ",
				" . $researchconsent . ",
				" . $signature1 . ",
				" . $donorconsent . ",
				" . $signature2 . "
			)");

if($result)
{
	echo "donor_agreements table successfully inserted, ";
}
else
{
	echo "Error: Insert to donor_agreements table, ";
	echo $db->error();
}

?>
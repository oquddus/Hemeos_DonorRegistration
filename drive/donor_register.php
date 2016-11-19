
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

//Additional variable metrics
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
	echo "alternate_contact table successfully inserted, ";
}
else
{
	echo "Error: Insert to alternate_contact table, ";
	echo $db->error();
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
	echo "donor_agreements table successfully inserted, ";
}
else
{
	echo "Error: Insert to donor_agreements table, ";
	echo $db->error();
}

?>
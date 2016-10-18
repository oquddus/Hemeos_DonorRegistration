<html>
<body>

<!--- PLAY SOME TYPE OF "PROCESSING ANIMATION" HERE -->

<!--- START - DELETE THIS OUT WHEN READY FOR DEPLOYMENT -->

<!--- END - DELETE THIS OUT WHEN READY FOR DEPLOYMENT -->

<!--- START PHP CODE TO PROCESS REGISTRANT -->
<?php


//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

//echo exec('whoami');

/*NOTE: THE EXCEL FILE THAT PRODUCED ALL THIS CODE IS AT: Box Sync\Hemeos\Information Technology\WebRegistrationDataTool.xlsb
to make quick changes, go back to that file and reproduce the code for the CSV dump*/
/*PROCESS FIELDS FROM FORM INTO PHP VARIABLES*/
if (isset($_POST["fname"])) {$fname=$_POST["fname"];}  else{$fname= " ";}
if (isset($_POST["lname"])) {$lname=$_POST["lname"];}  else{$lname= " ";}
if (isset($_POST["email"])) {$email=$_POST["email"];}  else{$email= " ";}
if (isset($_POST["phone"])) {$phone=$_POST["phone"];}  else{$phone= " ";}
if (isset($_POST["street1"])) {$street1=$_POST["street1"];}  else{$street1= " ";}
if (isset($_POST["street2"])) {$street2=$_POST["street2"];}  else{$street2= " ";}
if (isset($_POST["city"])) {$city=$_POST["city"];}  else{$city= " ";}
if (isset($_POST["state"])) {$state=$_POST["state"];}  else{$state= " ";}
if (isset($_POST["country"])) {$country=$_POST["country"];}  else{$country= " ";}
if (isset($_POST["zip"])) {$zip=$_POST["zip"];}  else{$zip= " ";}
if (isset($_POST["altfname"])) {$altfname=$_POST["altfname"];}  else{$altfname= " ";}
if (isset($_POST["altlname"])) {$altlname=$_POST["altlname"];}  else{$altlname= " ";}
if (isset($_POST["altemail"])) {$altemail=$_POST["altemail"];}  else{$altemail= " ";}
if (isset($_POST["altphone"])) {$altphone=$_POST["altphone"];}  else{$altphone= " ";}
if (isset($_POST["altrelationship"])) {$altrelationship=$_POST["altrelationship"];}  else{$altrelationship= " ";}
if (isset($_POST["agreement1"])) {$agreement1=$_POST["agreement1"];}  else{$agreement1= " ";}
if (isset($_POST["agreement2"])) {$agreement2=$_POST["agreement2"];}  else{$agreement2= " ";}
if (isset($_POST["agreement3"])) {$agreement3=$_POST["agreement3"];}  else{$agreement3= " ";}
if (isset($_POST["agreement4"])) {$agreement4=$_POST["agreement4"];}  else{$agreement4= " ";}
if (isset($_POST["agreement5"])) {$agreement5=$_POST["agreement5"];}  else{$agreement5= " ";}
if (isset($_POST["dob"])) {$dob=$_POST["dob"];}  else{$dob= " ";}
if (isset($_POST["sex"])) {$sex=$_POST["sex"];}  else{$sex= " ";}
if (isset($_POST["height"])) {$height=$_POST["height"];}  else{$height= " ";}
if (isset($_POST["weight"])) {$weight=$_POST["weight"];}  else{$weight= " ";}
if (isset($_POST["lang"])) {$lang=$_POST["lang"];}  else{$lang= " ";}
if (isset($_POST["reference"])) {$reference=$_POST["reference"];}  else{$reference= " ";}
if (isset($_POST["ethnicity"])) {$ethnicity=$_POST["ethnicity"];}  else{$ethnicity= " ";}
if (isset($_POST["registry"])) {$registry=$_POST["registry"];}  else{$registry= " ";}
if (isset($_POST["tia"])) {$tia=$_POST["tia"];}  else{$tia= " ";}
if (isset($_POST["cancer"])) {$cancer=$_POST["cancer"];}  else{$cancer= " ";}
if (isset($_POST["othercancer"])) {$othercancer=$_POST["othercancer"];}  else{$othercancer= " ";}
if (isset($_POST["therapy"])) {$therapy=$_POST["therapy"];}  else{$therapy= " ";}
if (isset($_POST["pain"])) {$pain=$_POST["pain"];}  else{$pain= " ";}
if (isset($_POST["medication"])) {$medication=$_POST["medication"];}  else{$medication= " ";}
if (isset($_POST["othermed"])) {$othermed=$_POST["othermed"];}  else{$othermed= " ";}
if (isset($_POST["depression"])) {$depression=$_POST["depression"];}  else{$depression= " ";}
if (isset($_POST["autism"])) {$autism=$_POST["autism"];}  else{$autism= " ";}
if (isset($_POST["add"])) {$add=$_POST["add"];}  else{$add= " ";}
if (isset($_POST["cholesterol"])) {$cholesterol=$_POST["cholesterol"];}  else{$cholesterol= " ";}
if (isset($_POST["othercholesterol"])) {$othercholesterol=$_POST["othercholesterol"];}  else{$othercholesterol= " ";}
if (isset($_POST["bloodpressure"])) {$bloodpressure=$_POST["bloodpressure"];}  else{$bloodpressure= " ";}
if (isset($_POST["infectiousdisease"])) {$infectiousdisease=$_POST["infectiousdisease"];}  else{$infectiousdisease= " ";}
if (isset($_POST["otherdisease"])) {$otherdisease=$_POST["otherdisease"];}  else{$otherdisease= " ";}
if (isset($_POST["heartdisease"])) {$heartdisease=$_POST["heartdisease"];}  else{$heartdisease= " ";}
if (isset($_POST["lupus"])) {$lupus=$_POST["lupus"];}  else{$lupus= " ";}
if (isset($_POST["psoriasis"])) {$psoriasis=$_POST["psoriasis"];}  else{$psoriasis= " ";}
if (isset($_POST["arthritis"])) {$arthritis=$_POST["arthritis"];}  else{$arthritis= " ";}
if (isset($_POST["sjogrens"])) {$sjogrens=$_POST["sjogrens"];}  else{$sjogrens= " ";}
if (isset($_POST["sclerosis"])) {$sclerosis=$_POST["sclerosis"];}  else{$sclerosis= " ";}
if (isset($_POST["fibromyalgia"])) {$fibromyalgia=$_POST["fibromyalgia"];}  else{$fibromyalgia= " ";}
if (isset($_POST["chronicfatigue"])) {$chronicfatigue=$_POST["chronicfatigue"];}  else{$chronicfatigue= " ";}
if (isset($_POST["addinsons"])) {$addinsons=$_POST["addinsons"];}  else{$addinsons= " ";}
if (isset($_POST["thyroid"])) {$thyroid=$_POST["thyroid"];}  else{$thyroid= " ";}
if (isset($_POST["seizure"])) {$seizure=$_POST["seizure"];}  else{$seizure= " ";}
if (isset($_POST["kidneystones"])) {$kidneystones=$_POST["kidneystones"];}  else{$kidneystones= " ";}
if (isset($_POST["asthma"])) {$asthma=$_POST["asthma"];}  else{$asthma= " ";}
if (isset($_POST["cirrhosis"])) {$cirrhosis=$_POST["cirrhosis"];}  else{$cirrhosis= " ";}
if (isset($_POST["ankylosing"])) {$ankylosing=$_POST["ankylosing"];}  else{$ankylosing= " ";}
if (isset($_POST["hiv"])) {$hiv=$_POST["hiv"];}  else{$hiv= " ";}
if (isset($_POST["hepatitis"])) {$hepatitis=$_POST["hepatitis"];}  else{$hepatitis= " ";}
if (isset($_POST["diabetes"])) {$diabetes=$_POST["diabetes"];}  else{$diabetes= " ";}
if (isset($_POST["aneurysm"])) {$aneurysm=$_POST["aneurysm"];}  else{$aneurysm= " ";}
if (isset($_POST["bloodclot"])) {$bloodclot=$_POST["bloodclot"];}  else{$bloodclot= " ";}
if (isset($_POST["hemophilia"])) {$hemophilia=$_POST["hemophilia"];}  else{$hemophilia= " ";}
if (isset($_POST["anemia"])) {$anemia=$_POST["anemia"];}  else{$anemia= " ";}
if (isset($_POST["allergies"])) {$allergies=$_POST["allergies"];}  else{$allergies= " ";}
if (isset($_POST["otherallergies"])) {$otherallergies=$_POST["otherallergies"];}  else{$otherallergies= " ";}
if (isset($_POST["smoker"])) {$smoker=$_POST["smoker"];}  else{$smoker= " ";}
if (isset($_POST["alzheimer"])) {$alzheimer=$_POST["alzheimer"];}  else{$alzheimer= " ";}
if (isset($_POST["concussion"])) {$concussion=$_POST["concussion"];}  else{$concussion= " ";}
if (isset($_POST["concussiondate"])) {$concussiondate=$_POST["concussiondate"];}  else{$concussiondate= " ";}
if (isset($_POST["otherconditions"])) {$otherconditions=$_POST["otherconditions"];}  else{$otherconditions= " ";}
if (isset($_POST["prescriptionmeds"])) {$prescriptionmeds=$_POST["prescriptionmeds"];}  else{$prescriptionmeds= " ";}
if (isset($_POST["followup"])) {$followup=$_POST["followup"];}  else{$followup= " ";}
if (isset($_POST["researchconsent"])) {$researchconsent=$_POST["researchconsent"];}  else{$researchconsent= " ";}
if (isset($_POST["signature1"])) {$signature1=$_POST["signature1"];}  else{$signature1= " ";}
if (isset($_POST["donorconsent"])) {$donorconsent=$_POST["donorconsent"];}  else{$donorconsent= " ";}
if (isset($_POST["signature2"])) {$signature2=$_POST["signature2"];}  else{$signature2= " ";}
if (isset($_POST["reg_method"])) {$reg_method=$_POST["reg_method"];}  else{$reg_method= " ";}


$age = floor((time() - strtotime($dob)) / 31556926);
$bmi = 703*($weight/pow($height,2));

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
			$reg_method
            );

/*CREATE HEADERS FOR CSV FILE*/
$csv = "fname,lname,email,phone,street1,street2,city,state,country,zip,altfname,altlname,altemail,altphone,altrelationship,agreement1,agreement2,agreement3,agreement4,agreement5,dob,sex,height,weight,lang,reference,ethnicity,registry,tia,cancer,othercancer,therapy,pain,medication,othermed,depression,autism,add,cholesterol,othercholesterol,bloodpressure,infectiousdisease,otherdisease,heartdisease,lupus,psoriasis,arthritis,sjogrens,sclerosis,fibromyalgia,chronicfatigue,addinsons,thyroid,seizure,kidneystones,asthma,cirrhosis,ankylosing,hiv,hepatitis,diabetes,aneurysm,bloodclot,hemophilia,anemia,allergies,otherallergies,smoker,alzheimer,concussion,concussiondate,otherconditions,prescriptionmeds,followup,researchconsent,signature1,donorconsent,signature2,age,bmi,reg_method \n";//Column headers
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
	"\n"; 
//Append data to csv
//    }

/*CREATE CSV HANDLER OBJECT WITH FOPEN - USE time() TO MAKE EACH FILE UNIQUE*/
//$csv_handler = fopen ("csvfile".time().".csv",'w');


/*CREATE CSV HANDLER OBJECT WITH FOPEN - USE time() TO MAKE EACH FILE UNIQUE*/
$csv_handler = fopen ("/var/www/html/csvfile".time().".csv",'w');

/*WRITE DATA TO CSV FILE AND CLOSE THE FILE*/
fwrite ($csv_handler,$csv);
fclose ($csv_handler);


/*WRITE DATA TO CSV FILE AND CLOSE THE FILE*/
//fwrite ($csv_handler,$csv);
//fclose ($csv_handler);

/*BEGIN TRANSFERING DATA TO SIMPLYCAST API*/
/*API DOCUMENTATION CAN BE FOUND HERE: https://app.simplycast.com/?q=api/reference*/

/*Determine Demographic Eligibility*/
if ((strpos($registry, 'No Registry') !== false) || (strpos($registry, 'Not Sure') !== false)) {
    $registry_ind = TRUE;
} else {
	$registry_ind = FALSE;
}

if ((strpos($ethnicity, 'african') !== false) || (strpos($ethnicity, 'africanamerican') !== false)) {
    $ethnicity_ind = TRUE;
} else {
	$ethnicity_ind = FALSE;
}


if (18 <= $age && $age <=40 && 58 <= $height && 110 <= $weight && $bmi <= 40 && $hiv == 'no' && $hepatitis == 'no' && $asthma == 'no' && $diabetes == 'no' && $heartdisease == 'no' && $cirrhosis == 'no' && $tia == 'no' && $pain == 'no' && $seizure == 'no' && $hemophilia == 'no') {
	$medical_eligible = 1;
} else {
	$medical_eligible = 0;
}

if (18 <= $age && $age <= 29 && $ethnicity_ind == TRUE && $registry_ind == TRUE ) {
	$demographic_eligible = 1;
} else {
	$demographic_eligible = 0;
}

if (in_array($state,array('DC','VA','MD'))) {
	$geographic_eligible = 1;
} else {
	$geographic_eligible = 0;
}



$curl = curl_init();

$public = 'c2c64e977da4aff112bda378d76ce39265c65f96';
$secret = '8081b7551046b5e027363d223076000fad403760';

//When using SSL/TLS, you can simply pass your credentials as
//{public key}:{secret key}, rather than creating a signature (though you
//can still create a signature if you desire the additional security).
$authString = base64_encode("$public:$secret");

$name = $fname . ' ' . $lname;


//if ($reg_method = "drive"){
	$list_num = 44;
	$api_url = 'https://api.simplycast.com/crossmarketer/18047/inbound/930 HTTP/1.1';
//}
//else {
//	$list_num = 20;
//	$api_url = 'https://api.simplycast.com/crossmarketer/12853/inbound/881 HTTP/1.1';
//}


$fields = array(	
   'contact' => array(
		'fields' => array (
			0 => array(
			 'id' => '1',
			 'value' => $name,
			),
			1 => array(
			 'id' => '23',
			 'value' => $email,
			),
			2 => array(
			 'id' => '47',
			 'value' => $phone,
			),
			3 => array(
			 'id' => '55',
			 'value' => $phone,
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
			 'value' => $phone,
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

    if($result === false)
    {
        echo "Error Number:".curl_errno($curl)."<br>";
        echo "Error String:".curl_error($curl);
    }

?>

<!-- WHEN PROCESSING IS COMPLETE TRANSFER REGISTRANTS TO THE THANK YOU PAGE -->
<script type="text/javascript">
 window.location = "http://www.hemeos.com/thanks-2-you.html";
</script>

</body>
</html>

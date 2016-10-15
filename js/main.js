$(document).ready(function(){

	//Form Validation
	$("#hemeosform").validate({
		rules: {
			fname: "required",
			lname: "required",
			email: {
				required: true,
				email: true
			},
			phone: "required",
			street1: "required",
			//street2: "required",
			city: "required",
			state: "required",
			country: "required",
			zip: "required",
			altfname: "required",
			altlname: "required",
			altemail: {
				required: true,
				email: true
			},
			altphone: "required",
			altrelationship: "required",
			agreement1: "required",
			agreement2: "required",
			agreement3: "required",
			agreement4: "required",
			agreement5: "required", 
			dob: {
				required: true,
				date: true
			},
			sex: "required",
			height: "required",
			weight: "required",
			lang: "required",
			reference: "required",
			ethnicity: { 
                required: true, 
                minlength: 1 
	        } ,
	    	registry: { 
	            required: true, 
	            minlength: 1 
	    	}, 
			tia: "required",
			cancer: "required",
			therapy: "required",
			pain: "required",
			medication: "required",
			depression: "required",
			autism: "required",
			add: "required",
			cholesterol: "required",
			bloodpressure: "required",
			infectiousdisease: "required",
			heartdisease: "required",
			lupus: "required",
			psoriasis: "required",
			arthritis: "required",
			sjogrens: "required",
			sclerosis: "required",
			fibromyalgia: "required",
			chronicfatigue: "required",
			addinsons: "required",
			thyroid: "required",
			seizure: "required",
			kidneystones: "required",
			asthma: "required",
			cirrhosis: "required",
			ankylosing: "required",
			hiv: "required",
			hepatitis: "required",
			diabetes: "required",
			aneurysm: "required",
			bloodclot: "required",
			hemophilia: "required",
			anemia: "required",
			allergies: "required",
			smoker: "required",
			alzheimer: "required",
			concussion: "required",
			followup: "required",
			researchconsent: "required",
			signature1: "required",
			donorconsent: "required",
			signature2: "required"		
		}
	});
	
	jQuery.extend(jQuery.validator.messages, {
	    required: "*This field is required",
	    remote: "Please fix this field.",
	    email: "*Please enter a valid email address.",
	    url: "Please enter a valid URL.",
	    date: "*Please enter a valid date",
	    dateISO: "Please enter a valid date (ISO).",
	    number: "Please enter a valid number.",
	    digits: "Please enter only digits.",
	    creditcard: "Please enter a valid credit card number.",
	    equalTo: "Please enter the same value again.",
	    accept: "Please enter a value with a valid extension.",
	    maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
	    minlength: jQuery.validator.format("Please enter at least {0} characters."),
	    rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
	    range: jQuery.validator.format("Please enter a value between {0} and {1}."),
	    max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
	    min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
	});
	
	//Phone# Checker
	$("#phone").mask("+1 (999) 999-9999");
	$("#altphone").mask("+1 (999) 999-9999");	
	
	//Hidden Steps
	$('#step2').hide();
	$('#step3').hide();
	$('#step4').hide();
	$('#step5').hide();
	$('#step6').hide();
	$('#step7').hide();
	
	//Form Step Actions
	$('#next1').click(function(){
		if($("#hemeosform").valid()){ 
		 	$('#step2').show();
			$('#step1').hide();
			$("body").scrollTop(0);
			$(".smarty-tag-check").hide();
        } else {
            // do stuff if form is not valid
        }	
		
	/*	if (ss.isInvalid())
			{
			alert("The address is considered invalid. Please verify address.");
			}
		if (ss.isAmbiguous())
		{
		alert("The address is considered ambiguous. Please verify address.");
		}
		if (ss.isMissingSecondary())
		{
		alert("The address is valid, but is missing a secondary (unit/apartment/suite) number.");
		}
		if (ss.isValid())
		{
			 if($("#hemeosform").valid()){ 
				 	$('#step2').show();
					$('#step1').hide();
					$("body").scrollTop(0);
		        } else {
		            // do stuff if form is not valid
		        }	
		}
		*/	
	});
	$('#previous1').click(function(){
		$('#step1').show();
		$('#step2').hide();
		$("body").scrollTop(0);
	});
	$('#next2').click(function(){
		if($("#hemeosform").valid()){ 
			$('#step3').show();
			$('#step2').hide();
			$("body").scrollTop(0);
        } else {
            // do stuff if form is not valid
        }		
	});
	$('#previous2').click(function(){
		$('#step2').show();
		$('#step3').hide();
		$("body").scrollTop(0);
	});
	$('#next3').click(function(){
		if($("#hemeosform").valid()){ 
			$('#step4').show();
			$('#step3').hide();
			$("body").scrollTop(0);
        } else {
            // do stuff if form is not valid
        }	
	});
	$('#previous3').click(function(){
		$('#step3').show();
		$('#step4').hide();
		$("body").scrollTop(0);
	});
	$('#next4').click(function(){
		if($("#hemeosform").valid()){ 
			$('#step5').show();
			$(".scrollcontainer").mCustomScrollbar({
				scrollbarPosition: 'outside'
			});
			$('#step4').hide();
			$("body").scrollTop(0);
        } else {
            // do stuff if form is not valid
        }	
		
	});
	$('#previous4').click(function(){
		$('#step4').show();
		$('#step5').hide();
		$("body").scrollTop(0);
	});
	$('#next5').click(function(){
		if($("#hemeosform").valid()){ 
			$('#step6').show();
			$('#step5').hide();	
			$("body").scrollTop(0);
        } else {
            // do stuff if form is not valid
        }	
		
	});
	$('#previous5').click(function(){
		$('#step5').show();
		$('#step6').hide(); 
		$("body").scrollTop(0);
	});
	$('#next6').click(function(){
		if($("#hemeosform").valid()){ 
			$('#step7').show();
			$('#step6').hide();	
			$("body").scrollTop(0);
        } else {
            // do stuff if form is not valid
        }	
		
	});
	$('#previous6').click(function(){
		$('#step6').show();
		$('#step7').hide(); 
		$("body").scrollTop(0);
	});
	$('#next7').click(function(){
		if($("#hemeosform").valid()){ 
			$('#step8').show();
			$('#step7').hide();	
			$("body").scrollTop(0);
        } else {
            // do stuff if form is not valid
        }	
	});
	$('#previous7').click(function(){
		$('#step7').show();
		$('#step8').hide(); 
		$("body").scrollTop(0);
	});

	
	$('.popup').click(function(){
		$("#terms").scrollTop("0");
		$("#privacy").scrollTop("0");
	});
});

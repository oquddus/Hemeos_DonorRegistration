$(document).ready(function(){
var ss;
var error = 1;
$('.class_2').hide();
$('.class_3').hide();
$('.class_4').hide();

// ss.deactivate("myID");



$('.next').click(function(){

 //ss.activate("myID");


var id = $(this).attr('id');
$('.field_1 ,.field_2 ,.field_3 ,.field_4 ').prop('required',false);
$(".field_"+id).prop('required',true);
$('.field_1 ,.field_2 ,.field_3 ,.field_4').prop("disabled", false); 
$(".field_"+id).each(function(i, obj) {
//alert(!obj.checkValidity());
     if(!obj.checkValidity()){
	 $('#review').trigger('click');
	 return false;
	 }else if( $(".field_"+id).length == i+1){

	 
	 if(id == 1){
	// alert();	
	   error = 1;
/* 	  ss =  $.LiveAddress({
		key: "35790172741694553",target:'US|INTERNATIONAL',
		
	submitSelector: '#2',
		autoVerify:true,
		addresses: [{
		id: "3579017274169455322",
		country: "#country",
		address1: "#street1",
		locality: "#city",
		administrative_area: "#state",
		postal_code: "#zipcode" }]});
		 */
ss = $.LiveAddress({
  key: '35790172741694553',
  waitForStreet: true,ui:true,autoVerify:true,
  debug: true,
  target: "US",
  autocomplete: 5,
  autoVerify: false,
  addresses: [{
	address1: "#street1",
	address2: "#street2",  
    locality: "#city",
    administrative_area: "#state",
    postal_code: "#zip",
    country: "#country"
  }]
});
		
		
	/* 	ss.on("AddressWasInvalid", function(event, data, previousHandler)
		{ ///// error = 1;
		//$('.field_1 ,.field_2 ,.field_3 ,.field_4').prop("disabled", false); 
		}); */
		
	/* 	ss.on("Completed", function(event, data, previousHandler)
		{  // alert('AddressWasValid'); 
		    error = 0;
			$('.field_1 ,.field_2 ,.field_3 ,.field_4').prop("disabled", false); 
				previousHandler(event, data);
		}); */
		ss.on("AddressAccepted", function(event, data, previousHandler)
		{  // alert('AddressWasValid'); 
		console.log("AddressAccepted");
		    error = 0;
			$('.field_1 ,.field_2 ,.field_3 ,.field_4').prop("disabled", false); 
				previousHandler(event, data);
		});
		 ss.on("AddressWasValid", function(event, data, previousHandler)
		{  
		 console.log("AddressWasValid");
			error = 0;$('.field_1 ,.field_2 ,.field_3 ,.field_4').prop("disabled", false); 
			previousHandler(event, data);
		}); ss.on("InvalidAddressRejected", function(event, data, previousHandler)
		{  
		 console.log("InvalidAddressRejected");
			error = 1;$('.field_1 ,.field_2 ,.field_3 ,.field_4').prop("disabled", false); 
			previousHandler(event, data);
		});
		ss.on("AddressWasAmbiguous", function(event, data, previousHandler)
		{   	
		
		 console.log("AddressWasAmbiguous");
		error = 1;$('.field_1 ,.field_2 ,.field_3 ,.field_4').prop("disabled", false); 
		previousHandler(event, data);
		});
		ss.on("AddressWasInvalid", function(event, data, previousHandler)
		{  
		 console.log("AddressWasInvalid");
		error = 1;$('.field_1 ,.field_2 ,.field_3 ,.field_4').prop("disabled", false); 
		previousHandler(event, data);
		}); 
		
		}
		
		//ss.aborte();
		 if(error == 0 && id > 1){ //alert(2345);
		 //ss.unaccept();
		     ss.deactivate("3579017274169455322");
		 }
		//alert(id+' '+error);
		if((error == 0 && id  > 1) || (error == 1 && id  == 1)){
	 $('.prog_1 ,.prog_2 ,.prog_3 ,.prog_4').removeClass('active');
	$('.prog_'+(parseInt(id)+parseInt(1))).addClass('active');
    $('.class_1 ,.class_2 ,.class_3 ,.class_4 ').addClass('bounceOutLeft');
	$('.class_'+(parseInt(id)+parseInt(1))).removeClass('bounceOutLeft');
	setTimeout(function(){
	$('.class_1').hide();
	$('.class_2').hide();	
	$('.class_3').hide();
	$('.class_4').hide();
	$('.class_'+(parseInt(id)+parseInt(1))).show();
	//$('form').valid();
	$('.class_1 ,.class_2 ,.class_3 ,.class_4 ').removeClass('bounceOutLeft');
	
	$('.progress-bar').text('Step '+(parseInt(id)+parseInt(1)));},400);
	return;
	 }}
});
//return false;
});


$('.previous3').click(function(){

var id = $(this).attr('id');
if(id == 2){
ss.deactivate("3579017274169455322");
}
if(id == 3){

	 //ss.activate("3579017274169455322");
		 ss = $.LiveAddress({
  key: '35790172741694553',
  waitForStreet: true,ui:true,autoVerify:true,
  debug: true,
  target: "US",
  addresses: [{
		id: "3579017274169455322",
    country: "#country",
    address1: "#street1",
    locality: "#city",
    administrative_area: "#state",
    postal_code: "#zip",lastField: "#zip"
  }]
});
	 		ss.on("AddressAccepted", function(event, data, previousHandler)
		{  // alert('AddressWasValid'); 
		console.log("AddressAccepted");
		    error = 0;
			$('.field_1 ,.field_2 ,.field_3 ,.field_4').prop("disabled", false); 
				previousHandler(event, data);
		});
		 ss.on("AddressWasValid", function(event, data, previousHandler)
		{  
		 console.log("AddressWasValid");
			error = 0;$('.field_1 ,.field_2 ,.field_3 ,.field_4').prop("disabled", false); 
			previousHandler(event, data);
		}); ss.on("InvalidAddressRejected", function(event, data, previousHandler)
		{  
		 console.log("InvalidAddressRejected");
			error = 1;$('.field_1 ,.field_2 ,.field_3 ,.field_4').prop("disabled", false); 
			previousHandler(event, data);
		});
		ss.on("AddressWasAmbiguous", function(event, data, previousHandler)
		{   	
		
		 console.log("AddressWasAmbiguous");
		error = 1;$('.field_1 ,.field_2 ,.field_3 ,.field_4').prop("disabled", false); 
		previousHandler(event, data);
		});
		ss.on("AddressWasInvalid", function(event, data, previousHandler)
		{  
		 console.log("AddressWasInvalid");
		error = 1;$('.field_1 ,.field_2 ,.field_3 ,.field_4').prop("disabled", false); 
		previousHandler(event, data);
		});}
$('.class_1 ,.class_2 ,.class_3 ,.class_4 ').addClass('bounceOutRight');
$('.class_'+(parseInt(id)-parseInt(1))).removeClass('bounceOutRight');
setTimeout(function(){
$('.class_1').hide();
$('.class_2').hide();
$('.class_3').hide();
$('.class_4').hide();
$('.class_'+(parseInt(id)-parseInt(1))).show();
$('.class_1 ,.class_2 ,.class_3 ,.class_4 ').removeClass('bounceOutRight');
$('.progress-bar').text('Step '+(parseInt(id)-parseInt(1)));},400);

});

//Form Functions

jQuery(function($){
    $("#phone").mask("+1(999) 999-9999");
 });

$( function() {
    $( "#dob" ).datepicker();
  } );

$( function() {
    var select = $( "#height" );
    var slider = $( "<div id='slider'></div>" ).insertAfter( select ).slider({
      min: 1,
      max: 38,
      range: "min",
      value: select[ 0 ].selectedIndex + 1,
      slide: function( event, ui ) {
        select[ 0 ].selectedIndex = ui.value - 1;
      }
    });
    $( "#height" ).on( "change", function() {
      slider.slider( "value", this.selectedIndex + 1 );
    });
  } );

$( function() {
    $( "#sliderWeight" ).slider({
      range: "max",
      min: 0,
      max: 500,
      value: 0,
      slide: function( event, ui ) {
        $( "#weight" ).val( ui.value );
      }
    });
    $( "#weight" ).val( $( "#sliderWeight" ).slider( "value" ) );
  } );


$('.review').click(function(){

    $( "#dialog-confirm" ).dialog({
    	autoOpen: false,
	      show: {
	        effect: "blind",
	        duration: 1000
	      },
	      hide: {
	        effect: "explode",
	        duration: 1000
	      },
    	resizable: false,
        height: "auto",
        width: 400,
        modal: true,
        buttons: {
          "Submit": function() {
            $( this ).dialog( "close" );
          },
          Cancel: function() {
            $( this ).dialog( "close" );
          }
        }
      });
    
	
});

  /* $(".next").click(function(){
if(animating) return false;
animating = true;

current_fs = $(this).parent();
next_fs = $(this).parent().next();

//activate next step on progressbar using the index of next_fs
$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
next_fs.show();
//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now, mx) {
  //as the opacity of current_fs reduces to 0 - stored in "now"
  //1. scale current_fs down to 80%
  scale = 1 - (1 - now) * 0.2;
  //2. bring next_fs from the right(50%)
  left = (now * 50)+"%";
  //3. increase opacity of next_fs to 1 as it moves in
  opacity = 1 - now;
  current_fs.css({'transform': 'scale('+scale+')'});
  next_fs.css({'left': left, 'opacity': opacity});
},
duration: 800,
complete: function(){
  current_fs.hide();
  animating = false;
},
//this comes from the custom easing plugin
easing: 'easeInOutBack'
});
});

$(".previous").click(function(){
if(animating) return false;
animating = true;

current_fs = $(this).parent();
previous_fs = $(this).parent().prev();

//de-activate current step on progressbar
$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
previous_fs.show();
//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now, mx) {
  //as the opacity of current_fs reduces to 0 - stored in "now"
  //1. scale previous_fs from 80% to 100%
  scale = 0.8 + (1 - now) * 0.2;
  //2. take current_fs to the right(50%) - from 0%
  left = ((1-now) * 50)+"%";
  //3. increase opacity of previous_fs to 1 as it moves in
  opacity = 1 - now;
  current_fs.css({'left': left});
  previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
},
duration: 800,
complete: function(){
  current_fs.hide();
  animating = false;
},
//this comes from the custom easing plugin
easing: 'easeInOutBack'
});
});

$(".submit").click(function(){
return false;
}) */
});

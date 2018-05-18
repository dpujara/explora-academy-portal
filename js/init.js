(function($){
  $(function(){
    $('.button-collapse').sideNav();
	$('.hey').slider({height:500});
	$('.hello').slider({height:400, indicators:false,interval:8000});
	
	$('.modal-trigger').leanModal({
	      dismissible: true,
	      opacity: .8,
	      in_duration: 300,
	      out_duration: 200
    	}
  	);
  });
 $('.parallax').parallax();
 $('select').material_select();
 $('.coursemodal').click(function () {
 	$('#our_course').closeModal();
 	$('#contact').closeModal();
 });
 $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 50, // Creates a dropdown of 15 years to control year
    format: 'dd-mm-yyyy'
  });
  $(document).ready(function() {
    $('input#input_text, textarea#textarea1').characterCounter();
  });
})(jQuery);
$(document).ready(function(){
      $('.collapsible').collapsible({
        accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
      });
      });


$(document).ready(function(){

  $('html').addClass('redpandas-will-rule-the-world');
  
////////////////////////////////////////
// Let's make good old IE8 behave like a shiny modern 21th century browser \o/
////////////////////////////////////////

  // Placeholder fallback
  
  if(Modernizr.input.placeholder) {
    $('html').addClass('placeholder');
  } else {
    $('html').addClass('no-placeholder');
  }
  
  if ( !("placeholder" in document.createElement("input")) ) {
    $("input[placeholder], textarea[placeholder]").each(function() {
      var val = $(this).attr("placeholder");
      if ( this.value == "" ) {
        this.value = val;
      }
      $(this).focus(function() {
        if ( this.value == val ) {
          this.value = "";
        }
      }).blur(function() {
        if ( $.trim(this.value) == "" ) {
          this.value = val;
        }
      })
    });
    
    // Clear default placeholder values on form submit
    $('form').submit(function() {
      $(this).find("input[placeholder], textarea[placeholder]").each(function() {
        if ( this.value == $(this).attr("placeholder") ) {
          this.value = "";
        }
      });
    });
  }
  
  // SVG fallback
  
  /*
	if (!Modernizr.svg) {
		$('img[src*="svg"]').attr('src', function() {
			return $(this).attr('src').replace('.svg', '.png');
		});
	}
	*/


////////////////////////////////////////
// jQuery UI
////////////////////////////////////////

  // Datepicker
		
  if(!Modernizr.inputtypes.date) {
    $( "input[type=date]" ).datepicker({ maxDate: 0, dateFormat: 'dd.mm.yy' });
  };
  
  $(function() { $( ".datepicker" ).datepicker(); });
  
  // Tabs
  
  $(function() { $( ".tabs" ).tabs(); });
  
  
////////////////////////////////////////
// Mobile site
////////////////////////////////////////

  // Menu offcanvas
  
  $("#btn-offcanvas").click(function(){
    $("body").toggleClass("offcanvas");
    $(this).toggleClass("close");
  });
  
  
////////////////////////////////////////
// Magnific Popup
////////////////////////////////////////

  


////////////////////////////////////////
// Random functions
////////////////////////////////////////

  // Alerts
  
  $('.alert-close').click(function(){
    $(this).parent('.alert').remove();
  });
  
  // Check / uncheck all checkboxes
  
  $('fieldset input.select-all').click(function(){
    var checkedStatus = this.checked;
    $(this).parents('fieldset').find('input[type=checkbox]').each(function () {
        $(this).prop('checked', checkedStatus);
     });
    
  });


});


$(window).load(function() {
  
  
  
});
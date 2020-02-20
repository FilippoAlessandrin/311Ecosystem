
jQuery(document).ready(function() {

	let selectGiorno = $('#registration-giorno');
	let selectMese = $('#registration-mese');
	let selectAnno = $('#registration-anno');

	let GetDays = () => {
		const days = [];
		let dayMin = 1;
		const dayMax = 31;
		while (dayMin <= dayMax) {
			days.push(dayMin);
			dayMin++;
		}
		return days;
	};

	let GetMonths = () => {
		const months = [];
		let monthsMin = 1;
		const monthsMax = 12;
		while (monthsMin <= monthsMax) {
			months.push(monthsMin);
			monthsMin++;
		}
		return months;
	};

	let GetYears = () => {
		const years = [];
		const yearStart = 1920;
		let yearNow = new Date().getFullYear();
		while (yearNow >= yearStart) {
			years.push(yearNow);
			yearNow--;
		}
		return years;
	};
	
	$.each(GetDays(), function(key, value) {   
	 selectGiorno.append($("<option></option>")
				 .attr("value",value)
				 .text(value)); 
	});
	
	$.each(GetMonths(), function(key, value) {   
	 selectMese.append($("<option></option>")
				 .attr("value",value)
				 .text(value)); 
	});

	$.each(GetYears(), function(key, value) {   
		selectAnno.append($("<option></option>")
				  .attr("value",value)
				  .text(value)); 
	});

   
	
    /* Form */
    $('.registration-form fieldset:first-child').fadeIn('slow');
    
    $('.registration-form input[type="text"], .registration-form input[type="password"], .registration-form textarea').on('focus', function() {
    	$(this).removeClass('input-error');
    });
    
    // next step
    $('.registration-form .btn-next').on('click', function() {
    	var parent_fieldset = $(this).parents('fieldset');
    	var next_step = true;
    	
    	// parent_fieldset.find('input[type="text"], input[type="password"], textarea').each(function() {
    	// 	if( $(this).val() == "" ) {
    	// 		$(this).addClass('input-error');
    	// 		next_step = false;
    	// 	}
    	// 	else {
    	// 		$(this).removeClass('input-error');
    	// 	}
    	// });
    	
    	if( next_step ) {
    		parent_fieldset.fadeOut(400, function() {
	    		$(this).next().fadeIn();
	    	});
    	}
    	
    });
    
    // previous step
    $('.registration-form .btn-previous').on('click', function() {
    	$(this).parents('fieldset').fadeOut(400, function() {
    		$(this).prev().fadeIn();
    	});
    });
    
    // submit
    $('.registration-form').on('submit', function(e) {
    	
    	$(this).find('input[type="text"], input[type="password"], textarea').each(function() {
    		if( $(this).val() == "" ) {
    			e.preventDefault();
    			$(this).addClass('input-error');
    		}
    		else {
    			$(this).removeClass('input-error');
    		}
    	});
    	
    });
    
    
});

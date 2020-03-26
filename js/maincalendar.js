$('.event').hide();
$('#tbody').hide();

var events = [
	{'Date': new Date(2016, 6, 7), 'Title': 'Doctor appointment at 3:25pm.'},
	{'Date': new Date(2016, 6, 18), 'Title': 'New Garfield movie comes out!', 'Link': 'https://garfield.com'},
	{'Date': new Date(2016, 6, 27), 'Title': '25 year anniversary', 'Link': 'https://www.google.com.au/#q=anniversary+gifts'},
];
var settings = {};
var element = document.getElementById('caleandar');
caleandar(element, events, settings);

		$('.cld-number').click(function() {
			var textDay = ($(this).text());
			var intDay = parseInt(textDay);
			var month = $('.today').text();
			$('.event').show(150);
			$('#currentDate').html(textDay + ' ' + month.slice(0,-2));
	});

	$('#closeEv').click(function() {
		$('.event').hide(150);
		$('#tbody').hide();
	});

	$('#selAule').on('change', function() {
		$('#tbody').show(150);
	});

var btnPrenotati = $('.btn-prenotati');

btnPrenotati.click( function(e) {
	$(e.target).hide();
	$(e.target).parent().append('Prenotato <i class="ti-pencil menu-icon"></i>').css('color','green');
});
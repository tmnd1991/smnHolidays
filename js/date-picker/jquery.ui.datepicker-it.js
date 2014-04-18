/* Italian initialisation for the jQuery UI date picker plugin. */
/* Written by Murgia Antonio (tmnd91{at}gmail.com),
*/
jQuery(function($){
	$.datepicker.regional['it'] = {
		closeText: 'Chiudi',
		prevText: 'Precedente',
		nextText: 'Successivo',
		currentText: 'Oggi',
		monthNames: ["Gennaio","Febbraio","Marzo","Aprile","Maggio","Giugno","Luglio","Agosto","Settembre","Ottobre","Novembre","Dicembre"],
		monthNamesShort: ['Gen.','Feb.','Mar','Apr.','Mag.','Giu.',
		'Lug.','Ago.','Set.','Oyt.','Nov.','Dec.'],
		dayNames: ['Domenica','Luned\u00ED','Marted\u00ED','Mercoled\u00ED','Gioved\u00ED','Venerd\u00ED','Sabato'],
		dayNamesShort: ["Dom","Lun","Mar","Mer","Gio","Ven","Sab"],
		dayNamesMin: ['D','L','M','M','G','V','S'],
		weekHeader: 'Sett.',
		dateFormat: 'dd/mm/yy',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['it']);
});

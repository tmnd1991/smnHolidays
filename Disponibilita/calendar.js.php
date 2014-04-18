<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include_once($root."/include/globals.php");
header("content-type: application/javascript");
switch($language)
{
	case ITA:?>
		$("#calendar").fullCalendar({
				    firstDay : 1,
				    monthNames : ["Gennaio","Febbraio","Marzo","Aprile","Maggio","Giugno","Luglio","Agosto","Settembre","Ottobre","Novembre","Dicembre"],
				    dayNamesShort : ["Dom","Lun","Mar","Mer","Gio","Ven","Sab"],
				    buttonText : {today: "Oggi"},
			    });
		$(".my_date_picker").each(function()
  	{
	  	$(this).datepicker( $.datepicker.regional[ "it" ] );
  	});
  	var non_corretto = "non corretto."
		<?php
		break;
	case ENG:?>
		$("#calendar").fullCalendar({
				    firstDay : 1,
		});
		$(".my_date_picker").each(function()
  	{
  	  var $this = $(this);
	  	$this.datepicker( $.datepicker.regional[ "" ] );
	  	$this.attr("readonly","");
  	});
  	var non_corretto = "it's incorrect."
		<?php
		break;
}
?>
function ValidateNotEmpty(value)
{
	return value!="" && value!=null;
}
function ValidateEmail(value)
{
	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(value);
}
function ValidatePhoneNumber(value)
{
	var re = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
	return re.test(value);
}
function ValidateForm(form)
{
// non controlla data arrivo<data partenza
	var valid = true;
	var message = "";
	$("form#"+form+" input").each(function()
	{
		var $this = $(this);
		if ($this.hasClass('validate.not-empty'))
		{
			var res = ValidateNotEmpty($this.val());
			if (!res)
			{
				valid = false;
				message += $this.prev().text()+" "+non_corretto+"\n";
			}
		}
		if ($this.hasClass('validate.email'))
		{
			var res = ValidateEmail($this.val());
			if (!res)
			{
				valid = false;
				message += $this.prev().text()+" "+non_corretto+"\n";
			}
		}
		if ($this.hasClass('validate.phonenumber'))
		{
			var res = ValidatePhoneNumber($this.val());
			valid = valid && res;
			if (!res)
			{
				valid = false;
				message += $this.prev().text()+" "+non_corretto+"\n";
			}
		}	
	});
	if (!valid)
		alert(message);
	console.log(valid);
	return valid;
}
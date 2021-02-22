<?php

function build_indicies($direction='') {

	if ( empty($direction) ) {
		for ($i=2; $i <= 12; $i++) {
			echo "<th><span class=\"small\">$i</span></th>\n";
		}
	}
	else {
		for ($i=12; $i >= 2; $i--) {
			echo "<th><span class=\"small\">$i</span></th>\n";
		}
	}
	echo "<th><span class=\"small\">L</span></th>\n";
}

function build_color_checkbox($color, $direction='ascend' ) {

	if ( $direction == 'ascend') {
		for ($i=2; $i <= 12; $i++) {
			echo "<td class=\"cell_left\"><input type=\"checkbox\" class=\"$color\" id=\"{$color}{$i}\" /></td>\n";
		}
	}
	else {
		for ($i=12; $i >= 2; $i--) {
			echo "<td class=\"cell_left\"><input type=\"checkbox\" class=\"$color\" id=\"{$color}{$i}\" /></td>\n";
		}
	}
	echo "<td class=\"cell_right\"><input type=\"checkbox\" class=\"$color\" id=\"{$color}lock\" disabled=\"disabled\" /></td>\n";
}

?><html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=400, user-scalable=no">
<!--<meta name="viewport" content="width=400">-->
<link rel="apple-touch-icon" sizes="144x144" href="qwixx-144x144.jpg" />
<link rel="apple-touch-icon" sizes="114x114" href="qwixx-114x114.jpg" />
<link rel="apple-touch-icon" sizes="72x72" href="qwixx-72x72.jpg" />
<link rel="apple-touch-icon" sizes="57x57" href="qwixx-57x57.jpg" />
<title>Qwixx Scorer</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
<style type="text/css">
body {
	font-size: 12px;
	font-family: 'Open Sans', sans-serif;
}
.cell_left {
	border-top-left-radius: 4px;
	border-bottom-left-radius: 4px;
	-moz-border-top-left-radius: 4px;
	-moz-border-bottom-left-radius: 4px;
	-webkit-border-top-left-radius: 4px;
	-webkit-border-bottom-left-radius: 4px;
}
.cell_right {
	border-top-right-radius: 4px;
	border-bottom-right-radius: 4px;
	-moz-border-top-right-radius: 4px;
	-moz-border-bottom-right-radius: 4px;
	-webkit-border-top-right-radius: 4px;
	-webkit-border-bottom-right-radius: 4px;
}
.red td {
	background-color: red;
}
.yellow td {
	background-color: yellow;
}
.green td {
	background-color: green;
}
.blue td {
	background-color: blue;
}
td.defaulted {
	background-color: grey;
}
td.defaulted_top_left_right {
	padding: 3px;
	background-color: grey;
	border-top-left-radius: 4px;
	border-top-right-radius: 4px;
	font-size: .9em;
}
td.defaulted_top_right {
	background-color: grey;
	border-top-right-radius: 4px;
}
td.defaulted_bottom_left {
	background-color: grey;
	border-bottom-left-radius: 4px;
}
td.defaulted_bottom_right {
	background-color: grey;
	border-bottom-right-radius: 4px;
}
td.spacer {
	background-color: white;
	width: 10px;
}
#redback {
	background-color: lightcoral;
}
#yellowback {
	background-color: lightyellow;
}
#greenback {
	background-color: palegreen;
}
#blueback {
	background-color: lightskyblue;
}
#greyback {
	background-color: lightgrey;
}
table {
	border-collapse: collapse;
}
table.scores {
	font-family: 'Roboto Mono', monospace;
}
th.scores {
	font-family: 'Roboto Mono', monospace;
	font-size: 10px;
	padding-right: 8px;
	text-align: center;
}
th.color {
	background-color: #DCDCDC;
}
th, td {
	font-size: 11px;
	font-family: 'Open Sans', sans-serif;
}
.small {
	font-size: 12px;
}
.smaller {
	font-size: .7em;
	text-align: center;
}
</style>
</head>
<body>

<table style="margin-bottom: 5px;">
<tr class="red">
<?php

	build_color_checkbox('red');

?>
<td class="spacer"></td>
<td class="defaulted_top_left_right" colspan="2"><input type="text" name="userid" id="userid" size="4" maxlength="4"></td>
</tr>
<tr>
<?php

	build_indicies();

?>
<td class="spacer"></td>
<td class="defaulted"><input type="checkbox" class="grey" id="grey1" /></td>
<td class="defaulted"><input type="checkbox" class="grey" id="grey2" /></td>
</tr>
<tr class="yellow">
<?php

	build_color_checkbox('yellow');

?>
<td class="spacer"></td>
<td class="defaulted_bottom_left"><input type="checkbox" class="grey" id="grey3" /></td>
<td class="defaulted_bottom_right"><input type="checkbox" class="grey" id="grey4" /></td>
</tr>
<tr class="green">
<?php

	build_color_checkbox('green', 'descend');

?>
<td class="spacer"></td>
</tr>
<tr>
<?php

	build_indicies('descend');

?>
</tr>
<tr class="blue">
<?php

	build_color_checkbox('blue', 'descend');

?>
<td class="spacer" colspan="3"></td>
</tr>
</table>
<input type="text" readonly="readonly" id="redback" size="3" value="0"/>
<input type="text" readonly="readonly" id="yellowback" size="3" value="0" />
<input type="text" readonly="readonly" id="greenback" size="3" value="0" />
<input type="text" readonly="readonly" id="blueback" size="3" value="0" />
<input type="text" readonly="readonly" id="greyback" size="3" value="0" />

<p style="font-size: .9em;">Total Score: <input type="text" readonly="readonly" id="scorepointstotal" size="3" /></p>
<div style="font-size: 10px;" id='scores'></div>

<input type="submit" id="reset" value="Reset" />
<input type="submit" id="refresh" value="Refresh" />
<!--
<p><a href="gemixxt1.html">Qwixx Default</a> | <a href="gemixxt2.html">Qwixx Mixxed</a></p>
-->
<script type="text/javascript">

table_start='<table class="scores"><tr><th class="scores"></th><th class="scores">Red</th><th class="scores color">Yellow</th><th class="scores">Green</th><th class="scores color">Blue</th></tr>';

function score_points(a) {
	if (a == 1) return 1;
	if (a == 2) return 3;
	if (a == 3) return 6;
	if (a == 4) return 10;
	if (a == 5) return 15;
	if (a == 6) return 21;
	if (a == 7) return 28;
	if (a == 8) return 36;
	if (a == 9) return 45;
	if (a == 10) return 55;
	if (a == 11) return 66;
	if (a == 12) return 78;
	return 0;
}


function total_points() {

	rc = total_checked('red');
	yc = total_checked('yellow');
	gc = total_checked('green');
	bc = total_checked('blue');

	r = score_points(rc);
	y = score_points(yc);
	g = score_points(gc);
	b = score_points(bc);
	d = total_checked('grey') * -5;

	$('#redback').val( r.toString() );
	$('#yellowback').val( y.toString() );
	$('#greenback').val( g.toString() );
	$('#blueback').val( b.toString() );
	$('#greyback').val( d.toString() );

	total = r + y + g + b + d;

	$('#scorepointstotal').val(total);

	console.log('total_points-> Total points : '+total.toString());

	if ( $('#userid').val() !== '' ) {
    	submitScore(rc.toString(),yc.toString(),gc.toString(),bc.toString());
    }

}


function total_checked(color) {

	num=0;
	$('input.'+color).each(function (index, obj) {
		if ( $(obj).prop("checked")) {
			num++;
			//console.log('total_checked-> disabling '+color+' index '+index.toString());
			//$(obj).attr("disabled", true);
		}
	});
	console.log('total_checked-> total '+color+' check marked : '+num);
	return num;

}


function process_set(color){

	lastindex=-1;
	lastobj=null;
	num_checked=0;

	// Get the last checked checkbox
	$('input.'+color).each(function (index, obj) {
		if ( $(obj).prop("checked")) {
			lastindex=index;
			lastobj=obj;
			num_checked++;
		}
	});

	console.log('process_set-> Last '+color+' checked index : '+lastindex.toString());
	console.log('process_set-> Total '+color+' checked      : '+num_checked.toString());

	// disable everything before last
	$('input.'+color).each(function (index, obj) {
		if ( index < lastindex || $('#'+color+'lock').is(':checked')) {
			console.log('process_set-> '+color+' '+index.toString()+' OFF');
			$(obj).attr("disabled", true);
		}
		else {

			console.log('process_set-> '+color+' '+index.toString()+' ON');
			$(obj).attr("disabled", false);
			//alert('enabling '+color+' '+index.toString());
		}
	});

	// disable/enable lock
	if ( num_checked >= 5 ){
		console.log('process_set-> Unlocking Lock : '+color);
		$('#'+color+'lock').attr("disabled", false);
	}
	else{
		console.log('process_set-> Locking Lock   : '+color);
		$('#'+color+'lock').attr("disabled", true);
	}

	total_points();

}


function process_defaulted(){

	// Get the last checked checkbox
	$('input.grey').each(function (index, obj) {
		if ( $(obj).prop("checked")) {
			$(obj).attr("disabled", true);
		}
	});

	total_points();

}


function submitScore(rc,yc=0,gc=0,bc=0){
          if (rc === 'reset') {
          	myscore='reset';
          }
          else {
          	myscore=$('#userid').val()+","+rc+","+yc+","+gc+","+bc;
          }

          console.log("Submitting: "+myscore);

          $.ajax({
             type: 'POST',
             url: 'action.php',
             dataType: 'json',
             data: { data: myscore },
             success: function(data){
             	if ( data['results'] !== undefined ){
             		if ( myscore === 'reset' ) {
             			$('#scores').html(data['results']);
             		}
             		else {
                  		$('#scores').html(table_start+data['results']+'</table>');
                  		$('.color2').css("font-family", "'Roboto Mono', monospace");
                  		$('.color2').css("font-size", "9px");
                  		$('.color2').css("text-align", "center");
                  		
                  		$('.color').css("font-family", "'Roboto Mono', monospace");
                  		$('.color').css("font-size", "9px");
                  		$('.color').css("text-align", "center");
                  		$('.color').css("background-color", "#DCDCDC");

                  	}

             	}
             },
             error: function (xhr, status, error) {
                  alert("Error: Check Javascript Logs");
                  console.log("responseText: "+xhr.responseText);
                  console.log("statusText: "+xhr.statusText);
                  console.log("status: "+status);
                  console.log("error: "+error);
             },
             complete: function(data) {
                    console.log(data['status']);
             }

         });

         return false;
}

$('input.red').click(function() {

	process_set('red');
	
});

$('input.yellow').click(function() {
	
	process_set('yellow');
});

$('input.green').click(function() {

	process_set('green');
});

$('input.blue').click(function() {

	process_set('blue');

});

$('input.grey').click(function() {

	process_defaulted();

});

$('#redlock').click(function() {
	process_set('red');

});

$('#yellowlock').click(function() {
	process_set('yellow');

});

$('#greenlock').click(function() {
	process_set('green');

});

$('#bluelock').click(function() {
	process_set('blue');
});

$('#reset').click(function() {
	$('input').prop('checked', false);
	$('input').removeAttr("disabled");
	$('#redlock').attr("disabled", true);
	$('#yellowlock').attr("disabled", true);
	$('#bluelock').attr("disabled", true);
	$('#greenlock').attr("disabled", true);
	$('#redback').val(0);
	$('#yellowback').val(0);
	$('#greenback').val(0);
	$('#blueback').val(0);
	$('#greyback').val(0);
	$('#scorepointstotal').val(0);
	$('#userid').val('');
	submitScore('reset');

});

$('#refresh').click(function() {
	total_points();

});

</script>
</body>
</html>
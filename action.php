<?php

$log_file  = "/some/path/qwixx/qwixx_action.log";
$debug     = 1;  // 0 = OFF

$json_file      = "/some/path/qwixx/scores.json";

mylog( "----------------------------------------" );


foreach ($_REQUEST as $key => &$value) {
    if ($value == 'null') {
        $value = '';
    }
    mylog( "REQUEST[$key] = " . $value);
}

if (file_exists($json_file)) {

    // Open the file to get existing content
	$current = file_get_contents($json_file);

    $all = json_decode($current);
    // Trim records to 4 from the bottom cause the array is reverse sorted (only 4 players allowed)
	if ( count($all) > 4) {
		$all = array_slice($all, 0, 4);
    }

    if (count($all) > 0) {
        mylog('Loaded '. count($all) . "records from ". $json_file);
    } else {
        mylog("Records Found ". $json_file .' : 0');
    }
    mylog("Loaded: ".json_encode($all));
    
}
else {
    mylog( "$json_file does not exist. Making new file: $json_file" );
	unlink($json_file);
    $all=array();
}


mylog('Loaded ALL -> '.json_encode($all) ); 


if ( isset($_REQUEST['data']) && !empty($_REQUEST['data']) ) {

    if ( $_REQUEST['data'] == 'reset' ) {
        unlink($json_file);
        header('Content-Type: application/json');
        echo json_encode(array('results'=>'Scores cleared'));
        exit;
    }

    $data = explode(',', $_REQUEST['data']);
    $updated=false;
    $output='';

    foreach ($all as &$rec) {

        mylog('Searching '.$rec. ' for '.$data[0]);
        if ( stripos($rec, $data[0]) !== false ) {
            $rec=$_REQUEST['data'];
            mylog( "Found. Updated: " . $_REQUEST['data']);
            $updated=true;            
        }
        $e=explode(',', $rec);
        $output.='<tr><td class="color">'.$e[0].'</td><td class="color2">'.$e[1].'</td><td class="color">'.$e[2].'</td><td class="color2">'.$e[3].'</td><td class="color">'.$e[4].'</td></tr>';
    }
    $output=rtrim($output,'<br>');

    if ( $updated === false ) {
        array_push($all, $_REQUEST['data']);
    }
    file_put_contents( $json_file, json_encode($all));

}

mylog('ALL array is size '.count($all));

header('Content-Type: application/json');
echo json_encode(array('results'=>$output));
exit;


function mylog($str){

    if ( $GLOBALS['debug'] = 1 ) {
        $today = date("M j Y G:i:s");

        $holder = error_log($today . ' ::: ' . $str . "\n", 3, $GLOBALS['log_file']);
    }

}


?>

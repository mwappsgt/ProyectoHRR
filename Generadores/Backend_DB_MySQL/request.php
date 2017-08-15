<?php

	$postdata = file_get_contents("php://input");

	if($request = json_decode($postdata)){
		$opc = $request->opc;
		$db = $request->dbName;
		$table = $request->table;

		$dbUser = "".$request->dbUser;
		$dbPassword = "".$request->dbPassword;
		$dbHost = "".$request->dbHost;
		
// 		// Database
	    $servername = "".$dbHost;
	    $username = "".$dbUser;
	    $password = $dbPassword;
	    $dbname = "".$db;

	    // $servername = "localhost";
	    // $username = "root";
	    // $password = "";
	    // $dbname = "appflujosdb";

	    // Create connection
	    $conn = new mysqli($servername, $username, $password,$dbname);

	    // Check connection
	    if ($conn->connect_error) {
	        die("Connection failed: " . $conn->connect_error);
	    }else{
	    
			$dat = mysqli_query($conn, "
				describe ".$table."
			");

			if ($dat) {

echo '
--------------------------------------------------------------------
  _                                   
 |_  ._   _   ._   _|_   _   ._    _| 
 |   |   (_)  | |   |_  (/_  | |  (_| 

---------------------------------------------------------------------

----------JSON con datos---------------------------------------------
{
';
while($r1 = mysqli_fetch_assoc($dat)){
echo '	'.$r1["Field"].',
';
}
echo '}
';

			$dat = mysqli_query($conn, "
				describe ".$table."
			");

			if ($dat) {

echo '

----------AngularJS Controller (Colocar en el ng-click)--------------------

param = {
';
while($r1 = mysqli_fetch_assoc($dat)){
echo '	'.$r1["Field"].':""+$scope.'.$r1["Field"].',
';
}
echo '}

$http.post("/\'/'.$table.'Insert\'",{param:param}).then(
    function(obj){
        console.log(""+JSON.stringify(obj.data))
    }
).catch(
    function(err){
        console.log(err)
    }
);

----------Formulario generado con campos--------------------

';

}

				$dat = mysqli_query($conn, "
					describe ".$table."
				");
			}

			if ($dat) {

while($r1 = mysqli_fetch_assoc($dat)){

echo '
<div class="input-group col-sm-11 col-md-11 col-lg-11">
    <label id="l_'.$r1["Field"].'" class="input-group-addon labelAddon" for="'.$r1["Field"].'">'.$r1["Field"].'</label>
    <input id="'.$r1["Field"].'" class="form-control" type="text" aria-describedby="l_'.$r1["Field"].'" ng-model="'.$r1["Field"].'">
</div>
';

}

echo '
--------------------------------------------------------------------------

  _                              
 |_)   _.   _  |    _   ._    _| 
 |_)  (_|  (_  |<  (/_  | |  (_| 

---------------------------------------------------------------------------

----------routes/web.php---------------------------------------------------
';

echo '
Route::post(\'/'.$table.'Insert\', \'HomeController@'.$table.'Insert\')->name(\''.$table.'Insert\');
';

echo '
----------app/Http/Controllers/HomeController------------------------------------------------
';

}

$dat = mysqli_query($conn, "
				describe ".$table."
			");

			if ($dat) {
echo '

public function '.$table.'Insert(){

	$par = $request->all()["param"];

	$id = DB::table(\''.$dbname.'\')->insertGetId(
		[';

				while($r2 = mysqli_fetch_assoc($dat)){

	echo '
			\''.$r2["Field"].'\' => "".$par[\''.$r2["Field"].'\'],';
	}
	echo '
		]
	);
}
	';

echo '
-------------------------------------------------------------
';

				
			}
	    }		
	}else{
		echo "No entro";
 	}

<?php 


if(isset($_SESSION['Personid'])) {

    $requser = $bdd->prepare("SELECT * FROM persons WHERE Personid = ?");
    $requser->execute(array($_SESSION['Personid']));
    $userinfo = $requser->fetch();
    $email = 'celinedeboeck@gmail.com';
    $size = 150;
    $grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . "&s=" . $size;

 echo $grav_url;
// $email = "celinedeboeck@gmail.com";
// $default = "https://www.somewhere.com/homestar.jpg";
// $size = 40;
// $grav_url = curl_init("https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . "&s=" . $size
// );
// $data = curl_exec($grav_url);
// 	if ($data === false){
// 		var_dump(curl_error($grav_url));
// 	}
// curl_close($grav_url);
   

}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Test</h1>
<img src="<?php echo $grav_url; ?>" alt="" />
</body>
</html>
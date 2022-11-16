<?php
$usersIP="";
$ipDataObject['latitude']="";
$ipDataObject['longitude']="";
if($_SERVER['REQUEST_METHOD']=="POST"){

//Get users IP Address
$usersIP=$_SERVER['REMOTE_ADDR'];

$IP = curl_init();
//Create the free open API Key from https://freegeoip.io/ and replace where there is **********
curl_setopt_array($IP, array(
  CURLOPT_URL => 'https://api.freegeoip.app/json/'.$usersIP.'?apikey=******************************',
  CURLOPT_RETURNTRANSFER => true,
),
);
//Execute the IP Address
$IP_TRACKED = curl_exec($IP);
//Close cURL Session for Tracking IP
curl_close($IP);

//Convert the trapped IP to object format from json format
$ipDataObject=json_decode($IP_TRACKED,true);

if(empty($ipDataObject)==false){
  echo "<center>";
    echo "Tracked Successfully. <br><br>";
    echo "Country Name: ".$ipDataObject['country_name'] ."<br>"; 
    echo "Country Code: " .$ipDataObject['country_code']."<br>";
    echo "Region Name: " .$ipDataObject['region_name']."<br>";
    echo "Region code: " .$ipDataObject['region_code']."<br>";
    echo "Country City: ".$ipDataObject['city']."<br>";
    echo "Zip Code: " .$ipDataObject['zip_code']."<br>";
    echo "Latitude: " .$ipDataObject['latitude']."<br>";
    echo "Longitude: " .$ipDataObject['longitude']."<br>";
    echo "Timezone: " .$ipDataObject['time_zone']."<br><br>";
    echo "Your Public IP Address is: ".$usersIP;
    
    
}
else{
    echo "Tracking failed";
    
}
echo "</center>";


}
?>



<!-- INITIALISNG IP Tracking-->

<!DOCTYPE html>

<head>
    <title>IP TRACKING</title>
    <meta charset="utf-8" />
    <meta name="developer" content="Chanda Chewe" />
    <meta name="description" content="IP TRACKING" />
    <meta name="revised" content="16/09/2021" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
<!-- style css -->
<link rel="stylesheet" type="text/css" href="Assets/MoMoAPICss.css">
  </head>

<body>
    <center>
        <div>
           <iframe  src="https://maps.google.com/maps?q=<?php echo $ipDataObject['latitude'];?>,<?php echo $ipDataObject['longitude'];?> &z=15&output=embed" width="300" height="250" frameborder="0" style="border:0"></iframe>  
        </div>
     
        
  <form action="<?PHP echo ($_SERVER['PHP_SELF']); ?>"; method="POST">
    <h3>IP TRACKING</h3>
    <h4>TRACK USER</h4>
        <input type="text" name="IP" id="name" value="<?php echo 'Your IP ADDRESS IS: '.$usersIP; ?>" placeholder="Your IPV4/IPV6 will show here" readonly ></br>
        <input type="submit" value="Track Yourself" id="upload">
        <br><br>
        
        </form>
        
      
        
        <!--notes-->
        <small style="color:blue">Click the "Track Yourself" button above to view your Public IP Address."</small>
      
    </center>
    
        
</body>
</html>


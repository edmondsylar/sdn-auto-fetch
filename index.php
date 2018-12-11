<?php
  // $url = "https://www.treasury.gov/ofac/downloads/consolidated/consolidated.xml";
  // $url = "https://scsanctions.un.org/al-qaida/";
  // $url = "https://scsanctions.un.org/resources/xml/en/consolidated.xml";
  $url = "https://www.treasury.gov/ofac/downloads/consolidated/consolidated.xml";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_URL, $url);

  $data = curl_exec($ch);
  curl_close($ch);

  $xml = simplexml_load_string($data);
  $con = mysqli_connect("localhost", "root", "");
  mysqli_select_db($con, "sanctions") or die(mysqli_error());

foreach($xml -> sdnEntry as $raw){
    $uid = $raw -> uid;
    $firstName = $raw -> firstName;
    $fast = str_replace('\'', ' ', $firstName);
    $lastName = $raw -> lastName;
    $last = str_replace('\'', ' ', $lastName);
    // $last = quoted_printable_decode($lastName);
    $sdnType = $raw -> sdnType;



    $sql = "INSERT INTO `individuals_and_entities` (`uid`, `firstName`, `lastName`, `sdnType`)"
    . "VALUES ('$uid', '$fast', '$last', '$sdnType')";

    $results = mysqli_query($con, $sql) or die(mysql_error());
    if (!$results){
      echo "Mysql Error";
    } else{
      // echo 'Record added. SUCCESS!';
    }


  }
 ?>
 <!-- @ESS -->

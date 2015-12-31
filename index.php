<html>
	<head>
	<meta http-equiv="refresh" content="300">
	<title>WUDS</title>
	</head>
<body>
<?php
echo "Refresh Time: " . date("h:i:sa");
?>
<center>
<?php
define('ROOT', __DIR__);

   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open (ROOT . '/wuds/log.db');
      }
   }
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   }

$sql =<<<EOF
      SELECT *,COUNT(*) from probes group by mac ORDER BY rssi DESC;
EOF;

$ret = $db->query($sql);
$num_row = 0;
echo "<table border=\"1\"><tr><th>Device</th><th>MAC</th><th>Vendor</th><th>Strength</th><th>Hits</th></tr>";
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
      //echo "MESSAGe = ". $row['msg'] . "\n";
      $num_row ++;
      echo "<tr><td>".$num_row."</td><td>".$row["mac"]."</td><td>".$row["oui"]."</td><td>".$row["rssi"]."</td><td>".$row["COUNT(*)"]."</td></tr>";
   }
   echo "</table>";
   //echo "Operation done successfully\n";
   $db->close();
?>
</center>
</body>

</html>











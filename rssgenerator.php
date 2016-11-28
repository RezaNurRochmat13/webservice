<?php
$db_name = "sit";
$connection = mysql_connect("localhost", "root", "") or die("Could not connect");
$db = mysql_select_db($db_name);
$query = "SELECT * FROM berita ORDER BY datetime DESC";
$result = mysql_query($query, $connection) or die("Could not run query");
$result = mysql_query($query, $connection) or die("Could not run query");
 
echo "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>";
echo "<rss version=\"2.0\">";
echo "<channel>";
echo "<title>RSS Feed Reza Nur</title>";
echo "<link>http://10.10.6.22</link>";
echo "<description>RSS Feed Berita Terkini</description>";
echo "<language>id-id</language>";	
echo "<copyright>http://10.10.6.22</copyright>";
echo "<lastBuildDate>".date("D, d M Y H:i:s")." +0700</lastBuildDate>";
echo "<generator>beritaku (rssfeed@beritaku.com)</generator>";
 
while ($row = mysql_fetch_array($result,MYSQL_ASSOC))
{
 $datetime = date("D, d M Y H:i:s",strtotime($row['datetime']));
 $judul = $row['judul'];
 $tautan = $row['tautan'];
 $isi = $row['isi'];
 
 echo "<item>";
 echo "<title>$judul</title>";
 echo "<link>$tautan</link>";
 echo "<pubDate>$datetime +0700</pubDate>";
 echo "<description>$isi</description>";
 echo "<guid>$tautan</guid>";
 echo "</item>";
}
 
echo "</channel>";
echo "</rss>";
?>
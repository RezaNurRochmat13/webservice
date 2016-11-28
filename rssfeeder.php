<body style='padding:10px; font-family:Arial; text-align:justify; font-size:14px; line-height:20px;'>
<form method='POST' action=''>
<select name='URLFeed' onchange="this.form.submit()" style='width:200px; border:1px solid #C00;'>
<option value=''>Silahkan Pilih ...</option>
<option value='http://www.antara.co.id/rss/news.xml'>Antara News</option>
<option value='http://detik.feedsportal.com/c/33613/f/656090/index.rss'>HOT Detik</option>


<option value='http://10.10.6.22/rssgenerator.php'>Berita SIT Feeder</option>
</select>
</form>
<hr size=1 color=#C00 />
<?php
	if(isset($_POST["URLFeed"])) {
		$URLFeed = $_POST["URLFeed"];
	}
	
	$feed = file_get_contents("$URLFeed");
	$xml = new SimpleXmlElement($feed, LIBXML_NOCDATA);
	if(isset($xml->channel)) {
		$cnt = count($xml->channel->item);
?>

<?php
		for($i=0; $i<$cnt; $i++)
		{
			$url = $xml->channel->item[$i]->link;
			$title = $xml->channel->item[$i]->title;
			$pubDate = $xml->channel->item[$i]->pubDate;
			$desc = $xml->channel->item[$i]->description;
?>
<table border=0 cellpadding=0 cellspacing=0><tr><td style='font-family:Arial; text-align:justify; font-size:14px; line-height:20px;'>
<a href='http://www.ugm.ac.id'><?php echo $title; ?></a>
			<br />
			<?php echo $pubDate; ?>
			<br />
			<?php echo $desc; ?>
			<br />
			</td></tr></table>
<?php
		}
	}
	else
	{
		echo "Bukan RSS";
	}
?>
</body>
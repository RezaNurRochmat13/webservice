<?php
if(!empty($_POST['nilai1']) and !empty($_POST['nilai2'])){
require_once('nusoap.php');

$client = new nusoap_client('http://10.10.5.31/webservice/server_wsdl.php?wsdl',true);


$nilai1 = $_POST['nilai1'];
$nilai2 = $_POST['nilai2'];

$result = $client->call('hello',array('angka1' => $nilai1, 'angka2' => $nilai2));

}else{
	$nilai1 = "";
	$nilai2 = "";
	$result = "";
}
?>

<form action="" method="post">
<input type=text name=nilai1 value=<?php echo $nilai1; ?> > + 
<input type=text name=nilai2 value=<?php echo $nilai2; ?> > = 
<?php echo $result; ?>
<br><br>
<input type=submit value=tambahkan >
</form>

<?php
//cek untuk error
$err = $client->getError();

if($err){
//tampilkan pesan error
echo '<h2>Constructor error</h2><pre>'.$err.'</pre>';
}


//cek untuk kegagalan
if($client->fault){
echo '<h2></h2<pre>';
print_r($result);
echo '</pre>';
}else{
//cek untuk error
$err = $client->getError();
if($err){
//tampilkan pesan kesalahan
echo '<h2>Error</h2><pre>'.$err.'</pre>';
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>URL Shortener</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style type="text/css">
#form1 p {
text-align:center;
}
.header {
	font-family: "Fertigo Pro", Fontin, Calluna, Steinem;
	font-size: 36px;
	width: 100%;
	text-align: center;
	top: 5%;
	position: absolute;
}
.content {
	position: absolute;
	width: 900px;
	top: 25%;
	left: 10%;
	
}
</style>
</head>

<body>

<div class="header">Nintex TEST - URL Shortener<hr /></div>
<div class="content">
	<form id="form1" name="form1" method="POST" action="">
		<div class="row">
		  <div class="col-sm-1" style="padding-top: 5px;">URL: </div>
		  <div class="col-sm-8"><input type="text" name="url" class="form-control" id="url" required /></div>
		  <div class="col-sm-3"><input type="submit" name="Submit" id="Submit" class="form-control btn-primary" value="Shorten" /></div>
		</div>
		<p style="margin-top: 3%;">&nbsp;</p>
		<div class="row">
			<?php
				if(isset($_REQUEST['Submit'])) {
					
					$url = $_POST['url'];
					
					if (filter_var($url, FILTER_VALIDATE_URL) === FALSE) {
					    echo '<div class="col-sm-8 text-center"><h4><span class="label label-danger">Not a valid URL</span></h4></div>';
					} else {
						$new_url = get_tiny_url($url);
						echo "<div class='col-sm-8 text-center'><h3>Shortened URL is <span class='label label-primary'><a href='".$new_url."' target='_blank' style='color:white;'>".$new_url."</a></pan></h3></div>";
					}
				}
			?>
		</div>
	</form>
</div>

</body>
</html>

<?php
//Function to Create Tiny URL 
function get_tiny_url($url)  {  
	$ch = curl_init();  
	$timeout = 5;  
	curl_setopt($ch,CURLOPT_URL,'http://tinyurl.com/api-create.php?url='.$url);  
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);  
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);  
	$data = curl_exec($ch);  
	curl_close($ch);  
	return $data;  
}
?>

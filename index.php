<!doctype html>
<html lang="en">
<head>
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<title>Parse BBC news with PHP</title>
	<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />

</head>

<?php
	if ( isset($_POST['submitted']) ) {
		$newsoutput = new SimpleXMLElement('http://feeds.bbci.co.uk/news/rss.xml', LIBXML_NOCDATA, true);
		$newsoutput = json_decode(json_encode($newsoutput), TRUE);
	}
?>

<html>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1><a href="">Home</a></h1>
					<h4>This is open-source code created by <a href="http://www.phpgenie.co.uk/">PHP Genie</a>.</h4>
					<p>
						View the accompanying blog post <a href="">here</a>.
					</p>
				</div>
			</div>

			<hr>

			<div class="row">
				<div class="col-md-12">
					<form action="" class="form" method="post">
						<input type="hidden" name="submitted" value="submitted">
						<input type="submit" value="<?php echo (isset($_POST['submitted']))?"Refresh the BBC news RSS feed":"Parse the BBC latest news feed";?>">
					</form>

					<?php
					if (isset($_POST['submitted'])) {
						echo "<hr>";
						foreach ($newsoutput['channel']['item'] as $item) { ?>
							<p>
								<strong><a target="_blank" href="<?php echo $item['link']; ?>"><?php echo $item['title']; ?></a></strong>
							</p>
							<p>
								<?php echo $item['description'] ?>
							</p>
							<hr>
						<?php }
					}
					?>
				</div>
			</div>
		</div>
	</body>
</html>
<?php echo doctype("html5"); ?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Home page</title>
        <link href="<?php echo base_url(); ?>styles/style.css" type="text/css"  rel="stylesheet"  />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"
type = "text/javascript" charset= "utf-8"></script>
</head>

<?php 

echo "Bine ai venit" . " " . $username;?>  <a href="site">Logout</a>
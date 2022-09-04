<?php
	include("mojezaglavlje.php");
?>
<?php
	$bp=SpajanjeNaBazu();
	



	if(isset($_POST['search'])) {
		$searchq = $_POST['search'];
		$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
		
		$query = mysql_query("SELECT * FROM 'pjesma' WHERE naziv LIKE '%$searchq%'") or die("nije se moglo pretražiti");
		$count = mysql_num_rows($query);
		if($count == 0){
			$output = 'Nema rezultata';
		}else{
			while($row = mysql_fetch_array($query)){
				$naziv = $row['naziv'];
				
				$output .= '<div> '.$naziv.'</div>';
			}
		}
	}
?>

<!DOCTYPE html>
<body>
	<form action="pjesme.php" method="post">
		<input type="text" name="search" placeholder="Pretraži pjesme">
		<input type="submit" value=">>"/>
	</form>
	
	<?php print("$output");?>
</body>
</html>
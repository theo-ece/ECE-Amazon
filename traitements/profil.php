<?
	$resultat=mysql_query("tarequete",$id_connexion);
?>
<table>
	<?
		while($tab=mysql_fetch_row($resultat))
		{
		     echo "<tr>";
		     for($i=0;$i<mysql_num_fields($resultat))
		     {
		          echo "<td>$tab[$i]</td>";
		     }
		     echo "</tr>";
		 
		}
	?>
</table>
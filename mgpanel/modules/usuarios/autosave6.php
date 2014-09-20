<?php 

require_once('../inc/conexion_modules.inc.php'); 

echo "<h3>Database fields</h3>";
$resultwhole = mysql_query("SELECT * FROM sis_users");
echo "<table><tr><td>ID</td><td>Name</td><td>Email</td><td>Text</td><td>Select</td><td>Radio</td><td>Checkbox 1:Value</td><td>Checkbox 2:Boolean</td></tr>";
while ($rowwhole = mysql_fetch_array($resultwhole)){
echo "<tr>";
echo "<td>".$rowwhole['id_usuario']."</td>";
echo "<td>".$rowwhole['nombre_usuario']."</td>";
echo "<td>".$rowwhole['email_usuario']."</td>";
echo "</tr>";
}
echo "</table>";



mysql_close($con);?>

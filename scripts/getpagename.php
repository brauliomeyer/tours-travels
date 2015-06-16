<?php
// Connect to server and select databse.
include("common/connection.php");
$pagename = $_GET['pagename'];
$query = "SELECT * FROM managecontents where Pagename='" . $pagename . "'";

$result = mysql_query($query);
while ($row = mysql_fetch_array($result)) {
    $Pagename = $row['Pagename'];
    $SEO_title = $row['SEO_title'];
    $SEO_keyword = $row['SEO_keyword'];
    $SEO_description = $row['SEO_description'];
    $Details = $row['Details'];
    $Content = $row['Content'];
}
?>

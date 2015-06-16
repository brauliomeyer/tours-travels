<?php
/***************************************************************************
| valstrik.php
|
| bottrap. No visitor or any good bot should ever reach this page
| so all IP's that get here may safely be blocked!
|
| created  : 26/05/06 by Walter
| modified :
|
***************************************************************************/
/***************************************************************************
|
| This program is free software; you can redistribute it and/or modify
| it under the terms of the GNU General Public License as published by
| the Free Software Foundation; either version 2 of the License, or
|(at your option) any later version.
|
***************************************************************************/

//connecteer de database
$db = mysql_connect('server', 'username', 'password');
if (!$db )
{
   die('Could not connect: ' . mysql_error());
}

//Controle. IP alstublieft!
$sql = "SELECT ip FROM banned_ips WHERE ip = '" . $user_ip . "'";
if ( !$result = mysql_query($sql) )
{
    message(MSG_CRITICAL, '', '', 0, '', __FILE__, __LINE__, '');
}
if ( mysql_num_rows ($result) > 0 )
{
    //aantal gevonden rijen is groter als 0, dit ip-adres is dus reeds gebanned!
    header('HTTP/1.0 403 Forbidden');
    header('Location: error403_botval.html);
    exit;
}

//bepaal het ip-adres
//(c)  PHPBB2 - www.phpbb.com
if ( getenv('HTTP_X_FORWARDED_FOR') != '' )
{
    $client_ip = ( !empty($_SERVER['REMOTE_ADDR']) ) ? $_SERVER['REMOTE_ADDR'] : ( ( !empty($HTTP_ENV_VARS['REMOTE_ADDR']) ) ? $HTTP_ENV_VARS['REMOTE_ADDR'] : $REMOTE_ADDR );

    $entries = explode(',', getenv('HTTP_X_FORWARDED_FOR'));
    reset($entries);
    while (list(, $entry) = each($entries))
    {
        $entry = trim($entry);
        if ( preg_match("/^([0-9]+.[0-9]+.[0-9]+.[0-9]+)/", $entry, $ip_list) )
        {
            $private_ip = array('/^0./', '/^127.0.0.1/', '/^192.168..*/', '/^172.((1[6-9])|(2[0-9])|(3[0-1]))..*/', '/^10..*/', '/^224..*/', '/^240..*/');
            $found_ip = preg_replace($private_ip, $client_ip, $ip_list[1]);

            if ( $client_ip != $found_ip )
            {
                $client_ip = $found_ip;
                break;
            }
        }
    }
}
else
{
    $client_ip = ( ! empty($_SERVER['REMOTE_ADDR']) ) ? $_SERVER['REMOTE_ADDR'] : ( ( ! empty($HTTP_ENV_VARS['REMOTE_ADDR']) ) ? $HTTP_ENV_VARS['REMOTE_ADDR'] : $REMOTE_ADDR );
}

//voeg het toe aan de database
$bandate = time(); //timestamp, als je liever een leesbaarder formaat gebruikt: $bandate = date('Y-m-d H:i:s', time());

//probeer het in te voeren, als dit mislukt bestaat het ip-adres reeds in de database (dmv de unique key)
$sql = "INSERT INTO banned_ips (id, bandate, ip) VALUES (NULL, " . $bandate . ", '" . $client_ip . "')";
if ( !mysql_query($sql) )
{
    //mislukt, dus het bestaat reeds: update de bandate
    //normaliter hef je een ban na x tijd op (30 dagen is gebruikelijk) omdat ip-adressen, hier maken we de bandatum weer actueel omdat
    //dit ip-adres nog steeds in handen is van spammers.
    $sql = "UPDATE banned_ips SET bandate = " . $bandate . " WHERE ip = '" . $client_ip . "'";
    if ( !mysql_query($sql) )
    {
        //nog steeds mislukt??? whoops, we hebben blijkbaar een probleempje.
        //normaal kan dit niet voorkomen, maar in het geval van wel geven we een foutboodschap. Een spambot heeft hier geen boodschap aan,
        //mocht het per ongeluk toch een echte bezoeker zijn dan weet hij wat er aan de hand is & mss verwittigt hij je wel?
        echo 'SQL-fout. Gelieve de beheerder op te hoogte brengen via braulio_meijer@yahoo.com.<br />';
        echo 'Je wordt binnen 7 seconden doorverwezen naar <a href="http://www.brauliodesignresearch.com">brauliodesignresearch</a>';
        echo '<META HTTP-EQUIV="refresh" CONTENT="7;URL=http://www.brauliodesignresearch.com">';
    }
}


//geef de pagina de status "error 403 verboden". Met een beetje geluk hebben de spammers hun programma zo ingesteld dat ze dat opvanen & doorhebben
//dat ze bij jou niet meer terechtkunnen & je dus met rust laten
header('HTTP/1.0 403 Forbidden');
//ga door naar een errorpagina (zodat een gewone bezoeker de foutboodschap kan lezen & je eventueel op de hoogte kan brengen
header(Location: ../error403_botval.html);
exit;
?>
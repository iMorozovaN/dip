<?php

function dbConnect( $dbHost, $dbUser, $dbPass, $dbName ) {

    MYSQL_CONNECT($dbHost, $dbUser, $dbPass) OR DIE("no db_connect");
    mysql_query ("SET SESSION character_set_server='utf8'");
    mysql_query ("set character_set_client='utf8'");
    mysql_query ("set character_set_results='utf8'");
    mysql_query ("set collation_connection='utf8_general_ci'");
    mysql_select_db("$dbName") or die("Can not select DB");

}

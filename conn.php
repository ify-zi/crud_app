<?php

    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

    $server = $url["host"];
    $username =$url["user"];
    $password = $url["path"];
    $db = substr($url["path"], 1);

    $conn = new mysqli($server, $username, $password, $db);

    $name=$stock=$amount="";

    ?>
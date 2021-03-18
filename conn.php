<?php

    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

    $db_server = $url["host"];
    $db_username =$url["user"];
    $db_password = $url["pass"];
    $db = substr($url["path"], 1);

    $active_group = "default";
    $query_builder = True;

// connect to db
    $conn = mysqli_connect($db_server, $db_username, $db_password, $db);
    ?>
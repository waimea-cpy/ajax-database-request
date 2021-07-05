<?php
    include_once 'common-functions.php';

    // Get the supplied pet ID from the URL
    $petID = $_GET['id'];

    // Get the pet record...
    $sql = 'SELECT name, species, description
            FROM pets
            WHERE id=?';

    // We should get an array with just a single record
    $pets = getRecords( $sql, 'i', [$petID] );

    // Get the first and only record
    $pet = $pets[0];

    // Pass back a JSON encoded string of data
    echo json_encode( $pet );
?>

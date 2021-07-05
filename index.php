<?php
    include_once 'common-functions.php';
?>

<!doctype html>

<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pets AJAX Demo</title>
        <link rel="stylesheet" href="css/styles.css">
        <script src="scripts/request.js"></script>
    </head>

    <body>

        <header id="mainheader">
            <h1>Pets AJAX Demo</h1>
            <p>Note the lack of page refreshes... All data is obtained asynchrnously and the page is modified directly via JavaScript</p>
        </header>

        <main>

            <section id="pets">
<?php
    // Get the pet records
    $sql = 'SELECT id, name
            FROM pets
            ORDER BY name ASC';

    // We should get an array of records
    $pets = getRecords( $sql );

    // Loop through them all
    foreach( $pets as $pet ) {

        // Show the data for each one
        echo '<div class="pet" onclick="getPetDetails('.$pet['id'].');">';
        echo   '<h3>'.$pet['name'].'</h3>';
        echo '</div>';
    }
?>
            </section>

            <section id="petdetails">
                <p>Click a pet to see the details...</p>
            </section>

        </main>
    </body>
</html>

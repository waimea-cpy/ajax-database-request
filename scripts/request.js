//-----------------------------------------------------
// Request the details of a specific pet from the DB
// The ID of the required pet is provided
//-----------------------------------------------------
function getPetDetails( petID ) {
    console.log( 'Requesting details for pet, id:' + petID );

    // Setup an HTTP request
    const request = new XMLHttpRequest();

    // Add the id to the request URL
    const url = 'pet-details.php?id=' + petID;

    // Send the request to the server
    request.open( 'GET', url );
    request.send();

    // Function to run when we get back a response
    request.onreadystatechange = () => {
        // Is it a positive response?
        if( request.readyState == 4 && request.status == 200 ) {
            // Yes, so process the JSON data received
            const petJSON = request.responseText;
            console.log( 'Response received: ' + petJSON );
            const petInfo = JSON.parse( petJSON );

            // Clear out the details div
            const detailsDiv = document.getElementById( 'petdetails' );
            detailsDiv.innerHTML = '';

            // Create new elements to display the pet info
            const name        = document.createElement( 'h3' );
            const species     = document.createElement( 'p' );
            const description = document.createElement( 'p' );

            // Populate the info
            name.innerHTML        = petInfo.name;
            species.innerHTML     = 'Species: ' + petInfo.species;
            description.innerHTML = 'Description: ' + petInfo.description;
            
            // And display it
            detailsDiv.appendChild( name );
            detailsDiv.appendChild( species );
            detailsDiv.appendChild( description );
        }
    };
}


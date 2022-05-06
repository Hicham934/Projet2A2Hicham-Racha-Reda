
function showMap( position ) {
    const map = document.getElementById("map");
    map.src="https://maps.google.com/maps?q="+ position.coords.latitude +","+ position.coords.longitude +"&output=embed";
}


function erreurHandler(positionError)  {
   if(positionError.code == 1) { // PERMISSION_DENIED
       alert("Erreur: Permission refusée! " + positionError.message);
   } else if(positionError.code == 2) { // POSITION_UNAVAILABLE
       alert("Erreur: Position indisponible " + positionError.message);
   } else if(positionError.code == 3) { // TIMEOUT
       alert("Erreur: Temps libre!" + positionError.message);
   }
}

function showInfos()  {
  navigator.geolocation.getCurrentPosition(showMap, erreurHandler);
}

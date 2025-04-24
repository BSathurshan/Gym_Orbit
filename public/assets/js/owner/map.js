let map;
let marker;

document.getElementById("location-googleMap").addEventListener("click", () => {
  document.getElementById("inlineMapContainer").style.display = "block";
  setTimeout(initMap, 200);
});

function initMap() {
  const defaultLocation = { lat: 6.9271, lng: 79.8612 };
  map = new google.maps.Map(document.getElementById("map"), {
    center: defaultLocation,
    zoom: 10,
  });

  marker = new google.maps.Marker({
    position: defaultLocation,
    map: map,
    draggable: true,
  });

  updateAddressFromLatLng(defaultLocation);

  map.addListener("click", function (event) {
    marker.setPosition(event.latLng);
    updateAddressFromLatLng(event.latLng);
  });

  marker.addListener("dragend", function (event) {
    updateAddressFromLatLng(event.latLng);
  });
}

function updateAddressFromLatLng(latlng) {
  const geocoder = new google.maps.Geocoder();
  geocoder.geocode({ location: latlng }, function (results, status) {
    if (status === "OK" && results[0]) {
      document.getElementById("gymAddress").value = results[0].formatted_address;
      document.getElementById("gymLat").value = latlng.lat();
      document.getElementById("gymLng").value = latlng.lng();
    }
  });
}

// function saveGymLocation() {
//   const address = document.getElementById("gymAddress").value;
//   document.querySelector("#location-googleMap .data").textContent = address;
//   document.getElementById("inlineMapContainer").style.display = "none";

//   console.log("Saved Location:", {
//     lat: document.getElementById("gymLat").value,
//     lng: document.getElementById("gymLng").value,
//     address: address,
//   });
// }

function cancelMapEdit() {
  document.getElementById("inlineMapContainer").style.display = "none";
}

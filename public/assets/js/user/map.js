let userMap, gymsMap, marker;

// 1. Trigger address picker modal
document.getElementById("location-googleMap").addEventListener("click", () => {
  document.getElementById("inlineMapContainer").style.display = "block";
  setTimeout(initUserMap, 200);
});

// 2. User location picker (in modal)
function initUserMap() {
  const defaultLocation = { lat: 6.9271, lng: 79.8612 };

  userMap = new google.maps.Map(document.getElementById("map"), {
    center: defaultLocation,
    zoom: 10,
  });

  marker = new google.maps.Marker({
    position: defaultLocation,
    map: userMap,
    draggable: true,
    icon: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png",
  });

  updateAddressFromLatLng(defaultLocation);

  userMap.addListener("click", function (event) {
    marker.setPosition(event.latLng);
    updateAddressFromLatLng(event.latLng);
  });

  marker.addListener("dragend", function (event) {
    updateAddressFromLatLng(event.latLng);
  });
}

// 3. Reverse geocoding
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

// 4. Cancel map modal
function cancelMapEdit() {
  document.getElementById("inlineMapContainer").style.display = "none";
}

// 5. Create circular image with a white border
function createGymPinImage(imageUrl, imageSize = 50) {
  return new Promise((resolve) => {
    const img = new Image();
    img.crossOrigin = "anonymous";
    img.src = imageUrl;

    img.onload = () => {
      const canvasWidth = imageSize + 10;  // Width of the image + border
      const canvasHeight = imageSize + 10; // Height of the image + border
      const canvas = document.createElement("canvas");
      canvas.width = canvasWidth;
      canvas.height = canvasHeight;
      const ctx = canvas.getContext("2d");

      const pinCenterX = canvasWidth / 2;
      const circleRadius = imageSize / 2; // Radius for the image circle

      // 1. Draw a white border around the circle
      ctx.beginPath();
      ctx.arc(pinCenterX, pinCenterX, circleRadius + 5, 0, Math.PI * 2); // Outer border circle
      ctx.closePath();
      ctx.fillStyle = "#FF0000"; // White color for border
      ctx.fill();

      // 2. Clip the image inside the circle
      ctx.save();
      ctx.beginPath();
      ctx.arc(pinCenterX, pinCenterX, circleRadius, 0, Math.PI * 2); // Inner circle
      ctx.closePath();
      ctx.clip();

      // 3. Draw the image inside the circle
      ctx.drawImage(
        img,
        pinCenterX - circleRadius, // Horizontal positioning of the image
        pinCenterX - circleRadius, // Vertical positioning of the image
        imageSize, // Width of the image
        imageSize // Height of the image
      );
      ctx.restore();

      // Return the final image URL to be used as the pin
      const dataURL = canvas.toDataURL();
      resolve(dataURL);
    };
  });
}

// 6. Main gym map with custom pins (with image and border)
function initAllGymsMap() {
  const mapContainer = document.getElementById("allGymsMap");
  if (!mapContainer) return;

  const defaultLocation = { lat: 6.9271, lng: 79.8612 };

  gymsMap = new google.maps.Map(mapContainer, {
    center: defaultLocation,
    zoom: 13,
  });

  fetch(`${ROOT}/user/getGymLocations`)
    .then((res) => res.json())
    .then((data) => {
      data.forEach((gym) => {
        if (gym.lat && gym.lang) {
          const lat = parseFloat(gym.lat);
          const lng = parseFloat(gym.lang);

          const imageUrl = gym.file
            ? `${ROOT}/assets/images/owner/profile/images/${gym.file}`
            : "http://maps.google.com/mapfiles/ms/icons/red-dot.png";

          createGymPinImage(imageUrl, 50).then((pinImageUrl) => {
            const marker = new google.maps.Marker({
              position: { lat, lng },
              map: gymsMap,
              title: gym.gym_name || gym.username,
              icon: {
                url: pinImageUrl,
                scaledSize: new google.maps.Size(70, 70), // Set size of the circular pin
                anchor: new google.maps.Point(35, 35), // Anchor in the middle
              },
            });

            const infoWindow = new google.maps.InfoWindow({
              content: `
                <div style="text-align:center;">
                  <strong>${gym.gym_name}</strong><br>
                  <img src="${imageUrl}" width="100" style="margin-top:5px;" />
                </div>`,
            });

            marker.addListener("mouseover", () => {
              marker.setIcon({
                url: pinImageUrl,
                scaledSize: new google.maps.Size(80, 80), // Larger size on hover
                anchor: new google.maps.Point(40, 40),
              });
              infoWindow.open(gymsMap, marker);
            });

            marker.addListener("mouseout", () => {
              marker.setIcon({
                url: pinImageUrl,
                scaledSize: new google.maps.Size(70, 70),
                anchor: new google.maps.Point(35, 35),
              });
              infoWindow.close();
            });
          });
        }
      });
    });
}

// 7. Load map on page load
window.addEventListener("load", () => {
  initAllGymsMap();
});

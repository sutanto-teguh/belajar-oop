function sendLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(sendPositionToServer);
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}

function sendPositionToServer(position) {
    const data = {
        latitude: position.coords.latitude,
        longitude: position.coords.longitude
    };

    fetch('save_location.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(response => response.text())
    .then(data => {
        console.log('Success:', data);
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}
}
var map_contacts;
var map_marker = "/wp-content/themes/aqm/img/map_marker.png";
var map_selector = '.google_map';


function initMapYellow() {

    var mapOptions = {
        zoom: 15,
        center: {
            lat: 46.391500,
            lng: 30.712782,
        },
        disableDefaultUI: true,
        styles: styleArrayYellow
    }



    map_contacts = new google.maps.Map(document.querySelector(map_selector), mapOptions);

    var marker = new google.maps.Marker({
        position: {
            lat: 46.391500,
            lng: 30.712782,
        },
        map: map_contacts,
        icon: map_marker
    });
}

function initMapDark() {

    var mapOptions = {
        zoom: 15,
        center: {
            lat: 46.395324,
            lng: 30.72,
        },
        disableDefaultUI: true,
        styles: styleArrayDark
    }



    map_contacts = new google.maps.Map(document.querySelector(map_selector), mapOptions);

    var marker = new google.maps.Marker({
        position: {
            lat: 46.391500,
            lng: 30.712782,
        },
        map: map_contacts,
        icon: map_marker
    });
}




var styleArrayYellow = [
    {
        "featureType": "administrative",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#efc235"
      }
    ]
  },
    {
        "featureType": "landscape",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#efc235"
      }
    ]
  },
    {
        "featureType": "poi",
        "stylers": [
            {
                "visibility": "off"
      }
    ]
  },
    {
        "featureType": "poi",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#eec135"
      }
    ]
  },
    {
        "featureType": "road",
        "stylers": [
            {
                "visibility": "on"
      }
    ]
  },
    {
        "featureType": "road",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#e5b82b"
      }
    ]
  },
    {
        "featureType": "road",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "visibility": "off"
      }
    ]
  },
    {
        "featureType": "road",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#c09306"
      }
    ]
  },
    {
        "featureType": "transit",
        "stylers": [
            {
                "visibility": "off"
      }
    ]
  },
    {
        "featureType": "water",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#ebbd31"
      }
    ]
  }
]




var styleArrayDark = [
    {
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#212121"
      }
    ]
  },
    {
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "on"
      }
    ]
  },
    {
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#757575"
      }
    ]
  },
    {
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "color": "#212121"
      }
    ]
  },
    {
        "featureType": "administrative",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#757575"
      }
    ]
  },
    {
        "featureType": "administrative",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#292a2b"
      }
    ]
  },
    {
        "featureType": "administrative.country",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#9e9e9e"
      }
    ]
  },
    {
        "featureType": "administrative.land_parcel",
        "stylers": [
            {
                "visibility": "off"
      }
    ]
  },
    {
        "featureType": "administrative.locality",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#000000"
      }
    ]
  },
    {
        "featureType": "administrative.locality",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "visibility": "off"
      }
    ]
  },
    {
        "featureType": "landscape",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#292a2b"
      }
    ]
  },
    {
        "featureType": "poi",
        "stylers": [
            {
                "visibility": "off"
      }
    ]
  },
    {
        "featureType": "poi",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#757575"
      }
    ]
  },
    {
        "featureType": "road",
        "stylers": [
            {

      }
    ]
  },
    {
        "featureType": "road",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#2c2c2c"
      }
    ]
  },
    {
        "featureType": "road",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#8a8a8a"
      }
    ]
  },
    {
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#000000"
      }
    ]
  },
    {
        "featureType": "water",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#3d3d3d"
      }
    ]
  }
];

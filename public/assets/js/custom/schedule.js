var _schedule = new Schedule();
var _dom = $(document);
var _window = $(window);
var address = {
  address: '',
  lat: '',
  long: '',
};
var marker, map;
_window.on('beforeunload', onBeforeLoad);
_window.on('load', onLoad);
_dom.ready(onReady);

function onBeforeLoad () {
  _schedule.loader(true);
}

function onLoad () {
  // _schedule.loader(true);
}

function onReady () {
  _schedule.render();
  // _schedule.get();
}

function Schedule () {
  this.url = '/schedule/ao';
  this.data = {};
}

Schedule.prototype.render = function (events) {
  // events = events.map(function(event) {
  //   event.start = new Date(event.appointment_date);
  //   event.className = 'bg-primary';
  //   event.origin_title = event.title;
  //   event.title = event.ref_number;
  //   return event;
  // });
  // $.CalendarApp.init(events);
  // this.loader(false);
  $.CalendarApp.init();
}

Schedule.prototype.get = function () {
  var _self = this;
  this.loader();
  return new Promise(function(resolve, reject) {
      $.get(_self.url)
        .done(function (response) {
          _self.render(response.contents.data)
          resolve({status: true})
        })
        .fail(function(errors) {
            toastr.error(errors)
            reject({status: true})
        })
      }
  );
}

Schedule.prototype.store = function (event) {
  var _self = this;
  _self.loader(true);
  return new Promise(function(resolve, reject) {
    var mapData = {
        title: event.origin_title,
        appointment_date: event.start.format('YYYY-MM-DD'),
        appointment_date_res: event.start.format('YYYY-MM-DD'),
        user_id: event.guest_id,
        ao_id: aoUserID,
        eform_id: event.eform_id,
        ref_number: event.ref_number,
        address: address.address,
        latitude: address.lat,
        longitude: address.long,
        guest_name: event.guest_name,
        desc: event.desc,
        status: 'approved'

    };
    $.post(_self.url, mapData)
      .done(function(response) {
        _self.loader(false);
        resolve(response);
      })
      .fail(function(response) {
        reject({status: false});
        _self.loader(false);
      })
  });
}

Schedule.prototype.update = function (event, editMode) {
  var _self = this;
  if (editMode) {
    this.loader(true);
  }
  return new Promise(function(resolve, reject) {
    var mapData = {
        id: event.id,
        title: event.origin_title,
        appointment_date: event.start.format('YYYY-MM-DD'),
        appointment_date_res: event.start.format('YYYY-MM-DD'),
        user_id: event.guest_id || undefined,
        ao_id: aoUserID,
        eform_id: event.eform_id,
        ref_number: event.ref_number,
        address: address.address || event.address || undefined,
        latitude: address.lat || event.latitude || undefined,
        longitude: address.long || event.longitude || undefined,
        desc: event.desc,
        guest_name: event.guest_name || undefined,

    };
    $.post(_self.url, mapData)
      .done(function(response) {
        _self.loader(false);
        resolve(mapData);
      })
      .fail(function(response) {
        _self.loader(false);
        reject({status: false});
      });
  });
}

Schedule.prototype.refresh = function () {
  this.get()
}

Schedule.prototype.loader = function (status) {
  if (status) {
    HoldOn.open(options)
  } else {
    HoldOn.close()
  }
}


function initialize() {
    var lng = $('#lng').val();
    var lat = $('#lat').val();
    var latlng = new google.maps.LatLng('-6.9032739','107.5729448');
    map = new google.maps.Map(document.getElementById('map'), {
      center: latlng,
      zoom: 7,
      disableDefaultUI: true
    });
    marker = new google.maps.Marker({
      map: map,
      position: latlng,
      draggable: true
      // anchorPoint: new google.maps.Point(0, -29)
   });
    var input = document.getElementById('searchInput');
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
    var geocoder = new google.maps.Geocoder();
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);
    var infowindow = new google.maps.InfoWindow();
    autocomplete.addListener('place_changed', function() {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
        }

        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(7);
        }

        marker.setPosition(place.geometry.location);
        marker.setVisible(true);

        bindDataToForm(place.formatted_address, place.geometry.location.lat(), place.geometry.location.lng());
        infowindow.setContent(place.formatted_address);
        infowindow.open(map, marker);

    });
    // this function will work on marker move event into map
    google.maps.event.addListener(marker, 'dragend', function() {
        geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (results[0]) {
              bindDataToForm(results[0].formatted_address,marker.getPosition().lat(),marker.getPosition().lng());
              infowindow.setContent(results[0].formatted_address);
              infowindow.open(map, marker);
          }
        }
        });
    });
}

$('#event-modal').on('shown.bs.modal', function(event){
  google.maps.event.addDomListener(window, 'load', initialize);
  google.maps.event.trigger(map, "resize");
});
$('#event-modal').on('hidden.bs.modal', function(event){
  $('#searchInput').val('');
});

function initializeDatePicker(selector, selectedDate) {
  selector.datepicker({
       format: "yyyy-mm-dd",
       clearBtn: true,
       multidate: false,
       multidateSeparator: ","
  });
  selector.datepicker('setDate', new Date(selectedDate.format('YYYY-MM-DD')));
}

function initializeMapPosition (event) {
  setTimeout(function () {
    marker.position = new google.maps.LatLng(event.latitude, event.longitude);
    marker.setMap(map);
    map.setCenter(new google.maps.LatLng(event.latitude, event.longitude), 5);
  }, 1000);
}

function bindDataToForm(addressInfo, lat, lng) {
  address.address = addressInfo
  address.lat = lat;
  address.long = lng;
}

google.maps.event.addDomListener(window, 'load', initialize);

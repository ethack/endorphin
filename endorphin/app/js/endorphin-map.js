endorphinApp.controller('endorphinMapController', function($scope, $rootScope, $location, $routeParams, endorphinNetService) {
    L.mapbox.accessToken = window.endorphinConfig.mapbox.accessToken;
    $rootScope.map = L.mapbox.map('map', window.endorphinConfig.mapbox.mapId);

    endorphinNetService.apiGet('/i18n', function(status, data) {
      if(status == 200) {
        $rootScope.i18n = data.response;
      }
    });

    endorphinNetService.apiGet('/devices', function(status, data) {
      if(status == 200) {
        $rootScope.devices = data.response;
      }
    });

    angular.forEach($rootScope.devices, function(device, deviceIndex) {
        endorphinNetService.apiGet('/devices/' + device.id + '/heartbeats/latest', function(status, data) {
          if(status == 200) {
            $rootScope.devices[deviceIndex].heartbeat_latest = data.response;

            var marker = L.marker([device.location_lon, device.location_lat], {
                icon: L.mapbox.marker.icon({
                    'marker-size': 'large',
                    'marker-color': '#BE9A6B',
                    'marker-symbol': 'mobilephone'
                })
            });
            $rootScope.map.setView([device.location_lon, device.location_lat], 8);
            marker.addTo($rootScope.map);
          }
        });
    });
})

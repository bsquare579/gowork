    
      function getLocation(){
        if (navigator.geolocation){
         navigator.geolocation.getCurrentPosition(showPosition, showError, {
          enableHighAccuracy: true
        });
        } else {
              console.log("The Browser Does not Support Geolocation");
            }
      }
      function showError(error) {
            if(error.PERMISSION_DENIED){
                console.log("The User have denied the request for Geolocation.");
            }
          }
      function showPosition(position){
        var lat = position.coords.latitude;
        var lng = position.coords.longitude;
         document.getElementById('user-lat').value = lat;
         document.getElementById('user-long').value = lng;
         sessionStorage.setItem("lat", lat);
         sessionStorage.setItem("lng", lng);

      }
      
      getLocation();
      
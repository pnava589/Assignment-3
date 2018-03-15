function initMap(lati,long) {
                                var uluru = {lat: lati, lng: long};
                                var map = new google.maps.Map(document.getElementById('map'), {
                                  zoom: 10,
                                  center: uluru
                                });
                                var marker = new google.maps.Marker({
                                  position: uluru,
                                  map: map
                                });
                              }
                            
                            
                            
                            
                            
                            
                            
                           
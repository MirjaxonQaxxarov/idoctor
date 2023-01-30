var iconObject = L.icon({
    iconUrl: './img/marker-icon.png',
    shadowSize: [50, 64],
    shadowAnchor: [4, 62],
    iconAnchor: [12, 40]
});

$(document).ready(function (e) {
    jQuery.support.cors = true;

    $(".tab-content").css("display", "none");
    $(".tabs-menu a").click(function (event) {
        // event.preventDefault();
        showTab($(this));
    });

    function showTab(thisDiv) {
        thisDiv.parent().addClass("current");
        thisDiv.parent().siblings().removeClass("current");
        var tab = thisDiv.attr("href");
        $(".tab-content").not(tab).css("display", "none");
        $(tab).fadeIn();

        // a bit hackish to refresh the map
        routingMap.invalidateSize(false);
    }

    var host;// = "http://localhost:9000/api/1";

    //
    // Sign-up for free and get your own key: https://graphhopper.com/#directions-api
    //
    var defaultKey = "8f817b6c-85cd-4234-bfe7-fcdb6979536b";
    var profile = "car";

    var ghRouting = new GraphHopper.Routing({key: defaultKey, host: host, vehicle: profile,optimize:true, elevation: false});
    var routingMap = createMap('issMap');
    setupRoutingAPI(routingMap, ghRouting);

    
    var tmpTab = window.location.hash;
    if (!tmpTab)
        tmpTab = "#routing";

    showTab($(".tabs-menu li > a[href='" + tmpTab + "']"));
});
let yul;
function setupRoutingAPI(map, ghRouting) {
    map.setView([39.644826, 66.968328], 15);
    let x1='39.649221';
    let y1='66.963298';
    let x2='39.668623';
    let y2='66.969961';

    var instructionsDiv = $("#instructions");
    
        ghRouting.addPoint(new GHInput(x1, y1));
        const issIcon = L.icon({
        iconUrl: 'map/images/marker-icon.png',
        shadowSize: [50, 64],
    shadowAnchor: [4, 62],
    iconAnchor: [12, 40]
      });
      let marker = L.marker([0, 0], { icon: issIcon }).addTo(map);
      marker.setLatLng([x1, y1]);

        ghRouting.addPoint(new GHInput(x2, y2));
        const issIcon2 = L.icon({
        iconUrl: 'map/images/marker-icon.png',
        shadowSize: [50, 64],
    shadowAnchor: [4, 62],
    iconAnchor: [12, 40]
      });
      let marker2 = L.marker([0, 0], { icon: issIcon2 }).addTo(map);
      marker2.setLatLng([x2, y2]);
       
        if (ghRouting.points.length > 1) {
            // ******************
            //  Calculate route! 
            // ******************
            ghRouting.doRequest()
                .then(function (json) {
                    var path = json.paths[0];
                    routingLayer.addData({
                        "type": "Feature",
                        "geometry": path.points
                    });

                    if (path.bbox) {
                        var minLon = path.bbox[0];
                        var minLat = path.bbox[1];
                        var maxLon = path.bbox[2];
                        var maxLat = path.bbox[3];
                        var tmpB = new L.LatLngBounds(new L.LatLng(minLat, minLon), new L.LatLng(maxLat, maxLon));
                        map.fitBounds(tmpB);
                        yul=path.points;
                        yunalish=path.instructions;
                        console.log(path);
                    }
    const issIcon3 = L.icon({
        iconUrl: 'taxi.png',
        iconSize: [40,31.25],
    });
      let marker3 = L.marker([0, 0], { icon: issIcon3 }).addTo(map);
      var 
      ys=yunalish[0].distance,
      yi=1,
      x=1,
      y=0,
      m1=new google.maps.LatLng(yul.coordinates[0][1], yul.coordinates[0][0]);
      async function getISS() {        
        const latitude=yul.coordinates[x][0];
        const longitude=yul.coordinates[x][1];
        var distance = google.maps.geometry.spherical.computeDistanceBetween(
            m1,
            new google.maps.LatLng(yul.coordinates[x][1], yul.coordinates[x][0]));
        m1=new google.maps.LatLng(yul.coordinates[x][1], yul.coordinates[x][0]);
        y=parseFloat(y)+parseFloat(distance.toFixed(2));
        document.getElementById('dist1').innerHTML=(y/1000).toFixed(1);

        while(y>ys){
            ys=ys+yunalish[yi].distance;
            yi=yi+1;
        }
        if (yunalish[yi].sign==2) {
            document.getElementById('yunalish1').className='lni lni-arrow-right';
        }
        if (yunalish[yi].sign==-2) {
            document.getElementById('yunalish1').className='lni lni-arrow-left';
        }
        if (yunalish[yi].sign==7) {
            document.getElementById('yunalish1').className='lni lni-arrow-top-right';
        }
        if (yunalish[yi].sign==-7) {
            document.getElementById('yunalish1').className='lni lni-arrow-top-left';
        }
        if (yunalish[yi].sign==0) {
            document.getElementById('yunalish1').className='lni lni-arrow-up';
        }


        document.getElementById('dist2').innerHTML=((ys-y)/1000).toFixed(1);

        document.getElementById('summa1').innerHTML=(parseInt(y/1000*1700+4000-(y/1000*1700)%100));

        console.log(y);
        console.log(x);
        console.log(y/1000*1700+4000-(y/1000*1700)%100);
        x=x+1;
        if(x==51){
            x=1;
            y=0;
            ys=0;
            yi=0;
            m1=new google.maps.LatLng(yul.coordinates[0][1], yul.coordinates[0][0]);        
        }
        marker3.setLatLng([ longitude,latitude]);      
    }

                  getISS();
                  setInterval(getISS, 1000);
            instructionsDiv.empty();
                    

                })
                .catch(function (err) {
                    var str = "An error occured: " + err.message;
                    $("#routing-response").text(str);
                });
        }

    var instructionsHeader = $("#instructions-header");
    instructionsHeader.click(function () {
        instructionsDiv.toggle();
    });

    var routingLayer = L.geoJson().addTo(map);
    routingLayer.options = {
        style: {color: "darkblue", "weight": 5, "opacity": 0.6}
    };
}




function createMap(divId) {
    
    const map = L.map('issMap',{
        zoomControl:false,
        attributionControl:false
    }).setView([51.505, -0.09], 1);
          const attribution ='';

          const tileUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
          const tiles = L.tileLayer(tileUrl, { attribution });
          tiles.addTo(map);
    return map;
}


      
     

    


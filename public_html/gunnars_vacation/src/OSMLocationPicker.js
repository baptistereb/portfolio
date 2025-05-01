var OSMPICKER = (function(){
	var app = {};
	
	var map;
	var marker;
	var circle;
	app.initmappicker = function(lat, lon, r, option){
		try{
			map = new L.Map('locationPicker');
		}catch(e){
			console.log(e);
		}
		var osmUrl='http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
		var osmAttrib='Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors';
		var osm = new L.TileLayer(osmUrl, {minZoom: 1, maxZoom: 20, attribution: osmAttrib});		
		map.setView([lat, lon],1);
		map.addLayer(osm);
		if(!marker){
			marker = new L.marker([lat, lon]);
			circle = new L.circle([lat, lon], r, {
				weight: 2
			});
		}else{
			marker.setLatLng([lat, lon]);
			circle.setLatLng([lat, lon]);
		}

		map.addEventListener("click", (e) => {
			lat = e.latlng.lat;
			lon = e.latlng.lng;
			marker.setLatLng([lat, lon]);
			circle.setLatLng([lat, lon]);
			document.dispatchEvent(new CustomEvent('myCustomEvent', {
			  detail: {
			    lat: lat,
			    lon: lon,
			  }
			}));
		})

		map.addLayer(marker);
		map.addLayer(circle);

		document.getElementById("locationPicker").style.cursor = 'pointer';
	};
	return app;
})();
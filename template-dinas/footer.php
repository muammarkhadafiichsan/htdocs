		<div class="container footer">
			<div class="col-md-4">
				<a href="#">
					<img src="img/pelelangan.jpg" width="100%"/>
				</a>
			</div>
			<div class="col-md-8 col-null">
				<div class="col-m-12">
					<h4>Statistik Pengunjung</h4>
				</div>
				<div class="col-md-3 hits-counter">
					<h5>Total Hits</h5>
					<h3>398</h3>
				</div>
				<div class="col-md-3 hits-counter">
					<h5>Total Unique Hits</h5>
					<h3>398</h3>
				</div>
				<div class="col-md-3 hits-counter">
					<h5>Today Hits</h5>
					<h3>398</h3>
				</div>
				<div class="col-md-3 hits-counter">
					<h5>Today Unique Hits</h5>
					<h3>398</h3>
				</div>
			</div>
		</div>
	</body>
	<script src="js/jquery-2.1.3.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="js/jquery.flexslider-min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>


	<script>
		$(window).load(function() {
  			$('.flexslider').flexslider({
    			animation: "slide",
    			controlNav: "thumbnails"
  			});
		});

		  function initialize() {
		    var myLatlng = new google.maps.LatLng(-0.3011737, 111.5373739);
		    var mapOptions = {
		      zoom: 7,
		      center: myLatlng
		    }
		    var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);

		    var marker = new google.maps.Marker({
		        position: myLatlng,
		        map: map,
		        title: 'Indobit'
		    });
		  }

		  google.maps.event.addDomListener(window, 'load', initialize);

		$(document).ready(function(){
			$(".bg-maps").click(function(){
				$(this).hide();
			})
		});

	</script>
</html>
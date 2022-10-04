<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
p {
  text-align: center;
  font-size: 60px;
  margin-top: 0px;
}
</style>
</head>
<body>

<p id="demo"></p>

<script>

// Update the count down every 1 second
var x = setInterval(timer,1000);
function timer() {

 
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
  var distance = this.responseText;
    // Time calculations for days, hours, minutes and seconds

// To get the year divide the resultant date into
// total seconds in a year (365*60*60*24)
years = Math.floor(distance / (365*60*60*24));

// To get the month, subtract it with years and
// divide the resultant date into
// total seconds in a month (30*60*60*24)
months = Math.floor((distance - years * 365*60*60*24)
								/ (30*60*60*24));

// To get the day, subtract it with years and
// months and divide the resultant date into
// total seconds in a days (60*60*24)
days = Math.floor((distance - years * 365*60*60*24 -
			months*30*60*60*24)/ (60*60*24));

// To get the hour, subtract it with years,
// months & seconds and divide the resultant
// date into total seconds in a hours (60*60)
hours = Math.floor((distance - years * 365*60*60*24
		- months*30*60*60*24 - days*60*60*24)
									/ (60*60));

// To get the minutes, subtract it with years,
// months, seconds and hours and divide the
// resultant date into total seconds i.e. 60
minutes = Math.floor((distance - years * 365*60*60*24
		- months*30*60*60*24 - days*60*60*24
							- hours*60*60)/ 60);

// To get the minutes, subtract it with years,
// months, seconds, hours and minutes
seconds = Math.floor((distance - years * 365*60*60*24
		- months*30*60*60*24 - days*60*60*24
				- hours*60*60 - minutes*60));


    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML =years + "years "+ months + "months "+ days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
  }
  xhttp.open("GET", "td.php");
  xhttp.send();
}  
  

</script>

</body>
</html>

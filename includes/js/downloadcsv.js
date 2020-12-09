// Build the api route
	var siteurl = document.location.origin

	var apiroute = siteurl+"/wp-json/admincheck/v1/all"
	var fetchurl = ""
	var data

// Listen for download click
	var downloadcsv = document.getElementById("downloadcsv")
	downloadcsv.addEventListener("click", runDownloadcsv)

function runDownloadcsv(){
	
	console.log("fetching it - -"+apiroute)

	// Fetch data with API 
	fetch(fetchurl)
	  .then((response) => {
	    data = response.json();
	})
	  // .then((csvConvert)=>{
	// 	data = d3.csvFormat(csvConvert)
	// })


	console.log(data)
}
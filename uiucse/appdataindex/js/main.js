	var jsonFiles = [
		'appdataindex/json/settings.json',
		'appdataindex/json/courseRecordings.json'
	];
	
	
	//Set Some Page Elements
	window.addEventListener('load', (event) => {
			var xmlhttpRoutine = new XMLHttpRequest();
			var url = jsonFiles[0];
			xmlhttpRoutine.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var arr = JSON.parse(this.responseText);
					
					document.getElementById('excelSheetLinkBottom').href = arr[0].ExcelLink;
				}
			};	
			xmlhttpRoutine.open("GET", url, true);
			xmlhttpRoutine.send();
	});
	
    String.prototype.isMatch = function(s){
	   return this.toUpperCase().match(s.toUpperCase())!==null
	}
	
	
	
	
	function fireentersearch(event, searchQ){
		if (event.keyCode == 13) {
			JsonSearch(searchQ);
		}
	}

	function JsonSearch(querry){
	
		if(querry !== ''){
			var xmlhttpRoutine = new XMLHttpRequest();
			var url = jsonFiles[1];
			xmlhttpRoutine.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					
					var arr = JSON.parse(this.responseText);
					
					var out = "";
					var i, j;
					var matchCounter = 0;

					//console.log('Courses  Count - > ' + CourseArr.length);

					out += 	"<table width='100%' border id='searchresultTable'>" +
							"<tr>"+
							"<th class='rtTh'>Course Title</th>"+
							"<th class='rtTh'>Teacher</th>"+
							"<th class='rtTh'>Trimester</th>"+
							"<th class='rtTh'>Link</th>"+
							"<th class='rtTh'>Category</th>"+
							"</tr>";

							console.log(arr.length);

						for(i = 0; i < arr.length; i++){				//Iterate for total json file, 216 times for this

							//Print Iteration Number
							//console.log(i);
							
							var CourseCode, Trimester;

							if(arr[i].CourseCode == null){
								CourseCode = '';
							}else{
								CourseCode = arr[i].CourseCode;
							}

							if(arr[i].Trimester == null){
								Trimester = 'Not Found';
							}else{
								Trimester = arr[i].Trimester;
							}

							if(CourseCode.isMatch(querry) == true || arr[i].CourseTitle.isMatch(querry) == true || arr[i].Faculty.isMatch(querry) == true){
								
								matchCounter++;
								console.log(matchCounter);
								
								var linkText;
								if(arr[i].Link.split('/')[2] == 'terabox.com'){
									var linkText = 'Terabox';
								}else if(arr[i].Link.split('/')[2] == 'drive.google.com'){
									var linkText = 'Google Drive';
								}
								
								console.log(i);
								console.log("JSON Course Code -> "+ arr[i].CourseTitle);

								out += 	"<tr>"+
										"<td align='center'>("+ CourseCode +") " + arr[i].CourseTitle + " </td>"+
										"<td align='center'>" + arr[i].Faculty + " </td>"+
										"<td align='center'>" + Trimester + " </td>"+
										"<td align='center'><a target='_blank' href='"+ arr[i].Link +"'>"+ linkText + "</a></td>"+
										"<td align='center'> "+ arr[i].Category +" </td>"+
										"</tr>";
							}
						}

					
					out += "</table>";
					
					if(matchCounter > 0){
						document.getElementById('searchresult').innerHTML = out;
					}else{
						document.getElementById('searchresult').innerHTML = '<h3><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Kicchu Nai Bhai! Try Different Keywords Please Bhai!</h3>';						
					}	
							
					
					
				}
			};	
			xmlhttpRoutine.open("GET", url, true);
			xmlhttpRoutine.send();
		}else{
			document.getElementById('searchresult').innerHTML = '<h3><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Querry is Empty!</h3>';
		}
	}
				//developed by HighDreamers.Club
				//Code Written by @TawsifTorabi
				//Licensded under GNU GCC Public License
				//Both Commercial and Personal Use is Granted
				
				var verson = 'v0.1.3 Beta';
				
				
				
			document.onkeydown=function(e){
								if(e.which == 27) {
								 esc();
								 return false;
								}
							}
							
			function esc(){
				hidebox();
			}


			function orthi(url){
				var src = url;
				document.getElementById('lightboxframe').src = src;
				var body = document.getElementsByTagName("body")[0];
				var originalstyle = body.style;
				body.style = "overflow: hidden;";
				document.getElementById('lightbox').style = 'display: inline;';
			}
							

			function hidebox(){
				var doc = document.getElementById('lightbox');
				var hide = ('display:none;');
				var body = document.getElementsByTagName("body")[0];
				var originalstyle = body.style;
				body.style = "overflow: inline;";
				doc.style = hide;
			}

	var v1 = '<div id="lightbox" style="display:none;">';
	var v2 = '<div class="orthi-textlightbox-background fade-in">';
	var v3 = '<div class="orthi-textlightbox-area fade-in">';
	var v4 = '<button class="orthi-textlightbox-area-close" onclick="hidebox()"><i class="fa fa-times" aria-hidden="true"></i></button>';
	var v5 = '<center>';
	var v6 = '<div class="intrinsic-container">';
	var v7 =  '<iframe id="lightboxframe" style="border:none; height:480px; width: 100%;" src="">Loading...</iframe>';
	var v8 =  '</div>';
	var v9 = '</center>';
	var v10 = '<small class="orthi-cont">Orthi LightBox '+ verson +'</small>';
	var v11 = '</br></br></br>';
	var v12 = '</div>';
	var v13 = '</div>';
	var v14 = '</div>';

	var box = v1 + v2 + v3 + v4 + v5 + v6 + v7 + v8 + v9 + v10 + v11 + v12 + v13 + v14;

	document.write(box);
			
			
			
			
			
			
			
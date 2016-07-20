window.addEventListener("DOMContentLoaded", function () 
{
	// Obtiene los elementos, e inicializa las varas.
	var imagenCapturada = document.getElementById("imagenCapturada");
	var	context = imagenCapturada.getContext("2d");
	var	video = document.getElementById("video");//Aqui se obtiene la imagen de las camara...
	var	videoObj = { "video": true };
	
	var	errBack = function (error) 
		{
			console.log("Video capture error: ", error.code); 
		};

    document.getElementById("botonCapturar").addEventListener("click", function() 
	{
		context.drawImage(video, 0, 0, 640, 480);
		var image = new Image();
		image.src = imagenCapturada.toDataURL("image/png");
		
		ReImg.fromCanvas(imagenCapturada).downloadPng();//Llamada a libreria 
    });
    
	// Put video listeners into place
	if(navigator.getUserMedia) 
	{ // Standard
		navigator.getUserMedia(videoObj, function(stream) {
			video.src = stream;
			video.play();
		}, errBack);
	} 
	else if(navigator.webkitGetUserMedia) 
	{ // WebKit-prefixed //Aqui se mete en google chrome.
		navigator.webkitGetUserMedia(videoObj, function(stream){
			video.src = window.webkitURL.createObjectURL(stream);
			video.play();
		}, errBack);
	}
	else if(navigator.mozGetUserMedia) 
	{ // Firefox-prefixed
		navigator.mozGetUserMedia(videoObj, function(stream){
			video.src = window.URL.createObjectURL(stream);
			video.play();
		}, errBack);
	}
}, false);


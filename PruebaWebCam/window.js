window.addEventListener("DOMContentLoaded", function () {
	// Grab elements, create settings, etc.
	var canvas = document.getElementById("canvas"),
		context = canvas.getContext("2d"),
		video = document.getElementById("video"),
		videoObj = { "video": true },
		errBack = function (error) {
			console.log("Video capture error: ", error.code); 
		};

    document.getElementById("btnCaptura").addEventListener("click", function() {
	context.drawImage(video, 0, 0, 640, 480);
    //var image = new Image();
    //image.src = canvas.toDataURL("image/png");
    
    
    
    var enviar = ReImg.fromCanvas(canvas).toBase64(); // Convertir a base 64
	
    var array = new Array();
    array[0]= enviar;
    var msg = JSON.encode(array);
    //Enviar JSON a php
    var mensaje = new Request({
    url: "analize.php",
    data: "datos=" + msg,
    onSuccess: function(textoRespuesta){
      $('resultado').set("html", textoRespuesta);
    },
    onFailure: function(){
      $('resultado').set("html", "fallo en la conexión Ajax");
    }
    })
    mensaje.send();
    //ReImg.fromCanvas(canvas).downloadPng();
    });
    
	// Put video listeners into place
	if(navigator.getUserMedia) { // Standard
		navigator.getUserMedia(videoObj, function(stream) {
			video.src = stream;
			video.play();
		}, errBack);
	} else if(navigator.webkitGetUserMedia) { // WebKit-prefixed
		navigator.webkitGetUserMedia(videoObj, function(stream){
			video.src = window.webkitURL.createObjectURL(stream);
			video.play();
		}, errBack);
	}
	else if(navigator.mozGetUserMedia) { // Firefox-prefixed
		navigator.mozGetUserMedia(videoObj, function(stream){
			video.src = window.URL.createObjectURL(stream);
			video.play();
		}, errBack);
	}
}, false);


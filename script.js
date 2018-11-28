menu.onclick = function myFunction() {
	let x = document.getElementById("myTopnav");

	if(x.className === "topnav") {
		x.className += " responsive";
	} else {
		x.className = "topnav";
	}
}


$(function() { 
$(window).scroll(function() { 
if($(this).scrollTop() >= 100) { 
$('#totop').fadeIn(); 
} else { 
$('#totop').fadeOut(); 
} 
});
$('#totop').click(function() { 
$('body,html').animate({scrollTop:0},900); 
}); 
});


let modal = document.getElementById('myModal');
let img = document.getElementById('myImg');
let modalImg = document.getElementById("img01");
let captionText = document.getElementById("caption");

img.onclick = function () {
	modal.style.display = "block";
	modalImg.src = this.src;
	captionText.innerHTML = this.alt;
}

let span = document.getElementsByClassName("modal");
span.onclick = function () {
	modal.style.display = "none";
}

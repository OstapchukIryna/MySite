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


let imgs = ["1.png","2.png","3.png","4.png","5.png"];
let n=0;
time=1000;
play=setInterval("chgImg(0)", 7000);

function chgImg(number) {
if (number!=0) n=number-2;
 $('#myImg').fadeOut(time, function() {    //для картинок
  $(this).attr('src', imgs[n]).fadeIn(time);
 });


n++;
if (n>=imgs.length) n=0;
}

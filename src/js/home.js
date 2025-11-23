/*slider*/

var i=0;
var images=[];
var time=4000;

images[0]='src/images/frame 1.png';
images[1]='src/images/frame2.png';
images[2]='src/images/family2.jpg';

function changeImg(){

	document.getElementById("slider").src=images[i];

	if(i<images.length-1){

		i++;
	}else{
		i=0;
	}
	setTimeout("changeImg()",time);

}
window.onload=changeImg;
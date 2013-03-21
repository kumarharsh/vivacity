var imgIndex=0;
function showSponsors()
{
	var sponsorImages = new Array("arcelor.jpg",
								  "sbbj.png",
								  "skoar_onwhite.jpg", "Digit.jpg",
								  "techDefence.jpg",
								  "ThinnkWare.jpg",
								  "arch.jpg",
								  "cambay.gif",
								  "mojo new.png",
								  "Chings.jpg",  "S&amp;J.jpg",
								  "Bra.png",
								  "DNA.png",
								  "liveMedia.gif",
								  "gati.jpg",
								  "aiesec.gif",
								  "buskers.gif",
								  "DainikBhaskar.jpg",
								  "discountKhoj.jpg",
								  "goldsGym.jpg",
								  "ibibo.jpg",
								  "inox.gif",
								  "itvoice.gif",
								  "knowAFest.jpg",
								  "handa.jpg",
								  "bhashlogosmall.jpg",
								  "lohaIspaat.gif",
								  "metroCabs.gif",
								  "paintBallClub.jpg",
								  "spiceJet.jpg",
								  "topsgrup2.jpg",
								  "ankur.jpg",
								  "samrat.gif",
								  "scl.jpg",
								  "ankur.jpg"
								  );
	var sponsorDescs = new Array("Title Sponsors",
								 "Event Sponsors",
								 "Magazine Partners", "Magazine Partners",
								 "Workshop Partners",
								 "Workshop Partners",
								 "Fashion Partners",
								 "Hospitality Partners",
								 "Cafe Partners",
								 "Gift Partners", "Gift Partners",
								 "Rock Nite Partners",
								 "Print Media Partners",
								 "Electronic Media Partners",
								 "Logistics Partner",
								 "Youth Exchange Partners",
								 " ",
								 "Print Media Partners",
								 " ",
								 "Fitness Partners",
								 " ",
								 " ",
								 "Online Partners",
								 "Online Partners",
								 "SMS Partners",
								 " ",
								 " ",
								 " ",
								 "Paintball Partners",
								 " ",
								 "Security Partner",
								 "Sponsor",
								 "Sponsor",
								 "Sponsor",
								 "Sponsor"
								 );
	if(imgIndex==sponsorImages.length)
		imgIndex=0;
	document.getElementById("sponsorImage").innerHTML="<img src=\"Assets/Sponsor/"+sponsorImages[imgIndex]+"\">";
	document.getElementById("sponsorDesc").innerHTML = sponsorDescs[imgIndex];
	imgIndex++;
	setTimeout('showSponsors()',2000);
}

/*function toggleUpdates()
{
	if(document.getElementById)
		document.getElementById("ticker").style.visibility=document.getElementById("ticker").style.visibility=="visible"?"hidden":"visible";
	else if(document.layers)
		document.ticker.visiblity=document.ticker.visiblity=="visible"?"hidden":"visible";
	else
		document.all.ticker.style.visibility=document.all.ticker.style.visibility=="visible"?"hidden":"visible";
}*/

var oMarquees = [], oMrunning,
	oMInterv =        20,     //interval between increments
	oMStep =          1,      //number of pixels to move between increments
	oStopMAfter =     0,     //how many seconds should marquees run (0 for no limit)
	oResetMWhenStop = false,  //set to true to allow linewrapping when stopping
	oMDirection =     'left'; //'left' for LTR text, 'right' for RTL text

/***     Do not edit anything after here     ***/

function doMStop() {
	clearInterval(oMrunning);
	for( var i = 0; i < oMarquees.length; i++ ) {
		oDiv = oMarquees[i];
		oDiv.mchild.style[oMDirection] = '0px';
		if( oResetMWhenStop ) {
			oDiv.mchild.style.cssText = oDiv.mchild.style.cssText.replace(/;white-space:nowrap;/g,'');
			oDiv.mchild.style.whiteSpace = '';
			oDiv.style.height = '';
			oDiv.style.overflow = '';
			oDiv.style.position = '';
			oDiv.mchild.style.position = '';
			oDiv.mchild.style.top = '';
		}
	}
	oMarquees = [];
}
function doDMarquee() {
	if( oMarquees.length || !document.getElementsByTagName ) { return; }
	var oDivs = document.getElementsByTagName('div');
	for( var i = 0, oDiv; i < oDivs.length; i++ ) {
		oDiv = oDivs[i];
		if( oDiv.className && oDiv.className.match(/\bdmarquee\b/) ) {
			if( !( oDiv = oDiv.getElementsByTagName('div')[0] ) ) { continue; }
			if( !( oDiv.mchild = oDiv.getElementsByTagName('div')[0] ) ) { continue; }
			oDiv.mchild.style.cssText += ';white-space:nowrap;';
			oDiv.mchild.style.whiteSpace = 'nowrap';
			oDiv.style.height = oDiv.offsetHeight + 'px';
			oDiv.style.overflow = 'hidden';
			oDiv.style.position = 'relative';
			oDiv.mchild.style.position = 'absolute';
			oDiv.mchild.style.top = '0px';
			oDiv.mchild.style[oMDirection] = oDiv.offsetWidth + 'px';
			oMarquees[oMarquees.length] = oDiv;
			i += 2;
		}
	}
	oMrunning = setInterval('aniMarquee()',oMInterv);
	if( oStopMAfter ) { setTimeout('doMStop()',oStopMAfter*1000); }
}
function aniMarquee() {
	var oDiv, oPos;
	for( var i = 0; i < oMarquees.length; i++ ) {
		oDiv = oMarquees[i].mchild;
		oPos = parseInt(oDiv.style[oMDirection]);
		if( oPos <= -1 * oDiv.offsetWidth ) {
			oDiv.style[oMDirection] = oMarquees[i].offsetWidth + 'px';
		} else {
			oDiv.style[oMDirection] = ( oPos - oMStep ) + 'px';
		}
	}
}
if( window.addEventListener ) {
	window.addEventListener('load',doDMarquee,false);
} else if( document.addEventListener ) {
	document.addEventListener('load',doDMarquee,false);
} else if( window.attachEvent ) {
	window.attachEvent('onload',doDMarquee);
}





/* SlideOut by Kumar Harsh
   This also works but the timestep is too much to be smooth... :-( 
var endHeight;
var moving=false;
var dir=1;
var h=0;
var obj;
function toggleSlide(OBJ){
  obj=OBJ;
  if(moving)
	return;
  if(dir==1)
    slidedown(obj);
  else
	slideup(obj);
}

function slidedown(){
		h=0;
		endHeight=85;
		moving=true;
        dir=1;
        Slide();
}

function slideup(){
		h=85;
		endHeight=0;
        moving=true;;
        dir=0;
        Slide(obj);
}

function Slide(){
        if(dir==1)
			h++;
		else
			h--;
		document.getElementById(obj).style.height = h+"px";
		if(h!=endHeight)
			setTimeout("Slide();",1);
		else
			endSlide();
}

function endSlide()
{
	moving=0;
	dir=!dir;
}
 End of Slider */
 

var timerlen = 5;
var slideAniLen = 250;

var timerID = new Array();
var startTime = new Array();
var obj = new Array();
var endHeight = new Array();
var moving = new Array();
var dir = new Array();

function slidedown(objname){
        if(moving[objname])
                return;

        if(document.getElementById(objname).style.display != "none")
                return; // cannot slide down something that is already visible

        moving[objname] = true;
        dir[objname] = "down";
        startslide(objname);
}

function slideup(objname){
        if(moving[objname])
                return;

        if(document.getElementById(objname).style.display == "none")
                return; // cannot slide up something that is already hidden

        moving[objname] = true;
        dir[objname] = "up";
        startslide(objname);
}

function startslide(objname){
        obj[objname] = document.getElementById(objname);

        endHeight[objname] = parseInt(obj[objname].style.height);
        startTime[objname] = (new Date()).getTime();

        if(dir[objname] == "down"){
                obj[objname].style.height = "1px";
        }

        obj[objname].style.display = "block";

        timerID[objname] = setInterval('slidetick(\'' + objname + '\');',timerlen);
}

function slidetick(objname){
        var elapsed = (new Date()).getTime() - startTime[objname];

        if (elapsed > slideAniLen)
                endSlide(objname)
        else {
                var d =Math.round(elapsed / slideAniLen * endHeight[objname]);
                if(dir[objname] == "up")
                        d = endHeight[objname] - d;

                obj[objname].style.height = d + "px";
        }

        return;
}

function endSlide(objname){
        clearInterval(timerID[objname]);

        if(dir[objname] == "up")
                obj[objname].style.display = "none";

        obj[objname].style.height = endHeight[objname] + "px";

        delete(moving[objname]);
        delete(timerID[objname]);
        delete(startTime[objname]);
        delete(endHeight[objname]);
        delete(obj[objname]);
        delete(dir[objname]);

        return;
}


function toggleSlide(objname){
	if(document.getElementById(objname).style.display == "none"){
		// div is hidden, so let's slide down
		slidedown(objname);
	}else{
		// div is not hidden, so slide up
		slideup(objname);
	}
}



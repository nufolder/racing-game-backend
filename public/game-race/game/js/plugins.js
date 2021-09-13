// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];
        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

// Place any jQuery/helper plugins in here.
function checkContentHeight(target){
	var stageHeight=$( window ).height();
	var newHeight = (stageHeight/2)-(target.height()/2);
	return newHeight;
}

function checkContentWidth(target){
	var stageWidth=$( window ).width();
	var newWidth = (stageWidth/2)-(target.width()/2);
	return newWidth;
}

function getDeviceVer() {
	var ua = navigator.userAgent;
	var uaindex;
	
	// determine OS
	if ( ua.match(/(iPad|iPhone|iPod touch)/) ){
		userOS = 'iOS';
		uaindex = ua.indexOf( 'OS ' );
	}else if ( ua.match(/Android/) ){
		userOS = 'Android';
		uaindex = ua.indexOf( 'Android ' );
	}else{
		userOS = 'unknown';
	}
	
	// determine version
	if ( userOS === 'iOS' && uaindex > -1 ){
		userOSver = ua.substr( uaindex + 3, 3 ).replace( '_', '.' );
	}else if ( userOS === 'Android'  &&  uaindex > -1 ){
		userOSver = ua.substr( uaindex + 8, 3 );
	}else{
		userOSver = 'unknown';
	}
	return Number(userOSver)
}

/*!
 * 
 * UTILITIES - This is the function that runs for render
 * 
 */
function toInt(obj, def){
	if (obj !== null) { var x = parseInt(obj, 10); if (!isNaN(x)) return x; } return toInt(def, 0);
}

function toFloat(obj, def){
	if (obj !== null) { var x = parseFloat(obj);   if (!isNaN(x)) return x; } return toFloat(def, 0.0);
}

function getLimit(value, min, max){
	return Math.max(min, Math.min(value, max));
}

function randomInt(min, max){
	return Math.round(getInterpolate(min, max, Math.random()));
}

function randomChoice(options){
	return options[randomInt(0, options.length-1)];
}

function percentRemaining(n, total){
	return (n%total)/total;
}

function getAccelerate(v, accel, dt){
	return v + (accel * dt);
}

function getInterpolate(a,b,percent){
	return a + (b-a)*percent;
}

function easeIn(a,b,percent){
	return a + (b-a)*Math.pow(percent,2);
}

function easeOut(a,b,percent){
	return a + (b-a)*(1-Math.pow(1-percent,2));
}

function easeInOut(a,b,percent){
	return a + (b-a)*((-Math.cos(percent*Math.PI)/2) + 0.5);
}

function exponentialFog(distance, density){
	return 1 / (Math.pow(Math.E, (distance * distance * density)));
}

function getIncrease(start, increment, max){
	var result = start + increment;
    while (result >= max)
      result -= max;
    while (result < 0)
      result += max;
    return result;
}

function getProject(p, cameraX, cameraY, cameraZ, cameraDepth, width, height, roadWidth){
	p.camera.x     = (p.world.x || 0) - cameraX;
    p.camera.y     = (p.world.y || 0) - cameraY;
    p.camera.z     = (p.world.z || 0) - cameraZ;
    p.screen.scale = cameraDepth/p.camera.z;
    p.screen.x     = Math.round((width/2)  + (p.screen.scale * p.camera.x  * width/2));
    p.screen.y     = Math.round((height/2) - (p.screen.scale * p.camera.y  * height/2));
    p.screen.w     = Math.round(             (p.screen.scale * roadWidth   * width/2));
}

function getOverlap(x1, w1, x2, w2, percent){
	var half = (percent || 1)/2;
    var min1 = x1 - (w1*half);
    var max1 = x1 + (w1*half);
    var min2 = x2 - (w2*half);
    var max2 = x2 + (w2*half);
    return ! ((max1 < min2) || (min1 > max2));	
}


function addCommas(nStr) {
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}
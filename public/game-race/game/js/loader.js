////////////////////////////////////////////////////////////
// CANVAS LOADER
////////////////////////////////////////////////////////////

 /*!
 *
 * START CANVAS PRELOADER - This is the function that runs to preload canvas asserts
 *
 */
function initPreload(){
	toggleLoader(true);

	checkMobileEvent();

	$(window).resize(function(){
		resizeGameFunc();
	});
	resizeGameFunc();

	loader = new createjs.LoadQueue(false);
	manifest=[
			{src:'assets/background.png', id:'background'},
			{src:'assets/logo-generasi-juara.png', id:'logo'},
			{src:'assets/button_start.png', id:'buttonStart'},

			{src:'assets/smoke_Spritesheet2x1.png', id:'itemSmoke'},
			{src:'assets/fire_Spritesheet2x1.png', id:'itemFire'},

			{src:'assets/button_confirm_exit.png', id:'buttonConfirm'},
			{src:'assets/button_cancel.png', id:'buttonCancel'},
			{src:'assets/item_confirm.png', id:'itemExit'},

			{src:'assets/touch_up.png', id:'itemTouchUp'},
			{src:'assets/touch_down.png', id:'itemTouchDown'},
			{src:'assets/touch_left.png', id:'itemTouchLeft'},
			{src:'assets/touch_right.png', id:'itemTouchRight'},

			{src:'assets/button_restart.png', id:'buttonRestart'},
			{src:'assets/exit-button.png', id:'buttonOut'},
			{src:'assets/button_facebook.png', id:'buttonFacebook'},
			{src:'assets/button_twitter.png', id:'buttonTwitter'},
			{src:'assets/button_whatsapp.png', id:'buttonWhatsapp'},
			{src:'assets/button_fullscreen.png', id:'buttonFullscreen'},
			{src:'assets/button_sound_on.png', id:'buttonSoundOn'},
			{src:'assets/button_sound_off.png', id:'buttonSoundOff'},
			{src:'assets/button_exit.png', id:'buttonExit'},
			{src:'assets/button_settings.png', id:'buttonSettings'},
			{src:'assets/badge_life.png', id:'badgeLife'},
			{src:'assets/badge_ticket.png', id:'badgeTicket'},
			{src: 'assets/riders/'+racer_data+'.png', id: 'playerPhoto'},
			{src:'assets/badge_coin.png', id:'badgeCoin'}];

	for(var key in spritesData) {
		if(spritesData[key].src != undefined)
			manifest.push({src:spritesData[key].src, id:key});
	}

	for(var key in backgroundData) {
		if(backgroundData[key].src != undefined)
			manifest.push({src:backgroundData[key].src, id:key});
	}

	for(var key in playerCarData) {
		if(playerCarData[key].src != undefined)
			manifest.push({src:playerCarData[key].src, id:key});
	}

	soundOn = true;
	if($.browser.mobile || isTablet){
		if(!enableMobileSound){
			soundOn=false;
		}
	}

	if(soundOn){
		manifest.push({src:'assets/sounds/music.ogg', id:'musicGame'});

		manifest.push({src:'assets/sounds/click.ogg', id:'soundClick'});
		manifest.push({src:'assets/sounds/collect_fuel.ogg', id:'soundCollectFuel'});
		manifest.push({src:'assets/sounds/collect_turbo.ogg', id:'soundCollectTurbo'});
		manifest.push({src:'assets/sounds/collect_coin.ogg', id:'soundCollectCoin'});
		manifest.push({src:'assets/sounds/impact.ogg', id:'soundImpact'});
		manifest.push({src:'assets/sounds/over.ogg', id:'soundOver'});
		manifest.push({src:'assets/sounds/brake.ogg', id:'soundBrake'});
		manifest.push({src:'assets/sounds/engineloop.ogg', id:'soundEngine'});
		manifest.push({src:'assets/sounds/tick.ogg', id:'soundTick'});
		manifest.push({src:'assets/sounds/tickOver.ogg', id:'soundTickOver'});

		manifest.push({src:'assets/sounds/slowDown.ogg', id:'soundSlowDown'});
		manifest.push({src:'assets/sounds/speedUp.ogg', id:'soundSpeedUp'});

		createjs.Sound.alternateExtensions = ["mp3"];
		loader.installPlugin(createjs.Sound);
	}

	loader.addEventListener("complete", handleComplete);
	loader.addEventListener("fileload", fileComplete);
	loader.addEventListener("error",handleFileError);
	loader.on("progress", handleProgress, this);
	loader.loadManifest(manifest);
}

/*!
 *
 * CANVAS FILE COMPLETE EVENT - This is the function that runs to update when file loaded complete
 *
 */
function fileComplete(evt) {
	var item = evt.item;
	//console.log("Event Callback file loaded ", evt.item.id);
}

/*!
 *
 * CANVAS FILE HANDLE EVENT - This is the function that runs to handle file error
 *
 */
function handleFileError(evt) {
	console.log("error ", evt);
}

/*!
 *
 * CANVAS PRELOADER UPDATE - This is the function that runs to update preloder progress
 *
 */
function handleProgress() {
	$('#mainLoader span').html(Math.round(loader.progress/1*100)+'%');
}

/*!
 *
 * CANVAS PRELOADER COMPLETE - This is the function that runs when preloader is complete
 *
 */
function handleComplete() {
	toggleLoader(false);
	initMain();
};

/*!
 *
 * TOGGLE LOADER - This is the function that runs to display/hide loader
 *
 */
function toggleLoader(con){
	if(con){
		$('#mainLoader').show();
	}else{
		$('#mainLoader').hide();
	}
}

var myTip = [
    "Quick Tip: AHRT adalah",
    "Quick Tip: MARIO adalah",
    "Quick Tip: ARRC adalah",
    "Quick Tip: TTC adalah"
  ];

var randomItem = myTip[Math.floor(Math.random()*myTip.length)];
document.getElementById("tip").innerHTML = randomItem;

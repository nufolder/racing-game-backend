////////////////////////////////////////////////////////////
// CANVAS
////////////////////////////////////////////////////////////
var stage
var canvasW=0;
var canvasH=0;

/*!
 * 
 * START GAME CANVAS - This is the function that runs to setup game canvas
 * 
 */

 
function initGameCanvas(w,h){
	var gameCanvas = document.getElementById("gameCanvas");
	gameCanvas.width = w;
	gameCanvas.height = h;
	
	canvasW=w;
	canvasH=h;
	stage = new createjs.Stage("gameCanvas");
	
	createjs.Touch.enable(stage);
	stage.enableMouseOver(20);
	stage.mouseMoveOutside = true;
	
	createjs.Ticker.setFPS(60);
	createjs.Ticker.addEventListener("tick", tick);	
}

var guide = false;
var canvasContainer, mainContainer, gameContainer, statusContainer, gameStatusContainer, worldContainer, resultContainer, confirmContainer;
var guideline, bg, logo, buttonStart, buttonRestart, buttonOut, buttonFacebook, buttonTwitter, buttonWhatsapp, buttonFullscreen, buttonSoundOn, buttonSoundOff;

$.sprites = {};
$.background = {};

/*!
 * 
 * BUILD GAME CANVAS ASSERTS - This is the function that runs to build game canvas asserts
 * 
 */
function buildGameCanvas(){
	canvasContainer = new createjs.Container();
	mainContainer = new createjs.Container();
	gameContainer = new createjs.Container();
	statusContainer = new createjs.Container();
	gameStatusContainer = new createjs.Container();
	worldContainer = new createjs.Container();
	resultContainer = new createjs.Container();
	confirmContainer = new createjs.Container();
	
	bg = new createjs.Bitmap(loader.getResult('background'));
	logo = new createjs.Bitmap(loader.getResult('logo'));
	logo.x = canvasW/2 - 234;
	logo.y = canvasH/2 - 200;
	
	buttonStart = new createjs.Bitmap(loader.getResult('buttonStart'));
	centerReg(buttonStart);
	buttonStart.x = canvasW/2;
	buttonStart.y = canvasH/100 * 55;
	
	//road	
	for(var key in spritesData) {
		if(spritesData[key].src != undefined){
			spritesData[key].id = key;
			$.sprites[key] = new createjs.Bitmap(loader.getResult(key));
			$.sprites[key].y -= $.sprites[key].image.naturalHeight;
			gameContainer.addChild($.sprites[key]);
			
			spritesData[key].id = key;
			spritesData[key].w = $.sprites[key].image.naturalWidth;
			spritesData[key].h = $.sprites[key].image.naturalHeight;
		}
	}
	
	for(var key in backgroundData) {
		if(backgroundData[key].src != undefined){
			$.background[key] = new createjs.Bitmap(loader.getResult(key));
			$.background[key].y -= $.background[key].image.naturalHeight;
			gameContainer.addChild($.background[key]);
			
			backgroundData[key].id = key;
			backgroundData[key].w = $.background[key].image.naturalWidth;
			backgroundData[key].h = $.background[key].image.naturalHeight;
		}
	}
	
	for(var key in playerCarData) {
		if(playerCarData[key].src != undefined){
			$.sprites[key] = new createjs.Bitmap(loader.getResult(key));
			$.sprites[key].y -= $.sprites[key].image.naturalHeight;
			gameContainer.addChild($.sprites[key]);
			
			playerCarData[key].id = key;
			playerCarData[key].w = $.sprites[key].image.naturalWidth;
			playerCarData[key].h = $.sprites[key].image.naturalHeight;
		}
	}
	
	var _frameW = 70;
	var _frameH = 100;
	
	var _frame = {"regX": 0, "regY": 0, "height": _frameH, "count": 2, "width": _frameW};
	var _animations = {animate:{frames: [0,1], speed:1}};
						
	smokeData = new createjs.SpriteSheet({
		"images": [loader.getResult('itemSmoke').src],
		"frames": _frame,
		"animations": _animations
	});
	
	smokeAnimate = new createjs.Sprite(smokeData, "animate");
	smokeAnimate.framerate = 20;
	smokeAnimate.x = -200;
	
	var _frameW = 155;
	var _frameH = 55;
	var _frame = {"regX": 0, "regY": 0, "height": _frameH, "count": 2, "width": _frameW};
	var _animations = {animate:{frames: [0,1], speed:1}};
						
	fireData = new createjs.SpriteSheet({
		"images": [loader.getResult('itemFire').src],
		"frames": _frame,
		"animations": _animations
	});
	
	fireAnimate = new createjs.Sprite(fireData, "animate");
	fireAnimate.framerate = 20;
	fireAnimate.x = -200;
	
	scoreTxt = new createjs.Text();
	scoreTxt.font = "30px dimitriregular";
	scoreTxt.color = "#FFFFFF";
	scoreTxt.textAlign = "left";
	scoreTxt.textBaseline='alphabetic';
	scoreTxt.text = scoreData.text;
	scoreTxt.x = canvasW/100 * 5;
	scoreTxt.y = canvasH/100 * 5;	
    var scoreBackground = new createjs.Shape();
    scoreBackground.graphics.beginFill('red')
        .beginStroke()
        .drawRoundRect (canvasW/100 * 1, canvasH/100 * 2, 280,40,20 )
        .endStroke();
    badgeTicket = new createjs.Bitmap(loader.getResult('badgeTicket'));
	badgeTicket.x = canvasW/100 * 0.5 
	badgeTicket.y = canvasH/100 * 2.5;

	playerPhoto = new createjs.Bitmap(loader.getResult('playerPhoto'));
	centerReg(playerPhoto);
	playerPhoto.x = canvasW/100 * 73;
	playerPhoto.y = canvasW/100 * 10;
	playerName = new createjs.Text();
	playerName.font = "20px dimitriregular";
	playerName.color = "#000000";
	playerName.textAlign = "center";
	playerName.textBaseline='alphabetic';
	playerName.text = racer_data;
	playerName.x = playerPhoto.x;
	playerName.y = playerPhoto.y + 70;	

	scoreShadowTxt = new createjs.Text();
	scoreShadowTxt.font = "30px dimitri_swankregular";
	scoreShadowTxt.color = "#ed2633";
	scoreShadowTxt.textAlign = "left";
	scoreShadowTxt.textBaseline='alphabetic';
	scoreShadowTxt.text = scoreData.text;
	scoreShadowTxt.x = scoreTxt.x+1;
	scoreShadowTxt.y = scoreTxt.y+1;
	
	coinTxt = new createjs.Text();
	coinTxt.font = "30px dimitriregular";
	coinTxt.color = "#FFFFFF";
	coinTxt.textAlign = "left";
	coinTxt.textBaseline='alphabetic';
	coinTxt.text = coinData.text;
	coinTxt.x = canvasW/100 * 5;
	coinTxt.y = canvasH/100 * 10;
    var coinBackground = new createjs.Shape();
    coinBackground.graphics.beginFill('red')
        .beginStroke()
        .drawRoundRect (canvasW/100 * 1, canvasH/100 * 7, 180,40,20 )
        .endStroke();
    badgeCoin = new createjs.Bitmap(loader.getResult('badgeCoin'));
	badgeCoin.x = canvasW/100 * 0.5 
	badgeCoin.y = canvasH/100 * 7.5;

	lifeTxt = new createjs.Text();
	lifeTxt.font = "30px dimitriregular";
	lifeTxt.color = "#FFFFFF";
	lifeTxt.textAlign = "left";
	lifeTxt.textBaseline='alphabetic';
	lifeTxt.text = lifeData.text;
	lifeTxt.x = canvasW/100 * 6;
	lifeTxt.y = canvasH/100 * 15;
    var lifeBackground = new createjs.Shape();
    lifeBackground.graphics.beginFill('red')
        .beginStroke()
        .drawRoundRect (canvasW/100 * 1, canvasH/100 * 12, 100,40,20 )
        .endStroke();
    lifeBadge = new createjs.Bitmap(loader.getResult('badgeLife'));
	lifeBadge.x = canvasW/100 * 0.5 
	lifeBadge.y = canvasH/100 * 12.5;

	coinShadowTxt = new createjs.Text();
	coinShadowTxt.font = "30px dimitri_swankregular";
	coinShadowTxt.color = "#ed2633";
	coinShadowTxt.textAlign = "left";
	coinShadowTxt.textBaseline='alphabetic';
	coinShadowTxt.text = coinData.text;
	coinShadowTxt.x = coinTxt.x+1;
	coinShadowTxt.y = coinTxt.y+1;
	
	fuelTxt = new createjs.Text();
	fuelTxt.font = "30px dimitriregular";
	fuelTxt.color = "#cccccc";
	fuelTxt.textAlign = "left";
	fuelTxt.textBaseline='alphabetic';
	fuelTxt.text = fuelData.text;
	fuelTxt.x = canvasW/100 * 2;
	fuelTxt.y = canvasH/100 * 9;
	
	fuelShadowTxt = new createjs.Text();
	fuelShadowTxt.font = "30px dimitri_swankregular";
	fuelShadowTxt.color = "#2f2f2f";
	fuelShadowTxt.textAlign = "left";
	fuelShadowTxt.textBaseline='alphabetic';
	fuelShadowTxt.text = fuelData.text;
	fuelShadowTxt.x = fuelTxt.x+1;
	fuelShadowTxt.y = fuelTxt.y;
	
	fuelBarBackground = new createjs.Shape();
	fuelBarBackground.graphics.beginFill(fuelData.bar.backgroundColor).drawRect(0, 0, fuelData.bar.width, fuelData.bar.height);
	fuelBarBackground.x = canvasW/100 * 12;
	fuelBarBackground.y = canvasH/100 * 6.8;
	
	fuelBarEmpty = new createjs.Shape();
	fuelBarEmpty.graphics.beginFill(fuelData.bar.blankColor).drawRect(0, 0, fuelData.bar.width - (fuelData.bar.space*2), fuelData.bar.height - (fuelData.bar.space * 4));
	fuelBarEmpty.x = fuelBarBackground.x + fuelData.bar.space;
	fuelBarEmpty.y = fuelBarBackground.y + fuelData.bar.space;
	
	fuelBarFill = new createjs.Shape();
	fuelBarFill.x = fuelBarBackground.x + fuelData.bar.space;
	fuelBarFill.y = fuelBarBackground.y + fuelData.bar.space;
	
	gameStatusTxt = new createjs.Text();
	gameStatusTxt.font = "90px dimitriregular";
	gameStatusTxt.color = "#fff";
	gameStatusTxt.textAlign = "center";
	gameStatusTxt.textBaseline='alphabetic';
	gameStatusTxt.text = '';
	gameStatusTxt.x = canvasW/2;
	gameStatusTxt.y = canvasH/100 * 30;
	
	gameStatusShadowTxt = new createjs.Text();
	gameStatusShadowTxt.font = "90px dimitri_swankregular";
	gameStatusShadowTxt.color = "#2f2f2f";
	gameStatusShadowTxt.textAlign = "center";
	gameStatusShadowTxt.textBaseline='alphabetic';
	gameStatusShadowTxt.text = '';
	gameStatusShadowTxt.x = gameStatusTxt.x+1;
	gameStatusShadowTxt.y = gameStatusTxt.y+10;
	
	instructionTxt = new createjs.Text();
	instructionTxt.font = "30px dimitriregular";
	instructionTxt.color = "#fff";
	instructionTxt.textAlign = "center";
	instructionTxt.textBaseline='alphabetic';
	instructionTxt.text = intructionDisplayText;
	instructionTxt.x = canvasW/2;
	instructionTxt.y = canvasH/100 * 75;
	
	instructionShadowTxt = new createjs.Text();
	instructionShadowTxt.font = "30px dimitri_swankregular";
	instructionShadowTxt.color = "#2f2f2f";
	instructionShadowTxt.textAlign = "center";
	instructionShadowTxt.textBaseline='alphabetic';
	instructionShadowTxt.text = intructionDisplayText;
	instructionShadowTxt.x = instructionTxt.x+1;
	instructionShadowTxt.y = instructionTxt.y+5;
	
	//key
	itemTouchUp = new createjs.Bitmap(loader.getResult('itemTouchUp'));
	centerReg(itemTouchUp);
	createHitarea(itemTouchUp);
	itemTouchDown = new createjs.Bitmap(loader.getResult('itemTouchDown'));
	centerReg(itemTouchDown);
	createHitarea(itemTouchDown);
	itemTouchLeft = new createjs.Bitmap(loader.getResult('itemTouchLeft'));
	centerReg(itemTouchLeft);
	createHitarea(itemTouchLeft);
	itemTouchRight = new createjs.Bitmap(loader.getResult('itemTouchRight'));
	centerReg(itemTouchRight);
	createHitarea(itemTouchRight);
	
	itemTouchUp.alpha = itemTouchDown.alpha = itemTouchLeft.alpha = itemTouchRight.alpha = .2;
	
	//result
	resultTitleTxt = new createjs.Text();
	resultTitleTxt.font = "italic 120px dimitriregular";
	resultTitleTxt.color = "#333333";
	resultTitleTxt.textAlign = "center";
	resultTitleTxt.textBaseline='alphabetic';
	resultTitleTxt.text = resultTitleText;
	resultTitleTxt.x = canvasW/2;
	resultTitleTxt.y = canvasH/100 * 20;
	resultTitleTxt.outline = 4;
	resultTitleTxt.lineHeight = 100;
	
	resultTitleShadowTxt = new createjs.Text();
	resultTitleShadowTxt.font = "italic 120px dimitri_swankregular";
	resultTitleShadowTxt.color = "#FFC312";
	resultTitleShadowTxt.textAlign = "center";
	resultTitleShadowTxt.textBaseline='alphabetic';
	resultTitleShadowTxt.text = resultTitleText;
	resultTitleShadowTxt.x = resultTitleTxt.x;
	resultTitleShadowTxt.y = resultTitleTxt.y;
	resultTitleShadowTxt.lineHeight = 100;
	
	resultScoreTxt = new createjs.Text();
	resultScoreTxt.font = "25px dimitriregular";
	resultScoreTxt.color = "#FFFFFF";
	resultScoreTxt.textAlign = "center";
	resultScoreTxt.textBaseline='alphabetic';
	resultScoreTxt.text = '1500PTS';
	resultScoreTxt.x = canvasW/2;
	resultScoreTxt.y = canvasH/100 * 37;
	resultScoreTxt.lineHeight = 30;
	
	resultCoinTxt = new createjs.Text();
	resultCoinTxt.font = "20px dimitriregular";
	resultCoinTxt.color = "#FFFFFF";
	resultCoinTxt.textAlign = "center";
	resultCoinTxt.textBaseline='alphabetic';
	resultCoinTxt.text = '1500PTS';
	resultCoinTxt.x = canvasW/2;
	resultCoinTxt.y = canvasH/100 * 52;
		
	resultShareTxt = new createjs.Text();
	resultShareTxt.font = "25px dimitriregular";
	resultShareTxt.color = "#fff";
	resultShareTxt.textAlign = "center";
	resultShareTxt.textBaseline='alphabetic';
	resultShareTxt.text = shareText;
	resultShareTxt.x = canvasW/2;
	resultShareTxt.y = canvasH/100 * 73;
	
    var resultBackground = new createjs.Shape();
    resultBackground.graphics.beginFill('red')
        .beginStroke()
        .moveTo(0, 0)
        .lineTo(canvasW, 1)
        .lineTo(canvasW, canvasH)
        .lineTo(1, canvasH)
        .endStroke();
    resultBackground.alpha = 0.75;

    var confirmBackground = new createjs.Shape();
    confirmBackground.graphics.beginFill('red')
        .beginStroke()
        .moveTo(0, 0)
        .lineTo(canvasW, 1)
        .lineTo(canvasW, canvasH)
        .lineTo(1, canvasH)
        .endStroke();
    confirmBackground.alpha = 0.9;

	
	buttonFacebook = new createjs.Bitmap(loader.getResult('buttonFacebook'));
	buttonTwitter = new createjs.Bitmap(loader.getResult('buttonTwitter'));
	buttonWhatsapp = new createjs.Bitmap(loader.getResult('buttonWhatsapp'));
	centerReg(buttonFacebook);
	createHitarea(buttonFacebook);
	centerReg(buttonTwitter);
	createHitarea(buttonTwitter);
	centerReg(buttonWhatsapp);
	createHitarea(buttonWhatsapp);
	buttonFacebook.x = canvasW/100 * 36;
	buttonTwitter.x = canvasW/2;
	buttonWhatsapp.x = canvasW/100 * 64;
	buttonFacebook.y = buttonTwitter.y = buttonWhatsapp.y = canvasH/100*80;
	
	buttonRestart = new createjs.Bitmap(loader.getResult('buttonRestart'));
	centerReg(buttonRestart);
	createHitarea(buttonRestart);
	buttonRestart.x = canvasW/2 + 110;
	buttonRestart.y = canvasH/100 * 60;
	
	buttonOut = new createjs.Bitmap(loader.getResult('buttonOut'));
	centerReg(buttonOut);
	createHitarea(buttonOut);
	buttonOut.x = canvasW/2 - 110;
	buttonOut.y = canvasH/100 * 60;
	
	//option
	buttonFullscreen = new createjs.Bitmap(loader.getResult('buttonFullscreen'));
	centerReg(buttonFullscreen);
	buttonSoundOn = new createjs.Bitmap(loader.getResult('buttonSoundOn'));
	centerReg(buttonSoundOn);
	buttonSoundOff = new createjs.Bitmap(loader.getResult('buttonSoundOff'));
	centerReg(buttonSoundOff);
	buttonSoundOn.visible = false;
	buttonExit = new createjs.Bitmap(loader.getResult('buttonExit'));
	centerReg(buttonExit);
	buttonSettings = new createjs.Bitmap(loader.getResult('buttonSettings'));
	centerReg(buttonSettings);
	buttonSettings.visible = false;
	
	// createHitarea(buttonFullscreen);
	createHitarea(buttonSoundOn);
	createHitarea(buttonSoundOff);
	// createHitarea(buttonExit);
	// createHitarea(buttonSettings);
	optionsContainer = new createjs.Container();
	// optionsContainer.addChild(buttonFullscreen, buttonSoundOn, buttonSoundOff, buttonExit);
	optionsContainer.addChild(buttonSoundOn, buttonSoundOff);
	optionsContainer.visible = true;
	
	//exit
	// itemExit = new createjs.Bitmap(loader.getResult('itemExit'));
	
	buttonConfirm = new createjs.Bitmap(loader.getResult('buttonConfirm'));
	centerReg(buttonConfirm);
	buttonConfirm.x = canvasW/100* 37;
	buttonConfirm.y = canvasH/100 * 58;
	
	buttonCancel = new createjs.Bitmap(loader.getResult('buttonCancel'));
	centerReg(buttonCancel);
	buttonCancel.x = canvasW/100 * 66;
	buttonCancel.y = canvasH/100 * 58;
	
	confirmMessageTxt = new createjs.Text();
	confirmMessageTxt.font = "35px dimitriregular";
	confirmMessageTxt.color = "#FFFFFF";
	confirmMessageTxt.textAlign = "center";
	confirmMessageTxt.textBaseline='alphabetic';
	confirmMessageTxt.text = exitMessage;
	confirmMessageTxt.x = canvasW/2;
	confirmMessageTxt.y = canvasH/100 *38;
	
	confirmContainer.addChild(confirmBackground, buttonConfirm, buttonCancel, confirmMessageTxt);
	confirmContainer.visible = false;
	
	if(guide){
		guideline = new createjs.Shape();
		guideline.graphics.setStrokeStyle(2).beginStroke('red').drawRect((stageW-contentW)/2, (stageH-contentH)/2, contentW, contentH);
	}
	
	mainContainer.addChild(logo, buttonStart);
	gameStatusContainer.addChild(gameStatusShadowTxt, gameStatusTxt);
	gameContainer.addChild(smokeAnimate, fireAnimate, gameStatusContainer, statusContainer, instructionShadowTxt, instructionTxt, itemTouchLeft, itemTouchRight, playerPhoto, playerName);
	statusContainer.addChild(scoreBackground, badgeTicket, badgeCoin, scoreShadowTxt, scoreTxt, coinBackground,badgeCoin,  coinShadowTxt, coinTxt, lifeBackground, lifeTxt, lifeBadge);
	resultContainer.addChild(resultBackground, resultTitleShadowTxt, resultTitleTxt, resultScoreTxt, resultCoinTxt, buttonRestart, buttonOut);
	
	if(shareEnable){
		resultContainer.addChild(resultShareTxt, buttonFacebook, buttonTwitter, buttonWhatsapp);
	}
	
	canvasContainer.addChild(bg, worldContainer, mainContainer, gameContainer, resultContainer, confirmContainer, optionsContainer, buttonSettings, guideline);
	stage.addChild(canvasContainer);
	
	resizeCanvas();
}


/*!
 * 
 * RESIZE GAME CANVAS - This is the function that runs to resize game canvas
 * 
 */
function resizeCanvas(){
 	if(canvasContainer!=undefined){
		statusContainer.x = offset.x;
		statusContainer.y = offset.y;
		
		buttonSettings.x = (canvasW - offset.x) - 40;
		buttonSettings.y = offset.y - 20;
		
		playerPhoto.x = (canvasW - offset.x)-65;
		playerPhoto.y = offset.y + 130;
		playerName.x = playerPhoto.x;
		playerName.y = playerPhoto.y + 70;

		var distanceNum = 60;
		if(curPage != 'game'){
			buttonExit.visible = false;
			buttonSoundOn.x = buttonSoundOff.x = buttonSettings.x;
			buttonSoundOn.y = buttonSoundOff.y = buttonSettings.y+distanceNum;
			buttonSoundOn.x = buttonSoundOff.x;
			buttonSoundOn.y = buttonSoundOff.y = buttonSettings.y+(distanceNum);
			
			buttonFullscreen.x = buttonSettings.x;
			buttonFullscreen.y = buttonSettings.y+(distanceNum*2);
		}else{
			buttonExit.visible = true;
			buttonSoundOn.x = buttonSoundOff.x = buttonSettings.x;
			buttonSoundOn.y = buttonSoundOff.y = buttonSettings.y+distanceNum;
			buttonSoundOn.x = buttonSoundOff.x;
			buttonSoundOn.y = buttonSoundOff.y = buttonSettings.y+(distanceNum);
			
			buttonFullscreen.x = buttonSettings.x;
			buttonFullscreen.y = buttonSettings.y+(distanceNum*2);
			
			buttonExit.x = buttonSettings.x;
			buttonExit.y = buttonSettings.y+(distanceNum*3);
		}
		
		/*itemTouchUp.x = offset.x + 90;
		itemTouchDown.x = offset.x + 90;
		itemTouchDown.y = canvasH - (offset.y + 90);
		itemTouchUp.y = itemTouchDown.y - 140;*/
		
		itemTouchUp.x = (offset.x + 90)
		itemTouchUp.y = canvasH - (offset.y + 90);
		itemTouchDown.x = itemTouchUp.x + 110;
		itemTouchDown.y = itemTouchUp.y;
		
		itemTouchRight.x = canvasW - (offset.x + 90)
		itemTouchRight.y = canvasH - (offset.y + 90);
		itemTouchLeft.x = (offset.x + 90)
		itemTouchLeft.y = canvasH - (offset.y + 90);
	}
}

/*!
 * 
 * REMOVE GAME CANVAS - This is the function that runs to remove game canvas
 * 
 */
 function removeGameCanvas(){
	 stage.autoClear = true;
	 stage.removeAllChildren();
	 stage.update();
	 createjs.Ticker.removeEventListener("tick", tick);
	 createjs.Ticker.removeEventListener("tick", stage);
 }

/*!
 * 
 * CANVAS LOOP - This is the function that runs for canvas loop
 * 
 */ 
function tick(event) {
	updateGame();
	stage.update(event);
}

/*!
 * 
 * CANVAS MISC FUNCTIONS
 * 
 */
function centerReg(obj){
	obj.regX=obj.image.naturalWidth/2;
	obj.regY=obj.image.naturalHeight/2;
}

function createHitarea(obj){
	obj.hitArea = new createjs.Shape(new createjs.Graphics().beginFill("#000").drawRect(0, 0, obj.image.naturalWidth, obj.image.naturalHeight));
}
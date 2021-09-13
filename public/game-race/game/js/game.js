////////////////////////////////////////////////////////////
// GAME v1.3
////////////////////////////////////////////////////////////

/*!
 * 
 * GAME SETTING CUSTOMIZATION START
 * 
 */
 
//background assets
var backgroundData = {
	hills: { src:'assets/background_hills.png'},
	sky:   { src:'assets/background_sky.png'},
	trees: { src:'assets/background_trees.png'}
};

//road assets
var roadData = {
	width:1800,
	rumbleLength:2,
	lanes:3,
	fogDensity:5,
	fog:'#045b4c',
	light:{road:'#434343', grass:'#509b50', rumble:'#FFFFFF', lane:'#CCCCCC'},
	dark:{road:'#444', grass:'#5bae5d', rumble:'red'}
};

//player assets
var playerCarData = {
	left: { src:'assets/car_left.png'},
	right:   { src:'assets/car_right.png'},
	straight: { src:'assets/car_straight.png'},
	up_left: { src:'assets/car_up_left.png'},
	up_right:   { src:'assets/car_up_right.png'},
	up_straight: { src:'assets/car_up_straight.png'}
};

//world assets
var spritesData = {
	BILLBOARD01:{src:'assets/billboard_01.png'},
	BILLBOARD02:{src:'assets/billboard_02.png'},
	BILLBOARD03:{src:'assets/billboard_03.png'},
	TREE1:{src:'assets/tree_01.png'},
	TREE2:{src:'assets/tree_02.png'},
	TREE3:{src:'assets/tree_03.png'},
	TREE4:{src:'assets/tree_04.png'},
	TREE5:{src:'assets/tree_05.png'},
	ROCK1:{src:'assets/rock_01.png'},
	ROCK2:{src:'assets/rock_02.png'},
	ROCK3:{src:'assets/rock_03.png'},
	TRUCK01:{src:'assets/truck_01.png'},
	TRUCK02:{src:'assets/truck_02.png'},
	JEEP01:{src:'assets/jeep_01.png'},
	CAR04:{src:'assets/car_04.png'},
	CAR03:{src:'assets/car_03.png'},
	CAR02:{src:'assets/car_02.png'},
	CAR01:{src:'assets/car_01.png'},
	NITRO:{src:'assets/item_power_nitro.png'},
	COIN:{src:'assets/item_power_coin.png'},
	FUEL:{src:'assets/item_power_fuel.png'},
	TRIBUNE:{src:'assets/podium.png'}
};

spritesData.PLANTS = [spritesData.TREE1, spritesData.TREE2, spritesData.TREE3, spritesData.TREE4, spritesData.TREE5, spritesData.ROCK1, spritesData.ROCK2, spritesData.ROCK3];
spritesData.CARS = [spritesData.CAR01, spritesData.CAR02, spritesData.CAR03, spritesData.CAR04, spritesData.JEEP01, spritesData.TRUCK01, spritesData.TRUCK02];
spritesData.BILLBOARDS = [spritesData.BILLBOARD01, spritesData.BILLBOARD02, spritesData.BILLBOARD03];
spritesData.CROWD = [spritesData.TRIBUNE];

var intructionDisplayText = 'Hindari motor lawan, tempuh jarak sejauh-jauhnya'; //instruction display text

//keyboard keycode
var keyboard_arr = {left:[65,37],
					right:[68,39],
					up:[87,38],
					down:[83,40]};

//powers
var scoreData = {text:'SCORE: [NUMBER]',//score display text
				coin:1} //collect coin score
var coinData = {text:'KOIN: [NUMBER]',//score display text
				coin:1} //collect coin score
				
var fuelData = {text:'FUEL:', //fuel display text
				total:100, //total fuel
				add:20, //collect fuel total
				updateTime:1, //fuel update timer
				decrease:0, //fuel decrease
				bar:{width:200, height:28, backgroundColor:'#2f2f2f', blankColor:'#fff', fillColor:'#25bf1d', space:3} //fuel bar
				};
				
var nitroData = {maxSpeed:20000, //nitro max speed
				accel:2800, //nitro accelerate speed
				cameraHeight:1500, //camera height
				timer:5}; //total nitro time

//game status (text, color and font size)				
var statusData = {
				start:{text:'GO', color:'#fff', size:120},
				nitro:{text:'TURBO', color:'#f68b1f', size:70},
				fuel:{text:'+FUEL', color:'#39b54a', size:70},
				score:{text:'+[NUMBER]', color:'#fcdb05', size:70},
				coin:{text:'+[NUMBER]', color:'#fcdb05', size:70},
				penalty:{text:'TIMEOUT:\n[NUMBER]', color:'#ec3e34', size:70},
				lowFuel:{text:'LOW FUEL', color:'#ff7f00', size:70},
				noFuel:{text:'OUT OF FUEL', color:'#ec3e34', size:70},
				}
				
var exitMessage = 'Are you sure\nyou want to quit?'; //go to main page message
var resultTitleText = 'GAME OVER';  //result text display
var resultScoreText = 'SKOR :';  //result text display
var resultCoinText = 'KOIN :';  //result text display

//Social share, [SCORE] will replace with game score
var shareEnable = true; //toggle share
var shareText = 'SHARE SKOR KAMU '; //social share message
var shareTitle = 'Highscore on Speed Racer Game is [SCORE]PTS.';//social share score title
var shareMessage = 'Saya menapatkan [SCORE], ikutan untuk memenangkan CBR Sport '; //social share score message
				
/*!
 *
 * GAME SETTING CUSTOMIZATION END
 *
 */
var dt;

var defaultData = {width:768,
				height:840,
				extraHeight:184,
				scale:0.00165,
				centrifugal:.3,
				skySpeed:0.001,
				hillSpeed:0.002,
				treeSpeed:0.003,
				skyOffset:0,
				hillOffset:0,
				treeOffset:0,
				segmentLength:200,
				trackLength:null,
				fieldOfView:100,
				cameraHeight:800,
				cameraDepth:null,
				drawDistance:300,
				playerX:0,
				playerZ:0,
				position:0,
				speed:0,
				maxSpeed:0,
				accel:0,
				breaking:0,
				decel:0,
				offRoadDecel:0,
				offRoadLimit:0,
				totalCars:200,
				lastY:0,
				turnSpeed:3.5
				};
				
var worldData = {};
var segments = [];
var cars = [];
var background = null;
var sprites = null;
var resolution = null;
var currentLapTime = 0;

var roadLengthData = {length:{none:0, short:25, medium:50, long:100},
					  hill:{none:0, low:20, medium:40, high:60},
					  curve:{none:0, easy:2, medium:4, hard:6}};

var playerData = {score:0, displayScore:0, coin:0, displayCoin:0};
var gameData = {paused:true, nitroMode:false, nitroTimer:0, fuel:0, fuelUpdate:false, accel:false, penalty:false, penaltyTime:0, brakeSound:false, accelSound:false, stopSound:false, ended:false};
var keyData = {left:false, right:false, accelerate:false, brake:false};

/*!
 * 
 * GAME BUTTONS - This is the function that runs to setup button event
 * 
 */
function buildGameButton(){
	itemTouchUp.visible = itemTouchDown.visible = itemTouchLeft.visible = itemTouchRight.visible = false;
	
	if($.browser.mobile || isTablet){
		itemTouchUp.visible = itemTouchDown.visible = itemTouchLeft.visible = itemTouchRight.visible = true;
		
		itemTouchUp.addEventListener("mousedown", function(evt) {
			if(gameData.paused){
				return;	
			}
			keyData.accelerate = true;
		});
		
		itemTouchUp.addEventListener("pressup", function(evt) {
			if(keyData.accelerate){
				keyData.accelerate = false;	
			}
		});
		
		itemTouchDown.addEventListener("mousedown", function(evt) {
			if(gameData.paused){
				return;	
			}
			keyData.brake = true;
		});
		
		itemTouchDown.addEventListener("pressup", function(evt) {
			if(keyData.brake){
				keyData.brake = false;	
			}
		});
		
		itemTouchLeft.addEventListener("mousedown", function(evt) {
			if(gameData.paused){
				return;	
			}
			keyData.left = true;
		});
		
		itemTouchLeft.addEventListener("pressup", function(evt) {
			if(keyData.left){
				keyData.left = false;	
			}
		});
		
		itemTouchRight.addEventListener("mousedown", function(evt) {
			if(gameData.paused){
				return;	
			}
			keyData.right = true;
		});
		
		itemTouchRight.addEventListener("pressup", function(evt) {
			if(keyData.right){
				keyData.right = false;	
			}
		});
	}else{
		var isInIframe = (window.location != window.parent.location) ? true : false;
		if(isInIframe){
			this.document.onkeydown = keydown;
			this.document.onkeyup = keyup;
		
			$(window).blur(function() {
				appendFocusFrame();
			});
			appendFocusFrame();
        }else{
            this.document.onkeydown = keydown;
			this.document.onkeyup = keyup;
        }
	}
	
	buttonStart.cursor = "pointer";
	buttonStart.addEventListener("click", function(evt) {
		playSound('soundClick');
		goPage('game');
	});
	
	buttonFacebook.cursor = "pointer";
	buttonFacebook.addEventListener("click", function(evt) {
		share('facebook');
	});
	buttonTwitter.cursor = "pointer";
	buttonTwitter.addEventListener("click", function(evt) {
		share('twitter');
	});
	buttonWhatsapp.cursor = "pointer";
	buttonWhatsapp.addEventListener("click", function(evt) {
		share('whatsapp');
	});
	
	buttonSoundOff.cursor = "pointer";
	buttonSoundOff.addEventListener("click", function(evt) {
		toggleGameMute(true);
	});
	
	buttonSoundOn.cursor = "pointer";
	buttonSoundOn.addEventListener("click", function(evt) {
		toggleGameMute(false);
	});
	
	buttonFullscreen.cursor = "pointer";
	buttonFullscreen.addEventListener("click", function(evt) {
		toggleFullScreen();
	});
	
	buttonExit.cursor = "pointer";
	buttonExit.addEventListener("click", function(evt) {
		playSound('soundClick');
		toggleConfirm(true);
	});
	
	buttonSettings.cursor = "pointer";
	buttonSettings.addEventListener("click", function(evt) {
		toggleOption();
	});
	
	buttonConfirm.cursor = "pointer";
	buttonConfirm.addEventListener("click", function(evt) {
		playSound('soundClick');
		toggleConfirm(false);
		stopGame(true);
		goPage('main');
	});
	
	buttonCancel.cursor = "pointer";
	buttonCancel.addEventListener("click", function(evt) {
		playSound('soundClick');
		toggleConfirm(false);
	});
	
	buttonRestart.cursor = "pointer";
	buttonRestart.addEventListener("click", function(evt) {
		playSound('soundClick');
		resetGame();
		goPage('game');
	});
}

function appendFocusFrame(){
	$('#mainHolder').prepend('<div id="focus" style="position:absolute; width:100%; height:100%; z-index:1000;"></div');
	$('#focus').click(function(){
		$('#focus').remove();
	});	
}

/*!
 * 
 * KEYBOARD EVENTS - This is the function that runs for keyboard events
 * 
 */
function keydown(event) {
	if(gameData.paused){
		return;	
	}
	
	if(keyboard_arr.left.indexOf(event.keyCode) != -1){
		//left
		keyData.left = true;
	}
	
	if(keyboard_arr.right.indexOf(event.keyCode) != -1){
		//right
		keyData.right = true;
	}
	
	if(keyboard_arr.up.indexOf(event.keyCode) != -1){
		//up
		keyData.accelerate = true;
	}
	
	if(keyboard_arr.down.indexOf(event.keyCode) != -1){
		//down
		keyData.brake = true;
	}
}

function keyup(event) {
	if(gameData.paused){
		return;	
	}
	
	if(keyboard_arr.left.indexOf(event.keyCode) != -1 && keyData.left){
		keyData.left = false
	}
	
	if(keyboard_arr.right.indexOf(event.keyCode) != -1 && keyData.right){
		keyData.right = false;
	}
	
	if(keyboard_arr.up.indexOf(event.keyCode) != -1 && keyData.accelerate){
		keyData.accelerate = true;
	}
	
	if(keyboard_arr.down.indexOf(event.keyCode) != -1 && keyData.brake){
		keyData.brake = false;
	}
}

/*!
 * 
 * DISPLAY PAGES - This is the function that runs to display pages
 * 
 */
var curPage=''
function goPage(page){
	curPage=page;
	
	mainContainer.visible = false;
	gameContainer.visible = false;
	resultContainer.visible = false;
	
	TweenMax.killTweensOf(playerData);
	
	var targetContainer = null;
	switch(page){
		case 'main':
			targetContainer = mainContainer;
			resetGame();
		break;
		
		case 'game':
			targetContainer = gameContainer;
			startGame();
		break;
		
		case 'result':
			targetContainer = resultContainer;
			stopGame(true);
			playSound('soundOver');

			TweenMax.to(playerData, 1, {displayScore:playerData.score, displayCoin:playerData.coin, overwrite:true, onUpdate:function(){
				resultScoreTxt.text = addCommas(Math.floor(playerData.displayScore));
				resultScoreShadowTxt.text = addCommas(Math.floor(playerData.displayScore));
				resultCoinTxt.text = addCommas(Math.floor(playerData.displayCoin));
				resultCoinShadowTxt.text = addCommas(Math.floor(playerData.displayCoin));
			}});
			
			saveGame(playerData.score, playerData.coin);
		break;
	}
	
	if(targetContainer != null){
		targetContainer.visible = true;
		targetContainer.alpha = 0;
		TweenMax.to(targetContainer, .5, {alpha:1, overwrite:true});
	}
	
	resizeCanvas();
}

function toggleConfirm(con){
	confirmContainer.visible = con;
	
	if(con){
		TweenMax.pauseAll(true, true);
		gameData.paused = true;
	}else{
		TweenMax.resumeAll(true, true);
		if(curPage == 'game'){
			gameData.paused = false;
		}
	}
}

/*!
 * 
 * START GAME - This is the function that runs to start play game
 * 
 */

function startGame(){
	playerData.score = 0;
	playerData.coin = 0;
	gameData.nitroMode = false;
	gameData.fuel = fuelData.total;
	gameData.fuelUpdate = false;
	gameData.paused = false;
	gameData.accel = false;
	gameData.penalty = false;
	gameData.brakeSound = false;
	gameData.accelSound = false;
	gameData.stopSound = false;
	gameData.ended = false;
	
	defaultData.playerX = 0;
	defaultData.speed = 0;
	
	instructionShadowTxt.visible = instructionTxt.visible = false;
	if($.browser.mobile || isTablet){
		
	}else{
		instructionShadowTxt.visible = instructionTxt.visible = true;
	}
	keyData.accelerate = true;
	updateGameText(statusData.start.text, statusData.start.color, statusData.start.size, 0);
	updateGameStatus();
}

 /*!
 * 
 * STOP GAME - This is the function that runs to stop play game
 * 
 */
function stopGame(){
	gameData.paused = true;
	TweenMax.killAll();
}

/*!
 * 
 * SAVE GAME - This is the function that runs to save game
 * 
 */
function saveGame(score, coin){
	/*$.ajax({
      type: "POST",
      url: 'saveResults.php',
      data: {score:score},
      success: function (result) {
          console.log(result);
      }
    });*/
    console.log(score);
    console.log(coin);
}

/*!
 * 
 * LOOP UPDATE GAME - This is the function that runs to update game loop
 * 
 */
function updateGame(){
	updateWorld();
	updateFuel();
	
	if(!gameData.paused){
		if(defaultData.speed > 0){
			if(gameData.penalty){
				gameData.penalty = false;
				togglePenaltyTimer(false);
			}
			
			if(!gameData.accel){
				gameData.accel = true;
				instructionShadowTxt.visible = instructionTxt.visible = false;
				updateGameText('');
			}
		}
		
		//timeout
		if(defaultData.speed == 0 && gameData.accel && !gameData.penalty){
			gameData.penalty = true;
			togglePenaltyTimer(true);
		}
		
		playerData.score += Math.floor((5 * Math.round(defaultData.speed/500)) * .03);
		updateGameStatus();
	}
}

/*!
 * 
 * UPDATE FUEL - This is the function that runs to update game fuel
 * 
 */
function updateFuel(){
	if(defaultData.speed > 0 && !gameData.fuelUpdate){
		gameData.fuelUpdate = true;
		TweenMax.to(fuelData, fuelData.updateTime, {overwrite:true, onComplete:function(){
			gameData.fuel -= fuelData.decrease;
			gameData.fuel = gameData.fuel < 0 ? 0 : gameData.fuel;
			gameData.fuelUpdate = false;
			
			updateGameStatus();
		}});
	}
}

/*!
 * 
 * TOGGLE GAME PENALTY - This is the function that runs to toggle game penalty
 * 
 */
function togglePenaltyTimer(con){
	if(con){
		gameData.penaltyTime = 41;
		updatePenaltyTimer();
	}else{
		TweenMax.killTweensOf(gameContainer);
		updateGameText('');	
	}
}

function updatePenaltyTimer(){
	gameData.penaltyTime -= 1;
	
	var displayPenaltyTimer = false;
	if(gameData.penaltyTime < 31){
		displayPenaltyTimer = true;
	}
	
	if(String(gameData.penaltyTime*.1).indexOf(".") == -1 && displayPenaltyTimer){
		playSound('soundTick');	
	}
	
	if(gameData.penaltyTime <= 0){
		updateGameText(statusData.penalty.text.replace('[NUMBER]','0.00'), statusData.penalty.color, statusData.penalty.size, 0);
		playSound('soundTickOver');
		endGame();
	}else{
		if(displayPenaltyTimer){
			var curPenaltyTime = (String(gameData.penaltyTime*.1)+'000').substring(0,4);
			updateGameText(statusData.penalty.text.replace('[NUMBER]',curPenaltyTime), statusData.penalty.color, statusData.penalty.size, 0);
		}
		TweenMax.to(gameContainer, .1, {overwrite:true, onComplete:updatePenaltyTimer});
	}
}

/*!
 * 
 * UPDATE WORLD - This is the function that runs to update game world
 * 
 */
function updateWorld(){
	updateSprites();
	renderWorld();	
}

function updateSprites() {
  	var n, car, carW, sprite, spriteW;
	var dt = (1/60);
	var playerSegment = findSegment((defaultData.position+defaultData.playerZ));
	var playerW = playerCarData.straight.w * defaultData.scale;
	var speedPercent  = defaultData.speed/worldData.maxSpeed;
	var dx = dt * defaultData.turnSpeed * speedPercent;
	var startPosition = defaultData.position;
	
	updateCars(dt, playerSegment, playerW);
	
	defaultData.position = getIncrease(defaultData.position, dt * defaultData.speed, defaultData.trackLength);
	
	if (keyData.left){
		defaultData.playerX = defaultData.playerX - dx;
	}else if (keyData.right){
		defaultData.playerX = defaultData.playerX + dx;
	}
	defaultData.playerX = defaultData.playerX - (dx * speedPercent * playerSegment.curve * defaultData.centrifugal);
	
	if (keyData.accelerate){
		defaultData.speed = getAccelerate(defaultData.speed, worldData.accel, dt);
	}else if (keyData.brake){
		defaultData.speed = getAccelerate(defaultData.speed, defaultData.breaking, dt);
	}else{
		defaultData.speed = getAccelerate(defaultData.speed, defaultData.decel, dt);
	}
	
	if ((defaultData.playerX < -1) || (defaultData.playerX > 1)) {
		if (defaultData.speed > defaultData.offRoadLimit)
			defaultData.speed = getAccelerate(defaultData.speed, defaultData.offRoadDecel, dt);
		//NABRAK PINGGIR
		for(n = 0 ; n < playerSegment.sprites.length ; n++) {
			sprite  = playerSegment.sprites[n];
			spriteW = sprite.source.w * defaultData.scale;
			if (getOverlap(defaultData.playerX, playerW, sprite.offset + spriteW/2 * (sprite.offset > 0 ? 1 : -1), spriteW)) {
                endGame();
				defaultData.speed = worldData.maxSpeed/5;
				defaultData.position = getIncrease(playerSegment.p1.world.z, -defaultData.playerZ, defaultData.trackLength);
				break;
			}
		}
	}
	
	//powers
	if(!gameData.paused){
		for(n = 0 ; n < playerSegment.sprites.length ; n++) {
			sprite  = playerSegment.sprites[n];
			if(sprite.active){
				spriteW = sprite.source.w * defaultData.scale;
				if(getOverlap(defaultData.playerX, playerW, sprite.offset + spriteW/2 * (sprite.offset > 0 ? 1 : -1), spriteW)) {
					if(sprite.source.id == 'NITRO'){
						sprite.active = false;
						startNitro();
					}else if(sprite.source.id == 'COIN'){
						sprite.active = false;
						addCoin();
					}else if(sprite.source.id == 'FUEL'){
						sprite.active = false;
						addFuel();
					}
				}	
			}
		}
	}
	
	playCarSound();

    //NABRAK
    for(n = 0 ; n < playerSegment.cars.length ; n++) {
		car  = playerSegment.cars[n];
		carW = car.sprite.w * defaultData.scale;
		if (defaultData.speed > car.speed) {
			if (getOverlap(defaultData.playerX, playerW, car.offset, carW, 0.8)) {
				playSound('soundImpact');
                endGame();	
				defaultData.speed    = car.speed * (car.speed/defaultData.speed);
				defaultData.position = getIncrease(car.z, -defaultData.playerZ, defaultData.trackLength);
				break;
			}
		}
	}

	defaultData.playerX = getLimit(defaultData.playerX, -2, 2);// dont ever let it go too far out of bound
	defaultData.speed = getLimit(defaultData.speed, 0, worldData.maxSpeed); // or exceed defaultData.maxSpeed
	
	defaultData.skyOffset  = getIncrease(defaultData.skyOffset,  defaultData.skySpeed  * playerSegment.curve * (defaultData.position-startPosition)/defaultData.segmentLength, 1);
	defaultData.hillOffset = getIncrease(defaultData.hillOffset, defaultData.hillSpeed * playerSegment.curve * (defaultData.position-startPosition)/defaultData.segmentLength, 1);
	defaultData.treeOffset = getIncrease(defaultData.treeOffset, defaultData.treeSpeed * playerSegment.curve * (defaultData.position-startPosition)/defaultData.segmentLength, 1);

	if (defaultData.position > defaultData.playerZ) {
		if (currentLapTime && (startPosition < defaultData.playerZ)) {
			resetCollectItems();
		}else {
          currentLapTime += dt;
        }
	}
}

function playCarSound(){
	gameData.brakeSound = false;
	if(keyData.left || keyData.right || keyData.brake){
		gameData.brakeSound = true;
	}
	
	if(keyData.accelerate){
		if(!gameData.accelSound){
			gameData.accelSound = true;
			playSoundID('soundSpeedUp', loopCarEngine);
			stopSoundID('soundSlowDown');
		}
	}else{
		if(gameData.accelSound){
			gameData.accelSound = false;
			stopSoundID('soundSpeedUp');
			playSoundID('soundSlowDown');
			stopSoundLoop('soundEngine');
		}
	}
	
	if(gameData.brakeSound && defaultData.speed > 0){
		playSoundLoop('soundBrake');
	}else{
		stopSoundLoop('soundBrake')	;
	}	
}

function loopCarEngine(){
	playSoundLoop('soundEngine');
}

function updateCars(dt, playerSegment, playerW) {
	var n, car, oldSegment, newSegment;
	for(n = 0 ; n < cars.length ; n++) {
		car         = cars[n];
		oldSegment  = findSegment(car.z);
		car.offset  = car.offset + updateCarOffset(car, oldSegment, playerSegment, playerW);
		car.z       = getIncrease(car.z, dt * car.speed, defaultData.trackLength);
		car.percent = percentRemaining(car.z, defaultData.segmentLength);
		newSegment  = findSegment(car.z);
		
		if (oldSegment != newSegment) {
			index = oldSegment.cars.indexOf(car);
			oldSegment.cars.splice(index, 1);
			newSegment.cars.push(car);
		}
	}
}

function updateCarOffset(car, carSegment, playerSegment, playerW) {
	var i, j, dir, segment, otherCar, otherCarW, lookahead = 20, carW = car.sprite.w * defaultData.scale;
	if ((carSegment.index - playerSegment.index) > defaultData.drawDistance)
		return 0;

	for(i = 1 ; i < lookahead ; i++) {
		segment = segments[(carSegment.index+i)%segments.length];

		if ((segment === playerSegment) && (car.speed > defaultData.speed) && (getOverlap(defaultData.playerX, playerW, car.offset, carW, 1.2))) {
			if (defaultData.playerX > 0.5)
				dir = -1;
			else if (defaultData.playerX < -0.5)
				dir = 1;
			else
				dir = (car.offset > defaultData.playerX) ? 1 : -1;
				return dir * 1/i * (car.speed-defaultData.speed)/worldData.maxSpeed;
		}

		for(j = 0 ; j < segment.cars.length ; j++) {
			otherCar  = segment.cars[j];
			otherCarW = otherCar.sprite.w * defaultData.scale;
			if ((car.speed > otherCar.speed) && getOverlap(car.offset, carW, otherCar.offset, otherCarW, 1.2)) {
				if (otherCar.offset > 0.5)
					dir = -1;
				else if (otherCar.offset < -0.5)
					dir = 1;
				else
					dir = (car.offset > otherCar.offset) ? 1 : -1;
					return dir * 1/i * (car.speed-otherCar.speed)/worldData.maxSpeed;
			}
		}
	}

	if (car.offset < -0.9)
		return 0.1;
	else if (car.offset > 0.9)
		return -0.1;
	else
		return 0;
}

/*!
 * 
 * RENDER WORLD - This is the function that runs to update render world
 * 
 */
function renderWorld() {
	var baseSegment   = findSegment(defaultData.position);
	var basePercent   = percentRemaining(defaultData.position, defaultData.segmentLength);
	var playerSegment = findSegment(defaultData.position+defaultData.playerZ);
	var playerPercent = percentRemaining(defaultData.position+defaultData.playerZ, defaultData.segmentLength);
	var playerY       = getInterpolate(playerSegment.p1.world.y, playerSegment.p2.world.y, playerPercent);
	var maxy          = defaultData.height+defaultData.extraHeight;
	
	var x  = 0;
	var dx = - (baseSegment.curve * basePercent);
	
	worldContainer.removeAllChildren();
	
	renderBackground(background, defaultData.width, defaultData.height, backgroundData.sky,   defaultData.skyOffset,  resolution * defaultData.skySpeed  * playerY);
	renderBackground(background, defaultData.width, defaultData.height, backgroundData.hills, defaultData.hillOffset, resolution * defaultData.hillSpeed * playerY);
	renderBackground(background, defaultData.width, defaultData.height, backgroundData.trees, defaultData.treeOffset, resolution * defaultData.treeSpeed * playerY);

  	var n, i, segment, car, sprite, spriteScale, spriteX, spriteY;
	
	for(n = 0 ; n < defaultData.drawDistance ; n++) {
		segment        = segments[(baseSegment.index + n) % segments.length];
		segment.looped = segment.index < baseSegment.index;
		segment.fog    = exponentialFog(n/defaultData.drawDistance, roadData.fogDensity);
		segment.clip   = maxy;
		
		getProject(segment.p1, (defaultData.playerX * roadData.width) - x,      playerY + worldData.cameraHeight, defaultData.position - (segment.looped ? defaultData.trackLength : 0), defaultData.cameraDepth, defaultData.width, defaultData.height, roadData.width);
		getProject(segment.p2, (defaultData.playerX * roadData.width) - x - dx, playerY + worldData.cameraHeight, defaultData.position - (segment.looped ? defaultData.trackLength : 0), defaultData.cameraDepth, defaultData.width, defaultData.height, roadData.width);
		
		x  = x + dx;
		dx = dx + segment.curve;
		
		if ((segment.p1.camera.z <= defaultData.cameraDepth)         || // behind us
			(segment.p2.screen.y >= segment.p1.screen.y) || // back face cull
			(segment.p2.screen.y >= maxy))                  // clip by (already rendered) hill
		  continue;
		
		defaultData.lastY = segment.p1.screen.y;
		renderSegment(defaultData.width, roadData.lanes,
					   segment.p1.screen.x,
					   segment.p1.screen.y,
					   segment.p1.screen.w,
					   segment.p2.screen.x,
					   segment.p2.screen.y,
					   segment.p2.screen.w,
					   segment.fog,
					   segment.color);
		
		maxy = segment.p1.screen.y;
	}
	
  	for(n = (defaultData.drawDistance-1) ; n > 0 ; n--) {
		segment = segments[(baseSegment.index + n) % segments.length];
		
		for(i = 0 ; i < segment.cars.length ; i++) {
			car         = segment.cars[i];
			sprite      = car.sprite;
			spriteScale = getInterpolate(segment.p1.screen.scale, segment.p2.screen.scale, car.percent);
			spriteX     = getInterpolate(segment.p1.screen.x,     segment.p2.screen.x,     car.percent) + (spriteScale * car.offset * roadData.width * defaultData.width/2);
			spriteY     = getInterpolate(segment.p1.screen.y,     segment.p2.screen.y,     car.percent);
			renderSprite(defaultData.width, defaultData.height, resolution, roadData.width, sprites, car.sprite, spriteScale, spriteX, spriteY, -0.5, -1, segment.clip);
		}
	
		for(i = 0 ; i < segment.sprites.length ; i++) {
			sprite      = segment.sprites[i];
			spriteScale = segment.p1.screen.scale;
			spriteX     = segment.p1.screen.x + (spriteScale * sprite.offset * roadData.width * defaultData.width/2);
			spriteY     = segment.p1.screen.y;
			
			if(sprite.active)
				renderSprite(defaultData.width, defaultData.height, resolution, roadData.width, sprites, sprite.source, spriteScale, spriteX, spriteY, (sprite.offset < 0 ? -1 : 0), -1, segment.clip);
		}

		if(segment == playerSegment) {
			renderPlayer(defaultData.width, defaultData.height, resolution, roadData.width, sprites, defaultData.speed/worldData.maxSpeed,
						defaultData.cameraDepth/defaultData.playerZ,
						defaultData.width/2,
						(defaultData.height/2) - (defaultData.cameraDepth/defaultData.playerZ * getInterpolate(playerSegment.p1.camera.y, playerSegment.p2.camera.y, playerPercent) * defaultData.height/2),
						defaultData.speed * (keyData.left ? -1 : keyData.right ? 1 : 0),
						playerSegment.p2.world.y - playerSegment.p1.world.y);
		}
  	}
}

function findSegment(z) {
	return segments[Math.floor(z/defaultData.segmentLength) % segments.length]; 
}


/*!
 * 
 * BUILD ROAD - This is the function that runs to build road
 * 
 */
function getLastY() {
	return (segments.length == 0) ? 0 : segments[segments.length-1].p2.world.y;
}

function addSegment(curve, y) {
  var n = segments.length;
  segments.push({
	  index: n,
		 p1: { world: { y: getLastY(), z:  n   *defaultData.segmentLength }, camera: {}, screen: {} },
		 p2: { world: { y: y,       z: (n+1)*defaultData.segmentLength }, camera: {}, screen: {} },
	  curve: curve,
	sprites: [],
	   cars: [],
	  color: Math.floor(n/roadData.rumbleLength)%2 ? roadData.dark : roadData.light
  });
}

function addSprite(n, sprite, offset) {
	segments[n].sprites.push({ source: sprite, offset: offset, active:true});
}

function addRoad(enter, hold, leave, curve, y) {
	var startY   = getLastY();
	var endY     = startY + (toInt(y, 0) * defaultData.segmentLength);
	var n, total = enter + hold + leave;
	for(n = 0 ; n < enter ; n++)
		addSegment(easeIn(0, curve, n/enter), easeInOut(startY, endY, n/total));
	for(n = 0 ; n < hold  ; n++)
		addSegment(curve, easeInOut(startY, endY, (enter+n)/total));
	for(n = 0 ; n < leave ; n++)
		addSegment(easeInOut(curve, 0, n/leave), easeInOut(startY, endY, (enter+hold+n)/total));
}

function addRoadType(type, num, height, curve){
	
	switch(type){
		case 'straight':
			num = num || roadLengthData.length.medium;
			addRoad(num, num, num, 0, 0);
		break;
		
		case 'hill':
			num    = num    || roadLengthData.length.medium;
  			height = height || roadLengthData.hill.medium;
			curve = 0;
			addRoad(num, num, num, 0, height);
		break;
		
		case 'curve':
			num    = num    || roadLengthData.length.medium;
			curve  = curve  || roadLengthData.curve.medium;
			height = height || roadLengthData.hill.none;
			addRoad(num, num, num, curve, height);
		break;
		
		case 'lowRollingHills':
			num    = num    || roadLengthData.length.short;
			height = height || roadLengthData.hill.low;
			addRoad(num, num, num,  0,                height/2);
			addRoad(num, num, num,  0,               -height);
			addRoad(num, num, num,  roadLengthData.curve.easy,  height);
			addRoad(num, num, num,  0,                0);
			addRoad(num, num, num, -roadLengthData.curve.easy,  height/2);
			addRoad(num, num, num,  0,                0);
		break;
		
		case 'sCurves':
			addRoad(roadLengthData.length.medium, roadLengthData.length.medium, roadLengthData.length.medium,  -roadLengthData.curve.easy,    roadLengthData.hill.none);
			addRoad(roadLengthData.length.medium, roadLengthData.length.medium, roadLengthData.length.medium,   roadLengthData.curve.medium,  roadLengthData.hill.medium);
			addRoad(roadLengthData.length.medium, roadLengthData.length.medium, roadLengthData.length.medium,   roadLengthData.curve.easy,   -roadLengthData.hill.low);
			addRoad(roadLengthData.length.medium, roadLengthData.length.medium, roadLengthData.length.medium,  -roadLengthData.curve.easy,    roadLengthData.hill.medium);
			addRoad(roadLengthData.length.medium, roadLengthData.length.medium, roadLengthData.length.medium,  -roadLengthData.curve.medium, -roadLengthData.hill.medium);
		break;
		
		case 'bumps':
			addRoad(10, 10, 10, 0,  5);
			addRoad(10, 10, 10, 0, -2);
			addRoad(10, 10, 10, 0, -5);
			addRoad(10, 10, 10, 0,  8);
			addRoad(10, 10, 10, 0,  5);
			addRoad(10, 10, 10, 0, -7);
			addRoad(10, 10, 10, 0,  5);
			addRoad(10, 10, 10, 0, -2);
		break;
		
		case 'end':
			num = num || 200;
  			addRoad(num, num, num, -roadLengthData.curve.easy, -getLastY()/defaultData.segmentLength);
		break;
	}
}

/*!
 * 
 * RESET WORLD - This is the function that runs to reset game world
 * 
 */
function resetGame(){
	resetWorld();
	resetRoad();	
}

function resetWorld(){
	defaultData.maxSpeed = defaultData.segmentLength/(1/60);
	defaultData.accel          =  defaultData.maxSpeed/5;
	defaultData.breaking       = -defaultData.maxSpeed;
	defaultData.decel          = -defaultData.maxSpeed/5;
	defaultData.offRoadDecel   = -defaultData.maxSpeed/2;
	defaultData.offRoadLimit   =  defaultData.maxSpeed/4;
	
	defaultData.cameraDepth = 1 / Math.tan((defaultData.fieldOfView/2) * Math.PI/180);
	defaultData.playerZ = (defaultData.cameraHeight * defaultData.cameraDepth);
	resolution = defaultData.height/1024;
	  
	for(var key in defaultData) {
		worldData[key] = defaultData[key];
	}
}

function resetRoad() {
	segments = [];
	
	addRoadType('straight', roadLengthData.length.long);
	/*addRoadType('lowRollingHills');
	addRoadType('sCurves');
	addRoadType('bumps');
	addRoadType('lowRollingHills');
	addRoadType('curve', roadLengthData.length.long*2, roadLengthData.hill.medium, roadLengthData.curve.medium);
	
	addRoadType('straight', '');
	addRoadType('hill', roadLengthData.length.medium, roadLengthData.hill.hight);
	addRoadType('sCurves');
	addRoadType('curve', roadLengthData.length.long, roadLengthData.hill.none, -roadLengthData.curve.medium);
	addRoadType('bumps');
	addRoadType('hill', roadLengthData.length.long, -roadLengthData.hill.medium);
	
	addRoadType('straight', '');
	addRoadType('bumps');
	addRoadType('sCurves');*/
	
	for(var n = 0; n<14; n++){
		var roadTypeNum = Math.floor(Math.random()*8)+1;
		if(roadTypeNum == 1){
			addRoadType('straight', '');
//			addRoadType('lowRollingHills');	
		}else if(roadTypeNum == 2){
			addRoadType('straight', '');
//			addRoadType('sCurves');
		}else if(roadTypeNum == 3){
//			addRoadType('straight', '');
			addRoadType('bumps');
		}else if(roadTypeNum == 4){
			addRoadType('curve', roadLengthData.length.long*2, roadLengthData.hill.medium, roadLengthData.curve.medium);
		}else if(roadTypeNum == 5){
			addRoadType('curve', roadLengthData.length.long, roadLengthData.hill.none, roadLengthData.curve.medium);
		}else if(roadTypeNum == 6){
			addRoadType('straight', '');
		}else if(roadTypeNum == 7){
			addRoadType('straight', '');
//			addRoadType('hill', roadLengthData.length.medium, roadLengthData.hill.hight);
		}else if(roadTypeNum == 8){
			addRoadType('straight', '');
//			addRoadType('hill', roadLengthData.length.long, roadLengthData.hill.medium);
		}
	}
	addRoadType('end');
	
	resetSprites();
	resetCars();
	
	defaultData.trackLength = segments.length * defaultData.segmentLength;
}

function resetSprites() {
	//plants
	for(var n = 10 ; n < segments.length ; n += 10) {
		addSprite(n, randomChoice(spritesData.PLANTS), randomChoice([1,-1]) * (1.2 + Math.random() * 5));
	}
	
	//billboards
	if(spritesData.BILLBOARDS.length > 0){
		for(var n = 100 ; n < segments.length ; n += (300 + Math.floor(Math.random()*100))) {
			addSprite(n, randomChoice(spritesData.BILLBOARDS), randomChoice([1,-1]) * (1.2));
		}
	}
	
	resetCollectItems();
}

function resetCollectItems(){
	for(var n=0; n<segments.length;n++){
		var curSegment = segments[n];
		for(var s = 0 ; s < curSegment.sprites.length ; s++) {
			var sprite  = curSegment.sprites[s];
			if(sprite.source.id == 'NITRO' || sprite.source.id == 'COIN' || sprite.source.id == 'FUEL'){
				curSegment.sprites.splice(s,1);
				s--;
			}
		}	
	}
	
	//nitro
//	for(var n = randomInt(300, 400) ; n < segments.length ; n += (750 + Math.floor(Math.random()*200))) {
//		addSprite(n,  spritesData.NITRO, randomChoice([1,-1]) * (0.1 + Math.random()*0.3));
//	}
	
	//fuel
//	for(var n = randomInt(400, 500) ; n < segments.length ; n += (400 + Math.floor(Math.random()*100))) {
//		addSprite(n,  spritesData.FUEL, randomChoice([1,-1]) * (0.1 + Math.random()*0.3));
//	}
	
	//coin
	for(var n = randomInt(20, 50) ; n < segments.length ; n += (300 + Math.floor(Math.random()*50))) {
		addSprite(n,  spritesData.COIN, randomChoice([1,-1]) * (0.1 + Math.random()*0.3));
	}
}

function resetCars() {
	cars = [];
	var n, car, segment, offset, z, sprite, speed;
	for (var n = 0 ; n < defaultData.totalCars ; n++) {
		offset = Math.random() * randomChoice([-0.8, 0.8]);
		z      = Math.floor(Math.random() * segments.length) * defaultData.segmentLength;
		sprite = randomChoice(spritesData.CARS);
		speed  = worldData.maxSpeed/4 + Math.random() * worldData.maxSpeed/(sprite == spritesData.SEMI ? 4 : 2);
		car = { offset: offset, z: z, sprite: sprite, speed: speed };
		segment = findSegment(car.z);
		segment.cars.push(car);
		cars.push(car);
	}
}

/*!
 * 
 * RENDER MISC - This is the function that runs for render misc
 * 
 */
function renderPolygon(x1, y1, x2, y2, x3, y3, x4, y4, color){
	var shape = new createjs.Shape();
	shape.graphics.beginFill(color)
				.beginStroke()
				.moveTo(x1, y1)
				.lineTo(x2, y2)
				.lineTo(x3, y3)
				.lineTo(x4, y4)
				.endStroke();
	worldContainer.addChild(shape);
}

function renderSegment(width, lanes, x1, y1, w1, x2, y2, w2, fog, color){
	var r1 = rumbleWidth(w1, lanes),
        r2 = rumbleWidth(w2, lanes),
        l1 = laneMarkerWidth(w1, lanes),
        l2 = laneMarkerWidth(w2, lanes),
        lanew1, lanew2, lanex1, lanex2, lane;

    
    
	var shape = new createjs.Shape();
	shape.graphics.beginFill(color.grass).drawRect(0, y2, width, y1 - y2);
	worldContainer.addChild(shape);
    
    renderPolygon(x1-w1-r1, y1, x1-w1, y1, x2-w2, y2, x2-w2-r2, y2, color.rumble);
    renderPolygon(x1+w1+r1, y1, x1+w1, y1, x2+w2, y2, x2+w2+r2, y2, color.rumble);
    renderPolygon(x1-w1,    y1, x1+w1, y1, x2+w2, y2, x2-w2,    y2, color.road);
    //BOBBY
    renderPolygon(x1-w1-(r1*5), y1, x1-(w1*2.5), y1, x2-(w2*2.5), y2, x2-w2-(r2*5), y2, '#777');
    renderPolygon(x1+w1+(r1*5), y1, x1+(w1*2.5), y1, x2+(w2*2.5), y2, x2+w2+(r2*5), y2, '#777');
    
    if (color.lane) {
      lanew1 = w1*2/lanes;
      lanew2 = w2*2/lanes;
      lanex1 = x1 - w1 + lanew1;
      lanex2 = x2 - w2 + lanew2;
      for(lane = 1 ; lane < lanes ; lanex1 += lanew1, lanex2 += lanew2, lane++)
        renderPolygon(lanex1 - l1/2, y1, lanex1 + l1/2, y1, lanex2 + l2/2, y2, lanex2 - l2/2, y2, color.lane);
    }
    
    renderFog(0, y1, width, y2-y1, fog);
}

function renderBackground(background, width, height, layer, rotation, offset){
	var newBackground = $.background[layer.id].clone();
	var newBackgroundMirror = $.background[layer.id].clone();
    rotation = rotation || 0;
    offset   = offset   || 0;
	
	newBackground.x = rotation * layer.w;
	if(rotation > 0){
		newBackground.x = -(newBackground.x);	
	}else{
		newBackground.x = Math.abs(newBackground.x);	
	}
	
	var destY = (defaultData.lastY/defaultData.height) * 20;
	newBackground.y = destY+offset;
	
	worldContainer.addChild(newBackground, newBackgroundMirror);
	
	newBackgroundMirror.x = newBackground.x + layer.w;
	newBackgroundMirror.y = newBackground.y;
}

function renderSprite(width, height, resolution, roadWidth, sprites, sprite, scale, destX, destY, offsetX, offsetY, clipY){
	var newSprite = $.sprites[sprite.id].clone();
	
    var destW  = (newSprite.image.naturalWidth * scale * width/2) * (defaultData.scale * roadWidth);
    var destH  = (newSprite.image.naturalHeight * scale * width/2) * (defaultData.scale * roadWidth);

    destX = destX + (destW * (offsetX || 0));
    destY = destY + (destH * (offsetY || 0));
	
    var clipH = clipY ? Math.max(0, destY+destH-clipY) : 0;
    if (clipH < destH){
		newSprite.x = destX;
		newSprite.y = destY;
		newSprite.scaleX = destW/sprite.w;
		newSprite.scaleY = (destH - clipH)/sprite.h;
		
		worldContainer.addChild(newSprite);	
	}
}

function renderPlayer(width, height, resolution, roadWidth, sprites, speedPercent, scale, destX, destY, steer, updown){
	if(curPage == 'result'){
		return;	
	}
	
	var bounce = (1.5 * Math.random() * speedPercent * resolution) * randomChoice([-1,1]);
	var sprite;
	if (steer < 0)
	  sprite = (updown > 0) ? playerCarData.up_left : playerCarData.left;
	else if (steer > 0)
	  sprite = (updown > 0) ? playerCarData.up_right : playerCarData.right;
	else
	  sprite = (updown > 0) ? playerCarData.up_straight : playerCarData.straight;
	
	renderCar(width, height, resolution, roadWidth, sprites, sprite, scale, destX, destY + bounce, -0.5, -.8);
}

function renderCar(width, height, resolution, roadWidth, sprites, sprite, scale, destX, destY, offsetX, offsetY, clipY){
	var newSprite = $.sprites[sprite.id].clone();
    var destW  = (sprite.w * scale * width/2) * (defaultData.scale * roadWidth);
    var destH  = (sprite.h * scale * width/2) * (defaultData.scale * roadWidth);

    destX = destX + (destW * (offsetX || 0));
    destY = destY + (destH * (offsetY || 0));
	
    var clipH = clipY ? Math.max(0, destY+destH-clipY) : 0;
    if (clipH < destH){
		newSprite.x = destX;
		newSprite.y = destY;
		newSprite.scaleX = destW/sprite.w;
		newSprite.scaleY = (destH - clipH)/sprite.h;
		worldContainer.addChild(newSprite);
		
		//details
		var sPercent = destW/sprite.w;
		var leftSmoke = false;
		var rightSmoke = false;
		var extraTop = 0;
		if(sprite.id.substring(0,3) == 'up_'){
			extraTop = 25;	
		}
		
		if (defaultData.playerX < -1.2){
			leftSmoke = rightSmoke = true;
		}else if (defaultData.playerX < -.9){
			leftSmoke = true;
		}else if (defaultData.playerX > 1.2){
			leftSmoke = rightSmoke = true;
		}else if (defaultData.playerX > .9){
			rightSmoke = true;
		}
		
		if(leftSmoke && defaultData.speed > 0){
			var smokeSpriteL = smokeAnimate.clone();
			smokeSpriteL.x = newSprite.x + (0 * sPercent);
			smokeSpriteL.y = newSprite.y + ((90 + extraTop) * sPercent);
			smokeSpriteL.scaleX = newSprite.scaleX;
			smokeSpriteL.scaleY = newSprite.scaleY;
			worldContainer.addChild(smokeSpriteL);
		}
		
		if(rightSmoke && defaultData.speed > 0){
			var smokeSpriteR = smokeAnimate.clone();
			smokeSpriteR.x = newSprite.x + (180 * sPercent);
			smokeSpriteR.y = newSprite.y + ((90 + extraTop) * sPercent);
			smokeSpriteR.scaleX = newSprite.scaleX;
			smokeSpriteR.scaleY = newSprite.scaleY;
			worldContainer.addChild(smokeSpriteR);
		}
		
		if(gameData.nitroMode){
			var fireSprite = fireAnimate.clone();
			fireSprite.x = newSprite.x + (45 * sPercent);
			fireSprite.y = newSprite.y + ((85 + extraTop) * sPercent);
			fireSprite.scaleX = newSprite.scaleX;
			fireSprite.scaleY = newSprite.scaleY;
			worldContainer.addChild(fireSprite);
		}
	}
}

function renderFog(x, y, width, height, fog){
	if (fog < 1) {
		var shape = new createjs.Shape();
		shape.graphics.beginFill(roadData.fog).drawRect(x, y, width, height);
		shape.alpha = (1-fog);
		worldContainer.addChild(shape);
    }
}


/*!
 * 
 * ROAD BUILD MISC - This is the function that runs for road build misc
 * 
 */
function rumbleWidth(projectedRoadWidth, lanes){
	return projectedRoadWidth/Math.max(6,  2*lanes);	
}

function laneMarkerWidth(projectedRoadWidth, lanes){
	return projectedRoadWidth/Math.max(32, 8*lanes);
}


/*!
 * 
 * COLLECT ITEMS - This is the function that runs for collect items
 * 
 */
function startNitro(){
	if(!gameData.nitroMode){
		playSound('soundCollectTurbo');
		gameData.nitroMode = true;
		worldData.accel = nitroData.accel;
		worldData.maxSpeed = nitroData.maxSpeed;
		
		updateGameText(statusData.nitro.text, statusData.nitro.color, statusData.nitro.size, 1);
		TweenMax.to(worldData, 2, {cameraHeight:nitroData.cameraHeight, overwrite:true, onUpdate:updateCamera});
		TweenMax.to(nitroData, nitroData.timer, {overwrite:true, onComplete:stopNitro});
	}
}

function stopNitro(){
	if(gameData.nitroMode){
		gameData.nitroMode = false;
		worldData.accel = defaultData.accel;
		worldData.maxSpeed = defaultData.maxSpeed;
		updateGameText('');
		TweenMax.to(worldData, 2, {cameraHeight:defaultData.cameraHeight, overwrite:true, onUpdate:updateCamera});
	}
}

function updateCamera(){
	defaultData.playerZ = (worldData.cameraHeight * defaultData.cameraDepth);
}

function addScore(){
	playSound('soundCollectCoin');
	playerData.score += scoreData.coin;
	updateGameText(statusData.score.text.replace('[NUMBER]', scoreData.coin), statusData.score.color, statusData.score.size, 1);
}

function addCoin(){
	playSound('soundCollectCoin');
	playerData.coin += coinData.coin;
	updateGameText(statusData.coin.text.replace('[NUMBER]', coinData.coin), statusData.coin.color, statusData.coin.size, 1);
}

function addFuel(){
	playSound('soundCollectFuel');
	gameData.fuel += fuelData.add;	
	gameData.fuel = gameData.fuel > fuelData.total ? fuelData.total : gameData.fuel;
	updateGameText(statusData.fuel.text, statusData.fuel.color, statusData.fuel.size, 1);
}

/*!
 * 
 * GAME STATUS - This is the function that runs for game status
 * 
 */
function updateGameStatus(){
	//score
	scoreTxt.text = scoreShadowTxt.text = scoreData.text.replace('[NUMBER]', addCommas(playerData.score));
	
	//fuel
	var fuelPercent = (gameData.fuel/fuelData.total) * fuelData.bar.width - (fuelData.bar.space*2);
	fuelPercent = fuelPercent < 0 ? 0 : fuelPercent;
	fuelBarFill.graphics.clear();
	fuelBarFill.graphics.beginFill(fuelData.bar.fillColor).drawRect(0, 0, fuelPercent, fuelData.bar.height - (fuelData.bar.space * 4));
	
	if(gameData.fuel < (fuelData.total/100 * 25) && !gameData.penalty){
		updateGameText(statusData.lowFuel.text, statusData.lowFuel.color, statusData.lowFuel.size, 0);
	}
	
	//game over
	if(!gameData.paused && gameData.fuel <= 0){
		updateGameText(statusData.noFuel.text, statusData.noFuel.color, statusData.noFuel.size, 0);	
		endGame();	
	}
}

function updateGameText(text, color, size, delay){
	gameStatusContainer.visible = true;
	
	gameStatusTxt.font = size+"px dimitriregular";
	gameStatusShadowTxt.font = size+"px dimitri_swankregular";
	gameStatusTxt.color = color;
	gameStatusTxt.text = text;
	gameStatusShadowTxt.text = text;
	
	if(delay > 0){
		TweenMax.to(gameStatusContainer, delay, {overwrite:true, onComplete:function(){
			gameStatusContainer.visible = false;
		}});
	}
}

function endGame(){
	if(!gameData.ended){
		gameData.paused = true;
		gameData.ended = true;
		
		keyData.left = keyData.right = keyData.accelerate = keyData.brake = false;
		TweenMax.to(resultContainer, 1, {overwrite:true, onComplete:function(){
			goPage('result');
		}});
	}
}

/*!
 * 
 * OPTIONS - This is the function that runs to mute and fullscreen
 * 
 */
function toggleGameMute(con){
	buttonSoundOff.visible = false;
	buttonSoundOn.visible = false;
	toggleMute(con);
	if(con){
		buttonSoundOn.visible = true;
	}else{
		buttonSoundOff.visible = true;	
	}
}

function toggleFullScreen() {
  if (!document.fullscreenElement &&    // alternative standard method
      !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement ) {  // current working methods
    if (document.documentElement.requestFullscreen) {
      document.documentElement.requestFullscreen();
    } else if (document.documentElement.msRequestFullscreen) {
      document.documentElement.msRequestFullscreen();
    } else if (document.documentElement.mozRequestFullScreen) {
      document.documentElement.mozRequestFullScreen();
    } else if (document.documentElement.webkitRequestFullscreen) {
      document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
    }
  } else {
    if (document.exitFullscreen) {
      document.exitFullscreen();
    } else if (document.msExitFullscreen) {
      document.msExitFullscreen();
    } else if (document.mozCancelFullScreen) {
      document.mozCancelFullScreen();
    } else if (document.webkitExitFullscreen) {
      document.webkitExitFullscreen();
    }
  }
}

/*!
 * 
 * OPTIONS - This is the function that runs to toggle options
 * 
 */

function toggleOption(){
	if(optionsContainer.visible){
		optionsContainer.visible = false;
	}else{
		optionsContainer.visible = true;
	}
}


/*!
 * 
 * SHARE - This is the function that runs to open share url
 * 
 */
function share(action){
	gtag('event','click',{'event_category':'share','event_label':action});
	
	var loc = location.href
	loc = loc.substring(0, loc.lastIndexOf("/") + 1);
	
	var title = '';
	var text = '';
	
	title = shareTitle.replace("[SCORE]", addCommas(playerData.score));
	text = shareMessage.replace("[SCORE]", addCommas(playerData.score));
	var shareurl = '';
	
	if( action == 'twitter' ) {
		shareurl = 'https://twitter.com/intent/tweet?url='+loc+'&text='+text;
	}else if( action == 'facebook' ){
		shareurl = 'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(loc+'share.php?desc='+text+'&title='+title+'&url='+loc+'&thumb='+loc+'share.jpg&width=590&height=300');
	}else if( action == 'google' ){
		shareurl = 'https://plus.google.com/share?url='+loc;
	}else if( action == 'whatsapp' ){
		shareurl = "whatsapp://send?text=" + encodeURIComponent(text) + " - " + encodeURIComponent(loc);
	}
	
	window.open(shareurl);
}
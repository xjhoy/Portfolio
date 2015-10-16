//Objetos importantes de canvas.
var canvas = document.getElementById('game');
var ctx = canvas.getContext('2d');

//Crear el objeto de la nave
var nave = {
	x:100,
	y:canvas.height - 60,
	width: 50,
	height: 50,
	contador: 0
}

var juego = {
	estado: 'iniciando'
};
var textoRespuesta = {
	contador: -1,
	titulo: '',
	subtitulo: ''
}

var teclado = {};
var disparos = [];
var disparosEnemigos = [];
var enemigos =[];

//Definir variables para las imagenes
var fondo, imgNave, imgEnemigo,imgDisparo,imgDisparoEnemigo;

var soundShoot,soundInvaderShoot,soundDeadSpace,soundDeadInvader,soundEndGame;
var imagenes = ['img/monster.png','img/nave.png','img/enemyLaser.png','img/laser.png','img/space.jpg'];

var preloader;
//Definicion de funciones
function loadMedia(){
  preloader = new PreloadJS();
  console.log(preloader);
  preloader.onProgress = progresoCarga;
  cargar();
}

function cargar(){
	while(imagenes.length>0){
		var imagen = imagenes.shift();
		preloader.loadFile(imagen);
	}
}

function progresoCarga(){
	console.log(parseInt(preloader.progress * 100)+"%");
	if(preloader.progress == 1){
		var interval = window.setInterval(frameLoop, 1000/40);
		
		fondo = new Image();
		fondo.src = 'img/space.jpg';
		
		imgNave = new Image();
		imgNave.src = 'img/nave.png';
		
		imgEnemigo = new Image();
		imgEnemigo.src = 'img/monster.png';
		
		imgDisparo = new Image();
		imgDisparo.src = 'img/laser.png';

		imgDisparoEnemigo = new Image();
		imgDisparoEnemigo.src = 'img/enemyLaser.png';

	    soundShoot = document.createElement('audio');
		document.body.appendChild(soundShoot);
		soundShoot.setAttribute('src','music/laserSpace.mp3');
		
		soundInvaderShoot = document.createElement('audio');
		document.body.appendChild(soundInvaderShoot);
		soundInvaderShoot.setAttribute('src','music/laserAlien.mp3');
		
		soundDeadSpace = document.createElement('audio');
		document.body.appendChild(soundDeadSpace);
		soundDeadSpace.setAttribute('src','music/deadspaceShip.mp3');
		
		soundDeadInvader = document.createElement('audio');
		document.body.appendChild(soundDeadInvader);
		soundDeadInvader.setAttribute('src','music/deadInvader.mp3');
		
		soundEndGame = document.createElement('audio');
		document.body.appendChild(soundEndGame);
		soundEndGame.setAttribute('src','music/endGame.mp3');
	}
}

function dibujarEnemigos(){
	for(var i in enemigos){
		var enemigo = enemigos[i];
		ctx.save();
		if(enemigo.estado == 'vivo'){
			ctx.fillStyle = 'blue'}
		if(enemigo.estado == 'muerto'){
			ctx.fillStyle = 'red'}
		ctx.drawImage(imgEnemigo, enemigo.x,enemigo.y,enemigo.width,enemigo.height);		
	}
}

function dibujarFondo(){
	ctx.drawImage(fondo,0,0,canvas.width,canvas.height);
}

function dibujarNave(){
	ctx.save();
	
	ctx.drawImage(imgNave,nave.x,nave.y,nave.width,nave.height);
	ctx.restore();
}

function agregarEventosTeclado(){
	agregarEvento(document,"keydown",function(e){
		//Ponemos en true la tecla presionada
		teclado[e.keyCode] = true;
		//console.log(e.keyCode);
	});
	agregarEvento(document,"keyup",function(e){
		//Ponemos en false la tecla que dejÃ³ de ser presionada
		teclado[e.keyCode] = false;
	});
	function agregarEvento(elemento,nombreEvento,funcion){
		if(elemento.addEventListener){
				elemento.addEventListener(nombreEvento, funcion,false);
		}
		else if(elemento.attachEvent){
				//Internet Explorer
				elemento.attachEvent(nombreEvento,funcion);
		}
	}
}

function moverNave(){
	if(teclado[37]){
		nave.x -= 4;
		if(nave.x < 0) nave.x = 0;
	}
	//movimiento a la derecha
	if(teclado[39]){
		var limite = canvas.width - nave.width;
		nave.x += 4;
		if(nave.x > limite) nave.x = limite;
	}
	if(teclado[32]){
		//Disparos
		if(!teclado.fire){
	   		fire();
			teclado.fire = true;	
		}
		
	}
	else teclado.fire = false;
	if(nave.estado == 'hit'){
		nave.contador++;
		if(nave.contador >= 20){
			nave.contador = 0;
			nave.estado = 'muerto';
			juego.estado = 'perdido';
			textoRespuesta.titulo = 'Game Over';
			textoRespuesta.subtitulo = 'Presiona la tecla R para continuar';
			textoRespuesta.contador = 0;
			

		}
	}
}

function moverDisparosEnemigos(){
	for(var i in disparosEnemigos){
		var disparo = disparosEnemigos[i];
		disparo.y += 3;
	}
	disparosEnemigos = disparosEnemigos.filter(function(disparo){
		return disparo.y < canvas.height;
	});
}

function dibujarDisparosEnemigos() {
	for(var i in disparosEnemigos){
		var disparo = disparosEnemigos[i];
		ctx.save();
		ctx.fillStyle = 'yellow';
		ctx.drawImage(imgDisparoEnemigo,disparo.x, disparo.y, disparo.width, disparo.height);
		ctx.restore();
	}
	
}
function actualizaEnemigos() {
	function agregarDisparosEnemigos(enemigo){
		return{
			x: enemigo.x,
			y: enemigo.y,
			width: 8,
			height: 18,
			contador: 0
		}
	}
	if(juego.estado == 'iniciando'){

		for(var i=0; i<10;i++){
			enemigos.push({
				x: 10 + (i*50),
				y: 10,
				height: 40,
				width: 40,
				estado: 'vivo',
				contador: 0
			});
		}
		juego.estado = 'jugando';
	}
		for(var i in enemigos){
			var enemigo = enemigos[i];
			if(!enemigo) continue;
			if(enemigo && enemigo.estado == 'vivo'){
				enemigo.contador++;
				enemigo.x += Math.sin(enemigo.contador * Math.PI /90)*5;
			
				if(aleatorio(0,enemigos.length * 10) == 4){
					soundInvaderShoot.pause();
					soundInvaderShoot.currentTime = 0;
					soundInvaderShoot.play();
					disparosEnemigos.push(agregarDisparosEnemigos(enemigo));
				}
			}
			if(enemigo && enemigo.estado == 'hit'){
				enemigo.contador++;
				if(enemigo.contador >= 20){
					enemigo.estado = 'muerto';
					enemigo.contador = 0;
				}
				
			}
		}
		enemigos = enemigos.filter(function(enemigo){
			if(enemigo && enemigo.estado != 'muerto') return true;
			return false;
		});
}

function moverDisparos(){
		for(var i in disparos){
			var disparo = disparos[i];
			disparo.y -= 2;
		}
		disparos = disparos.filter(function(disparo){
			return disparo.y > 0;
		});
}

function fire(){
	soundShoot.pause();
	soundShoot.currentTime = 0;
	soundShoot.play();
	disparos.push({
		x: nave.x + 20,
		y: nave.y -10,
		width: 5,
		height: 20
	});
}

function dibujarDisparos(){
	ctx.save();
	ctx.fillStyle = 'white';
	for(var i in disparos){
		var disparo = disparos[i];
		ctx.drawImage(imgDisparo,disparo.x, disparo.y, disparo.width, disparo.height);
	}
	ctx.restore;
}

function dibujaTexto(){
	if(textoRespuesta.contador == -1) return;//Se sale de la function.
	
	var alpha = textoRespuesta.contador/50.0;
	if(alpha>1){
		for(var i in enemigos){
			delete enemigos[i];
		}
	}
	ctx.save();
	ctx.globalAlpha = alpha;
	if(juego.estado == 'perdido'){
		
		ctx.font = 'bold 60pt Bangers';
		ctx.fillStyle = 'red';
		ctx.textAlign = "center";
		ctx.fillText(textoRespuesta.titulo,canvas.width/2,canvas.height/2);
		ctx.strokeStyle = 'yellow';
		ctx.lineWidth = 3;
		ctx.strokeText(textoRespuesta.titulo,canvas.width/2,canvas.height/2);
		
		ctx.fillStyle = 'white';
		ctx.font = '24pt Bangers';
		ctx.textAlign = "center";
		ctx.fillText(textoRespuesta.subtitulo, canvas.width/2, canvas.height/1.6);
	}
	if(juego.estado == 'victoria'){
		ctx.fillStyle = '#28a4c9';
		ctx.textAlign = "center";
		ctx.font = 'bold 45pt Bangers';
		ctx.fillText(textoRespuesta.titulo,canvas.width/2,canvas.height/2);
		ctx.strokeStyle = 'white';
		ctx.lineWidth = 3;
		ctx.strokeText(textoRespuesta.titulo,canvas.width/2,canvas.height/2);
		
		ctx.fillStyle = 'white';
		ctx.font = '24pt Bangers';
		ctx.fillText(textoRespuesta.subtitulo,canvas.width/2,canvas.height/1.6);

	}
	ctx.restore();
}

function actualizarEstadoJuego(){
	
	if(juego.estado == 'jugando' && enemigos.length == 0){
		juego.estado = 'victoria';
		textoRespuesta.titulo = '¡Ganaste!';
		textoRespuesta.subtitulo = 'Presiona la tecla R para reiniciar';
		textoRespuesta.contador = 0;
	}
	if(textoRespuesta.contador >= 0){
		textoRespuesta.contador++;
	}
	if((juego.estado == 'perdido' || juego.estado == 'victoria') && teclado[82]){
		juego.estado = 'iniciando';
		nave.estado = 'vivo';
		textoRespuesta.contador = -1;
	}
}

function hit (a,b) {
	var hit = false;
	if(b.x + b.width >= a.x && b.x < a.x + a.width){
		if(b.y + b.height >= a.y && b.y < a.y + a.height){
			hit = true;
		}

	}
	if(b.x <= a.x && b.x + b.width >= a.x + a.width){
		if(b.y <= a.y && b.y + b.height >= a.y + a.height){
			hit = true;
		}
	}
	if(a.x <= b.x && a.x + a.width >= b.x + b.width){
		if(a.y <= b.y && a.y + a.height >= b.y + b.height){
			hit = true;
		}
	}
	return hit;
}

function verificarContacto(){
	for(var i in disparos){
		var disparo = disparos[i];
		for(j in enemigos){
			var enemigo = enemigos[j];
			if(hit(disparo,enemigo)){
	            soundDeadInvader.pause();
             	soundDeadInvader.currentTime = 0;
							soundDeadInvader.play();
				enemigo.estado = 'hit';
				enemigo.contador = 0;

			}
		}
	}
	if(nave.estado == 'hit' || nave.estado == 'muerto') return;
	for(var i in disparosEnemigos){
		var disparo = disparosEnemigos[i];
		if(hit(disparo,nave)){
				soundDeadSpace.pause();
				soundDeadSpace.currentTime = 0;
				soundDeadSpace.play();
				soundEndGame.pause();
				soundEndGame.currentTime = 0;
				soundEndGame.play();
			nave.estado = 'hit';
			//console.log('contacto');
		}
	}
}

function aleatorio(inferior, superior){
	var posibilidades = superior - inferior;
	var a = Math.random() * posibilidades;
	a = Math.floor(a);
	return parseInt(inferior) + a;
}



function frameLoop(){
	actualizarEstadoJuego();
	moverNave();
	moverDisparos();
	moverDisparosEnemigos();
	dibujarFondo();
	verificarContacto();
	actualizaEnemigos();
	dibujarEnemigos();
	dibujarDisparosEnemigos();
	dibujarDisparos();
	dibujaTexto();
	dibujarNave();
	

}

//EjecuciÃ³n de funciones
window.addEventListener('load', init);
function init(){
	agregarEventosTeclado();
	loadMedia();
}
	


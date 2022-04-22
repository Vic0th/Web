//Made by Furkan Sayan
/////////////////////////////////////////////////////////
////---------------------Settings--------------------////
var ch_h = 240;
var ch_w = 130;

var move_speed = 30;
var Vy = 0;

var dist = 750;
var obs_h = 205;
var obs_w = 110;
var floor_h = 75;

/////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////

var canv = document.getElementById("gwin")
var scr = canv.getContext("2d");

var ch_air = new Image();
var ch_r = new Image();
var ch_sld = new Image();

var bg = new Image();
var obs1 = new Image();
var obs2 = new Image();
var obs3 = new Image();

var rope1 = new Image();
var rope2 = new Image();
var rope3 = new Image();

var flr = new Image();

//var song = new Audio();
//song.src = "sounds/chilly.mp3";
//song.play();

bg.src = "images/bg.png";
obs1.src = "images/obstacle.png";
obs2.src = "images/obstacle.png";
obs3.src = "images/obstacle.png";
flr.src = "images/floor.png";

ch_air.src = "images/char_onAir.png";

ch_r.src = "images/char_run1.png";
ch_sld.src = "images/char_slide.png";

rope1.src = "images/rope.png";
rope2.src = "images/rope.png";
rope3.src = "images/rope.png";

//Position
var px = 150;
var py = 500;

var isJump = false;

function JumpF() {
    isJump = true;
}

function jump() {
    if(isJump && onGround)
        Vy -= 100;

    isJump = false;
}

var onGround = false;
function grounded() {
    if (py + ch_h >= canv.height - floor_h) {
        onGround = true;
        py = canv.height - floor_h - ch_h;
    }
        
    else
        onGround = false;
}

function gravity() {
    //On ground
    if (onGround) {
        Vy = 0;
        py = canv.height - floor_h - ch_h;
    }
    //On air
    else
        Vy += 15;
}

var x = 0;
function animRun() {
    ch_h = 240;
    ch_w = 130;

    py = canv.height - floor_h - ch_h;

    if (x == 16)
        x = 0;

    if (x < 16) {
        if (x / 4 == 0)
            ch_r.src = "images/char_run1.png";
        else if (x / 4 == 1)
            ch_r.src = "images/char_run2.png";
        else if (x / 4 == 2)
            ch_r.src = "images/char_run3.png";
        else if (x / 4 == 3)
            ch_r.src = "images/char_run4.png";
        x++;
    }
    scr.drawImage(ch_r, px, py, ch_w, ch_h);
}

function y_rand() {
    return Math.floor((Math.random() * (canv.height - floor_h - 40 - 70)) + 70);
}

var ob_x = [(canv.width), (canv.width + dist), (canv.width + 2 * dist)];
var ob_y = [(y_rand() ), (y_rand() ), (y_rand() )];

var v;
var score = 0;
var rope_len = 740;

function obs_move() {
    if (ob_x[0] < 0) {
        ob_x.shift();
        ob_y.shift();
        v = ob_x.push( ob_x[1] + dist );
        v = ob_y.push(y_rand());
        score++;
    }
    ob_x[0] = ob_x[0] - move_speed;
    ob_x[1] = ob_x[1] - move_speed;
    ob_x[2] = ob_x[2] - move_speed;

    scr.drawImage(obs1, ob_x[0], ob_y[0], obs_w, obs_h);
    scr.drawImage(obs2, ob_x[1], ob_y[1], obs_w, obs_h);
    scr.drawImage(obs3, ob_x[2], ob_y[2], obs_w, obs_h);

    if (ob_y[0] + obs_h < canv.height - floor_h)
        scr.drawImage(rope1, ob_x[0] + (obs_w / 2) - 5, ob_y[0] - rope_len, 15, rope_len);
    if (ob_y[1] + obs_h < canv.height - floor_h)
        scr.drawImage(rope2, ob_x[1] + (obs_w / 2) - 5, ob_y[1] - rope_len, 15, rope_len);
    if (ob_y[2] + obs_h < canv.height - floor_h)
    scr.drawImage(rope3, ob_x[2] + (obs_w / 2) - 5, ob_y[2] - rope_len, 15, rope_len);
}

var isGamin = true;
var lx;

function hitReg(){
    for (lx = 0; lx < 3; lx++) {
        if ((px >= ob_x[lx] && px <= ob_x[lx] + obs_w) || (px + ch_w >= ob_x[lx] && px + ch_w <= ob_x[lx] + obs_w)) {
            if ((py + ch_h >= ob_y[lx] && py + ch_h <= ob_y[lx] + obs_h) || (py <= ob_y[lx] + obs_h && py >= ob_y[lx])) {
                gameReload();
            }
        }
            
    }
}

document.addEventListener("keydown", act_control);


function act_control(e) {
    var key = e.code;

    if (key == "Space" || key == "KeyW" || key == "ArrowUp")
        JumpF();
    else if (key == "ControlLeft" || key == "KeyS" || key == "ArrowDown")
        Slider();
}

var slidin = false;

function Slider() {
    slidin = true;
}

var slideLen = 22;
var sTime = 1;
function slide() {
    if (sTime < slideLen) {
        ch_w = 238;
        ch_h = 93;
        py = canv.height - floor_h - ch_h + 10;
        scr.drawImage(ch_sld, px, py, ch_w, ch_h);
        sTime++;
    }
    else {
        slidin = false;
        sTime = 1;
        animRun();
    }
}

var maxScore = 0;
var level;
function scoring() {
    document.getElementById("score").innerHTML = `<h3>Score: ` + score + `</h3>`;
    maxScore = (score > maxScore) ? score : maxScore;
    document.getElementById("maxScore").innerHTML = `<h3>Max Score: ` + maxScore + `</h3>`;

    if (score < 20) {
        move_speed = 30;
        dist = 750;
    }
    level = 1;
    while (1) {
        if (score < (level * 10)) {
            move_speed = 30 + level * 2 - 2;
            dist = 750 - (level * 2) + 2;
            slideLen = 22 - level + 1;

            if (dist < 700)
                dist = 700;
            break;
        }
        level++;
    }

}

function gameReload() {
    ch_h = 240;
    ch_w = 130;

    move_speed = 30;
    Vy = 0;

    dist = 750;

    score = 0;

    px = 150;
    py = 500;

    slideLen = 22;

    slidin = false;

    ob_x = [(canv.width), (canv.width + dist), (canv.width + 2 * dist)];
    ob_y = [(y_rand()), (y_rand()), (y_rand())];
}

function draw() {

    scr.drawImage(bg, 0, 0, canv.width, canv.height);
    scr.drawImage(flr, 0, canv.height - floor_h);

    obs_move();
    gravity();
    grounded();
    jump();
    py += Vy;
    grounded();


    if (onGround) {
        if (slidin)
            slide();
        else
            animRun();
    }
    else {
        slidin = false;
        ch_h = 172;
        ch_w = 130;
        scr.drawImage(ch_air, px, py, ch_w, ch_h);
    }

    scoring();

    hitReg();

    setTimeout(function () {
        requestAnimationFrame(draw);
    }, 1000 / 30);
}
canv.setAttribute("width", "0");
canv.setAttribute("height", "0");
var vdiv = document.getElementById("div_info")
var gameBut = document.getElementById("playBut");

function gamePlay() {
    vdiv.style.display = "none";
    canv.setAttribute("width", "1280");
    canv.setAttribute("height", "720");
    console.log("it worked");
    document.getElementById('songID').play();
    document.getElementById('songID').volume = 0.07;
    draw();
}
gameBut.addEventListener("click", gamePlay);

//
//If you really have read this far , I respect that.
//Hope you enjoyed the game. It took a while for me to make.
//

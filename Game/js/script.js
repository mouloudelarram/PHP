let svg = document.querySelector("svg");
let speed = document.querySelector("#speed");
let section = document.querySelector("section")
let aside = document.querySelector("aside");
let logout = document.querySelector(".logout");
let start = document.querySelector(".start");
let stop = document.querySelector(".stop");
let save = document.querySelector(".save");
let select = document.querySelector("select");
let audio = document.querySelector("audio");

let interval = null;
let users = new Array();
let currentUser = null;
let speedValue = 1;
let started = false;
let stoped = true;
let total = 0;


function main(){
    GetCurrentUser();

    speed.addEventListener("change",()=>{
        document.querySelector(".speedValue").innerHTML = `speed:${speed.value}`;
        speedValue = speed.value;
        if (started == true)
            move(speedValue);
    });
    logout.addEventListener("click", logOut );

    start.addEventListener("click",()=>{
        move(speedValue);
        started = true;
        stoped = false;
    });
    stop.addEventListener("click",()=>{
        clearInterval(interval);
        stoped = true;
        started = false;
    });
    save.addEventListener("click",()=>{
        saveScore();
    })
    svg.addEventListener("click", ()=>{
        if (started == true)
            change();
    });
    select.addEventListener("change",()=>{
        svg.setAttribute("width",select.value);
    })
}
main();

function move(speed){
    clearInterval(interval);
    interval = setInterval(() => {
        changePosition();
    }, 5000/speed);
}

function changePosition(){
    svg.style.marginTop=(Math.random())*(section.clientHeight-200)+"px";
    svg.style.marginLeft=(Math.random())*(section.clientWidth-200)+"px";
}

function GetUsers(){
    let rqst = new XMLHttpRequest();
    rqst.open('POST','tools.php');
    rqst.onload = function(){
        if (rqst.status == 200 && rqst.readyState == 4){
            users = JSON.parse(rqst.response);
            showUsers();
        }
    }
    rqst.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    rqst.send('users');
};

function GetCurrentUser(){
    let rqst = new XMLHttpRequest();
    rqst.open('POST','tools.php');
    rqst.onload = function(){
        if (rqst.status == 200 && rqst.readyState == 4){
            currentUser = JSON.parse(rqst.response);
            document.querySelector(".username").innerHTML = currentUser.username;
            document.querySelector(".score").innerHTML = `score : ${currentUser.score} pt`;
            GetUsers();
        }
    }
    rqst.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    rqst.send('currentuser');
};

function showUsers(){
    aside.innerHTML = '';
    users.forEach(element => {
        let style = "item";
        if (element.username == currentUser.username)
            style = "Currentitem";
        aside.innerHTML += `
            <div class="${style}">
                <h5 class="name">${element.username}</h5>
                <h5 class="score">${element.score}</h5>
            </div>
        `
    });
}

function logOut(){
    location.replace("./index.php?logout");
}

function change(){
    audio.play();
    changePosition();
    total += parseInt(speedValue);
    document.querySelector(".point > h5").innerHTML = `total points : ${total}`;
}

function saveScore(){
    let rqst = new XMLHttpRequest();
    rqst.open('POST','./index.php');
    rqst.onload = function(){
        if (rqst.status == 200 && rqst.readyState == 4){
            total = 0;
            document.querySelector(".point > h5").innerHTML = `total points : ${total}`;
            GetCurrentUser();
        }
    } 
    rqst.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    rqst.send(`score=${total}`);
}

setInterval(GetUsers,5000);
star1=document.getElementById('1');
star2=document.getElementById('2');
star3=document.getElementById('3');
star4=document.getElementById('4');
star5=document.getElementById('5');
const rateUser=document.querySelector(".rate_user")
const id=rateUser.parentElement.getAttribute("class");
const rateInfo=document.querySelector(".rate_info")


star1.addEventListener("mouseover", function( event){
    event.target.innerText="grade";
});
star1.addEventListener("mouseleave",function (event){
   event.target.innerText="star_border";
});
star2.addEventListener("mouseover", function( event){
    star1.innerText="grade";
    event.target.innerText="grade";
});
star2.addEventListener("mouseleave",function (event){
    star1.innerText="star_border";
    event.target.innerText="star_border";
});

star3.addEventListener("mouseover", function( event){
    star1.innerText="grade";
    star2.innerText="grade";
    event.target.innerText="grade";
});
star3.addEventListener("mouseleave",function (event){
    star1.innerText="star_border";
    star2.innerText="star_border";
    event.target.innerText="star_border";
});

star4.addEventListener("mouseover", function( event){
    star1.innerText="grade";
    star2.innerText="grade";
    star3.innerText="grade";
    event.target.innerText="grade";
});
star4.addEventListener("mouseleave",function (event){
    star1.innerText="star_border";
    star2.innerText="star_border";
    star3.innerText="star_border";
    event.target.innerText="star_border";
});

star5.addEventListener("mouseover", function( event){
    star1.innerText="grade";
    star2.innerText="grade";
    star3.innerText="grade";
    star4.innerText="grade";
    event.target.innerText="grade";
});
star5.addEventListener("mouseleave",function (event){
    star1.innerText="star_border";
    star2.innerText="star_border";
    star3.innerText="star_border";
    star4.innerText="star_border";
    event.target.innerText="star_border";
});

function giveRate(event){
    stars=event.target.id;
    const data={rate:stars,
                bookstoreid:id
    };
    console.log(data);
    fetch("/rate", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }).then(function (response) {
        return response.json();
    }).then(function (newRate) {
        loadNewRate(newRate)
    });
};

function loadNewRate(newRate){
    rateInfo.innerHTML="";
    for(i=0;i<5;i++){
        newI=document.createElement("i");
        newI.className="material-icons";
        newI.style.display="inline";
        if(i<Math.round(newRate.rate)){
            newI.innerText="star_rate";
        }
        else{
            newI.innerText="star_border";
        };
        rateInfo.appendChild(newI);
    }
}

star1.addEventListener("click",giveRate);
star2.addEventListener("click",giveRate);
star3.addEventListener("click",giveRate);
star4.addEventListener("click",giveRate);
star5.addEventListener("click",giveRate);
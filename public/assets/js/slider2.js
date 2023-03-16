window.addEventListener('load',()=>{
document.querySelectorAll(".hotel-gallery>ul>li>img").forEach((el) => {
        el.onclick = () => {
            let src = el.src;
            document.querySelector(".card-item-img>img").src = src;
        };
    });

});

const filterBox = document.querySelectorAll('.nav-row__list__items')
console.log(filterBox);
document.querySelector('nav').addEventListener('click', event => {
    if(event.target.tagName !== "LI") return false;

    let filterClass = event.target.dataset['f'];
    filterBox.forEach(elem => {
        elem.classList.remove('hide')
        if(!elem.classList.contains(filterClass)){
            elem.classList.add('hide');
        }
    })
})
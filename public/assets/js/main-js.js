const filterBox = document.querySelectorAll('.nav-row__list__items')

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

function openBlockMenu(id){
    display = document.getElementById(id).style.display;

    if(display=='block'){
        document.getElementById(id).style.display='none';
        const newcard = document.querySelector('.mob-menu-div img');
        newcard.setAttribute('src', 'assets/img/menu.svg');
    }else{
        document.getElementById(id).style.display='block';
        const newcard = document.querySelector('.mob-menu-div img');
        newcard.setAttribute('src', 'assets/img/close.svg');
    }
}

function openBlockSort(id){
    display = document.getElementById(id).style.display;

    if(display=='block'){
        document.getElementById(id).style.display='none';
        const newcard = document.querySelector('.sort img');
        // newcard.setAttribute('src', 'assets/img/sort.svg');
        newcard.setAttribute('src', 'assets/img/sort.svg');
    }else{
        document.getElementById(id).style.display='block';
        const newcard = document.querySelector('.sort img');
        // newcard.setAttribute('src', 'assets/img/close.svg');
        newcard.setAttribute('src', 'assets/img/close.svg');
    }
}

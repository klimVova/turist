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



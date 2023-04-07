const filterBox = document.querySelectorAll('.box')

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

const liItem = document.querySelectorAll('ul li')

liItem.forEach(li => {
    li.onclick = function(){
        liItem.forEach(li => {
            li.className= '';
        })
        li.className = 'active'
    }
})

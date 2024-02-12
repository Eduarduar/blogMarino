let liImg = document.querySelectorAll('.carousel-inner div')
let liIndicator = document.querySelectorAll('.carousel-indicators li')

console.log(liImg)

$('#next').on('click', ()=> {
    let active = 0
    let next = 0
    for (i = 0; i <= liImg.length-1; i++){
        if (liImg[i].classList.contains('active')){
            active = i
        }
    }
    
    if (active != liImg.length-1){
        next = active+1
    }
    
    liImg[active].classList.add('left')
    liImg[next].classList.add('left')
    liImg[next].classList.add('next')
    
    liIndicator[active].classList.remove('active')
    liIndicator[next].classList.add('active')

    setTimeout(() => {
        liImg[active].classList.remove('active')
        liImg[active].classList.remove('left')
        liImg[next].classList.remove('left')
        liImg[next].classList.remove('next')
        liImg[next].classList.add('active')
    }, 500)
})

$('#prev').on('click', ()=> {
    let active = 0
    let prev = liImg.length-1
    for (i = 0; i <= liImg.length-1; i++){
        if (liImg[i].classList.contains('active')){
            active = i
        }
    }
    
    if (active != 0){
        prev = active-1
    }
    liImg[active].classList.add('right')
    liImg[prev].classList.add('right')
    liImg[prev].classList.add('prev')
    
    liIndicator[active].classList.remove('active')
    liIndicator[prev].classList.add('active')

    setTimeout(() =>{
        liImg[active].classList.remove('active')
        liImg[active].classList.remove('right')
        liImg[prev].classList.remove('right')
        liImg[prev].classList.remove('prev')
        liImg[prev].classList.add('active')
    },500)
})

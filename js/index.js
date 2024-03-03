$(document).ready(function() {
    $('#next').on('click', ()=> {
        let active = $('.carousel-inner div.active')
        let next = active.next('.carousel-inner div')
        
        if (next.length === 0) {
            next = $('.carousel-inner div').first()
        }
        
        active.addClass('left')
        next.addClass('left')
        next.addClass('next')
        
        $('.carousel-indicators li').eq(active.index()).removeClass('active')
        $('.carousel-indicators li').eq(next.index()).addClass('active')

        setTimeout(() => {
            active.removeClass('active')
            active.removeClass('left')
            next.removeClass('left')
            next.removeClass('next')
            next.addClass('active')
        }, 500)
    })

    $('#prev').on('click', ()=> {
        let active = $('.carousel-inner div.active')
        let prev = active.prev('.carousel-inner div')
        
        if (prev.length === 0) {
            prev = $('.carousel-inner div').last()
        }
        
        active.addClass('right')
        prev.addClass('right')
        prev.addClass('prev')
        
        $('.carousel-indicators li').eq(active.index()).removeClass('active')
        $('.carousel-indicators li').eq(prev.index()).addClass('active')

        setTimeout(() =>{
            active.removeClass('active')
            active.removeClass('right')
            prev.removeClass('right')
            prev.removeClass('prev')
            prev.addClass('active')
        },500)
    })
})
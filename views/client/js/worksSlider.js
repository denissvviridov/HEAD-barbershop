export function worksSlider() {
    let allImgWrap = document.querySelectorAll('.img_wrap')

    allImgWrap.forEach(function (elem) {
        elem.addEventListener('click', function () {
            let dataAtr = elem.getAttribute('data-id')

            if (dataAtr > 3) {

                allImgWrap.forEach(function (item) {
                    item.dataset.id--
                })

            }
            if (dataAtr < 3) {
                allImgWrap.forEach(function (item) {
                    item.dataset.id++
                })
            }




        })


    })


}
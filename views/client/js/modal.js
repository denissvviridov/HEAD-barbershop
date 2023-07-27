export function modal() {
    let btnFirst = document.querySelector('.btn__second')
    let overlay = document.querySelector('.overlay')
    let modalForm  = document.querySelector('.modal_form')
    let close  = document.querySelector('.close')
    let btnCallback  = document.querySelector('#btn_callback')



    btnFirst.addEventListener('click', function () {
        document.body.style.overflow='hidden'
        overlay.style.display = 'flex'
        modalForm.style.display = 'flex'
    })

    close.addEventListener('click', function () {
        document.body.style.overflow='unset'
        overlay.style.display = 'none'
        modalForm.style.display = 'none'
    })
    

    /*btnCallback.addEventListener('click', function () {
        document.body.style.overflow = 'unset'
        overlay.style.display = 'none'
        modalForm.style.display = 'none'
    })*/
}
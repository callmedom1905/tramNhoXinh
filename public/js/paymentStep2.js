// payment step 2 page
let btnCOD = document.getElementById('cod')
let btnBank = document.getElementById('bank')

btnCOD.addEventListener('click',function(){
    btnCOD.style.backgroundColor = '#8d6e6e'
    btnCOD.style.color = '#fff'
    btnBank.style.backgroundColor = 'white'
    btnBank.style.color = '#000'
})

btnBank.addEventListener('click',function(){
    btnBank.style.backgroundColor = '#8d6e6e'
    btnBank.style.color = '#fff'
    btnCOD.style.backgroundColor = 'white'
    btnCOD.style.color = '#000'
})
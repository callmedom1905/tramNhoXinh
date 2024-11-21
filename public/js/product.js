// JS thích sản phẩm Trạm Nhỏ Xinh 
const heartButton = document.querySelectorAll('.heart-button');
heartButton.forEach(button => {
    button.addEventListener('click', () => {
        button.classList.toggle('active');
    });
});
// END JS thích sản phẩm Trạm Nhỏ Xinh 


//tăng giảm số lượng sản phẩm
let amount = document.getElementById('amount').value;

function showData(){
    document.getElementById('amount').value = amount;
}
function minus(){
    if(amount > 1 ){
        amount--;
        showData();
    }else{
        alert('Không thể giảm số lượng được nữa');
    }
}

function plus(){
    amount++;
    showData();
}
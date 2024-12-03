
// tăng giảm
document.addEventListener('DOMContentLoaded', function() {
    const tang = document.querySelector('.plus');
    const giam = document.querySelector('.minus');
    const soHienThi = document.getElementById('amount');
    const hiddenQuantity = document.getElementById('hidden_quantity');

    // Tăng số lượng
    tang.addEventListener('click', function() {
        let currentQuantity = parseInt(soHienThi.value);
        currentQuantity++;
        soHienThi.value = currentQuantity; 
        hiddenQuantity.value = currentQuantity; 
    });

    // Giảm số lượng
    giam.addEventListener('click', function() {
        let currentQuantity = parseInt(soHienThi.value);
        if (currentQuantity > 1) { 
            currentQuantity--;
            soHienThi.value = currentQuantity; 
            hiddenQuantity.value = currentQuantity; 
        }
    });
});


// thêm js thứ 2 ở đây 
document.querySelectorAll('.giam').forEach(nut => {
    nut.addEventListener('click', () => {
        const cartBoxMain = nut.closest('.cart-box-main');
        const so = cartBoxMain.querySelector('.so');
        let currentQuantity = parseInt(so.textContent); 

        if (currentQuantity > 1) {
            so.textContent = currentQuantity - 1; 
            updateCart('giam', nut.dataset.id); 
            hamCapNhat(); 
        }
    });
});
document.querySelectorAll('.tang').forEach(nut => {
    nut.addEventListener('click', () => {
        const cartBoxMain = nut.closest('.cart-box-main');
        const so = cartBoxMain.querySelector('.so');
        let currentQuantity = parseInt(so.textContent); 
        so.textContent = currentQuantity + 1; 
        updateCart('tang', nut.dataset.id); 
        hamCapNhat(); 
    });
});


function updateCart(action, proId) {
    fetch('index.php?page=updateCart', {
        method: 'POST',
        body: JSON.stringify({
            action: action,
            proId: proId,
        }),
        headers: {
            'Content-Type': 'application/json',
        },
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
    })
    .catch(error => console.error('Error:', error));
}
function hamCapNhat() {
    let totalPro = 0;
    let totalPrice = 0;
    document.querySelectorAll('.cart-box-main').forEach(cartBox => {
        const quantity = parseInt(cartBox.querySelector('.so').textContent); 
        const price = parseInt(cartBox.querySelector('.price').textContent.replace(/\./g, '')); // Lấy giá trị và loại bỏ dấu chấm
        console.log(quantity, price);
        
        totalPro += quantity; 
        totalPrice += price * quantity; 
    });
    console.log(totalPro,totalPrice);
    const capNhatTongPro = document.querySelector('.totalProduct');
    console.log(capNhatTongPro);
    
    if (capNhatTongPro) {
        capNhatTongPro.textContent = totalPro;
    }

    const capNhatTongTien = document.querySelector('.totalPrice');
    console.log(capNhatTongTien);
    
    if (capNhatTongTien) {
        capNhatTongTien.textContent = totalPrice
    }
}

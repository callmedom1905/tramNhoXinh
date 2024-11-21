// JS Đăng nhập Trạm Nhỏ Xinh 
document.querySelector(".show-password").addEventListener("click", function () {
    const passwordField = document.getElementById("password");
    const icon = this.querySelector("i");
    if (passwordField.type === "password") {
        passwordField.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        passwordField.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
});
//   hiện box đănh nhập 
let clickDangNhap = document.querySelector('.nav_drop-down .dangnhap')
clickDangNhap.addEventListener('click', function () {
    let boxLogin = document.querySelector('.main-box-login')
    boxLogin.style.display = "block"

    const overlay = document.getElementById("overlay");
    overlay.addEventListener('click', function () {
        boxLogin.style.display = "none"
    })
    const closeButton = document.getElementById("closeButton");
    closeButton.addEventListener('click', function () {
        boxLogin.style.display = "none"
    })
})

// đổi đăng nhập thành đăng ký
let clickDangkyOFdangnhap = document.querySelector('.box-login .join-register')
clickDangkyOFdangnhap.addEventListener('click', function(){
    const anLogin = document.querySelector('.main-box-login')
    anLogin.style.display = "none"
    const hienRegister = document.querySelector('.main-box-register')
    hienRegister.style.display = "block"   
})
//END JS Đăng nhập Trạm Nhỏ Xinh 



// JS Đăng ký Trạm Nhỏ Xinh 
document.querySelectorAll(".re-show-password").forEach((button) => {
    button.addEventListener("click", function () {
        const passwordField = button.previousElementSibling;
        const icon = button.querySelector("i");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            passwordField.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    });
});
// hiện box đăng ký
let clickDangKy = document.querySelector('.nav_drop-down .dangky')
clickDangKy.addEventListener('click', function () {
    let boxRerister = document.querySelector('.main-box-register')
    boxRerister.style.display = "block"

    const reOverlay = document.getElementById("re-overlay");
    reOverlay.addEventListener('click', function () {
        boxRerister.style.display = "none"
    })
    const reCloseButton = document.getElementById("re-closeButton");
    reCloseButton.addEventListener('click', function () {
        boxRerister.style.display = "none"
    })

})
//đổi đăng ký thành đăng nhập
let clickDangnhapOFdangky = document.querySelector('.box-register .join-login')
clickDangnhapOFdangky.addEventListener('click', function(){
    const anRegister = document.querySelector('.main-box-register')
    anRegister.style.display = "none"
    const hienLogin = document.querySelector('.main-box-login');
    hienLogin.style.display = "block"
    
    
})
// END JS Đăng ký Trạm Nhỏ Xinh 





// JS Giỏ hàng Trạm Nhỏ Xinh 
const cartTang = document.querySelectorAll('.giam');
const cartGiam = document.querySelectorAll('.tăng');
const cartSo = document.querySelectorAll('.so');
const giaProduct = document.querySelectorAll('.cart-Price .price');
const tenSanPham = document.querySelector('.productName'); 
const totalPriceElement = document.querySelector('.totalPrice'); 
const totalProductElement = document.querySelector('.totalProduct'); 

let tongSanPham = 0;
let tongTien = 0;
totalPriceElement.textContent = tongTien
totalProductElement.textContent = tongSanPham
function capNhatsoAndtongTien(buttonType, index) {
    const quantityElement = cartSo[index];
    let quantity = parseInt(quantityElement.textContent);

    if (buttonType === 'minus') {
        if (quantity > 1) quantity--; 
    } else if (buttonType === 'plus') {
        quantity++;
    }
    quantityElement.textContent = quantity;
    const price = parseInt(giaProduct[index].textContent.replace('.', '').replace('Đ', ''));
    const totalPriceProduct = quantity * price;
    tongSanPham = 0;
    tongTien = 0;
    cartSo.forEach((item, i) => {
        const soLuong = parseInt(item.textContent);
        const gia = parseInt(giaProduct[i].textContent.replace('.', '').replace('Đ', ''));
        tongSanPham += soLuong;
        tongTien += soLuong * gia;
    });
    totalProductElement.textContent = tongSanPham;
    totalPriceElement.textContent = tongTien.toLocaleString('vi-VN') + "Đ";
    if (tongSanPham === 0) {
        tenSanPham.textContent = "Không có sản phẩm";
        totalProductElement.textContent = "0";
        totalPriceElement.textContent = "0Đ";
    } 
    // else {
    //     tenSanPham.textContent = "Tên sản phẩm";
    // }
}
cartTang.forEach((button, index) => {
    button.addEventListener('click', () => capNhatsoAndtongTien('minus', index));
});
cartGiam.forEach((button, index) => {
    button.addEventListener('click', () => capNhatsoAndtongTien('plus', index));
});

// END JS Giỏ hàng Trạm Nhỏ Xinh 
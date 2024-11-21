
// JS thích sản phẩm Trạm Nhỏ Xinh 
const heartButton = document.querySelectorAll('.heart-button');
heartButton.forEach(button => {
    button.addEventListener('click', () => {
        button.classList.toggle('active');
    });
});
// END JS thích sản phẩm Trạm Nhỏ Xinh 



// JS Slide banner sản phẩm Trạm Nhỏ Xinh 
const containerSlider = document.querySelector('.slider-container');
const slideItems = document.querySelectorAll('.slide');
const containerDots = document.querySelector('.dots-container');
const tongSoSlide = slideItems.length;
let viTriHienTai = 0;
for (let i = 0; i < tongSoSlide; i++) {
    const dot = document.createElement('div');
    dot.classList.add('dot');
    if (i === 0) dot.classList.add('active');
    dot.addEventListener('click', () => diChuyenDenSlide(i));
    containerDots.appendChild(dot);
}
const capNhatSlider = () => {
    containerSlider.style.transform = `translateX(-${viTriHienTai * 100}%)`;
    document.querySelectorAll('.dot').forEach((dot, index) => {
        dot.classList.toggle('active', index === viTriHienTai);
    });
};
const diChuyenDenSlide = (index) => {
    viTriHienTai = index;
    capNhatSlider();
};
const chuyenSlideTuDong = () => {
    viTriHienTai = (viTriHienTai + 1) % tongSoSlide;
    capNhatSlider();
};
let slideInterval = setInterval(chuyenSlideTuDong, 3000);
document.querySelector('.banner-home').addEventListener('mouseenter', () => clearInterval(slideInterval));
document.querySelector('.banner-home').addEventListener('mouseleave', () => {
    slideInterval = setInterval(chuyenSlideTuDong, 3000);
});
containerSlider.addEventListener('click', (e) => {
    const doRongContainer = containerSlider.offsetWidth;
    const viTriClick = e.clientX;
    if (viTriClick < doRongContainer / 2) {
        viTriHienTai = (viTriHienTai - 1 + tongSoSlide) % tongSoSlide; 
    } else {
        viTriHienTai = (viTriHienTai + 1) % tongSoSlide; 
    }
    capNhatSlider();
});

// END JS Slide banner sản phẩm Trạm Nhỏ Xinh 










// JS Sản phẩm nổi bật Trạm Nhỏ Xinh 
const nutTrai = document.querySelector('.prev-btn');
const nutPhai = document.querySelector('.next-btn');
const khungSanPham = document.querySelector('.box-hot-product .products-container');
let viTriCuon = 0;
const chieuRongSanPham = 280;
const maxCuon = khungSanPham.scrollWidth - khungSanPham.clientWidth;
let lastScrollTime = 0;
let scrollTimeout;

nutTrai.addEventListener('click', () => {
    viTriCuon -= chieuRongSanPham * 2;
    if (viTriCuon < 0) viTriCuon = 0;
    khungSanPham.scrollTo({
        left: viTriCuon,
        behavior: 'smooth'
    });
});

nutPhai.addEventListener('click', () => {
    viTriCuon += chieuRongSanPham * 2;
    if (viTriCuon > maxCuon) viTriCuon = maxCuon;
    khungSanPham.scrollTo({
        left: viTriCuon,
        behavior: 'smooth'
    });
});

khungSanPham.addEventListener('scroll', () => {
    viTriCuon = khungSanPham.scrollLeft;
});

khungSanPham.addEventListener('wheel', (e) => {
    e.preventDefault();


    const speedX = e.deltaX;
    const speedY = e.deltaY;


    const scrollAmountX = speedX * 40; 
    const scrollAmountY = speedY * 40; 
    // console.log(scrollAmountY);
    
  
    if (Math.abs(scrollAmountX) > 5000 || Math.abs(scrollAmountY) > 5000) {
        return;
    }
    const currentTime = Date.now();
    if (currentTime - lastScrollTime > 20) {
        if (Math.abs(scrollAmountX) > Math.abs(scrollAmountY)) {
            khungSanPham.scrollLeft += scrollAmountX;
        } 
        else {
            khungSanPham.scrollTop += scrollAmountY;
        }

        lastScrollTime = currentTime;
    }
});
// END JS Sản phẩm nổi bật Trạm Nhỏ Xinh 









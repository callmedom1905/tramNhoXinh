const inputSearch = document.querySelector('.main-category .right-main-header .inputSearch');
const enter = document.querySelector('.main-category .right-main-header .submitSearch');

enter.addEventListener('click', () => {
    const inputValue = inputSearch.value.trim(); // Lấy giá trị tìm kiếm và loại bỏ khoảng trắng
    if (!inputValue) {
        alert('Vui lòng nhập từ khóa tìm kiếm!');
        return;
    }

    // Thay vì fetch(), chuyển hướng đến trang tìm kiếm
    window.location.href = `index.php?page=adminSearchPost&search=${encodeURIComponent(inputValue)}`;
});

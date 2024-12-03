 // Lấy các trường input và các phần tử lỗi
 const emailField = document.getElementById('re-email');
 const passwordField = document.getElementById('re-password');
 const repasswordField = document.getElementById('re-Repassword');
 const nameField = document.getElementById('re-name');
 const phoneField = document.getElementById('re-phone');
 
 const emailError = document.getElementById('email-error');
 const passwordError = document.getElementById('password-error');
 const repasswordError = document.getElementById('repassword-error');
 const nameError = document.getElementById('name-error');
 const phoneError = document.getElementById('phone-error');

 // Kiểm tra email hợp lệ
 emailField.addEventListener('input', function() {
     const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
     if (!emailPattern.test(emailField.value)) {
         emailError.textContent = "Email không hợp lệ. Vui lòng nhập đúng định dạng (example@mail.com).";
         emailError.style.display = 'block';
     } else {
         emailError.style.display = 'none';
     }
 });

 // Kiểm tra mật khẩu đủ 6 ký tự
 passwordField.addEventListener('input', function() {
     if (passwordField.value.length < 6) {
         passwordError.textContent = "Mật khẩu phải có ít nhất 6 ký tự.";
         passwordError.style.display = 'block';
     } else {
         passwordError.style.display = 'none';
     }
 });

 // Kiểm tra xác nhận mật khẩu
 repasswordField.addEventListener('input', function() {
     if (repasswordField.value !== passwordField.value) {
         repasswordError.textContent = "Mật khẩu xác nhận không trùng khớp.";
         repasswordError.style.display = 'block';
     } else {
         repasswordError.style.display = 'none';
     }
 });

 // Kiểm tra tên không chứa ký tự đặc biệt
 nameField.addEventListener('input', function() {
     const namePattern = /^[a-zA-ZÀ-Ýà-ý ]+$/;
     if (!namePattern.test(nameField.value)) {
         nameError.textContent = "Tên không được chứa ký tự đặc biệt.";
         nameError.style.display = 'block';
     } else {
         nameError.style.display = 'none';
     }
 });

 // Kiểm tra số điện thoại có đúng 10 chữ số
 phoneField.addEventListener('input', function() {
     const phonePattern = /^[0-9]{10}$/;
     if (!phonePattern.test(phoneField.value)) {
         phoneError.textContent = "Số điện thoại phải có 10 chữ số.";
         phoneError.style.display = 'block';
     } else {
         phoneError.style.display = 'none';
     }
 });

 // Lắng nghe sự kiện submit để kiểm tra tất cả trước khi gửi
 document.getElementById('registerForm').addEventListener('submit', function(event) {
     let valid = true;

     // Kiểm tra email
     if (!emailPattern.test(emailField.value)) {
         emailError.textContent = "Email không hợp lệ.";
         emailError.style.display = 'block';
         valid = false;
     }

     // Kiểm tra mật khẩu
     if (passwordField.value.length < 6) {
         passwordError.textContent = "Mật khẩu phải có ít nhất 6 ký tự.";
         passwordError.style.display = 'block';
         valid = false;
     }

     // Kiểm tra mật khẩu xác nhận
     if (repasswordField.value !== passwordField.value) {
         repasswordError.textContent = "Mật khẩu xác nhận không trùng khớp.";
         repasswordError.style.display = 'block';
         valid = false;
     }

     // Kiểm tra tên
     if (!namePattern.test(nameField.value)) {
         nameError.textContent = "Tên không được chứa ký tự đặc biệt.";
         nameError.style.display = 'block';
         valid = false;
     }

     // Kiểm tra số điện thoại
     if (!phonePattern.test(phoneField.value)) {
         phoneError.textContent = "Số điện thoại phải có 10 chữ số.";
         phoneError.style.display = 'block';
         valid = false;
     }

     // Nếu có lỗi, ngừng gửi form
     if (!valid) {
         event.preventDefault();
     }
 });
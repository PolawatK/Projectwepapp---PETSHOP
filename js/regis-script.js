
    const passwordInput = document.getElementById('cus_password');
    const confirmPasswordInput = document.getElementById('confirm_password');
    const messageSpan = document.getElementById('password_match_message');
    const submitButton = document.getElementById('sub-btn');

    function checkPasswordMatch() {
      const password = passwordInput.value.trim();
      const confirmPassword = confirmPasswordInput.value.trim();

        if (password === "" || confirmPassword === "") {
          messageSpan.textContent = '';
          return; 
        }
        if (passwordInput.value === confirmPasswordInput.value) {
            messageSpan.textContent = 'รหัสผ่านถูกต้อง';
            messageSpan.style.color = 'green';
            submitButton.disabled = false; 
        } else {
            messageSpan.textContent = 'รหัสผ่านไม่ถูกต้อง';
            messageSpan.style.color = 'red';
            submitButton.disabled = true;
        }
    }


    passwordInput.addEventListener('input', checkPasswordMatch);
    confirmPasswordInput.addEventListener('input', checkPasswordMatch);
    submitButton.addEventListener('input')

    checkPasswordMatch();
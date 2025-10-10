   //ทำเลื่อนสำหรับ login admin 
    const containerbd = document.querySelector('.container-bd');
    const adminbtn = document.querySelector('.admin-btn');
    const userbtn = document.querySelector('.user-btn');
    adminbtn.addEventListener('click', () => {
        containerbd.classList.add('active');
    });

    userbtn.addEventListener('click', () => {
        containerbd.classList.remove('active');
    });
 

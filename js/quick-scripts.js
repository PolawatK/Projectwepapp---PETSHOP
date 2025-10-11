//ทำกล่องไอเทมเลื่อนครับอาจารย์

  const productSlider = document.querySelector('.container-bd');
  const nextBtn = document.querySelector('.r-btn');
  const prevBtn = document.querySelector('.l-btn');

  console.log(productSlider, nextBtn, prevBtn); 

  nextBtn.addEventListener('click', () => {
    console.log('click next');
    productSlider.scrollLeft += productSlider.clientWidth;
  });

  prevBtn.addEventListener('click', () => {
    console.log('click prev');
    productSlider.scrollLeft -= productSlider.clientWidth;
  });

   

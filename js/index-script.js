const images = [
    "img/1.png",
    "img/2.png",
    "img/3.png",
    "img/4.png"
  ];
  let i = 0;

  function changeBackground(){
    const box = document.querySelector(".container-pt"); 
    box.style.backgroundImage = `url(${images[i]})`;
    i = (i + 1) % images.length;
  }
  changeBackground();
  setInterval(changeBackground, 5000);


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

   

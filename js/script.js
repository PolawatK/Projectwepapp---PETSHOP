 const links = document.querySelectorAll(".main-nav a");
    const currentPath = window.location.pathname.split("/").pop();

    links.forEach(link => {
      if(link.getAttribute("href") === currentPath){
        link.classList.add("active");
      }
    });

    // ถ้าอยากให้กดแล้ว active ทันที (เช่น SPA)
    links.forEach(link => {
      link.addEventListener("click", () => {
        links.forEach(l => l.classList.remove("active"));
        link.classList.add("active");
      });
    });
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




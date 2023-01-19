let uzLan = document.querySelector(".uz-icon");
let ruLan = document.querySelector(".ru-icon");

uzLan.addEventListener("click", () => {
  uzLan.classList.add("hidden");
  ruLan.classList.contains("hidden") ? ruLan.classList.remove("hidden") : null;
});

ruLan.addEventListener("click", () => {
  ruLan.classList.add("hidden");
  uzLan.classList.contains("hidden") ? uzLan.classList.remove("hidden") : null;
});
document.querySelector('.open-vidget-btn').addEventListener("click", () => {
  document.querySelector('.right-right').classList.toggle('right-right-active')
});
document.querySelector('.menuOpen').addEventListener("click", () => {
  document.querySelector('.left-side').classList.toggle('left-side-active')
});


let tablinks = document.querySelectorAll('.tablinks ul li')
let tabblock = document.querySelectorAll('.tab-block')

tablinks.forEach(item =>{
  let lnk = item.dataset.active
  console.log(lnk);
  item.addEventListener('click', ()=>{
      tabblock.forEach(it => {
        it.classList.remove('tab-active')
      })
      tablinks.forEach(i => {
        i.classList.remove('tablink-active')
      })
       item.classList.add('tablink-active')   
      document.querySelector(lnk).classList.add('tab-active')
  })
})

var swiper = new Swiper(".mySwiper", {
  slidesPerView: 3,
  spaceBetween: 30,
  slidesPerGroup: 3,
  loop: true,
  loopFillGroupWithBlank: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

function openm(e) {
    // let analogname = e.target.dataset.analog;
    // let prepName = e.target.dataset.preparat;
    // document.querySelector('.pr-name').innerText = prepName
    document.querySelector('.analog-modal').style.visibility = 'visible'
    function closeModal(){
      document.querySelector('.analog-modal').style.visibility = 'hidden'
    }

    document.querySelector('.a-modal-close').addEventListener('click', closeModal)
  }


let buybtn = document.querySelector('.buybtn')


  buybtn.addEventListener('click', e=>{
    // let analogname = e.target.dataset.analog;
    // let prepName = e.target.dataset.preparat;
    // document.querySelector('.pr-name').innerText = prepName
    document.querySelector('.buy-modal').style.visibility = 'visible'
    function closeModal(){
      document.querySelector('.buy-modal').style.visibility = 'hidden'
    }

    document.querySelector('.a-buy-close').addEventListener('click', closeModal)
  })  

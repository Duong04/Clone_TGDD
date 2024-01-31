document.addEventListener("DOMContentLoaded", function () {
  var main = new Splide("#main-carousel", {
    rewind: true,
    pagination: false,
    arrows: true,
    breakpoints: {
      1024: {
        arrows: false,
      },
    },
  });

  var thumbnails = new Splide("#thumbnail-carousel", {
    fixedWidth: 85,
    fixedHeight: 5,
    gap: 5,
    rewind: true,
    pagination: false,
    arrows: false,
    isNavigation: true,
  });

  main.sync(thumbnails);
  main.mount();
  thumbnails.mount();
});

//===============
const bodyMain = document.querySelector("body");
const openDesc = document.querySelector('.open-desc');
const viewDesc = document.querySelector('.view-description');
const descAll = document.querySelector('.description-all');
const btnClose = document.querySelector('.btn-close');

function showDesc() {
  bodyMain.style.overflowY = 'hidden';
  viewDesc.classList.add('active');
}

function hideDesc() {
  bodyMain.style.overflowY = 'auto';
  viewDesc.classList.remove('active');
}

openDesc.addEventListener('click', showDesc);
viewDesc.addEventListener('click', hideDesc);
btnClose.addEventListener('click', hideDesc);
descAll.addEventListener('click', (event) => event.stopPropagation());
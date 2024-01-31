function showTime() {
    let date = new Date();
    let h = date.getHours();
    let m = date.getMinutes();
    let s = date.getSeconds();

    if (h == 0) {
        h = 12;
    }

    h = h < 10 ? '0' + h : h;
    m = m < 10 ? '0' + m : m;
    s = s < 10 ? '0' + s : s;

    let time = `<span>${h}</span> : <span>${m}</span> : <span>${s}</span>`;

    document.querySelector('.countdown').innerHTML = time;

    setTimeout(showTime, 1000);
}

showTime();

const asideLeft = document.querySelector('.aside-left');
const asideRight = document.querySelector('.aside-right');

window.addEventListener('scroll', () => {
    if (window.scrollY > 300) {
        asideLeft.classList.add('active');
        asideRight.classList.add('active');
    }else {
        asideLeft.classList.remove('active');
        asideRight.classList.remove('active');
    }
}) 


const tabItem = document.querySelectorAll('.tab-item');
const tabProduct = document.querySelectorAll('.tab-product-child');

tabItem.forEach( (item, index) =>{
    item.onclick = function () {
        document.querySelector('.tab-product-child.active').classList.remove('active');
        tabProduct[index].classList.add('active');
    }
});
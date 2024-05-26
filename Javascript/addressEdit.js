// const detailBtn = document.querySelector('.detail_btn');
// const popup = document.querySelector('#popup_content');

// detailBtn.addEventListener('click', () => {
//     popup.classList.add('show_popup');
//     // popup.classList.add('fade-out');
// });

// var cancelBtn = document.querySelector('.close_btn');
// cancelBtn.addEventListener('click', () => {
//     popup.classList.remove('show_popup');
// });

const detailBtns = document.querySelectorAll('.detail_btn');
const popup = document.querySelector('#popup_content');

detailBtns.forEach((btn) => {
  btn.addEventListener('click', () => {
    popup.classList.add('show_popup');
    const orderID = btn.getAttribute('data-orderid');
    console.log(orderID);
  });
});

const cancelBtn = document.querySelector('.close_btn');
cancelBtn.addEventListener('click', () => {
  popup.classList.remove('show_popup');
});


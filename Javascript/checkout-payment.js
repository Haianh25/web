const cardPaymentBtn = document.querySelector('.selectedCardPayment');
const codPaymentBtn = document.querySelector('.selectedCODPayement');
const cardContent = document.querySelector('.card-info');
const radioCard = document.querySelector('#radioCard');
const radioCOD = document.querySelector('#radioCOD');

cardPaymentBtn.addEventListener('click', () => {
    cardContent.classList.add('active');
    radioCard.checked = true;
    radioCOD.checked = false;
    
});
  
codPaymentBtn.addEventListener('click', () => {
    cardContent.classList.remove('active');
    radioCard.checked = false;
    radioCOD.checked = true;
});

const editBtn = document.querySelector('.address-edit');
const popup = document.querySelector('#popup_content');

editBtn.addEventListener('click', () => {
    popup.classList.add('show_popup');
});

var cancelBtn = document.querySelector('.cancel_btn');
cancelBtn.addEventListener('click', () => {
    popup.classList.remove('show_popup');
});


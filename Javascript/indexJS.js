//Đóng mở modal khi ấn vào nút play youtube
function closeHgModalYoutube() {
     let getModalYoutube = document.querySelector('#modalYoutube');
    let getHgModalClose = document.querySelector('.hg-modal-close');
      
    let computedDisplay = getComputedStyle(getModalYoutube).display;
     
    // xét trạng thái block và none
    if (computedDisplay === "block") {
          getModalYoutube.style.display = "none";
    } else {
          getModalYoutube.style.display = "block";
    }
    
    //none khi click vào icon close
    getHgModalClose.addEventListener("click", function() {
    getModalYoutube.style.display = "none";
    });

    //close khi bấm vào các phần đen bên ngoài
    window.onclick = function(event) {
    if (event.target == getModalYoutube) {
        getModalYoutube.style.display = "none";
    }
    }
      
}    


function openCloseSearch(){
    let searchModal = document.getElementById('search-modal');
    
    if(searchModal.style.display === "none"){
        searchModal.style.display = "inline-block";
    }else{
        searchModal.style.display = "none";
    }
}

  
  

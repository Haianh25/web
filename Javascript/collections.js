var collPrice = document.getElementsByClassName("filter-price-name");
var collStuff = document.getElementsByClassName("filter-stuff-name");
var collMaterial = document.getElementsByClassName("filter-material-name");
var collStyle = document.getElementsByClassName("filter-style-name");

for(let i=0; i<collPrice.length;i++){
    collPrice[i].addEventListener("click",function(){
        this.classList.toggle("active");
        let content = this.nextElementSibling;
        let icon = this.querySelector("i");
        if(content.classList.contains("price-level")){
            if(content.style.maxHeight){
                content.style.maxHeight = null;
                content.style.display = "none";
                icon.classList.remove("fa-minus");
                icon.classList.add("fa-plus");
            } else {
                content.style.maxHeight = content.scrollHeight + "500px";
                content.style.display = "block";
                icon.classList.remove("fa-plus");
                icon.classList.add("fa-minus");
            }

        }
    });
}

for(let i=0; i<collStuff.length;i++){
    collStuff[i].addEventListener("click",function(){
        this.classList.toggle("active");
        let content = this.nextElementSibling;
        let icon = this.querySelector("i");
        if(content.classList.contains("stuff-category")){
            if(content.style.maxHeight){
                content.style.maxHeight = null;
                content.style.display = "none";
                icon.classList.remove("fa-minus");
                icon.classList.add("fa-plus");
            } else {
                content.style.maxHeight = content.scrollHeight + "500px";
                content.style.display = "block";
                icon.classList.remove("fa-plus");
                icon.classList.add("fa-minus");
            }

        }
    });
}

for(let i=0; i<collMaterial.length;i++){
    collMaterial[i].addEventListener("click",function(){
        this.classList.toggle("active");
        let content = this.nextElementSibling;
        let icon = this.querySelector("i");
        if(content.classList.contains("material-category")){
            if(content.style.maxHeight){
                content.style.maxHeight = null;
                content.style.display = "none";
                icon.classList.remove("fa-minus");
                icon.classList.add("fa-plus");
            } else {
                content.style.maxHeight = content.scrollHeight + "500px";
                content.style.display = "block";
                icon.classList.remove("fa-plus");
                icon.classList.add("fa-minus");
            }

        }
    });
}

for(let i=0; i<collStyle.length;i++){
    collStyle[i].addEventListener("click",function(){
        this.classList.toggle("active");
        let content = this.nextElementSibling;
        let icon = this.querySelector("i");
        if(content.classList.contains("style-category")){
            if(content.style.maxHeight){
                content.style.maxHeight = null;
                content.style.display = "none";
                icon.classList.remove("fa-minus");
                icon.classList.add("fa-plus");
            } else {
                content.style.maxHeight = content.scrollHeight + "500px";
                content.style.display = "block";
                icon.classList.remove("fa-plus");
                icon.classList.add("fa-minus");
            }

        }
    });
}


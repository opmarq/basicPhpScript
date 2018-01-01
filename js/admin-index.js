//displaying data on the update modal once the update icon is clicked
var updatebuttons = document.querySelectorAll(".update-category-btn");
updatebuttons.forEach(btn => btn.addEventListener("click",function(){
    //getting the old category data
    console.log(this.dataset.category);
    //setting the old category data into the modal inputs
    let nameInput =  document.querySelector(".category-input-name");
    let idinput =  document.querySelector(".category-input-id");

    let fields = this.dataset.category.split(":");
    idinput.value = fields[0];
    nameInput.value = fields[1];
}))

//toggle the active class between navbar elements on the admin panel.
var navlinks = document.querySelectorAll("ul.navbar-nav > li > a");
console.log(navlinks);
navlinks.forEach(link => link.addEventListener("click",function(){
    //remoce active class from the other li
    let activeLi = document.querySelector("li.active");
    activeLi.removeAttribute("class");
    //set the active class to the new clicked li 
    this.parentNode.setAttribute("class","active");
}))
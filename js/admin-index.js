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


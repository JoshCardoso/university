const btnClose = document.querySelectorAll(".close");
const modal = document.getElementById("modal");
const btnModal = document.getElementById("modal2");
const modal2 = document.getElementById("dropMenu");

btnClose.forEach( (e) => {
    e.addEventListener("click", (a)=>{
        modal.classList.toggle("flex");
        modal.classList.toggle("hidden");
    })
});

btnModal.addEventListener("click", (i)=>{
    modal2.classList.toggle("flex");
    modal2.classList.toggle("hidden");
})


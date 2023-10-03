const btnClose = document.querySelectorAll(".closep");
const btnCloseX = document.querySelectorAll(".closex");
const btnCloseB = document.querySelectorAll(".closeb");
const modals = document.querySelectorAll(".modals");
const btnModal = document.getElementById("modal2");
const modal2 = document.getElementById("dropMenu");

btnClose.forEach((btn, index) => {
    btn.addEventListener("click", () => {
        console.log(index);
        modals[index].classList.toggle("flex");
        modals[index].classList.toggle("hidden");
    })
});

btnCloseX.forEach((btn, index) => {
    btn.addEventListener("click", () => {
        console.log(index);
        modals[index].classList.toggle("flex");
        modals[index].classList.toggle("hidden");
    })
});

btnCloseB.forEach((btn, index) => {
    btn.addEventListener("click", () => {
        console.log(index);
        modals[index].classList.toggle("flex");
        modals[index].classList.toggle("hidden");
    })
});

btnModal.addEventListener("click", (i)=>{
    modal2.classList.toggle("flex");
    modal2.classList.toggle("hidden");
})


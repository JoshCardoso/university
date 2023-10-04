const btnClose = document.querySelectorAll(".closep");
const btnCloseB = document.querySelectorAll(".closeb");
const btnCloseA = document.querySelectorAll(".closea");
const modals = document.querySelectorAll(".modals");
const btnModal = document.getElementById("modal2");
const modal2 = document.getElementById("dropMenu");


btnClose.forEach((btn, index) => {
    btn.addEventListener("click", () => {
        modals[index].classList.toggle("flex");
        modals[index].classList.toggle("hidden");
    })
});

const btnCloseX = document.querySelectorAll(".closex");
btnCloseX.forEach((btn, index) => {
    btn.addEventListener("click", () => {
        modals[index].classList.toggle("flex");
        modals[index].classList.toggle("hidden");
    })
});

btnCloseB.forEach((btn, index) => {
    btn.addEventListener("click", () => {
        modals[index].classList.toggle("flex");
        modals[index].classList.toggle("hidden");
    })
});

btnModal.addEventListener("click", (i)=>{
    modal2.classList.toggle("flex");
    modal2.classList.toggle("hidden");
})

const modalAdd = document.querySelector(".modalAdd");
const btnCloseD = document.querySelectorAll(".closed");

btnCloseD.forEach((btn) => {
    btn.addEventListener("click", (i) => {
        modalAdd.classList.toggle("hidden");
        modalAdd.classList.toggle("flex");
    })
});


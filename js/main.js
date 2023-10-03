const btnClose = document.querySelectorAll(".closep");

const btnCloseD = document.querySelectorAll(".closed");
const btnCloseB = document.querySelectorAll(".closeb");
const btnCloseA = document.querySelectorAll(".closea");
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

const btnCloseX = document.querySelectorAll(".closex");
btnCloseX.forEach((btn, index) => {
    btn.addEventListener("click", () => {
        console.log(index);
        modals[index].classList.toggle("flex");
        modals[index].classList.toggle("hidden");
    })
});

btnCloseD.forEach((btn, index) => {
    btn.addEventListener("click", () => {
        console.log(modalAdd);
        const modalAdd = document.getElementsById("modalAdd");
        modalAdd.classList.toggle("flex");
        modalAdd.classList.toggle("hidden");
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


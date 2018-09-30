let sliderAmount = document.getElementById("myAmount");
let outputAmount = document.getElementById("displayAmount");
outputAmount.innerHTML = sliderAmount.value;
let sliderTerm = document.getElementById("myTerm");
let outputTerm = document.getElementById("displayTerm");
outputTerm.innerHTML = sliderTerm.value;


sliderAmount.oninput = function () {
    outputAmount.innerHTML = this.value;

}
sliderTerm.oninput = function () {
    outputTerm.innerHTML = this.value;
}

function calculate() {
    /*    let amountb = document.getElementById("borrow_amount").value;
        let interest = 6 / 100;
        let term = document.getElementById("term").value;*/
    let interest = 5 / 100;
    let payment = (interest * sliderTerm.value) * sliderAmount.value;
    let newBal = +payment + +sliderAmount.value;
    let monthly = Math.round(newBal / sliderTerm.value);
    return document.getElementById("result").innerText = monthly.toString();
}

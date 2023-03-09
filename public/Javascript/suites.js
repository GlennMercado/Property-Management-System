// pass values
// 

const { isEmpty, isNull } = require("lodash");

// textbox disable/enable
function checkCheckbox() {
    var checkbox = document.getElementById("customCheckRegister");
    checkbox.checked = true;
}
$(document).ready(function () { //DISABLED PAST DATES IN APPOINTMENT DATE
    var dateToday = new Date();
    var month = dateToday.getMonth() + 1;
    var day = dateToday.getDate();
    var year = dateToday.getFullYear();
    if (month < 10)
        month = '0' + month.toString();
    if (day < 10)
        day = '0' + day.toString();
    var maxDate = year + '-' + month + '-' + day;
    $('.chck').attr('min', maxDate);
});

$('.prevent_submit').on('submit', function () {
    $('.prevent_submit').attr('disabled', 'true');
});
function pass() {
    // page
    var mobile1 = document.getElementById('mobile');
    var date1 = document.getElementById('date1');
    var date2 = document.getElementById('date2');
    var pax1 = document.getElementById('pax_num');
    var rpn1 = document.getElementById('rpn');
    // page value pass to modal
    var mobile2 = document.getElementById('mobile2');
    var date_pass = document.getElementById('date_pass1');
    var date_pass2 = document.getElementById('date_pass2');
    var rpn2 = document.getElementById('2pax');
    rpn2.innerHTML = rpn1.value;
    mobile2.innerHTML = mobile1.value;
    date_pass.innerHTML = date1.value;
    date_pass2.innerHTML = date2.value;
}
// enable disable submit validation
function enable_button() {
    var mobile_num = document.getElementById("mobile");
    var date1 = document.getElementById("date1");
    var date2 = document.getElementById("date2");
    var pax = document.getElementById("pax_num");
    var submit_button1 = document.getElementById("submit_button");
    if (pax.value == "" || mobile_num.value == "" || date1.value == "" || date2.value == "") {
        submit_button1.disabled = true;
        submit_button1.style.cursor = "not-allowed";
    } else {
        submit_button1.disabled = false;
        submit_button1.style.cursor = "pointer";
    }
}
function price_count() {
    // days
    var d1 = document.getElementById("date1").value;
    var d2 = document.getElementById("date2").value;
    const dateOne = new Date(d1);
    const dateTwo = new Date(d2);
    const time = Math.abs(dateTwo - dateOne);
    //days total
    const days = Math.ceil(time / (1000 * 60 * 60 * 24));
    // pax
    var pax_num = document.getElementById("pax_num");
    var dproomprice = document.getElementById("dp");
    var room_price = document.getElementById("room_price");
    var per_pax_price = 1500;
    var rpn1 = document.getElementById("rpn").value;
    var room2pax = Number(rpn1);
    var sub = document.getElementById("subtotal");
    // pax total
    var totalprice;
    // payment price
    var payment;
    if (pax_num.value == 1 || pax_num.value == 2) {
        payment = room2pax * days;
        room_price.value = payment;
        sub.innerHTML = room2pax;
        dproomprice.innerHTML = payment;
    } else if (pax_num.value == 3) {
        totalprice = room2pax + per_pax_price;
        payment = totalprice * days;
        room_price.value = payment;
        sub.innerHTML = totalprice;
        dproomprice.innerHTML = payment;
    } else if (pax_num.value == 4) {
        totalprice = room2pax + (per_pax_price * 2);
        payment = totalprice * days;
        room_price.value = payment;
        sub.innerHTML = totalprice;
        dproomprice.innerHTML = payment;
    }
    pass();
}
document.getElementById("mainCheckbox").addEventListener("change", function () {
    document.getElementById("textbox1").disabled = !this.checked;
});
document.getElementById("ddCheckbox").addEventListener("change", function () {
    document.getElementById("textbox2").disabled = !this.checked;
});

function changeValue() {
    var textboxNumbers = document.getElementById("textboxes").value;
    balls.innerHTML = '';
    var i;
    for (i = 0; i < textboxNumbers; i++) {
        var yourTextboxes = document.createElement("INPUT");
        yourTextboxes.setAttribute("type", "text");
        yourTextboxes.classList.add("form-control");
        yourTextboxes.setAttribute("placeholder", "Enter Name Here");
        document.getElementById("balls").appendChild(yourTextboxes);
    }
}

function pax_on_change() {
    changeValue();
    price_count();
}

function incrementValue(id) {
    var input = document.getElementById(id);
    var value = parseInt(input.value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    input.value = value;
}

function decrementValue(id) {
    var input = document.getElementById(id);
    var value = parseInt(input.value, 10);
    value = isNaN(value) ? 0 : value;
    value--;
    input.value = value;
}
// Add event listeners for input 1
document.querySelector('#input1 .inc').addEventListener('click', function () {
    incrementValue('input1');
});
document.querySelector('#input1 .dec').addEventListener('click', function () {
    decrementValue('input1');
});
// Add event listeners for input 2
document.querySelector('#input2 .inc').addEventListener('click', function () {
    incrementValue('input2');
});
document.querySelector('#input2 .dec').addEventListener('click', function () {
    decrementValue('input2');
});
const textbox = document.getElementById('mytextbox');
let value = parseInt(textbox.value);
textbox.addEventListener('keydown', function (event) {
    if (event.keyCode == 38) { // up arrow
        value++;
        textbox.value = value;
    } else if (event.keyCode == 40) { // down arrow
        value--;
        textbox.value = value;
    }
});


// dropdown count
// get the dropdown button and the input fields
const dropdownButton = document.getElementById('dropdownMenuButton');
const adultInput = document.getElementById('input1');
const childInput = document.getElementById('input2');
const infantInput = document.getElementById('input3');

// add event listeners to the plus and minus buttons
const buttons = document.querySelectorAll('.btn-count, .btn-count2');
buttons.forEach(button => {
    button.addEventListener('click', event => {
        // prevent default form submission
        event.preventDefault();

        // get the parent element of the clicked button
        const parent = event.target.parentElement.parentElement;

        // get the label and current value of the input field
        const label = parent.querySelector('label').textContent;
        let value = parseInt(label.split(': ')[1]);

        // increment or decrement the value depending on which button was clicked
        // if (event.target.classList.contains('btn-success')) {
        //     value++;
        // } else if (event.target.classList.contains('btn-danger')) {
        //     value--;
        // }
        if (event.target.classList.contains('btn-count')) {
            value++;
            if (value > 4) {
                document.getElementById("btn-count").disabled = true;
            }
        } else if (event.target.classList.contains('btn-count2')) {
            value--;
            if (value < 0) {
                document.getElementById("btn-count2").disabled = true;
            }
        } else {
            document.getElementById("btn-count").disabled = false;
            document.getElementById("btn-count2").disabled = false;
        }
        // update the label and dropdown button text
        parent.querySelector('label').textContent = `${label.split(': ')[0]}: ${value}`;
        dropdownButton.querySelectorAll('span').forEach(span => {
            if (span.textContent.includes(label.split(': ')[0])) {
                span.textContent = `${label.split(': ')[0]}: ${value}`;
            }
        });
    });
});
let count = 0;
const countElement = document.getElementById('count');
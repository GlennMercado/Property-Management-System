// pass values
// 

const { isEmpty, isNull } = require("lodash");

// textbox disable/enable
function checkCheckbox() {
    var checkbox = document.getElementById("customCheckRegister");
    checkbox.checked = true;
}
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
function enable_submit() {
    var acc = document.getElementById("gcash_acc");
    var g_img = document.getElementById("gcash_img");
    var submit_button2 = document.getElementById("submit_button2");
    if (acc.value == "" || g_img.value == "") {
        submit_button2.disabled = true;
        submit_button2.style.cursor = "not-allowed";
    } else {
        submit_button2.disabled = false;
        submit_button2.style.cursor = "pointer";
    }
    loadfile(event);
}
function loadfile(event){
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
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
        dproomprice.innerHTML = payment.toLocaleString('en-US');
    } else if (pax_num.value == 3) {
        totalprice = room2pax + per_pax_price;
        payment = totalprice * days;
        room_price.value = payment;
        sub.innerHTML = totalprice;
        dproomprice.innerHTML = payment.toLocaleString('en-US');
    } else if (pax_num.value == 4) {
        totalprice = room2pax + (per_pax_price * 2);
        payment = totalprice * days;
        room_price.value = payment;
        sub.innerHTML = totalprice;
        dproomprice.innerHTML = payment.toLocaleString('en-US');
    }
    pass();
    someoneElse();
}
document.getElementById("mainCheckbox").addEventListener("change", function () {
    document.getElementById("textbox1").disabled = !this.checked;
});
document.getElementById("ddCheckbox").addEventListener("change", function () {
    document.getElementById("textbox2").disabled = !this.checked;
});
function someoneElse(){
    var checkbox = document.getElementById("mainCheckbox");
    var txtbox = document.getElementById("textbox1");
    var gname = document.getElementById("guest_name");
    var gname1 = document.getElementById("guest_name1");
    if (checkbox.checked == true){
        gname.value = txtbox.value;
    }else{
        gname.value = gname1.value;
    }
}
function enable_txt() {
    var checkbox = document.getElementById("mainCheckbox");
    var txtbox = document.getElementById("textbox1");
    if(checkbox.checked == true){
        txtbox.disabled = false;
    }else{
        txtbox.disabled = true;
    }
}
function show_txt(){
    var checkbox = document.getElementById("checkbox1");
    var show = document.getElementById("special_request");
    var txt1 = document.getElementById("special_request_txt1");
    var txt2 = document.getElementById("special_request_txt2");
    var txt3 = document.getElementById("special_request_txt3");
    if(checkbox.checked == true){
        show.hidden = false;
    }else{
        show.hidden = true;
        txt1.value = "";
        txt2.value = "";
        txt3.value = "";
    }
}
// function incrementValue(id) {
//     var input = document.getElementById(id);
//     var value = parseInt(input.value, 10);
//     value = isNaN(value) ? 0 : value;
//     value++;
//     input.value = value;
// }

// function decrementValue(id) {
//     var input = document.getElementById(id);
//     var value = parseInt(input.value, 10);
//     value = isNaN(value) ? 0 : value;
//     value--;
//     input.value = value;
// }
// document.querySelector('#input1 .inc').addEventListener('click', function () {
//     incrementValue('input1');
// });
// document.querySelector('#input1 .dec').addEventListener('click', function () {
//     decrementValue('input1');
// });
// document.querySelector('#input2 .inc').addEventListener('click', function () {
//     incrementValue('input2');
// });
// document.querySelector('#input2 .dec').addEventListener('click', function () {
//     decrementValue('input2');
// });
// const textbox = document.getElementById('mytextbox');
// let value = parseInt(textbox.value);
// textbox.addEventListener('keydown', function (event) {
//     if (event.keyCode == 38) {
//         textbox.value = value;
//     } else if (event.keyCode == 40) {
//         value--;
//         textbox.value = value;
//     }
// });


// const dropdownButton = document.getElementById('dropdownMenuButton');
// const adultInput = document.getElementById('input1');
// const childInput = document.getElementById('input2');
// const infantInput = document.getElementById('input3');

// const buttons = document.querySelectorAll('.btn-count, .btn-count2');
// buttons.forEach(button => {
//     button.addEventListener('click', event => {
//         event.preventDefault();

//         const parent = event.target.parentElement.parentElement;

//         const label = parent.querySelector('label').textContent;
//         let value = parseInt(label.split(': ')[1]);

//         if (event.target.classList.contains('btn-count')) {
//             value++;
//             if (value > 4) {
//                 document.getElementById("btn-count").disabled = true;
//             }
//         } else if (event.target.classList.contains('btn-count2')) {
//             value--;
//             if (value < 0) {
//                 document.getElementById("btn-count2").disabled = true;
//             }
//         } else {
//             document.getElementById("btn-count").disabled = false;
//             document.getElementById("btn-count2").disabled = false;
//         }
//         parent.querySelector('label').textContent = `${label.split(': ')[0]}: ${value}`;
//         dropdownButton.querySelectorAll('span').forEach(span => {
//             if (span.textContent.includes(label.split(': ')[0])) {
//                 span.textContent = `${label.split(': ')[0]}: ${value}`;
//             }
//         });
//     });
// });
// let count = 0;
// const countElement = document.getElementById('count');


function pass() {
    // page
    var mobile1 = document.getElementById('mobile');
    var date1 = document.getElementById('date1');
    var date2 = document.getElementById('date2');
    var pax1 = document.getElementById('pax_num');
    var rpn1 = document.getElementById('rpn');
    var name1 = document.getElementById('name1');
    // page value pass to modal
    var mobile2 = document.getElementById('mobile2');
    var date_pass = document.getElementById('date_pass1');
    var date_pass2 = document.getElementById('date_pass2');
    var name2 = document.getElementById('name2');

    name2.innerHTML = name1.value;
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
    var sub1 = document.getElementById("sub1");
    sub1 = rpn1;
    // pax total
    var totalprice;
    // payment price
    var payment;
    if (pax_num.value == 1 || pax_num.value == 2) {
        payment = room2pax * days;
        room_price.value = payment;
        sub.innerHTML = room2pax.toLocaleString('en-US');
        dproomprice.innerHTML = payment.toLocaleString('en-US');
    } else if (pax_num.value == 3) {
        totalprice = room2pax + per_pax_price;
        payment = totalprice * days;
        room_price.value = payment;
        sub.innerHTML = totalprice.toLocaleString('en-US');;
        dproomprice.innerHTML = payment.toLocaleString('en-US');
    } else if (pax_num.value == 4) {
        totalprice = room2pax + (per_pax_price * 2);
        payment = totalprice * days;
        room_price.value = payment;
        sub.innerHTML = totalprice.toLocaleString('en-US');;
        dproomprice.innerHTML = payment.toLocaleString('en-US');
    }
    pass();
}
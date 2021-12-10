function countdown() {
    var s = 60;
    var timeout = null;

    function start() {
        countdown = document.getElementById('s');
        countdown.innerText = s.toString() + " Giây";

        if(s > 0){
            timeout = setTimeout(function() {
                s--;
                start();
            }, 1000);
        }else{
            countdown.innerHTML = 'Hết thời gian vui lòng ';
            back = document.createElement("a");
            back.setAttribute('href', './index.php?page=login&action=forget');
            back.setAttribute('class', 'text-decoration-none');
            back.innerHTML = 'xác nhận lại.';
            countdown.appendChild(back);
            very.removeChild(btnVery);
        }
    }
    start();
}

window.onload = function () {
    very = document.getElementById('very');
    btnVery = document.createElement('button');
    btnVery.setAttribute('class', 'btn btn-primary');
    btnVery.setAttribute('name', 'very');
    btnVery.innerHTML = 'Xác nhận';
    very.appendChild(btnVery);

    
    div = document.createElement('div');
    div.setAttribute('class', 'px-5 mt-2 float-end');
    div.setAttribute('id', 'countdown');
    
    span = document.createElement('span');
    span.setAttribute('id', 's');
    div.appendChild(span);

    very.appendChild(div);
    countdown();
};
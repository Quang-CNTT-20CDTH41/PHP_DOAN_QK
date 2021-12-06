
// START

text = document.getElementById('text');

i1 = document.getElementById('i1');
i2 = document.getElementById('i2');
i3 = document.getElementById('i3');
i4 = document.getElementById('i4');
i5 = document.getElementById('i5');

a1 = -1;
a2 = -1;
a3 = -1;
a4 = -1;
a5 = -1;

i1.addEventListener('click', function () {
        i2.setAttribute('class', 'bi bi-star');          
        a2 = -1;  
        a4 = -1;  
        a5 = -1;
        i3.setAttribute('class', 'bi bi-star');   
        i4.setAttribute('class', 'bi bi-star');   
        i5.setAttribute('class', 'bi bi-star'); 
        switch(a1){
                case -1:
                        i1.setAttribute('class', 'bi bi-star-fill yellow');
                        text.innerHTML = '1 sao';
                        a1 = 1;
                        break;
                case 1:
                        i1.setAttribute('class', 'bi bi-star');   
                        a1 = -1;   
                        text.innerHTML = 'Chưa đánh giá';
                        break;
        }
});

i2.addEventListener('click', function () {
        i1.setAttribute('class', 'bi bi-star-fill yellow');
        i3.setAttribute('class', 'bi bi-star');
        i4.setAttribute('class', 'bi bi-star');
        i5.setAttribute('class', 'bi bi-star');
        a3 = -1; 
        a1 = -1; 
        a4 = -1; 
        a5 = -1;
        switch(a2){
                case -1:
                        i2.setAttribute('class', 'bi bi-star-fill yellow');
                        text.innerHTML = '2 sao';
                        a2 = 1;
                        break;
                case 1:
                        i2.setAttribute('class', 'bi bi-star');   
                        a2 = -1;   
                        break;
        }
});

i3.addEventListener('click', function () {
        i1.setAttribute('class', 'bi bi-star-fill yellow');
        i2.setAttribute('class', 'bi bi-star-fill yellow');    
        a2 = -1;
        i4.setAttribute('class', 'bi bi-star');    
        i5.setAttribute('class', 'bi bi-star');    
        a4 = -1;
        a5 = -1;
        switch(a3){
                case -1:
                        i3.setAttribute('class', 'bi bi-star-fill yellow');
                        text.innerHTML = '3 sao';
                        a3 = 1;
                        break;
                case 1:
                        i3.setAttribute('class', 'bi bi-star');   
                        a3 = -1;   
                        break;
        }
});

i4.addEventListener('click', function () {
        i1.setAttribute('class', 'bi bi-star-fill yellow');
        i2.setAttribute('class', 'bi bi-star-fill yellow');    
        i3.setAttribute('class', 'bi bi-star-fill yellow');    
        i5.setAttribute('class', 'bi bi-star');    
        a2 = -1;
        a3 = -1;
        a5 = -1;
        switch(a4){
                case -1:
                        i4.setAttribute('class', 'bi bi-star-fill yellow');
                        text.innerHTML = '4 sao';
                        a4 = 1;
                        break;
                case 1:
                        i4.setAttribute('class', 'bi bi-star');   
                        a4 = -1;   
                        break;
        }
});

i5.addEventListener('click', function () {
        i1.setAttribute('class', 'bi bi-star-fill yellow');
        i2.setAttribute('class', 'bi bi-star-fill yellow');    
        i3.setAttribute('class', 'bi bi-star-fill yellow');    
        i4.setAttribute('class', 'bi bi-star-fill yellow');    
        a2 = -1;
        a3 = -1;
        switch(a5){
                case -1:
                        i5.setAttribute('class', 'bi bi-star-fill yellow');
                        text.innerHTML = '5 sao';
                        a5 = 1;
                        break;
                case 1:
                        i5.setAttribute('class', 'bi bi-star');   
                        a5 = -1;   
                        break;
        }
});

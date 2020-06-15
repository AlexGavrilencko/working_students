$('.profs').selectpicker();

document.getElementById('profs').addEventListener('change', e => {
    let selectedProfstndrt = e.target.value;

    fetch(`/site/get-category-profstand?q=${selectedProfstndrt}`)
        .then(r => r.json())
        .then(data => {
            var select = document.getElementsByClassName('category');
            document.getElementById('position').classList.remove('visibility-visible')
            document.getElementById('position').classList.add('visibility-hidden')
            select[0].classList.add('visibility-visible');
            select[0].innerHTML = '';

            var i = 0;
            for (let d of data){

                var opt = document.createElement('option');
                opt.value = d.id;
                opt.innerHTML = d.name;
                opt.setAttribute('data-tokens', '');
                select[0].appendChild(opt);
            }

            $('.category').selectpicker();
            
        })
})

document.getElementById('category').addEventListener('change', e => {
    let selectedProfstndrt = e.target.value;

    fetch(`/site/get-position?q=${selectedProfstndrt}`)
        .then(r => r.json())
        .then(data => {
            var select = document.getElementsByClassName('position');
                select[0].classList.add('visibility-visible');
            select[0].innerHTML = '';

            var i = 0;
            for (let d of data){

                var opt = document.createElement('option');
                opt.value = d.id;
                opt.innerHTML = d.name;
                opt.setAttribute('data-tokens', '');
                select[0].appendChild(opt);
            }

            $('.position').selectpicker();
        
        })
})








let showPassword = document.querySelectorAll('.show-password');

showPassword.forEach(item =>
    item.addEventListener('click', toggleType)
);

function toggleType() {
    let input = this.closest('.group').querySelector('.password');
    if (input.type === 'password') {
        input.type = 'text';
    } else {
        input.type = 'password';
    }
}

// $('.mydate').daterangepicker({
//     singleDatePicker: true,
//     locale: {
//    format: 'DD.MM.YYYY'
//     }
//    });





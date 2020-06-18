

function listener1() {
    document.getElementById('profs').addEventListener('change', e => {
        let selectedProfstndrt = e.target.value;
    
        fetch(`/site/get-category-profstand?q=${selectedProfstndrt}`)
            .then(r => r.json())
            .then(data => {
                $('.dropdown.category').remove();
                $('.dropdown.position').remove();
                $(`<select class=" m-1  category" data-live-search="true" name="categ_pr" id="category" style='display:none;' >
                                             
                </select>`).insertAfter('.dropdown.profs');
                var select = document.getElementById('category');
                if (document.getElementsByClassName('position')[1]) {
                    document.getElementsByClassName('position')[1].remove();
                }
                select.innerHTML = '';
                
    
                var i = 0;
                for (let d of data){
    
                    var opt = document.createElement('option');
                    opt.value = d.id;
                    opt.innerHTML = d.name;
                    opt.setAttribute('data-tokens', '');
                    select.appendChild(opt);
                }
    
                listener2();
                $('#category').selectpicker();
                
            })
    })
}

function listener2() {
    document.getElementById('category').addEventListener('change', e => {
        let selectedProfstndrt = e.target.value;
    
        fetch(`/site/get-position?q=${selectedProfstndrt}`)
            .then(r => r.json())
            .then(data => {
                $('.dropdown.position').remove();
                $(`<select class=" m-1  position" data-live-search="true" name="position" id="position" style='display:none;'> 
                                                
                </select>`).insertAfter('.dropdown.category');
                var select = document.getElementById('position');
    
                var i = 0;
                for (let d of data){
    
                    var opt = document.createElement('option');
                    opt.value = d.id;
                    opt.innerHTML = d.name;
                    opt.setAttribute('data-tokens', '');
                    select.appendChild(opt);
                }
    
                $('#position').selectpicker();
            
            })
    })
}








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


$('#profs').selectpicker();
listener1();


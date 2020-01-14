$(document).ready(function(){
    $('.header').height($(window).height());


    $('#vxod').click(function () {
        $(".avtoriz").show();
    });

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





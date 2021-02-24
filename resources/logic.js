window.onload = () => {
    document.getElementById('btn_submit').addEventListener('click', send_form);
}

function send_form() {
    list_inputs = form_container.getElementsByTagName('input');
    validated = validate_inputs(list_inputs);
    console.log(validated)
    if (validated == true) {
        $.ajax({
            url: 'resources/ingresar_programador.php',
            type: 'post',
            data: {
                'action': 'register_programmer',
                'id': id_p.value,
                'name': name_p.value,
                'last_name': last_name_p.value,
                'email': email_p.value,
                'languages': languages_p.value
            },
            success: (response) => {
                var response_json = JSON.parse(response);
                show_response(response_json);
            }
        });
    } else {
        document.getElementById('adv_text').innerHTML = validated;
    }

}

function validate_inputs(list_i) {
    var count = 0;
    var text_error = 'Debes llenar los siguientes campos:';
    for (let i = 0; i < list_i.length; i++) {
        if (list_i[i].value == '') {
            console.log('Llena el campo: ' + list_i[i].name)
            text_error += '<br>' + list_i[i].name;
        } else {
            count++;
        }
    }
    return (count == list_i.length) ? true : text_error;
}

function show_response(response) {
    adv_text.classList.remove('success_color');
    adv_text.classList.remove('error_color');
    color = (response.code > 0) ? 'success_color' : 'error_color';
    adv_text.classList.add(color);
    adv_text.innerHTML = response.description;
    if (response.code == 1) {
        setTimeout(() => {
            body = programmers.getElementsByClassName('tbody')[0];
            if (response.programmers){
                for (let i = 0; i < response.programmers.length; i++) {
                    tr = document.createElement('tr');
                    for (let x = 0; x < response.programmers.length; x++) {
                        td = document.createElement('td');
                        td.innerText = response.programmers[i][x];
                        tr.appendChild(td);
                    }
                    body.appendChild(tr);
                }
                modal.style = 'display:flex';
            }
            
        }, 4000);
    } else {
        setTimeout(() => {
            window.location.reload();
        }, 4000);
    }

}

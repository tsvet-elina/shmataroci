function validRegistration(form) {

    var noErrors = true;
    document.getElementById('userError').innerHTML = '';
    document.getElementById('emailError').innerHTML = '';
    document.getElementById('passError').innerHTML = '';
    document.getElementById('repPassError').innerHTML = '';
    document.getElementById('genderError').innerHTML = '';
    document.getElementById('imageError').innerHTML = '';
    document.getElementById('ageError').innerHTML = '';


    var reUser = /^\w+$/;
    var reEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var reMedium = new RegExp("^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})");

    if (form.user.value === "") {
        var error = ("<p>Попълнете потребителско име</p>");
        document.getElementById('userError').style.visibility = 'visible';
        document.getElementById('userError').innerHTML += error;
        form.user.focus();
        noErrors = false;

    } else if (!reUser.test(form.user.value)) {
        var error = ("<p>Потребителското име трябва да съдържа само букви и числа</p>");
        document.getElementById('userError').style.visibility = 'visible';
        document.getElementById('userError').innerHTML += error;
        form.user.focus();
        noErrors = false;
    }


    if (form.email.value === "") {
        var error = ("<p>Попълнете имейл</p>");
        document.getElementById('emailError').style.visibility = 'visible';
        document.getElementById('emailError').innerHTML += error;
        noErrors = false;
    } else if (!reEmail.test(form.email.value)) {
        var error = ("<p>Въведете валиден имейл</p>");
        document.getElementById('emailError').style.visibility = 'visible';
        document.getElementById('emailError').innerHTML += error;
        noErrors = false;
    }


    if (form.pass.value === "") {
        var error = ("<p>Попълнете паролата</p>");
        document.getElementById('passError').style.visibility = "visible";
        document.getElementById('passError').innerHTML += error;
        noErrors = false;
    } else if (!reMedium.test(form.pass.value)) {
        var error = ("<p>Паролата трябва да съдържа поне 6 символа, поне  една малка буква, поне една голяма буква, поне едно число</p>");
        document.getElementById('passError').style.visibility = "visible";
        document.getElementById('passError').innerHTML += error;
        noErrors = false;

    }
    if (form.repPass.value === "") {
        var error = ("<p>Повторете паролата</p>");
        document.getElementById('repPassError').style.visibility = "visible";
        document.getElementById('repPassError').innerHTML += error;
        noErrors = false;
    } else if (form.pass.value !== form.repPass.value) {
        var error = ("<p>Паролите трябва да бъдат еднакви</p>");
        document.getElementById('repPassError').style.visibility = "visible";
        document.getElementById('repPassError').innerHTML += error;
        noErrors = false;
    }
    if (form.age.value > 150 || form.age.value < 0 && form.age.value != null
    ) {
        var error = ("<p>Въведете валидни години</p>");
        document.getElementById('ageError').style.visibility = "visible";
        document.getElementById('ageError').innerHTML += error;
        noErrors = false;
    }
    if (form.image.value === "") {
        var error = ("<p>Прикачете файл</p>");
        document.getElementById('imageError').style.visibility = "visible";
        document.getElementById('imageError').innerHTML += error;
        noErrors = false;

    }
    if (form.gender[0].checked == false && form.gender[1].checked == false && form.gender[2].checked == false) {
        var error = ("<p>Изберете пол</p>");
        document.getElementById('genderError').style.visibility = 'visible';
        document.getElementById('genderError').innerHTML += error;
        noErrors = false;
    }

    return noErrors;
}


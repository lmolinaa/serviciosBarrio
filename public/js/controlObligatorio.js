document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form'); // Selecciona el formulario
    const campos = ['nombre', 'apellido', 'email', 'listMunicipios', 'resultadoCP', 'password', 'id_rol']; // IDs de los campos a validar

    form.addEventListener('submit', function(event) {
        let formValido = true;

        // Obtener el valor de perfil dentro del evento submit
        const perfil = document.getElementById("id_rol").value;
        console.log("Perfil seleccionado: " + perfil);

        // Añadir campos ocultos si el perfil es "Ofrezco servicio"
        if (perfil === "2") {
            const camposOcultos = ['categoria', 'servicio', 'titulo', 'fecha', 'detalle', 'imagen', 'serviceMunicipio']; // IDs de los campos a validar del formulario oculto
            campos.push(...camposOcultos);
        }
        console.log(campos); 

        campos.forEach(function(campo) {
            const input = document.getElementById(campo);
            const errorElement = document.getElementById(campo + '_error');

            if (input) {
                if (input.value.trim() === '') {
                    formValido = false;
                    input.classList.add('error'); //Añadir clase de error
                    if (errorElement) {
                        errorElement.textContent = 'Este campo es obligatorio';
                        errorElement.style.display = 'block';
                    }
                } else {
                    //Validar el campo email
                    if (campo === 'email') {
                        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                        if (!emailRegex.test(input.value.trim())) {
                            formValido = false;
                            input.classList.add('error'); //Añadir clase de error
                            if (errorElement) {
                                errorElement.textContent = 'Por favor, ingresa un email válido';
                                errorElement.style.display = 'block';
                            }
                        } else {
                            input.classList.remove('error'); //Remover clase de error
                            if (errorElement) {
                                errorElement.textContent = '';
                                errorElement.style.display = 'none';
                            }
                        }
                    }

                    //Validar el campo codigo_postal
                    if (campo === 'resultadoCP') {
                        const codigoPostalRegex = /^\d{5}$/; //Código postal de 5 dígitos
                        if (!codigoPostalRegex.test(input.value.trim())) {
                            formValido = false;
                            input.classList.add('error'); //Añadir clase de error
                            if (errorElement) {
                                errorElement.textContent = 'Por favor, ingresa un código postal válido';
                                errorElement.style.display = 'block';
                            }
                        } else {
                            input.classList.remove('error'); //Remover clase de error
                            if (errorElement) {
                                errorElement.textContent = '';
                                errorElement.style.display = 'none';
                            }
                        }
                    }

                    //Validar otros campos
                    if (campo !== 'email' && campo !== 'resultadoCP') {
                        input.classList.remove('error'); //Remover clase de error
                        if (errorElement) {
                            errorElement.textContent = '';
                            errorElement.style.display = 'none';
                        }
                    }
                }
            }
        });

        if (!formValido) {
            event.preventDefault(); //Prevenir el envío del formulario si no es válido
        }
    });
});

function toggleServiceForm(value) {
    const serviceForm = document.getElementById('serviceForm');
    if (value === '2') {
        serviceForm.style.display = 'block';
    } else {
        serviceForm.style.display = 'none';
    }
}

//Esta función se encarga de contar los caracteres en el textarea
document.addEventListener('DOMContentLoaded', function() {
    const textarea = document.getElementById('detalle');
    const counter = document.getElementById('detalle_counter');

    textarea.addEventListener('input', function() {
        const length = textarea.value.length;
        counter.textContent = `${length}/300`;
    });
});

/*function pruebas(){
    var nombre = document.getElementById('nombre').value;
    var apellido = document.getElementById('apellido').value;
    var email = document.getElementById('email').value;
    var telefono = document.getElementById('telefono').value;
    var pais = document.getElementById('pais').value;
    var direccion = document.getElementById('direccion').value;

    var listMunicipios = document.getElementById('listMunicipios').value;
    var resultadoCP = document.getElementById('resultadoCP').value;
    var password = document.getElementById('password').value;
    var id_rol = document.getElementById('id_rol').value;


    alert (nombre + " " + apellido + " " + email + " " + telefono + " " + pais + " " + direccion + " " + listMunicipios + " " + resultadoCP + " " + password + " " + id_rol);
}*/
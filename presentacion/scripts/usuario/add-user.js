// Función para agregar usuario
document.getElementById('userForm')?.addEventListener('submit', async function (event) {
    event.preventDefault();

    const formData = new FormData();
    formData.append('nameUser', document.getElementById('nameUser').value);
    formData.append('lastnameUser', document.getElementById('lastnameUser').value);
    formData.append('emailUser', document.getElementById('emailUser').value);
    formData.append('passwordUser', document.getElementById('passwordUser').value);

    try {
        const response = await fetch('http://localhost/BASICOS/businessLogic/swUser.php', {
            method: 'POST',
            body: formData
        });

        if (response.ok) {
            const data = await response.json();
            if (data.success) {
                alert('Usuario agregado exitosamente');
                document.getElementById('userForm').reset();
            } else {
                throw new Error(data.message || 'Error al agregar el usuario');
            }
        } else {
            throw new Error('Error en la solicitud');
        }
    } catch (error) {
        console.error('Error:', error);
        alert(error.message);
    }
});

// Función para iniciar sesión
document.getElementById('loginForm')?.addEventListener('submit', async function(event) {
    event.preventDefault();

    const emailUser = document.getElementById('emailUser').value;
    const passwordUser = document.getElementById('passwordUser').value;

    const formData = new FormData();
    formData.append('emailUser', emailUser);
    formData.append('passwordUser', passwordUser);

    try {
        const response = await fetch('http://localhost/BASICOS/businessLogic/swUser.php', {
            method: 'POST',
            body: formData
        });

        if (response.ok) {
            const data = await response.json();
            if (data.success) {
                alert('Inicio de sesión exitoso');
                // Redirigir al usuario a la página de Optionlist.php
                window.location.href = '/BASICOS/presentacion/paginas/administrador/Optionlist.php';
            } else {
                alert('Credenciales incorrectas');
            }
        } else {
            throw new Error('Error en la solicitud');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Error al iniciar sesión');
    }
});
window.addEventListener('message', (event) => {
    const user = event.data;
    document.getElementById('idUser').value = user.idUser;
    document.getElementById('nameUser').value = user.nameUser;
    document.getElementById('lastnameUser').value = user.lastnameUser;
    document.getElementById('emailUser').value = user.emailUser;
    document.getElementById('passwordUser').value = user.passwordUser;
});

async function updateUser(event) {
    event.preventDefault();
    
    const idUser = document.getElementById('idUser').value;
    const nameUser = document.getElementById('nameUser').value;
    const lastnameUser = document.getElementById('lastnameUser').value;
    const emailUser = document.getElementById('emailUser').value;
    const passwordUser = document.getElementById('passwordUser').value;

    const user = {
        idUser: idUser,
        nameUser: nameUser,
        lastnameUser: lastnameUser,
        emailUser: emailUser,
        passwordUser: passwordUser
    };

    try {
        const response = await fetch('http://localhost/BASICOS/businessLogic/swUser.php', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(user)
        });
        window.close();
        
    } catch (error) {
        console.error('Error al actualizar usuario:', error);
    }
}

document.getElementById('updateUserForm').addEventListener('submit', updateUser);

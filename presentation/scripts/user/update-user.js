window.addEventListener('message', (event) => {
    const user = event.data;
    document.getElementById('nameUser').value = user.nameUser;
    document.getElementById('lastnameUser').value = user.lastnameUser;
    document.getElementById('emailUser').value = user.emailUser;
    document.getElementById('passwordUser').value = user.passwordUser;
    document.getElementById('accountType').value = user.accountType;
});

async function updateUser(event) {
    event.preventDefault();

    const nameUser = document.getElementById('nameUser').value;
    const lastnameUser = document.getElementById('lastnameUser').value;
    const emailUser = document.getElementById('emailUser').value;
    const passwordUser = document.getElementById('passwordUser').value;
    const accountType = document.getElementById('accountType').value;

    const user = {
        nameUser: nameUser,
        lastnameUser: lastnameUser,
        emailUser: emailUser,
        passwordUser: passwordUser,
        accountType: accountType
    };

    console.log(user);

    try {
        const response = await fetch('http://localhost/BASICOS/businessLogic/swusuarios.php', {
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

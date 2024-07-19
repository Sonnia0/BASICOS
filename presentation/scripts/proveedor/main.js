console.log("Hola");

async function getProveedores() {
    try {
        const response = await fetch('http://localhost/BASICOS/businessLogic/swproveedores.php');
        const data = await response.json();

        const proveedores = data;

        const tableBody = document.querySelector('#table-proveedor tbody');
        tableBody.innerHTML = '';
        let cont = 1;

        proveedores.forEach(proveedor => {

            // Create table row
            const row = document.createElement('tr');

            // Create cells for each proveedor property
            const id = document.createElement('td');
            id.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
            id.textContent = cont;
            cont++;

            const cedula = document.createElement('td');
            cedula.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
            cedula.textContent = proveedor.cedula;

            const nombre = document.createElement('td');
            nombre.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
            nombre.textContent = proveedor.nombres;

            const apellido = document.createElement('td');
            apellido.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
            apellido.textContent = proveedor.apellidos;

            const telefono = document.createElement('td');
            telefono.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
            telefono.textContent = proveedor.telefono;

            const email = document.createElement('td');
            email.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
            email.textContent = proveedor.email;

            const empresa = document.createElement('td');
            empresa.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
            empresa.textContent = proveedor.empresa;

            // Create action cell with icons
            const actionsCell = document.createElement('td');

            // edit icon
            const editIcon = document.createElement('i');
            editIcon.classList.add('fas', 'fa-edit', 'text-blue-500', 'cursor-pointer', 'mr-2');
            editIcon.setAttribute('title', 'Editar');
            editIcon.addEventListener('click', () => openEditForm(proveedor));

            // delete icon
            const deleteIcon = document.createElement('i');
            deleteIcon.classList.add('fas', 'fa-trash-alt', 'text-red-500', 'cursor-pointer', 'mr-2');
            deleteIcon.setAttribute('title', 'Eliminar');
            deleteIcon.addEventListener('click', () => deleteProveedor(proveedor.id_proveedor));

            // Add icons to the action cell
            actionsCell.appendChild(editIcon);
            actionsCell.appendChild(deleteIcon);

            // Add cells to row
            row.appendChild(id);
            row.appendChild(cedula);
            row.appendChild(nombre);
            row.appendChild(apellido);
            row.appendChild(telefono);
            row.appendChild(email);
            row.appendChild(empresa);
            row.appendChild(actionsCell);

            // Add row to table
            tableBody.appendChild(row);
        });

    } catch (error) {
        console.error('Error al obtener proveedores:', error);
    }
}

// Proveedor delete function
async function deleteProveedor(proveedorId) {
    const confirmDelete = confirm('¿Estás seguro de que deseas eliminar este proveedor?');
    if (confirmDelete) {
        try {
            const response = await fetch(`http://localhost/BASICOS/businessLogic/swproveedores.php?id=${proveedorId}`, {
                method: 'DELETE'
            });
            getProveedores();
        } catch (error) {
            console.error('Error al eliminar el proveedor:', error);
        }
    }
}

// Open Update form
function openEditForm(proveedor) {
    const newWindow = window.open('../proveedor/updateProveedor.php', '_blank', 'width=600,height=600');

    newWindow.onload = function () {
        newWindow.postMessage(proveedor, '*');
    };

    newWindow.onbeforeunload = function () {
        getProveedores();
    };
}

document.addEventListener('DOMContentLoaded', getProveedores);

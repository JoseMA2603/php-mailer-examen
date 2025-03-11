document.getElementById('contactForm').addEventListener('submit', function (e) {
    const nombre = document.getElementById('nombre').value.trim();
    const telefono = document.getElementById('telefono').value.trim();
    const email = document.getElementById('email').value.trim();
    const asunto = document.getElementById('asunto').value.trim();
    const mensaje = document.getElementById('mensaje').value.trim();

    if (!nombre || !telefono || !email || !asunto || !mensaje) {
        alert('Todos los campos son obligatorios.');
        e.preventDefault();
        return;
    }

    if (!/^[0-9]{9}$/.test(telefono)) {
        alert('El teléfono debe tener exactamente 9 dígitos.');
        e.preventDefault();
        return;
    }

    if (!/\S+@\S+\.\S+/.test(email)) {
        alert('Por favor, ingresa un correo electrónico válido.');
        e.preventDefault();
        return;
    }
});



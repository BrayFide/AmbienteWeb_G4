
let users = [
    { username: "usuario", password: "usuario123", role: "user" },
    { username: "admin", password: "admin123", role: "admin" }
];


function showLoginForm() {
    document.getElementById('login-form').classList.remove('hidden');
    document.getElementById('register-form').classList.add('hidden');
}


function showRegisterForm() {
    document.getElementById('login-form').classList.add('hidden');
    document.getElementById('register-form').classList.remove('hidden');
}


function login(event) {
    event.preventDefault();
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

   
    const user = users.find(u => u.username === username && u.password === password);

    if (user) {
        if (user.role === "admin") {
            document.getElementById('admin-area').classList.remove('hidden');
            alert("Bienvenido al arear administrativa");
        } else {
            document.getElementById('user-area').classList.remove('hidden');
            alert("Bienvenido a  la Asada"+name);
        }
        document.getElementById('login-form').classList.add('hidden');
    } else {
        alert("Su usuario o contraseña incorrectos");
    }
}


function register(event) {
    event.preventDefault();
    const username = document.getElementById('new-username').value;
    const password = document.getElementById('new-password').value;

   
    if (users.find(u => u.username === username)) {
        alert("El usuario ya esat registrado");
    } else {
       
        users.push({ username, password, role: "user" });
        alert("Usuario registrado exitosamente");
        showLoginForm(); 
    }
}


function logout() {
    document.getElementById('user-area').classList.add('hidden');
    document.getElementById('admin-area').classList.add('hidden');
    showLoginForm(); 
}

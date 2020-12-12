function duenio(){
var p= document.getElementById('duenio');
t ="";
t+=" <label for='Nombre dueño'>Nombre dueño</label>";
t+="<input type='text' name='Nombre_duenio' placeholder='Nombre dueño'>";
t+="<label for='Telefono'>Telefono</label>";
t+="<input type='number' name='Telefono' placeholder='Telefono'>";
t+="<label for='Email'>Correo electronico</label>";
t+="<input type='text' name='Email' placeholder='Correo electronico'>";
t+="<label for='Cedula'>Cedula</label>";
t+="<input type='number' name='Cedula' placeholder='Cedula ciudadana'>";

p.innerHTML=t;

}
var online = false;
var id = 0;

function login(id){
	online = true;
	ID = id
}

function logout(){
	online = false;
	id = 0;
}

function profil_verif(){
	if(online==false){
		window.location.href = "http://localhost/Projettest/interlingua/login.html";
	} else {
		window.location.href = "http://localhost/Projettest/interlingua/profil.html";
	}
}

function connec_verif(){
	if(online == false){
		window.location.href = "http://localhost/Projettest/interlingua/login.html";
	} else {
		window.location.href = "http://localhost/Projettest/interlingua/index.html";
	}
}
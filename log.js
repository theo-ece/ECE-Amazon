var online = false;
var id = 0;
var type="";

function login(id, utilisateur){
	online = true;
	type = utilisateur;
	ID = id
	alert('log in');
}

function logout(){
	online = false;
	id = 0;
	type="";
}

function profil_verif(){
	if(online==false){
		window.location.href = "login.html";
	} else {
		window.location.href = "profil.html";
	}
}

function connec_verif(){
	if(online == false){
		window.location.href = "/login.html";
	} else {
		window.location.href = "index.html";
	}
}

function get_type(){ return type;}
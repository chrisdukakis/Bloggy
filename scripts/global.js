window.onload = slideAlert();
function slidedown( id_value ) {
	$(document).ready (
		function() {
			$(id_value).slideDown(400)
		}
	);
}
function slideup( id_value ) {
	$(document).ready(
		function() {
			$(id_value).slideUp(400)
		}
	);
}
function slideAlert() {
	slidedown('#alert_bar');
	setTimeout("slideup('#alert_bar')", 3000);	
}
function slideupheader(){
	slideup('#header');
}
function slidedownheader(){
	slidedown('#header');
}
function open_dialog(id, offset){
	var xmlhttp;
	if (window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
	}
	else{
		xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
	}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			if(document.getElementById('dialog') == null ){
				var dialog = document.createElement('section');
				dialog.setAttribute('id', 'dialog');
				dialog.innerHTML = xmlhttp.responseText;
				var container = document.getElementsByClassName('container');
				document.body.insertBefore(dialog, container);
				$('#dialog').fadeIn(450);
			}
			else{
				document.getElementById('dialog').innerHTML = xmlhttp.responseText;
			}
		}
	}
	xmlhttp.open('GET','load.php?act=edit&id='+id+'&offset='+offset,true);
	xmlhttp.send();
}
function manage( offset ){
	var xmlhttp;
	if (window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
	}
	else{
		xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
	}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
				var dialog = document.getElementById('dialog');
				dialog.style.display="block";
				dialog.innerHTML = xmlhttp.responseText;
				$('#dialog').fadeIn(450);
		}
	}
	xmlhttp.open('GET','load.php?act=manage&offset='+offset,true);
	xmlhttp.send();
}
function create(){
	var xmlhttp;
	if (window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
	}
	else{
		xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
	}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
				var dialog = document.getElementById('dialog');
				dialog.style.display="block";
				dialog.innerHTML = xmlhttp.responseText;
				$('#dialog').fadeIn(450);
		}
	}
	xmlhttp.open('GET','load.php?act=create',true);
	xmlhttp.send();
}
function accept_contact(id){
	var xmlhttp;
	if (window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
	}
	else{
		xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
	}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			$('#'+id).fadeOut(450);
		}
	}
	xmlhttp.open('GET','index.php?mode=ajax_load&id='+id+'&contact_accept=true',true);
	xmlhttp.send();	
}
function deny_contact(id){
	var xmlhttp;
	if (window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
	}
	else{
		xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
	}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			$('#'+id).fadeOut(450);
		}
	}
	xmlhttp.open('GET','index.php?mode=ajax_load&id='+id+'&contact_delete=true',true);
	xmlhttp.send();	
}
function add_contact(u){
	var xmlhttp;
	if (window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
	}
	else{
		xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
	}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			$('#visibility_alert').fadeOut(450);
			setTimeout("$('#request_pending').fadeIn(450)", 450);
			$('#add').fadeOut(450);			
		}
	}
	xmlhttp.open('GET','index.php?mode=ajax_load&u2='+u+'&contact_add=true',true);
	xmlhttp.send();	
}
function add_contact2(u){
	var xmlhttp;
	if (window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
	}
	else{
		xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
	}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			$('#add').fadeOut(450);
		}
	}
	xmlhttp.open('GET','index.php?mode=ajax_load&u2='+u+'&contact_add=true',true);
	xmlhttp.send();	
}
function edit_post( id ) {
	var xmlhttp;
	if (window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
	}
	else{
		xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
	}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			$('#editor').fadeOut(300);
			document.getElementById('editor').style.display='none';
			document.getElementById('dialog').innerHTML = xmlhttp.responseText;
			setTimeout("$('#editor').fadeIn(450)", 300);
		}
	}
	xmlhttp.open('GET','load.php?act=edit&id='+id,true);
	xmlhttp.send();	
}
function delete_post( id ){
	var xmlhttp;
	if (window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
	}
	else{
		xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
	}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			if (document.getElementById('delete_alert') == null){
				document.getElementById('editor').innerHTML = document.getElementById('editor').innerHTML + xmlhttp.responseText;
			}	
		}
	}
	xmlhttp.open('GET','load.php?act=delete&id='+id,true);
	xmlhttp.send();	
}
function close_dialog(){
	$('#dialog').fadeOut(450);
}
function close_delete(){
	$('#delete_alert').fadeOut(450);
	document.getElementById('editor').removeChild(document.getElementById('delete_alert'));
}
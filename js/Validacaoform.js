function comparar_datas(){
	d=document;
	// Verifica se data2 � maior que data1
var data1 = d.form.data_termino.value;
var data2 = d.form.data_inicio.value

if ( parseInt( data2.split( "/" )[2].toString() + data2.split( "/" )[1].toString() + data2.split( "/" )[0].toString() ) >= parseInt( data1.split( "/" )[2].toString() + data1.split( "/" )[1].toString() + data1.split( "/" )[0].toString() ) )
{
  alert( "A data de in�cio � maior que a data de t�rmino!" );
  d.form.data_inicio.value='';
  d.form.data_inicio.focus();
}
}

function criticadataSorteio(){
	d=document;
	// Verifica se data2 � maior que data1
var data1 = d.form.data_inicio.value;
var data2 = d.form.dtsorteio.value

if ( parseInt( data2.split( "/" )[2].toString() + data2.split( "/" )[1].toString() + data2.split( "/" )[0].toString() ) >= parseInt( data1.split( "/" )[2].toString() + data1.split( "/" )[1].toString() + data1.split( "/" )[0].toString() ) )
{
  alert( "A data de sorteio deve ser menor que a data de in�cio do curso!" );
  d.form.dtsorteio.value='';
  d.form.dtsorteio.focus();
}
}

function criticaHora(){
	d=document;
	// Verifica se data2 � maior que data1
var i = d.form.hini.value;
var f = d.form.hfim.value

if(i >= f){
  alert( "O hor�rio de inicial deve ser menor que o hor�rio final!" );
  d.form.hini.value='';
  d.form.hfim.value='';
  d.form.hini.focus();
}
}

function desbloquearcampo(){

document.form.alterar.disabled=true;
document.form.excluir.disabled=true;

document.form.salvar.disabled=false;
document.form.codigo.disabled=false;
document.form.turma.disabled=false;
document.form.cursosid.disabled=false;
document.form.turno.disabled=false;
//document.form.horario.disabled=false;
document.form.data_inicio.disabled=false;
document.form.dtsorteio.disabled=false;

document.form.data_termino.disabled=false;
document.form.vagas_oferecidas.disabled=false;
document.form.status.disabled=false;
document.form.segunda.disabled=false;
document.form.terca.disabled=false;
document.form.qua.disabled=false;
document.form.qui.disabled=false;
document.form.sex.disabled=false;
document.form.sab.disabled=false;
document.form.observacao.disabled=false;

document.form.hini.disabled=false;
document.form.hinif.disabled=false;
document.form.hfim.disabled=false;
document.form.hfimf.disabled=false;

document.form.button.disabled=false;
document.form.button.className='botaoCalendario';

document.form.button2.disabled=false;
document.form.button2.className='botaoCalendario';

document.form.button3.disabled=false;
document.form.button3.className='botaoCalendario';

}



function inibirImpressora(){

window.print();

document.getElementById('ok').value='true';
document.getElementById('form').submit();

}



function validar(formulario){

 for(i=0;i<=formulario.length-1;i++){
	
	if ((formulario[i].value=="")&&(formulario[i].title!="")){
		if ((formulario[i].type!="button")&&(formulario[i].type!="submit")&&(formulario[i].type!="hidden")){
				alert(formulario[i].title);
				formulario[i].focus();
				return false;
			}
		}
	}

	formulario.ok.value='true';
	formulario.submit();
}



function validarDados(formulario){

 for(i=0;i<=formulario.length-1;i++){
	
	if ((formulario[i].value=="")&&(formulario[i].title!="")){
		if ((formulario[i].type!="button")&&(formulario[i].type!="submit")&&(formulario[i].type!="hidden")){
				alert(formulario[i].title);
				formulario[i].focus();
				return false;
			}
		}
	}

	formulario.ok55.value='true';
	formulario.submit();
}

function checkBoxValido(){

 if(document.form.auditiva.value=="" || document.form.mental.value=="" || document.form.visual.value=="" || document.form.motora.value=="" || document.form.transtorno_global.value==""  || document.form.multipla.value==""){//transtorno_global
	alert("Alguma DEFICI�NCIA deve ser escolhida!"); 
	 document.form.auditiva.focus();
 }
	
} 

function validarEsp(formulario){

 for(i=0;i<=formulario.length-1;i++){
	
	if ((formulario[i].value=="")&&(formulario[i].title!="")){
		checkBoxValido();
		if ((formulario[i].type!="button")&&(formulario[i].type!="submit")&&(formulario[i].type!="hidden")){
				alert(formulario[i].title);
				formulario[i].focus();
				return false;
			}
		}
	}

	formulario.ok.value='true';
	formulario.submit();
}

function Mascaras_Format(objForm, strField, sMask, evtKeyPress) { 
      var i, nCount, sValue, fldLen, mskLen,bolMask, sCod, nTecla; 

	if(navigator.appName=="Microsoft Internet Explorer") { // Internet Explorer 
		nTecla = evtKeyPress.keyCode; 
	}else if(navigator.appName=="Netscape") { // Nestcape 
		nTecla = evtKeyPress.which; 
	} 
	sValue = objForm[strField].value; 
	// Limpa todos os caracteres de formata��o que 
	// j� estiverem no campo. 
//		alert("Caracter " + sValue + " ASC " + nTecla);
      sValue = sValue.toString().replace( "-", "" ); 
      sValue = sValue.toString().replace( "-", "" ); 
      sValue = sValue.toString().replace( ".", "" ); 
      sValue = sValue.toString().replace( ".", "" ); 
      sValue = sValue.toString().replace( "/", "" ); 
      sValue = sValue.toString().replace( "/", "" ); 
	   sValue = sValue.toString().replace( ":", "" ); 
      sValue = sValue.toString().replace( ":", "" ); 
      sValue = sValue.toString().replace( "(", "" ); 
      sValue = sValue.toString().replace( "(", "" ); 
      sValue = sValue.toString().replace( ")", "" ); 
      sValue = sValue.toString().replace( ")", "" ); 
      sValue = sValue.toString().replace( " ", "" ); 
      sValue = sValue.toString().replace( " ", "" ); 
      fldLen = sValue.length; 
      mskLen = sMask.length; 

      i = 0; 
      nCount = 0; 
      sCod = ""; 
      mskLen = fldLen; 

	        i = 0; 
      nCount = 0; 
      sCod = ""; 
      mskLen = fldLen; 

      while (i <= mskLen) { 
        bolMask = ((sMask.charAt(i) == "-") || (sMask.charAt(i) == ".") || (sMask.charAt(i) == "/") || (sMask.charAt(i) == ":")) 
        bolMask = bolMask || ((sMask.charAt(i) == "(") || (sMask.charAt(i) == ")") || (sMask.charAt(i) == " ")) 

        if (bolMask) { 
          sCod += sMask.charAt(i); 
          mskLen++; } 
        else { 
          sCod += sValue.charAt(nCount); 
          nCount++; 
        } 

        i++; 
      } 

      objForm[strField].value = sCod; 

      if (nTecla != 8) { // backspace 
        if (sMask.charAt(i-1) == "9") { // apenas n�meros... 
          return ((nTecla > 47) && (nTecla < 58)); } // n�meros de 0 a 9 
        else { // qualquer caracter... 
          return true; 
        } } 
      else { 
        return true; 
      } 
    } 


function limpar(formulario){
	
	for(i=0;i<=formulario.length-1;i++){
		
		if ((formulario[i].type!="button")&&(formulario[i].type!="submit")){
			formulario[i].value='';
			
		}
	}
	
}


function Campo_numero(evtKeyPress){
	if(navigator.appName=="Microsoft Internet Explorer") { // Internet Explorer 
		nTecla = evtKeyPress.keyCode; 
	}else if(navigator.appName=="Netscape") { // Nestcape 
		nTecla = evtKeyPress.which; 
	} 
	
	
	if (nTecla != 8) { // backspace 
         
          return ((nTecla > 47) && (nTecla < 58));  // n�meros de 0 a 9 
   }else{ 
      return true; 
   } 
}
	
function valida_data1(campo, pFmt)
{
	var reDate1 = /^\d{1,2}\/\d{1,2}\/\d{1,4}$/;
	var reDate2 = /^[0-3]?\d\/[01]?\d\/(\d{2}|\d{4})$/;
	var reDate3 = /^(0?[1-9]|[12]\d|3[01])\/(0?[1-9]|1[0-2])\/(19|20)?\d{2}$/;	
	var reDate4 = /^((0?[1-9]|[12]\d)\/(0?[1-9]|1[0-2])|30\/(0?[13-9]|1[0-2])|31\/(0?[13578]|1[02]))\/(19|20)?\d{2}$/;
	var reDate5 = /^((0[1-9]|[12]\d)\/(0[1-9]|1[0-2])|30\/(0[13-9]|1[0-2])|31\/(0[13578]|1[02]))\/\d{4}$/;//(dd/mm/yyyy)
	var reDate = reDate4;

	eval("reDate = reDate" + pFmt);
	if (campo.value!=""){
		if (reDate.test(campo.value)) {
			//alert(pStr + " � uma data v�lida.");
			return true;
		} else if (campo.value != null && campo.value != "") {
			alert(campo.value + " data inexistente.");
			campo.value="";
			campo.focus();
			return false;
		}
	}
} // doDate

function valida_Email(campo, pFmt){

	var reEmail1 = /^[\w!#$%&'*+\/=?^`{|}~-]+(\.[\w!#$%&'*+\/=?^`{|}~-]+)*@(([\w-]+\.)+[A-Za-z]{2,6}|\[\d{1,3}(\.\d{1,3}){3}\])$/;
	var reEmail2 = /^[\w-]+(\.[\w-]+)*@(([\w-]{2,63}\.)+[A-Za-z]{2,6}|\[\d{1,3}(\.\d{1,3}){3}\])$/;
	var reEmail3 = /^[\w-]+(\.[\w-]+)*@(([A-Za-z\d][A-Za-z\d-]{0,61}[A-Za-z\d]\.)+[A-Za-z]{2,6}|\[\d{1,3}(\.\d{1,3}){3}\])$/;
	var reEmail = reEmail3;
	
	eval("reEmail = reEmail" + pFmt);
	if (campo.value!=""){
		if (reEmail.test(campo.value)) {
			//alert(campo.value + " � um endere�o de e-mail v�lido.");
		} else if (campo.value != null && campo.value != "") {
			alert(campo.value + " N�O � um endere�o de e-mail v�lido.");
			campo.value="";
			campo.focus();
		}
	}
}

function pesquisa(pagina,valor)
{
//Fun��o que monta a URL e chama a fun��o AJAX
url=pagina+valor;
campo='estadual'
ajax(url,campo);
}
//valida telefone
function ValidaTelefone(tel, tipo){
	
	if (tipo==1){
    exp = /\(\d{2}\)\ \d{4}\-\d{4}/
    if(!exp.test(tel.value)){
        alert('Numero de Telefone Invalido!');
		document.form.telefone.focus();
	}
	}
}
//valida cep
function ValidaCep(cep){
    exp = /\d{2}\.\d{3}\-\d{3}/
    if(!exp.test(cep.value)){
        alert('Numero de Cep Invalido!'); 
		document.form.cep.focus();
		return false;
	}
}
function TestaCPF(strCPF) {
    var Soma;
    var Resto;
    Soma = 0;
	if (strCPF == "00000000000") return alert("CPF invalido");
    
	for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
	Resto = (Soma * 10) % 11;
	
    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(strCPF.substring(9, 10)) ) alert("CPF invalido");
	
	Soma = 0;
    for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
    Resto = (Soma * 10) % 11;
	
    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(strCPF.substring(10, 11) ) ) alert("CPF invalido");
    //return true;
}
function validar2(formulario){

	for(i=0;i<=formulario.length-1;i++){
		if ((formulario[i].value=="")&&(formulario[i].title!="")){
			if ((formulario[i].type!="button")&&(formulario[i].type!="submit")&&(formulario[i].type!="hidden")){
				alert(formulario[i].title);
				formulario[i].focus();
				return false;
			}
		}
	}

	formulario.acao.value='true';
	formulario.submit();
}

function validarOk(formulario){

 for(i=0;i<=formulario.length-1;i++){
	
	if ((formulario[i].value=="")&&(formulario[i].title!="")){
		if ((formulario[i].type!="button")&&(formulario[i].type!="submit")&&(formulario[i].type!="hidden")){
				alert(formulario[i].title);
				formulario[i].focus();
				return false;
			}
		}
	}

	formulario.ok2.value='true';
	formulario.submit();
}

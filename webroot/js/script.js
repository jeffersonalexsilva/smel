var ids_data;
//var base_site = '/integrasis/'; //PROD
var base_site = '/'; //DEV
$(document).ready(function(){
	
	$('#form-cadastro button.cadastrar-participante').on('click',function(e){
		cadastra_participante();
		e.preventDefault();
	});
	
	$('#form-login button#bt_login').on('click',function(e){
		login();
		e.preventDefault();
	});
	$('#form-login a#bt_loginface').on('click',function(e){
		loginFacebook();
		e.preventDefault();
	});
	
	$('#form-lose button.recupera_senha').on('click',function(e){
		recuperaSenha()
		e.preventDefault();
	});
	
	$('button#bt_inscreve').on('click',function(e){
		inscreve();
		e.preventDefault();
	});
	
	// $('#form-minhas-oficinas button#bt_remove').on('click',function(e){	
	$('#lista-oficinas-usuario a.bt_desiste_oficina').on('click',function(e){
		retira_inscricao($(this).data('oficina'));
		e.preventDefault();
	});
	
	$('#form-gera-senha button#bt_atualiza_senha').on('click',function(e){
		altera_senha();
		e.preventDefault();
	});
	
	$('#cad-oficinas button#bt_cad_oficina').on('click',function(e){
		cadastra_oficina();
		e.preventDefault();
	});
	
	$('#form-envia-oficina button#bt_submissao_atividade').on('click',function(e){
		submissao_oficina();
		e.preventDefault();
	});
	
	$('#form-dados-usuario button.atualizar').on('click',function(e){
		atualiza_cadastro();
		e.preventDefault();
	});
	
	$('#form-dados-usuario a#bt_vinculaface').on('click',function(e){
		vinculaFace();
		e.preventDefault();
	});
	
	$('#form-dados-usuario div.password').on('click',function(e){
		$('#form-dados-usuario input#password-usuario').prop("disabled",false);
		$('#form-dados-usuario input#password-usuario').attr("value",'');
	});
	
	$('#form-lista-inscritos button#bt_lista').on('click',function(e){
		lista_inscritos();
		e.preventDefault();
	});
	
	$('a.close-survey').on('click',function(e){
		$('#popup-survey').css("display","none");
	});
	
	$('a#bt_oficina').on('click',function(e){
		$.get("inscricoes/listagem", function( data ) {
		  $("#lista-oficinas").html( data );
		});
	});
	
	
	$("#form-oficinas ul li input[type=checkbox]").on('change',function(){
		var arr = [];//variavel para ver a quantidade de seleções
		$("#form-oficinas input[type='checkbox'].ck:checked").each(function () {
			arr.push($(this).data('horario'));//busca os horários das selecionadas
		});
		if(arr.length > 0){//se a seleção deixar um número maior que 0
			if(!$("footer.popup-inscreve").hasClass("active")){
				$("footer.popup-inscreve").addClass("active");
			}
		}else{
			$("footer.popup-inscreve").removeClass("active");
		}
	});
	
	$("#lista-dia ul.lopt li a").on('click',function(e){
		$("#lista-dia ul.lopt li a").removeClass('active');
		$(this).addClass('active');
		// $(this).attr("href").split("#");
		$("#lista-dia .painel-listas ul.oficinas").removeClass('active');
		$("#lista-dia .painel-listas ul#" +$(this).attr("href").split("#")[1]).addClass('active');
		e.preventDefault();
	});
	
	$("#lista-oficinas-usuario ul.lopt li a").on('click',function(e){
		$("#lista-oficinas-usuario ul.lopt li a").removeClass('active');
		$(this).addClass('active');
		// $(this).attr("href").split("#");
		$("#lista-oficinas-usuario .painel-listas ul.oficinas").removeClass('active');
		$("#lista-oficinas-usuario .painel-listas ul#" +$(this).attr("href").split("#")[1]).addClass('active');
		e.preventDefault();
	});
	
	$("a#bt_minhas_atividades,a#minhas_atividades").on('click',function(e){
		$("section#lista-dia").fadeOut('fast');
		$("section#lista-oficinas-usuario").fadeIn('fast');
		e.preventDefault();
	});
	
	$("#menu-usuario a#lista-atividades").on('click',function(e){
		$("section#lista-oficinas-usuario").fadeOut('fast');
		$("section#lista-dia").fadeIn('fast');
		e.preventDefault();
	});
	
	$(".messages > .content-msg").on('click',function(e){
		$(this).html("");
	});
	
	/*$("a#share-image").on('click',function(e){
		var imgURL = 'http://integracaa.com.br'+$('img#img-logo').attr('src');
		FB.getLoginStatus(function(response) {
		if (response.status === 'connected') {
			var accessToken = response.authResponse.accessToken;
			
			FB.api('/photos', 'post', {
            message: 'Avatar do VI Integra CAA... que massa #seintegra #caa #ufpe #caruaru #semanaintegra',
            access_token: accessToken, 
            url: imgURL
        }, function (response) {

            if (!response || response.error) {
                alert('Aconteceu um erro:' + response);
				console.log(response);
			} else {
				alert('Opa... foi, dá uma olhada no Facebook');
			}
		});
		} 
		});
        
	});*/
	
	$("#bt_edita_atividade").on("click",function(e){
		edita_oficina();
		e.preventDefault();
	});
	$("#bt_cadastra_hora").on("click",function(e){
		add_datahora();
		e.preventDefault();
	});
	
	$("a.exclui_submissao").on("click",function(e){
		if(confirm('Deseja realmente excluir essa atividade?')){
			$("div#loader").addClass('active');
			var url = $(this).attr('href');
			var idoficina = url.substr(url.lastIndexOf('/') + 1);
			$.ajax({
		        url: $(this).attr('href'),
		        type:'get',
		        success:function(data){
		        	$("div.messages .content-msg").html(function(){
						$("div#loader").removeClass('active');
						retorno = data.split("#");
						$("div.messages .content-msg").removeClass('error');
						$("div.messages .content-msg").removeClass('success');
						$("div.messages .content-msg").addClass(retorno[0]);
						$('ul.sub-list li#item-curso-'+idoficina).remove();
						return data.replace(/error#|success#/gi,"<br />")
					});
		        }
		    });
		}
		e.preventDefault();
	});
	
	$('#bt_subscrever').on('click',function(e){
		autoinscricao_monitor();
		e.preventDefault();
	});
	
	$('#bt_indica_monitor').on('click',function(e){
		indica_monitor();
		e.preventDefault();
	});
	$('#form-envia-oficina #bt_busca_usuario').on('click',function(e){
		busca_instrutor();
		e.preventDefault();		
	});
	
});


//Efetua o cadastro do participante no evento
function cadastra_participante(){
	$("div#loader").addClass('active');
    var post = $('#form-cadastro').serialize();
    $.post(base_site +"usuarios/cadastra",post, function(data){
       $("div.messages .content-msg").html(function(){
        	$("div#loader").removeClass('active');
        	retorno = data.split("#");
        	$("div.messages .content-msg").removeClass('error');
        	$("div.messages .content-msg").removeClass('success');
        	$("div.messages .content-msg").addClass(retorno[0]);
        	return data.replace(/error#|success#/gi,"<br />")
        });
    });
}

function loginFacebook(_cad) {
  FB.getLoginStatus(function(response) {
	  if (response.status == 'connected'){
			facebookAPI(_cad);
	  }else{
		  FB.login(function(response) {
			facebookAPI(_cad);
		}, {scope: 'public_profile,email, user_location,user_birthday,user_education_history,publish_actions,user_photos,user_hometown',
			auth_type: 'rerequest'});
	  }
	});
}

function facebookAPI(_cadastro){
	FB.api('/me',{fields:'name,first_name,last_name,email,birthday,gender,hometown,picture.width(500)'}, function(res) {
		// var data = "idfacebook="+res.id+"&email="+res.email;
		if(_cadastro != null){//casp não seja nulo, segue com o preenchimento para cadastro
			/*$('figure#user-picture img').attr('src',res.picture.data.url);
			$('#url_image').val(res.picture.data.url);
			$('#primeiro-nome').val(res.first_name);
			$('#sobrenome').val(res.last_name);
			$('#idfacebook').val(res.id);
			$('#email').val(res.email);
			if(res.gender == 'male'){//seleciona o gênero
				$('#rd-sexo-m').prop('checked',true);
			}else{
				$('#rd-sexo-f').prop('checked',true);
			}
			d = new Date(res.birthday);
			$('#nascimento').val(d.getDate() + '/' + (d.getMonth()+1) +'/'+d.getFullYear());
			$('#nascimento').prop('disabled',true);
			$('#nascimento-time').val(d.getTime());
			$('#telefone').focus();*/
			$('#loader').removeClass('active');
		}else{
			// console.log(res);
			login(res.id);
		}
	})
}
//Faz o login, massa!
function login(_data){
	$("div#loader").addClass('active');
	var post;
	if(_data){
		post = _data;
	}else{
		post = $('#form-login').serialize();
	}
	$.post(base_site +"usuarios/entrar",post, function(data){
        $("div.messages .content-msg").html(function(){
        	$("div#loader").removeClass('active');
        	retorno = data.split("#");
        	$("div.messages .content-msg").removeClass('error');
        	$("div.messages .content-msg").removeClass('success');
        	$("div.messages .content-msg").addClass(retorno[0]);
        	return data.replace(/error#|success#/gi,"<br />")
        });
    });
}

//Recupera a senha do indivíduo
function recuperaSenha(){
	$("div#loader").addClass('active');
    var post = $('#form-lose').serialize();
    $.post(base_site +"usuarios/recupera-senha",post, function(data){
        $("div.messages.lose .content-msg").html(function(){
        	$("div#loader").removeClass('active');
        	retorno = data.split("#");
        	$("div.messages .content-msg").removeClass('error');
        	$("div.messages .content-msg").removeClass('success');
        	$("div.messages .content-msg").addClass(retorno[0]);
        	return data.replace(/error#|success#/gi,"<br />")
        });
    });
}

function altera_senha(){
	$("div#loader").addClass('active');
    var post = $('#form-gera-senha').serialize();
    $.post(base_site +"usuarios/novasenha",post, function(data){
        $("div.messages .content-msg").html(function(){
        	$("div#loader").removeClass('active');
        	retorno = data.split("#");
        	$("div.messages .content-msg").removeClass('error');
        	$("div.messages .content-msg").removeClass('success');
        	$("div.messages .content-msg").addClass(retorno[0]);
        	return data.replace(/error#|success#/gi,"<br />")
        });
    });
}

//Faz a inscrição
function inscreve(){
	$("div#loader").addClass('active');
	//verifica se o usuário selecionou atividades que chequem horário
	var arr = [];
	$("#form-oficinas input[type=checkbox]:checked").each(function () {
		arr.push($(this).data('horario'));//busca os horários das selecionadas
	});
	if(arr.length > $.unique(arr).length){
		$("div.messages .content-msg").html('Existem atividades que estão chocando horário. Verifique os horários das atividades selecionadas.');
		$("div#loader").removeClass('active');
	}else if($.unique(arr).length > 3){
		$("div.messages .content-msg").html('Você só pode selecionar até 3(três) atividades.');
		$("div#loader").removeClass('active');
	}else{
		var post = $('#form-oficinas').serialize();
		$.post(base_site +"inscricoes/inscreve",post, function(data){
			$("div.messages .content-msg").html(function(){
				$("div#loader").removeClass('active');
				retorno = data.split("#");
	        	$("div.messages .content-msg").removeClass('error');
	        	$("div.messages .content-msg").removeClass('success');
	        	$("div.messages .content-msg").addClass(retorno[0]);
	        	res = data.replace(/error#|success#/gi,"<br />");
	        	alert(res);
	        	return res;
			});
			location.reload();
		});
	}
}

//retira a inscrição do indivíduo
function retira_inscricao(_data){
	$("div#loader").addClass('active');
    // var post = $('#form-minhas-oficinas').serialize();
    var post = "oficina="+ _data;
	// alert(_data);
	$.post(base_site +"inscricoes/desiste-oficina",post, function(data){
        $("div.messages .content-msg").html(function(){
        	$("div#loader").removeClass('active');
        	retorno = data.split("#");
        	$("div.messages .content-msg").removeClass('error');
        	$("div.messages .content-msg").removeClass('success');
        	$("div.messages .content-msg").addClass(retorno[0]);
        	return data.replace(/error#|success#/gi,"<br />")
        });
		location.reload();
    });
}

//Faz a inscrição
function atualiza_cadastro(){
	$("div#loader").addClass('active');
    var post = $('#form-dados-usuario').serialize();
    $.post(base_site +"usuarios/atualizar-dados",post, function(data){
        $("div.messages .content-msg").html(function(){
        	$("div#loader").removeClass('active');
        	retorno = data.split("#");
        	$("div.messages .content-msg").removeClass('error');
        	$("div.messages .content-msg").removeClass('success');
        	$("div.messages .content-msg").addClass(retorno[0]);
        	
        	return data.replace(/error#|success#/gi,"<br />");
        });
    });
}

//lista os inscritos por oficina selecionada
function lista_inscritos(_data = null){
	$("div#loader").addClass('active');
	var post;
	if(_data == null){
		post = $('#form-lista-inscritos').serialize();
	}else{
		post = _data;
	}
    $.post(base_site +"admin/lista-inscritos-turma",post, function(data){
        $("div#cont-lista").html(function(){
        	retorno = data.split("#");
        	$("div.messages .content-msg").removeClass('error');
        	$("div.messages .content-msg").removeClass('success');
        	$("div.messages .content-msg").addClass(retorno[0]);
        	$("div#loader").removeClass('active');
        	return data.replace(/error#|success#/gi,"<br />")
        });
    });
}

//realiza a marcação de presença no inscrito
function presenca_inscrito(){
	$("div#loader").addClass('active');
	// var arr = [];
	// $("#form-frequencia input[type=checkbox]:checked").each(function () {
		// arr.push($(this).val());//busca os horários das selecionadas
	// });
	// alert(arr);
    var post = $('#form-frequencia').serialize();
    $.post(base_site +"admin/marca-presenca",post, function(data){
        $("div.messages .content-msg").html(function(){
        	$("div#loader").removeClass('active');
        	retorno = data.split("#");
        	$("div.messages .content-msg").removeClass('error');
        	$("div.messages .content-msg").removeClass('success');
        	$("div.messages .content-msg").addClass(retorno[0]);
        	return data.replace(/error#|success#/gi,"<br />")
        });
    });
}

function add_inscricao(){
	$("div#loader").addClass('active');
    var post = $('#adiciona-participante').serialize();
    $.post(base_site +"admin/add-participante",post, function(data){
        $("div.messages .content-msg").html(function(){
        	$("div#loader").removeClass('active');
        	retorno = data.split("#");
        	$("div.messages .content-msg").removeClass('error');
        	$("div.messages .content-msg").removeClass('success');
        	$("div.messages .content-msg").addClass(retorno[0]);
        	return data.replace(/error#|success#/gi,"<br />")
        });
    });
}
function add_datahora(){
	$("div#loader").addClass('active');
	var post = $('#form-cadastra-datahora').serialize();
	$.post(base_site +"admin/add-data-hora",post, function(data){
		$("div.messages .content-msg").html(function(){
			$("div#loader").removeClass('active');
			retorno = data.split("#");
			$("div.messages .content-msg").removeClass('error');
			$("div.messages .content-msg").removeClass('success');
			$("div.messages .content-msg").addClass(retorno[0]);
			$('#form-cadastra-datahora').each (function(){
				  this.reset();
			});
			return data.replace(/error#|success#/gi,"<br />")
		});
	});
}

//Adiciona uma oficina ao evento
function cadastra_oficina(){
	$("div#loader").addClass('active');
    var post = $('#cad-oficinas').serialize();
    $.post(base_site +"admin/cad",post, function(data){
        $("div.messages .content-msg").html(function(){
        	$("div#loader").removeClass('active');
        	retorno = data.split("#");
        	$("div.messages .content-msg").removeClass('error');
        	$("div.messages .content-msg").removeClass('success');
        	$("div.messages .content-msg").addClass(retorno[0]);
        	return data.replace(/error#|success#/gi,"<br />")
        });
    });
}

//Edita uma oficina
function edita_oficina(_url){
	$("div#loader").addClass('active');
	var post = $('#form-edita-oficina').serialize();
	$.post(base_site +"admin/edit-atividade",post, function(data){
		$("div.messages .content-msg").html(function(){
			$("div#loader").removeClass('active');
			retorno = data.split("#");
        	$("div.messages .content-msg").removeClass('error');
        	$("div.messages .content-msg").removeClass('success');
        	$("div.messages .content-msg").addClass(retorno[0]);
        	return data.replace(/error#|success#/gi,"<br />")
		});
	});
}

//Submissão de oficina pelo usuário
function submissao_oficina(){
	$("div#loader").addClass('active');
	var post = $('#form-envia-oficina').serialize();
	$.post(base_site +"oficina-cursos/cadastra-atividade",post, function(data){
		$("div.messages.side .content-msg").html(function(){
			$("div#loader").removeClass('active');
			retorno = data.split("#");
        	$("div.messages .content-msg").removeClass('error');
        	$("div.messages .content-msg").removeClass('success');
        	$("div.messages .content-msg").addClass(retorno[0]);
        	data = data.replace(/error#|success#/gi,"<br />")
        	if(retorno[0] == 'success'){        		
        		new Custombox.modal({
      			  content: {
      			    effect: 'blur',
      			    target: '#aviso-sucesso',
      			    width: '60%',
      			  }
      			}).open();
        		$('#form-envia-oficina').each (function(){
  				  this.reset();
        		});
        	}
        	return data;
		});
	});
}
//Busca um usuário para ser instrutor secundário
function busca_instrutor(){
	$("div#loader").addClass('active');
	var post = $('#form-envia-oficina').serialize();
	$.post(base_site +"usuarios/busca-instrutor",post, function(data){
		$("div.messages.side .content-msg").html(function(){
			$("div#loader").removeClass('active');
			retorno = data.split("#");
			$("div.messages .content-msg").removeClass('error');
			$("div.messages .content-msg").removeClass('success');
			$("div.messages .content-msg").addClass(retorno[0]);
			data = data.replace(/error#|success#/gi,"<br />");
//			console.log(retorno);
			if(retorno.length > 2){				
				$('<li><label>'
						+retorno[2]+'</label> | <a href="#" class="remove-instrutor">Excluir</a><input type="hidden" value="'
						+retorno[3]+'" name="instrutor-extra[]"/></li>').appendTo("ul.tab-instrutores")
			}
			return retorno[1];
		});
	});
}

//Se inscreve como monitor do evento
function autoinscricao_monitor(){
	$("div#loader").addClass('active');
	var post = $('#form-autoinscricao-monitor').serialize();
	$.post(base_site +"usuarios/autoinscricao-monitor",post, function(data){
		$("div.messages .content-msg").html(function(){
			$("div#loader").removeClass('active');
			retorno = data.split("#");
			$("div.messages .content-msg").removeClass('error');
			$("div.messages .content-msg").removeClass('success');
			$("div.messages .content-msg").addClass(retorno[0]);
			return data.replace(/error#|success#/gi,"<br />");
		});
	});
}
//INdica um monitor
function indica_monitor(){
	$("div#loader").addClass('active');
	var post = $('#form-indicar-monitor').serialize();
	$.post(base_site +"usuarios/indica-monitor",post, function(data){
		$("div.messages .content-msg").html(function(){
			$("div#loader").removeClass('active');
			retorno = data.split("#");
			$("div.messages .content-msg").removeClass('error');
			$("div.messages .content-msg").removeClass('success');
			$("div.messages .content-msg").addClass(retorno[0]);
			return data.replace(/error#|success#/gi,"<br />");
		});
	});
}

function loginFacebook() {
  FB.getLoginStatus(function(response) {
	  if (response.status === 'connected'){
			FB.api('/me?fields=name,email', function(res) {
			var data = "idfacebook="+res.id+"&email="+res.email;
			login(data);
		  })
	  }else{
		  FB.login(function(response) {
			FB.api('/me?fields=name,email', function(res) {
				// console.log(res);
				// console.log(res.name + " - " +res.email);
				login(data);
			})
		}, {scope: 'public_profile,email, user_location,user_birthday,user_education_history'});
	  }
	});
}

function vinculaFace(){
	FB.getLoginStatus(function(response) {
	  if (response.status === 'connected'){
			FB.api('/me', function(res) {
			var post = "idfacebook="+res.id;
			$("div#loader").addClass('active');
			$.post(base_site +"usuarios/vincula-face",post, function(data){
				$("div.messages .content-msg").html(function(){
					// $("#status").html(data);
					$("div#loader").removeClass('active');
					retorno = data.split("#");
		        	$("div.messages .content-msg").removeClass('error');
		        	$("div.messages .content-msg").removeClass('success');
		        	$("div.messages .content-msg").addClass(retorno[0]);
		        	
		        	return data.replace(/error#|success#/gi,"<br />");
				});
			});
		  })
	  }else{
		  FB.login(function(response) {
			FB.api('/me?fields=name,email', function(res) {
				// console.log(res);
				// console.log(res.name + " - " +res.email);
				login(data);
			})
		}, {scope: 'public_profile,email, user_location,user_birthday,user_education_history'});
	  }
	});
}
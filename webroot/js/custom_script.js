var ids_data;
//var base_site = '/integrasis/'; //PROD
var base_site = '/'; //DEV
jQuery(document).ready(function(){
	
	jQuery('#cpf').mask('00000000000');
	jQuery('.cell').mask('(00) 0 0000-0000');
	jQuery('.phone').mask('(00) 0000-0000');

	/* jQuery('#form-cadastro input').on('keyup',function(e){
		_inputs = jQuery('#form-cadastro').find('input');
		console.log(_inputs);
		_hascontent = true;
		_inputs.each(function(index){
			// console.log(jQuery(this));
			if(jQuery(this).value() != ''){
				_hascontent  = false;
			}
		});
		if(_hascontent){
			jQuery('button[type="submit"]').attr('disabled',false);
		}
		e.preventDefault();
	}); */

	jQuery('#form-cadastro button.cadastrar-participante').on('click',function(e){
		cadastra_participante();
		e.preventDefault();
	});
	
	jQuery('#form-login button#bt_login').on('click',function(e){
		login();
		e.preventDefault();
	});
	jQuery('#form-login a#bt_loginface').on('click',function(e){
		loginFacebook();
		e.preventDefault();
	});
	
	jQuery('#form-lose button.recupera_senha').on('click',function(e){
		recuperaSenha()
		e.preventDefault();
	});
	
	jQuery('button#bt_inscreve').on('click',function(e){
		inscreve();
		e.preventDefault();
	});
	
	// jQuery('#form-minhas-oficinas button#bt_remove').on('click',function(e){	
	jQuery('#lista-oficinas-usuario a.bt_desiste_oficina').on('click',function(e){
		retira_inscricao(jQuery(this).data('oficina'));
		e.preventDefault();
	});
	
	jQuery('#form-gera-senha button#bt_atualiza_senha').on('click',function(e){
		altera_senha();
		e.preventDefault();
	});
	
	jQuery('#cad-oficinas button#bt_cad_oficina').on('click',function(e){
		cadastra_oficina();
		e.preventDefault();
	});
	
	jQuery('#form-envia-oficina button#bt_submissao_atividade').on('click',function(e){
		submissao_oficina();
		e.preventDefault();
	});
	
	jQuery('#form-dados-usuario button.atualizar').on('click',function(e){
		atualiza_cadastro();
		e.preventDefault();
	});
	
	jQuery('#form-dados-usuario a#bt_vinculaface').on('click',function(e){
		vinculaFace();
		e.preventDefault();
	});
	
	jQuery('#form-dados-usuario div.password').on('click',function(e){
		jQuery('#form-dados-usuario input#password-usuario').prop("disabled",false);
		jQuery('#form-dados-usuario input#password-usuario').attr("value",'');
	});
	
	jQuery('#form-lista-inscritos button#bt_lista').on('click',function(e){
		lista_inscritos();
		e.preventDefault();
	});
	
	jQuery('a.close-survey').on('click',function(e){
		jQuery('#popup-survey').css("display","none");
	});
	
	jQuery('a#bt_oficina').on('click',function(e){
		$.get("inscricoes/listagem", function( data ) {
		  jQuery("#lista-oficinas").html( data );
		});
	});
	
	
	jQuery("#form-oficinas ul li input[type=checkbox]").on('change',function(){
		var arr = [];//variavel para ver a quantidade de seleções
		jQuery("#form-oficinas input[type='checkbox'].ck:checked").each(function () {
			arr.push(jQuery(this).data('horario'));//busca os horários das selecionadas
		});
		if(arr.length > 0){//se a seleção deixar um número maior que 0
			if(!jQuery("footer.popup-inscreve").hasClass("active")){
				jQuery("footer.popup-inscreve").addClass("active");
			}
		}else{
			jQuery("footer.popup-inscreve").removeClass("active");
		}
	});
	
	jQuery("#lista-dia ul.lopt li a").on('click',function(e){
		jQuery("#lista-dia ul.lopt li a").removeClass('active');
		jQuery(this).addClass('active');
		// jQuery(this).attr("href").split("#");
		jQuery("#lista-dia .painel-listas ul.oficinas").removeClass('active');
		jQuery("#lista-dia .painel-listas ul#" +jQuery(this).attr("href").split("#")[1]).addClass('active');
		e.preventDefault();
	});
	
	jQuery("#lista-oficinas-usuario ul.lopt li a").on('click',function(e){
		jQuery("#lista-oficinas-usuario ul.lopt li a").removeClass('active');
		jQuery(this).addClass('active');
		// jQuery(this).attr("href").split("#");
		jQuery("#lista-oficinas-usuario .painel-listas ul.oficinas").removeClass('active');
		jQuery("#lista-oficinas-usuario .painel-listas ul#" +jQuery(this).attr("href").split("#")[1]).addClass('active');
		e.preventDefault();
	});
	
	jQuery("a#bt_minhas_atividades,a#minhas_atividades").on('click',function(e){
		jQuery("section#lista-dia").fadeOut('fast');
		jQuery("section#lista-oficinas-usuario").fadeIn('fast');
		e.preventDefault();
	});
	
	jQuery("#menu-usuario a#lista-atividades").on('click',function(e){
		jQuery("section#lista-oficinas-usuario").fadeOut('fast');
		jQuery("section#lista-dia").fadeIn('fast');
		e.preventDefault();
	});
	
	jQuery(".messages > .content-msg").on('click',function(e){
		jQuery(this).html("");
	});
	
	/*jQuery("a#share-image").on('click',function(e){
		var imgURL = 'http://integracaa.com.br'+jQuery('img#img-logo').attr('src');
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
	
	jQuery("#bt_edita_atividade").on("click",function(e){
		edita_oficina();
		e.preventDefault();
	});
	jQuery("#bt_cadastra_hora").on("click",function(e){
		add_datahora();
		e.preventDefault();
	});
	
	jQuery("a.exclui_submissao").on("click",function(e){
		if(confirm('Deseja realmente excluir essa atividade?')){
			jQuery("div#loader").addClass('active');
			var url = jQuery(this).attr('href');
			var idoficina = url.substr(url.lastIndexOf('/') + 1);
			$.ajax({
		        url: jQuery(this).attr('href'),
		        type:'get',
		        success:function(data){
		        	jQuery("div.messages .content-msg").html(function(){
						jQuery("div#loader").removeClass('active');
						retorno = data.split("#");
						jQuery("div.messages .content-msg").removeClass('error');
						jQuery("div.messages .content-msg").removeClass('success');
						jQuery("div.messages .content-msg").addClass(retorno[0]);
						jQuery('ul.sub-list li#item-curso-'+idoficina).remove();
						return data.replace(/error#|success#/gi,"<br />")
					});
		        }
		    });
		}
		e.preventDefault();
	});
	
	jQuery('#bt_subscrever').on('click',function(e){
		autoinscricao_monitor();
		e.preventDefault();
	});
	
	jQuery('#bt_indica_monitor').on('click',function(e){
		indica_monitor();
		e.preventDefault();
	});
	jQuery('#form-envia-oficina #bt_busca_usuario').on('click',function(e){
		busca_instrutor();
		e.preventDefault();		
	});
	
});


//Efetua o cadastro do participante no evento
function cadastra_participante(){
	jQuery("div#loader").addClass('active');
    var post = jQuery('#form-cadastro').serialize();
    $.post(base_site +"usuarios/cadastra",post, function(data){
       jQuery("div.messages .content-msg").html(function(){
        	jQuery("div#loader").removeClass('active');
        	retorno = data.split("#");
        	jQuery("div.messages .content-msg").removeClass('error');
        	jQuery("div.messages .content-msg").removeClass('success');
        	jQuery("div.messages .content-msg").addClass(retorno[0]);
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
			/*jQuery('figure#user-picture img').attr('src',res.picture.data.url);
			jQuery('#url_image').val(res.picture.data.url);
			jQuery('#primeiro-nome').val(res.first_name);
			jQuery('#sobrenome').val(res.last_name);
			jQuery('#idfacebook').val(res.id);
			jQuery('#email').val(res.email);
			if(res.gender == 'male'){//seleciona o gênero
				jQuery('#rd-sexo-m').prop('checked',true);
			}else{
				jQuery('#rd-sexo-f').prop('checked',true);
			}
			d = new Date(res.birthday);
			jQuery('#nascimento').val(d.getDate() + '/' + (d.getMonth()+1) +'/'+d.getFullYear());
			jQuery('#nascimento').prop('disabled',true);
			jQuery('#nascimento-time').val(d.getTime());
			jQuery('#telefone').focus();*/
			jQuery('#loader').removeClass('active');
		}else{
			// console.log(res);
			login(res.id);
		}
	})
}
//Faz o login, massa!
function login(_data){
	jQuery("div#loader").addClass('active');
	var post;
	if(_data){
		post = _data;
	}else{
		post = jQuery('#form-login').serialize();
	}
	$.post(base_site +"usuarios/entrar",post, function(data){
        jQuery("div.messages .content-msg").html(function(){
        	jQuery("div#loader").removeClass('active');
        	retorno = data.split("#");
        	jQuery("div.messages .content-msg").removeClass('error');
        	jQuery("div.messages .content-msg").removeClass('success');
        	jQuery("div.messages .content-msg").addClass(retorno[0]);
        	return data.replace(/error#|success#/gi,"<br />")
        });
    });
}

//Recupera a senha do indivíduo
function recuperaSenha(){
	jQuery("div#loader").addClass('active');
    var post = jQuery('#form-lose').serialize();
    $.post(base_site +"usuarios/recupera-senha",post, function(data){
        jQuery("div.messages.lose .content-msg").html(function(){
        	jQuery("div#loader").removeClass('active');
        	retorno = data.split("#");
        	jQuery("div.messages .content-msg").removeClass('error');
        	jQuery("div.messages .content-msg").removeClass('success');
        	jQuery("div.messages .content-msg").addClass(retorno[0]);
        	return data.replace(/error#|success#/gi,"<br />")
        });
    });
}

function altera_senha(){
	jQuery("div#loader").addClass('active');
    var post = jQuery('#form-gera-senha').serialize();
    $.post(base_site +"usuarios/novasenha",post, function(data){
        jQuery("div.messages .content-msg").html(function(){
        	jQuery("div#loader").removeClass('active');
        	retorno = data.split("#");
        	jQuery("div.messages .content-msg").removeClass('error');
        	jQuery("div.messages .content-msg").removeClass('success');
        	jQuery("div.messages .content-msg").addClass(retorno[0]);
        	return data.replace(/error#|success#/gi,"<br />")
        });
    });
}

//Faz a inscrição
function inscreve(){
	jQuery("div#loader").addClass('active');
	//verifica se o usuário selecionou atividades que chequem horário
	var arr = [];
	jQuery("#form-oficinas input[type=checkbox]:checked").each(function () {
		arr.push(jQuery(this).data('horario'));//busca os horários das selecionadas
	});
	if(arr.length > $.unique(arr).length){
		jQuery("div.messages .content-msg").html('Existem atividades que estão chocando horário. Verifique os horários das atividades selecionadas.');
		jQuery("div#loader").removeClass('active');
	}else if($.unique(arr).length > 3){
		jQuery("div.messages .content-msg").html('Você só pode selecionar até 3(três) atividades.');
		jQuery("div#loader").removeClass('active');
	}else{
		var post = jQuery('#form-oficinas').serialize();
		$.post(base_site +"inscricoes/inscreve",post, function(data){
			jQuery("div.messages .content-msg").html(function(){
				jQuery("div#loader").removeClass('active');
				retorno = data.split("#");
	        	jQuery("div.messages .content-msg").removeClass('error');
	        	jQuery("div.messages .content-msg").removeClass('success');
	        	jQuery("div.messages .content-msg").addClass(retorno[0]);
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
	jQuery("div#loader").addClass('active');
    // var post = jQuery('#form-minhas-oficinas').serialize();
    var post = "oficina="+ _data;
	// alert(_data);
	$.post(base_site +"inscricoes/desiste-oficina",post, function(data){
        jQuery("div.messages .content-msg").html(function(){
        	jQuery("div#loader").removeClass('active');
        	retorno = data.split("#");
        	jQuery("div.messages .content-msg").removeClass('error');
        	jQuery("div.messages .content-msg").removeClass('success');
        	jQuery("div.messages .content-msg").addClass(retorno[0]);
        	return data.replace(/error#|success#/gi,"<br />")
        });
		location.reload();
    });
}

//Faz a inscrição
function atualiza_cadastro(){
	jQuery("div#loader").addClass('active');
    var post = jQuery('#form-dados-usuario').serialize();
    $.post(base_site +"usuarios/atualizar-dados",post, function(data){
        jQuery("div.messages .content-msg").html(function(){
        	jQuery("div#loader").removeClass('active');
        	retorno = data.split("#");
        	jQuery("div.messages .content-msg").removeClass('error');
        	jQuery("div.messages .content-msg").removeClass('success');
        	jQuery("div.messages .content-msg").addClass(retorno[0]);
        	
        	return data.replace(/error#|success#/gi,"<br />");
        });
    });
}

//lista os inscritos por oficina selecionada
function lista_inscritos(_data = null){
	jQuery("div#loader").addClass('active');
	var post;
	if(_data == null){
		post = jQuery('#form-lista-inscritos').serialize();
	}else{
		post = _data;
	}
    $.post(base_site +"admin/lista-inscritos-turma",post, function(data){
        jQuery("div#cont-lista").html(function(){
        	retorno = data.split("#");
        	jQuery("div.messages .content-msg").removeClass('error');
        	jQuery("div.messages .content-msg").removeClass('success');
        	jQuery("div.messages .content-msg").addClass(retorno[0]);
        	jQuery("div#loader").removeClass('active');
        	return data.replace(/error#|success#/gi,"<br />")
        });
    });
}

//realiza a marcação de presença no inscrito
function presenca_inscrito(){
	jQuery("div#loader").addClass('active');
	// var arr = [];
	// jQuery("#form-frequencia input[type=checkbox]:checked").each(function () {
		// arr.push(jQuery(this).val());//busca os horários das selecionadas
	// });
	// alert(arr);
    var post = jQuery('#form-frequencia').serialize();
    $.post(base_site +"admin/marca-presenca",post, function(data){
        jQuery("div.messages .content-msg").html(function(){
        	jQuery("div#loader").removeClass('active');
        	retorno = data.split("#");
        	jQuery("div.messages .content-msg").removeClass('error');
        	jQuery("div.messages .content-msg").removeClass('success');
        	jQuery("div.messages .content-msg").addClass(retorno[0]);
        	return data.replace(/error#|success#/gi,"<br />")
        });
    });
}

function add_inscricao(){
	jQuery("div#loader").addClass('active');
    var post = jQuery('#adiciona-participante').serialize();
    $.post(base_site +"admin/add-participante",post, function(data){
        jQuery("div.messages .content-msg").html(function(){
        	jQuery("div#loader").removeClass('active');
        	retorno = data.split("#");
        	jQuery("div.messages .content-msg").removeClass('error');
        	jQuery("div.messages .content-msg").removeClass('success');
        	jQuery("div.messages .content-msg").addClass(retorno[0]);
        	return data.replace(/error#|success#/gi,"<br />")
        });
    });
}
function add_datahora(){
	jQuery("div#loader").addClass('active');
	var post = jQuery('#form-cadastra-datahora').serialize();
	$.post(base_site +"admin/add-data-hora",post, function(data){
		jQuery("div.messages .content-msg").html(function(){
			jQuery("div#loader").removeClass('active');
			retorno = data.split("#");
			jQuery("div.messages .content-msg").removeClass('error');
			jQuery("div.messages .content-msg").removeClass('success');
			jQuery("div.messages .content-msg").addClass(retorno[0]);
			jQuery('#form-cadastra-datahora').each (function(){
				  this.reset();
			});
			return data.replace(/error#|success#/gi,"<br />")
		});
	});
}

//Adiciona uma oficina ao evento
function cadastra_oficina(){
	jQuery("div#loader").addClass('active');
    var post = jQuery('#cad-oficinas').serialize();
    $.post(base_site +"admin/cad",post, function(data){
        jQuery("div.messages .content-msg").html(function(){
        	jQuery("div#loader").removeClass('active');
        	retorno = data.split("#");
        	jQuery("div.messages .content-msg").removeClass('error');
        	jQuery("div.messages .content-msg").removeClass('success');
        	jQuery("div.messages .content-msg").addClass(retorno[0]);
        	return data.replace(/error#|success#/gi,"<br />")
        });
    });
}

//Edita uma oficina
function edita_oficina(_url){
	jQuery("div#loader").addClass('active');
	var post = jQuery('#form-edita-oficina').serialize();
	$.post(base_site +"admin/edit-atividade",post, function(data){
		jQuery("div.messages .content-msg").html(function(){
			jQuery("div#loader").removeClass('active');
			retorno = data.split("#");
        	jQuery("div.messages .content-msg").removeClass('error');
        	jQuery("div.messages .content-msg").removeClass('success');
        	jQuery("div.messages .content-msg").addClass(retorno[0]);
        	return data.replace(/error#|success#/gi,"<br />")
		});
	});
}

//Submissão de oficina pelo usuário
function submissao_oficina(){
	jQuery("div#loader").addClass('active');
	var post = jQuery('#form-envia-oficina').serialize();
	$.post(base_site +"oficina-cursos/cadastra-atividade",post, function(data){
		jQuery("div.messages.side .content-msg").html(function(){
			jQuery("div#loader").removeClass('active');
			retorno = data.split("#");
        	jQuery("div.messages .content-msg").removeClass('error');
        	jQuery("div.messages .content-msg").removeClass('success');
        	jQuery("div.messages .content-msg").addClass(retorno[0]);
        	data = data.replace(/error#|success#/gi,"<br />")
        	if(retorno[0] == 'success'){        		
        		new Custombox.modal({
      			  content: {
      			    effect: 'blur',
      			    target: '#aviso-sucesso',
      			    width: '60%',
      			  }
      			}).open();
        		jQuery('#form-envia-oficina').each (function(){
  				  this.reset();
        		});
        	}
        	return data;
		});
	});
}
//Busca um usuário para ser instrutor secundário
function busca_instrutor(){
	jQuery("div#loader").addClass('active');
	var post = jQuery('#form-envia-oficina').serialize();
	$.post(base_site +"usuarios/busca-instrutor",post, function(data){
		jQuery("div.messages.side .content-msg").html(function(){
			jQuery("div#loader").removeClass('active');
			retorno = data.split("#");
			jQuery("div.messages .content-msg").removeClass('error');
			jQuery("div.messages .content-msg").removeClass('success');
			jQuery("div.messages .content-msg").addClass(retorno[0]);
			data = data.replace(/error#|success#/gi,"<br />");
//			console.log(retorno);
			if(retorno.length > 2){				
				jQuery('<li><label>'
						+retorno[2]+'</label> | <a href="#" class="remove-instrutor">Excluir</a><input type="hidden" value="'
						+retorno[3]+'" name="instrutor-extra[]"/></li>').appendTo("ul.tab-instrutores")
			}
			return retorno[1];
		});
	});
}

//Se inscreve como monitor do evento
function autoinscricao_monitor(){
	jQuery("div#loader").addClass('active');
	var post = jQuery('#form-autoinscricao-monitor').serialize();
	$.post(base_site +"usuarios/autoinscricao-monitor",post, function(data){
		jQuery("div.messages .content-msg").html(function(){
			jQuery("div#loader").removeClass('active');
			retorno = data.split("#");
			jQuery("div.messages .content-msg").removeClass('error');
			jQuery("div.messages .content-msg").removeClass('success');
			jQuery("div.messages .content-msg").addClass(retorno[0]);
			return data.replace(/error#|success#/gi,"<br />");
		});
	});
}
//INdica um monitor
function indica_monitor(){
	jQuery("div#loader").addClass('active');
	var post = jQuery('#form-indicar-monitor').serialize();
	$.post(base_site +"usuarios/indica-monitor",post, function(data){
		jQuery("div.messages .content-msg").html(function(){
			jQuery("div#loader").removeClass('active');
			retorno = data.split("#");
			jQuery("div.messages .content-msg").removeClass('error');
			jQuery("div.messages .content-msg").removeClass('success');
			jQuery("div.messages .content-msg").addClass(retorno[0]);
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
			jQuery("div#loader").addClass('active');
			$.post(base_site +"usuarios/vincula-face",post, function(data){
				jQuery("div.messages .content-msg").html(function(){
					// jQuery("#status").html(data);
					jQuery("div#loader").removeClass('active');
					retorno = data.split("#");
		        	jQuery("div.messages .content-msg").removeClass('error');
		        	jQuery("div.messages .content-msg").removeClass('success');
		        	jQuery("div.messages .content-msg").addClass(retorno[0]);
		        	
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
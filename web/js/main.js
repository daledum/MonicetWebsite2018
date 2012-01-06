$(document).ready(function(){
  // caso exista o formulário, adicionar código para que passe a abrir num popup
  $('.jqmWindow h2').append('<a href="#" class="jqmClose jqmCloseTop">Fechar</a>');

  if ( $('.sf_admin_filter').get(0) !== undefined ){

    //$('.sf_admin_filter').wrap('<div id="pesquisa" class="jqmWindow" style="display: none;" />');

    //$('.sf_admin_filter h2').append('<a href="#" class="jqmClose jqmCloseTop">Fechar</a>');
    //$('.jqmWindow h2').append('<a href="#" class="jqmClose jqmCloseTop">Fechar</a>');

    if ( $('ul.sf_admin_actions').get(0) !== undefined ){
      $('ul.sf_admin_actions').append('<li class="sf_admin_action_pesquisa"><a href="#" class="pesquisa tooltip" title="Pesquisar no modelo">Pesquisar</a></li>');
    }

    $('#pesquisa').jqm({
      modal: true,
      trigger: 'a.pesquisa',
      overlay: 40
    });

  }
  /*
  // caso exista o formulário, adicionar código para que passe a abrir num popup
  if ( $('.sf_admin_filter').get(0) !== undefined ){
	$('.sf_admin_filter').wrap('<div id="pesquisa" class="jqmWindow" style="display: none;" />');
	
	$('#pesquisa').append('<a href="#" class="jqmClose">Fechar</a>');
	
	if ( $('ul.sf_admin_actions').get(0) !== undefined ){
	  $('ul.sf_admin_actions').append('<li class="sf_admin_action_pesquisa"><a href="#" class="pesquisa tooltip" title="Pesquisar no modelo">Pesquisar</a></li>');
	}
	
	$('#pesquisa').jqm({
	  modal: true,
	  trigger: 'a.pesquisa',
	  overlay: 40
	});
  }*/
  
  $('#creditos').jqm({
    modal: true,
    trigger: 'a.creditos',
    overlay: 40
  });
  $('#contacto').jqm({
    modal: true,
    trigger: 'a.contacto',
    overlay: 40
  });

  /*
   * todos os elementos que tiverem a classe tooltip passam a ter um tooltip com o conteúdo do atributo title
   */
  $('.tooltip').tooltip({
    showURL: false,
    left: 10,
    top: 10,
    opacity: 0,
    delay: 0.2,
    fixPNG: true
  });
});
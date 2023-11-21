// Notificação

  $(document).ready(function(){
  	atualiza();
  });

  function atualiza(){
  	$.get("sql/notifica.php", function(resultado){
  		$('#notificacao').html(resultado);
  	});

      setTimeout('atualiza()', 2000);
  }



  // Notificação Title

    $(document).ready(function(){
    	atualiza_title();
    });

    function atualiza_title(){
    	$.get("sql/notifica_title.php", function(resultado){
    		$('#notificacao_title').html(resultado);
    	});

        setTimeout('atualiza_title()', 2000);
    }

    // Conteúdo das notificações

      $(document).ready(function(){
        atualiza_box();
      });

      function atualiza_box(){
        $.get("sql/box_notifica.php", function(resultado){
          $('#box').html(resultado);
        });

          setTimeout('atualiza_box()', 2000);
      }

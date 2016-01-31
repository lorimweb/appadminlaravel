// Ativar/Desativar registro.
function ativando(element, url, id) {
    var ativo = (element.checked == true ? 1 : 0);
    $.get(url+'/ativo/'+id+'/'+ativo, function(result){
        if(result == 'true'){
            toastr.options.timeOut = 5000;
    		toastr.success(uppercaseFirst(url)+(ativo == 1 ? ' ativado' : ' desativado')+' com sucesso.');
        }else{
            toastr.options.timeOut = 5000;
    		toastr.error('Ocorreu um erro em nossa aplicação, por favor tente novamente.');
        }
    });
    return false;
}

$(".galeria").fancybox({
        maxWidth    : 800,
        maxHeight   : 600,
        fitToView   : false,
        width       : '70%',
        height      : '70%',
        autoSize    : false,
        closeClick  : false,
        openEffect  : 'none',
        closeEffect : 'none'
});

function delfoto(id) {
    $.get('galeria/deletefoto/'+id, function(result){
        if(result == 'true'){
            toastr.options.timeOut = 5000;
            toastr.success('Imagem deletada com sucesso.');
        }else{
            toastr.options.timeOut = 5000;
            toastr.error('Ocorreu um erro em nossa aplicação, por favor tente novamente.');
        }
    });
    return false;
}         

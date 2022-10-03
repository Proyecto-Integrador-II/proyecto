$(document).ready(function(){
    $("#foto").on("change",function(){
    	var uploadFoto = document.getElementById("foto").value;
        var foto       = document.getElementById("foto").files;
        var nav = window.URL || window.webkitURL;
        var contactAlert = document.getElementById('form_alert');
        
            if(uploadFoto !='')
            {
                var type = foto[0].type;
                var name = foto[0].name;
                if(type != 'image/jpeg' && type != 'image/jpg' && type != 'image/png')
                {
                    contactAlert.innerHTML = '<p class="errorArchivo">El archivo no es valido.</p>';                        
                    $("#img").remove();
                    $(".delPhoto").addClass('notBlock');
                    $('#foto').val('');
                    return false;
                }else{  
                        contactAlert.innerHTML='';
                        $("#img").remove();
                        $(".delPhoto").removeClass('notBlock');
                        var objeto_url = nav.createObjectURL(this.files[0]);
                        $(".prevPhoto").append("<img id='img' src="+objeto_url+">");
                        $(".upimg label").remove();
                        
                    }
              }else{
              	alert("No selecciono foto");
                $("#img").remove();
              }              
    });

    $('.delPhoto').click(function(){
    	$('#foto').val('');
    	$(".delPhoto").addClass('notBlock');
    	$("#img").remove();

    });

    $('.del_product').click(function(e){
        e.preventDefault();
        var producto = $(this).attr('product');
        var action = 'infoProducto';

        $.ajax({
            url: '../todos/ajax.php',
            type: 'POST',
            async: true,
            data:{action: action, producto: producto},

            success: function(response) {
                if (response != 'error') {
                    var info = JSON.parse(response);

                    $('.bodyModal').html('<form action="" method="post" name="form_del_product" id="form_del_product" onsubmit="event.preventDefault(); delProduct();">'+
                    '<h1><i class="fas" style="font-size:45pt;"></i><br>Eliminar producto</h1>'+
                    '<p>¿Estas seguro de eliminar este producto?</p>'+
                    '<h2 class="nameProducto">'+info.nombre+'</h2><br>'+
                    '<input type="hidden" name="producto_id" id="producto_id" value="'+info.codproducto+'" required>'+
                    '<input type="hidden" name="action" id="action" value="delProduct" required>'+
                    '<div class="alert alertAddProduct"></div>'+
                    '<a href="#" class="btn_cancel" onclick="coloseModal();"><i class="fa fa-ban"></i>Cerrar</a>'+
                    '<button type="submit" class="btn_ok"><i class="far fa-trash-alt"></i>Eliminar</button>'+
                    '</form>');
                }
            },
            error: function(error) {
                console.log(error);
            }
        });

        $('.modal').fadeIn();
    });
    
    $('.del_user').click(function(e){
        e.preventDefault();
        var usuario = $(this).attr('user');
        var action = 'infoUsuario';

        $.ajax({
            url: '../todos/ajax.php',
            type: 'POST',
            async: true,
            data:{action: action, usuario: usuario},

            success: function(response) {
                if (response != 'error') {
                    var info = JSON.parse(response);

                    $('.bodyModal').html('<form action="" method="post" name="form_del_user" id="form_del_user" onsubmit="event.preventDefault(); delUser();">'+
                    '<h1><i class="fas" style="font-size:45pt;"></i><br>Eliminar usuario</h1>'+
                    '<p>¿Estas seguro de eliminar este usuario?</p>'+
                    '<h2 class="nameUsuario">'+info.nombre+'</h2><br>'+
                    '<input type="hidden" name="usuario_id" id="usuario_id" value="'+info.idusuario+'" required>'+
                    '<input type="hidden" name="action" id="action" value="delUser" required>'+
                    '<div class="alert alertAddProduct"></div>'+
                    '<a href="#" class="btn_cancel" onclick="coloseModal();"><i class="fa fa-ban"></i>Cerrar</a>'+
                    '<button type="submit" class="btn_ok"><i class="far fa-trash-alt"></i>Eliminar</button>'+
                    '</form>');
                }
            },
            error: function(error) {
                console.log(error);
            }
        });

        $('.modal').fadeIn();
    });

    $('#search_proveedor').change(function(e){
        e.preventDefault();

        var sistema = getUrl();
        location.href = sistema+'buscar_productos.php?proveedor='+$(this).val();
    })
    
});

function getUrl() {
    var loc = window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
    return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
}

function delProduct(){
    var pr = $('#producto_id').val();
    $('.alertAddProduct').html('');

    $.ajax({
        url: '../todos/ajax.php',
        type: 'POST',
        async: true,
        data: $('#form_del_product').serialize(),

        success: function (response) {
            console.log(response);
            
            if (response == 'error') 
            {
                $('.alertAddProduct').html('<p style="color: red;">Error al borrar el product</p>');
            }else{
                $('.row'+pr).remove();
                $('#form_del_product .btn_ok').remove();
                $('.alertAddProduct').html('<p>Producto eliminado correctamente</p>');
            }
            
        },

        error: function(error){
            console.log(error);
        
        }
    });
}

function delUser(){
    var pr = $('#usuario_id').val();
    $('.alertAddProduct').html('');

    $.ajax({
        url: '../todos/ajax.php',
        type: 'POST',
        async: true,
        data: $('#form_del_user').serialize(),

        success: function (response) {
            console.log(response);
            
            if (response == 'error') 
            {
                $('.alertAddProduct').html('<p style="color: red;">Error al borrar el usuario</p>');
            }else{
                $('.row'+pr).remove();
                $('#form_del_user .btn_ok').remove();
                $('.alertAddProduct').html('<p>Usuario eliminado correctamente</p>');
            }
            
        },

        error: function(error){
            console.log(error);
        
        }
    });
}

function coloseModal(){
    $('.modal').fadeOut();
}
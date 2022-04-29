const inputs = document.querySelectorAll('#formhorizontal input');

function showElementsEstado(idOption, idDiv1){
    if(document.getElementById(idOption).value == 'Unido' || document.getElementById(idOption).value == 'Casado'){
        document.getElementById(idDiv1).style.display = 'block';
        // document.getElementById(idDiv2).style.display = 'block';
    }
    else{
        document.getElementById(idDiv1).style.display = 'none';
        // document.getElementById(idDiv2).style.display = 'none';
    }
}

function showElementsMigratorio(idOption, idDiv){
    if(document.getElementById(idOption).value == 0){
        document.getElementById(idDiv).style.display = 'block';
    }
    else{
        document.getElementById(idDiv).style.display = 'none';
    }
}

function personasCheck(idCheck,idDiv){
    if(document.getElementById(idCheck).value==0){
        document.getElementById(idDiv).style.display = 'block';
    }else{
        document.getElementById(idDiv).style.display = 'none';
    }
}

function Check(idCheck,idDiv){
    if(document.getElementById(idCheck).checked){
        document.getElementById(idDiv).classList.remove('display__none');
    }else{
        document.getElementById(idDiv).classList.add('display__none');
    }
}

function Check2(idCheck,idDiv){
    if(document.getElementById(idCheck).value == 0){
        document.getElementById(idDiv).classList.remove('display__none');
    }else{
        document.getElementById(idDiv).classList.add('display__none');
    }
}

function showElements(idOption, idDiv){
    if(document.getElementById(idOption).value == 0){
        document.getElementById(idDiv).style.display = 'block';
    }
    else{
        document.getElementById(idDiv).style.display = 'none';
    }
}

function agregarNuevoHijo(){
    let contenedor = document.getElementById('contenedor__hijo');

    

    var contador = document.getElementById('txtHijo__Cantidad').value;
    let clonado = document.querySelector('.clonar');
    clonado.classList.remove('display__none');
    
    document.getElementById('titulo__hijos').innerHTML="Ingrese los datos de su Hijo (a)";
    for(var i=1; i<contador;i++){
        console.log(i);

        let clon = clonado.cloneNode(true);
        

        
        contenedor.appendChild(clon);
        document.getElementById('titulo__hijos').innerText="Ingrese los datos de su Hijo (a)";
        
        document.getElementById('txtHijo__Cantidad').setAttribute("readonly", "");
    }


    document.getElementById('btnadd').classList.add('display__none');
    
}






$(function(){
    $('#select__provincia').on('change',onSelectProvinciaChange);
});

function onSelectProvinciaChange (){
    var provincia_id = $(this).val();

    if (provincia_id == 0){
        $('#select__distrito').html('<option value="" >Seleccione Distrito</option>');
        $('#select__corregimiento').html('<option value="" >Seleccione Corregimiento</option>');
        return;
    }

    $.get('/form/'+provincia_id+'', function(distrito){
        var html_distrito;
        html_distrito = '<option value="" >Seleccione Distrito</option>' ;
        $('#select__corregimiento').html('<option value="" >Seleccione Corregimiento</option>');
        for (var i=0; i<distrito.length; i++)
        html_distrito += '<option value="'+distrito[i].id+'" >'+distrito[i].nombre+'</option>';
        $('#select__distrito').html(html_distrito);
    });
}





$(function(){
    $('#select__distrito').on('change',onSelectDistritoChange);
});


function onSelectDistritoChange (){
    var distrito_id = $(this).val();
    console.log(distrito_id);

    if (distrito_id == 0){
        $('#select__corregimiento').html('<option value="" >Seleccione Corregimiento</option>');
        return;
    }

    $.get('/formu/'+distrito_id+'', function(corregimiento){
        var html_corregimiento;
        
        for (var i=0; i<corregimiento.length; i++)
        html_corregimiento += '<option value="'+corregimiento[i].id+'" >'+corregimiento[i].nombre+'</option>';
        $('#select__corregimiento').html(html_corregimiento);
    });
}
            
var j = /^([\da-z_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;





function valFormulario(grupo__id,input__text){
    var grupo = grupo__id;
    
    switch(input__text){
        case "txtPrincipal__Pasaporte":
            $.get('/for/'+document.getElementById(input__text).value+'',function(noPasaporte){
                // console.log(noPasaporte);
                // var id =  e.target.name;
                if(noPasaporte == 0){
                    document.getElementById(`${grupo}`).classList.remove('formulario__group-incorrecto');
                    document.getElementById(`${grupo}`).classList.add('formulario__group-correcto');
                    document.querySelector(`#${grupo} i`).classList.remove('fa-times-circle');
                    document.querySelector(`#${grupo} i`).classList.add('fa-check-circle');
                    document.querySelector(`#${grupo} input`).classList.remove('formulario__incorrecto');
                }else{
                    document.getElementById(`${grupo}`).classList.remove('formulario__group-correcto');
                    document.getElementById(`${grupo}`).classList.add('formulario__group-incorrecto');
                    document.querySelector(`#${grupo} i`).classList.remove('fa-check-circle');
                    document.querySelector(`#${grupo} i`).classList.add('fa-times-circle');
                    document.querySelector(`#${grupo} input`).classList.add('formulario__incorrecto');
                }
            });
            break;
        case "txtPrincipal__PasaporteHijo":
                $.get('/hijo/'+document.getElementById(input__text).value+'',function(noPasaporteH){
                    // console.log("hhh");
                    // var id =  e.target.name;
                    if(noPasaporteH == 0){
                        document.getElementById(`${grupo}`).classList.remove('formulario__group-incorrecto');
                        document.getElementById(`${grupo}`).classList.add('formulario__group-correcto');
                        document.querySelector(`#${grupo} i`).classList.remove('fa-times-circle');
                        document.querySelector(`#${grupo} i`).classList.add('fa-check-circle');
                        document.querySelector(`#${grupo} input`).classList.remove('formulario__incorrecto');
                    }else{
                        document.getElementById(`${grupo}`).classList.remove('formulario__group-correcto');
                        document.getElementById(`${grupo}`).classList.add('formulario__group-incorrecto');
                        document.querySelector(`#${grupo} i`).classList.remove('fa-check-circle');
                        document.querySelector(`#${grupo} i`).classList.add('fa-times-circle');
                        document.querySelector(`#${grupo} input`).classList.add('formulario__incorrecto');
                    }
                });
                break;
        case "txtPrincipal__Email":
            if(document.getElementById(input__text).value.length == 0 ||!expr.test(document.getElementById(input__text).value) ){
                document.getElementById(`${grupo}`).classList.remove('formulario__group-correcto');
                document.getElementById(`${grupo}`).classList.add('formulario__group-incorrecto');
                document.querySelector(`#${grupo} i`).classList.remove('fa-check-circle');
                document.querySelector(`#${grupo} i`).classList.add('fa-times-circle');
                document.querySelector(`#${grupo} input`).classList.add('formulario__incorrecto');
            }else{
                document.getElementById(`${grupo}`).classList.remove('formulario__group-incorrecto');
                document.getElementById(`${grupo}`).classList.add('formulario__group-correcto');
                document.querySelector(`#${grupo} i`).classList.remove('fa-times-circle');
                document.querySelector(`#${grupo} i`).classList.add('fa-check-circle');
                document.querySelector(`#${grupo} input`).classList.remove('formulario__incorrecto');
            }
            
            break;
        case "txtPrincipal__Ingreso":
            if(document.getElementById(input__text).value.length != 0 ){

                document.getElementById(`${grupo}`).classList.remove('formulario__group-incorrecto');
                document.getElementById(`${grupo}`).classList.add('formulario__group-correcto');
                // document.querySelector(`#${grupo} i`).classList.remove('fa-times-circle');
                // document.querySelector(`#${grupo} i`).classList.add('fa-check-circle');
                document.querySelector(`#${grupo} input`).classList.remove('formulario__incorrecto');
            }else{
                document.getElementById(`${grupo}`).classList.remove('formulario__group-correcto');
                document.getElementById(`${grupo}`).classList.add('formulario__group-incorrecto');
                // document.querySelector(`#${grupo} i`).classList.remove('fa-check-circle');
                // document.querySelector(`#${grupo} i`).classList.add('fa-times-circle');
                document.querySelector(`#${grupo} input`).classList.add('formulario__incorrecto');
        
            }
            break;
        default:
            if(document.getElementById(input__text).value.length != 0 ){

                document.getElementById(`${grupo}`).classList.remove('formulario__group-incorrecto');
                document.getElementById(`${grupo}`).classList.add('formulario__group-correcto');
                document.querySelector(`#${grupo} i`).classList.remove('fa-times-circle');
                document.querySelector(`#${grupo} i`).classList.add('fa-check-circle');
                document.querySelector(`#${grupo} input`).classList.remove('formulario__incorrecto');
            }else{
                document.getElementById(`${grupo}`).classList.remove('formulario__group-correcto');
                document.getElementById(`${grupo}`).classList.add('formulario__group-incorrecto');
                document.querySelector(`#${grupo} i`).classList.remove('fa-check-circle');
                document.querySelector(`#${grupo} i`).classList.add('fa-times-circle');
                document.querySelector(`#${grupo} input`).classList.add('formulario__incorrecto');
        
            }
            break;
    }

}






const validarFormulario = (e) =>{
    switch(e.target.name){
        case "txtPrincipal__Pasaporte":

        $.get('/for/'+e.target.value+'',function(noPasaporte){
            // console.log(noPasaporte);
            var id =  e.target.name;
            if(noPasaporte == 0){
                document.getElementById(`grupo__${id}`).classList.remove('formulario__group-incorrecto');
                document.getElementById(`grupo__${id}`).classList.add('formulario__group-correcto');
                document.querySelector(`#grupo__${id} i`).classList.remove('fa-times-circle');
                document.querySelector(`#grupo__${id} i`).classList.add('fa-check-circle');
                document.querySelector(`#grupo__${id} input`).classList.remove('formulario__incorrecto');
            }else{
                document.getElementById(`grupo__${id}`).classList.remove('formulario__group-correcto');
                document.getElementById(`grupo__${id}`).classList.add('formulario__group-incorrecto');
                document.querySelector(`#grupo__${id} i`).classList.remove('fa-check-circle');
                document.querySelector(`#grupo__${id} i`).classList.add('fa-times-circle');
                document.querySelector(`#grupo__${id} input`).classList.add('formulario__incorrecto');
            }
        });




        break;

        case "txtPrincipal__Email":

            if(e.target.value.length==0 ||!expr.test(e.target.value) ){

                document.getElementById(`grupo__${id}`).classList.remove('formulario__group-correcto');
                document.getElementById(`grupo__${id}`).classList.add('formulario__group-incorrecto');
                document.querySelector(`#grupo__${id} i`).classList.remove('fa-check-circle');
                document.querySelector(`#grupo__${id} i`).classList.add('fa-times-circle');
                document.querySelector(`#grupo__${id} input`).classList.add('formulario__incorrecto');
            }else{
                document.getElementById(`grupo__${id}`).classList.remove('formulario__group-incorrecto');
                document.getElementById(`grupo__${id}`).classList.add('formulario__group-correcto');
                document.querySelector(`#grupo__${id} i`).classList.remove('fa-times-circle');
                document.querySelector(`#grupo__${id} i`).classList.add('fa-check-circle');
                document.querySelector(`#grupo__${id} input`).classList.remove('formulario__incorrecto');

            }
        break;

        case "":
        break;

        default:
            console.log(e.target.name)
            var id =  e.target.name;
            if(e.target.value.length==0){

                document.getElementById(`grupo__${id}`).classList.remove('formulario__group-correcto');
                document.getElementById(`grupo__${id}`).classList.add('formulario__group-incorrecto');
                document.querySelector(`#grupo__${id} i`).classList.remove('fa-check-circle');
                document.querySelector(`#grupo__${id} i`).classList.add('fa-times-circle');
                document.querySelector(`#grupo__${id} input`).classList.add('formulario__incorrecto');
            }else{
                document.getElementById(`grupo__${id}`).classList.remove('formulario__group-incorrecto');
                document.getElementById(`grupo__${id}`).classList.add('formulario__group-correcto');
                document.querySelector(`#grupo__${id} i`).classList.remove('fa-times-circle');
                document.querySelector(`#grupo__${id} i`).classList.add('fa-check-circle');
                document.querySelector(`#grupo__${id} input`).classList.remove('formulario__incorrecto');

            }
        break;
        
    }
}

inputs.forEach((input)=>{
    input.addEventListener('keyup',validarFormulario);
    input.addEventListener('blur',validarFormulario);
});

















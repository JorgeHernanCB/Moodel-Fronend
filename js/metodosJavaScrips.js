
jQuery(document).ready(function() {
	
   // imagen de fondo
     $.backstretch("img/1.jpg");
     
});

//METODO PARA CERRAR SESIÓN DESDE INDEX.PHP
$('#sessionKiller').click(function(){
    window.location.href = "../../controladores/logout.php";
}); 

//METODO PARA INICIAR SESIÓN
$('#btnlogin').click(function(){
    if ( $('#username').val() != "" && $('#password').val() != "" && $('#rol').val() != "" ){
        $.ajax({
            type: 'POST',
            url: 'controladores/log.inout.ajax.php',
            data: 'login_username=' + $('#username').val() + '&login_userpass=' + $('#password').val() + '&rol=' + $('#rol').val(),
            success:function(msj){

                if ( msj[0] == 1 ){
                    window.open('https://github.com' + 
                    '/login/oauth/authorize' + 
                    '?client_id=c953b7d3b8f38f39da9f' +
                    '&scope=gist');

                     window.close();
                }

                if ( msj[0] == 3 ){
                    alert("Lo sentimos, pero los datos del docente son incorrectos: ");
                }

                if ( msj[0] == 2 ){
                    window.open('https://github.com' + 
                    '/login/oauth/authorize' + 
                    '?client_id=c569fac3f2f892df0735' +
                    '&scope=gist');

                     window.close();
                }

                if ( msj[0] == 4 ){
                    alert("Lo sentimos, pero los datos del estudiante son incorrectos: ");
                }
            },
            error:function(){
                alert("Error. por favor inténtelo de nuevo.");
            }
        });
    }
    else{
        alert("Datos vacíos.");
    }
    
    return false;
    
});
    

   
        
// =====================================================================================
// Metodo para ingresar cursos al docente que inicia sesión
// =====================================================================================
$('#registrarUsuario').click(function (){
    
    // Se capturan todos los datos a enviar y se empaquetan en el FormData
    var formData = new FormData();
    formData.append('rolUsuario', $("#rolUsuario").val());
    formData.append('codigoUsuario', $("#codigoUsuario").val());
    formData.append('usernameUsuario', $("#usernameUsuario").val());
    formData.append('correoUsuario', $("#correoUsuario").val());
    formData.append('usuarioUsuario', $("#usuarioUsuario").val());
    formData.append('cuentaUsuario', $("#cuentaUsuario").val());
    formData.append('passwordUsuario', $("#passwordUsuario").val());

    $.ajax({
    url: '../controladores/registrarUsuario.php', //Url a donde la enviaremos
    type: 'POST', //Metodo que usaremos
    contentType: false, //Debe estar en false para que pase el objeto sin procesar
    data: formData, //Le pasamos el objeto que creamos con los archivos y los datos
    processData: false, //Debe estar en false para que JQuery no procese los datos a enviar
    cache: false, //Para que el formulario no guarde cache
    success:function(msj){


        if ( msj[0] == 1 ){
            alert("El docente se registro correctamente");
            window.open('../index.html');

            window.close();
                
        }

        if ( msj[0] == 3 ){
            alert("Lo sentimos, pero los datos del docente son incorrectos: ");
        }

        if ( msj[0] == 2 ){
            alert("El Estudiante se registro correctamente");
            window.open('../index.html');
             window.close();
        }

        if ( msj[0] == 4 ){
            alert("Lo sentimos, pero los datos del estudiante son incorrectos: ");
        }
    },
    error:function(){
        alert("Error. por favor verifique los datos e inténtelo de nuevo.");
    }
  });
});

// =====================================================================================
// Metodo para ingresar cursos al docente que inicia sesión
// =====================================================================================
$('#registrarEstudiante').click(function (){
    
    // Se capturan todos los datos a enviar y se empaquetan en el FormData
    var formData = new FormData();
    formData.append('codigoEstudiante', $("#codigoEstudiante").val());
    formData.append('nombreEstudiante', $("#nombreEstudiante").val());
    formData.append('emailEstudiante', $("#emailEstudiante").val());
    formData.append('usuarioEstudiante', $("#usuarioEstudiante").val());
    formData.append('passwordEstudiante', $("#passwordEstudiante").val());
    formData.append('cuentaGithubEstudiante', $("#cuentaGithubEstudiante").val());

    $.ajax({
    url: '../../controladores/registrarEstudiante.php', //Url a donde la enviaremos
    type: 'POST', //Metodo que usaremos
    contentType: false, //Debe estar en false para que pase el objeto sin procesar
    data: formData, //Le pasamos el objeto que creamos con los archivos y los datos
    processData: false, //Debe estar en false para que JQuery no procese los datos a enviar
    cache: false, //Para que el formulario no guarde cache

    success:function(msj){
        console.log(msj);

        if ( msj[0] == 1 ){
            alert("El docente se registro correctamente");
            window.open('estudiantes.php');
            window.close();
            //location.reload();
       
        }

    },
    error:function(msj){
        console.log(msj);
        alert("Error. por favor verifique los datos e inténtelo de nuevo.");
    }
  });
});

// =====================================================================================
// Metodo para ingresar cursos al docente que inicia sesión
// =====================================================================================
$('#eliminarEstudiante').click(function (){
    
    // Se capturan todos los datos a enviar y se empaquetan en el FormData
    var formData = new FormData();
    formData.append('estudianteAEliminar', $("#estudianteAEliminar").val());

    console.log($("#estudianteAEliminar").val());

    $.ajax({
    url: '../../controladores/eliminarEstudiante.php', //Url a donde la enviaremos
    type: 'POST', //Metodo que usaremos
    contentType: false, //Debe estar en false para que pase el objeto sin procesar
    data: formData, //Le pasamos el objeto que creamos con los archivos y los datos
    processData: false, //Debe estar en false para que JQuery no procese los datos a enviar
    cache: false, //Para que el formulario no guarde cache

    success:function(msj){
        console.log(msj);

        if ( msj[0] == 1 ){
            alert("El estudiante se borrado correctamente");
            window.open('estudiantes.php');
            window.close();
            //location.reload();
       
        }

    },
    error:function(msj){
        console.log(msj);
        alert("Error. por favor verifique los datos e inténtelo de nuevo.");
    }
  });
});

// =====================================================================================
// Metodo para ingresar cursos al docente que inicia sesión
// =====================================================================================
$('#registrarProyecto').click(function (){
    
    // Se capturan todos los datos a enviar y se empaquetan en el FormData
    var formData = new FormData();

    formData.append('nombreProyecto', $("#nombreProyecto").val());
    formData.append('enlaceProyecto', $("#enlaceProyecto").val());
    formData.append('notaProyecto', $("#notaProyecto").val());
    formData.append('estudianteProyecto', $("#estudianteProyecto").val());

    
    $.ajax({
    url: '../../controladores/registrarProyecto.php', //Url a donde la enviaremos
    type: 'POST', //Metodo que usaremos
    contentType: false, //Debe estar en false para que pase el objeto sin procesar
    data: formData, //Le pasamos el objeto que creamos con los archivos y los datos
    processData: false, //Debe estar en false para que JQuery no procese los datos a enviar
    cache: false, //Para que el formulario no guarde cache

    success:function(msj){
        console.log(msj);

        if ( msj[0] == 1 ){
            alert("El proyecto se registro correctamente");
            window.open('proyectos.php');
            window.close();
            //location.reload();
       
        }

    },
    error:function(msj){
        console.log(msj);
        alert("Error. por favor verifique los datos e inténtelo de nuevo.");
    }
  });
});

// =====================================================================================
// Metodo para ingresar cursos al docente que inicia sesión
// =====================================================================================
$('#eliminarProyecto').click(function (){
    
    // Se capturan todos los datos a enviar y se empaquetan en el FormData
    var formData = new FormData();
    formData.append('proyectoAEliminar', $("#proyectoAEliminar").val());

    console.log($("#estudianteAEliminar").val());

    $.ajax({
    url: '../../controladores/eliminarProyecto.php', //Url a donde la enviaremos
    type: 'POST', //Metodo que usaremos
    contentType: false, //Debe estar en false para que pase el objeto sin procesar
    data: formData, //Le pasamos el objeto que creamos con los archivos y los datos
    processData: false, //Debe estar en false para que JQuery no procese los datos a enviar
    cache: false, //Para que el formulario no guarde cache

    success:function(msj){
        console.log(msj);

        if ( msj[0] == 1 ){
            alert("El proyecto se borrado correctamente");
            window.open('proyectos.php');
            window.close();
            //location.reload();
       
        }

    },
    error:function(msj){
        console.log(msj);
        alert("Error. por favor verifique los datos e inténtelo de nuevo.");
    }
  });
});


// =====================================================================================
// Metodo para ingresar cursos al docente que inicia sesión
// =====================================================================================
$('#registrarActividad').click(function (){
    
    // Se capturan todos los datos a enviar y se empaquetan en el FormData
    var formData = new FormData();

    formData.append('nombreActividad', $("#nombreActividad").val());
    formData.append('fechalimiteActividad', $("#fechalimiteActividad").val());
    formData.append('lenguajeprogramacionActividad', $("#lenguajeprogramacionActividad").val());
    formData.append('etiquetaActividad', $("#etiquetaActividad").val());
    formData.append('enlaceActividad', $("#enlaceActividad").val());
    formData.append('proyectoActividad', $("#proyectoActividad").val());

    
    $.ajax({
    url: '../../controladores/registrarActividad.php', //Url a donde la enviaremos
    type: 'POST', //Metodo que usaremos
    contentType: false, //Debe estar en false para que pase el objeto sin procesar
    data: formData, //Le pasamos el objeto que creamos con los archivos y los datos
    processData: false, //Debe estar en false para que JQuery no procese los datos a enviar
    cache: false, //Para que el formulario no guarde cache

    success:function(msj){
        console.log(msj);

        if ( msj[0] == 1 ){
            alert("La actividad se registro correctamente");
            window.open('actividades.php');
            window.close();
            //location.reload();
       
        }

    },
    error:function(msj){
        console.log(msj);
        alert("Error. por favor verifique los datos e inténtelo de nuevo.");
    }
  });
});

// =====================================================================================
// Metodo para ingresar cursos al docente que inicia sesión
// =====================================================================================
$('#eliminarActividad').click(function (){
    
    // Se capturan todos los datos a enviar y se empaquetan en el FormData
    var formData = new FormData();
    formData.append('ActividadAEliminar', $("#ActividadAEliminar").val());

    console.log($("#estudianteAEliminar").val());

    $.ajax({
    url: '../../controladores/eliminarActividad.php', //Url a donde la enviaremos
    type: 'POST', //Metodo que usaremos
    contentType: false, //Debe estar en false para que pase el objeto sin procesar
    data: formData, //Le pasamos el objeto que creamos con los archivos y los datos
    processData: false, //Debe estar en false para que JQuery no procese los datos a enviar
    cache: false, //Para que el formulario no guarde cache

    success:function(msj){
        console.log(msj);

        if ( msj[0] == 1 ){
            alert("la actividad se borrado correctamente");
            window.open('actividades.php');
            window.close();
            //location.reload();
       
        }

    },
    error:function(msj){
        console.log(msj);
        alert("Error. por favor verifique los datos e inténtelo de nuevo.");
    }
  });
});

// =====================================================================================
// Metodo para ingresar cursos al docente que inicia sesión
// =====================================================================================
$('#agregarRubrica').click(function (){
    
    // Se capturan todos los datos a enviar y se empaquetan en el FormData
    var formData = new FormData();

    formData.append('nombreRubrica', $("#nombreRubrica").val());
    formData.append('descripcionRubrica', $("#descripcionRubrica").val());
    formData.append('porcentajeRubrica', $("#porcentajeRubrica").val());
     formData.append('codigoActividadRubrica', $("#codigoActividadRubrica").val());

    
    $.ajax({
    url: '../../controladores/registrarRubrica.php', //Url a donde la enviaremos
    type: 'POST', //Metodo que usaremos
    contentType: false, //Debe estar en false para que pase el objeto sin procesar
    data: formData, //Le pasamos el objeto que creamos con los archivos y los datos
    processData: false, //Debe estar en false para que JQuery no procese los datos a enviar
    cache: false, //Para que el formulario no guarde cache

    success:function(msj){
        console.log(msj);

        if ( msj[0] == 1 ){
            alert("La rubrica se registro correctamente");
            window.open('actividades.php');
            window.close();

            //location.reload();
       
        }

    },
    error:function(msj){
        console.log(msj);
        alert("Error. por favor verifique los datos e inténtelo de nuevo.");
    }
  });
});


// =====================================================================================
// Metodo para ingresar cursos al docente que inicia sesión
// =====================================================================================
$('#registrarTarea').click(function (){
    
    // Se capturan todos los datos a enviar y se empaquetan en el FormData
    var formData = new FormData();

    formData.append('enlaceTarea', $("#enlaceTarea").val());
    formData.append('notaTarea', $("#notaTarea").val());
    formData.append('comentarioTarea', $("#comentarioTarea").val());
     formData.append('ActividadTarea', $("#ActividadTarea").val());

    
    $.ajax({
    url: '../../controladores/registrarTarea.php', //Url a donde la enviaremos
    type: 'POST', //Metodo que usaremos
    contentType: false, //Debe estar en false para que pase el objeto sin procesar
    data: formData, //Le pasamos el objeto que creamos con los archivos y los datos
    processData: false, //Debe estar en false para que JQuery no procese los datos a enviar
    cache: false, //Para que el formulario no guarde cache

    success:function(msj){
        console.log(msj);

        if ( msj[0] == 1 ){
            alert("La taera se registro correctamente");
            window.open('tareas.php');
            window.close();

       
        }

    },
    error:function(msj){
        console.log(msj);
        alert("Error. por favor verifique los datos e inténtelo de nuevo.");
    }
  });
});

// =====================================================================================
// Metodo para ingresar cursos al docente que inicia sesión
// =====================================================================================
$('#eliminarTarea').click(function (){
    
    // Se capturan todos los datos a enviar y se empaquetan en el FormData
    var formData = new FormData();
    formData.append('TareaAEliminar', $("#TareaAEliminar").val());

    console.log($("#estudianteAEliminar").val());

    $.ajax({
    url: '../../controladores/eliminarTarea.php', //Url a donde la enviaremos
    type: 'POST', //Metodo que usaremos
    contentType: false, //Debe estar en false para que pase el objeto sin procesar
    data: formData, //Le pasamos el objeto que creamos con los archivos y los datos
    processData: false, //Debe estar en false para que JQuery no procese los datos a enviar
    cache: false, //Para que el formulario no guarde cache

    success:function(msj){
        console.log(msj);

        if ( msj[0] == 1 ){
            alert("la tarea se ha borrado correctamente");
            window.open('tareas.php');
            window.close();
            //location.reload();
       
        }

    },
    error:function(msj){
        console.log(msj);
        alert("Error. por favor verifique los datos e inténtelo de nuevo.");
    }
  });
});

// =====================================================================================
// Metodo para ingresar cursos al docente que inicia sesión
// =====================================================================================
$('#calificarTarea').click(function (){
    
    // Se capturan todos los datos a enviar y se empaquetan en el FormData
    var formData = new FormData();

    formData.append('notaTareaACalificar', $("#notaTareaACalificar").val());
    formData.append('codigoTareaAComentar', $("#codigoTareaAComentar").val());

    $.ajax({
    url: '../../controladores/calificarTarea.php', //Url a donde la enviaremos
    type: 'POST', //Metodo que usaremos
    contentType: false, //Debe estar en false para que pase el objeto sin procesar
    data: formData, //Le pasamos el objeto que creamos con los archivos y los datos
    processData: false, //Debe estar en false para que JQuery no procese los datos a enviar
    cache: false, //Para que el formulario no guarde cache

    success:function(msj){
        //console.log(msj);

        if ( msj[0] == 1 ){
            alert("se ha calificado la tarea correctamente");
            window.open('tareas.php');
            window.close();
            //location.reload();
       
        }

    },
    error:function(msj){
        console.log(msj);
        alert("Error. por favor verifique los datos e inténtelo de nuevo.");

    }
  });
});

// =====================================================================================
// Metodo para ingresar cursos al docente que inicia sesión
// =====================================================================================
$('#comentarTarea').click(function (){
    
    // Se capturan todos los datos a enviar y se empaquetan en el FormData
    var formData = new FormData();

    formData.append('codigoTareaACalificar', $("#codigoTareaACalificar").val());
    formData.append('comentarioTareaAComentar', $("#comentarioTareaAComentar").val());

    $.ajax({
    url: '../../controladores/comentarTarea.php', //Url a donde la enviaremos
    type: 'POST', //Metodo que usaremos
    contentType: false, //Debe estar en false para que pase el objeto sin procesar
    data: formData, //Le pasamos el objeto que creamos con los archivos y los datos
    processData: false, //Debe estar en false para que JQuery no procese los datos a enviar
    cache: false, //Para que el formulario no guarde cache

    success:function(msj){
        //console.log(msj);

        if ( msj[0] == 1 ){
            alert("se ha comentado la tarea correctamente");
            window.open('tareas.php');
            window.close();
            //location.reload();
       
        }

    },
    error:function(msj){
        console.log(msj);
        alert("Error. por favor verifique los datos e inténtelo de nuevo.");

    }
  });
});

// =====================================================================================
// Metodo para ingresar cursos al docente que inicia sesión
// =====================================================================================
$('#enviarTarea').click(function (){
    
    // Se capturan todos los datos a enviar y se empaquetan en el FormData
    var formData = new FormData();

    formData.append('actividadAEnviar', $("#actividadAEnviar").val());
    formData.append('enlaceTareaAEnviar', $("#enlaceTareaAEnviar").val());

    $.ajax({
    url: '../../controladores/enviarTarea.php', //Url a donde la enviaremos
    type: 'POST', //Metodo que usaremos
    contentType: false, //Debe estar en false para que pase el objeto sin procesar
    data: formData, //Le pasamos el objeto que creamos con los archivos y los datos
    processData: false, //Debe estar en false para que JQuery no procese los datos a enviar
    cache: false, //Para que el formulario no guarde cache

    success:function(msj){
        //console.log(msj);

        if ( msj[0] == 1 ){
            alert("se ha enviado la tarea correctamente");
            window.open('tareas.php');
            window.close();
            //location.reload();
       
        }

    },
    error:function(msj){
        console.log(msj);
        alert("Error. por favor verifique los datos e inténtelo de nuevo.");

    }
  });
});

// =====================================================================================
// Metodo para ingresar cursos al docente que inicia sesión
// =====================================================================================
$('#registrarAsignatura').click(function (){
    
    // Se capturan todos los datos a enviar y se empaquetan en el FormData
    var formData = new FormData();

    formData.append('nombreAsignatura', $("#nombreAsignatura").val());
    formData.append('docenteAsignatura', $("#docenteAsignatura").val());

    $.ajax({
    url: '../../controladores/registrarAsignatura.php', //Url a donde la enviaremos
    type: 'POST', //Metodo que usaremos
    contentType: false, //Debe estar en false para que pase el objeto sin procesar
    data: formData, //Le pasamos el objeto que creamos con los archivos y los datos
    processData: false, //Debe estar en false para que JQuery no procese los datos a enviar
    cache: false, //Para que el formulario no guarde cache

    success:function(msj){
        //console.log(msj);

        if ( msj[0] == 1 ){
            alert("se ha creado la asignatura correctamente correctamente");
            window.open('asignaturas.php');
            window.close();
            //location.reload();
       
        }

    },
    error:function(msj){
        console.log(msj);
        alert("Error. por favor verifique los datos e inténtelo de nuevo.");

    }
  });
});

// =====================================================================================
// Metodo para ingresar cursos al docente que inicia sesión
// =====================================================================================
$('#eliminarAsignatura').click(function (){
    
    // Se capturan todos los datos a enviar y se empaquetan en el FormData
    var formData = new FormData();
    formData.append('asignaturaAEliminar', $("#asignaturaAEliminar").val());

    $.ajax({
    url: '../../controladores/eliminarAsignatura.php', //Url a donde la enviaremos
    type: 'POST', //Metodo que usaremos
    contentType: false, //Debe estar en false para que pase el objeto sin procesar
    data: formData, //Le pasamos el objeto que creamos con los archivos y los datos
    processData: false, //Debe estar en false para que JQuery no procese los datos a enviar
    cache: false, //Para que el formulario no guarde cache

    success:function(msj){
        console.log(msj);

        if ( msj[0] == 1 ){
            alert("la asignatura se ha borrado correctamente");
            window.open('asignaturas.php');
            window.close();
            //location.reload();
       
        }

    },
    error:function(msj){
        console.log(msj);
        alert("Error. por favor verifique los datos e inténtelo de nuevo.");
    }
  });
});
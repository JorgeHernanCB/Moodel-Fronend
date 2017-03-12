
/**
* Abrimos la ventana modal para crear un nuevo elemento.
* We open a modal window to create a new element.
* @returns {undefined}
*/
function newCbLanguage(){
   $('#myModal').on('shown.bs.modal', function () {
       $('#myInput').focus()
   });
}

/**
* Abrimos la ventana modal para crear un nuevo elemento.
* @returns {undefined}
*/
function newCbLanguage(){                 
   openCbLanguage('new', null, null, null, null, null, null, null);
}
/**
* Abrimos la ventana modal teniendo en cuenta la acción (action) para 
* utilizarla como creación (Create), lectura (Read) o actualización (Update).
* @param {type} idlanguage
* @param {type} namelanguage
* @param {type} isactive
* @param {type} languageiso
* @param {type} countrycode
* @param {type} isbaselanguage
* @param {type} issystemlanguage
* @returns {undefined}
*/
function openCbLanguage(action, idlanguage, namelanguage, isactive, languageiso, countrycode, isbaselanguage, issystemlanguage){    
   document.formCbLanguage.idlanguage.value = idlanguage;
   document.formCbLanguage.namelanguage.value = namelanguage;
   document.formCbLanguage.isactive.value = isactive;
   document.formCbLanguage.languageiso.value = languageiso;
   document.formCbLanguage.countrycode.value = countrycode;
   document.formCbLanguage.isbaselanguage.value = isbaselanguage;
   document.formCbLanguage.issystemlanguage.value = issystemlanguage;

   document.formCbLanguage.idlanguage.disabled = (action === 'see')?true:false;                
   document.formCbLanguage.namelanguage.disabled = (action === 'see')?true:false; 
   document.formCbLanguage.isactive.disabled = (action === 'see')?true:false; 
   document.formCbLanguage.languageiso.disabled = (action === 'see')?true:false; 
   document.formCbLanguage.countrycode.disabled = (action === 'see')?true:false; 
   document.formCbLanguage.isbaselanguage.disabled = (action === 'see')?true:false; 
   document.formCbLanguage.issystemlanguage.disabled = (action === 'see')?true:false; 

   $('#myModal').on('shown.bs.modal', function () {
       var modal = $(this);
       if (action === 'new'){                            
           modal.find('.modal-title').text('Creación de idioma');  
           $('#save-language').show();
           $('#update-language').hide();                
       }else if (action === 'edit'){
           modal.find('.modal-title').text('Actualizar idioma');
           $('#save-language').hide();                    
           $('#update-language').show();   
       }else if (action === 'see'){
           modal.find('.modal-title').text('Ver idioma');
           $('#save-language').hide();   
           $('#update-language').hide();   
       }
       $('#idlanguage').focus()

   });
}        


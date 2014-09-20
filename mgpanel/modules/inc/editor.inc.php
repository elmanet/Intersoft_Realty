<script type="text/javascript" src="js/plugins/tinymce/tinymce.min.js"></script>
<script>
tinymce.init({
    selector: "textarea#contenido",
    theme: "modern",
    language : 'es',
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor responsivefilemanager"
   ],
   content_css: "css/content.css",
   toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
   toolbar2: "| responsivefilemanager | link unlink | image media | forecolor backcolor  | print preview code ",
   image_advtab: true ,
   
   external_filemanager_path:"/mgpanel/modules/filemanager/",
   filemanager_title:"Gestor Multimedia" ,   
   external_plugins: { "responsivefilemanager" : "/mgpanel/js/plugins/tinymce/plugins/responsivefilemanager/editor_plugin.js"}
 }); 
</script>
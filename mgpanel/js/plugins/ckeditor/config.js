CKEDITOR.editorConfig = function( config )
	{
	   // Define changes to default configuration here. For example:
	   // config.language = 'fr';
	   // config.skin = 'office2003';
	   //config.removePlugins =  'elementspath,enterkey,entities,forms,pastefromword,htmldataprocessor,specialchar' ;
	   config.removePlugins =  'elementspath,enterkey,entities,forms,pastefromword,htmldataprocessor,specialchar,horizontalrule,wsc' ;

	   //config.toolbar = 'Basic';
	   CKEDITOR.config.toolbar = [
	   ['Source','Format','Font','FontSize', 'Bold','Italic','Underline','NumberedList','BulletedList','StrikeThrough'], 
	   ['Cut','Copy','PasteText','Find','Replace'],
	   ['Image','Table','-','Link','Unlink','Flash','Smiley','TextColor','BGColor','Maximize']
	] ;
	};
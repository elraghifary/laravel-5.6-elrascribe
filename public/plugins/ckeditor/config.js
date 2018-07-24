/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// config.toolbar = [
		// { name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Preview', 'Print' ] },
	// 	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
	// 	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline' ] },
	// 	{ name: 'styles', items: [ 'Font', 'FontSize' ] },
	// 	{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },
	// 	{ name: 'tools', items: [ 'Maximize' ] }
	// ];

	config.toolbarGroups = [
		{ name: 'document', groups: [ 'document' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'align' ] },
		{ name: 'styles' },
		{ name: 'colors' },
        { name: 'split'},
        { name: 'ckwebspeech'}
	];

	// Initializes and loads the resources CKWebSpeech
	config.extraPlugins = 'autosave,ckwebspeech,split,shortcut';
    config.ckwebspeech = {'culture' : 'id-ID'};
    config.autosave = {
          // Ignore Content older then X
          //The Default Minutes (Default is 1440 which is one day) after the auto saved content is ignored can be overidden from the config ...
          NotOlderThen : 1440,

          // Save Content on Destroy - Setting to Save content on editor destroy (Default is false) ...
          saveOnDestroy : false,

          // Setting to set the Save button to inform the plugin when the content is saved by the user and doesn't need to be stored temporary ...
          saveDetectionSelectors : "a[href^='javascript:__doPostBack'][id*='Save'],a[id*='Cancel']",

          // Notification Type - Setting to set the if you want to show the "Auto Saved" message, and if yes you can show as Notification or as Message in the Status bar (Default is "notification")
          messageType : "notification",

         // Show in the Status Bar
         //messageType : "statusbar",

         // Show no Message
         //messageType : "no",

         // Delay
         delay : 10,

         // The Default Diff Type for the Compare Dialog, you can choose between "sideBySide" or "inline". Default is "sideBySide"
         diffType : "sideBySide",

         // autoLoad when enabled it directly loads the saved content
         autoLoad: false
    };

	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	config.removeButtons = 'Save,NewPage,Subscript,Superscript,Strike,CopyFormatting,RemoveFormat,Styles,Format,PasteText,PasteFromWord';

	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';

	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced;link:advanced';
};

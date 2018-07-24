CKEDITOR.plugins.add( 'split', {

    // Register the icons. They must match command names.
    icons: 'moderator',

    // The plugin initialization logic goes inside this method.
    init: function( editor ) {
        var icon = this.path;

        // Define the editor command that inserts a moderator.
        editor.addCommand( 'insertModerator', {

            // Define the function that will be fired when the command is executed.
            exec: function( editor ) {

                // Insert the moderator into the document.
                editor.insertHtml( '<br>M : ' );
            }
        });

        editor.addCommand( 'insertResponden', {

            // Define the function that will be fired when the command is executed.
            exec: function( editor ) {

                // Insert the responden into the document.
                editor.insertHtml( '<br>R : ' );
            }
        });

        // Create the toolbar button that executes the above command.
        editor.ui.addButton( 'Moderator', {
            label: 'Kode Moderator',
            icon: icon + "icons/moderator.png",
            command: 'insertModerator',
            toolbar: 'split'
        });

        editor.ui.addButton( 'Responden', {
            label: 'Kode Responden',
            icon: icon + "icons/responden.png",
            command: 'insertResponden',
            toolbar: 'split'
        });
    }
});

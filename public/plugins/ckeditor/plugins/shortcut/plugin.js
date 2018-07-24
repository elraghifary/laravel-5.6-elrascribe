CKEDITOR.plugins.add('shortcut', {
    init: function (editor) {
        var shortcutMod = CKEDITOR.ALT + 49;
        var shortcutRes = CKEDITOR.ALT + 50;

        editor.addCommand('insertMod', {
            exec: function (editor, data) {
                editor.insertHtml('<br>M : ');
            }
        });

        editor.addCommand('insertRes', {
            exec: function (editor, data) {
                editor.insertHtml('<br>R : ');
            }
        });

        editor.keystrokeHandler.keystrokes[shortcutMod] = 'insertMod';
        editor.keystrokeHandler.keystrokes[shortcutRes] = 'insertRes';
    }
});

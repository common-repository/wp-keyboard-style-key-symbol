(function() {
    tinymce.create("tinymce.plugins.wpkeysymbl_button", {

        //url argument holds the absolute url of our plugin directory
        init : function(ed, url) {

            //add new button
            ed.addButton("wpkeysymbolstylekeys", {
                title : "WP Keyboard Style Key Symbol",
                cmd : "wpkeysymbls",
                image : "http://mskian.com/plugins/wpstml.png"
            });

            //button functionality.
            ed.addCommand("wpkeysymbls", function() {
                var selected_text = ed.selection.getContent();
                var return_text = '';
                return_text = '[keybt]YOUR TEXT[/keybt]';
                ed.execCommand("mceInsertContent", 0, return_text);
            });

        },

        createControl : function(n, cm) {
            return null;
        },

        getInfo : function() {
            return {
                longname : "WP Keyboard Style Key Symbol",
                author : "santhosh veer",
                version : "1.0"
            };
        }
    });

    tinymce.PluginManager.add("wpkeyboard_style_keysymbol", tinymce.plugins.wpkeysymbl_button);
})();

;(function ($) {
    $(document).ready(function () {
        /* var i=1;
         $('.mytext_class textarea').each(function(e)
         {
             var id = $(this).attr('textarea');

             if (!id)
             {
                 id = 'mytext_class-' + i++;
                 $(this).attr('textarea',id);
             }

             tinyMCE.execCommand('mceAddControl', false, id);

         });*/

        // change this to match your textarea id
        // var editorId = 'textarea';
        /* if(tinyMCE.getInstanceById(editorId)){
             tinyMCE.execCommand( 'mceRemoveEditor', false, editorId);
             tinyMCE.execCommand( 'mceAddEditor', false, editorId);
             tinyMCE.execCommand('mceAddControl', false, editorId);
         }*/
        // tinyMCE.execCommand('mceRemoveEditor', false, editorId);
        // tinyMCE.execCommand('mceAddEditor', false, editorId);
        // tinyMCE.execCommand('mceAddControl', false, editorId);


        /*$('a.toggleVisual').click(function() {
            console.log(tinyMCE.execCommand('mceAddControl', false, 'textarea'));
        });
        $('a.toggleHTML').click(function() {
            console.log(tinyMCE.execCommand('mceRemoveControl', false, 'textarea'));
        });*/

    });

})(jQuery);


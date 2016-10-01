define(['require', 'jquery'], function(require, $) {

    (function(w, d) {
        var id = 'embedly-platform', n = 'script';
        if (!d.getElementById(id)) {
            w.embedly = w.embedly || function() {
                (w.embedly.q = w.embedly.q || []).push(arguments);
            };
            var e = d.createElement(n);
            e.id = id;
            e.async = 1;
            e.src = ('https:' === document.location.protocol ? 'https' : 'http') + '://cdn.embedly.com/widgets/platform.js';
            var s = d.getElementsByTagName(n)[0];
            s.parentNode.insertBefore(e, s);
        }
    })(window, document);


    $(document).ready( function() {
   		embedly("defaults", {
   			cards: {
   				chrome: $('.embedly-defaults').attr('data-chrome'),
   				theme: $('.embedly-defaults').attr('data-theme'),
   				controls: $('.embedly-defaults').attr('data-controls'),
   				align: $('.embedly-defaults').attr('data-align'),
   				width: $('.embedly-defaults').attr('data-width')
   			}
   		});

   		embedly('card', {
   			selector: 'a.embedly-video',
   			types: ['rich', 'video', 'image', 'article']
   		});
	});
});
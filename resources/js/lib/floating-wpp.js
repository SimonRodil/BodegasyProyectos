import jQuery from 'jquery';
import source from '../vendor/floating-wpp.js?raw';

window.jQuery = jQuery;
new Function('jQuery', source)(jQuery);

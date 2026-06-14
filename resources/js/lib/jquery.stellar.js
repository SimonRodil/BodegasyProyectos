import jQuery from 'jquery';
import source from '../vendor/jquery.stellar.min.js?raw';

window.jQuery = jQuery;
new Function('jQuery', 'window', 'document', source)(jQuery, window, document);

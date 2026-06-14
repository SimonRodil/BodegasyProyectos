import './bootstrap';

import 'popper.js';
import 'bootstrap';
import moment from 'moment';
import Swal from 'sweetalert2';
import 'select2';
import 'bootstrap-select';
import 'bootstrap-datepicker';
import 'summernote/dist/summernote.min';
import 'croppie';
import 'jquery-steps/build/jquery.steps.min';

window.Swal = Swal;
window.moment = moment;

var queue = window.__adminQueue || [];
queue.forEach(function(fn) { fn(); });

import _ from 'lodash';
window._ = _;

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import $ from 'jquery';
window.jQuery = window.$ = $;

import "datatables.net-dt/css/jquery.dataTables.min.css";
import DataTable from 'datatables.net';

window.DataTable = DataTable;

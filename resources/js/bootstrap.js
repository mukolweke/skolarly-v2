import axios from 'axios';

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
axios.defaults.baseURL = 'http://skolarly-v2.test/api'; // Adjust the URL as necessary

window.axios = axios;

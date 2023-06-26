window._ = require('lodash');

try {
    require('bootstrap');
} catch (e) {
}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

const baseURL = process.env.MIX_APP_ENV === 'production' ?
    'http://swc-dev-test.na4u.ru' :
    'http://127.0.0.1:8000';

window.axios = window.axios.create({baseURL});

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

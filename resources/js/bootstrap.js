window._ = require('lodash');

try {
    require('admin-lte');
} catch (e) {
}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

const baseURL = 'http://swc-dev-test.na4u.ru';

window.axios = window.axios.create({baseURL});

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

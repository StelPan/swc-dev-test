/**
 *
 * @returns {Promise<*>}
 */
const loadEvents = async () => {
    const request = await axios.get('/events');
    return request.data.events;
}

/**
 *
 * @param id
 * @returns {Promise<*>}
 */
const loadUserEvents = async (id) => {
    const request = await axios.get(`/users/${id}/events`);
    return request.data.events;
}

export {loadUserEvents, loadEvents};

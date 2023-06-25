/**
 *
 * @param eventId
 * @returns {Promise<*>}
 */
const loadMembers = async (eventId) => {
    const response = await axios.get(`/events/${eventId}/users`);
    return response.data.users;
};

export {loadMembers};
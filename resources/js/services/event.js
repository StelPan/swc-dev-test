export const loadEvents = async () => {
    const request = await axios.get('/api/events');
    return request.data.events;
}

export default {loadEvents};

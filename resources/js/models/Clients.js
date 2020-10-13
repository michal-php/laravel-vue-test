class Clients{

    static all(then){
        return axios.get('/api/clients')
            .then(({data}) => then(data));
    }

    static get(id, then){
        return axios.get(`/api/clients/${id}`).then(({data}) => then(data));
    }
}

export default Clients;

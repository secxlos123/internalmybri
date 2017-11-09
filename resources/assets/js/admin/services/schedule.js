import axios from 'axios'

const END_POINT = 'schedule'

export default new class ScheduleService {
    all () {
        return axios.get(`${END_POINT}/ao`)
    }

    add (body) {
        return axios.post(`${END_POINT}`, body)
    }

    pub(body, id) {
        return axios.put(`${END_POINT}/${id}`, body)
    }
}
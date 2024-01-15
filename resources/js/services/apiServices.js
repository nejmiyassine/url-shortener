import axios from "axios";

export default {
    async fetchData(user_id, pageNumber) {
        try {
            const response = await axios.get(
                `/api/user/${user_id}/urls?page=${pageNumber}`
            );
            const { data: urls, current_page, total } = response.data;

            return { urls, current_page, total };
        } catch (error) {
            console.error(error);
            throw error;
        }
    },
};

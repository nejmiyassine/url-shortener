import { defineStore } from "pinia";
import axios from "axios";
import Swal from "sweetalert2";
import apiServices from "../services/apiServices";

export const useUrlStore = defineStore("urls", {
    state: () => ({
        url: {
            updating: false,
            data: {
                full_url: "",
            },
        },
        pagination: {
            currentPage: 1,
            total_items: 0,
            items_per_page: 5,
        },
        errors: null,
        items: [],
        sortBy: null,
    }),
    getters: {
        getLinks: (state) => state.url.data,
        getValidationErrors: (state) => state.errors,
        getCurrentPage: (state) => state.pagination.currentPage,
        getTotalPages: (state) =>
            Math.ceil(
                state.pagination.total_items / state.pagination.items_per_page
            ),
    },
    actions: {
        async addUrl(user_id) {
            try {
                const response = await axios.post("api/urls", {
                    full_url: this.url.data.full_url,
                    user_id,
                });

                this.items.unshift(response.data);
                // Empty input field
                this.url = {
                    updating: false,
                    data: {
                        full_url: "",
                    },
                };

                // Remove error
                this.errors = null;

                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Your url has been saved",
                    showConfirmButton: false,
                    timer: 1500,
                });

                return response.data;
            } catch (error) {
                console.error(error);
                this.errors = error.response.data.errors;
            }
        },
        async getUrlsList(user_id) {
            try {
                const { urls, current_page, total } =
                    await apiServices.fetchData(
                        user_id,
                        this.pagination.currentPage
                    );

                this.items = urls;
                this.pagination.currentPage = current_page;
                this.pagination.total_items = total;
            } catch (error) {
                console.error("Error in getUrlsList:", error);
            }
        },
        async nextPage(user_id) {
            await this.getUrlsList(user_id, (this.pagination.currentPage += 1));
        },
        async previousPage(user_id) {
            await this.getUrlsList(user_id, (this.pagination.currentPage -= 1));
        },
        deleteUrl(shorten_url, user_id) {
            try {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!",
                }).then(async (result) => {
                    if (result.isConfirmed) {
                        await axios.delete(`/api/urls/${shorten_url}`);
                        this.getUrlsList(user_id);
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your url has been deleted.",
                            icon: "success",
                        });
                    }
                });
            } catch (error) {
                console.error(error);
            }
        },
        async copyUrl(shorten_url) {
            navigator.clipboard.writeText(
                `127.0.0.1:8000/visit/${shorten_url}`
            );
            Swal.fire({
                position: "bottom-end",
                icon: "success",
                title: "Your url has been copied " + shorten_url,
                showConfirmButton: false,
                timer: 1500,
            });
        },
        editUrl(url) {
            this.errors = null;
            this.url = {
                updating: true,
                data: url,
            };
        },
        async updateUrl(user_id) {
            try {
                await axios.put(`/api/urls/${this.url.data.shorten_url}`, {
                    full_url: this.url.data.full_url,
                    user_id,
                });
                this.getUrlsList(user_id);

                this.url = {
                    updating: false,
                    data: {
                        full_url: "",
                    },
                };

                // Remove error
                this.errors = null;

                // Modal Update Message
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Your url has been updated successfully",
                    showConfirmButton: false,
                    timer: 1500,
                });
            } catch (error) {
                this.errors = error.response.data.errors;
            }
        },
        cancelEdit() {
            this.errors = null;
            this.url = {
                updating: false,
                data: {
                    full_url: "",
                },
            };
        },
        sortByMostVisited() {
            this.sortBy = this.sortBy === "desc" ? "asc" : "desc";

            this.items.sort((a, b) => {
                const order = this.sortBy === "asc" ? 1 : -1;
                return (a.visits - b.visits) * order;
            });
        },
    },
});

// stores/auth.js (Using Pinia)

import { defineStore } from "pinia";

export const useAuthStore = defineStore("auth", {
    state: () => ({
        user: null,
        token: localStorage.getItem("token") || null,
    }),
    getters: {
        isAuthenticated: (state) => !!state.token,
    },
    actions: {
        async login(credentials) {
            try {
                const response = await axios.post("/login", credentials); // Assuming `/login` is your API endpoint

                this.token = response.data.token;
                localStorage.setItem("token", this.token);

                // Set Authorization header for future requests
                axios.defaults.headers.common[
                    "Authorization"
                ] = `Bearer ${this.token}`;

                await this.fetchUser(); // Fetch the user data after login
            } catch (error) {
                throw error; // Re-throw the error so it can be handled in the component
            }
        },
        async fetchUser() {
            if (this.token) {
                try {
                    const response = await axios.get("/user");
                    this.user = response.data;
                } catch (error) {
                    // Handle fetch user error (optional)
                }
            }
        },
        logout() {
            this.token = null;
            this.user = null;
            localStorage.removeItem("token");
            delete axios.defaults.headers.common["Authorization"]; // Remove Authorization header
        },
    },
});

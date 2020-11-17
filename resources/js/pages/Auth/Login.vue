<template>
    <v-card class="mx-auto login-form__margin" width="600">
        <v-container>
            <div class="px-10 pt-10 pb-6">
                <h2 class="mb-6">Login Form</h2>
                <v-form
                    ref="loginForm"
                >
                    <v-text-field
                        label="Email"
                        name="email"
                        v-model="email"
                        :rules="validation.email"
                        :error-messages="backendValidation.email"
                        required
                    />

                    <v-text-field
                        name="password"
                        type="password"
                        label="Password"
                        v-model="password"
                        :rules="validation.password"
                        required
                    />

                    <v-row>
                        <v-col>
                            <v-checkbox label="Remember me?" v-model="rememberMe" required/>
                        </v-col>
                        <v-col cols="3">
                            <v-btn @click="userLogin" class="mt-3" color="success">
                                Login
                            </v-btn>
                        </v-col>
                    </v-row>
                </v-form>
            </div>
        </v-container>
    </v-card>
</template>
<script>
import {required, email, min, max} from "../../data/validation/vuetify-validation";

export default {
    data: () => ({
        email: '',
        password: '',
        rememberMe: false,

        validation: {
            email: [required, email, min, max],
            password: [required, min, (v) => max(v, 30)]
        },
    }),
    computed: {
        backendValidation() {
            return this.$store.getters.getServerValidationErrors;
        }
    },
    methods: {
        async userLogin() {
            if(this.$refs.loginForm.validate()) {
                const {success} = await this.$store.dispatch('login', {
                    email: this.email,
                    password: this.password,
                    rememberMe: this.rememberMe,
                })

                if(success) {
                    await this.$router.push({name: 'dashboard'})
                }
            }
        }
    }
}
</script>
<style scoped>
.login-form__margin {
    margin-top: 12.5%;
}
</style>

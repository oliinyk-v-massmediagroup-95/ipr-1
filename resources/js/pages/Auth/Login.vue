<template>
    <v-card class="mx-auto login-form__margin" width="600">
        <v-container>
            <div class="px-10 pt-10 pb-6">
                <h2 class="mb-6">Login Form</h2>
                <v-form
                    ref="loginForm"
                    lazy-validation
                >
                    <v-text-field
                        label="Email"
                        v-model="email.value"
                        :rules="email.validation"
                        required
                    />

                    <v-text-field
                        type="password"
                        label="Password"
                        required
                    />


                    <v-row>
                        <v-col>
                            <v-checkbox label="Remember me?" required/>
                        </v-col>
                        <v-col cols="3">
                            <v-btn class="mt-3" color="success" @click="login">
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
        email: {
            value: '',
            validation: [required, email, min, max]
        },
        password: {
            value: '',
            validation: [required, min, (v) => max(v, 30)]
        },
    }),
    methods: {
        login() {
            console.log(this.$refs.loginForm.validate());
        }
    }
}
</script>
<style scoped>
.login-form__margin {
    margin-top: 12.5%;
}
</style>

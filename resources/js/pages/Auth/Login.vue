<template>
    <v-card class="mx-auto login-form__margin" width="600">
        <v-container>
            <div class="px-10 pt-10 pb-6">
                <h2 class="mb-6">Login Form</h2>
                <v-form
                    ref="form"
                    lazy-validation
                >
                    <v-text-field label="Email"  required/>

                    <v-text-field type="password" label="Password" required/>

                    <v-row>
                        <v-col>
                            <v-checkbox label="Remember me?" required/>
                        </v-col>
                        <v-col cols="3">
                            <v-btn class="mt-3" color="success">
                                Validate
                            </v-btn>
                        </v-col>
                    </v-row>
                </v-form>
            </div>
        </v-container>

    </v-card>
</template>
<script>
export default {

}
</script>
<style scoped>
.login-form__margin {
    margin-top: 12.5%;
}
</style>

<template>
<!--    <main-template>-->
<!--        <h1>Test</h1>-->
<!--    </main-template>-->
<!--    TODO: complete login-->
    <guest-template>
        <login />
    </guest-template>
</template>
<script>
import MainTemplate from './pages/Layouts/Main/Template'
import GuestTemplate from './pages/Layouts/Guest/Template'
import Login from "./pages/Auth/Login";

export default {
    components: {
        MainTemplate,
        GuestTemplate,
        Login
    },
}
</script>

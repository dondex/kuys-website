<template>
    <div>
        <Navbar/>
        <Home/>
        <Footer />
    </div>
</template>

<script>
import Navbar from './components/Navbar.vue';
import Home from './pages/Home.vue';
import Footer from './components/Footer.vue';
import '../../node_modules/boxicons/css/boxicons.min.css'



export default {
    name: "App",
    components: {
        Home,
        Navbar,
        Footer
    }
}

</script>



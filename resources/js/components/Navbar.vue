<template>
    <div>
            <div id="topbar" class="d-flex align-items-center fixed-top">
                <div class="container d-flex justify-content-center justify-content-md-between">

                    <div class="contact-info d-flex align-items-center">
                        <i class="bi bi-phone d-flex align-items-center"><span>+058 240 6854</span></i>
                        <i class="bi bi-clock d-flex align-items-center ms-4"><span> Mon-Sat: 11AM - 23PM</span></i>
                    </div>

                    <div class="languages d-none d-md-flex align-items-center">
                        <ul>
                            <li>En</li>
                            <li><a href="#">De</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <header id="header" class="fixed-top d-flex align-items-cente">
                <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

                <h1 class="logo me-auto me-lg-0"><a href="index.html">KUY's Grill & Restaurant</a></h1>


                <nav id="navbar" class="navbar order-last order-lg-0">
                    <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <li><a class="nav-link scrollto" href="#menu">Menu</a></li>
                    <li><a class="nav-link scrollto" href="#specials">Specials</a></li>

                    <li><a class="nav-link scrollto" href="#gallery">Gallery</a></li>


                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav>
                <a href="#book-a-table" class="book-a-table-btn scrollto d-none d-lg-flex">Book a table</a>

                </div>
            </header>

            <!-- ======= Hero Section ======= -->
            <Hero/>
            <!-- End Hero -->
    </div>
</template>

<script >
import Hero from './Hero.vue';


export default {
    name: 'Navbar',
    components: {
        Hero
    }
}


</script>

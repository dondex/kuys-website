<template>
    <div class="menu">
      <div class="menu-filters">
        <ul id="menu-flters">
          <li class="filter-active" data-filter="*">All</li>
          <li data-filter=".starter">Starter</li>
          <li data-filter=".main-course">Main Course</li>
          <li data-filter=".desserts">Desserts</li>
        </ul>
      </div>


      <div class="row menu-container" style="margin: auto; width: 1400px;" >
        <div v-for="item in menuItems" :key="item.id" class="col-lg-6 menu-item filter-grillbundle" :class="[item.category]">
            <img :src="item.image" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">{{ item.name }}</a><span>{{ item.price }}</span>
            </div>
        </div>
      </div>
    </div>
  </template>

  <script>
  import Isotope from 'isotope-layout';

  export default {
    data() {
      return {
        menuItems: [
          {
            id: 1,
            name: 'Caesar Salad',
            description: 'Crisp romaine lettuce, croutons, and parmesan cheese',
            category: 'starter',
            price: '22 SR',
            image: 'https://kristineskitchenblog.com/wp-content/uploads/2020/06/italian-salad-1401-2.jpg'
          },
          {
            id: 2,
            name: 'Grilled Steak',
            description: 'Served with roasted potatoes and seasonal vegetables',
            category: 'main-course',
            price: '30 SR',
            image: 'https://i0.wp.com/kristineskitchenblog.com/wp-content/uploads/2022/05/how-to-grill-steak-14-3.jpg?fit=1200%2C1800&ssl=1'
          },
          {
            id: 3,
            name: 'Chocolate Cake',
            description: 'Rich chocolate cake with a chocolate ganache',
            category: 'desserts',
            price: '20 SR',
            image: 'https://sallysbakingaddiction.com/wp-content/uploads/2013/04/triple-chocolate-cake-4.jpg'
          },
        ],
      };
    },

    mounted() {
      let menuContainer = this.$el.querySelector('.menu-container');

      if (menuContainer) {
        let menuIsotope = new Isotope(menuContainer, {
          itemSelector: '.menu-item',
          layoutMode: 'fitRows',
        });

        let menuFilters = this.$el.querySelectorAll('#menu-flters li');

        menuFilters.forEach((el) => {
          el.addEventListener('click', (e) => {
            e.preventDefault();
            menuFilters.forEach((el) => {
              el.classList.remove('filter-active');
            });
            el.classList.add('filter-active');

            menuIsotope.arrange({
              filter: el.getAttribute('data-filter'),
            });

            menuIsotope.on('arrangeComplete', () => {
              AOS.refresh();
            });
          });
        });
      }
    },
  };
</script>

<style >

</style>

<template>
    <form @submit.prevent="submit" class="php-email-form">
            <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" class="form-control" id="name" v-model="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" id="email" v-model="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control"  id="subject" v-model="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" id="message" v-model="message" rows="8" placeholder="Message" required></textarea>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
    </form>
  </template>

  <script>
  import axios from 'axios';
  import Swal from 'sweetalert2';

  export default {
    data() {
      return {
        name: '',
        email: '',
        subject: '',
        message: '',
      }
    },
    methods: {
      submit() {
        axios.post('/api/inquiries', {
          name: this.name,
          email: this.email,
          subject: this.subject,
          message: this.message,
        })
        .then(response => {
          Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'Your inquiry has been sent.',
          })
        })
        .catch(error => {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong! Please try again later.',
          })
        });
      }
    }
  }
  </script>

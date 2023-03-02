<template>
    <form @submit.prevent="submit">
      <div>
        <label for="name">Name:</label>
        <input type="text" id="name" v-model="name">
      </div>
      <div>
        <label for="email">Email:</label>
        <input type="email" id="email" v-model="email">
      </div>
      <div>
        <label for="subject">Subject:</label>
        <input type="text" id="subject" v-model="subject">
      </div>
      <div>
        <label for="message">Message:</label>
        <textarea id="message" v-model="message"></textarea>
      </div>
      <button type="submit">Submit</button>
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

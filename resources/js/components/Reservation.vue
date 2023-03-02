<template>
    <div>
        <form @submit.prevent="submitForm">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" v-model="form.name" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" v-model="form.email" required>
      </div>
      <div class="form-group">
        <label for="phone_number">Phone Number:</label>
        <input type="text" class="form-control" id="phone_number" v-model="form.phone_number" required>
      </div>
      <div class="form-group">
        <label for="date">Date:</label>
        <input type="date" class="form-control" id="date" v-model="form.date" required>
      </div>
      <div class="form-group">
        <label for="time">Time:</label>
        <input type="time" class="form-control" id="time" v-model="form.time" required>
      </div>
      <div class="form-group">
        <label for="number_of_guests">Number of Guests:</label>
        <input type="number" class="form-control" id="number_of_guests" v-model="form.number_of_guests" required>
      </div>
      <div class="form-group">
        <label for="message">Message:</label>
        <textarea class="form-control" id="message" v-model="form.message"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>

    </form>

    </div>
  </template>

  <script>
  import axios from 'axios';
  import Swal from 'sweetalert2'


  export default {

    data() {
      return {
        form: {
          name: '',
          email: '',
          phone_number: '',
          date: '',
          time: '',
          number_of_guests: '',
          message: '',
          success: false,
        }
      }
    },
    methods: {
      submitForm() {
        const data = {
          name: this.form.name,
          email: this.form.email,
          phone_number: this.form.phone_number,
          date: this.form.date,
          time: this.form.time,
          number_of_guests: this.form.number_of_guests,
          message: this.form.message,
        };
        axios.post('/api/book-reservation', data)
          .then(response => {
            // Reset the form data and set the success property to true
            this.form.name = '';
            this.form.email = '';
            this.form.phone_number = '';
            this.form.date = '';
            this.form.time = '';
            this.form.number_of_guests = '';
            this.form.message = '';
            this.form.success = true;

            // Show success message using sweetalert2
            Swal.fire({
            icon: 'success',
            title: 'Form submitted successfully!',
            showConfirmButton: false,
            timer: 2000
            })
          })
          .catch(error => {
            console.error(error);
          });
      },
    }
  }
  </script>

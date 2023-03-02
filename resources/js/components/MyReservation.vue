<template>
    <div>


        <section id="book-a-table" class="book-a-table">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Reservation</h2>
          <p>{{ reservationMade ? 'Reservation Made' : 'Book a Table' }}</p>
        </div>

        <form @submit.prevent="submitForm" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
          <div class="row">
            <div class="col-lg-4 col-md-6 form-group">
              <input v-model="form.name" required type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
              <input v-model="form.email" required type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
              <input v-model="form.phone_number" required type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3">
              <input v-model="form.date" required type="date" name="date" class="form-control" id="date" placeholder="Date" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3">
              <input v-model="form.time" required type="time" class="form-control" name="time" id="time" placeholder="Time" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3">
              <input v-model="form.number_of_guests" required type="number" class="form-control" name="people" id="people" placeholder="# of people" data-rule="minlen:1" data-msg="Please enter at least 1 chars">
              <div class="validate"></div>
            </div>
          </div>
          <div class="form-group mt-3">
            <textarea v-model="form.message" id="message" class="form-control" name="message" rows="5" placeholder="Message"></textarea>
            <div class="validate"></div>
          </div>
          <div class="mb-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!</div>
          </div>
          <div class="text-center"><button :disabled="reservationMade" type="submit">{{ reservationMade ? 'Reservation Made' : 'Book a Table' }}</button></div>
        </form>

      </div>
    </section>
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
            },
            reservationMade: false,
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
            axios.get('/api/check-reservation', { params: data })
                .then(response => {
                    if (response.data.exists) {
                        // Reservation already exists, show error message
                        Swal.fire({
                            icon: 'error',
                            title: 'Reservation already exists!',
                            text: 'You have already booked a table for this date and time.',
                        })
                    } else {
                        // Reservation does not exist, send request to server
                        if (this.reservationMade) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Reservation already made!',
                                text: 'You have already made a reservation. Please wait for confirmation.',
                            });
                            return;
                        }
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
                                this.reservationMade = true;

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
                    }
                })
                .catch(error => {
                    console.error(error);
                });
        }

    }

  }
  </script>

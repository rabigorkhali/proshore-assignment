<!-- MessageShow.vue -->
<template>
    <div class="modal-body message-body">
      <div class="container">
        <div v-if="errorMessage" :class="alertClass" role="alert">
          <a href="#" class="close" @click="clearError" aria-label="Close">×</a>
          <p class="" style="margin-bottom: 0; margin-right: 2px;">
            <span class="fa fa-exclamation-triangle" aria-hidden="true"></span>&nbsp;{{ errorMessage }}
          </p>
        </div>
        <a href="#" @click="goBack" class="btn btn-info btn-sm">Back</a>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        errorMessage: '',
        alertClass: ''
      };
    },
    methods: {
      clearError() {
        this.errorMessage = '';
      },
      goBack() {
        window.history.back();
      }
    },
    mounted() {
      // Mocking Vuex store state for testing purposes
      this.errorMessage = 'Sample error message';
      this.alertClass = 'alert alert-danger';
    }
  };
  </script>
  
  <style>
  /* Add any custom styles here */
  </style>
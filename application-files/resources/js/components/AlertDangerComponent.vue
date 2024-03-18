<!-- resources/js/components/AlertDangerComponent.vue -->

<template>
    <div class="alert alert-danger" role="alert" :style="{ backgroundColor: bgColor, color: textColor }">
        <a href="#" class="close" @click="dismissAlert" aria-label="Close"
            style="position: absolute; top: 0; right: 2px; color: white; text-decoration: none;">×</a>
        <p class="" style="margin-bottom: 0; margin-right: 2px;">
            <span class="fa fa-exclamation-triangle" aria-hidden="true"></span>&nbsp;{{ message }}
        </p>
    </div>
</template>

<script>
export default {
    props: {
        message: {
            type: String,
            required: true
        },
        bgColor: {
            type: String,
            default: '#dc3545'
        },
        textColor: {
            type: String,
            default: 'white'
        }
    },
    methods: {
        dismissAlert() {
            this.$emit('dismiss');
        }
    }
};
</script>

<style scoped>
/* Component-specific styles can go here */
</style>

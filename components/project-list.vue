<template>
  <div>projects</div>

  <section v-if="pending">Loading...</section>
  <section v-else-if="error">Something went wrong... Try again!</section>
  <section v-else>Here we display the repos!</section>
</template>

<script setup lang="ts">
const { error, pending, data } = useFetch('https://api.github.com/users/piotr-jura-udemy/repos')
</script>

<style scoped></style>

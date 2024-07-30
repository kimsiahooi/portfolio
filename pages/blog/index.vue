<template>
  <section>
    <ul>
      <li v-for="post in posts" :key="post._path">
        <NuxtLink :to="post._path">{{ post.title }}</NuxtLink>
      </li>
    </ul>
  </section>
</template>

<script setup lang="ts">
const posts = await queryContent('/blog').only(['_path', 'title']).find()
// const { data: posts } = await useAsyncData('blog-list', () => queryContent('/blog').only(['_path', 'title']).find())
</script>

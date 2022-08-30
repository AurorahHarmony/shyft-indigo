<script setup>
const props = defineProps({
  href: String,
  icon: String,
});
</script>
<template>
  <Link :href="href">
    <div class="sidebar-link">
      <font-awesome-icon :icon="icon" /> <span class="text"><slot /></span>
    </div>
  </Link>
</template>

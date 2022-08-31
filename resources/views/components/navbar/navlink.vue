<script setup>
const props = defineProps({
  href: String,
  icon: String,
});
</script>
<template>
  <Link :href="href">
    <div class="sidebar-link my-1">
      <font-awesome-icon :icon="icon" class="me-2" />
      <span class="text"><slot /></span>
    </div>
  </Link>
</template>

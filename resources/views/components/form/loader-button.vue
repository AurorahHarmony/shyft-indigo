<script setup>
defineProps({
  loading: { type: Boolean, default: false },
});
</script>
<template>
  <button
    class="btn"
    :class="$attrs.class ? $attrs.class : 'btn-primary'"
    :disabled="loading"
  >
    <span v-if="loading">
      <span
        class="spinner-border spinner-border-sm"
        role="status"
        aria-hidden="true"
      ></span>
      Loading
    </span>
    <span v-else><slot /></span>
  </button>
</template>

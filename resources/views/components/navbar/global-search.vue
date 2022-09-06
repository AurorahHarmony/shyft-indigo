<script setup>
import { ref, computed } from 'vue';
const searchQuery = ref('');
const showResults = computed(() => {
  return searchQuery.value.length > 0;
});
</script>
<template>
  <form class="col-6 col-md-5 col-xl-4 col-xxl-3">
    <div class="autocomplete">
      <input
        class="form-control me-2 font-code"
        :class="showResults ? 'rounded-0 rounded-top' : ''"
        type="search"
        placeholder="Search"
        v-model="searchQuery"
      />
      <div class="autocomplete-items" v-if="showResults">
        <div class="autocomplete-item">
          <b>Job:</b> <span class="font-code">#{{ searchQuery }}</span>
        </div>
        <div class="autocomplete-item">
          <b>Client:</b> <span class="font-code">#{{ searchQuery }}</span>
        </div>
        <div class="autocomplete-item">
          <b>Inventory:</b> <span class="font-code">#{{ searchQuery }}</span>
        </div>
        <!-- <hr class="my-1" />
        <div class="autocomplete-category">Clients</div>
        <div class="autocomplete-item" v-for="i in 5" :key="i">
          John Doe (#1234567{{ i }})
        </div> -->
      </div>
    </div>
  </form>
</template>
<style scoped lang="scss">
/* https://www.w3schools.com/howto/howto_js_autocomplete.asp */
</style>

<script setup>
import { ref, computed } from 'vue';
const autoCompleteItems = ref(null);
const searchQuery = ref('');
const showResults = ref(false);

let currentFocus = -1;
const updateAutoComplete = (input) => {
  currentFocus = -1;

  if (searchQuery.value.length > 0) {
    showResults.value = true;
  } else {
    showResults.value = false;
  }
};

const handleKeyDown = (e) => {
  if (!autoCompleteItems.value) return;
  const x = autoCompleteItems.value.querySelectorAll('.autocomplete-item');
  if (e.keyCode == 40) {
    // If the down arrow is pressed
    e.preventDefault();
    currentFocus++;
    setActive(x);
  } else if (e.keyCode == 38) {
    // If the up arrow is pressed
    e.preventDefault();
    currentFocus--;
    setActive(x);
  } else if (e.keyCode == 13) {
    // If the enter key is pressed
    if (currentFocus > -1) {
      e.preventDefault();
      if (x) x[currentFocus].click();
    }
  } else if (e.keyCode == 27) {
    // If the escape key is pressed
    e.preventDefault();
    currentFocus = -1;
    removeActive(x);
  }
};

function setActive(x) {
  if (!x) return false;
  removeActive(x);
  if (currentFocus >= x.length) currentFocus = 0;
  if (currentFocus < 0) currentFocus = x.length - 1;
  x[currentFocus].classList.add('active');
}

function removeActive(x) {
  for (var i = 0; i < x.length; i++) {
    x[i].classList.remove('active');
  }
}
</script>
<template>
  <form class="col-6 col-md-5 col-xl-4 col-xxl-3">
    <div class="autocomplete">
      <form method="get">
        <input
          class="form-control me-2 font-code"
          :class="showResults ? 'rounded-0 rounded-top' : ''"
          type="search"
          placeholder="Search"
          @input="updateAutoComplete"
          @keydown="handleKeyDown"
          v-model="searchQuery"
        />
      </form>
      <div
        class="autocomplete-items"
        ref="autoCompleteItems"
        v-if="showResults"
      >
        <Link :href="`/job/${searchQuery}`" as="div" class="autocomplete-item">
          <b>Job:</b> <span class="font-code">#{{ searchQuery }}</span>
        </Link>
        <Link
          :href="`/client/${searchQuery}`"
          as="div"
          class="autocomplete-item"
        >
          <b>Client:</b> <span class="font-code">#{{ searchQuery }}</span>
        </Link>
        <Link
          :href="`/inventory/${searchQuery}`"
          as="div"
          class="autocomplete-item"
        >
          <b>Inventory:</b> <span class="font-code">#{{ searchQuery }}</span>
        </Link>
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

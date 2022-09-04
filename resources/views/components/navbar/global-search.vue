<template>
  <form class="col-6 col-md-5 col-xl-4 col-xxl-3">
    <div class="autocomplete">
      <input
        class="form-control me-2 font-code"
        type="search"
        placeholder="Search"
      />
      <div class="autocomplete-items">aaa</div>
    </div>
  </form>
</template>
<style scoped>
.autocomplete {
  position: relative;
}
.autocomplete input {
  position: relative;
  z-index: 50;
}
.autocomplete-items {
  position: absolute;
  z-index: 40;
  top: calc(100% - 5px);
  left: 0;
  right: 0;
  background: #ffffff;
  padding: 1.25rem;
  border: 1px solid #ced4da;
  border-radius: 0 0 0.375rem 0.375rem;
}

/* https://www.w3schools.com/howto/howto_js_autocomplete.asp */
</style>

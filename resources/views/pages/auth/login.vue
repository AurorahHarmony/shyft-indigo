<script setup>
import '../../../sass/backgrounds.scss'
</script>
<template layout="no-wrapper">
  <div class="content bg-cogs">
    <div class="form-signin bg-white rounded shadow">
      <form class="text-center" @submit.prevent="userLogin">
        <img class="mb-3" src="/image/shyft-blue.png" alt="" height="57" />

        <input
          type="text"
          class="form-control"
          placeholder="Username"
          required
          autofocus
          autocapitalize="none"
        />

        <input
          type="password"
          class="form-control"
          placeholder="Password"
          required
          autocapitalize="none"
        />
        <button class="w-100 btn btn-lg btn-primary">Sign in</button>
      </form>
    </div>
  </div>
</template>

<style scoped>
.content {
  height: 100vh;
  display: flex;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
}
.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="text"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>

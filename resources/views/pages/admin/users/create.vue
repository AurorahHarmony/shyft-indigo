<script setup>
import ContentCard from '../../../components/content-card.vue';
</script>
<template layout>
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6 col-xl-5 col-xxl-4">
      <ContentCard>
        <p class="h4">Create a new user</p>
        <form action="">
          <div class="mb-2">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" />
          </div>
          <div class="mb-2">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" />
          </div>
          <div class="mb-2">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" />
          </div>
          <div class="mb-2">
            <label for="confirm_password" class="form-label">
              Confirm password
            </label>
            <input type="password" class="form-control" id="confirm_password" />
          </div>
          <div class="d-flex justify-content-between">
            <Link href="/admin/users" class="btn btn-outline-danger me-2">
              Cancel
            </Link>
            <button class="btn btn-primary">Create user</button>
          </div>
        </form>
      </ContentCard>
    </div>
  </div>
</template>

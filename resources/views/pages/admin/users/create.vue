<script setup>
import ContentCard from '../../../components/content-card.vue';

defineProps({
  user: Object,
});
</script>
<template layout>
  <div>
    <Link href="/admin/users" class="btn btn-primary mb-2">&lt; All users</Link>
    <div class="row">
      <div class="col-md-6 mb-2">
        <ContentCard class="p-3">
          <p class="h4">Person's name</p>
          <form>
            <div class="row mb-2">
              <label for="name" class="col-sm-3 col-form-label"> Name </label>
              <div class="col-10 col-sm-8">
                <input
                  type="text"
                  disabled
                  class="form-control"
                  id="name"
                  :value="user.name"
                />
              </div>
            </div>
            <div class="row mb-2">
              <label for="username" class="col-sm-3 col-form-label">
                Username
              </label>
              <div class="col-sm-8">
                <input
                  type="text"
                  disabled
                  class="form-control"
                  id="username"
                  :value="user.username"
                />
              </div>
            </div>
            <div class="row mb-2">
              <label for="email" class="col-sm-3 col-form-label">Email</label>
              <div class="col-sm-8">
                <input
                  type="email"
                  disabled
                  class="form-control"
                  id="email"
                  :value="user.email"
                />
              </div>
            </div>
            <hr />
            <div class="row mb-2">
              <label for="password" class="col-sm-3 col-form-label">
                Password
              </label>
              <div class="col-sm-8">
                <input
                  type="password"
                  disabled
                  class="form-control"
                  id="password"
                  value="********"
                />
              </div>
              <div class="col-1 d-flex align-items-center">
                <a href="#" class="text-decoration-none">Edit</a>
              </div>
            </div>
          </form>
        </ContentCard>
      </div>
      <div class="col-md-6">
        <ContentCard>
          <p class="h4">Login History</p>
          <table class="table mb-0">
            <thead>
              <tr>
                <th scope="col">Device</th>
                <th scope="col">Location</th>
                <th scope="col" class="text-end">Time</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="index in 5" :key="index">
                <td>Windows PC</td>
                <td>192.168.1.1</td>
                <td class="text-muted text-end">12:45pm, 5 December 2022</td>
              </tr>
            </tbody>
          </table>
        </ContentCard>
      </div>
    </div>
  </div>
</template>

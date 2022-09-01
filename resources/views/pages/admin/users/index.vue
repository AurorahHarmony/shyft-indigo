<template layout>
  <div>
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">Users</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Events</a>
      </li>
    </ul>

    <div class="bg-white border rounded-bottom px-2 py-3">
      <form class="mb-2">
        <div class="row">
          <div class="col-3">
            <input class="form-control" type="search" placeholder="Search" />
          </div>
        </div>
      </form>
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Last Login</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="index in 20" :key="index">
            <th scope="row">A Name</th>
            <td class="text-muted">10:45pm, 4th January 2020</td>
            <td class="text-end">
              <button class="btn btn-primary btn-sm">View</button>
            </td>
          </tr>
        </tbody>
      </table>

      <div class="px-1 text-center mb-2">
        <button class="btn btn-outline-primary btn-sm">+ Create User</button>
      </div>
    </div>
  </div>
</template>

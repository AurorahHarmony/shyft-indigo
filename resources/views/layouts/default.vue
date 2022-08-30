<script setup>
import { ref } from 'vue';
let expandNav = ref(true);
</script>

<template>
  <Head title=" "></Head>
  <div>
    <div class="sidebar" :class="expandNav ? 'expanded' : ''">
      <div class="w-100 text-center">
        <img
          class="sidebar-logo"
          v-if="expandNav"
          src="/image/shyft.png"
          height="40"
        />
        <img
          class="sidebar-logo"
          v-if="!expandNav"
          src="/image/shyft-s.png"
          height="40"
        />
      </div>
      <hr />
      <ul>
        <li>
          <Link href="/">
            <div class="sidebar-link">
              <font-awesome-icon icon="fa-solid fa-house" /> Dashboard
            </div>
          </Link>
        </li>
        <li>
          <Link href="/jobs">
            <div class="sidebar-link">Jobs</div>
          </Link>
        </li>
        <li>
          <hr />
        </li>
        <li>
          <button
            class="btn btn-primary w-100 mt-1 d-lg-none"
            @click="expandNav = !expandNav"
          >
            Close
          </button>
        </li>
      </ul>
    </div>
    <div class="main" :class="expandNav ? 'sidebar-expanded' : ''">
      <nav
        class="navbar navbar-expand navbar-light bg-light position-sticky"
        style="top: 0"
      >
        <div class="container-fluid">
          <button
            class="sidebar-expander"
            @click="expandNav = !expandNav"
            type="button"
          >
            X
          </button>

          <form class="d-flex">
            <input
              class="form-control me-2 font-code"
              type="search"
              placeholder="Search"
            />
          </form>

          <ul class="navbar-nav">
            <li class="nav-item me-2">
              <a href="#" class="nav-link h-100 p-0" style="margin-right: 2rem">
                <font-awesome-icon class="h-100" icon="fa-solid fa-qrcode" />
              </a>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle text-capitalize"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
              >
                {{ user.name }}
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                  <div class="px-2">
                    <Link href="/logout" class="btn btn-danger btn-sm w-100">
                      Logout
                    </Link>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
      <div class="p-2">
        <slot />
      </div>
    </div>
  </div>
</template>
<script>
export default {
  computed: {
    user() {
      return this.$page.props.auth?.user || false;
    },
  },
};
</script>

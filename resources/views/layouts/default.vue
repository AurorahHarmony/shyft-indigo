<script setup>
import NavLink from '@/views/components/navbar/navlink.vue';
import GlobalSearch from '@/views/components/navbar/global-search.vue';
import { onMounted, ref } from 'vue';

let expandNav = ref(false);
onMounted(() => {
  const storedNavState = localStorage.getItem('expandNav');
  if (storedNavState === 'true' && window.innerWidth > 991) {
    expandNav.value = true;
  }
});

const toggleNav = () => {
  expandNav.value = !expandNav.value;
  localStorage.setItem('expandNav', expandNav.value);
};
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
      <hr class="mb-2" />
      <ul>
        <li>
          <NavLink
            href="/"
            icon="fa-solid fa-house"
            :class="{ active: $page.component === 'dashboard' }"
            >Dashboard</NavLink
          >
        </li>
        <li>
          <NavLink
            href="/jobs"
            icon="fa-solid fa-wrench"
            :class="{ active: $page.component.startsWith('jobs') }"
            >Jobs</NavLink
          >
        </li>
        <li>
          <hr class="my-2" />
        </li>
        <li>
          <NavLink
            href="/admin"
            icon="fa-solid fa-gears"
            :class="{ active: $page.component.startsWith('admin') }"
            >Admin</NavLink
          >
        </li>
        <li>
          <button
            class="btn btn-primary w-100 mt-1 d-lg-none"
            @click="toggleNav"
          >
            Close
          </button>
        </li>
      </ul>
    </div>
    <div class="main" :class="expandNav ? 'sidebar-expanded' : ''">
      <nav
        class="
          navbar navbar-expand navbar-light
          bg-light
          position-sticky
          border-bottom
        "
        style="top: 0"
      >
        <div class="container-fluid">
          <button class="sidebar-expander" @click="toggleNav" type="button">
            <font-awesome-icon icon="fa-solid fa-bars" />
          </button>

          <GlobalSearch />

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
              <ul class="dropdown-menu dropdown-menu-end text-end">
                <li>
                  <Link class="dropdown-item" :href="`/admin/users/${user.id}`"
                    >My Account</Link
                  >
                </li>
                <li>
                  <Link class="dropdown-item" href="/admin/users"
                    >Administration</Link
                  >
                </li>
                <li><hr class="dropdown-divider" /></li>
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
      <div class="py-2 container-fluid">
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

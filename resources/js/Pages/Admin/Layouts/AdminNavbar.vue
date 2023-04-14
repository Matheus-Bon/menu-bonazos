<script setup>
import UserDropdown from "@/Pages/Admin/Components/UserDropdown.vue";
import { Link } from "@inertiajs/vue3";

</script>

<template>
  <!-- Navbar -->
  <nav
    class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4"
  >
    <div
      class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4"
    >
      <!-- Brand -->
      <Link
        class="text-white text-sm uppercase hidden lg:inline-block font-semibold"
        href="javascript:void(0)"
      >
        Dashboard
      </Link>
      <!-- Form -->
      
      <!-- User -->
      <ul class="flex-col md:flex-row list-none items-center hidden md:flex">
        <UserDropdown />
      </ul>
    </div>
  </nav>
  <!-- End Navbar -->
</template>


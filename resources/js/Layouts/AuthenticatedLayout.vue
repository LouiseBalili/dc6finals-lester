<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';

import { onMounted, provide } from 'vue';
const selectedColor = ref('green'); // Default background color
provide('color', selectedColor)

const showingNavigationDropdown = ref(false);
const sidebarWidth = ref(200); // Initial width of the sidebar
const minSidebarWidth = 64; // Minimum width of the sidebar
const maxSidebarWidth = 200; // Maximum width of the sidebar
const smallSizeThreshold = 100; // Adjust this threshold as needed

const toggleSidebarWidth = () => {
  sidebarWidth.value = sidebarWidth.value === minSidebarWidth ? maxSidebarWidth : minSidebarWidth;
};
</script>



<template>
  <div class="min-h-screen flex bg-gray-100 dark:bg-gray-900">
    <!-- Sidebar -->
    <aside :style="{ width: `${sidebarWidth}px`, transition: 'width 0.5s' }" class="bg-white dark:bg-gray-900 border-r border-gray-100 dark:border-gray-700">
      <!-- Resizable Button -->
      <div class="cursor-pointer" @click="toggleSidebarWidth">
        <div class="flex justify-end">
          <button v-if="sidebarWidth <= smallSizeThreshold" style="font-size: 30px;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                      </svg>
          </button>

          <button v-else style="font-size: 30px;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                      </svg>
          </button>
        </div>
      </div>

      <!-- Logo -->
      <div class="mt-5" style="display: grid; place-content: center;">
  <img width="150px" src="https://www.freepnglogos.com/uploads/original-samsung-logo-10.png" alt="">
</div>


      <!-- Links -->
      <div class="mt-10" style="display: grid; place-content: center;">
        <!-- Check if sidebarWidth is less than or equal to a threshold for small size -->
        <NavLink v-if="sidebarWidth <= smallSizeThreshold" style="font-size: 25px;" :href="route('dashboard')">
            <i class="fa-solid fa-house"></i>
        </NavLink>

        <!-- Otherwise, show only the icon -->
        <NavLink v-else style="font-size: 20px;" :href="route('dashboard')">
          <div style="width: 150px;"><i class="fa-solid fa-house"></i><span style="margin-left: 10px;">Home</span></div>
        </NavLink>

      </div>





         <!-- Links -->
      <div class="mt-10" style="display: grid; place-content: center;">
        <!-- Check if sidebarWidth is less than or equal to a threshold for small size -->
        <NavLink v-if="sidebarWidth <= smallSizeThreshold" style="font-size: 25px;" :href="route('index')">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
            <path fill-rule="evenodd" d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.970c-.135.100-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z" clip-rule="evenodd" />
            </svg>
        </NavLink>

        <!-- Otherwise, show only the icon -->
        <NavLink v-else style="font-size: 20px;" :href="route('index')" class="mr-12">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
            <path fill-rule="evenodd" d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.970c-.135.100-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z" clip-rule="evenodd" />
            </svg>
            <span class="text-gray-500 dark:text-gray-400 ml-2">Phones</span>
        </NavLink>


      </div>


            <!-- Links -->





       <!-- Links -->
       <div class="mt-10 mb-10" style="display: grid; place-content: center;">
        <!-- Check if sidebarWidth is less than or equal to a threshold for small size -->
        <NavLink v-if="sidebarWidth <= smallSizeThreshold" style="font-size: 25px;" :href="route('dateIndex')">
            <i class="fa-solid fa-calendar"></i>
        </NavLink>

        <!-- Otherwise, show only the icon -->
        <NavLink v-else style="font-size: 20px;" :href="route('dateIndex')">
          <div style="width: 150px;"><i class="fa-solid fa-calendar"></i><span style="margin-left: 7px;">Calendar</span></div>
        </NavLink>

      </div>



    </aside>



    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
      <nav class="bg-white dark:bg-white border-b border-gray-100 dark:border-gray-700">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class=" h-16 mt-5">


            <div class="hidden sm:flex sm:items-center sm:ms-6">
              <!-- Settings Dropdown -->
              <div class="ms-3 relative ml-auto">
                <Dropdown align="right" width="48">
                  <template #trigger>
                    <span class="inline-flex rounded-md">
                      <button
                        type="button"
                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-blue-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150"
                      >
                        {{ $page.props.auth.user.name }}
                        <svg
                          class="ms-2 -me-0.5 h-4 w-4"
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 20 20"
                          fill="currentColor"
                        >
                          <path
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"
                          />
                        </svg>
                      </button>
                    </span>
                  </template>

                  <template #content>
                    <DropdownLink :href="route('profile.edit')"> Profile </DropdownLink>
                    <DropdownLink :href="route('logout')" method="post" as="button">
                      Log Out
                    </DropdownLink>
                  </template>
                </Dropdown>
              </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
              <button
                @click="showingNavigationDropdown = !showingNavigationDropdown"
                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out"
              >
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                  <path
                    :class="{
                      hidden: showingNavigationDropdown,
                      'inline-flex': !showingNavigationDropdown,
                    }"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16"
                  />
                  <path
                    :class="{
                      hidden: !showingNavigationDropdown,
                      'inline-flex': showingNavigationDropdown,
                    }"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M6 18L18 6M6 6l12 12"
                  />
                </svg>
              </button>
            </div>
          </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div
          :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }"
          class="sm:hidden"
        >
          <div class="pt-2 pb-3 space-y-1">
            <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
              Dashboard
            </ResponsiveNavLink>
          </div>

          <!-- Responsive Settings Options -->
          <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
              <div class="font-medium text-base text-gray-800 dark:text-gray-200">
                {{ $page.props.auth.user.name }}
              </div>
              <div class="font-medium text-sm text-gray-500">{{ $page.props.auth.user.email }}</div>
            </div>

            <div class="mt-3 space-y-1">
              <ResponsiveNavLink :href="route('profile.edit')"> Profile </ResponsiveNavLink>
              <ResponsiveNavLink :href="route('logout')" method="post" as="button">
                Log Out
              </ResponsiveNavLink>
            </div>
          </div>
        </div>
      </nav>

      <!-- Page Heading -->
      <header class="bg-white dark:bg-gray-800 shadow" v-if="$slots.header">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
          <slot name="header" />
        </div>
      </header>

      <!-- Page Content -->
      <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 dark:bg-white">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
          <slot />
        </div>
      </main>
    </div>
  </div>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { onMounted, onUpdated, ref } from 'vue';

const isDarkMode = ref(JSON.parse(localStorage.getItem('theme')));

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
      <div class="py-12 fade-in">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

            <!-- Header -->
            <div class="p-6 text-gray-900 dark:text-gray-100">
              <h2 class="text-2xl font-semibold">Welcome to the Home of Samsung</h2>
              <p class="mt-2 text-gray-600 dark:text-gray-400">Discover all the fantastic reasons to buy directly from samsung.com - from flexible payments, free delivery, trade-in savings and much more.</p>
            </div>

            <hr>
            <div class="flex items-center">
            <h2 class="text-2xl font-semibold mt-5 ml-5 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                </svg>
                New Year Sale
            </h2>
            </div>




            <div class="p-6 text-gray-900 dark:text-gray-100 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-4">
            <!-- Product 1 -->
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-lg p-4 transition-transform transform hover:scale-105">
                <img src="https://images.samsung.com/is/image/samsung/assets/ph/offer/2023/product-cards/mx/discount-freebies-card/mx-F946BLBGPH-oe-pc---570X304.jpg?$FB_TYPE_J_S_JPG$" alt="Shoe" class="w-full h-32 object-cover mb-2">
                <h3 class="text-lg font-semibold">Galaxy Z Fold5</h3>
                <p class="text-gray-600 dark:text-gray-400">₱10,000 off</p>
                <p class="text-gray-600 dark:text-gray-400">NOW: ₱88,990</p>
                <button class="bg-black text-white px-3 py-1 rounded-full px-5 mt-2">Buy Now</button>
            </div>

            <!-- Product 2 -->
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-lg p-4 transition-transform transform hover:scale-105">
                <img src="https://images.samsung.com/is/image/samsung/assets/ph/offer/2023/product-cards/mx/freebies-card/mx-sm-s918bzgqphl-pc-570X304.jpg?$FB_TYPE_J_S_JPG$" alt="Shoe" class="w-full h-32 object-cover mb-2">
                <h3 class="text-lg font-semibold">Galaxy S23 Ultra</h3>
                <p class="text-gray-600 dark:text-gray-400">SRP: ₱81,990</p>
                <p class="text-gray-600 dark:text-gray-400">Free Galaxy Watch6 40mm</p>
                <button class="bg-black text-white px-3 py-1 rounded-full px-5 mt-2">Buy Now</button>
            </div>

           <!-- Product 3 -->
           <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-lg p-4 transition-transform transform hover:scale-105">
                <img src="https://images.samsung.com/is/image/samsung/assets/ph/offer/2024/product-cards/discount-card/TAB-S7-FE-LTE-SM-T735NZKZXTC_570x304-pc.jpg?$FB_TYPE_J_S_JPG$" alt="Shoe" class="w-full h-32 object-cover mb-2">
                <h3 class="text-lg font-semibold">Galaxy S7 FE</h3>
                <p class="text-gray-600 dark:text-gray-400">Get ₱6,000 off</p>
                <p class="text-gray-600 dark:text-gray-400">NOW: ₱39,990</p>
                <button class="bg-black text-white px-3 py-1 rounded-full px-5 mt-2">Buy Now</button>
            </div>


            <!-- Product 4 -->
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-lg p-4 transition-transform transform hover:scale-105">
                <img src="https://images.samsung.com/is/image/samsung/assets/ph/offer/2023/product-cards/mx/freebies-card/SM-A546ELGDPHL_570x304_YouMake.jpg?$FB_TYPE_J_S_JPG$" alt="Shoe" class="w-full h-32 object-cover mb-2">
                <h3 class="text-lg font-semibold">Galaxy A54 5G</h3>
                <p class="text-gray-600 dark:text-gray-400">SRP: ₱24,990</p>
                <p class="text-gray-600 dark:text-gray-400">Free 25W Travel Adapter</p>
                <button class="bg-black text-white px-3 py-1 rounded-full px-5 mt-2">Buy Now</button>
            </div>

            </div>

          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  </template>

<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    .fade-in {
        animation: fadeIn 0.3s ease-in-out; /* Adjust the duration and timing function as needed */
    }
</style>

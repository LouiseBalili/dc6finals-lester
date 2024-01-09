<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { inject, ref } from 'vue';
import Card from '@/Components/Card.vue';

// Use 'discount' as the default value if 'discountValue' is not provided
const discountValue = inject('discountValue');
</script>

<template>
    <Head title="Dashboard" />



    <AuthenticatedLayout>
        <div class="py-12 fade-in">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-blue-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Loop All Plugins Created / Tailwind Modal Create / Tailwind Modal Edit / Tailwind Modal Delete -->

                    <div v-for="discount in discounts" :key="discount.id">
                        <p class=""><b><i class="fa-solid fa-tag"></i> Discount:</b> ${{ discount.discount }}</p>
                    </div>
                    <div class="flex justify-between">
                        <header class="text-2xl flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 mx-3">
                            <path fill-rule="evenodd" d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.970c-.135.100-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z" clip-rule="evenodd" />
                        </svg>
                        Phones
                        </header>


                        <button @click="openCreateModal" class="bg-blue-600 text-white font-semibold p-3 rounded-full px-5 hover:bg-blue-800 duration-200"> C r e a t e  P h o n e</button>

                    </div>
                    <br> <hr> <br>

                    <div>
                        <!-- Loop All Plugin -->
                        <div class="">
                            <form @submit.prevent="submitFilter" class="flex flex-wrap items-center space-y-4 sm:space-y-0 sm:space-x-4 mb-5">
  <div class="flex items-center w-full sm:w-auto">
    <label for="startDate" class="mr-2 text-gray-800">Start Date:</label>
    <div class="relative flex items-center w-full max-w-xs">
      <input v-model="startDate" type="date" id="startDate" name="startDate"
        class="text-gray-800 py-2 px-3 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 flex-grow">
      <span class="absolute right-3 top-2.5">
        <i class="fas fa-calendar text-gray-400"></i>
      </span>
    </div>
  </div>

  <div class="flex items-center w-full sm:w-auto">
    <label for="endDate" class="mr-2 text-gray-800">End Date:</label>
    <div class="relative flex items-center w-full max-w-xs">
      <input v-model="endDate" type="date" id="endDate" name="endDate"
        class="text-gray-800 py-2 px-3 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 flex-grow">
      <span class="absolute right-3 top-2.5">
        <i class="fas fa-calendar text-gray-400"></i>
      </span>
    </div>
  </div>

  <button type="submit"
    class="bg-indigo-500 hover:bg-indigo-700 text-white py-2 px-4 rounded-md flex items-center space-x-2">
    <i class="fas fa-filter text-gray-100"></i>
    <span>Apply Filter</span>
  </button>
</form>


                            <div v-for="plugin in plugins" :key="plugin.id" class="mb-5">
  <div class="bg-gray-100 rounded-lg shadow-lg overflow-hidden">
    <div class="flex flex-col sm:flex-row">
      <div class="bg-slate-700 p-5 flex-grow">
        <h2 class="text-white text-2xl font-bold mb-3">{{ plugin.name }}</h2>
        <div class="text-gray-300 mb-2">Brand: {{ plugin.daws }}</div>
        <div class="text-gray-300 mb-2">Price: ${{ plugin.price }}</div>
      </div>
      <div class="flex items-center space-x-3 p-5">
        <button @click="openEditModal(plugin)" class="text-green-500 hover:text-green-600">
           Edit
        </button>
        <button @click="deletePlugin(plugin.id)" class="text-red-500 hover:text-red-600">
          Delete
        </button>
      </div>
    </div>
    <div class="bg-white text-gray-700 p-5">
      <div class="text-lg font-semibold mb-3">Description:</div>
      <p class="text-gray-600">{{ plugin.description }}</p>
    </div>
  </div>
</div>





                        </div>
                    </div>

                    <!-- Create Modal -->
<div v-if="showCreateModal" class="fixed z-10 inset-0 overflow-y-auto">
  <div class="flex items-center justify-center min-h-screen">
    <div class="fixed inset-0 bg-gray-900 opacity-70"></div>
    <div class="relative bg-white dark:bg-blue-800 w-96 p-6 rounded shadow-lg text-gray-900 dark:text-gray-100">
      <h2 class="text-2xl font-bold mb-4">Create Shoe</h2>

      <!-- Add your form elements for creating a new plugin -->

      <div class="flex justify-end mt-6">
        <form @submit.prevent="createPlugin">
          <div class="mb-4">
            <label for="name" class="text-sm font-medium">Name</label>
            <input style="width: 340px;" type="text" id="name" v-model="newPlugin.name" class="mt-1 p-2 bg-transparent border-b-2 border-0" required>
          </div>

          <div class="mb-4">
            <label for="description" class="block text-sm font-medium">Description</label>
            <textarea style="width: 340px;" id="description" v-model="newPlugin.description" class="mt-1 p-2 bg-transparent border-b-2 border-0" required></textarea>
          </div>

          <div class="mb-4">
            <label for="daws" class="block text-sm font-medium">Brand</label>
            <input style="width: 340px;" type="text" id="daws" v-model="newPlugin.daws" class="mt-1 p-2 bg-transparent border-b-2 border-0" required>
          </div>

          <div class="mb-4">
            <label for="price" class="block text-sm font-medium">Price</label>
            <input style="width: 340px;" type="number" id="price" v-model="newPlugin.price" class="mt-1 p-2 bg-transparent border-b-2 border-0" required>
          </div>

          <div class="flex justify-end mt-6">
            <button @click="closeCreateModal" class="bg-gray-700 hover:bg-gray-900 duration-200 text-white px-4 py-2 rounded mr-2"> Close</button>

            <button type="submit" class="bg-orange-600 hover:bg-orange-800 duration-200 text-white px-4 py-2 rounded "> Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



                    <!-- Edit Modal -->
<div v-if="showEditModal" class="fixed inset-0 flex items-center justify-center overflow-y-auto z-50">
  <div class="fixed inset-0 bg-black opacity-50"></div>
  <div class="relative bg-white dark:bg-blue-800 w-96 p-6 rounded shadow-lg text-gray-900 dark:text-gray-100">
    <h2 class="text-2xl font-bold mb-4">Edit Shoe</h2>

    <!-- Form for editing an existing plugin -->
    <form @submit.prevent="updatePlugin">
      <div class="mb-4">
        <label for="name" class="text-sm font-medium">Name</label>
        <input style="width: 100%;" type="text" id="name" v-model="editPlugin.name" class="mt-1 p-2 bg-transparent border-b-2 border-gray-300 focus:outline-none" required>
      </div>

      <div class="mb-4">
        <label for="description" class="block text-sm font-medium">Description</label>
        <textarea style="width: 100%;" id="description" v-model="editPlugin.description" class="mt-1 p-2 bg-transparent border-b-2 border-gray-300 focus:outline-none" required></textarea>
      </div>

      <div class="mb-4">
        <label for="daws" class="block text-sm font-medium">Brand</label>
        <input style="width: 100%;" type="text" id="daws" v-model="editPlugin.daws" class="mt-1 p-2 bg-transparent border-b-2 border-gray-300 focus:outline-none" required>
      </div>

      <div class="mb-4">
        <label for="price" class="block text-sm font-medium">Price</label>
        <input style="width: 100%;" type="number" id="price" v-model="editPlugin.price" class="mt-1 p-2 bg-transparent border-b-2 border-gray-300 focus:outline-none" required>
      </div>

      <div class="flex justify-end mt-6">
        <button @click="closeEditModal" class="bg-gray-700 hover:bg-gray-900 duration-200 text-white px-4 py-2 rounded mr-2">Close</button>

        <button type="submit" class="bg-blue-600 hover:bg-blue-800 duration-200 text-white px-4 py-2 rounded ">Update</button>
      </div>
    </form>
  </div>
</div>



                    </div>
                    <br>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script>
export default {
    props: {
        plugins: Array,
        discounts: Array,

    },
    data() {
        return {
            showCreateModal: false,
            showEditModal: false,
            showDeleteModal: false,
            selectedPlugin: null,
            showCreateModal: false,
            startDate: '',
            endDate: '',
            newPlugin: {
                name: '',
                description: '',
                daws: '',
                price: '',

            },
                editPlugin: {
                id: null,
                name: '',
                description: '',
                daws: '',
                price: 0,
            },
        };

    },

    computed: {
        filteredPlugins() {
            // Implement the logic to filter plugins based on start and end dates
            if (this.startDate && this.endDate) {
                const startTimestamp = new Date(this.startDate).getTime();
                const endTimestamp = new Date(this.endDate).getTime();

                return this.plugins.filter(plugin => {
                    const pluginDate = new Date(plugin.date).getTime();
                    return pluginDate >= startTimestamp && pluginDate <= endTimestamp;
                });
            } else {
                // Return all plugins if no date range is specified
                return this.plugins;
            }
        },
    },

    methods: {
        openCreateModal() {
            this.showCreateModal = true;
        },
        closeCreateModal() {
            this.showCreateModal = false;
        },

        openEditModal(plugin) {
            this.showEditModal = true;
            this.editPlugin = { ...plugin }; // Create a copy of the plugin details
        },
        closeEditModal() {
            this.showEditModal = false;
        },
        updatePlugin() {
            this.$inertia.put(`/plugins/${this.editPlugin.id}`, this.editPlugin).then(() => {
                this.closeEditModal();
            }).catch(error => {
                console.error('Error updating plugin:', error);
            });
        },
        openDeleteModal(pluginId) {
            this.selectedPluginId = pluginId;
            this.showDeleteModal = true;
        },
        closeDeleteModal() {
            this.selectedPluginId = null;
            this.showDeleteModal = false;
        },
        deletePlugin() {
            // Add logic to delete the selected plugin
            this.closeDeleteModal();
        },

        createPlugin() {
            this.$inertia.post('/plugins', this.newPlugin).then(() => {
                this.closeCreateModal();
            });
        },

        deletePlugin(pluginId) {
            if (confirm("Are you sure you want to delete this shoe?")) {
                this.$inertia.delete(`/plugins/${pluginId}`).then(() => {
                    // Optionally, you can fetch the updated data from the server and update the local state
                    // Example: this.fetchPluginData();

                    // You can also close the modal or perform other actions as needed
                }).catch(error => {
                    // Handle error if the delete request fails
                    console.error('Error deleting plugin:', error);
                });
            }
        },


        submitFilter() {
            // Fetch and update plugins based on the selected date range
            // You can make an Inertia request to your Laravel backend here
            this.$inertia.get('/plugins', { startDate: this.startDate, endDate: this.endDate }).then(response => {
                // Update the plugins with the response
                this.$emit('update-plugins', response.plugins);

                // Close the filter form or perform any other actions
            });
        },

    },
};
</script>

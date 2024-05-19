<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <h4>DATA PRODUK</h4>
                        <hr>
                        <router-link :to="{ name: 'produk.create' }" class="btn btn-md btn-success">TAMBAH
                            DATA</router-link>

                        <table id="produkTable" class="table table-striped table-bordered mt-4">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th class="text-center" scope="col">No</th>
                                    <th class="text-center" scope="col" width="400px">Nama Produk</th>
                                    <th class="text-center" scope="col">Harga</th>
                                    <!-- <th class="text-center" scope="col">Kategori</th>
                                    <th class="text-center" scope="col">Status</th> -->
                                    <th class="text-center" scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(produk, index) in produks" :key="index">
                                    <td class="text-center">{{ index + 1 }}</td>
                                    <td>{{ produk.nama_produk }}</td>
                                    <td>{{ produk.harga }}</td>
                                    <!-- <td>{{ produk.nama_kategori }}</td>
                                    <td>{{ produk.nama_status }}</td> -->
                                    <td class="text-center">
                                        <router-link :to="{ name: 'produk.edit', params: { id: produk.id_produk } }"
                                            class="btn btn-sm btn-warning me-1">EDIT</router-link>
                                        <router-link :to="{ name: 'produk.detail', params: { id: produk.id_produk } }"
                                            class="btn btn-sm btn-primary me-1">DETAIL</router-link>
                                        <button @click.prevent="confirmDelete(produk.id_produk)"
                                            class="btn btn-sm btn-danger me-1">DELETE</button>

                                    </td>
                                </tr>
                            </tbody>
                        </table>



                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import { onMounted, ref } from 'vue'
import $ from 'jquery'
import 'datatables.net'

export default {
    name: 'ProdukIndex',

    setup() {

        //reactive state
        let produks = ref([])

        //mounted
        onMounted(() => {

            //get API from Laravel Backend
            axios.get('http://localhost:8000/api/produk')
                .then(response => {

                    //assign state produks with response data
                    produks.value = response.data.data

                    // Initialize DataTable after data is loaded and DOM is updated
                    setTimeout(() => {
                        $('#produkTable').DataTable();
                    }, 100);

                }).catch(error => {
                    console.log(error.response.data)
                })

        })

        function confirmDelete(id_produk) {
            if (window.confirm('Apakah Anda yakin ingin menghapus produk ini?')) {
                // Panggil metode produkDelete jika pengguna mengkonfirmasi
                produkDelete(id_produk);
            }
        }

        //method delete
        function produkDelete(id_produk) {

            //delete data produk by ID
            axios.delete(`http://localhost:8000/api/produk/${id_produk}`)
                .then(() => {

                    //splice produks 
                    produks.value = produks.value.filter(item => item.id_produk !== id_produk)

                    // Reinitialize DataTable to update the table
                    $('.produkTable').DataTable().destroy();
                    setTimeout(() => {
                        $('#produkTable').DataTable();
                    }, 100);

                }).catch(error => {
                    console.log(error.response.data)
                })

        }

        //return
        return {
            produks,
            produkDelete,
            confirmDelete
        }

    }

}
</script>

<style>
body {
    background: lightgray;
}
</style>
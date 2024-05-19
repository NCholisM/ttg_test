<template>
    <div class="container mt-5" v-if="produk && kategori && status">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <h4>DETAIL PRODUK</h4>
                        <hr>

                        <div class="mb-3">
                            <label for="nama_produk" class="form-label font-weight-bold">Nama Produk</label>
                            <input type="text" class="form-control" v-model="produk.nama_produk"
                                placeholder="Masukkan Nama Produk" disabled />
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label font-weight-bold">Harga</label>
                            <input type="text" class="form-control" v-model="produk.harga" placeholder="Masukkan Harga"
                                disabled />
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label font-weight-bold">Kategori</label>
                            <input type="text" class="form-control" v-model="kategori.nama_kategori"
                                placeholder="Nama Kategori" disabled />
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label font-weight-bold">Status</label>
                            <input type="text" class="form-control" v-model="status.nama_status" placeholder="Status"
                                disabled />
                        </div>

                        <router-link :to="{ name: 'produk.index' }" class="btn btn-secondary ms-2">KEMBALI</router-link>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else>
        Loading...
    </div>
</template>
<script>
import { reactive, onMounted } from 'vue'
import { useRouter, useRoute } from 'vue-router'
import axios from 'axios'

export default {
    name: 'ProdukDetail',

    setup() {

        // state produk
        const produk = reactive({
            nama_produk: "",
            harga: "",
            kategori_id: "",
            status_id: ""
        })

        // state kategori
        const kategori = reactive({
            nama_kategori: ""
        })

        // state status
        const status = reactive({
            nama_status: ""
        })

        // vue router
        const router = useRouter()

        // vue route
        const route = useRoute()

        // function to load produk data
        const loadProduk = async () => {
            try {
                const response = await axios.get(`http://localhost:8000/api/produk/${route.params.id}`)
                const data = response.data.data
                produk.nama_produk = data.nama_produk
                produk.harga = data.harga
                produk.kategori_id = data.kategori_id
                produk.status_id = data.status_id

                // load kategori data
                const kategoriResponse = await axios.get(`http://localhost:8000/api/kategori/${produk.kategori_id}`)
                kategori.nama_kategori = kategoriResponse.data.data.nama_kategori

                // load status data
                const statusResponse = await axios.get(`http://localhost:8000/api/status/${produk.status_id}`)
                status.nama_status = statusResponse.data.data.nama_status

            } catch (error) {
                console.error(error.response.data)
            }
        }

        // load produk data when component is mounted
        onMounted(loadProduk)

        // return
        return {
            produk,
            kategori,
            status,
            router
        }
    }
}
</script>

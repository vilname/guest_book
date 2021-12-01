<template>
    <div id="home" class="container">
        <div>
            <h2>Гостевая форма</h2>
            <form @submit="saveGuestForm" method="post">
                <div class="form-group mb-2">
                    <label for="name-guest-form">ФИО</label>
                    <input type="text" v-model="formItems.name" class="form-control" id="name-guest-form" placeholder="ФИО">
                </div>
                <div class="form-group mb-2">
                    <label for="comment-guest-form">Комментарий</label>
                    <input type="text" v-model="formItems.body" class="form-control" id="comment-guest-form" placeholder="Комментарий">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div v-if="resultGuestBook">
            <h1>Список гостевой книги</h1>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">дата</th>
                    <th scope="col">имя</th>
                    <th scope="col">комментарий</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(item, i) in resultGuestBook">
                    <th scope="row">{{i+1}}</th>
                    <td>{{item.dtime}}</td>
                    <td>{{item.name}}</td>
                    <td>{{item.body}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            formItems: {
                name: '',
                body: ''
            },
            resultGuestBook: {},
            headers: {
                'Content-Type': 'text/plain'
            }
        };
    },
    methods: {
        saveGuestForm: function(e) {
            e.preventDefault();
            const headers = this.headers;

            axios.post(`http://127.0.0.1:7777/guest-book`,
                this.formItems,
                {headers}
            )
                .then((response) => {
                    this.getGuestForm()
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        getGuestForm: function() {
            axios.get(`http://127.0.0.1:7777/guest-book`)
                .then((response) => {
                    this.resultGuestBook = response.data.guestBook
                })
                .catch((error) => {
                    console.log(error);
                });
        }
    },
    mounted: function () {
        this.getGuestForm()
    }
}


</script>
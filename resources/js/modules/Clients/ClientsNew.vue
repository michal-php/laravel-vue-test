<template>
    <div class="container mt-5">
        <form @submit.prevent="onSubmit" @keydown="form.errors.clear()">

            <div class="row mt-4">
                <label align="right" class="col">First Name</label>
                <b-form-input class="col-4" id="first-name" v-model="form.first_name"></b-form-input>

                <label align="right" class="col">Last Name</label>
                <b-form-input class="col-4" id="last-name" v-model="form.last_name"></b-form-input>
            </div>

            <div class="row mt-4">
                <label align="right" class="col">Email</label>
                <b-form-input class="col-4" id="email" v-model="form.email"></b-form-input>

                <label align="right" class="col">Date of Birth</label>
                <b-form-datepicker class="col-4" id="date-of-birth" v-model="form.date_of_birth"></b-form-datepicker>
            </div>

            <div class="row mt-4">
                <label align="right" class="col">Phone</label>
                <b-form-input class="col-4" id="phone" v-model="form.phone"></b-form-input>

                <label align="right" class="col">City</label>
                <b-form-input class="col-4" id="city" v-model="form.city"></b-form-input>
            </div>

            <div class="row mt-4">
                <label align="right" class="col">ZIP</label>
                <b-form-input class="col-4" id="zip" v-model="form.zip"></b-form-input>

                <label align="right" class="col">Street</label>
                <b-form-input class="col-4" id="streer" v-model="form.street"></b-form-input>
            </div>

            <div class="row mt-4">
                <label align="right" class="col">Country</label>
                <b-form-select class="col-4"
                               id="country"
                               v-model="form.country"
                               :options="countries"
                ></b-form-select>

                <label align="right" class="col">Nationality</label>
                <b-form-select class="col-4"
                               id="nationality"
                               v-model="form.nationality"
                               :options="countries"
                ></b-form-select>
            </div>
            <div class="row mt-5 justify-content-md-center">
                <b-button type="submit" variant="primary">Save</b-button>
            </div>
        </form>

    </div>
</template>

<script>
    import Form from "../../utilities/Form";

    export default {
        name: "ClientNew",

        data() {

            return {
                id: null,

                countries: [{ text: 'Select One', value: null }, 'Carrots', 'Beans', 'Tomatoes', 'Corn'],

                form: new Form({
                    first_name: '',
                    last_name: '',
                    email: '',
                    date_of_birth: '',
                    birth_number: '',
                    phone: '',
                    city: '',
                    zip: '',
                    street: '',
                    country: '',
                    nationality: ''
                })
            }
        },

        methods: {
            onSubmit() {
                this.form.post('/api/clients')
                    .then(data =>this.$router.push({name: 'ClientDetail',  params: { clientId: data.id }}));
            },
        }
    }
</script>

<style scoped>

</style>

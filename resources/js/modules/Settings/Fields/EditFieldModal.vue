<template>
    <b-modal id="edit-field-modal" title="Add New" hide-footer>
        <div class="container ">
            <form @submit.prevent="onSubmit" @keydown="form.errors.clear()">

                    <div class="row my-2">
                        <label align="right" class="col">Label</label>
                        <b-form-input class="col" id="name" v-model="form.label"></b-form-input>
                    </div>

                    <div class="row  my-2">
                        <label align="right" class="col">Type</label>
                        <b-form-select class="col"
                                       id="type"
                                       v-model="form.type"
                                       :options="form.getOption('type')"
                        ></b-form-select>
                    </div>

                    <div class="row  my-2">
                        <label align="right" class="col">Block</label>
                        <b-form-select class="col"
                                       id="block"
                                       v-model="form.block"
                                       :options="form.getOption('block')"
                        ></b-form-select>
                    </div>

                    <div class="row  my-2">
                        <label align="right" class="col">Modules</label>
                        <b-form-select class="col"
                                       id="module"
                                       v-model="form.module"
                                       :options="form.getOption('module')"
                        ></b-form-select>
                    </div>

                    <div class="row  my-2">
                        <label align="right" class="col">Mandatory</label>
                        <b-form-checkbox
                            class="col"
                            id="mandatory"
                        ></b-form-checkbox>
                    </div>
                <div class="row mt-5 justify-content-md-center">
                    <b-button type="submit" variant="primary">Save</b-button>
                </div>
            </form>
        </div>
    </b-modal>
</template>

<script>
    import Field from "../../../utilities/Field"
    import Form from "../../../utilities/Form";

    export default {
        name: "EditFieldModal",

        data() {
            return {
                type: null,
                form: new Form({
                    type: null,
                    block: null,
                    module: null,
                })
            };
        },

        created() {

            Form.getFormData(data => this.form.setOptions(data) );

        },

        methods: {
            onSubmit() {
                const id = this.id;
                this.form.post(`/api/module/field/save`)
                    .then(data => {
                        this.$bvModal.hide('edit-field-modal');
                    });
            },
        }

    }
</script>

<style scoped>

</style>

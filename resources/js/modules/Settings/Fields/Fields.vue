<template>
    <div class="container">
        <navbar :path="{path: '/clients/edit/'}" class="navbar-detail"></navbar>

        <div class="d-flex justify-content-center my-lg-5">

            <div class="container">
                <div class="">
                    <div class="container border border-secondary rounded pt-2 pb-4 mb-4" v-for="block in this.blocksOfFields">

                        <div class="d-flex">
                            <h2 class="mr-auto">{{block.label}}</h2>

                            <b-button @click.prevent="addField" variant="outline-secondary" size="sm" class="my-1">
                                <strong>+</strong> Add Field
                            </b-button>

                            <b-dropdown no-caret  variant="outline-secondary" class="my-1 mx-1" size="sm">
                                <template v-slot:button-content >
                                    <b-icon-three-dots-vertical></b-icon-three-dots-vertical>
                                </template>

                                <b-dropdown-item href="#">Rename</b-dropdown-item>
                                <b-dropdown-item href="#">Remove</b-dropdown-item>
                            </b-dropdown>
                        </div>

                        <div class="row" v-for="chunk in getFieldRows(block.fields)">
                            <template v-for="field in chunk">

                                <div class="col-sm mx-5 my-1 py-2 border border-secondary rounded"
                                    ><strong>{{field.label}}</strong> ({{field.field_type.name}})</div>

                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ModuleDetail from "../../../models/ModuleDetail";
    import Navbar from "./Navbar";


    export default {
        name: "Fields",

        components:{
            Navbar
        },

        data() {
            return {
                moduleName: 'Clients',
                blocksOfFields: null,
                module: null
            }
        },

        created() {
            module = new ModuleDetail('Clients');
            module.getBlocksWithFields(module => {
                this.module = module;
                this.blocksOfFields = this.module.field_blocks;
            } );
        },
        methods: {
            getFieldRows(fields){
                return _.chunk(Object.values(fields), 2);
            },

            fieldName(field) {
                return _.capitalize(field.field_type.name)+'Field';
            },
            addField() {
                this.$bvModal.show('edit-field-modal');
            }
        },

    }
</script>

<style scoped>
    .navbar-detail{
        margin:15px 0px 25px 0px;
    }

</style>
